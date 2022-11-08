<?php
	// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Embed', 'prospect' ),
		"base"				=> "cws_sc_embed",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Link', 'prospect' ),
				"param_name"	=> "url",
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Width in pixels', 'prospect' ),
				"param_name"	=> "width"
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Height in pixels', 'prospect' ),
				"param_name"	=> "height"
			),
		)
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Embed extends WPBakeryShortCode {
	    }
	}
?>