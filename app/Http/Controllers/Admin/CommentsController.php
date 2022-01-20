<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use bar\baz\source_with_namespace;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class CommentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::where('approved' ,1)->paginate(15);
        return view('admin.comment.all',compact('comments'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function unapproved()
    {
        $comments = Comment::where('approved' , 0)->paginate(15);
        return view('admin.comment.unapproved-comment' , compact('comments'));
    }

    /*
     *
     */
    public function update(Request $request, Comment $comment)
    {

        $comment->update(['approved' => 1]);

        alert()->success('Comments approved' ,'Success')->autoclose(3000);

        return back();
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        alert()->info('Comment deleted' , 'Deleted')->autoclose(3000);

        return back();
    }
}
