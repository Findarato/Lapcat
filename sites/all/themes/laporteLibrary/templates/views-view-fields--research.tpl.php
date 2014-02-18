<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates

 
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>
 * 
 * 
 * 
<?php print $fields["picture"]->content ?>
<?php print $fields["created"]->content ?>
<?php print $fields["name"]->content ?>
<?php print $fields["body"]->content ?>
<?php print $fields["field_tags"]->content ?>
 *  */

 

$ip = $_SERVER['REMOTE_ADDR'];
$valid  = false;

$validIp=array(
/*Hanna*/
'75.150.196.1',
'75.150.196.2',
'75.150.196.3',
'75.150.196.4',
'75.150.196.5',
'75.150.196.6',

/*Rolling Praire*/
'75.150.196.9',
'75.150.196.10',
'75.150.196.11',
'75.150.196.12',
'75.150.196.13',
'75.150.196.14',

/*Kingsford Heights*/
'75.150.196.17',
'75.150.196.18',
'75.150.196.19',
'75.150.196.20',
'75.150.196.21',
'75.150.196.22',

/*Union Mills*/
'75.150.211.249',
'75.150.211.250',
'75.150.211.251',
'75.150.211.252',
'75.150.211.253',
'75.150.211.254',

/*Fish Lake*/
'70.91.251.193',
'70.91.251.194',
'70.91.251.195',
'70.91.251.196',
'70.91.251.197',
'70.91.251.198',

/*Coolspring*/
'75.145.130.225',
'75.145.130.226',
'75.145.130.227',
'75.145.130.228',
'75.145.130.229',
'75.145.130.230',

/*Main*/
'75.149.222.209',
'75.149.222.210',
'75.149.222.211',
'75.149.222.212',
'75.149.222.213',
'75.149.222.214');
 
if(in_array($ip,$validIp)) //branches
{$inside = true;}
if(substr($ip,0,12) == '165.138.238.') //main
{$inside = true;}
if(substr($ip,0,7) == '10.1.1.') //main  
{$inside = true;}
 
?>


<li class="linkIcon researchList <?php print $fields["field_tag"]->content ?>">
  <?Php if($inside == true): ?> <!-- inside true--> 
    <?Php if($fields["field_outside_link"]->content == ""): ?>
      <span class="icon-lock" style="margin-right:3px;cursor:not-allowed" title="Available at the library only"></span>
    <?Php endif ?>
    <a href="<?Php print $fields["field_inside_link"]->content;?>"><?Php print $fields["title"]->content;?></a>
  <?Php else: ?><!-- inside false-->
    <?Php if($fields["field_outside_link"]->content == ""): ?>
      <span class="icon-lock" style="margin-right:3px;cursor:not-allowed" title="Available at the library only"></span>
    <?Php endif ?>
    <a href="<?Php print $fields["field_inside_link"]->content;?>"><?Php print $fields["title"]->content;?></a>
  <?Php endif; ?><!-- inside true/false end-->
  
  <label data-link="<?Php if($inside==true){print $fields["field_inside_link"]->content;}else{print $fields["field_outside_link"]->content;} ?>" class="hoverCard icon-search" style="display:none;margin-left:3px,font-size:1em,color:rgba(85, 102, 68,.6)"></label>
  <?php print $fields["field_research_image"]->content ?>
  <div class=researchInfoBasic>
    <?php print $fields["body"]->content ?>
  </div>
</li>