<?php
/**
 * Tema Hijo de Astra para OneOrbix
 * 
 * Este archivo carga los estilos del tema padre y agrega personalizaciones
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Función para cargar los estilos del tema padre y los estilos personalizados
 */
function astra_child_enqueue_styles() {
	// Obtener la versión del tema padre
	$parent_style = 'astra-style';
	$parent_version = wp_get_theme( 'astra' )->get( 'Version' );
	
	// Cargar el estilo del tema padre
	wp_enqueue_style( 
		$parent_style, 
		get_template_directory_uri() . '/style.css', 
		array(), 
		$parent_version 
	);
	
	// Cargar el estilo del tema hijo (si existe)
	wp_enqueue_style( 
		'astra-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);
	
	// Cargar el CSS personalizado para el fix del menú desplegable
	wp_enqueue_style(
		'astra-child-menu-fix',
		get_stylesheet_directory_uri() . '/assets/css/custom-menu-fix.css',
		array( $parent_style ),
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles', 15 );

