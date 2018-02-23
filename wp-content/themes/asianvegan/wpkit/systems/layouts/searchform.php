<?php 
/**
*
*  searchform.php es un template de wordpress
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
?>

      <section id="searchform">

            <form method="get" action="<?php bloginfo('home'); ?>/">

                  <input class="search" type="text" name="s" value="Buscar..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
                  <span id="search-icon" class="icon toggle fa fa-search"></span>
                  <!--<button type="submit" value="" class="button" />Buscar</button>-->

            </form>

      </section>

