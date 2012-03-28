<style>
	.flickrImageTitle{
		position:absolute;
		bottom:0px;
		background-color:rgba(0,0,0,.6);
		color:#F1F1F1;
		width:100%;
		padding:5px;
	}
	.flickerPicture{

	}
	.flickrPicture a{
		height:100px;
		width:100px;
		display:block;
		position:absolute;
		top:6px;
		left:6px;
	}
	.flickerPictureBox .flickrPicture{
		margin:5px;
		padding:3px;
		height:100px;
		width:100px;
		overflow:hidden;
		-webkit-transition: .2s ease-in-out;
		-moz-transition: .2s ease-in-out;
		-o-transition: .2s ease-in-out;
		transition: .2s ease-in-out;		
		
	}
	.flickrPictureOutline{
		background-color:#fff;
		font-size:.8em;
		color:#000;
		height:135px;
		width:112px;
		position:absolute;
		overflow:hidden;
		top:-4px;
		left:-4px;
		-webkit-box-shadow: 3px 3px 24px 10px rgba(88, 88, 88, .6);
		-moz-box-shadow: 3px 3px 24px 10px rgba(88, 88, 88, .6);
		box-shadow: 3px 3px 24px 10px rgba(88, 88, 88, .6);
    }
	.flickerPictureBox{
		display:inline-block;

	}
	.flickerPictureBox .flickrPicture:hover{
		background-color:#fff;
		padding-bottom:30px;
		z-index:999;
		overflow:visible;
		-webkit-transform:scale(1.5,1.5);
		-moz-transform:scale(1.5,1.5);
		-o-transform:scale(1.5,1.5);
		-ms-transform:scale(1.5,1.5);
		transform:scale(1.5,1.5);
	}
	
	.flickerPictureBox .flickrPicture:hover a{
		border:rgb(0,0,0) solid 1px;
		border:rgba(0,0,0,.6) solid 1px;	
		
	}
</style>
<div class="blogBox roundAll3">
	<div class="flickerTitle roundAll3 titleElement color3"><a href="{if $flickerLink ne ""} {$flickerLink}{/if}" style="height:100%;width:100%">{if $flickerTitle ne ""}{$flickerTitle}{/if}</a></div>
	<div id="flickerContainerBox" class="insideBoxShadow roundAll3 containerBox" >
		<div id="flickerScrollBox" style="margin:0 auto"></div>
		<div class="flickerPictureBox" id="flickerPictureBox" style="text-align:center"></div>
	</div>
</div>
