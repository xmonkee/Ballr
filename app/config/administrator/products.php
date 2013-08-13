<?php

/**
 * Products model config
 */

return array(

	'title' => 'Products',

	'single' => 'product',

	'model' => 'Product',

	/**
	 * The display columns
	 */
	'query_filter'=> function($query)
	{

		$query->where('vendor_id', '=', Auth::user()->id);	
	},


	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'description' => array(
			'title' => 'Description',
		), 
		'category' => array(
			'title' => 'Category',
			'relationship' => 'category',
			'select' => "(:table).name",
		), 
		'image1' => array(
			'title' => 'Image',
			'output' => '<img src="'.Config::get('ballr.thumbs').'(:value)"/>'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),
		'category' => array(
			'title' => 'Category',
			'type' => 'relationship',
			'name_field' => 'name'
		),
		'image1' => array(
		    'title' => 'Main Image',
		    'type' => 'image',
		    'location' => storage_path() . '/uploads/',
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 3,
		    'sizes' => array(
		        array(200, 200, 'crop', public_path() . '/uploads/thumbnails/', 100),
		    )
		),

		'image2' => array(
		    'title' => 'Second Image (optional)',
		    'type' => 'image',
		    'location' => storage_path() . '/uploads/',
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 3,
		    'sizes' => array(
		        array(200, 200, 'crop', public_path() . '/uploads/thumbnails/', 100),
		    )
		),
		'description' => array(
			'title' => 'Description (optional)',
			'type' => 'textarea',
		),
		'minunits' => array(
			'title' => 'Minimum units sold',
			'type' => 'number',
		),
		'maxunits' => array(
			'title' => 'Maximum capacity',
			'type' => 'number',
		),
	),

);

