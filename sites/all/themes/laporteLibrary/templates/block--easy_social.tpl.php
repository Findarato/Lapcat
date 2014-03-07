<?php
if(render($content)!=""){
?>
  <div class="bookBox">
    <div class="bookTitle">
      <h2>Share</h2>
    </div>
    <divclass="bookContainer" style="padding-left:10px;">
      <?php
        if(render($content)!=""){print render($content);}
      ?>          
    </div>
  </div>
<?php
}
?>