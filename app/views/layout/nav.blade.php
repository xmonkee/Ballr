<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">{{Config::get('ballr.name')}}</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="/products">Products</a></li>
      <li class="dropdown">
        <a href="/categories" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
        <ul class="dropdown-menu">
		   @foreach(Category::get() as $category)
		   <li><a href="{{action('ProductsController@showCategory', $category->id)}}">{{$category->name}}</a></li>
		   @endforeach
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Product or Shop name">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
    	@if(Auth::check())
      <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <b class="caret"></b></a>
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
  </div><!-- /.navbar-collapse -->
</nav>

