<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
// This file is included from functions.php. It will be loaded only when the wp_head action is called from WordPress.

if ( ! function_exists( 'weaverx_generate_wphead' ) ) {    /* Allow child to override this */
	function weaverx_generate_wphead() {
		/* this guy does ALL the work for generating theme look - it writes out the over-rides to the standard style.css */

		printf( "<!-- %s %s ( %s ) %s --> ", WEAVERX_THEMENAME, WEAVERX_VERSION, weaverx_getopt( 'style_version' ), weaverx_getopt( 'themename' ) );

		do_action( 'weaverx_ts_show_version' );

		do_action( 'weaverxplus_show_version' );

		if ( weaverx_use_inline_css_v5( weaverx_get_css_filename() ) ) { // generate inline CSS
			echo( '<style>' . "\n" );
			if ( is_customize_preview() )    // don't use cached CSS from customizer
			{
				$css = '';
			} else {
				$css = weaverx_getopt_default( 'wvrx_css_saved', '' );
			}

			if ( $css == '' || $css[0] != '/' ) {               // there isn't an entry in the DB, so do it on the fly
				require_once( get_theme_file_path( '/includes/generatecss.php' ) );    // include only now at runtime.
				unset( $GLOBALS['weaverx_css_saved'] );
				$GLOBALS['weaverx_css_saved'] = '';

				weaverx_output_style( );

				weaverx_echo_css( $GLOBALS['weaverx_css_saved'] );
				unset( $GLOBALS['weaverx_css_saved'] );
				$GLOBALS['weaverx_css_saved'] = '';
			} else {
				weaverx_echo_css( $css );
			}
			echo( "\n</style> <!-- end of main options style section -->\n" );
		}

		/* now head options */
		weaverx_echo_css( weaverx_getopt( '_althead_opts' ) );
		weaverx_echo_css( weaverx_getopt( 'head_opts' ) );   /* let the user have the last word! */

		if ( is_single() ) {
			$per_page_code = weaverx_get_per_post_value( 'page-head-code' );
		} else {
			$per_page_code = weaverx_get_per_page_value( 'page-head-code' );
		}
		if ( ! empty( $per_page_code ) ) {
			weaverx_echo_css( $per_page_code );
		}


		if ( weaverx_is_checked_page_opt( '_pp_hide_site_title' ) )    /* best to just do this inline */ {
			echo( '<style>#site-title,#site-tagline{display:none;}#nav-header-mini{margin-top:32px!important;}</style>' . "\n" );
		}

		if ( $ppsb = weaverx_get_per_page_value( '_pp_sidebar_width' ) > 0 ) {
			require_once( get_theme_file_path( '/includes/generatecss.php' ) );    // include only now at runtime.
			$ppsb = weaverx_get_per_page_value( '_pp_sidebar_width' );
			echo "<style> /* Per Page Sidebar Width */\n";
			weaverx_sidebar_style( $ppsb );
			echo "</style>\n";
		}

		echo( "\n<!-- End of Weaver Xtreme options -->\n" );
	}
}

