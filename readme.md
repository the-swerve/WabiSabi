
# WabiSabi CMS

## Overview

WabiSabi will allow designers to easily and declaratively make templates and to
insert fields and blog feeds that are all editable in-place.

This CMS is meant for personal websites, portfolios, websites for shops, restaurants, small companies, etc.

1. Put your template, with all its styles and scripts, inside the 'template' directory.

2. On your template pages, you can define 'fields', which are editable areas of
the template

3. You can split up your template bits with 'blocks', which come from the phpti
library.

4. You can instantiate pages of your template by logging in as admin (/admin), then going to URL that doesn't have any page on it, and choosing your template from the dropdown

5. If you're signed in as an admin, any editable area on your template will be editable in-place when you visit the page.

6. In you template, you can use the 'navigation()' function to generate your navigation links.

## SQLite

SQLite comes bundled into PHP5 and requires only file read/write.

## Basic auth

One user, one sign-in page ('/admin'), which has only a password field.

## Page Creation

Go to a 404 page -- if you're signed in, you get a page creation option.

Just like wikis -- create a link pointing to a new location, click that broken
link, then create the page. You get a dropdown for the template you want.

## The Temple

inside /temple, each php file is a template.

They can reference styles and images and javascripts from anywhere.

### Fields

Gardens are editable blocks. Simply declare:

	<?php garden(); ?>

Gardens have one option: they can be repeating. Repeating editable blocks are
useful for blogs and news.

<?php garden('repeating'); ?>

## todo in order of priority

* Field autosaving.
* Auto-updating of wabisabi - http://wprealm.com/blog/yes-you-can-plugin-auto-updates-from-github/
* Display and edit page title.
* Data backup.
* Dynamic session token with multi-signins -- needed?

## Known Issues

* When editing a page and then refreshing, sometimes a field will not have the correct stylings.
