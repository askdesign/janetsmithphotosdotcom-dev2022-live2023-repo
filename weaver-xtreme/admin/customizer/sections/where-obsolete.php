<?php

/**
 * Define the sections and settings for the Layout panel
 */


function weaverx_customizer_define_obsolete_sections() {
	global $wp_customize;
	$panel = 'weaverx_where-obsolete';
	$obsolete_sections = array();


	/* =========================================== Layout: Full Width Options ======================================== */

	$obsolete_sections['obsolete-fullwidth'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Full Width Options', 'weaver-xtreme' ),
		'description' => __( '<h3>HEY! WHERE ARE THE FULL WIDTH OPTIONS?</h3><p>In previous versions of Weaver Xtreme, this menu supported several options to create full width sites. Most of these options have been removed from Weaver Xtreme Version 5, but will be <em>automatically converted</em> to equivalent Align settings when settings created by previous versions of Weaver Xtreme are loaded.</p>', 'weaver-xtreme' ),
		'options'     => weaverx_obsolete_fullwidth_opts(),
	);

	$obsolete_sections['obsolete-sitebg'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Site BG Image', 'weaver-xtreme' ),
		'description' => '',
		'options'     => weaverx_obsolete_sitebg_opts(),
	);

	// --- Elementor

	if ( defined( 'ELEMENTOR_VERSION' ) ) {
		$obsolete_sections['pb-elementor'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Elementor', 'weaver-xtreme' ),
			'description' => esc_html__( 'Weaver theme overrides for Elementor Page Builder. Elementor now has options that make these options unnecessary. These will be removed in future versions of Weaver Xtreme.', 'weaver-xtreme' ),
			'options'     => array(

				'pb-title1' => weaverx_cz_group_title( __( 'Elementor Default Colors (Global)', 'weaver-xtreme' ),
					__( 'You can override the Elementor per Page/Post Default Color Palette values ( Primary, Secondary, Text, and Accent ) globally by setting as many of the following color values you wish. These colors will be used for ALL Elementor Pages or Posts, whether or not you have chosen a Color Palette, or have disabled the Default Colors in the Elementor:Settings admin menu. The goal is to allow you to match your Weaver theme settings with your Elementor designs. You do not need to set all four colors. Any you don\'t specify will show the default Elementor color.', 'weaver-xtreme' ) ),

				'elementor_primary_color' => weaverx_cz_color(
					'elementor_primary_color',
					__( 'Elementor Primary Color', 'weaver-xtreme' ),
					__( 'The Primary color is used for Elementor Titles and other elements.', 'weaver-xtreme' ),
					'refresh'
				),

				'elementor_secondary_color' => weaverx_cz_color(
					'elementor_secondary_color',
					__( 'Elementor Secondary Color', 'weaver-xtreme' ),
					__( 'The Secondary color is used in just a few Elementor elements.', 'weaver-xtreme' ),
					'refresh'
				),


				'elementor_text_color' => weaverx_cz_color(
					'elementor_text_color',
					__( 'Elementor Text Color', 'weaver-xtreme' ),
					__( 'The Text color is used as the main text color in most of the Elementor elements.', 'weaver-xtreme' ),
					'refresh'
				),

				'elementor_accent_color' => weaverx_cz_color(
					'elementor_accent_color',
					__( 'Elementor Accent Color', 'weaver-xtreme' ),
					__( 'The Accent color is used as ta highlight color in some Elementor elements such as the TAB element.', 'weaver-xtreme' ),
					'refresh'
				),
			),

		);
	}


	return $obsolete_sections;
}


/* ########################################### Options Implementation ####################################### */

/* =========================================== Layout: Full Width Options =================================== */

