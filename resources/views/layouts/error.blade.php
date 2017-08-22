<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/backend/images/favicon.png">
    <title>Oops,Something went wrong!</title>
    <link href="/backend/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/backend/fonts/font-awesome-4/css/font-awesome.min.css">
    <link href="/backend/css/style.css" rel="stylesheet" />

</head>

<body class="texture">

    <div id="cl-wrapper" class="error-container">
        @yield('content')
        <div class="text-center copy">
            <a href="http://blog.lerzen.com/" target="_blank">&copy; {{ date('Y').' '.config('app.name') }}</a>
        </div>
    </div>
    <script src="/backend/js/jquery.js"></script>
    <script type="text/javascript" src="/backend/js/behaviour/general.js"></script>
    <script src="/backend/js/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
