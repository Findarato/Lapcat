
Views custom template
=====================

Add custom views template suggestions
http://drupal.org/project/views_custom_template

Features
========

- Add template suggestion for view displays, rows and fields so you can re-use one template for multiple views


Requirements
============

- Views 3.x
  http://drupal.org/project/views

Installation
============

- Install Views custom template
- Sit back and relax

Usage
=====

- Go to Views
- Inside your view display, (In the 3rd column) Other you will find the option "Template suggestion"
- Enter the machine-name you want to use for the view template.
- Re-use your template for multiple displays
- If you override the views default template with a views suggestion like views-view-Page--1.tpl.php the custom template will NOT override this template!
- Flush the theme cache after you add your template because it's in the Theme registry

"My Custom Template" will become "my_custom_template" (machine-name).
All levels Views templates will use this suggestion: view, row, fields.

Example: My Custom Template

views-view--my-custom-template.tpl.php
views-view-unformatted-my-custom-template.tpl.php
views-view-list--my-custom-template.tpl.php
views-view-grid--my-custom-template.tpl.php
views-view-fields--my-custom-template.tpl.php
etc.