<!DOCTYPE html>
<html>

<head>
    <title>Apotek Website</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/14cd2e1081.js" crossorigin="anonymous"></script>
</head>

<body>

    @include('partials.navbar')

    <main class="container mt-4 mb-3">
        @yield('container')
    </main>

    <footer>
        <p class="text-center">&copy; 2023 Apotek Website</p>
    </footer>

    <script src="/assets/js/bootstrap.bundle.js"></script>
</body>

</html>
