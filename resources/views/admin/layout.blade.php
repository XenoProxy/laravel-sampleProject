<!DOCTYPE html>
<html>
<head>
    <title>Admin (like)</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>