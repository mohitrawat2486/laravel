<html>
<head>
<title>@yield('title')</title>
{{ Html::style('css/style.css') }}
{{ Html::style('css/bootstrap.css') }}
</head>
<body>
<div class="container">
@yield('container')
</div>
</body>
</html>