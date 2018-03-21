<?php 
get_header();

    // Intégration du bloc featured
    get_template_part("partials/featured");

    // Liste des articles
    if (have_posts())
        get_template_part("partials/articles/list");
    else
        get_template_part("partials/articles/none");

get_footer();