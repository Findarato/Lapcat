<?Php
if(render($content)!=""){
?>
  <div class="bookBox">
    <div class="bookTitle">
      <h2><?Php print render($title);?></h2>
    </div>
    <div class="bookContainer" style="padding-left:10px;">
      <?php
        if(render($content)!=""){
          print render($content);  
        }
      ?>
    </div>
  </div>
<?php
}
?>