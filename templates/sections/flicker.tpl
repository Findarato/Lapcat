<style>
	.flickrImageTitle{
		position:absolute;
		bottom:0px;
		background-color:rgba(0,0,0,.6);
		color:#F1F1F1;
		width:100%;
		padding:5px;
	}
	.flickerPictureBox a{
		margin:5px;
		padding:3px;
		height:100px;
		width:100px;
		display:inline-block;
		-moz-box-shadow: inset 0 0 1px 1px #888;
		-webkit-box-shadow: inset 0 0 1px 1px#888;
		box-shadow: inset 0 0 1px 1px #888;
		-webkit-transition: .3s ease-in;
		-moz-transition: .3s ease-in;
		-o-transition: .3s ease-in;
		transition: .3s ease-in;
	}
	.flickerPictureBox a:hover{
		-moz-box-shadow: inset 0 0 5px 5px #0C717A;
		-webkit-box-shadow: inset 0 0 5px 5px #0C717A;
		box-shadow: inset 0 0 5px 5px #0C717A;
	}
}
</style>
<div class="blogBox roundAll3">
	<div class="flickerTitle roundAll3 titleElement color3"><a href="http://www.flickr.com/photos/62092835@N08" style="height:100%;width:100%">Community Art</a></div>
	<div id="flickerContainerBox" class="insideBoxShadow roundAll3 containerBox" >
		<div id="flickerScrollBox" style="margin:0 auto"></div>
		<div class="flickerPictureBox" id="flickerPictureBox" style="text-align:center"></div>
	</div>
</div>
