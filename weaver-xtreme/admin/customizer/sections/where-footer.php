<?php

/**
 * Define the sections and settings for the w_footer panel
 */
function weaverx_customizer_define_w_footer_sections() {
	global $wp_customize;

	$panel = 'weaverx_where-footer';
	$w_footer_sections = array();


	$w_footer_sections['w_footer-area'] = array(
		'panel'       => $panel,
		'title'       => __( 'Footer Area', 'weaver-xtreme' ),
		'description' => 'Properties for the footer area.',
		'options'     => weaverx_controls_w_footer_area(),

	);

	$w_footer_sections['w_footer-widget-area'] = array(
		'panel'       => $panel,
		'title'       => __( 'Footer Widget Area', 'weaver-xtreme' ),
		'description' => 'Properties for the Footer Widget Area.',
		'options'     => weaverx_controls_w_footer_widget(),

	);

	$w_footer_sections['w_footer-html'] = array(
		'panel'       => $panel,
		'title'       => __( 'Footer HTML', 'weaver-xtreme' ),
		'description' => 'Add arbitrary HTML to Footer Area (in &lt;div id="footer-html"&gt;).',
		'options'     => weaverx_controls_w_footer_html(),

	);

	$w_footer_sections['w_footer-copyright'] = array(
		'panel'       => $panel,
		'title'       => __( ' Site Copyright', 'weaver-xtreme' ),
		'description' => 'Change Site Copyright text.',
		'options'     => weaverx_controls_w_footer_copyright(),

	);

	$w_footer_sections['footer-pb-replace'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Global Footer Area Replacement', 'weaver-xtreme' ),
		'description' => esc_html__( 'Replace Weaver Footer Area with Page Builder page.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_w_footer_replacement(),

	);


	return $w_footer_sections;
}

// the definitions of the controls for each panel follow

function weaverx_controls_w_footer_replacement() {
	// ---- Footer Replace
	$opts = array();

	$opts['pb-ftr1'] = weaverx_cz_group_title( __( 'Footer Replacement', 'weaver-xtreme' ),
		__( 'You can replace the entire Weaver Footer area with the content from a page builder page. None of the standard theme footer elements will be displayed.  You can also specify a Footer Replacement as a Per Page option.', 'weaver-xtreme' ) );

	if ( defined( 'ELEMENTOR_VERSION' ) ) {                // only provide if elementor is active
		$opts['elementor_footer_replacement'] = weaverx_cz_select(
			__( 'Elementor Footer Replacement', 'weaver-xtreme' ),
			__( 'Select an Elementor Page or Post to replace the Footer Area.', 'weaver-xtreme' ),
			'weaverx_cz_choices_elementor_pages', 'none', 'refresh'
		);
	}

	if ( defined( 'SITEORIGIN_PANELS_VERSION' ) ) {        // only provide if siteorigins is active

		$opts['siteorigin_footer_replacement'] = weaverx_cz_select(
			__( 'SiteOrigin Footer Replacement', 'weaver-xtreme' ),
			__( 'Select an SiteOrigin Page or Post to replace the Footer Area.', 'weaver-xtreme' ),
			'weaverx_cz_choices_siteorigin_pages', 'none', 'refresh'
		);
	}

	if ( ! defined( 'ELEMENTOR_VERSION' ) && ! defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
		$opts['no-pb2'] = weaverx_cz_group_title( __( 'No Page Builder Detected', 'weaver-xtreme' ),
			__( 'Sorry, Weaver can only show a list of page builder pages from Elementor or SiteOrigin Page Builder, but you can still provide a page/post ID. Please install and activate one of those plugins.', 'weaver-xtreme' ) );
	}

	$opts['pb_footer_replace_page_id'] = weaverx_cz_textarea(
		__( 'Page or Post ID Footer Replacement', 'weaver-xtreme' ),
		__( 'Provide any page or post ID to serve as footer replacement. Overrides list selection above. Does not have to be from a page builder', 'weaver-xtreme' ),
		1, '', 'refresh', false, 'weaverx_cz_sanitize_int' );

	return $opts;
}


function weaverx_controls_w_footer_area() {
	$opts = array();

	$opts['style-footer-area-vis'] = weaverx_cz_group_title( __( 'Footer Area Visibility', 'weaver-xtreme' ) );

	$opts['footer_hide'] = weaverx_cz_select(
		__( 'Hide Footer Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['style-footer-area-color'] = weaverx_cz_group_title( __( 'Footer Area Colors', 'weaver-xtreme' ) );

	$opts['footer_color'] = weaverx_cz_color(
		'footer_color',
		__( 'Footer Area Text Color', 'weaver-xtreme' )
	);

	$opts['footer_bgcolor'] = weaverx_cz_color( 'header_bgcolor',
		__( 'Footer Area BG Color', 'weaver-xtreme' ),
		'The Footer Area BG Color is used for full width BG color on header.' );

	$opts['footerlink_color'] = weaverx_cz_color(
		'footerlink_color',
		__( 'Footer Links Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['footerlink_hover_color'] = weaverx_cz_color(
		'footerlink_hover_color',
		__( 'Footer Links Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'footer', __( 'Footer Area Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_add_link( 'footerlink', __( 'Footer Area Links Typography', 'weaver-xtreme' ),
		__( 'Typography for links in Footer ( Uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );


	$opts['spacing-heading-footer'] = weaverx_cz_group_title( __( 'Footer Alignment and Spacing', 'weaver-xtreme' ) );


	$opts['footer_align'] = weaverx_cz_select(
		__( 'Align Footer Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['footer_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		__( 'These options control the padding ( inner space ) around the area.', 'weaver-xtreme' ),
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		''
	);

	$opts['footer_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		''
	);

	$opts['footer_padding_LRp'] = weaverx_cz_range_float(
		__( 'Footer Left/Right Padding (%)', 'weaver-xtreme' ),
		__( 'Left and Right Padding in % for Align Wide and Align Full. This allows you to have shrinking margins as the browser width shrinks. On mobile devices, uses 0.5% padding if this option has value.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 25.0,
			'step' => 0.5,
		),
		'refresh',
		''
	);

	$opts['footer_margin_T'] = weaverx_cz_range(
		__( 'Top Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_margin_B'] = weaverx_cz_range(
		__( 'Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_width_int'] = weaverx_cz_range_float(
		__( 'Footer Area Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Footer "Center align" setting. (Default: 100%, 0 means auto)', 'weaver-xtreme' ),
		100.,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'refresh',
		'',
		'footer_align'    // ~ means show if alignwide or alignfull
	);

	$opts['footer_max_width_int'] = weaverx_cz_range(
		__( 'Footer Area Max Width (px)', 'weaver-xtreme' ),
		__( 'This advanced option allows you to set a maximum width for this area. This is not commonly used, but can make interesting designs, especially if you center align the area.  Use 0 for no Max Width.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 4000,
			'step' => 5,
		),
		'postMessage',
		'plus',
		'footer_align'    // ~ means show if alignwide or alignfull
	);


	$opts['style-footer-title'] = weaverx_cz_group_title( __( 'Footer Style', 'weaver-xtreme' ) );

	$opts['footer_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Footer Area', 'weaver-xtreme' )
	);

	$opts['footer_shadow'] = weaverx_cz_select(
		__( 'Add shadow to Footer Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_shadow', '-0', 'postMessage'
	);

	$opts['footer_rounded'] = weaverx_cz_select(
		__( 'Add rounded corners to Footer Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
	);

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
		$opts = array_merge( $opts,
			weaverx_cz_add_image( 'footer', esc_html__( 'Footer BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for Footer area (#colophon)', 'weaver-xtreme' ),
				'postMessage', 'XPlus' )
		);
	}

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['style-footer-area-other'] = weaverx_cz_group_title( __( 'Other', 'weaver-xtreme' ) );

		$opts['_hide_poweredby'] = weaverx_cz_checkbox(
			__( 'Hide Powered By tag', 'weaver-xtreme' ),
			__( 'Hide the WordPress Logo link/notice in the footer. &diams;', 'weaver-xtreme' )
		);

		$opts['footer_add_class'] = weaverx_cz_add_class( __( 'Footer Area: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_w_footer_widget() {
	$opts = array();


	$opts['style-footer-area-wvis'] = weaverx_cz_group_title( __( 'Footer Widget Area Visibility', 'weaver-xtreme' ) );

	$opts['footer_sb_hide'] = weaverx_cz_select(
		__( 'Hide Footer Widget Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);


	$opts['style-footer-area-wcolor'] = weaverx_cz_group_title( __( 'Footer Widget Area Colors', 'weaver-xtreme' ) );


	$opts['footer_sb_color'] = weaverx_cz_color(
		'footer_sb_color',
		__( 'Footer Widget Area Text Color', 'weaver-xtreme' )
	);

	$opts['footer_sb_bgcolor'] = weaverx_cz_color(
		'footer_sb_bgcolor',
		__( 'Footer Widget Area BG Color', 'weaver-xtreme' )
	);

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'footer_sb', __( 'Footer Widget Area Typography', 'weaver-xtreme' ), '', 'postMessage' ) );


	// --- Footer Widget Area Layout

	$opts['style-footer-widget-layout'] = weaverx_cz_group_title( __( 'Footer Widget Area Layout', 'weaver-xtreme' ) );

	$opts['footer_sb_cols_int'] = weaverx_cz_range(
		__( 'Footer Columns of Widgets', 'weaver-xtreme' ),
		'',
		1,
		array(
			'min'  => 1,
			'max'  => 8,
			'step' => 1,
		)
	);

	$opts['layout_full_note3'] = weaverx_cz_html_description(
		'<small>' . __( '<em>Weaver Xtreme Plus</em> includes options for custom column widths, and smart margins.', 'weaver-xtreme' ) . '</small>', 'plus' );

	// ------- Footer Widget Area

	$opts['spacing-widgetarea-footer'] = weaverx_cz_group_title( __( 'Footer Widget Area Alignment and Spacing', 'weaver-xtreme' ),
		__( 'Spacing for the Footer Widget Area', 'weaver-xtreme' ) );

	$opts['footer_sb_width_int'] = weaverx_cz_range_float(
		__( 'Footer Widget Area Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align Footer Widget Area "Center align" setting. (Default: 0, means auto)', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'postMessage'
	);

	$opts['footer_sb_align'] = weaverx_cz_select(
		__( 'Align Footer Widget Area Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['footer_sb_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_sb_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_sb_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_sb_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_sb_margin_T'] = weaverx_cz_range(
		__( 'Top Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_sb_margin_B'] = weaverx_cz_range(
		__( 'Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);



	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['layout-footer-custom-widths'] = weaverx_cz_heading( __( 'Footer Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
			__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' )
		);

		$opts['_footer_sb_lw_cols_list'] = weaverx_cz_textarea(
			__( 'Footer Desktop Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths separated by comma. Use semi-colon ( ; ) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
			'1',
			__( '25,25,50; 60,40; - for example', 'weaver-xtreme' ),
			'refresh',
			'plus'
		);


		$opts['_footer_sb_mw_cols_list'] = weaverx_cz_textarea(
			__( 'Footer Small Tablet Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['_footer_sb_sw_cols_list'] = weaverx_cz_textarea(
			__( 'Footer Phone Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['footer_sb_no_widget_margins'] = weaverx_cz_checkbox(
			__( 'Footer No Smart Widget Margins', 'weaver-xtreme' ),
			__( 'Do not use "smart margins" between  multi-column widgets on rows.', 'weaver-xtreme' )
		);


		$opts['footer_sb_eq_widgets'] = weaverx_cz_checkbox(
			__( 'Footer Equal Height Widget Rows', 'weaver-xtreme' ),
			__( 'Make widgets equal height rows if &gt; 1 column.', 'weaver-xtreme' ),
			'plus'
		);
	}


	// --- Footer Widget Area Style

	$opts['style-footer-widget-h'] = weaverx_cz_group_title( __( 'Footer Widget Area Style', 'weaver-xtreme' ) );


	$opts['footer_sb_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Footer Widget Area', 'weaver-xtreme' )
	);

	$opts['footer_sb_shadow'] = weaverx_cz_select(
		__( 'Add shadow to Footer Widget Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_shadow', '-0', 'postMessage'
	);

	$opts['footer_sb_rounded'] = weaverx_cz_select(
		__( 'Add rounded corners to Footer Widget Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
	);



	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['style-footer-area-oth'] = weaverx_cz_group_title( __( 'Other', 'weaver-xtreme' ) );
		$opts['footer_sb_add_class'] = weaverx_cz_add_class( __( 'Footer Widget Area: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_w_footer_html() {
	$opts = array();

	$opts['footer_html_text'] = array(
		'setting' => array(
			'sanitize_callback' => 'weaverx_cz_sanitize_code',
			'transport'         => 'postMessage',
			'default'           => '',
		),
		'control' => array(
			'control_type' => 'WeaverX_Textarea_Control',
			'label'        => __( 'Footer HTML Content', 'weaver-xtreme' ),
			'description'  => __( 'Add arbitrary HTML to Footer Area (in <&lt;div id="footer-html"&gt;)', 'weaver-xtreme' ),
			'type'         => 'textarea',
			'input_attrs'  => array(
				'rows'        => '3',
				'placeholder' => __( '<!-- Add HTML Here -->', 'weaver-xtreme' ),
			),
		),
	);

	$opts['style-footer-html-wvis'] = weaverx_cz_group_title( __( 'Footer HTML Area Visibility', 'weaver-xtreme' ) );

	$opts['footer_html_hide'] = weaverx_cz_select(
		__( 'Hide Footer HTML Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['style-footer-html-wcol'] = weaverx_cz_group_title( __( 'Footer HTML Area Colors', 'weaver-xtreme' ) );


	$opts['footer_html_color'] = weaverx_cz_color(
		'footer_html_color',
		__( 'Footer HTML Area Text Color', 'weaver-xtreme' )
	);

	$opts['footer_html_bgcolor'] = weaverx_cz_color(
		'footer_html_bgcolor',
		__( 'Footer HTML Area BG Color', 'weaver-xtreme' )
	);

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'footer_html', __( 'Footer HTML Area Typography', 'weaver-xtreme' ), '', 'postMessage' ) );


	$opts['spacing-htmltarea-footer'] = weaverx_cz_group_title( __( 'Footer HTML Area Alignment and Spacing', 'weaver-xtreme' ),
		__( 'Spacing for the Footer HTML Area', 'weaver-xtreme' ) );

	$opts['footer_html_width_int'] = weaverx_cz_range_float(
		__( 'Footer HTML Area Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align HTML Area "Center align" setting. You will have to "Save & Publish" and refresh this page if you are using Center Area align. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
		100.,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'postMessage'
	);

	$opts['footer_html_align'] = weaverx_cz_select(
		__( 'Align Footer HTML Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['footer_html_center_content'] = weaverx_cz_checkbox_post(
		__( 'Center Content within HTML Area', 'weaver-xtreme' )
	);

	$opts['footer_html_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_html_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_html_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_html_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_html_margin_T'] = weaverx_cz_range(
		__( 'Top Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_html_margin_B'] = weaverx_cz_range(
		__( 'Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['style-footer-html-h'] = weaverx_cz_group_title( __( 'Footer HTML Area Style', 'weaver-xtreme' ) );

	$opts['footer_html_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Footer HTML Area', 'weaver-xtreme' )
	);

	$opts['footer_html_shadow'] = weaverx_cz_select(
		__( 'Add shadow to HTML Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_shadow', '-0', 'postMessage'
	);

	$opts['footer_html_rounded'] = weaverx_cz_select(
		__( 'Add rounded corners to Footer HTML Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
	);


	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['footer_html_class'] = weaverx_cz_add_class( __( 'Footer HTML Area: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_w_footer_copyright() {
	$opts = array();

	$opts['w_footer-heading-copyright'] = weaverx_cz_group_title(
		__( 'Copyright section of Footer Area', 'weaver-xtreme' ),
		__( 'If you fill this in, the default copyright notice in the footer will be replaced with the text here. It will not automatically update from year to year. Use &copy; to display ©. You can use other HTML as well. Use &nbsp; to hide the copyright notice. ♦.', 'weaver-xtreme' ) );

	$opts['copyright'] = array(
		'setting' => array(
			'sanitize_callback' => 'weaverx_cz_sanitize_code',
			'transport'         => 'postMessage',
			'default'           => '',
		),
		'control' => array(
			'control_type' => 'WeaverX_Textarea_Control',
			'label'        => __( '&copy; Site Copyright', 'weaver-xtreme' ),
			'description'  => __( 'If you fill this in, the default copyright notice in the footer will be replaced with the text here. It will not automatically update from year to year. Use &amp;copy; to display &copy;. You can use other HTML and shortcodes as well.
Use &amp;nbsp; to hide the copyright notice. &diams;', 'weaver-xtreme' ),
			'type'         => 'textarea',
			'input_attrs'  => array(
				'rows'        => '2',
				'placeholder' => __( '<!-- Add HTML Here -->', 'weaver-xtreme' ),
			),
		),
	);

	return $opts;
}

