@extends('layouts.app')

@section('content')
    @php
        // Filter relasi galleries khusus untuk tipe 'background'
        $bgGallery = isset($page) ? $page->galleries->where('type', 'background')->first() : null;
        
        // Atur default image jika admin belum mengupload background
        $bgImg = asset('images/bg/festival.jpg'); 
        if ($bgGallery) {
            $bgImg = str_starts_with($bgGallery->image, 'images/') ? asset($bgGallery->image) : asset('storage/' . $bgGallery->image);
        }
    @endphp

    <div class="content"  data-pagetitle="What We Do">
        <div class="page-scroll-nav">
            <nav class="scroll-init page-scroll-nav_wrap">
                <ul class="no-list-style init_hidden_filter">
                    
                </ul>
                <div class="psn_button act-filter"><i class="fal fa-sort"></i> FIlter </div>
            </nav>
        </div>
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
                    <h2>What We Do <br> SK Technology</h2>
                </div>
                <div class="fixed-column-dec"></div>
                <div class="scroll-notifer">Scroll Down  </div>
                <div class="section-counter">
                    <div class="sc_current"><span>01</span></div>
                    <div class="sc_total"></div>
                </div>
                <div class="fcwc-pagination fcwc-wrap"></div>
            </div>
        </div>
        <div class="column-wrap">
            <div class="column-wrap-container fl-wrap">
                <div class="col-wc_dec"></div>
            
                <div class="section-separator fl-wrap"><span></span></div>
                <section class="scroll_sec" id="sec2">
                    <div class="container">
                        <div class="section-title">
                            <h3>Services Provided</h3>
                        </div>

                        <!-- Teks Dinamis dipasang di sini -->
                        <div class="fl-wrap" style="margin-bottom: 30px;">
                            {!! $page->content !!}
                        </div>

                        <div class="process-wrap fl-wrap">
                            <div class="row">
                                <!-- Looping Data Layanan / Services -->
                                @foreach($services as $service)
                                <div class="col-sm-6">
                                    <div class="process-details">
                                        <span class="pd-icon">
                                            <i class="{{ $service->icon }}"></i>
                                        </span>
                                        <h4>{{ $service->title }}</h4>
                                        <div class="clearfix"></div>
                                        <p>{{ $service->description }}</p>
                                        <span class="process-numder">{{ $service->order_number }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="section-number"> <span>0</span>2. </div>
                </section>
                <div class="section-separator fl-wrap"><span></span></div>
                
                        
            </div>
        </div>
        <div class="to-top-btn to-top"><i class="fal fa-long-arrow-up"></i></div>
    </div>
@endsection
