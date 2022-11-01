<?php

/**
 * Define the sections and settings for the panel w_global panel
 */
function weaverx_customizer_define_w_global_sections() {
	global $wp_customize;

	$panel = 'weaverx_where-global';
	$w_global_sections = array();

	/* Site Identity */

	$section_id = 'title_tagline';
	$section = $wp_customize->get_section( $section_id );

	$section->panel = $panel;       // Move Site Title & Tagline section to General panel
	$section->priority = 10;        // Set Site Title & Tagline section priority

	/**
	 * Static Front Page
	 */

	$section_id = 'static_front_page';
	$section = $wp_customize->get_section( $section_id );

	// Bail if the section isn't registered
	if ( is_object( $section ) && 'WP_Customize_Section' === get_class( $section ) ) {

		$section->panel = $panel;    // Move Static Front Page section to General panel

		$section->priority = 16;    // Set Static Front Page section priority
	}

	/**
	 * Typography
	 */
	$w_global_sections['w_global-typo'] = array(
		'panel'       => $panel,
		'title'       => __( 'Typography - Global Settings', 'weaver-xtreme' ),
		'description' => weaverx_markdown( __( 'This section covers global typography attributes, including available font families and base font size and spacing. **Default Site Font options**', 'weaver-xtreme' ) ),
		'options'     => weaverx_controls_w_global_typo(),
	);


	// --- Alignment and Spacing

	$w_global_sections['w_global-align'] = array(
		'panel'       => $panel,
		'title'       => __( 'Alignment and Spacing - Global Settings', 'weaver-xtreme' ),
		'description' => 'Global Settings for Alignment and Spacing.',
		'options'     => weaverx_controls_w_global_align(),

	);


	// --- Style - borders, etc.

	$w_global_sections['w_global-borders'] = array(
		'panel'       => $panel,
		'title'       => __( 'Borders - Global Settings', 'weaver-xtreme' ),
		'description' => 'Settings for Borders, Rounded Corners, and Shadows.',
		'options'     => weaverx_controls_w_global_borders(),

	);

	/**
	 * Images
	 */

	$w_global_sections['w_global-images'] = array(
		'panel'       => $panel,
		'title'       => __( 'Images - Global Settings', 'weaver-xtreme' ),
		'description' => 'Set Image Border options for Site Wrapper &amp; Container.',
		'options'     => weaverx_controls_w_global_images(),

	);

	// --- Links

	$w_global_sections['w_global-links'] = array(
		'panel'       => $panel,
		'title'       => __( 'Links - Global Settings', 'weaver-xtreme' ),
		'description' => 'Global default for link colors (not including menus and titles). There are also link settings for specific areas.',
		'options'     => weaverx_controls_w_global_links(),

	);


	return $w_global_sections;
}

// the definitions of the controls for each panel follow

