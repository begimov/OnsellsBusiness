<?php

use Illuminate\Database\Seeder;
use App\Models\Promotions\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $locations = [
        ['promotion_id' => 3, 'location' => '59.9307772,30.3276762'],
      ];
      foreach ($locations as $key => $value) {
        Location::create($value);
      }
    }
}
