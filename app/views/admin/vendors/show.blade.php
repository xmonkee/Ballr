@extends('layouts.scaffold')

@section('main')

<h1>Show Vendor</h1>

<p>{{ link_to('vendors/index', 'Return to all vendors') }}</p>

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
        <tr>
            <td>{{{ $vendor->name }}}</td>
					<td>{{{ $vendor->email }}}</td>
					<td>{{{ $vendor->password }}}</td>
					<td>{{{ $vendor->city }}}</td>
					<td>{{{ $vendor->state }}}</td>
					<td>{{{ $vendor->address }}}</td>
					<td>{{{ $vendor->image }}}</td>
                    <td>{{ link_to_action('VendorsController@getEdit', 'Edit', $vendor->id, array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'url' => array('vendors/destroy', $vendor->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop