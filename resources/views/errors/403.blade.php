<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>403 - Tyzals</title>
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
                    <img class="img-error" src="{{ asset('mazer/assets/compiled/svg/error-403.svg') }}"
                        alt="Forbidden" />
                    <h1 class="error-title">Forbidden</h1>
                    <p class="text-gray-600 fs-5">
                        You are unauthorized to see this page.
                    </p>
                    <a href="/" class="mt-3 btn btn-lg btn-outline-primary">Go Home</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
