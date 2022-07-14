<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Arash Madadi">
    <meta name="generator" content="Hugo 0.88.1">
    <title>TODO project</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/Todo-project/css/mainPage.css')}}" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        @include('layoutes.header')
        <div class="mt-2 mb-2">
            @yield('content')
        </div>
        @include('layoutes.footer')
    </div>
</body>
</html>

