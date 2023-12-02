<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
</head>
<body class="d-flex h-100 text-center text-bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">Cover</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="#">Home</a>
                <a class="nav-link fw-bold py-1 px-0" href="#">Features</a>
                <a class="nav-link fw-bold py-1 px-0" href="#">Contact</a>
            </nav>
        </div>
    </header>

    <main class="px-3 mb-5">
        <h1 class="mt-5">Twitch Avatar</h1>
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the
            text, and add your own fullscreen background photo to make it your own.</p>
        <img src="https://place-hold.it/300x300" class="img-thumbnail rounded" alt="...">
        <form action="" class="m-3">
            <div class="form-group">
                <div class="input-group mb-3">
                <span class="input-group-text bg-primary text-white" style="border: 0;">
                    twitch.tv/
                </span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text bg-primary text-white" style="border: 0;">.png</span>
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary btn-lg">Search Avatar</button>
            </div>
        </form>

    </main>

    <footer class="mt-auto text-white-50 mt-3">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by
            <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
    </footer>
</div>

</body>
</html>
