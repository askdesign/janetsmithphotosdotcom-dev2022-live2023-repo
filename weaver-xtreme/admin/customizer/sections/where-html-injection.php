<?php

/**
 * Define the sections and settings for the HTML Injection panel
 */
function weaverx_customizer_define_html_sections() {
	$panel = 'weaverx_where-html-injection';
	$html_sections = array();

	if ( weaverx_options_level() >= WEAVERX_LEVEL_ADVANCED ) {        // show if advanced

		// <head> section

		$html_sections['htmlinj-head'] = array(
			'panel'   => $panel,
			'title'   => __( 'Site <HEAD> Section', 'weaver-xtreme' ),
			'options' => weaverx_controls_html_head(),
		);


		// injection areas

		$html_sections['htmlinj-injection'] = array(
			'panel'       => $panel,
			'title'       => __( 'HTML Injection Areas', 'weaver-xtreme' ),
			'description' => __( 'HTML Injection Areas. The injection areas include Prewrapper and Postfooter for all versions of the theme. Weaver Xtreme Plus also includes Preheader, Header Top, Container Top, Content Top, Page Content Bottom, Post-Post Content, Pre-Comments, Post-Comments, Pre-Footer, Primary Sidebar Top, Fixed Browser Top, and Fixed Browser Bottom. <em>Note:</em> unlike most other options, the HTML Injections area options provide all relevant associated options: content, color, custom CSS, and visibility.', 'weaver-xtreme' ),
			'options'     => array(),
		);

		$new_opts = weaverx_cz_add_injection( 'prewrapper', __( 'Prewrapper Injection Area', 'weaver-xtreme' ),
			__( 'This code will be inserted just before the #wrapper and #branding &lt;div&gt;s, before any other site content.( Area ID: #inject_prewrapper )	', 'weaver-xtreme' ), 'standard' );
		$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

		$new_opts = weaverx_cz_add_injection( 'postfooter', __( 'Post Footer Injection Area', 'weaver-xtreme' ),
			__( 'This code will be inserted just after the footer #colophon &lt;div&gt;, outside the #wrapper div.(Area ID: #inject_postfooter)', 'weaver-xtreme' ), 'standard' );
		$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

		// X Plus Injection

		if ( weaverx_cz_is_plus() ) {

			$new_opts = weaverx_cz_add_injection( 'preheader', __( 'Preheader Injection Area', 'weaver-xtreme' ),
				__( 'This code will be inserted just before the #header &lt;div&gt;. It will have the same width as the #wrapper area. This area may require extra styling to eliminate unwanted margins. ( Area ID: #inject_preheader ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'header', __( 'Header Top Injection Area', 'weaver-xtreme' ),
				__( 'This code will be inserted at the top of the #header &lt;div&gt;, before the top menu. It will have the same width as the header area. ( Area ID: #inject_header ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'postheader', __( 'Post Header', 'weaver-xtreme' ),
				__( 'This code will be inserted between the #header &lt;div&gt; and the #container &lt;div&gt;. It will have the same width as the #wrapper area. ( Area ID: #inject_postheader ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'container_top', __( 'Container Top', 'weaver-xtreme' ),
				__( 'This code will be inserted inside the #container &lt;div&gt; that wraps content, including before the top widget areas. It will have the same width as the container area. ( Area ID: #inject_container_top ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'postinfobar', __( 'Pre Content', 'weaver-xtreme' ),
				__( 'This code will be inserted inside the #content div that wraps content. It will have the same width as the container area. ( Area ID: #inject_postinfobar ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'precontent', __( 'Content Top', 'weaver-xtreme' ),
				__( 'This code will be inserted inside the #content div that wraps content. It will have the same width as the container area. ( Area ID: #inject_precontent ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'pagecontentbottom', __( 'Page Content Bottom', 'weaver-xtreme' ),
				__( 'This code will be at the bottom of page ( including post single page view and page with posts ) content. It will have the same width as the content area. ( Area ID: #inject_pagecontentbottom ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );
			$new_opts = weaverx_cz_add_injection( 'postpostcontent', __( 'Post-Post Content', 'weaver-xtreme' ),
				__( 'This code will be inserted after the content area of each post ( not page ). ( Area class: .inject_postpostcontent ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'precomments', __( 'Pre-Comments', 'weaver-xtreme' ),
				__( 'This code will be inserted just before the #comments div where comments are displayed. If comments
are open for the page, this area will include the class <em>.precomments-comments</em>, if closed <em>.precomments-nocomments</em>. ( Area ID: #inject_precomments ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'postcomments', __( 'Post-Comments', 'weaver-xtreme' ),
				__( 'This code will be inserted right after the #comments div where comments are displayed. If comments
are open for the page, this area will include the class <em>.postcomments-comments</em>, if closed <em>.postcomments-nocomments</em>. ( Area ID: #inject_postcomments ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'prefooter', __( 'Pre-Footer', 'weaver-xtreme' ),
				__( 'This code will be inserted just before the footer #colophon div. ( Area ID: #inject_prefooter ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'presidebar', __( 'Primary Sidebar Top', 'weaver-xtreme' ),
				__( 'This code will be inserted inside the primary sidebar area at the top. Not shown if no primary sidebar defined. ( Area ID: #inject_presidebar ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'fixedtop', __( 'Fixed Browser Top', 'weaver-xtreme' ),
				__( 'This code will be inserted in a fixed location at the top of the ( non-IE8 ) desktop browser window. It will have the same width as the Wrapper Area. <em>You will need to add a Top Margin to the Wrapper Area.</em> Do not make this area too tall! ( Area ID: #inject_fixedtop ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );

			$new_opts = weaverx_cz_add_injection( 'fixedbottom', __( 'Fixed Browser Bottom', 'weaver-xtreme' ),
				__( 'This code will be inserted in a fixed location at the bottom of the ( non-IE8 ) desktop browser window. It will have the same width as the Wrapper Area. <em>You will need to add a Bottom Margin to the Wrapper Area.</em> Do not make this area too tall! ( Area ID: #inject_fixedbottom ) (&#9734;Plus)', 'weaver-xtreme' ) );


			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts );
		} else {
			// plus...
			$new_opts = weaverx_cz_group_title( __('Weaver Xtreme Plus add many other HTML Injections areas.', 'weaver-xtreme') );
			$html_sections['htmlinj-injection']['options'] = array_merge( $html_sections['htmlinj-injection']['options'], $new_opts);
		}
	} else {
		$html_sections['content-head'] = array(
			'panel' => $panel,
			'title' => __( 'Add Content', 'weaver-xtreme' ),

			'options' => array(

				'content-headsec-heading' => weaverx_cz_heading( __( 'Full Level Add Content', 'weaver-xtreme' ),
					__( 'With the Full Level Interface, you can define HTML content for various areas, including the &lt;HEAD&gt;, Header, Menus, Posts, Sidebars, Footer, and other general HTML areas.', 'weaver-xtreme' ) ),
			),
		);

	}

	return $html_sections;
}


// code for an add injection area, maybe to add with XPlus...


function weaverx_cz_add_injection( $root, $label = '', $description = '', $version = 'XPlus' ) {
	// This function build a whole set of options for an injection area to be merged into
	// the HTML Injection Areas Customizer Menu

	$opt = array();

	if ( $version == 'XPlus' ) {
		$label .= WEAVERX_PLUS_ICON;
	}
	$opt[ $root . '-heading' ] = weaverx_cz_group_title( $label );

	if ( $description ) {
		$opt[ $root . '-desc' ] = array(
			'control' => array(
				'control_type' => 'Weaver_Xtreme_Misc_Control',
				'description'  => $description,
				'type'         => 'text',
			),
		);
	}

	if ( $version != 'XPlus' || weaverx_cz_is_plus() ) {

		$opt["{$root}_insert"] = array(
			'setting' => array(
				'sanitize_callback' => 'weaverx_cz_sanitize_html',
				'transport'         => 'postMessage',
				'default'           => '',
			),
			'control' => array(
				'control_type' => 'WeaverX_Textarea_Control',
				'label'        => __( 'HTML', 'weaver-xtreme' ),        // . WEAVERX_REFRESH_ICON,
				'type'         => 'textarea',
				'input_attrs'  => array(
					'rows'        => '3',
					'placeholder' => __( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
				),
			),
		);

		$opt["inject_{$root}_bgcolor"] = array(
			'setting' => array(
				'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
				'transport'         => 'postMessage',
				'default'           => weaverx_cz_getopt( "inject_{$root}_bgcolor" ),
			),
			'control' => array(
				'control_type' => WEAVERX_COLOR_CONTROL,
				'label'        => __( 'BG Color', 'weaver-xtreme' ),
				'description'  => '',
			),
		);


		$opt["inject_{$root}_bgcolor_css"] = weaverx_cz_css( __( 'Custom CSS', 'weaver-xtreme' ) );


		$opt["inject_add_class_{$root}"] = array(
			'setting' => array(
				'sanitize_callback' => 'weaverx_cz_sanitize_html',
				'transport'         => 'refresh',
				'default'           => '',
			),
			'control' => array(
				'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
				'label'        => __( 'Add Classes', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
				'description'  => __( 'Space separated class names to add to this area (*Advanced option*) (&starf;Plus)', 'weaver-xtreme' ),
				'type'         => 'text',
				'input_attrs'  => array(),
			),
		);
		$opt["hide_front_{$root}"] = weaverx_cz_checkbox(
			__( 'Hide on front page', 'weaver-xtreme' ),
			__( 'If you check this box, then the code from this area will not be displayed on the front ( home ) page.', 'weaver-xtreme' )
		);

		$opt["hide_rest_{$root}"] = weaverx_cz_checkbox(
			__( 'Hide on non-front pages', 'weaver-xtreme' ),
			__( 'If you check this box, then the code from this area will not be displayed on non-front pages.', 'weaver-xtreme' )
		);

	} // is plus
	$opt[ $root . '-line-break' ] = array(
		'control' => array(
			'control_type' => 'Weaver_Xtreme_Misc_Control',
			'label'        => '',
			'type'         => 'line',
		),
	);

	return $opt;
}


function weaverx_controls_html_head() {

	return array(

		'content-headsec-heading' => weaverx_cz_heading( __( 'Introductory Help for <HEAD> Section', 'weaver-xtreme' ),
			__( 'This panel allows you to add HTML to the &lt;HEAD&gt; Section of every page on your site.<br /><br />
PLEASE NOTE: Only minimal validation is made on the field values, so be careful not to use invalid code. Invalid code is usually harmless, but it can make your site display incorrectly. If your site looks broken after make changes here, please double check that what you entered uses valid HTML or CSS rules.', 'weaver-xtreme' ) ),


		'head_opts' => weaverx_cz_textarea(
			__( '&lt;HEAD&gt; Section Content', 'weaver-xtreme' ),
			__( 'This input area allows you to enter allowed HTML head elements to the &lt;head&gt; section, including &lt;title&gt;, &lt;base&gt;, &lt;link&gt;, &lt;meta&gt;, &lt;script&gt;, and &lt;style&gt;. Code entered into this box is included right before the &lt;/head&gt; HTML tag on each page of your site.
We recommend using dedicated WordPress plugins to add things like ad tracking, SEO tags, Facebook code, and so on.
<small>Note: You can add CSS Rules using the "Custom CSS Rules" option on the Main Options tab.', 'weaver-xtreme' ),
			/* $rows = */
			'4',
			__( 'Any HTML allowed in &lt;head&gt;.', 'weaver-xtreme' ),
			'refresh',
			false,
			'weaverx_cz_sanitize_head' ),


		'_althead_opts' => weaverx_cz_textarea( __( '&lt;HEAD&gt; Section (Advanced Alternative - &diams;)', 'weaver-xtreme' ),
			__(
				'Same as normal &lt;HEAD&gt; box above, but works like other &diams; options - it survives changing
the subtheme from the Weaver Xtreme Subthemes tab, and is saved only on a full backup Save.
This option is not commonly used, and is intended for more advanced Weaver Xtreme users.', 'weaver-xtreme' ),
			'4', __( 'Any HTML allowed in <head>.', 'weaver-xtreme' ),
			'refresh', false ),


		'content-headsec-line1' => array(
			'control' => array(
				'control_type' => 'WeaverX_Misc_Control',
				'type'         => 'line',
			),
		),

		'_phpactions' => weaverx_cz_textarea(
			__( 'Actions and Filters (&diams;)', 'weaver-xtreme' ),
			__(
				'<strong>This Option for Advanced Users!</strong> You can add arbitrary PHP code here. This option is intended to allow
you to add WordPress Actions and Filters that can affect the Visitor View of your site. This PHP code is executed at the very
beginning of the theme\'s header.php template file before any HTML is emitted, but after much of WordPress is loaded, so you
can\'t create filters or actions for all WordPress functions.
Do NOT bracket the code with &lt;?php and ?&gt; at the beginning and end.
If your code doesn\'t seem to do anything, you probably have a PHP error. See the Help file for more technical details.', 'weaver-xtreme' ),
			'4', __( '/* PHP code - typically to define WP actions or filters */', 'weaver-xtreme' ),
			'refresh', true, 'weaverx_cz_sanitize_code' ),
	);
}

function weaverx_controls_html_footer() {
	$opts = array();

	$opts['html_footer_title'] = weaverx_cz_group_title( 'footer', 'footer blah' );

	$opts['postfooter_insert0'] = weaverx_cz_group_title( 'wtf?' );

	/*weaverx_cz_textarea( __( 'Post Footer HTML/Javascript Content', 'weaver-xtreme' ),
		__(	'Same as normal &lt;HEAD&gt; box above, but works like other &diams; options - it survives changing
the subtheme from the Weaver Xtreme Subthemes tab, and is saved only on a full backup Save.
This option is not commonly used, and is intended for more advanced Weaver Xtreme users.', 'weaver-xtreme' ),
		'3', __( 'Add arbitrary HTML or Javascript after the Footer Area ( in &lt;div id="footer-html"&gt; ). Suitable for adding scripts at bottom of site HTML.', 'weaver-xtreme' ),
		'refresh', false ); */

	return $opts;
}


