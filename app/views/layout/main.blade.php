<!DOCTYPE html>
<html lang="en">
<head>
	@include('layout/head')
</head>
<body>
		<div class="container">
			@include('layout/header')
			@yield('main')
		</div> <!-- /container -->
	<div class="footer">
			@include('layout/footer')
	</div>
	@include('layout/foot')
</body>
</html>




