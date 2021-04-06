<?php
/**
 * UnderStrap Theme Customizer
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'understrap_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'understrap' ),
				'priority'    => apply_filters( 'understrap_theme_layout_options_priority', 160 ),
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function understrap_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'understrap_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type',
				array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => apply_filters( 'understrap_container_type_priority', 10 ),
				)
			)
		);

		$wp_customize->add_setting(
			'understrap_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'understrap' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'understrap'
					),
					'section'           => 'understrap_theme_layout_options',
					'settings'          => 'understrap_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'          => apply_filters( 'understrap_sidebar_position_priority', 20 ),
				)
			)
		);
	}
} // End of if function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script(
			'understrap_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );


/*
* Customizer boton de whastapp para realizar pedido en productos de woocomerce
*/
if ( ! function_exists( 'understrap_btn_whatsapp_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */

	function understrap_btn_whatsapp_customize_register( $wp_customize ) {
		
		//  layout settings.
		$wp_customize->add_section(
			'understrap_btn_whatsapp_options',
			array(
				'title'       => __( 'Botón WhatsApp', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Este botón de WhatsApp aparece en la página de cada producto y es para hacer el pedido', 'understrap' ),
				'priority'    => 160,
			)
		);

		/**
		 * Telefono de whatsapp
		 */
		$wp_customize->add_setting(
			'understrap_whatsapp_tel',
			array(
				'default'           => '+529621767466',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_whatsapp_tel',
				array(
					'label'       => __( 'Numero de teléfono', 'understrap' ),
					'description' => __( 'Ingrese el número de teléfono con WhatsApp en donde se realizan pedidos', 'understrap' ),
					'section'     => 'understrap_btn_whatsapp_options',
					'settings'    => 'understrap_whatsapp_tel',
					'type'        => 'text',
					'priority'    =>  10 ,
				)
			)
		);
		/*
		Texto del botón
		*/ 

		$wp_customize->add_setting(
			'understrap_whatsapp_cta',
			array(
				'default'           => 'Pídelo ahora',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_whatsapp_cta',
				array(
					'label'             => __( 'Llamado a la acción', 'understrap' ),
					'description'       => __( 'Agregue el texto del botón', 'understrap' ),
					'section'           => 'understrap_btn_whatsapp_options',
					'settings'          => 'understrap_whatsapp_cta',
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_text_field',
					'priority'          => 20,
				)
			)
		);
		/*
		* Mensaje de whatsapp
		*/ 
		$wp_customize->add_setting(
			'understrap_whatsapp_msg',
			array(
				'default'           => '¡Hola Turbointernet!. Quiero hacer un pedido de {title}, {url}',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_textarea_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_whatsapp_msg',
				array(
					'label'             => __( 'Texto del mensaje ', 'understrap' ),
					'description'       => __( 'Agregue el texto del mensaje inicial para hacer el pedido. Agregue las variables {url}, {title} para reemplazar con la URL de la página web actual, el título de la publicación ', 'understrap' ),
					'section'           => 'understrap_btn_whatsapp_options',
					'settings'          => 'understrap_whatsapp_msg',
					'type'              => 'textarea',
					'sanitize_callback' => 'sanitize_textarea_field',
					'priority'          => 20,
				)
			)
		);

	}
	
} // End of if function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_btn_whatsapp_customize_register' );
