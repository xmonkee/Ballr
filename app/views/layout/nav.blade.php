<div class="row"><!-- start nav -->
	<div class="span12">
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container" style="width: auto;">
					<div class="nav-collapse">
						<ul class="nav">
							<li><a href="{{action('ProductsController@getIndex')}}">All</a></li>
							@foreach(Category::all() as $category)
							<li><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
							@endforeach
						</ul>

						<ul class="nav pull-right">
							<li class="divider-vertical"></li>
							<form class="navbar-search" action="">
								<input type="text" class="search-query span2" placeholder="Search">
								<button class="btn btn-primary btn-small search_btn" type="submit">Go</button>
							</form>
						</ul>
					</div><!-- /.nav-collapse -->
				</div>
			</div><!-- /navbar-inner -->
		</div><!-- /navbar -->
	</div>
</div><!-- end nav -->
