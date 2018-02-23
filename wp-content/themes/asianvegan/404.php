<?php 
/**
*
*  Página 404
*
* @package WPKit
* @author ALUMIN
* @copyright Copyright (C) Alumin.Agency
* @version WPKIT 3.0
*
*/
?>

<style>

	body {
	    font-family: sans-serif;
	    background-color: #ececec;
	    display: flex;
	    flex-direction: column;
	    align-items: center;
	    justify-content: center;
	    text-align: center;
	    color: rgba(0, 0, 0, 0.73);
	}

	h1 {
	    font-size: 160px;
	    margin: 32px 0;
	    font-weight: 900;
	}
	
</style>

<div class="container">

      <h1>404</h1>

      <h2>Página no encontrada</h2>

      <p>Algo salió mal, no encontramos lo que estas buscando, intenta <a href="javascript:history.go(-1)">volver</a> o regresa a <a href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a>.</p>

</div>
