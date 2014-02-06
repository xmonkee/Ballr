<?php

class StatesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('states')->delete();

		$states = array(
		array('state'=> 'Andhra Pradesh'),
		array('state'=> 'Arunachal Pradesh'),
		array('state'=> 'Assam'),
		array('state'=> 'Bihar'),
		array('state'=> 'Chhattisgarh'),
		array('state'=> 'Goa'),
		array('state'=> 'Gujarat'),
		array('state'=> 'Haryana'),
		array('state'=> 'Himachal Pradesh'),
		array('state'=> 'Jammu and Kashmir'),
		array('state'=> 'Jharkhand'),
		array('state'=> 'Karnataka'),
		array('state'=> 'Kerala'),
		array('state'=> 'Madhya Pradesh'),
		array('state'=> 'Maharashtra'),
		array('state'=> 'Manipur'),
		array('state'=> 'Meghalaya'),
		array('state'=> 'Mizoram'),
		array('state'=> 'Nagaland'),
		array('state'=> 'Punjab'),
		array('state'=> 'Rajasthan'),
		array('state'=> 'Sikkim'),
		array('state'=> 'Tamil Nadu'),
		array('state'=> 'Tripura'),
		array('state'=> 'Uttar Pradesh'),
		array('state'=> 'Uttarakhand'),
		array('state'=> 'West Bengal')
		);

		// Uncomment the below to run the seeder
		DB::table('states')->insert($states);
	}

}
