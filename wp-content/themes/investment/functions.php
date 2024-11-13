<?php
//Carregamento de scripts e estilos
function investment_scripts() {
    wp_enqueue_style( 'investment-styles', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'investment_scripts' );

add_theme_support( 'post-thumbnails' );
?>
