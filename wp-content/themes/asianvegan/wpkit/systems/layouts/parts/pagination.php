<?php 
/*
*
*  Ofrece un control mayor sobre la paginación.
*  Utiliza como alternativa echo '<nav id="pagination">' . paginate_links('prev_text=Anterior&next_text=Siguiente') . '</nav>'
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
?>

      <nav id="pagination">

            <?php

                  global $wp_query;	
                  $pagination = 999999999; // se necesita especificar un número poco probable de posts para mostrar

                  echo paginate_links( array(
                        'base' => str_replace( $pagination, '%#%', esc_url( get_pagenum_link( $pagination ) ) ),
                        'current' => max( 1, get_query_var('paged') ),
                        'format' => '?paged=%#%',                              
                        'total' => $wp_query->max_num_pages,
                        'prev_next'    => True,
                        'prev_text'    => __('« '),
                        'next_text'    => __(' »')
                  ) );

            ?>

      </nav>