<?php 
////////// SETUP
// Fonctions à initialiser lors de l'affichage de la page

function the_setup() {
    
    // Si je ne suis pas sur wp-admin...
    if (!is_admin()) {
        
        // Chargement des styles
        wp_enqueue_style("bootstrap4", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        wp_enqueue_style("blog", "https://getbootstrap.com/docs/4.0/examples/blog/blog.css");
        wp_enqueue_style("main", WP_THEME."/assets/css/main.css");

        // Chargement des scripts
        wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.2.1.min.js", array() ,"3.2.1", true);
        wp_enqueue_script("popperjs", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", array(), "1.12.9", true);
        wp_enqueue_script("bootstrap4", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", array("jquery", "popperjs"), "4.0.0", true);
        wp_enqueue_script("holderjs", "https://getbootstrap.com/assets/js/vendor/holder.min.js", array(), false, true);

    }

}

function tag_setup() {
    // Ajoute la balise <title>
    add_theme_support("title-tag");
}

// add_action( quand, quoi );
add_action( "wp_loaded" , "the_setup" );
add_action( "after_setup_theme" , "tag_setup" );

// Active la gestion des Menus
function activate_menus_management() {
    register_nav_menu("new_menu", "New menu");
}
add_action("init", "activate_menus_management");

// Définition de la longueur des aperçus d'articles en nombre de mot
function custom_excerpt_length() {
    return 20;
}
add_filter("excerpt_length", "custom_excerpt_length", 999);



// Formatage des boutons article "précédent" et "suivant"
function post_link_attributes($input) {
    $injection = 'class="btn btn-outline-primary"';
    $output = str_replace('<a href=', '<a '.$injection.' href=', $input);
    return $output;
}

add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');
