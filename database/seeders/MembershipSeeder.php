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
            'price' => 199
        ]);
        Membership::create([
            'type' => 'Mensual',
            'plan' => 'Classic',
            'price' => 499
        ]);
        Membership::create([
            'type' => 'Semestral',
            'plan' => 'Classic',
            'price' => 2299
        ]);
        Membership::create([
            'type' => 'Anual',
            'plan' => 'Classic',
            'price' => 4499
        ]);

        Membership::create([
            'type' => 'Mensual',
            'plan' => 'Premium',
            'price' => 799
        ]);
        Membership::create([
            'type' => 'Trimestral',
            'plan' => 'Premium',
            'price' => 1999
        ]);
        Membership::create([
            'type' => 'Semestral',
            'plan' => 'Premium',
            'price' => 3999
        ]);
        Membership::create([
            'type' => 'Anual',
            'plan' => 'Premium',
            'price' => 6999
        ]);
        $users = User::all();
        $memberships = Membership::all();

        foreach ($users as $index => $user) {
            $membership = $memberships[$index % count($memberships)];
            // Genera una fecha aleatoria entre 1 y 365 días antes de la fecha actual
            $randomCreatedAt = \Carbon\Carbon::now()->subDays(rand(1, 365));
            $user->memberships()->attach(
                $membership->id,
                [
                    'user_id' => $user->id,
                    // 'inscription' => now(),
                    'renew_date' => now()->addMonth(),
                    'status' => 1,
                    'created_at' => $randomCreatedAt,
                    'updated_at' => now()
                ]
            );
        }
    }
}
