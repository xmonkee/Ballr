<?php

class VendorsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
        DB::table('vendors')->delete();

		
        $bigArray = array(
                        'name' => array(
                            'Mayank Mandava',
                            'Mukul Gupta',
                            'Chandni Gupta',
                            'Anuradha Gupta'
                            ),
                        'email' => array(
                            'mayankmandava@gmail.com',
                            'mukulgupta01@gmail.com',
                            'chandnigupta01@gmail.com',
                            'sajjaa3@gmail.com'
                            ),
                        'description' => array(
                            'Mayank Mandava runs a shop in lucknow',
                            'Mukul Gupta runs a shop in lucknow',
                            'Chandni Gupta a shop in lucknow',
                            'Anuradha Gupta a shop in lucknow',
                            ),
                        'password' => array_map("Hash::make", array(
                            'thisis3love',
                            'mukulgupta',
                            'chandnigupta',
                            'anuradhagupta'
                            )),
                        'city' => array(
                            'lucknow',
                            'lucknow',
                            'lucknow',
                            'lucknow'
                            ),
                        'state' => array(
                            '25',
                            '25',
                            '25',
                            '25'
                            ),
                        'address' => array(
                            '3/354 Vikram Khand',
                            '3/354 Vishram Khand',
                            '3/354 Vaibhav Khand',
                            '3/354 Vibhuti Khand',
                            ),
                        'image' => array(
                            'mayank.jpg',
                            'mukul.jpg',
                            'chandni.jpg',
                            'anuradha.jpg'
                            )
                        );
        
        
        $numVendors = count(array_values($bigArray)[0]);
        $vendors = array();
        for ($i=0; $i < $numVendors; $i++) { 
            $tempArray = array();
            foreach($bigArray as $field => $val ){
                $tempArray[$field] = $val[$i];
            }
            $vendors[] = $tempArray;
        }


        // Uncomment the below to run the seeder
        DB::table('vendors')->insert($vendors);
    }

}
