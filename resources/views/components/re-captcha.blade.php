
    <script src='https://www.google.com/recaptcha/api.js?data-size="compact"' async defer></script>
    <div class='g-recaptcha {{ $hasError ? "is-invalid" : ''}}'  data-sitekey="{{ $dataSiteKey }}" style="width: 100%"></div>
