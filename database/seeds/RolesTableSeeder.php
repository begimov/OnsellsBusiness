<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = [
        ['name' => 'moderator'],
      ];
      foreach ($roles as $role) {
        DB::table('roles')->insert($role);
      }
    }
}
