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
            'type' => 'invitado',
            'plan' => 'Sin plan',
            'price' => 50
        ]);
        Membership::create([
            'type' => 'semanal',
            'plan' => 'Sin plan',
            'price' => 150
        ]);
        Membership::create([
            'type' => 'mensual',
            'plan' => 'classic',
            'price' => 400
        ]);
        Membership::create([
            'type' => 'semestral',
            'plan' => 'classic',
            'price' => 2000
        ]);
        Membership::create([
            'type' => 'anual',
            'plan' => 'classic',
            'price' => 3800
        ]);


        Membership::create([
            'type' => 'mensual',
            'plan' => 'premium',
            'price' => 700
        ]);
        Membership::create([
            'type' => 'semestral',
            'plan' => 'premium',
            'price' => 3500
        ]);
        Membership::create([
            'type' => 'anual',
            'plan' => 'premium',
            'price' => 5000
        ]);

    }
}