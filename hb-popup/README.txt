=== HB PopUp ===
Contributors: Jessica Michaels
Donate link: https://example.com
Tags: lead-generation, marketing, emails, popups
Requires at least: 3.0.1
Tested up to: 6.1.1
Stable tag: 6.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

An out-of-the-box popup for posts of "default" post type.

== Description ==

Case Study test of Jessica Michaels for the Senior WordPress Developer Role.

== Installation ==

1. Upload `hellobetter-pop-up.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Case Study Questions ==

= Given the time restriction for this task, what would you do differently if you had more time? =

I think the 2-3hr timeframe is realistic if this plugin was to be a single file/2-3file plugin. I wanted to use standard plugin folder and file structures though, and this requires creating custom classes.
For me, the 2-3hr timeframe would apply only for the HTML/CSS and basic JS parts of the plugin.

= What would your approach be if we wanted the copy texts editable by admins? =

I would add fields. The quickest method would be to use the Advanced Custom Fields plugin, and then integrate into the app and create an admin-facing options page to display and capture fields/input. But one can also do this manually, without relying on another plugin, by using WordPress' settings API as per their documentation: https://codex.wordpress.org/Creating_Options_Pages.

= Describe the details of your approach if we wanted a fully-functioning form. What WordPress plugin would you choose (if any) and why? =

You have in mind that:

1. We would like the data sent to a CRM like Hubspot and campaign software like Mailchimp

2. Email addresses are sensitive data and we wouldn’t want them stored in the database

3. Emails to the users are not required (they’re handled elsewhere)

I like Contact Form 7 (CF7) as the fields that it outputs are plain HTML without styling, and it has an out-of-the-box solution for integrating with a CRM. CF7 also doesn't store email addresses or email submissions, unless a separate plugin to capture them is also installed.

= In the second iteration, we want to ask the users to upload an image file. These images contain sensitive data, and we don’t want them to be uploaded or stored on the same server. How would you handle this issue? =

Another great feature of CF7 is that it doesn't store uploaded files - https://contactform7.com/file-uploading-and-attachment/#:~:text=After%20these%20procedures%2C%20Contact%20Form%207%20then%20removes%20the%20file%20from%20the%20temporary%20folder

= In the future, we want to use the same pop-up design but with different functionality (Author version - see supplementary Figma design). What would be the most effective way to keep your code DRY? =

I didn't see the supplementary Figma design unfortunately, so I don't know yet how the Author version differs to the original. But, using ACF and/or the WP Settings API + options page, I would add options for things like the post type/s the popup applies to, minor layout options (center align the text, large or small image, etc), and an optional 'success' view. Then, I would use these values for conditional functions within hb-popup-public.php to output the user's choices correctly (like echoing an option for an element in the classlist, then targeting that class in SCSS).

If multiple popups need to exist on the site, I would use custom post types to handle the different popups, and then the options would be accessible on the edit page of each popup.

= You are told that the current version which you have just developed is urgent, but the second Author version needs to also go live asap. How would you handle this request? =
I would build the plugin from the start with scalability in mind, so that when a new kind of popup needs to be added quickly, all that's needed is to create a new one and configure some settings.

= Form submissions should send a tracking event to Google Analytics. This needs to be easily set up by an editor. Describe how you would approach this. =
CF7 should be able to handle this, but if not:
In settings for the popup, add a text-area to paste the code into.
In the plugin files, hook into wp_head and output the value of the text-area within some opening and closing comments, if a value exists. (https://developer.wordpress.org/reference/hooks/wp_head/)

== Changelog ==

= 1.0 =
* Init