<?php

function add_stylesheet_to_head() {
    echo "<link href='/style.css' rel='stylesheet' type='text/css'>";
}

add_action( 'wp_head', 'add_stylesheet_to_head' );
?>
