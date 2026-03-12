@extends('layouts.app')

@section('content')
    <div class="content full-height no-mob-hidden2" data-pagetitle="Contacts">
       <div class="content-inner">
          <div class="content-front">
             <div class="cf-inner">
                <div class="contact-details-title fl-wrap">
                   <h2>Contact Details</h2>
                </div>
                <div class="contact-details fl-wrap">
                   <ul>
                      <!-- Email Dinamis -->
                      <li><span>01. Mail :</span><a href="mailto:{{ $contact->email }}" target="_blank">{{ $contact->email }}</a></li>
                      <!-- Address Dinamis -->
                      <li><span>02. Address :</span><a href="#" target="_blank">{{ $contact->address }}</a></li>
                   </ul>
                </div>
                <a href="#" class="btn fl-btn color-bg show_contact-form"><span>Say Hello</span></a> 
                <div class="aside-show_cf show_contact-form"><i class="fal fa-envelope"></i></div>
             </div>
          </div>
          <div class="content-back">
             <div class="hidden-contact_form-wrap_inner">
                <div class="close-contact_form cnt-anim"><i class="fal fa-times"></i></div>
                <div class="contact-details-title fl-wrap">
                   <h2>Get in Touch</h2>
                </div>
                <div id="contact-form" class="fl-wrap">
                   <div id="message"></div>
                   <form class="custom-form" action="#" name="contactform" id="contactform">
                      <fieldset>
                         <div class="row">
                            <div class="col-sm-6">
                               <input type="text" name="name" id="name" placeholder="Your Name *" value=""/>
                            </div>
                            <div class="col-sm-6">
                               <input type="text" name="email" id="email" placeholder="Email Address *" value=""/>
                            </div>
                         </div>
                         <textarea name="comments" id="comments" cols="40" rows="3" placeholder="Your Message:" class="cnt-anim"></textarea>
                         <button class="btn fl-btn color-bg" id="submit"><span>Send Message</span> </button>
                      </fieldset>
                   </form>
                </div>
             </div>
          </div>
       </div>
       
       <div class="map-container">
          <!-- Koordinat Map & Popup Text Dinamis -->
          <div id="map-single" class="map" data-latlog="[{{ $contact->map_lat }}, {{ $contact->map_lng }}]" data-popuptext="{{ $contact->map_popup }}"></div>
       </div>

       <div class="main_social">
         <span class="main-social-title">Find on:</span>
         <ul>
            <li><a href="{{ $contact->facebook ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="{{ $contact->instagram ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="{{ $contact->twitter ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
         </ul>
      </div>
    </div>
@endsection