<!DOCTYPE html>
<html>
<head>
	<title>Football League</title>

	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/mdb.min.css">
	<link rel="stylesheet" type="text/css" href="/css/fonts.css">

	@yield('head')

</head>
<body>

	<div class="whole-wrapper">
	

		@yield('content')

	</div>

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/mdb.min.js"></script>

	@yield('script')

</body>
</html>