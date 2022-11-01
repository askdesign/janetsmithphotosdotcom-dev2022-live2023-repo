<?php

/**
 * Define the sections and settings for the panel template panel
 */
function weaverx_customizer_define_template_sections() {
	global $wp_customize;

	$panel = 'weaverx_where-template';
	$template_sections = array();


	/**
	 * General
	 */

	$template_sections['template-global'] = array(
		'panel'       => $panel,
		'title'       => __( 'Global template Settings', 'weaver-xtreme' ),
		'description' => 'Set template options for Site Wrapper &amp; Container. Use Colors to set colors.',
		'options'     => weaverx_controls_template_global(),

	);

	/**
	 * Move WP standard sections to this panel
	 */

	//$wp_customize->get_section( 'header_images' )->priority = 10505;
	//$wp_customize->get_section( 'header_images' )->panel = $panel;

	/**
	 * template Section1
	 */

	$template_sections['template-section1'] = array(
		'panel'   => $panel,
		'title'   => __( 'Section 1', 'weaver-xtreme' ),
		'description' => __( 'Options for Section1', 'weaver-xtreme' ),
		'options' => weaverx_controls_template_section1(),
	);


	/**
	 * template Section2
	 */

	$template_sections['template-section2'] = array(
		'panel'       => $panel,
		'title'       => __( 'Section 2', 'weaver-xtreme' ),
		'description' => __( 'Options for Section2', 'weaver-xtreme' ),
		'options'     => weaverx_controls_template_section2(),
	);


	return $template_sections;
}

// the definitions of the controls for each panel follow


function weaverx_controls_template_global() {
	$opts = array();

	$opts['template-heading-global'] = weaverx_cz_group_title(
		__( 'Global template Settings', 'weaver-xtreme' ),
		__( 'These settings are global.', 'weaver-xtreme' ) );
	return $opts;
}

function weaverx_controls_template_section1() {
	$opts = array();

	$opts['template-sec1-title'] = weaverx_cz_group_title(
		__( 'Section1 Settings', 'weaver-xtreme' ),
		__( 'These settings are 1111.', 'weaver-xtreme' ) );
	return $opts;
}

function weaverx_controls_template_section2() {
	$opts = array();

	$opts['template-sec2-title'] = weaverx_cz_group_title(
		__( 'Section2 Settings', 'weaver-xtreme' ),
		__( 'These settings are 2222.', 'weaver-xtreme' ) );
	return $opts;
}

