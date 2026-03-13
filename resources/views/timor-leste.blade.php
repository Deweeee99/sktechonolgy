@extends('layouts.app')

@section('content')
    @php
        // Filter relasi galleries berdasarkan tipe
        $bgGallery = isset($page) ? $page->galleries->where('type', 'background')->first() : null;
        $sliderGalleries = isset($page) ? $page->galleries->where('type', 'slider') : collect([]);
        
        // Atur default image jika admin belum mengupload background
        $bgImg = asset('images/bg/festival.jpg'); 
        if ($bgGallery) {
            $bgImg = str_starts_with($bgGallery->image, 'images/') ? asset($bgGallery->image) : asset('storage/' . $bgGallery->image);
        }
    @endphp

<div class="content" data-pagetitle="Timor Leste Branch">
    
    <div class="hero-section-dec color-bg">
        <div class="progress-indicator">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="-1 -1 34 34">
                <circle cx="16" cy="16" r="15.9155"
                    class="progress-bar__background" />
                <circle cx="16" cy="16" r="15.9155"
                    class="progress-bar__progress 
                    js-progress-bar" />
            </svg>
        </div>
    </div>
    
    <div class="fixed-column-wrap">
        <div class="pr-bg"></div>
        <div class="fixed-column-wrap-content">
            
            <!-- Slideshow Background Dinamis -->
            <div class="slideshow-container">
                <div class="slideshow-container_wrap fl-wrap full-height">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!-- Background Image Dinamis diaplikasikan ke semua slide -->
                            <div class="swiper-slide">
                                <div class="ms-item_fs fl-wrap">
                                    <div class="bg par-elem"  data-bg="{{ $bgImg }}"  ></div>
                                </div>
                            </div>
                            <div class="swiper-slide ">
                                <div class="ms-item_fs fl-wrap">
                                    <div class="bg par-elem"  data-bg="{{ $bgImg }}"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ms-item_fs fl-wrap">
                                    <div class="bg par-elem"  data-bg="{{ $bgImg }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
            
            <div class="progress-bar-wrap bot-element">
                <div class="progress-bar"></div>
            </div>
            <div class="fixed-column-wrap_title first-tile_load">
                <h2>Empowering <br> Timor Leste with Technology</h2>
                <p>We are dedicated to supporting digital growth and transformation for our clients and partners in Timor Leste.</p>
            </div>
            <div class="fixed-column-dec"></div>
            <div class="fixed-column-linedec"></div>
            <div class="scroll-notifer">Scroll Down  </div>
        </div>
    </div>
    
    <div class="column-wrap">
        <div class="column-wrap-container fl-wrap">
            <div class="col-wc_dec"></div>
            <section class="scroll_sec" id="sec1">
                <div class="container">
                    <div class="section-title fl-wrap">
                        <h3>Empowering Timor Leste with Technology</h3>
                    </div>
                    
                    <div class="blog-media fl-wrap">
                        <div class="single-slider-wrap">
                            <div class="single-slider fl-wrap">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper lightgallery">
                                        
                                        @if($sliderGalleries->count() > 0)
                                            <!-- Jika Admin sudah upload foto di Gallery Slider -->
                                            @foreach($sliderGalleries as $gallery)
                                            <div class="swiper-slide hov_zoom">
                                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image">
                                                <a href="{{ asset('storage/' . $gallery->image) }}" class="box-media-zoom popup-image"><i class="fal fa-search"></i></a>
                                            </div>
                                            @endforeach
                                        @else
                                            <!-- Fallback: Jika Gallery kosong, tampilkan gambar bawaan template agar desain tidak rusak -->
                                            <div class="swiper-slide hov_zoom">
                                                <img src="{{ asset('images/folio/timor2.jpg') }}" alt="">
                                                <a href="{{ asset('images/folio/timor2.jpg') }}" class="box-media-zoom popup-image"><i class="fal fa-search"></i></a>
                                            </div>
                                            <div class="swiper-slide hov_zoom">
                                                <img src="{{ asset('images/folio/icon_timor.jpg') }}" alt="">
                                                <a href="{{ asset('images/folio/icon_timor.jpg') }}" class="box-media-zoom popup-image"><i class="fal fa-search"></i></a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="ss-slider-pagination_wrap">
                                <div class="ss-slider-pagination"></div>
                            </div>
                            <div class="ss-slider-cont ss-slider-cont-prev"><i class="fal fa-angle-left"></i></div>
                            <div class="ss-slider-cont ss-slider-cont-next"><i class="fal fa-angle-right"></i></div>
                        </div>
                    </div>
                    
                    <div class="fl-wrap text-block">
                        <div class="pr-tags">
                            <span>Empowering Timor Leste with Technology </span>
                        </div>
                        <div class="clearfix"></div>
                        
                        <!-- Ini akan memanggil teks dinamis dari database -->
                        {!! isset($page) ? $page->content : '' !!}
                        
                    </div>
                </div>
                <div class="section-number"> <span>0</span>1. </div>
            </section>
        </div>
    </div>
    <div class="to-top-btn to-top"><i class="fal fa-long-arrow-up"></i></div>
</div>
@endsection