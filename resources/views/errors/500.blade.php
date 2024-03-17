<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Tyzals</title>
    <link rel="shortcut icon" href="{{ asset('assets/logo/high-resolutions/logo-square.png') }}" type="image/x-icon" />
    <link rel="stylesheet" crossorigin href="{{ asset('mazer/assets/compiled/css/app.css') }}" />
    <link rel="stylesheet" crossorigin href="{{ asset('mazer/assets/compiled/css/error.css') }}" />
</head>

<body>
    <script src="{{ asset('mazer/assets/static/js/initTheme.js') }}"></script>
    <div id="error">
        <div class="container error-page">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-error" src="{{ asset('mazer/assets/compiled/svg/error-500.svg') }}"
                        alt="System Error">
                    <h1 class="error-title">System Error</h1>
                    <p class="text-gray-600 fs-5">The website is currently unaivailable. Try again later or contact the
                        developer.</p>
                    <a href="/" class="mt-3 btn btn-lg btn-outline-primary">Go Home</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
