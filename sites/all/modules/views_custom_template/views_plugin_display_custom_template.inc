<?php

/**
 * @file
 * Extend display options
 *
 * @see views_custom_template_views_plugins()
 */

class views_plugin_display_custom_template extends views_plugin_display_extender {

  /**
   * Expose option and set default.
   */
  function options_definition() {
    $options = parent::option_definition();
    $options['template_suggestion']['default'] = '';
    return $options;
  }

  /**
   * Provide a form for setting options.
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    if ($form_state['section'] == 'template_suggestion') {
      $form['#title'] .= t('Template suggestion');
      $form['description'] = array(
        '#markup' => '<div class="description form-item">' . t('Add custom template suggestion for your view templates.') . '</div>',
      );
      $template_suggestion = $this->get_template_suggestion();
      $form['template_suggestion'] = array(
        '#type' => 'textfield',
        '#title' => 'Custom template suggestion (machine-name style)',
        '#default_value' => $template_suggestion,
        '#size' => 30,
        '#maxlength' => 30,
        '#description' => t(
        '<p>"<code>My Custom Template</code>" will become "<code>my_custom_template</code> (machine-name)".</br>All levels Views templates will use this suggestion: view, row, field.</p>
        <p><strong>Example: My Custom Template</strong></p>
        <ul>
          <li>views-view--my-custom-template.tpl.php</li>
          <li>views-view-unformatted-my-custom-template.tpl.php</li>
          <li>views-view-list--my-custom-template.tpl.php</li>
          <li>views-view-grid--my-custom-template.tpl.php</li>
          <li>views-view-fields--my-custom-template.tpl.php</li>
          <li>etc.</li>
        </ul>
        <p><strong>The template suggestion will be used after you flush the theme registry cache.</strong></p>'),
      );
    }
  }

  /**
   * Save option to display
   */
  function options_submit(&$form, &$form_state) {
    parent::options_submit($form, $form_state);

    $template_suggestion = $this->get_template_suggestion($form_state['values']['template_suggestion']);
    $this->display->set_option('template_suggestion', $template_suggestion);
  }

  /**
   * Provide the default summary for options in the views UI.
   *
   * This output is returned as an array.
   */
  function options_summary(&$categories, &$options) {
    // Never for the Master display.
    if (!empty($this->display->default_display) && $this->display->default_display != $this->display) {
      parent::options_summary($categories, $options);

      $template_suggestion = $this->get_template_suggestion() ?: t('None');

      $options['template_suggestion'] = array(
        'category' => 'other',
        'title' => t('Template suggestion'),
        'value' => $template_suggestion,
        'desc' => t('Change the template suggestion that will be added to this display.'),
      );
    }
  }

  function get_template_suggestion($template_suggestion = '') {
    if (!$template_suggestion) {
      $template_suggestion = $this->display->get_option('template_suggestion');
    }
    $template_suggestion = _format_views_custom_template_suggestion($template_suggestion);
    return $template_suggestion;
  }

}
