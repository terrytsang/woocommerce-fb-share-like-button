<?php

/*
Plugin Name: WooCommerce Facebook Like Share Button
Plugin URI: http://terrytsang.com
Description: Add a Facebook Like and Share button to your product pages
Version: 1.0
Author: Terry Tsang
Author URI: http://terrytsang.com
*/

/*  Copyright 2012 Terry Tsang (email: terry at terrytsang.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/*
 * TSANG_WooCommerce_FbShareLike_Button
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
if ( ! class_exists( 'TSANG_WooCommerce_FbShareLike_Button' ) ) {
	class TSANG_WooCommerce_FbShareLike_Button{
		var $id_name = 'tsang_fbsharelike_tab';
		var $id = 'tsang_fbsharelike';
		
		function __construct()
		{
			//It will be called only if the product has it enabled, then enqueue our script here
			add_action( 'wp_enqueue_scripts', array( &$this, 'tsang_fbsharelike_scripts' ) );
			
			//Add product write panel
			add_action( 'woocommerce_product_write_panels', array(&$this, 'tsang_fbsharelike_main') );
			add_action( 'woocommerce_product_write_panel_tabs', array(&$this,'tsang_fbsharelike_tab') );
			
			//Add product meta
			add_action( 'woocommerce_process_product_meta', array(&$this, 'tsang_fbsharelike_meta') );
			
			//Display on product page for the facebook share and like button
			add_action( 'woocommerce_single_product_summary', array(&$this, 'tsang_fbsharelike_button' ), 100 );
			
			//Add javascript after <body> tag
			add_action( 'init', array( &$this, 'add_afterbody_scripts' ) );
		}
		
		//start to include plugin scripts if the product is enabled for facebook share and like option
		function tsang_fbsharelike_scripts()
		{
			global $post;
			$enabled_option = get_post_meta($post->ID, $this->id, true);
			$plugin_js_file = plugin_dir_url( __FILE__ ) . 'assets/js/tsang_fbsharelike.js';
			
			if( $enabled_option == 'yes' ):
				wp_enqueue_script( 'tsang-fbsharelike-script', $plugin_js_file );
			endif;
		}
		
		function tsang_fbsharelike_main()
		{
			global $post;
			$enabled_option = get_post_meta($post->ID, $this->id, true);
			$label = 'Enable';
			$description = 'Enable Facebook Share Like Button on this product?';
			
			//if the option not set for yes or no, then default is yes
			if( 'yes' != $enabled_option && 'no' != $enabled_option ):
				$enabled_option = 'yes'; 
			endif;
			
			$check_id = $this->id;
			$check_app_id = $this->app_id;
			
			?>
			<div id="fbsharelike" class="panel woocommerce_options_panel" style="display: none; ">
				<fieldset>
					<p class="form-field">
						<?php
							woocommerce_wp_checkbox(array(
								'id'		=> $check_id,
								'label'		=> __($label, $this->id_name),
								'description'	=> __($description, $this->id_name),
								'value'		=> $enabled_option
							));
						?>
						<br /><br />
						<span class="alignright" style="font-size:75%; font-weight: bold;">Facebook ShareLike Extension by Terry Tsang - <a target="_blank" href="http://terrytsang.com/" title="Facebook ShareLike Extension by Terry Tsang">View More</a></span>
					</p>
				</fieldset>
			</div>
			<?php
		}
		
		function tsang_fbsharelike_tab()
		{
			?>
			<li class="tsang_fbsharelike_tab">	
				<a href="#fbsharelike"><?php _e('Facebook ShareLike', $this->app_name );?></a>
			</li>
			<?php
		}
		
		function tsang_fbsharelike_meta( $post_id )
		{
			$tsang_fbsharelike_option = isset($_POST[$this->id]) ? 'yes' : 'no';
	    	update_post_meta($post_id, $this->id, $tsang_fbsharelike_option);
		}
		
		function tsang_fbsharelike_button()
		{
			global $post;
			$enabled_option = get_post_meta($post->ID, $this->id, true);
			
			if( $enabled_option != 'yes' && $enabled_option != 'no' ):
				$enabled_option = 'yes'; //default new products or unset value to true
			endif;
			
			if( $enabled_option == 'yes' ):
			?>
				<br />
				<div class="fb-like" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div>
			<?php
			endif;
		}
		
		//start to include any script after <body> tag
		function add_afterbody_scripts()
		{
			$script_js_file = plugin_dir_url( __FILE__ ) . 'assets/js/tsang_fbsharelike_jquery.js';
			
			wp_enqueue_script('jquery');
			wp_enqueue_script('body-init-script', $script_js_file, 'jquery', '1.0');
		}
	}
}

}


// finally instantiate the plugin class
$TSANG_WooCommerce_FbShareLike_Button = &new TSANG_WooCommerce_FbShareLike_Button();

?>