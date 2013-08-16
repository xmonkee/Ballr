<!DOCTYPE html>
<html lang="en">
<head>
	@include('layout/head')
</head>
<body>
	<div class="container">
		@include('layout/header')
		@include('layout/nav')
		<div class="row">
			<div class="span12">
			<!-- MAIN CONTENT BEGINS -->	
				@yield('main') 
			<!-- MAIN CONTENT ENDS -->
			</div>
		</div>
		@include('layout/footer')
	</div> <!-- /container -->
	@include('layout/foot')
</body>
</html>




