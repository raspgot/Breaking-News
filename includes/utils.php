<?php 
////////// UTILS
// Définition des fonctions utiles à l'app.




// -- Assets Utils


// Récupère l'adresse d'une image
function get_image($file) {
    return WP_THEME."/assets/images/".$file;
}

// Récupère l'adresse d'une feuille de style
function get_style($file) {
    return WP_THEME."/assets/css/".$file;
}

// Récupère l'adresse d'un fichier JS
function get_script($file) {
    return WP_THEME."/assets/js/".$file;
}




// -- Languages Utils


// Génére et retourne la liste des langues disponible
// slug => nom de la langue
function get_languages() {
    return array_combine( 
        pll_languages_list(array("fields" => "slug")),  
        pll_languages_list(array("fields" => "name"))
    );
}

// Test si Polylang est activé et retourne la langue courante
function get_current_language( $key="slug" )
{
    if (is_plugin_actived("polylang")) {
        return pll_current_language($key);
    }
    return null;
}




// -- Navigation (menu) Utils


// Récup. des entrés d'un menu
function get_menu_by_slug($slug) {

    // detection de la langue du site
    $lang = get_current_language();

    // var_dump( $slug );
    if ($lang != null) $slug.= "-".$lang;
    // var_dump( $slug );

    // Recup du menu
    $menu = wp_get_nav_menu_items($slug);

    return $menu ? $menu : array();

    // !$menu ? $menu : array();
    // 
    // revien à écrire
    //
    // if (!$menu) {
    //     return $menu;
    // } else {
    //     return array();
    // }

}

// Récup de l'url d'un post selon la langue
function get_route($post_id, $slug=false) {
    $slug = $slug ? $slug : pll_current_language("slug");
    $translations = pll_get_post_translations($post_id);

    if (isset($translations[$slug])) {
        return get_permalink( $translations[$slug] );
    } else {
        return get_permalink( $post_id );
    }
}




// -- Plugins Utils


function active_plugins() {
    $plugins = [];
    $active_plugins = get_option("active_plugins");
    
    foreach ($active_plugins as $plugin) {
        $string = explode("/", $plugin);
        array_push($plugins, $string[0]);
    }

    return $plugins;
}

// Test si le nom du plugin ($name) se trouve dans la liste des plugins actives
function is_plugin_actived( $name=null ) {
    return in_array($name, active_plugins());
}
