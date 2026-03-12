<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'company-overview',
                'title' => 'Company Overview',
                'content' => '<p>SK Technology is a technology solutions company specializing in end-to-end IT services, from strategic planning and system development to large-scale national implementation.</p><p>We operate with a security-first mindset, scalable architecture, and future-ready technology frameworks, enabling organizations to grow, adapt, and operate efficiently in a digital-first environment.</p><br><p><b>Our Vision</b><br>To become a trusted technology partner driving innovation, efficiency, and sustainable digital growth.</p><br><p><b>Our Mission</b><br>To deliver secure, scalable, and innovative IT solutions by combining technical expertise, industry best practices, and a client-focused approach—helping organizations simplify technology and achieve measurable results.</p>'
            ],
            [
                'slug' => 'what-we-do',
                'title' => 'What We Do',
                'content' => 'We analyze business and operational needs to design practical, results-oriented digital transformation roadmaps. Custom-built applications and platforms designed for scalability, performance, and long-term sustainability.' // Nanti ini bisa diubah via AdminLTE dengan bebas
            ],
            [
                'slug' => 'timor-leste',
                'title' => 'Timor Leste',
                'content' => '<p>Technology is reshaping how governments deliver services and connect with public. This playbook presents our approach to empowering Timor Leste with tailored software, secure networks, and expert IT solutions. Our mission is to provide reliable, scalable, and innovative services that support public service efficiency, security, and long-term digital resilience.</p><br><p>Next, we outline our strategic plan to support Timor Leste’s digital transformation, including AI for education, biometrics for national ID, and future-ready data infrastructure.</p>'
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}