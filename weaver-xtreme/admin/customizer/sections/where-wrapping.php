<?php

/**
 * Define the sections and settings for the wrapping panel
 *
 */
function weaverx_customizer_define_w_wrapping_sections() {
	global $wp_customize;
	$panel = 'weaverx_where-wrapping';
	$ww_sections = array();


	/**
	 * WP Background image
	 */

	/**
	 * Background Image (use WP standard)
	 */

	$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Site Background Image (WP version)', 'weaver-xtreme' );

	$wp_customize->get_section( 'background_image' )->panel = $panel;

	// ---- Wrapper Areas Layout

	/**
	 * Site Wrapping Options
	 */

	$ww_sections['ww-body-wrap'] = array(
		'panel'       => $panel,
		'title'       => __( 'Site Settings (&lt;body>)', 'weaver-xtreme' ),
		'description' => __( 'Setting Options applied to &lt;body>, which wraps entire site.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_ww_wrapping_body(),
	);

	/**
	 * Wrapper Area
	 */

	$ww_sections['ww-wrapper-area'] = array(
		'panel'       => $panel,
		'title'       => __( 'Wrapper Area', 'weaver-xtreme' ),
		'description' => __( 'The Wrapper Area (CSS id: #wrapper) provides default background color, text color, and text font properties for most other areas, including Header, Container, Content, Widgets, and more.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_ww_wrapping_wrapper(),
	);


	/**
	 *  Container Area
	 */

	$ww_sections['ww-container-area'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Container Area', 'weaver-xtreme' ),
		'description' => esc_html__( 'The Container Area (CSS id: #container) wraps content and sidebars. Does no include the Header and Footer.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_ww_wrapping_container(),
	);

	return $ww_sections;
}

// section definitions

// the definitions of the controls for each panel follow

function weaverx_controls_ww_wrapping_body() {
	$opts = array();

	$opts['hdr-body-1'] = weaverx_cz_group_title(
		__( '&lt;body> Settings', 'weaver-xtreme' ),
		__( 'Are applied to the &lt;body> site section.', 'weaver-xtreme' )
	);

	$opts['body_bgcolor'] = weaverx_cz_color(
		'body_bgcolor',
		__( 'Site Background Color', 'weaver-xtreme' ),
		__( 'Background color for &lt;body&gt;, wraps entire page.', 'weaver-xtreme' )
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {

		$opts['fadebody_bg'] = weaverx_cz_checkbox(
			__( 'Fade Outside BG', 'weaver-xtreme' ),
			__( 'Will fade the Outside BG color, darker at top to lighter at bottom.', 'weaver-xtreme' )
		);

		$opts['full_browser_height'] = weaverx_cz_checkbox(
			__( 'Full Browser Height', 'weaver-xtreme' ),
			__( 'For short pages, add extra padding to bottom of content to force full browser height.', 'weaver-xtreme' )
		);
	}

	return $opts;
}

function weaverx_controls_ww_wrapping_wrapper() {
	$opts = array();

	$opts['wrapper-color-heading'] = weaverx_cz_group_title( __( 'Wrapper Area Colors', 'weaver-xtreme' )
	);

	$opts['wrapper_color'] = weaverx_cz_color(
		'wrapper_color',
		__( 'Wrapper Text Color', 'weaver-xtreme' ),
		weaverx_markdown( __( '**Global Text Color** - You can override other text colors for individual areas and items below.', 'weaver-xtreme' ) ) );

	$opts['wrapper_bgcolor'] = weaverx_cz_color(
		'wrapper_bgcolor',
		__( 'Wrapper BG Color', 'weaver-xtreme' ),
		weaverx_markdown( __( '**Background Color** - wraps entire content area. To override, set BG colors for individual areas.', 'weaver-xtreme' ) ) );


	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'wrapper', __( 'Site Wrapper Typography', 'weaver-xtreme' ),
		weaverx_markdown( __( '***Default typography for site.*** Set font attributes for the Wrapper that will apply to the entire site. To override other areas, set typography for individual areas and items on other Typography menu panels. (The inherited default Font Family is Open Sans.)', 'weaver-xtreme' ) ), 'postMessage' ) );

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if standard/full

		if ( weaverx_cz_is_plus() ) {
			$opts = array_merge( $opts,
				weaverx_cz_add_image( 'wrapper', esc_html__( 'Wrapper BG Image', 'weaver-xtreme' ),
					esc_html__( 'Background image for outer wrapper (#wrapper)', 'weaver-xtreme' ) )
			);
		}

		$opts['wrapper-space-heading'] = weaverx_cz_group_title( __( 'Wrapper Area Alignment and Spacing', 'weaver-xtreme' )
		);

		$opts['wrapper_align'] = weaverx_cz_select(
			__( 'Align Wrapper Area', 'weaver-xtreme' ), '',
			'weaverx_cz_choices_align', 'align-center', 'refresh'
		);

		$opts['wrapper_padding_T'] = weaverx_cz_range(
			__( 'Top Padding (px)', 'weaver-xtreme' ),
			__( 'These options control the padding ( inner space ) around the area.', 'weaver-xtreme' ),
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['wrapper_padding_B'] = weaverx_cz_range(
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

		$opts['wrapper_padding_LRp'] = weaverx_cz_range_float(
			__( 'Wrapper Left/Right Padding (%)', 'weaver-xtreme' ),
			__( 'Left and Right Padding in % for Align Wide and Align Full. This allows you to have shrinking margins as the browser width shrinks. On mobile devices, uses 0.5% padding if this option has value.', 'weaver-xtreme' ),
			0,
			array(
				'min'  => 0,
				'max'  => 25.0,
				'step' => 0.5,
			),
			'refresh',
			'',
			'~wrapper_align'    // ~ means show if alignwide or alignfull
		);

		$opts['wrapper_padding_L'] = weaverx_cz_range(
			__( 'Left Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage',
			'',
			'wrapper_align'
		);

		$opts['wrapper_padding_R'] = weaverx_cz_range(
			__( 'Right Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage',
			'',
			'wrapper_align'
		);

		$opts['wrapper_margin_T'] = weaverx_cz_range(
			__( 'Top Margin (px)', 'weaver-xtreme' ),
			weaverx_markdown( __( 'Set Top and Bottom Margins. **Side margins are auto-generated.**', 'weaver-xtreme' ) ),
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['wrapper_margin_B'] = weaverx_cz_range(
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
	}

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['wrapper-style-heading'] = weaverx_cz_group_title( __( 'Wrapper Area Style', 'weaver-xtreme' ),
			__( 'Add borders, shadow, or rounded corners to Wrapper.', 'weaver-xtreme' ) );

		$opts['wrapper_border'] = weaverx_cz_checkbox_post(
			__( 'Add border', 'weaver-xtreme' )
		);

		$opts['wrapper_shadow'] = weaverx_cz_select(
			__( 'Add shadow', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_shadow', '-0', 'postMessage'
		);

		$opts['wrapper_rounded'] = weaverx_cz_select(
			__( 'Rounded corners', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
		);


		$opts['w_header-cust-css1'] = weaverx_cz_group_title(
			__( 'Add Classes', 'weaver-xtreme' ) );

		if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
			$opts['wrapper_add_class'] = weaverx_cz_add_class( __( 'Wrapper: Add Classes', 'weaver-xtreme' ) );
		}
	}

	return $opts;
}

function weaverx_controls_ww_wrapping_container() {
	$opts = array();


	// ------- CONTAINER

	$opts['container-space-heading11'] = weaverx_cz_group_title( __( 'Container Area Colors', 'weaver-xtreme' ) );

	$opts['container_color'] = weaverx_cz_color(
		'container_color',
		__( 'Container Text Color', 'weaver-xtreme' ),
		__( 'Container ( #container div ) wraps content and sidebars.', 'weaver-xtreme' ) );

	$opts['container_bgcolor'] = weaverx_cz_color(
		'container_bgcolor',
		__( 'Container BG Color', 'weaver-xtreme' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'container', __( 'Container Typography', 'weaver-xtreme' ),
		__( 'Container typography for site. Wraps content and sidebars.', 'weaver-xtreme' ), 'postMessage' ) );

	$opts['container-space-heading'] = weaverx_cz_group_title( __( 'Container Area Alignment and Spacing', 'weaver-xtreme' )
	);

	$opts['container_align'] = weaverx_cz_select(
		__( 'Align Container Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);


	$opts['container_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		'',
		'container_align'
	);

	$opts['container_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		'',
		'container_align'
	);

	$opts['container_padding_LRp'] = weaverx_cz_range_float(
		__( 'Container Left/Right Padding (%)', 'weaver-xtreme' ),
		__( 'Left and Right Padding in % for Align Wide and Align Full. This allows you to have shrinking margins as the browser width shrinks. On mobile devices, uses 0.5% padding if this option has value.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 25.0,
			'step' => 0.5,
		),
		'refresh',
		'',
		'~container_align'    // ~ means show if alignwide or alignfull
	);

	$opts['container_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		__( 'These options control the padding ( inner space ) around the area.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['container_padding_B'] = weaverx_cz_range(
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

	$opts['container_margin_T'] = weaverx_cz_range(
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

	$opts['container_margin_B'] = weaverx_cz_range(
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

	$opts['container_width_int'] = weaverx_cz_range_float(
		__( 'Container Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Container "Center align" setting. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
		100.,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'postMessage',
		'',
		'container_align'
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['container_max_width_int'] = weaverx_cz_range(
			__( 'Container Area Max Width (px)', 'weaver-xtreme' ),
			__( 'This advanced option allows you to set a maximum width for this area. This is not commonly used, but can make interesting designs, especially if you center align the area. Use 0 for no Max Width.', 'weaver-xtreme' ),
			0,
			array(
				'min'  => 0,
				'max'  => 4000,
				'step' => 5,
			),
			'postMessage',
			'plus',
			'container_align'
		);
	}


	$opts['container-style-heading'] = weaverx_cz_group_title( __( 'Container Area Style', 'weaver-xtreme' ),
		__( 'Add borders, shadow, or rounded corners to Wrapper.', 'weaver-xtreme' ) );

	$opts['container_border'] = weaverx_cz_checkbox_post(
		__( 'Add border around Container', 'weaver-xtreme' )
	);

	$opts['container_shadow'] = weaverx_cz_select(
		__( 'Add shadow', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_shadow', '-0', 'postMessage'
	);

	$opts['container_rounded'] = weaverx_cz_select(
		__( 'Rounded corners', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_ADVANCED ) {        // show if advanced

		$opts = array_merge( $opts,
			weaverx_cz_add_image( 'container', __( 'Container BG Image', 'weaver-xtreme' ),
				__( 'Background image for Container - (#container)', 'weaver-xtreme' ) )
		);

		$opts['w_header-cust-css2'] = weaverx_cz_group_title(
			__( 'Add Classes', 'weaver-xtreme' ) );

		$opts['container_add_class'] = weaverx_cz_add_class( __( 'Container: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}
