
<?php
/**
 * @file
 * Bean: Flickr bean plugin.
 */

class FlickrBean extends BeanPlugin {
  /**
   * Declares default block settings.
   */
  public function values() {
    return array(
      'display_options' => array(),
      'search_options' => array(),
    );
  }

  /**
   * Builds extra settings for the block edit form.
   */
  public function form($bean, $form, &$form_state) {

    if (!(variable_get('flickrapi_api_key', FALSE))) {
      drupal_set_message(t('You have to enter your Flickr API key first.'), 'error');
      return array();
    }

    $form = array();

    $form['search_options'] = array(
      '#type' => 'fieldset',
      '#tree' => TRUE,
      '#title' => t('Search Options'),
      '#description' => t('Select how photos should be found on Flickr.'),
    );

    $form['search_options']['search_on'] = array(
      '#type' => 'select',
      '#title' => t('Search on'),
      '#options' => array(
        'taxonomy' => 'Taxonomy terms',
        'string' => 'Given string'
      ),
      '#default_value' => isset($bean->search_options['search_on']) ?
        $bean->search_options['search_on'] : 0,
    );

    $form['search_options']['taxonomy'] = array(
      '#type' => 'checkboxes',
      '#tree' => TRUE,
      '#title' => t('Vocabularies'),
      '#options' => array(),
      '#description' => t('Tags that are referenced to from the node will be used to search Flickr. Leave blank for all.'),
      '#default_value' => isset($bean->search_options['taxonomy']) ?
        $bean->search_options['taxonomy'] : array(),
      '#states' => array(
        'visible' => array(
          ':input[name="search_options[search_on]"]' => array('value' => 'taxonomy'),
        ),
      ),
    );

    foreach (taxonomy_get_vocabularies() as $vocab) {
      $form['search_options']['taxonomy']['#options'][$vocab->machine_name] = $vocab->name;
    }

    $form['search_options']['string'] = array(
      '#type' => 'textfield',
      '#tree' => TRUE,
      '#title' => t('Keyword'),
      '#description' => t('Separate multiple keywords with comma\'s'),
      '#default_value' => isset($bean->search_options['string']) ?
          $bean->search_options['string'] : '',
      '#states' => array(
        'visible' => array(
          ':input[name="search_options[search_on]"]' => array('value' => 'string'),
        ),
      ),
    );

    $form['search_options']['tag_mode'] = array(
      '#type' => 'radios',
      '#tree' => TRUE,
      '#title' => t('Tag mode'),
      '#options' => array(
        'any' => t('Any (OR)'),
        'all' => t('All (AND)'),
      ),
      '#description' => t('Return photo\'s that match any or all terms?'),
      '#default_value' => isset($bean->search_options['tag_mode']) ?
        $bean->search_options['tag_mode'] : 0,
    );

    $form['search_options']['search_mode'] = array(
      '#type' => 'radios',
      '#tree' => TRUE,
      '#title' => t('Search mode'),
      '#options' => array(
        'text' => t('Free text'),
        'tags' => t('Flickr tags'),
      ),
      '#description' => t('Do you want to search on specific tags or full text (title, description or tags)'),
      '#default_value' => isset($bean->search_options['search_mode']) ?
        $bean->search_options['search_mode'] : 'text',
    );

    $form['display_options'] = array(
      '#type' => 'fieldset',
      '#tree' => TRUE,
      '#title' => t('Display Options'),
    );

    $form['display_options']['entity_type'] = array(
      '#type' => 'select',
      '#title' => t('Show on entity type:'),
      '#options' => array(),
      '#default_value' => isset($bean->display_options['entity_type']) ?
        $bean->display_options['entity_type'] : 'node',
    );
    foreach (entity_get_info() as $entity_type => $entity_info) {
      $form['display_options']['entity_type']['#options'][$entity_type] = $entity_info['label'];
    }

    $form['display_options']['num_images'] = array(
      '#type' => 'select',
      '#title' => t('Number of images'),
      '#description' => t('Maximum number of Flickr images.'),
      '#options' => drupal_map_assoc(range(1, 100)),
      '#default_value' => isset($bean->display_options['num_images']) ?
        $bean->display_options['num_images'] : 5,
    );

    $form['display_options']['image_size'] = array(
      '#type' => 'select',
      '#title' => t('Image size'),
      '#description' => t('Display listed images in this format.'),
      '#options' => array(
        'square' => 'Square',
        'thumbnail' => 'Thumbnail',
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
        'original' => 'Original'
      ),
      '#default_value' => isset($bean->display_options['image_size']) ? $bean->display_options['image_size'] : 'thumbnail',
    );

    $form['display_options']['sort'] = array(
      '#type' => 'select',
      '#title' => t('Sort on'),
      '#description' => t('Display how listed photos are ordered. !interestingness', array(
        '!interestingness' => l(t('Interestingness?'), 'http://www.flickr.com/explore/interesting/'))),
      '#options' => array(
        'date-posted-desc' => 'Date posted (newest first)',
        'date-posted-asc' => 'Date posted (oldest first)',
        'date-taken-desc' => 'Date taken (newest first)',
        'date-taken-asc' => 'Date taken (oldest first)',
        'interestingness-desc' => 'Interestingness (most interesting first)',
        'interestingness-asc' => 'Interestingness (least interesting first)'
      ),
      '#default_value' => isset($bean->display_options['sort']) ?
        $bean->display_options['sort'] : 'date-posted-desc',
    );

    $form['display_options']['list_type'] = array(
      '#type' => 'select',
      '#title' => t('List type'),
      '#options' => array(
        'ul' => t('Unordered list'),
        'ol' => t('Ordered list'),
      ),
      '#default_value' => isset($bean->display_options['list_type']) ? $bean->display_options['list_type'] : 'ul',
    );

    $form['display_options']['link'] = array(
      '#type' => 'checkbox',
      '#title' => t('Link to Flickr'),
      '#description' => t('This is a slightly performance decrease due to an extra API call.'),
      '#default_value' => isset($bean->display_options['link']) ?
        $bean->display_options['link'] : TRUE,
    );

    return $form;
  }

