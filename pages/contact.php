<?php
/*
Template Name: Contact
*/

get_header();

switch ( get_current_language("slug") ) {

    case "en":
        echo do_shortcode('[contact-form-7 id="64" title="Contact Form (en)"]');
        break;

    case "it":
        echo do_shortcode('[contact-form-7 id="67" title="Contact Form (it)"]');
        break;

    default:
    case "fr":
        echo do_shortcode('[contact-form-7 id="60" title="Contact"]');
        break;
}

get_footer();