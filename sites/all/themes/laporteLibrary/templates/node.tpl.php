<?php
if(render($content)!=""){
?>
          <div class="bookBox roundAll3">
            <div class="boxTitle roundAll3 titleElement color3">
              <h2><?Php print render($title);?></h2>
            </div>
            <div id="blogContainerBox" class="insideBoxShadow roundAll3 bookContainer" style="padding-left:10px;">
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