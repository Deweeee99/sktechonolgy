@php
    $globalContact = \App\Models\Contact::first() ?? (object)[
        'email' => 'info@sktechnology.com'
    ];
@endphp
<div id="main">
            <header class="main-header">
                <a href="{{ url('/') }}" class="ajax logo-holder"><img src="{{ asset('images/SK Color 93x44.png') }}" alt="SK Technology"></a>
                <div class="nav-button but-hol">
                    <span  class="ncs"></span>
                    <span class="nos"></span>
                    <span class="nbs"></span>
                    <div class="menu-button-text">Menu</div>
                </div>
                <div class="header-contacts">
                    @if (request()->is('company-overview'))
                        <nav class="scroll-init page-scroll-nav_wrap">
                            </nav>
                    @else
                    <ul>
                        <li><span>01. Write </span> <a href="mailto:{{ $globalContact->email }}">{{ $globalContact->email }}</a></li>
                    </ul>
                    @endif
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
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'act-link' : ''}}">Home</a>
                                    </li>
                                    <li><a href="{{ url('/company-overview') }}" class="ajax {{ request()->is('company-overview' ? 'act-link' : '') }}">Company Overview</a></li>
                                    <li><a href="{{ url('/what-we-do') }}" class="ajax {{ request()->is('what-we-do') ? 'act-link' : '' }}">What We Do</a></li>
                                    <li><a href="{{ url('/timor-leste') }}" class="ajax {{ request()->is('timor-leste') ? 'act-link' : '' }}">TIMOR LESTE</a></li>
                                     <li><a href="{{ url('/contacts') }}" class="ajax {{ request()->is('contacts') ? 'act-link' : '' }}">Contacts</a></li>
                                </ul>
                            </nav>
                            </div>
                        <div class="nav-footer"><span>&#169;  SK Technology 2026   /  All rights reserved. </span></div>
                        <div class="nav-holder-wrap_line"></div>
                        <div class="nav-holder-wrap_dec"></div>
                    </div>
                </div>
                <div class="nav-overlay"></div>