===Ilusix Private WP===
Author: Sjors Roelofs
Tags: private wordpress, private access, login
Requires at least: 3.8
Tested up to: 3.8

==Desription==
This plugin will protect your WordPress site from non-logged in users.
Non-logged in users will be redirected to a customized login screen.

Features:
1. Redirect non-logged in users to a customized login screen
2. Configure the custom (non-login) page
3. Exclude pages from the login obligation
3. Custom CSS

==Installation==
1. Clone the plugin repository to your WordPress plugin directory (/wp-content/plugins)
2. Activate the plugin via de WordPress admin plugin page
3. Go to the settings tab in the WordPress admin

4. To provide a login form on your default page, you can use: <?php if(!is_user_logged_in()) wp_login_form(); ?>