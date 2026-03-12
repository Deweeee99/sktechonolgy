<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'image' => 'images/bg/service.jpg',
                'small_text_top' => 'SK Technology',
                'big_text' => 'Secure IT Solutions',
                'small_text_bottom' => 'We deliver cutting-edge technology solutions with enterprise-grade security to protect your digital assets and ensure business continuity.',
            ],
            [
                'image' => 'images/bg/digital.png',
                'small_text_top' => 'SK Technology',
                'big_text' => 'Digital Transformation',
                'small_text_bottom' => 'Empowering businesses with innovative technology to streamline operations, enhance productivity, and drive sustainable growth in the digital era.',
            ],
            [
                'image' => 'images/bg/data_center.jpg',
                'small_text_top' => 'SK Technology',
                'big_text' => 'Data Center Excellence',
                'small_text_bottom' => 'Designing and managing robust data infrastructure with 99.9% uptime guarantee, ensuring your critical systems are always available and secure.',
            ],
            [
                'image' => 'images/bg/festival.jpg',
                'small_text_top' => '12 april 2026',
                'big_text' => 'Original Design Features With High Quality Code.',
                'small_text_bottom' => 'Praesent eu massa vel diam laoreet elementum ac sed felis. Donec suscipit ultricies risus sed mollis. Donec volutpat porta risus posuere imperdiet.',
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}