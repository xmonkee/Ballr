		@foreach($groups as $categoryname=>$products)
		<a href="{{action($action, $categoryname)}}"><h3>{{{$categoryname}}}</h3></a>
		<hr>
		@include('elements.prodlist')
		<a href="{{action($action, $categoryname)}}"><h4 class="pull-right">...more</h4></a> 
	 	@endforeach
