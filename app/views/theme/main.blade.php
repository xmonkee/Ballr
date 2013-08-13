<!DOCTYPE html>
<html lang="en">
<head>
	@include('theme/head')
</head>
<body>
	<div class="container">
		@include('theme/header')
		@include('theme/nav')
		<div class="row">
			@include('theme/breadcrumb');
			<div class="span12">
				<h1> <!-- Page Title -->
					@yield('title') 
				</h1>
				<p> <!-- MAIN CONTENT BEGINS -->	
					@yield('main') 
				</p> <!-- MAIN CONTENT ENDS -->
			</div>
		</div>
		@include('theme/footer')
	</div> <!-- /container -->
	@include('theme/foot')
</body>
</html>


