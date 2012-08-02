<style>
	.flickrImageTitle{
		position:absolute;
		bottom:0px;
		background-color:rgba(0,0,0,.6);
		color:#F1F1F1;
		width:100%;
		padding:5px;
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
	}
	.flickrPictureOutline{ /* This is the hidden area that shows on hover*/
		background:#fff;
		font-size:.8em;
		color:#000;
		height:135px;
		width:112px;
		position:absolute;
		overflow:hidden;
		top:-4px;
		left:-4px;

    }
	.flickerPictureBox{
		display:inline-block;

	}
	.flickerPictureBox .flickrPicture:hover{
		background:#fff;
		padding-bottom:30px;
		z-index:999;
		overflow:visible;
		-webkit-transform:scale(1.3,1.3);
		-moz-transform:scale(1.3,1.3);
		-o-transform:scale(1.3,1.3);
		-ms-transform:scale(1.3,1.3);
		transform:scale(1.3,1.3);

	}
	.flickerPictureBox .flickrPicture:hover .flickrPictureOutline{
    -webkit-box-shadow: 3px 3px 24px 10px rgba(0, 0, 0, .2);
    -moz-box-shadow: 3px 3px 24px 10px rgba(0, 0, 0, .2);
    box-shadow: 3px 3px 24px 10px rgba(0, 0, 0, .2);
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
