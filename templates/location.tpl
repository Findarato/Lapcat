{if $location=="main"}
	{$location = "Main Library"}
	{$address = "904 Indiana Ave"}
	{$city = "La Porte"}
	{$state = "Indiana"}
	{$zip = "46350"}
	{$phone = "(219) 362-6156"}
	{$email = "reference@lapcat.org"}
    {$time0="Closed"}
    {$time1="9:00 AM - 8:00 PM"}
    {$time2="9:00 AM - 8:00 PM"}
    {$time3="9:00 AM - 8:00 PM"}
    {$time4="9:00 AM - 8:00 PM"}
    {$time5="9:00 AM - 6:00 PM"}
    {$time6="9:00 AM - 5:00 PM"}
    {$mapLoc = "41.609126,-86.721036"}
    {$locationLink = "http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f186aedafe3350d0"}
{/if}
{if $location=="coolspring"}
	{$location = "Coolspring"}
	{$address = "7089 West 400 North"}
	{$city = "Michigan City"}
	{$state = "Indiana"}
	{$zip = "46360"}
	{$phone = "(219) 879-3272"}
	{$email = "coolspring@lapcat.org"}
    {$time0="Closed"}
    {$time1="10:00 AM - 7:00 PM"}
    {$time2="10:00 AM - 7:00 PM"}
    {$time3="10:00 AM - 7:00 PM"}
    {$time4="10:00 AM - 7:00 PM"}
    {$time5="10:00 AM - 7:00 PM"}
    {$time6="9:00 AM - 5:00 PM"}	
    {$mapLoc = "41.665805,-86.836627"}
    {$locationLink = "http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f1869f04a56d1f0e"}
{/if}
{if $location=="kingsford"}
	{$location = "Kingsford Heights"}
	{$address = "436 Evanston (P.O. Box 219)"}
	{$city = "Kingsford Heights"}
	{$state = "Indiana"}
	{$zip = "46346"}
	{$phone = "(219) 393-3280"}
	{$email = "kingsford@lapcat.org"}
    {$time0="Closed"}
    {$time1="1:00 PM - 7:00 PM"}
    {$time2="Closed"}
    {$time3="1:00 PM - 7:00 PM"}
    {$time4="1:00 PM - 7:00 PM"}
    {$time5="1:00 PM - 7:00 PM"}
    {$time6="9:00 AM - 2:00 PM"}
    {$mapLoc = "41.481936,-86.695347"}
    {$locationLink = "http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f1866d31e1acd702"}
{/if}
{if $location=="union"}
	{$location = "Union Mills"}
	{$address = "3727 W 800 S"}
	{$city = "Union Mills"}
	{$state = "Indiana"}
	{$zip = "46382"}
	{$phone = "(219) 767-2604"}
	{$email = "union@lapcat.org"}
    {$time0="Closed"}
    {$time1="12:00 PM - 7:00 PM"}
    {$time2="1:00 PM - 6:00 PM"}
    {$time3="1:00 PM - 7:00 PM"}
    {$time4="Closed"}
    {$time5="1:00 PM - 6:00 PM"}
    {$time6="9:00 AM - 2:00 PM"}
    {$mapLoc = "41.491091,-86.771871"}
    {$locationLink = "http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f1865eaf35b544cb"}
{/if}


<div class="blogBox roundAll3" style="min-height:310px;">
	<div class="roundAll3 titleElement color3"><a href="{$locationLink}" title="View {$location} in Google Maps">{$location}</a></div>
	<div id="locationContainerBox" class="insideBoxShadow roundAll3 containerBox" style="min-height:310px">
		<div class="" style="width:40%;float:left">
			<div>{$address}</div>
			<div>{$city}, {$state} {$zip}</div>
			<div>{$phone}</div>
			<div><a href="mailto:{$email}" title="Email address">{$email}</a></div>
		<div class="">
			<div>Sunday: {$time0}</div>
			<div>Monday: {$time1}</div>
			<div>Tuesday: {$time2}</div>
			<div>Wednsday: {$time3}</div>
			<div>Thursday: {$time4}</div>
			<div>Friday: {$time5}</div>
			<div>Saturday: {$time6}</div>
		</div>
		</div>
		<div class="" style="width:60%;float:left">
			<div class="roundAll3 color3 insideBoxShadow outsideBoxShadow map" style="background-size:cover;margin-right:5px;height:300px;width:100%;background:url('http://maps.googleapis.com/maps/api/staticmap?center={$mapLoc}&zoom=14&size=355x300&maptype=roadmap&markers=icon:http://dev.lapcat.org/mapLogo.png|label:S|{$mapLoc}&sensor=false')"></div>
		</div>
	</div>
</div>
