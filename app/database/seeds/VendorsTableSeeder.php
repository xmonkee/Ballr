<?php

class VendorsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('vendors')->delete();

        $vendors = array(
		array('name'=>'Mayank Mandava',
		'email'=>'mayankmandava@gmail.com',
		'password'=>Hash::make('thisis3love'),
		'city'=>'lucknow',
		'state'=>'1',
		'address'=>'3/354 Vishwas Khand',
		'image'=>'image.jpg')
        );

        // Uncomment the below to run the seeder
        // DB::table('vendors')->insert($vendors);
    }

}
