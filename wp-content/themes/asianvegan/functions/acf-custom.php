<?php
/*
*
*  Contiene los campos personalizados añadidos como default en WPKit
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/

/************************************************************************************************************************
* Custom avatar - Requiere ACF's */
	
		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array (
				'key' => 'group_58018033d8b8a',
				'title' => 'Profile Avatar',
				'fields' => array (
					array (
						'key' => 'field_5801803c55db7',
						'label' => 'Avatar',
						'name' => 'wk_custom_avatar',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'icon-large',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'user_form',
							'operator' => '==',
							'value' => 'edit',
						),
					),
					array (
						array (
							'param' => 'user_form',
							'operator' => '==',
							'value' => 'register',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

		endif;

	/* Callback

		$user_ID = get_current_user_id();
		$user_ID_composed = 'user_' . $user_ID;
		$avatar_field = get_field('custom_avatar', $user_ID_composed );

		echo $avatar_field['sizes'][ 'thumbnail' ];

		info: https://www.advancedcustomfields.com/resources/how-to-get-values-from-a-user/

	*/
