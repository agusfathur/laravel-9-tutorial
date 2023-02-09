<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AFR Blog | Dashboard</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    @include('dashboard.layouts.header')

    <div class="container-fluid">
        <div class="row">

            @include('dashboard.layouts.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')
            </main>
        </div>
    </div>

    <script>
        feather.replace()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/js/dashboard.js"></script>
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        /* tampilan ikon file */
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</body>

</html>
