@extends('layouts.scaffold')

@section('main')

<h1>All Vendors</h1>

<p>{{ url('vendors/create', 'Add new vendor') }}</p>

@if ($vendors->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>City</th>
				<th>State</th>
				<th>Address</th>
				<th>Image</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($vendors as $vendor)
                <tr>
                    <td>{{{ $vendor->name }}}</td>
					<td>{{{ $vendor->email }}}</td>
					<td>{{{ $vendor->password }}}</td>
					<td>{{{ $vendor->city }}}</td>
					<td>{{{ $vendor->state }}}</td>
					<td>{{{ $vendor->address }}}</td>
					<td>{{{ $vendor->image }}}</td>
                    <td>
                        {{link_to_action('VendorsController@getEdit', 'Edit', $vendor->id,array('class' => 'btn btn-info'))}}   
                    </td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'url' => array('vendors/destroy', $vendor->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no vendors
@endif

@stop