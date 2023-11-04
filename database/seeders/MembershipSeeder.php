<?php

namespace Database\Seeders;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        $users = User::all();
        $memberships = Membership::all();

        foreach ($users as $index => $user) {
            $membership = $memberships[$index % count($memberships)];

            $user->memberships()->attach(
                $membership->id,
                [
                    'user_id' => $user->id,
                    // 'inscription' => now(),
                    'renew_date' => now()->addMonth(),
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
