<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Category::factory()->create(['name' => 'Cables']);
    Category::factory()->create(['name' => 'Motores']);
    Category::factory()->create(['name' => 'Lámparas']);
    Category::factory()->create(['name' => 'Sensores']);
  }
}
