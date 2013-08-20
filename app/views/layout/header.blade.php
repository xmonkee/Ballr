
<div class="masthead">
  <h3 class="text-muted">{{Config::get('ballr.name')}}</h3>
</div>
    <div class="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li class="dropdown">
				<a href="/categories" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
				<ul class="dropdown-menu">
					@foreach(Category::get() as $category)
					<li><a href="{{action('ProductsController@showCategory', $category->id)}}">{{$category->name}}</a></li>
					@endforeach
              </ul>
          	</li>
            <li><a href="/products">Products</a></li>
            <li><a href="/shops">Suppliers</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	@if(Auth::check())
            <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{action('VendorsController@getEdit')}}">Settings</a></li>
					<li><a href="{{'/manage'}}">Mange your products</a></li>
					<li><a href="{{'/logout'}}">Logout</a></li>
              </ul>
          	</li>
            @else
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
		
