=== Plugin Name ===
Contributors: Terry Tsang
Donate link: http://terrytsang.com/
Plugin Name: WooCommerce Facebook Share Like Button
Plugin URI:  http://terrytsang.com/
Tags: woocommerce, facebook, e-commerce
Requires at least: 2.7 or higher
Tested up to: 3.3.2
Stable tag: 1.0.0
Version: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A WooCommerce plugin that implements facebook share and like button on product page.

== Description ==

This is a WooCommerce plugin that implements facebook share and like button on your product page. After you activated the plugin, the default option is 'Enabled' for all the existing products.

In WooCommerce Product panel, there will be a new tab called 'Facebook ShareLike' where you can uncheck or check 'Enabled' option to show the button or not.

NOTE: This plugin requires the WooCommerce Extension.

== Installation ==

1. Upload the entire *woocommerce-terrytsang-fbsharelike* folder to the */wp-content/plugins/* directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. To update your facebook app id for the plugin, go to plugin folder 'assets/js/' and open the file 'tsang_fbsharelike_jquery.js'. Update the default value for **fb_app_id** and save
4. That's it. You're ready to go and cheers!

== Screenshots ==

`/tags/1.0.0/screenshot-1.png`
`/tags/1.0.0/screenshot-2.png`

== Frequently Asked Questions ==

= After activated the plugin, do i need to insert facebook javascript after <body> tag? =

No, you can straight away use the plugin as the plugin included the script.

= If i want to use my own facebook app id, what should i do? =

To update your facebook app id for the plugin, go to plugin folder 'assets/js/' and open the file 'tsang_fbsharelike_jquery.js'. Update the default value for **fb_app_id** and save the file

== Upgrade Notice ==

coming soon...

== Changelog ==

= 1.0.0 =
* Initial Release
* Basic Facebook Share Like Button option for woocommerce products