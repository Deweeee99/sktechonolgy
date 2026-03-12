<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['icon' => 'fal fa-desktop', 'title' => 'IT Consulting', 'description' => 'We analyze business and operational needs to design practical, results-oriented digital transformation roadmaps.', 'order_number' => '01.'],
            ['icon' => 'fab fa-pagelines', 'title' => 'Software Development', 'description' => 'Custom-built applications and platforms designed for scalability, performance, and long-term sustainability.', 'order_number' => '02.'],
            ['icon' => 'fal fa-mobile-android', 'title' => 'Network Solutions', 'description' => 'Reliable and secure network infrastructure to support seamless business and government operations.', 'order_number' => '03.'],
            ['icon' => 'fal fa-camera-alt', 'title' => 'Cloud Services', 'description' => 'Private and hybrid cloud solutions that enhance flexibility, system performance, and operational efficiency.', 'order_number' => '04.'],
            ['icon' => 'fal fa-camera-alt', 'title' => 'Cyber Security', 'description' => 'Comprehensive security frameworks to protect systems, infrastructure, and sensitive data from evolving cyber threats.', 'order_number' => '05.'],
            ['icon' => 'fal fa-camera-alt', 'title' => 'Data Center & IDC', 'description' => 'Design, implementation, and management of scalable Internet Data Center (IDC) environments.', 'order_number' => '06.'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}