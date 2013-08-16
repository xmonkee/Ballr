<?php

class StatesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('states')->delete();

		$states = array(
		array('state'=>'Odisha'),
		array('state'=>'Andaman and Nicobar'),
		array('state'=>'Chandigarh'),
		array('state'=>'Dadra and Nagar Haveli'),
		array('state'=>'Daman and Diu'),
		array('state'=>'Lakshwadeep'),
		array('state'=>'Puducherry'),
		);

		// Uncomment the below to run the seeder
		DB::table('states')->insert($states);
	}

}