  /**
   * Displays the bean.
   */
  public function view($bean, $content, $view_mode = 'default', $langcode = NULL) {
    if ($bean->search_options['search_on'] == 'taxonomy') {
      $terms = array();
      $entity_type = $bean->display_options['entity_type'];
      $entity = menu_get_object($entity_type);

      if (empty($entity)) {
        return;
      }

      // Get Vocabulary ID's to use.
      $vocabularies = array();
      foreach ($bean->search_options['taxonomy'] as $vocabulary_machine_name => $vid_use) {
        if ($vid_use) {
          $vocabularies[] = $vocabulary_machine_name;
        }
      }

      // Get Taxonomy fields.
      $taxonomy_fields = array();
      foreach (field_info_fields() as $field => $field_info) {
        if ($field_info['type'] == 'taxonomy_term_reference' && isset($field_info['bundles'][$entity_type])) {
          $taxonomy_fields[$field_info['id']] = $field_info['field_name'];
        }
      }

      if ($entity) {
        foreach ($taxonomy_fields as $tax_field) {
          $field = $entity->$tax_field;
          $tids = field_get_items($entity_type, $entity, $tax_field);
          foreach ($tids as $term_info) {
            $term = taxonomy_term_load($term_info['tid']);
            if (in_array($term->vocabulary_machine_name, $vocabularies) || empty($vocabularies)) {
              $terms[] = $term->name;
            }
          }
        }
      }
      if (!empty($terms)) {
        $terms = implode(', ', $terms);
      }
    }
    else {
      $terms = $bean->search_options['string'];
    }

    if ($terms) {
      $flickr_object = flickrapi_phpFlickr();
      $flickr_query = array(
        'media' => 'photos',
        $bean->search_options['search_mode'] => $terms,
        'tag_mode' => $bean->search_options['tag_mode'],
        'per_page' => $bean->display_options['num_images'],
        'sort' => $bean->display_options['sort'],
      );

      $photos = $flickr_object->photos_search($flickr_query);

      if (!empty($photos)) {
        $items = array();
        foreach ($photos['photo'] as $photo) {
          $image = theme('image', array(
            'path' => $flickr_object->buildPhotoURL($photo, $bean->display_options['image_size']),
            'alt' => $photo['title'],
            'title' => $photo['title'],
          ));

          // Link to the photo on Flickr
          if ($bean->display_options['link']) {
            $photo_info = $flickr_object->photos_getInfo($photo['id']);
            $image = l($image, $photo_info['photo']['urls']['url'][0]['_content'], array('html' => TRUE));
          }

          $items[] = $image;
        }
        $output = theme('item_list', array('items' => $items, 'type' => $bean->display_options['list_type'], 'attributes' => array('class' => $bean->delta)));
      }
      else {
        $output = '';
        $bean->title = '';
      }
    }
    else {
      $output = '';
      $bean->title = '';
    }

    $content['bean_flickr']['#markup'] = $output;
    return $content;
  }

}

