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

    <div class="content"  data-pagetitle="about me">
        <div class="page-scroll-nav">
            <ul>
                
            </ul>
            <nav class="scroll-init page-scroll-nav_wrap">
                <ul class="no-list-style init_hidden_filter">
                    <li><a class="scroll-link fbgs act-sec" data-bgtext="01"><span>info@sktechnology.com</span></a></li>
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
                    <h2>About <br> SK Technology</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
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
                <section class="scroll_sec" id="sec1">
                    <div class="container">
                        <div class="section-title">
                            <h3>Company Overview </h3>
                            <p>We are a modern IT solutions company delivering secure, scalable, and innovative technology to help businesses grow and adapt in a digital world.  </p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="main-about fl-wrap">
                                    <h2>Innovative solutions to boost <br><span> your creative </span>  projects</h2>
                                    
                                    <!-- Ini memanggil teks dinamis dari database -->
                                    {!! $page->content !!}
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-number"> <span>0</span>1. </div>
                </section>
                <div class="section-separator fl-wrap"><span></span></div>
                
                <div class="section-separator fl-wrap"><span></span></div>
                
                <section class="scroll_sec" id="sec5">
                    <div class="container">
                        <div class="section-title">
                            <h3>STRATEGIC PARTNERS</h3>
                            <p>We collaborate with strategic technology partners to strengthen solution capabilities, ensure high-quality delivery, and support complex national and enterprise-level projects.  </p>
                        </div>
                        
                        <div class="fl-wrap client-list">
                            <ul class="">
                                <li><a href="#" target="_blank"><img src="{{ asset('images/clients/ajari.png') }}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{ asset('images/clients/hydsoft.png') }}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{ asset('images/clients/tech5.png') }}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{ asset('images/clients/pat.png') }}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{ asset('images/clients/interbio.png') }}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{ asset('images/clients/bright.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="section-number"> <span>0</span>5. </div>
                </section>
            </div>
        </div>
        <div class="to-top-btn to-top"><i class="fal fa-long-arrow-up"></i></div>
    </div>
@endsection