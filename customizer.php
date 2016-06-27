<?php
/**
 * Theme Cutomizer.
 */
function starter_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/**
	* Options section
	*/
	$wp_customize->add_section( 'starter-options', 
		array(
			'title' => __( 'Theme options', 'starter' ),
			'capability' => 'edit_theme_options',
			'description' => __( 'Change the default theme options', 'starter' )
		)
	);


	/**
	* Sidebar layout
	*/
	$wp_customize->add_setting( 'sidebar_layout',
		array(
			'default' => 'sidebar-right',
			'type' => 'theme_mod',
			'sanitize_callback' => 'starter_sanitize_sidebar_layout',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'sidebar_layout', 
		array(
			'type' => 'radio',
			'label' => __( 'Sidebar positioning', 'starter' ),
			'choices' => array(
				'sidebar-right' => __( 'Right sidebar', 'starter' ),
				'sidebar-left' => __( 'Left sidebar', 'starter' ),
				'sidebar-none' => __( 'No sidebar', 'starter' )
			),
			'section' => 'starter-options'
		)
	);





}
add_action( 'customize_register', 'starter_customize_register' );

function starter_sanitize_sidebar_layout( $value ) {
	if ( !in_array( $value, array( 'sidebar-left', 'sidebar-right', 'sidebar-none' ) ) ) {
		$value = 'sidebar-right';
	}
	return $value;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function starter_customize_preview_js() {
	wp_enqueue_script( 'mikhail_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'starter_customize_preview_js' );


