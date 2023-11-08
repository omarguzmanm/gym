<?php

namespace Database\Seeders;

use App\Models\PrRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrRecord::factory(2000)->create();

    }
}
