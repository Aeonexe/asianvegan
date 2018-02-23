<?php 

// Obtiene el título de la primer categoría
// Revisar si funciona en CPT's o Páginas

function wk_the_first_category_title() {
     $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        echo esc_html( $categories[0]->name );   
    }
}