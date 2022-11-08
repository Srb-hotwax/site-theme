<?php
$enable_top_panel = prospect_get_option( "enable_top_panel" );
$top_panel_text = prospect_get_option( "top_panel_text" );
$top_panel_transparent = prospect_get_option( "is_top_panel_transparent" );
$social_links = prospect_render_social_links();
$show_woo_minicart = prospect_check_for_plugin( 'woocommerce/woocommerce.php' ) && prospect_get_option( 'woo_cart_enable' );
if ( $enable_top_panel ){
	echo "<section id='top_panel'" . ( $top_panel_transparent ? " class='transparent'" : "" ) . ">";
		echo "<div class='prospect_layout_container'>";
			echo !empty( $top_panel_text ) ? "<address>" . wp_kses( $top_panel_text, array(
				'a' 	=> array(
				    'href'	=> array(),
				    'title' => array()
			    ),
			    'span' 	=> array(),
			    'i' 	=> array(
			    	'class'	=> array()
			    ),
			    'br' 	=> array(),
			    'em' 	=> array(),
			    'strong'=> array(),
			)) . "</address>" : "";
			echo "<div id='top_panel_bar'>";
				echo "<div id='search_bar_item' class='bar_item'>";
					echo get_search_form();
				echo "</div>";
				if ( !empty( $social_links ) ){
					echo "<div id='social_bar_item' class='bar_item' >";
						echo "<div id='top_panel_social' class='bar_item_content prospect_social'>";
							wp_enqueue_script( 'greensock_tween_lite' );
							wp_enqueue_script( 'greensock_css_plugin' );
							wp_enqueue_script( 'greensock_easing' );
							echo wp_kses( $social_links, array(
								'a' 	=> array(
							    	'class'	=> array(),					
								    'href'	=> array(),
								    'title' => array()
							    ),
							    'i' 	=> array(
							    	'class'	=> array()
							    )
							));
						echo "</div>";
						echo "<a id='top_panel_social_el' class='bar_element fa fa-share-alt'></a>";
					echo "</div>";
				}
				$is_wpml_active = prospect_is_wpml_active();
				if ( $is_wpml_active ){ 
					?>
						<?php do_action( 'icl_language_selector' ); ?>
				<?php }
				if ( $show_woo_minicart ) {
					ob_start();
					woocommerce_mini_cart();
					$minicart = ob_get_clean();
					$cart_url = esc_url( WC()->cart->get_cart_url() );
					$cart_content = (WC()->cart->cart_contents_count > 0) ? esc_html( WC()->cart->cart_contents_count ) : "";
					echo "<div id='woo_minicart_bar_item' class='bar_item'>";
						echo "<div id=\"top_panel_woo_minicart\" class=\"bar_item_content widget woocommerce\">" . $minicart;
						echo "</div>";
						echo "<a id='top_panel_woo_minicart_el' class='woo_icon bar_element fa fa-shopping-cart' href='$cart_url' title='" . esc_html__( "View your shopping cart", "prospect" ) . "'><span class='woo_mini_count'>$cart_content</span></a>";
					echo "</div>";
				}
			echo "</div>";
		echo "</div>";
	echo "</section>";
}
?>