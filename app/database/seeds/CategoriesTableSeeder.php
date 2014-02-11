<?php

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('categories')->delete();

        $categories = array(
        	array(
        		'name' => 'Suits',
				'description' => 'Traditional Indian Casual and formal wear',
				'parent' => 0,
				'image1' => 'suits1.jpg',
				'image2' => 'suits2.jpg',
				'image3' => 'suits2.jpg',
				'prop1' => 'material',
				'prop2' => 'color',
				'prop3' => 'waist',
				'prop4' => 'bust',
				),
        	array(
        		'name' => 'Sarees',
        		'description' => 'Graceful and elegant, the mighty saree!',
        		'parent' => 0,
        		'image1' => 'sarees1.jpg',
        		'image2' => 'sarees2.jpg',
        		'image3' => 'sarees3.jpg',
        		'prop1' => 'material',
        		'prop2' => 'color',
        		'prop3' => 'style',
        		'prop4' => 'embroidery',
        		),
        	array(
        		'name' => 'Lehengas',
        		'description' => 'Party wear. ',
        		'parent' => 0,
        		'image1' => 'lehengas1.jpg',
        		'image2' => 'lehengas2.jpg',
        		'image3' => 'lehengas3.jpg',
        		'prop1' => 'material',
        		'prop2' => 'color',
        		'prop3' => 'style',
        		'prop4' => 'embroidery',
        		),
        	);


        // Uncomment the below to run the seeder
        DB::table('categories')->insert($categories);
    }

}