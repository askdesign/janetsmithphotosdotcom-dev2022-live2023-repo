<?php
/**
 * Define topography settings - Weaver Xtreme Customizer
 */


/**
 * Define the sections and settings for the General panel
 */
function weaverx_customizer_define_typography_sections() {
	$panel = 'weaverx_typography';
	$typography_sections = array();

	/**
	 * Global
	 */
	$typography_sections['typo-global'] = array(
		'panel'       => $panel,
		'title'       => __( 'Global Typography Options', 'weaver-xtreme' ),
		'description' => weaverx_markdown( __( 'This section covers global typography attributes, including available font families and base font size and spacing. **Default Site Font options:** See the *Typography &rarr; Wrapping Areas* menu.', 'weaver-xtreme' ) ),
		'options'     => weaverx_controls_typo_global(),
	);


	/**
	 * Wrapping
	 */
	$typography_sections['typo-wrapping'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Wrapping Areas', 'weaver-xtreme' ),
		'description' => esc_html__( 'Set font and other typography attributes. Use Site Colors to set colors.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_typo_wrapping(),

	);


	/**
	 * Links
	 */
	$typography_sections['typo-links'] = array(
		'panel'   => $panel,
		'title'   => esc_html__( 'Links', 'weaver-xtreme' ),
		'options' => weaverx_controls_typo_links(),
	);


	/**
	 * Site Header
	 */
	$typography_sections['typo-header'] = array(
		'panel'   => $panel,
		'title'   => esc_html__( 'Header Area', 'weaver-xtreme' ),
		'options' => weaverx_controls_typo_header(),
	);


	/**
	 * Main Menu
	 */
	$typography_sections['typo-menus'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
		'description' => esc_html__( 'Set typography for Menus.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_typo_menus(),
	);


	/**
	 * Info Bar
	 */
	$typography_sections['typo-info-bar'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Info Bar', 'weaver-xtreme' ),
		'description' => esc_html__( 'Info Bar with breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_typo_infobar(),
	);


	/**
	 * Content
	 */
	$typography_sections['typo-content'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
		'description' => esc_html__( 'Typography for general page and post content.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_typo_content(),
	);

	/**
	 * Post Specific
	 */
	$typography_sections['typo-post-specific'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
		'description' => esc_html__( 'Post Specific Typography - override Content Typography.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_typo_postspecific(),
	);


	/**
	 * Sidebars
	 */
	$typography_sections['typo-sidebars'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Sidebars &amp; Widget Areas', 'weaver-xtreme' ),
		'description' => esc_html__( 'Main Sidebars and Widget areas. Header and Footer areas options under Header and Footer panels.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_typo_sidebars(),
	);

	/**
	 * Widgets
	 */
	$typography_sections['typo-widgets'] = array(
		'panel'   => $panel,
		'title'   => esc_html__( 'Individual Widgets', 'weaver-xtreme' ),
		'options' => weaverx_controls_typo_widgets(),
	);


	/**
	 * Footer
	 */
	$typography_sections['typo-footer'] = array(
		'panel'   => $panel,
		'title'   => esc_html__( 'Footer Area', 'weaver-xtreme' ),
		'options' => weaverx_controls_typo_footer(),
	);


	return $typography_sections;
}

// Now, define all the controls that go in each sub-menu section

function weaverx_controls_typo_global() {

	$opts = array();


	$opts['typo-intro'] = weaverx_cz_heading(
		__( 'Using Font Families', 'weaver-xtreme' ),
		weaverx_markdown( __( '*Weaver Xtreme* includes support for over 30 font family choices: 16 **Web Safe** fonts, and the remaining from a carefully selected set of **Google Fonts**.
The **Google Fonts** will be displayed the same on every browser, *including* Android and iOS devices.
The **Web Safe** will be displayed as specified for most modern browsers, but will likely revert to
one of the three basic fonts supported by Android devices, or a limited set for iOS devices. *We highly recommend selecting **Google Fonts** for your site.*  You can see a demonstration of *Weaver Xtreme\'s* fonts here: ', 'weaver-xtreme' ) ) . weaverx_help_link( 'font-demo.html', __( 'Examples of supported fonts', 'weaver-xtreme' ), __( 'Font Examples', 'weaver-xtreme' ), false )
	);

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


	return $opts;
}

function weaverx_controls_typo_wrapping() {

	// The generalized weaverx_cz_fonts_control generates controls based on the control section being specified.
	// Thus, this controls function varies a bit from the normal pattern as the function will create each
	// element of the $opts array.

	$opts = weaverx_cz_fonts_control( 'wrapper', __( 'Site Wrapper Fonts', 'weaver-xtreme' ),
		weaverx_markdown( __( '***Default typography for site.*** Set font attributes for the Wrapper that will apply to the entire site. To override other areas, set typography for individual areas and items on other Typography menu panels. (The inherited default Font Family is Open Sans.)', 'weaver-xtreme' ) ), 'postMessage' );


	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'container', __( 'Container Fonts', 'weaver-xtreme' ),
		__( 'Container typography for site. Wraps content and sidebars.', 'weaver-xtreme' ), 'postMessage' ) );

	return $opts;
}

function weaverx_controls_typo_links() {

	// use array_merge to work with font control functions

	$opts = weaverx_cz_fonts_add_link( 'link', __( 'Global Links', 'weaver-xtreme' ),
		__( 'Global default for link typography ( not including menus and titles ). Set Bold, Italic, and Underline by setting those options for specific areas rather than globally to have more control.', 'weaver-xtreme' ), 'refresh' );

	$opts = array_merge( $opts, weaverx_cz_fonts_add_link( 'ibarlink', __( 'Info Bar Links', 'weaver-xtreme' ),
		__( 'Typography for links in Info Bar ( uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_add_link( 'contentlink', __( 'Content Links', 'weaver-xtreme' ),
		__( 'Typography for links in Content ( uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_add_link( 'ilink', __( 'Post Meta Info Links', 'weaver-xtreme' ),
		__( 'Typography for links in post meta information top and bottom lines. ( uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_add_link( 'wlink', __( 'Individual Widget Links', 'weaver-xtreme' ),
		__( 'Typography for links in widgets ( uses Standard Link colors if inherit ).', 'weaver-xtreme' ) ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_add_link( 'footerlink', __( 'Footer Area Links', 'weaver-xtreme' ),
		__( 'Typography for links in Footer ( Uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );

	return $opts;
}

function weaverx_controls_typo_header() {

	// use array_merge to work with font control functions

	$opts = weaverx_cz_fonts_control( 'header', __( 'Header Area', 'weaver-xtreme' ), '', 'postMessage' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'site_title', __( 'Site Title', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'tagline', __( 'Site Tagline', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'header_sb', __( 'Header Widget Area', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'header_html', __( 'Header HTML', 'weaver-xtreme' ), '', 'postMessage' ) );

	return $opts;
}

function weaverx_controls_typo_menus() {

	$opts = weaverx_cz_fonts_control( 'm_primary', __( 'Primary Menu', 'weaver-xtreme' ), '', 'postMessage' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'm_secondary', __( 'Secondary Menu', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'm_header_mini', __( 'Header Mini Menu', 'weaver-xtreme' ), '', 'postMessage' ) );

	$cur_page = array(

		'typo-allmenus-heading' => weaverx_cz_group_title( __( 'Typography For All Menus', 'weaver-xtreme' ),
			esc_html__( 'These options specify current page attributes for all menus.', 'weaver-xtreme' ) ),

		'menubar_curpage_bold' => weaverx_cz_checkbox(
			__( 'Bold Current Page', 'weaver-xtreme' ),
			__( 'Boldface Current Page and ancestors.', 'weaver-xtreme' )
		),

		'menubar_curpage_em' => weaverx_cz_checkbox(
			__( 'Italic Current Page', 'weaver-xtreme' ),
			__( 'Italic Current Page and ancestors.', 'weaver-xtreme' )

		),

		'menubar_curpage_noancestors' => weaverx_cz_checkbox(
			__( 'Do Not Highlight Ancestors', 'weaver-xtreme' ),
			__( 'Highlight Current Page only - do not also highlight ancestor items.', 'weaver-xtreme' )
		),
	);
	$opts = array_merge( $opts, $cur_page );

	if ( weaverx_cz_is_plus() ) {
		$extra = weaverx_cz_fonts_control( 'm_extra', __( 'Extra Menu', 'weaver-xtreme' ), '', 'refresh' );
	} else {
		$extra = weaverx_cz_add_plus_message( 'typo_menus', __( 'Extra Menu', 'weaver-xtreme' ),
			__( 'Add extra menus with <strong>Weaver Xtreme Plus</strong>.', 'weaver-xtreme' ) );
	}

	$opts = array_merge( $opts, $extra );

	return $opts;
}

function weaverx_controls_typo_infobar() {

	$opts = weaverx_cz_fonts_control( 'info_bar', __( 'Info Bar', 'weaver-xtreme' ), '', 'postMessage' );

	return $opts;
}

function weaverx_controls_typo_content() {

	$opts = weaverx_cz_fonts_control( 'content', __( 'Content Area', 'weaver-xtreme' ), '', 'postMessage' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'page_title', __( 'Page Title', 'weaver-xtreme' ), '', 'postMessage' ) );

	// archive pages title needs refresh due to interaction with page title attributes
	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'archive_title', __( 'Archive Pages Title', 'weaver-xtreme' ), '', 'refresh' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'content_h', __( 'Content Headings', 'weaver-xtreme' ),
		__( 'Headings ( &lt;h1&gt;-&lt;h6&gt; ) in page and post content.', 'weaver-xtreme' ), 'refresh', 'normal' ) );

	return $opts;
}

function weaverx_controls_typo_postspecific() {

	$opts = weaverx_cz_fonts_control( 'post', __( 'Post Area', 'weaver-xtreme' ), '', 'postMessage' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'post_title', __( 'Post Title', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'post_info_top', __( 'Top Post Info Line', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'post_info_bottom', __( 'Bottom Post Info Line', 'weaver-xtreme' ), '', 'postMessage' ) );

	return $opts;
}

function weaverx_controls_typo_sidebars() {

	$opts = weaverx_cz_fonts_control( 'primary', __( 'Primary Sidebar', 'weaver-xtreme' ), '', 'postMessage' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'secondary', __( 'Secondary Sidebar', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'top', __( 'Top Widget Areas', 'weaver-xtreme' ),
		__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ), 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'bottom', __( 'Bottom Widget Areas', 'weaver-xtreme' ),
		__( 'Typography for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ), 'postMessage' ) );

	return $opts;
}

function weaverx_controls_typo_widgets() {

	$opts = weaverx_cz_fonts_control( 'widget', __( 'Individual Widgets', 'weaver-xtreme' ), '', 'postMessage' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'widget_title', __( 'Individual Widgets Title', 'weaver-xtreme' ), '', 'postMessage' ) );

	return $opts;
}

function weaverx_controls_typo_footer() {

	$opts = weaverx_cz_fonts_control( 'footer', __( 'Footer Area', 'weaver-xtreme' ), '', 'postMessage' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'footer_sb', __( 'Footer Widget Area', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'footer_html', __( 'Footer HTML', 'weaver-xtreme' ), '', 'postMessage' ) );

	return $opts;
}
