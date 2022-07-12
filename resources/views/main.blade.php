<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Arash Madadi">
    <meta name="generator" content="Hugo 0.88.1">
    <title>TODO project(Main Page)</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/Todo-project/css/mainPage.css')}}" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  @include('layoutes.header')

    <main class="px-3">
        <div class="border border-primary border-2 rounded-pill text-gray-800">
        <h1>Hi</h1>
        <h2>I'm Rash</h2>
        <h3>And</h3>
        <h4>This is my Todo app</h4>
        </div>
    </main>

    @include('layoutes.footer')
</div>

</body>
</html>