function weaverx_controls_w_global_typo() {

	$opts = array();

	// ------- WRAPPER FONTS

	// The generalized weaverx_cz_fonts_control generates controls based on the control section being specified.
	// Thus, this controls function varies a bit from the normal pattern as the function will create each
	// element of the $opts array.

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'wrapper', __( 'Site Default Fonts', 'weaver-xtreme' ),
			weaverx_markdown( __( '***Default typography for site.*** Set font attributes for the Wrapper that will apply to the entire site. To override other areas, set typography for individual areas and items on other Typography menu panels. (The inherited default Font Family is Open Sans.)', 'weaver-xtreme' ) ), 'postMessage' )
	);


	$opts['typo-intro'] = weaverx_cz_heading(
		__( 'Using Font Families', 'weaver-xtreme' ),
		weaverx_markdown( __( '*Weaver Xtreme* includes support for over 30 font family choices: 16 **Web Safe** fonts, and the remaining from a carefully selected set of **Google Fonts**.
The **Google Fonts** will be displayed the same on every browser, *including* Android and iOS devices.
The **Web Safe** will be displayed as specified for most modern browsers, but will likely revert to
one of the three basic fonts supported by Android devices, or a limited set for iOS devices. *We highly recommend selecting **Google Fonts** for your site.*  You can see a demonstration of *Weaver Xtreme\'s* fonts here: ', 'weaver-xtreme' ) ) . weaverx_help_link( 'font-demo.html', __( 'Examples of supported fonts', 'weaver-xtreme' ), __( 'Font Examples', 'weaver-xtreme' ), false )
	);

	if ( weaverx_options_level() <= WEAVERX_LEVEL_INTERMEDIATE ) {
		$opts['typo-intro-full'] = weaverx_cz_heading( __( 'Full Options Level', 'weaver-xtreme' ),
			weaverx_markdown( __( 'The *Weaver Xtreme Full Options Level* allows you to set **Base Font Size and Spacing**, and has options for **Integrated Google Fonts**.', 'weaver-xtreme' ) ) );

	} else {

		$opts['sizing-intro'] = weaverx_cz_group_title( __( 'Base Font Size and Spacing', 'weaver-xtreme' ), '' );

		$opts['site_fontsize_int'] = weaverx_cz_range(
			__( 'Site Base Font Size (px)', 'weaver-xtreme' ),
			__( "Base font size of standard text. This value determines the default medium font size. Note that visitors can change their browser's font size, so final font size can vary, as expected. Default is 16px.", 'weaver-xtreme' ),
			16,
			array(
				'min'  => 2,
				'max'  => 50,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['moreinfo1'] = weaverx_cz_html_description( '<small>' . __( '"Weaver Xtreme Plus" includes options for additional font spacing, and Google Font options.', 'weaver-xtreme' ) . '</small>', 'plus' );


		$opts['site_line_height_dec'] = weaverx_cz_range_float(
			__( 'Site Base Line Height', 'weaver-xtreme' ),
			__( 'Set the Base line-height. Line heights for various font sizes based on this multiplier. (Default: 1.5 - no units)', 'weaver-xtreme' ),
			1.5,
			array(
				'min'  => .1,
				'max'  => 10.,
				'step' => .1,
			),
			'postMessage',
			'plus'
		);

		$opts['site_fontsize_tablet_int'] = weaverx_cz_range(
			__( 'Site Base Font Size - Small Tablets (px)', 'weaver-xtreme' ),
			__( 'Small Tablet base font size of standard text. (Default medium font size: 16px)', 'weaver-xtreme' ),
			16,
			array(
				'min'  => 2,
				'max'  => 50,
				'step' => 1,
			),
			'refresh',
			'plus'
		);

		$opts['site_fontsize_phone_int'] = weaverx_cz_range(
			__( 'Site Base Font Size - Phones (px)', 'weaver-xtreme' ),
			__( 'Phone base font size of standard text. (Default medium font size: 16px)', 'weaver-xtreme' ),
			16,
			array(
				'min'  => 2,
				'max'  => 50,
				'step' => 1,
			),
			'refresh',
			'plus'
		);

		$opts['custom_fontsize_a'] = weaverx_cz_range_float(
			__( 'Custom Font Size A (em)', 'weaver-xtreme' ),
			__( 'Font Size for Custom Font Size A on the Font Size selection options.', 'weaver-xtreme' ),
			1.0,
			array(
				'min'  => 0,
				'max'  => 20,
				'step' => .1,
			),
			'refresh',
			'plus'
		);

		$opts['custom_fontsize_b'] = weaverx_cz_range_float(
			__( 'Custom Font Size B (em)', 'weaver-xtreme' ),
			__( 'Font Size for Custom Font Size B on the Font Size selection options.', 'weaver-xtreme' ),
			1.0,
			array(
				'min'  => 0,
				'max'  => 20,
				'step' => .1,
			),
			'refresh',
			'plus'
		);

		$opts['font_letter_spacing_global_dec'] = weaverx_cz_range_float(
			__( 'Character Spacing (em)', 'weaver-xtreme' ),
			__( 'Add extra spacing between characters. (Default: 0)', 'weaver-xtreme' ),
			0.0,
			array(
				'min'  => - 0.1,
				'max'  => .25,
				'step' => .0025,
			),
			'postMessage',
			'plus'
		);

		$opts['font_word_spacing_global_dec'] = weaverx_cz_range_float(
			__( 'Word Spacing (em)', 'weaver-xtreme' ),
			__( 'Add extra spacing between words. (Default: 0)', 'weaver-xtreme' ),
			0.0,
			array(
				'min'  => - .5,
				'max'  => 1.0,
				'step' => .05,
			),
			'postMessage',
			'plus'
		);

		$opts['typo-google-font-opts'] = weaverx_cz_group_title( __( 'Integrated Google Fonts', 'weaver-xtreme' ),
			__( 'Weaver Xtreme integrates a selected set of Google Font families. You can disable them, or add different language support in this section.', 'weaver-xtreme' ) );

		$opts['disable_google_fonts'] = weaverx_cz_checkbox( __( 'Disable Google Font Integration', 'weaver-xtreme' ),
			__( 'ADVANCED OPTION! Be sure you understand the consequences of this option. By disabling Google Font Integration, the Google Fonts definitions will not be loaded for your site, and the options will not be displayed on Font Family options subsequently. Please note: Any previously selected Google Font Families will revert to generic serif, sans, mono, and script fonts. Google Font Families WILL be displayed in the Customizer options until you manually refresh the Customizer page.', 'weaver-xtreme' ) );

		$opts['typo-lang-intro'] = weaverx_cz_heading( __( 'Google Font Language Character Sets', 'weaver-xtreme' ),
			__( 'By default, integrated Google Fonts will include the Latin Extended character set. If you need a Crylic, Greek, Hebrew, or Vietnamese character set, these are currently supported by Google Fonts for some font families.
Google Fonts not supported for these character sets, and character sets for most other world languages will be displayed
using the default browser serif and sans fonts.', 'weaver-xtreme' ) );

		$opts['font_set_cryllic'] = weaverx_cz_checkbox( __( 'Cryllic', 'weaver-xtreme' ),
			__( 'Add Cryllic character set to Open Sans, Open Sans Condensed, Roboto ( all ), Arimo, and Tinos font families.', 'weaver-xtreme' ) );

		$opts['font_set_greek'] = weaverx_cz_checkbox( __( 'Greek', 'weaver-xtreme' ), __( 'Add Greek character set to Open Sans, Open Sans Condensed, Roboto ( all ), Arimo, and Tinos font families.', 'weaver-xtreme' ) );

		$opts['font_set_hebrew'] = weaverx_cz_checkbox( __( 'Hebrew', 'weaver-xtreme' ), __( 'Add Hebrew character set to Arimo and Tinos font families.', 'weaver-xtreme' ) );

		$opts['font_set_vietnamese'] = weaverx_cz_checkbox( __( 'Vietnamese', 'weaver-xtreme' ), __( 'Add Vietnamese character set to Open Sans, Open Sans Condensed, Roboto ( all ), Source Sans Pro, Alegreya Sans, Arimo, and Tinos font families.', 'weaver-xtreme' ) );

		$opts['typo-font-family-note'] = weaverx_cz_html(
			__( 'Add Font Families', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
			sprintf( wp_kses_post( __( '<p>The <strong>%1$s</strong> allows you add additional free fonts from
<a href="//www.google.com/webfonts" target="_blank" title="Google Web Fonts"><strong>Google Web Fonts</strong></a>,
<a href="//www.fontsquirrel.com" target="_blank" title="Font Squirrel"><strong>Font Squirrel</strong></a>,
or virtually any other free or commercial font source directly to all the
<em>Font Family</em> selectors found in various text options.</p>
<p>To define Font Families, please "Save &amp; Publish" options you may have set on this Optimizer, then click to open the
<strong>%2$s</strong>, and open the <em>Fonts &amp; Custom</em> tab.
Be sure to <em>Save Settings</em> before leaving the Legacy Weaver Xtreme Admin panel.</p>',
				'weaver-xtreme' ) ),
				weaverx_cz_get_admin_page( esc_html__( 'Weaver Xtreme Plus Font Control Panel', 'weaver-xtreme' ) ),
				weaverx_cz_get_admin_page( esc_html__( 'Weaver Xtreme Plus Font Control Panel', 'weaver-xtreme' ) ) )
		);
	}


	return $opts;
}

function weaverx_controls_w_global_align() {
	$opts = array();

	$opts['fullwidth-expand-swide'] = weaverx_cz_group_title( __( 'Site Width', 'weaver-xtreme' ),
		__( 'Maximum width of your site on a desktop browser. This is the width of the #wrapper area for standard display. Full width layouts and alignments may change the display width of content, but each site should have a designed maximum width.', 'weaver-xtreme' ) );

	$opts['theme_width_int'] = weaverx_cz_range(
		__( 'Site Width (px)', 'weaver-xtreme' ),
		__( 'Note: This is the maximum width on desktops. Mobile devices adjust width responsively.', 'weaver-xtreme' ),
		WEAVERX_THEME_WIDTH,
		array( 'min' => 770, 'max' => 3200, 'step' => 10 )
	);

	$opts['smart_margin_int'] = weaverx_cz_range_float(
		__( 'Smart Margin Width (%)', 'weaver-xtreme' ),
		__( 'Width used for smart column margins for Sidebars and Content Area. (Default: 1%)', 'weaver-xtreme' ),
		1.0,
		array( 'min' => 0.25, 'max' => 10.0, 'step' => 0.25 ),
		'refresh',
		'plus'
	);


	return $opts;
}

function weaverx_controls_w_global_images() {
	$opts = array();

	$opts['images-heading-global'] = weaverx_cz_group_title( __( 'Global Image Settings', 'weaver-xtreme' ),
		__( 'These settings control images in both the Container ( including content and sidebars ) and Footer Areas. They do not include the Header Area.', 'weaver-xtreme' ) );

	$opts['media_lib_border_color'] = weaverx_cz_color(
		'media_lib_border_color',
		__( 'Image Border Color', 'weaver-xtreme' ),
		__( 'Border color for images in Container and Footer. You need to make Image Border Width > 0!', 'weaver-xtreme' )
	);


	$opts['media_lib_border_int'] = weaverx_cz_range(
		__( 'Image Border Width (px)', 'weaver-xtreme' ),
		weaverx_markdown( __( 'Border width for images in Container and Footer. There will be **no** borders unless you set this value above 0px.', 'weaver-xtreme' ) ),
		0,
		array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['show_img_shadows'] = weaverx_cz_checkbox_post( __( 'Add Image Shadow', 'weaver-xtreme' ),
		__( 'Add a shadow to images in Container and Footer. Add custom CSS for custom shadow.', 'weaver-xtreme' ) );

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['restrict_img_border'] = weaverx_cz_checkbox(
			__( 'Restrict Borders to Media Library', 'weaver-xtreme' ),
			__( 'For Container and Footer, restrict border and shadows to images from Media Library. Manually entered &lt;img&gt; HTML without Media Library classes will not have borders.', 'weaver-xtreme' )
		);

		$opts['media_lib_border_color_css'] = weaverx_cz_css(
			__( 'Custom CSS for Images.', 'weaver-xtreme' ),
			__( 'Note: this custom CSS will live-update for ALL images, even if the above Restrict Borders is checked.
The normal site view will respect the Restrict Borders setting.', 'weaver-xtreme' )
		);
	}

	$opts['caption_color'] = weaverx_cz_color(
		'caption_color',
		__( 'Caption Text Color', 'weaver-xtreme' ),
		__( 'Color of captions - e.g., below media images.', 'weaver-xtreme' )
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['caption_color_css'] = weaverx_cz_css(
			__( 'Custom CSS for Captions.', 'weaver-xtreme' )
		);
	}


	return $opts;
}

function weaverx_controls_w_global_links() {
	$opts = array();

	$opts = weaverx_cz_fonts_add_link( 'link', __( 'Global Links', 'weaver-xtreme' ),
		__( 'Global default for link typography ( not including menus and titles ). Set Bold, Italic, and Underline by setting those options for specific areas rather than globally to have more control.', 'weaver-xtreme' ), 'refresh' );


	$opts['link_color'] = weaverx_cz_color(
		'link_color',
		__( 'Standard Links', 'weaver-xtreme' ),
		__( 'Sitewide default color for links. To override for links in specific areas, set colors for individual links below.', 'weaver-xtreme' ), 'refresh' );

	$opts['link_hover_color'] = weaverx_cz_color(
		'link_hover_color',
		__( 'Standard Link Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {

		$opts['link_color_css'] = weaverx_cz_css( __( 'Standard Links Custom CSS', 'weaver-xtreme' ),
			__( 'Custom CSS for standard Links.', 'weaver-xtreme' ) );

		$opts['link_hover_color_css'] = weaverx_cz_css( __( 'Standard Links Hover Custom CSS', 'weaver-xtreme' ) );

		// show if full, standard
		$opts['hide_tooltip'] = weaverx_cz_checkbox( __( 'Hide Menu/Link Tool Tips', 'weaver-xtreme' ),
			__( 'Hide the tool tip pop up over all menus and links.', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_w_global_borders() {
	$opts = array();

	$opts['border_color'] = weaverx_cz_color(
		'border_color',
		__( 'Border Color...', 'weaver-xtreme' ),
		__( 'Color for all borders.', 'weaver-xtreme' )
	);

	if ( weaverx_options_level() <= WEAVERX_LEVEL_INTERMEDIATE ) {

		$opts['border-opts-full'] = weaverx_cz_heading( __( 'Full Options Level', 'weaver-xtreme' ),
			weaverx_markdown( __( 'The *Weaver Xtreme Full Options Level* allows you to set additional global border attributes - width, etc.', 'weaver-xtreme' ) ) );
	} else {

		$opts['border_width_int'] = weaverx_cz_range(
			__( 'Border Width (px)', 'weaver-xtreme' ),
			'',
			1,
			array(
				'min'  => 1,
				'max'  => 20,
				'step' => 1,
			),
			'postMessage'
		);


		$opts['border_style'] = weaverx_cz_select_plus(
			__( 'Border Style', 'weaver-xtreme' ),
			__( 'Style of borders - width needs to be &gt; 1 and color other than black for some styles to work correctly.', 'weaver-xtreme' ),
			array(
				'solid'  => esc_html__( 'Solid', 'weaver-xtreme' ),
				'dotted' => esc_html__( 'Dotted', 'weaver-xtreme' ),
				'dashed' => esc_html__( 'Dashed', 'weaver-xtreme' ),
				'double' => esc_html__( 'Double', 'weaver-xtreme' ),
				'groove' => esc_html__( 'Groove', 'weaver-xtreme' ),
				'ridge'  => esc_html__( 'Ridge', 'weaver-xtreme' ),
				'inset'  => esc_html__( 'Inset', 'weaver-xtreme' ),
				'outset' => esc_html__( 'Outset', 'weaver-xtreme' ),
			),
			'solid', 'refresh'
		);

		$opts['rounded_corners_radius'] = weaverx_cz_range(
			__( 'Corner Radius (px)', 'weaver-xtreme' ),
			__( 'Controls how "round" corners are. Specify a value ( 5 to 15 look best ) for corner radius.', 'weaver-xtreme' ),
			8,
			array(
				'min'  => 1,
				'max'  => 20,
				'step' => 1,
			),
			'refresh',
			'plus'
		);

		$opts['style-rc-note1'] = weaverx_cz_group_title( '',
			__( 'Note that rounded corners require borders or bg color to show, and interact with surrounding areas. You may have to set several options to get rounded corners to display.', 'weaver-xtreme' ) );

		$opts['custom_shadow'] = weaverx_cz_textarea(
			__( 'Custom Shadow', 'weaver-xtreme' ),
			weaverx_markdown( __( 'This defines the **Custom Shadow** shown on the **Add shadow** options. You will have to select **Custom Shadow** to use the shadow style you define here. Specify full **box-shadow** CSS rule.', 'weaver-xtreme' ) ),
			1,
			__( '{box-shadow: 0 0 3px 1px rgba( 0,0,0,0.25 );} /* for example */', 'weaver-xtreme' ),
			$transport = 'refresh',
			$plus = 'plus',
			'weaverx_cz_sanitize_css'
		);

	}

	return $opts;

}

