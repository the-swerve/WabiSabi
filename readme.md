
# WabiSabi CMS

## Overview

WabiSabi will allow designers to easily and declaratively make templates and to
insert fields and blog feeds that are all editable in-place.

1. Put your template, with all its styles and scripts, inside the 'temple' directory.

2. On your template pages, you can define 'gardens', which are editable areas of
the template

3. You can split up your template bits with 'blocks', which come from the phpti
library.

4. You can instantiate pages of your template by logging in as admin (/admin), then going to URL that doesn't have any page on it, and choosing your template from the dropdown

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


