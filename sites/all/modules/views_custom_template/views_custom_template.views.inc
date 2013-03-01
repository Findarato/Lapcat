<?php

/**
 * @file
 * Views hooks for this module.
 *
 * Defines a display extender to add settings without creating a style plugin.
 */

/**
 * Implements hook_views_plugins().
 */
function views_custom_template_views_plugins() {
  return array(
    // This just tells our themes are elsewhere.
    'module' => 'views',
    // Display settings
    'display_extender' => array(
      // Default settings for all display_extender plugins.
      'template_suggestion' => array(
        'title' => t('Template suggestion'),
        'help' => t('Default settings for this view.'),
        'handler' => 'views_plugin_display_custom_template',
        // You can force the plugin to be enabled
        'enabled' => TRUE,
        'no ui' => FALSE,
      ),
    ),
  );
}
