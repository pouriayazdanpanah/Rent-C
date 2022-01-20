<?php
namespace App\Services\ReCommendation\Core;


use App\PropertyWeight;
use App\Services\ReCommendation\Core\Similarity;

class ProductSimilarity
{
    protected $products       = [];
    protected $featureWeight  = null;
    protected $priceWeight    = null;
    protected $categoryWeight = null;
    protected $priceHighRange = 1;

    public function start(array $products)
    {
        $this->products = $products;

        $this->priceHighRange = max(array_column($products, 'price'));

        $this->setFeatureWeight();
        $this->setPriceWeight();
        $this->setCategoryWeight();

        return $this->calculateSimilarityMatrix();
    }

    public function setFeatureWeight(): void
    {
        $this->featureWeight = PropertyWeight::Weight('feature');
    }

    public function setPriceWeight(): void
    {
        $this->priceWeight = PropertyWeight::Weight('price');
    }

    public function setCategoryWeight(): void
    {
        $this->categoryWeight = PropertyWeight::Weight('category');
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->products as $product)
        {
            $similarityScores = [];
            foreach ($this->products as $_product) {
                if ($product['id'] === $_product['id']) {
                    continue;
                }
                $similarityScores['product_id_' . $_product['id']] = $this->calculateSimilarityScore($product, $_product);
            }
            $matrix['product_id_' . $product['id']] = $similarityScores;
        }
        return $matrix;
    }

    public function getProductsSortedBySimularity(int $productId, array $matrix): array
    {
        $similarities   = $matrix['product_id_' . $productId] ?? null;
        $sortedProducts = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find product with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $productIdKey => $similarity) {
            $id       = intval(str_replace('product_id_', '', $productIdKey));
            $products = array_filter($this->products, function ($product) use ($id) { return $product['id'] === $id; });
            if (! count($products)) {
                continue;
            }
            $product = $products[array_keys($products)[0]];
//            dd($similarity);
            $product['similarity'] = $similarity;
            $sortedProducts[] = $product;
        }
        return $sortedProducts;
    }

    protected function calculateSimilarityScore($productA, $productB)
    {

        $productAFeatures = implode('', $productA["features"]);
        $productBFeatures = implode('', $productB["features"]);

        return array_sum([
                (Similarity::hamming($productAFeatures, $productBFeatures) * $this->featureWeight),
                (Similarity::euclidean(
                        Similarity::minMaxNorm([$productA['price']], 0, $this->priceHighRange),
                        Similarity::minMaxNorm([$productB['price']], 0, $this->priceHighRange)
                    ) * $this->priceWeight),
                (Similarity::jaccard($productA['categories'], $productB['categories']) * $this->categoryWeight)
            ]) / ($this->featureWeight + $this->priceWeight + $this->categoryWeight);
    }

}
