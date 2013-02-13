<!DOCTYPE html>
<html>
  <head>
    <style type="text/css" media="screen">
      @import url("http://dev.lapcat.org/sites/all/themes/lapcat/reset.css?mi2j3p");
      @import url("http://dev.lapcat.org/sites/all/themes/lapcat/less/compiled.css?mi2j3p");
    </style>
    <style type="text/css" media="all and (min-width: 960px)">
      @import url("http://dev.lapcat.org/sites/all/themes/lapcat/960_24_col.css?mi2j3p");
    </style>
    <style type="text/css" media="all and (max-width: 959px)">
      @import url("http://dev.lapcat.org/sites/all/themes/lapcat/less/mq.css?mi2j3p");
    </style>
  </head>
  <div style="height:300px;width:100%;">
    &nbsp;
  </div>
  <footer style="margin-top:10px;margin-right:0px">
    <div class="outSideBoxShadow color4" style="width:100%;display:table;bottom:0px;position:relative">
      <div style="display:table-cell;width:33%;"> <!--Links-->
        <div>
          <?php if ($page['pageLinks']): ?>
            <div id="pageLinks"><?php print render($page['pageLinks']); ?></div>
          <?php endif; ?>
        </div>
      </div>
      <div style="display:table-cell;width:33%;">
        <!--Content-->
        <div  style="border-spacing: .2em;">
          <div class="linearAnimate td" style="width: 150px; vertical-align: top; font-size: 1.1em;">
            <div id="MA" class="locationHover smoothAnimate">
              Main
            </div>
            <div class="locationBoxInfoLocation">
            <div style="white-space: nowrap;">904 Indiana Ave</div>
            <div style="white-space: nowrap;">La Porte,Indiana 46350</div>
            <div style="white-space: nowrap;">(219) 362-6156</div>
            <div><a title="Email address" href="mailto:reference@lapcat.org">reference@lapcat.org</a></div>
            </div>
          </div>
          <div id="locationDisplay" class="td" style="height: 145px; font-size: 1em;width:100%">
            <div class="locationBoxMap" style="width:100%">
              <a title="View Main Library in Google Maps" style="max-width:400px;display:block;background-size:cover;margin-right:5px;height:200px;width:100%;background:url('http://maps.googleapis.com/maps/api/staticmap?center=41.609126,-86.721036&amp;zoom=14&amp;size=400x300&amp;maptype=roadmap&amp;markers=icon:http://dev.lapcat.org/mapLogo.png|label:S|41.609126,-86.721036&amp;sensor=false') 50%" class="roundAll3 color3 insideBoxShadow outsideBoxShadow map" href="http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&amp;msa=0&amp;iwloc=00049f186aedafe3350d0"></a>
            </div>
            <a href="/hours">View More Locations</a>
          </div>
        </div>
        <!--!Content-->
      </div>
      <div style="display:table-cell;width:33%;">
        <?php if ($page['search']): ?>
          <div id="search"><?php print render($page['search']); ?></div>
        <?php endif; ?> 
      </div>
    </div>
  </footer>   



</html>


