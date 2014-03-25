<?Php
function laporteLibrary_css_alter(&$css) {
    unset($css[drupal_get_path('module','system').'/system.theme.css']);
    unset($css[drupal_get_path('module','system').'/system.base.css']);
    unset($css[drupal_get_path('module','system').'/system.menus.css']);
}

function laporteLibrary_breadcrumb($variables) {
 $breadcrumb = $variables['breadcrumb'];
  $breadcrumb = array_unique($breadcrumb);
   
  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $crumbs = '<div class="breadcrumb">';

   
  $array_size = count($breadcrumb);
    $i = 0;
    while ( $i < $array_size) {
   
      $pos = strpos($breadcrumb[$i], drupal_get_title());
      //we stop duplicates entering where there is a sub nav based on page jumps
      if ($pos === false){
        $crumbs .= '<span class="breadcrumb-' . $i;
        $crumbs .=  '">' . $breadcrumb[$i] . '</span> &gt; ';
      }
      $i++;
    }
    $crumbs .= '<span class="active">'. drupal_get_title() .'</span></div>';
    return $crumbs;
  }
}