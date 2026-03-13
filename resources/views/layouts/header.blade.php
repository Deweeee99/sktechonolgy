@php
    $globalContact = \App\Models\Contact::first() ?? (object)[
        'email' => 'info@sktechnology.com'
    ];
@endphp

<div id="main">
    <header class="main-header">
        <a href="{{ url('/') }}" class="ajax logo-holder"><img src="{{ asset('images/SK Color 93x44.png') }}" alt="SK Technology"></a>
        <div class="nav-button but-hol">
            <span class="ncs"></span>
            <span class="nos"></span>
            <span class="nbs"></span>
            <div class="menu-button-text">Menu</div>
        </div>
        
        <div class="header-contacts">
            <!-- 1. Menu Khusus Company Overview (Sembunyikan default-nya) -->
            <div id="header-nav-company" style="display: none;">
                <nav class="scroll-init page-scroll-nav_wrap">
                    <ul class="no-list-style init_hidden_filter">
                        <li><a class="scroll-link fbgs act-sec" href="#sec1" data-bgtext="01"><span>About</span></a></li>
                        <li><a class="scroll-link fbgs" href="#sec5" data-bgtext="05"><span>Clients</span></a></li>
                    </ul>
                </nav>
            </div>

            <!-- 2. Menu Default Email (Sembunyikan default-nya) -->
            <div id="header-nav-default" style="display: none;">
                <ul>
                    <li><span>01. Write </span> <a href="mailto:{{ $globalContact->email }}">{{ $globalContact->email }}</a></li>
                </ul>
            </div>

            <a href="{{ url('/contacts') }}" class="ajax contacts-btn">Get in touch</a>
        </div>
    </header>
    
    <aside class="left-header">
        <span class="lh_dec color-bg"></span>
    </aside>
    
    <div class="hc_dec_color">
        <div class="page-subtitle"><span></span></div>
    </div>
    
    <div id="wrapper">
        <div class="nav-holder">
            <div class="nav-holder-wrap but-hol">
                <div class="nav-container fl-wrap">
                    <nav class="nav-inner" id="menu">
                        <!-- Class PHP statis kita hapus, digantikan sepenuhnya oleh Javascript di bawah -->
                        <ul>
                            <li><a href="{{ url('/') }}" class="ajax">Home</a></li>
                            <li><a href="{{ url('/company-overview') }}" class="ajax">Company Overview</a></li>
                            <li><a href="{{ url('/what-we-do') }}" class="ajax">What We Do</a></li>
                            <li><a href="{{ url('/timor-leste') }}" class="ajax">TIMOR LESTE</a></li>
                            <li><a href="{{ url('/contacts') }}" class="ajax">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="nav-footer"><span>&#169;  SK Technology 2026   /  All rights reserved. </span></div>
                <div class="nav-holder-wrap_line"></div>
                <div class="nav-holder-wrap_dec"></div>
            </div>
        </div>
        <div class="nav-overlay"></div>

<!-- ==============================================
     JAVASCRIPT UNTUK AJAX TEMPLATE ROUTING
     ============================================== -->
<script>
    function updateHeaderState() {
        var path = window.location.pathname;

        // 1. GANTI TAMPILAN HEADER KANAN ATAS
        if (path.includes('company-overview')) {
            document.getElementById('header-nav-company').style.display = 'block';
            document.getElementById('header-nav-default').style.display = 'none';
        } else {
            document.getElementById('header-nav-company').style.display = 'none';
            document.getElementById('header-nav-default').style.display = 'block';
        }

        // 2. UPDATE MENU ACTIVE STATE (Warna Menu di Nav Sidebar)
        var menuLinks = document.querySelectorAll('#menu a');
        menuLinks.forEach(function(link) {
            link.classList.remove('act-link'); // Hapus yang lama
            
            // Cek jika URL di link sama persis dengan URL browser saat ini
            var linkUrl = link.getAttribute('href').replace(window.location.origin, '');
            if (path === linkUrl || (path === '/' && linkUrl === '')) {
                link.classList.add('act-link');
            }
        });
    }

    // Jalankan pertama kali saat website dibuka
    document.addEventListener('DOMContentLoaded', updateHeaderState);

    // Jalankan setiap kali template selesai melakukan AJAX transisi halaman
    if (typeof jQuery !== 'undefined') {
        jQuery(document).ajaxComplete(function() {
            // Beri jeda sangat singkat agar URL di browser terganti dulu sebelum dicek
            setTimeout(updateHeaderState, 50); 
        });
    }

    // Jalankan ketika user menekan tombol Back / Forward di Browser
    window.addEventListener('popstate', updateHeaderState);
</script>