function weaverx_obsolete_fullwidth_opts() {

	$opts = array();

	$opts['layout-core-nowobs-opts2'] = weaverx_cz_group_title(
		__( 'Full Width Options Now Obsolete', 'weaver-xtreme' ),
		__( '<h3>HERE\'S THE STORY</h3> <p>Most Full Width Site options from previous versions of Weaver Xtreme have been removed for Version 5. The only retained options are the old Full-Width BG Color options. ALL of the other full width options (One Step, Extend BG Attributes, and Stretch (expand)) are no longer available, or needed. They will all be automatically converted to the fully equivalent Align options available in <em>Weaver Xtreme Version 5.</em></p><p>Note that the old settings are also deleted, so settings saved from <em>Weaver Xtreme Version 5</em> are NOT 100% compatible with previous version of the theme, although the new setting can be used and will not "break" most old settings - just the Extend BG and Stretch settings.</p>', 'weaver-xtreme' )
	);


	$opts['site_layoutxx'] = weaverx_cz_group_title(
		__( 'One-Step Site Layout', 'weaver-xtreme' ),
		__( '<p>The former <em>One-Step Site Layout</em> is no longer supported. The former options "Full - Extend BG to full width" to the equivalent and "Stretched - Expand to full width" options are automatically converted to the equivalent Align options now available in Weaver Xtreme Version 5.</p>', 'weaver-xtreme' )
	);

	$opts['wrapper_fullwidthxx'] = weaverx_cz_group_title(
		__( 'Stretch Entire Site Full Width', 'weaver-xtreme' ),
		__( 'This obsolete option is automatically converted to the new Wrapper Area "Stretch Full width" alignment.', 'weaver-xtreme' )
	);

	$opts['fullwidth-expand-header'] = weaverx_cz_group_title(
		__( 'Full Width Expand BG Attributes and Width Stretch Options', 'weaver-xtreme' ),
		__( 'Many page areas generated by Weaver Xtreme formerly had "Full Width Expand BG Attributes" and "Stretch Area" options. These are all automatically converted.', 'weaver-xtreme' )
	);

	$opts['extend_bg_title'] = weaverx_cz_group_title(
		__( 'Extend BG with Color Options', 'weaver-xtreme' ),
		__( 'These options were first added to Weaver Xtreme many years ago, and were a "state-of-the-art" technique at the time to achieve full-width layouts. This technique has now been largely replaced by Align options. However, these old options do allow designs to use different colors for possibly interesting effects. However, there are many ways to achieve similar results, and so these options will be REMOVED from future versions of Weaver Xtreme. For now, we <strong>strongly</strong> urge you to not use these options on new sites, and to convert any use on old sites to new design. When these options are eventually dropped, they will be automatically converted to the Extend BG Attributes alignment.', 'weaver-xtreme' )
	);

	/* reference list of extend_bgcolor options
	$extend_bgcolor = array(
		// extend provided bgcolor
		'header_extend_bgcolor',
		'm_primary_extend_bgcolor',
		'm_secondary_extend_bgcolor',
		'm_extra_extend_bgcolor',
		'container_extend_bgcolor',
		'content_extend_bgcolor',
		'footer_extend_bgcolor',
	); */

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {

		$opts['header_extend_bgcolor'] = weaverx_cz_color_plus( 'header_extend_bgcolor',
			__( 'Header Full-width BG Color', 'weaver-xtreme' ),
			__( 'Extend this BG color to full theme width. You can use only one of the "Attributes" vs. "Color" option.', 'weaver-xtreme' ), 'refresh' );

		$opts['m_primary_extend_bgcolor'] = weaverx_cz_color_plus( 'm_primary_extend_bgcolor',
			__( 'Primary Menu Full-width BG color', 'weaver-xtreme' ), '', 'refresh' );

		$opts['m_secondary_extend_bgcolor'] = weaverx_cz_color_plus( 'm_secondary_extend_bgcolor',
			__( 'Secondary Menu Full-width BG color', 'weaver-xtreme' ), '', 'refresh' );

		$opts['container_extend_bgcolor'] = weaverx_cz_color_plus( 'container_extend_bgcolor',
			__( 'Container Full-width BG color', 'weaver-xtreme' ), '', 'refresh'
		);

		$opts['footer_extend_bgcolor'] = weaverx_cz_color_plus( 'footer_extend_bgcolor',
			__( 'Footer Full-width BG color', 'weaver-xtreme' ),
			__( 'Extend this BG color to full theme width on Desktop View.', 'weaver-xtreme' ),
			'refresh'
		);

	} else {
		$opts['extend_bg_titlealt'] = weaverx_cz_group_title(
			'',
			__( 'These options will be displayed only on the <em>FULL</em> settings interface level.', 'weaver-xtreme' )
		);
	}

	return $opts;
}

function weaverx_obsolete_sitebg_opts() {
	$opts = array();


	$opts['xbg-obsolete'] = weaverx_cz_heading(
		__( 'Plus Site BG Image Obsolete', 'weaver-xtreme' ),
		__( '<large style="color:red;">WARNING!</large> use of <em>Site BG Image</em> here is obsolete and can conflict with using the much better <em>Background Images - Standard WP</em> found on the options one level back from here. Using this option is NOT recommended.', 'weaver-xtreme' )
	);

	$opts = array_merge( $opts,
		weaverx_cz_add_image( 'body', esc_html__( 'Site BG Image', 'weaver-xtreme' ),
			esc_html__( 'Background image for entire site (body)', 'weaver-xtreme' ),
			'postMessage', 'XPlus' )
	);

	return $opts;

}
