<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Contact::create([
            'email' => 'info@sktechnology.com',
            'address' => 'Dili Timor Leste',
            'map_lat' => '-8.556',
            'map_lng' => '125.560',
            'map_popup' => 'SK Technology Dili, Timor Leste.',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#'
        ]);
    }
}
