@extends('layouts.app')
@section('content')
<div class="content full-height" data-pagetitle="Home slider">
    <div class="fl-wrap full-height hero-conatiner">
        <div class="hero-wrapper fl-wrap full-height hidden-item">
            <span class="hc_dec"></span>
            
            <div class="hero-slider-wrap home-half-slider fl-wrap full-height">
                <div class="hero-slider fs-gallery-wrap fl-wrap full-height">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($sliders as $slider)
                            <div class="swiper-slide">
                                <div class="half-hero-wrap">
                                    <div class="hhw_header">{{ $slider->small_text_top }}</div>
                                    <h1><span>{!! $slider->big_text !!}</span><br> </h1>
                                    <h4>{{ $slider->small_text_bottom }}</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slider-img hero-slider-wrap_halftwo hidden-item">
                <div class="swiper-container">
                    <div class="swiper-wrapper" >
                        @foreach($sliders as $slider)
                        <div class="swiper-slide">
                            @php
                                // Sistem Background Image dikembalikan ke versi awal
                                $bgImage = str_starts_with($slider->image, 'images/') 
                                            ? asset($slider->image) 
                                            : asset('storage/' . $slider->image);
                            @endphp
                            <div class="bg" data-bg="{{ $bgImage }}" data-swiper-parallax="20%"></div>
                            <div class="overlay"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="hero-corner-dec"></div>
                <div class="hero-corner-dec2"></div>
            </div>
            <div class="slider-progress-bar">
                <span>
                    <svg class="circ" width="50" height="50">
                        <circle class="circ2" cx="25" cy="25" r="23" stroke="rgba(255,255,255,0.4)" stroke-width="1" fill="none"/>
                        <circle class="circ1" cx="25" cy="25" r="23" stroke="#fff" stroke-width="2" fill="none"/>
                    </svg>
                </span>
            </div>
            <div class="clone-counter">
                <div class="current">01</div>
            </div>
            <div class="swiper-counter hs_counter">
                <div class="current">01</div>
                <div class="total"></div>
            </div>
            <div class="hero-slider_control-wrap">
                <div class="hsc hsc-prev"><span><i class="fal fa-angle-left"></i></span> </div>
                <div class="hsc hsc-next"><span><i class="fal fa-angle-right"></i></span></div>
            </div>
            
            <!-- Update Href: Mengarah ke halaman Company Overview -->
            <a href="{{ url('/company-overview') }}" class="ajax start-btn"><span> Start explore <i class="fal fa-long-arrow-right"></i></span></a>
            
            <div class="play-pause_slider hsc_pp auto_actslider"><i class="fas fa-play"></i></div>
        </div>
        
        <!-- Update Href & Teks: Mengambil data koordinat & alamat dinamis dari tabel Contact -->
        @php
            $globalContact = \App\Models\Contact::first() ?? (object)[
                'map_lat' => '-8.556',
                'map_lng' => '125.560',
                'address' => 'Timor Leste'
            ];
        @endphp
        <div class="hero-decor-numb">
            <span>{{ $globalContact->map_lat }}  </span>
            <span>{{ $globalContact->map_lng }} </span> 
            <a href="{{ url('/contacts') }}" class="ajax hero-decor-numb-tooltip">Based in {{ $globalContact->address }}</a>
        </div>
        
        <div class="hero-slider-wrap_pagination"></div>
        <div class="hero-scroll-down-notifer">
            <div class="scroll-down-wrap ">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
            </div>
            <i class="far fa-angle-down"></i>
        </div>
    </div>
</div>
@endsection