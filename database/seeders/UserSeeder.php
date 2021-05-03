<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $admin = User::factory()->create([
      'first_name' => 'Dayan',
      'last_name' => 'Betancourt',
    	'email' => 'dkbetancourt@gmail.com',
    	'email_verified_at' => now(),
      'password' => bcrypt('dayan123'),
      'identification' => 'V17570157',
      'gender' => 'F',
      'phone' => '(424)-317-2126'
    ]);

    $admin->assign('admin');

    $admin = User::factory()->create([
      'first_name' => 'Dulayne',
      'last_name' => 'Rosales',
    	'email' => 'dulayney@gmail.com',
    	'email_verified_at' => now(),
      'password' => bcrypt('dulayne123'),
      'identification' => 'V18980066',
      'gender' => 'F',
      'phone' => '(412)-744-4279'
    ]);

    $admin->assign('admin');

    $admin = User::factory()->create([
      'first_name' => 'Enrique',
      'last_name' => 'Rodriguez',
      'email' => 'enriq_1997@hotmail.com',
      'email_verified_at' => now(),
      'password' => bcrypt('123456'),
      'identification' => 'V26596475',
      'gender' => 'M',
      'phone' => '(414)-464-6146'
    ]);

    $admin->assign('admin');
  }
}
