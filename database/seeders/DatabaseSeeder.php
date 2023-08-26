<?php

namespace Database\Seeders;

use App\Models\Membership;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('users');
        Storage::makeDirectory('users');

        User::factory(100)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Membership::create([
            'type' => 'Invitado',
            'plan' => 'Sin plan',
            'price' => 50
        ]);
        Membership::create([
            'type' => 'Semanal',
            'plan' => 'Sin plan',
            'price' => 150
        ]);
        Membership::create([
            'type' => 'Mensual',
            'plan' => 'Classic',
            'price' => 400
        ]);
        Membership::create([
            'type' => 'Semestral',
            'plan' => 'Classic',
            'price' => 2000
        ]);
        Membership::create([
            'type' => 'Anual',
            'plan' => 'Classic',
            'price' => 3800
        ]);


        Membership::create([
            'type' => 'Mensual',
            'plan' => 'Premium',
            'price' => 700
        ]);
        Membership::create([
            'type' => 'Semestral',
            'plan' => 'Premium',
            'price' => 3500
        ]);
        Membership::create([
            'type' => 'Anual',
            'plan' => 'Premium',
            'price' => 5000
        ]);

    }
}