<?php
/*
 * @file
 * Administration page callbacks
 */
function flickrgallery_settings_form() {
  $form = array();
  
  // Check if phpFlickr.php is in place
  _flickrgallery_check_file();
  
  $options = array(
    's'  => t('small square 75x75'),
    't'  => t('thumbnail, 100 on longest side'),
    'm'  => t('small, 240 on longest side'),
    'z'  => t('medium 640, 640 on longest side'),
    'b'  => t('large, 1024 on longest side'),
  );
  
  $sizes = array(
    "square" => t('small square 75x75'),
    "thumbnail" => t('thumbnail, 100 on longest side'),
    "small" => t('small, 240 on longest side'),
    "medium_640" => t('medium 640, 640 on longest side'),
    "large" =>  t('large, 1024 on longest side'),
  );
  
  $form['flickrgallery_apikey'] = array(
    '#type' => 'textfield',
    '#title' => t('API Key'),
    '#description' => t('Fill in your API key.') . ' ' . l(t('Get your API key'), 'http://www.flickr.com/services/apps/by/me'),
    '#default_value' => variable_get('flickrgallery_apikey', NULL),
  );
  
  $form['flickrgallery_secretkey'] = array(
    '#type' => 'textfield',
    '#title' => t('Secret Key'),
    '#description' => t('Fill in your secret key.') . ' ' . l(t('Get your secret key'), 'http://www.flickr.com/services/apps/by/me'),
    '#default_value' => variable_get('flickrgallery_secretkey', NULL),
  );
  
  $form['flickrgallery_userID'] = array(
    '#type' => 'textfield',
    '#title' => t('User ID'),
    '#description' => t('Fill in your user ID.') . ' ' . l(t('Find your User ID'), 'http://idgettr.com/'),
    '#default_value' => variable_get('flickrgallery_userID', NULL),
  );

  $form['flickrgallery_private_pictures'] = array(
    '#type' => 'select',
    '#title' => t('Show private pictures'),
    '#description' => t('Show your private pictures, by default this is turned off.'),
    '#default_value' => variable_get('flickrgallery_private_pictures', 0),
    '#options' => array(0 => t('No'), 1 => t('Yes')),
  ); 
 
  $form['flickrgallery_token'] = array(
    '#type' => 'textfield',
    '#title' => t('Token for private pictures'),
    '#description' => t('Go to') . ' ' . l(t('http://www.flickr.com/services/api/keys/'), 'http://www.flickr.com/services/api/keys/', array('attributes' => array('target' => '_blank')))
                        . ' ' . t('and edit your API key details, set \'authentication type\' to web application and as \'callback url\': <em>http://phpflickr.com/tools/auth/auth.php</em>') . '<br />' . 
                      t('Visit') . ' ' . l(t('http://phpflickr.com/tools/auth/'), 'http://phpflickr.com/tools/auth/', array('attributes' => array('target' => '_blank')))
                        . '' . t('and fill in your API and Secret keys to generate a token, copy the token in this field.'),
    '#default_value' => variable_get('flickrgallery_token', NULL),
  );

  $form['flickrgallery_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title sets page'),
    '#description' => t('Provide a title for the sets page.'),
    '#default_value' => variable_get('flickrgallery_title', NULL),
  );
  
  $form['flickrgallery_description'] = array(
    '#type' => 'textarea',
    '#title' => t('Description'),
    '#description' => t('Provide a description for the sets page.'),
    '#default_value' => variable_get('flickrgallery_description', NULL),
  );
  
  $form['flickrgallery_lightbox_type'] = array(
    '#type' => 'textfield',
    '#title' => t('Lightbox type'),
    '#description' => t('Fill in what type of Lightbox you would like to use. Examples: lightbox, shadowbox, colorbox, ...<br />This field will be used as the link rel tag and class name. (You need to download these modules separately)'),
    '#default_value' => variable_get('flickrgallery_lightbox_type', 'lightbox'),
  );
  
  $form['flickrgallery_albums'] = array(
    '#type' => 'select',
    '#title' => t('Display sets images size.'),
    '#description' => t('Select the size for the sets images'),
    '#default_value' => variable_get('flickrgallery_albums', 's'),
    '#options' => $options,
  );
  
  $form['flickrgallery_thumb'] = array(
    '#type' => 'select',
    '#title' => t('Display thumbnails on a set page'),
    '#description' => t('Select the size for the thumbnails on a set page.'),
    '#default_value' => variable_get('flickrgallery_thumb', 'square'),
    '#options' => $sizes,
  );
  
  $form['flickrgallery_large'] = array(
    '#type' => 'select',
    '#title' => t('Display large images from a set'),
    '#description' => t('Select the size for the larger images'),
    '#default_value' => variable_get('flickrgallery_large', 'b'),
    '#options' => $sizes,
  );

  $form['flickrgallery_performance'] = array(
    '#type' => 'fieldset',
    '#title' => t('Extra options'),
    '#collapsible' => TRUE,
  );
  
  $form['flickrgallery_performance']['flickrgallery_override'] = array(
    '#type' => 'checkbox',
    '#title' => t('Add more information to the images (You need to override the template files)'),
    '#description' => t('Select this option is you want to override the template files and have more information about the images available. Not recommended because this will lead to slower performance.'),
    '#default_value' => variable_get('flickrgallery_override', FALSE),
  );
  
  $form['flickrgallery_performance']['flickrgallery_caching'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable caching on the gallery.'),
    '#description' => t('This will cache the Flickr API calls'),
    '#default_value' => variable_get('flickrgallery_caching', FALSE),
  );
  
  $form['flickrgallery_help'] = array(
    '#markup' => '<div>' . t('When all settings are filled in correctly, you can visit your') . ' ' . l(t('Flickr Gallery'), 'flickr') . '</div>',
  );
  
  $form['#submit'][] = 'flickrgallery_settings_form_submit';
  
  return system_settings_form($form);
}

/**
 * Submit function for the settins form
 * Also creates the cache dir if option is checked
 */
function flickrgallery_settings_form_submit($form, &$form_state) {
  // Create the cache dir if option is checked
  if ($form_state['values']['flickrgallery_caching'] == TRUE) {
    // Set the path for the cache dir, for now hardcoded, but leave the option to make this custom later
    variable_set('flickrgallery_cach_dir', 'public://flickrgallery_cache');
    $path = variable_get('flickrgallery_cach_dir', NULL);

    // Check if the dir exists, else try to create
    if (!file_prepare_directory($path, FILE_CREATE_DIRECTORY | FILE_MODIFY_PERMISSIONS)) {
      if (!file_prepare_directory($path, FILE_CREATE_DIRECTORY)) {
        drupal_set_message(t('Unable to create Flickr Gallery cache directory. Check the permissions on your files directory.'), 'error');
        return;
      }
    }
  }
}