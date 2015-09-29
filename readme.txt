=== Ilusix Private WP ===
Contributors: Sjors Roelofs
Tags: private wordpress, private access, login
Requires at least: 3.0
Tested up to: 4.3.1
Stable tag: trunk
License: MIT
License URI: http://opensource.org/licenses/MIT

== Description ==

This plugin will protect your WordPress site from non-logged in users.
Non-logged in users will be redirected to a customized login screen.

You can redirect non-logged in users to a custom login screen and exclude pages from the login obligation.

== Installation ==

1. Download the plugin and extract it to your WordPress plugin directory. In most cases, this will be ‘/wp-content/plugins’
2. Activate the plugin via de WordPress admin ‘Plugins’ page
3. Go to the settings tab in the WordPress admin and select ‘Private WP’

== Changelog ==

= 1.1 =
* Added JavaScript to show/hide available options in the ‘Excluded pages’ list

= 1.2 =
* Fixed a bug which would cause an error when you’ve selected only one page to exclude

= 1.3 =
* Updated to work with WordPress 4.3.1

== Upgrade Notice ==
= 1.1 =
This update prevents you from selecting the same page in the ‘Excluded pages’ list as in the ‘Default page’ list

= 1.2 =
Fixed a bug which would cause an error when you’ve selected only one page to exclude

= 1.3 =
Works with WordPress 4.3.1

== Frequently Asked Questions ==

= How can I change the plugin settings? =
After you have installed and activated the plugin, you can go to the WordPress admin. There you can find the option ‘Private WP’ in the settings menu.

= How can I provide a custom screen with a login form? =
You can create a custom page template (http://codex.wordpress.org/Page_Templates) and assign it to your page, for example the page you’ve set as default. To provide a login form on this page, you can use: <?php if(!is_user_logged_in()) wp_login_form(); ?>.

== Screenshots ==

1. The settings page