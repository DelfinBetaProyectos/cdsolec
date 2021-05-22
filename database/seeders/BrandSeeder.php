<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Brand::factory()->create(['name' => 'GE']);
    Brand::factory()->create(['name' => 'SIEMENS']);
    Brand::factory()->create(['name' => 'PHILLIPS']);
  }
}
