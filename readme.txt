=== Lesser ===
Contributors: benallfree
Tags: themes, css, styling
Requires at least: 4.0.0
Tested up to: 4.2.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Lesser allows you to define custom CSS for your themes and plugins using [LESS](http://lesscss.org).

== Description ==

Lesser helps you manage custom CSS for your site using [LESS](http://lesscss.org). Lesser is compatible with all WordPress caching because Lesser uses WordPress's built-in script management features to output the final CSS.

Lesser keeps your custom styling out of your themes and plugins. That means theme and plugin updates and changes won't overwrite your LESS. You can even switch themes and add/remove plugins without fear of losing the custom responsive CSS styling you worked so hard to debug on all the mobile device formats.

Benefits:

* Independent of any WordPress theme or plugin
* Switch themes without losing custom styling
* Add/Remove plugins without losing custom styling
* Efficiently organize CSS
* Ideal for managing responsive design customizations

Features:

* Use LESS instead of CSS
* Edit directly from your admin
* Compatible with popular WordPress caching extensions
* Easily migrate your changes using popular plugins like `WP Clone`
* Fast - Lesser compiles your LESS once and saves the result for super-fast load times

[Lesser Pro](http://benallfree.com/wp/lesser) adds the following features:

* Separate editors for both admin and public CSS changes, as well as changes common to both
* Minification  - speed up your production site with compact files
* Test mode - expanded CSS output and cache-busting for easy development even through caching proxies

== Installation ==

To install Lesser:

1. Go to your WordPress admin and choose `Plugins > Add New`.
1. Search for `lesser` and install.
1. Activate the plugin
1. Go to Settings > Lesser to add your LESS code

== Frequently Asked Questions ==

= What is LESS? = 

LESS is a more efficient type of CSS language to use for customizing your themes and plugins. LESS has a lot of advanced features, but the biggest gain is that LESS allows you to nest CSS constructs so your CSS is more efficient and readable. 

= How does Lesser inject CSS? =

Lesser uses WordPress's built-in script management functions. Lesser Pro includes cache-busting techniques for development mode and cache-preserving minified output for production mode.

= Does it work with the WordPress admin too? =

Yes, you can include admin stylings too if you desire. However, Lesser PRO makes this a lot easier by providing 3 separate LESS inputs: public, admin, and common.

= I'm hardcore, I want manage my own LESS files =

Me too. Your only LESS statement in the WordPress admin should be:

`@import url(/url/to/less/files)`

= Can I do a custom version of Bootstrap using Lesser? =

Yes. It looks like this:

`@import url(/path/to/bootstrap.less)`

= Are you available for customizations or custom WordPress programming? =

Yes, developing custom WordPress applications is my full-time occupation and has been for the last 15 years. Please contact ben at benallfree.com

== Screenshots ==

1. Add custom CSS to your site, both admin and public pages
2. Lesser outputs styling compatible with popular caching plugins
3. Lesser Pro - manage public and admin page styling separately
4. Lesser Pro - use Development Mode for unpacked CSS and cache-busting

== Changelog ==

= 1.0.0 =

* Initial version
