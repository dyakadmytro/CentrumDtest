<?php

namespace Database\Seeders;

use App\Models\Anchor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnchorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Anchor::factory(5)->create();
    }
}
