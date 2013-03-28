# WabiSabi CMS

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

### Garden

Gardens are editable blocks. Simply declare:

	<?php garden(); ?>

Gardens have one option: they can be repeating. Repeating editable blocks are
useful for blogs and news.

<?php garden('repeating'); ?>


