<!--//                 //-->
<!--// client-2009.php //-->
<!--//                 //-->
//
// FUNCTIONS
//
//
// Function - Thin Line HTML
function F_ThinLineHTML(v_XML){
	var a_Information=F_CXMLA(v_XML);
	$('#OL\\|options').html(F_Opt(a_Information));
	$('#OL\\|group-icons').html(F_HTMLI(a_Information,31,true));
	if(a_Information['counted']){$('#OL\\|progress-bar').html(F_CPB(a_Information['counted'],40,100,10));}
	if(a_Information['rating']){$('#OL\\|star-rating').html(F_CS(a_Information['rating']));}
	if(a_Information['my-rating']){$('#stars-my-rating').html(F_CS(a_Information['my-rating']));}
}
//
// Function - Log Out
function F_LogOut(){
	F_MR('/log-out/ajax');
	setTimeout('F_MR(\'/home/ajax\')',500);
}
//
// Function - NoRecords
function F_NoRecords(){$('#displays\\|text').html('<font style="margin-left:4px; margin-top:140px;">There are no '+A_AT[A_PI['area-ID']]+' that meet the criteria.<br/><font style="font-weight:bold; margin-left:4px;">'+A_PI['header']+'</font>');}
//
//
// ARRAYS
//
// Array - Line Information
var A_LI=new Array();
//
// Array - Auto-Complete
var A_AC=new Array();
//
// Array - Material Types
var A_MT=new Array(1,2,3,4,5,23,24,32,50,75,159);
//
// Array - Dockable Status
var A_DS=new Array();A_DS[1]=2;A_DS[2]=2;A_DS[3]=2;
//
// Array - Points Information
var A_PoI=new Array();A_PoI['objective-points']=0;A_PoI['patron-plus-points']=0;A_PoI['hotkeys-unlocked']=0;A_PoI['username']='';A_PoI['usertype']='Guest';
//
// Array - Search Information
var A_SI=new Array();A_SI['change-search']=0;A_SI['change-sort']=0;A_SI['change-tag']=0;A_SI['calendar']=0;
A_SI['actor']='';A_SI['artist']='';A_SI['author']='';A_SI['console-name']='';A_SI['m-artist']='';A_SI['narrator']='';A_SI['writer']='';
//
// Array - Star
var A_Sky=new Array(0,0,0,0,0);
//
// Array - Material Type Reference (area-ID reference)
var A_MTR=new Array();
A_MTR['actor']=Array(3,5);A_MTR['artist']=Array(32,32);A_MTR['author']=Array(1,23,24,50,75,159);A_MTR['console-name']=Array(4,4);A_MTR['m-artist']=Array(2,2);A_MTR['narrator']=Array(23,75,159);A_MTR['writer']=Array(32,32);
//
// Array - Drop Box Search (default Search text)
var A_DBSe=new Array();A_DBSe[10]='All Databases';A_DBSe[28]='All Events';A_DBSe[34]='All Materials';A_DBSe[131]='All News';
//
// Array - Drop Box Sort (default Sort text)
var A_DBSo=new Array();A_DBSo[10]='A-Z';A_DBSo[28]='Date';A_DBSo[34]='Year';A_DBSo[131]='Date';
//
//
// VARIABLES
//
// Variable - Area Changed
var V_AreaChanged=false;
//
// Variable - Calendar Adjustment
var V_CA=0;
//
// Variable - More Information Mode
var V_MIM=false;
//
// Variable - Line Information Key
var V_LIK=0;
//
// Variable - Logged-In
var V_LI=false;
//
// Variable - Domain Name
var V_DN=window.location;
//
// Variable - Month
var V_M='January';
//
// Variable - Tag ID
var V_TID=0;
//
// Variable - Tag Text
var V_TT='';
//
// Variable - Image Count
var V_IC=0;
//
// Variable - Started Promotions
var V_StP=false;
//
//
// FUNCTIONS
//
// Function - Clear Auto-Complete (jQuery)
function F_CAC(v_T,v_AN){$('#DB\\|'+v_AN+'\\|'+v_T+'\\|AC').html('');$('DB\\|'+v_AN+'\\|'+v_T).val('');V_AC=false;}
//
// Function - Copy Click
function F_CC(v_ID){if(F_EE('OPLI|'+v_ID)){F_MR(document.getElementById('OPLI|'+v_ID).href);}}
//
// Function - Clear Drop Box (jQuery)
function F_CDB(v_T){$('#area\\|hotkey\\|'+v_T+'\\|drop').html('');}
//
// Function - Cover Image
function F_CI(v_ISBN){return '<a href="javascript:F_SetDockable(1,\''+v_ISBN+'\');" onfocus="javascript:this.blur();" value="'+F_CML(v_ISBN)+'"><img id="D-'+v_ISBN+'" name="CC_Image" src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></a>';}
//
// Function - Catalog Material Link
function F_CML(v_ISBN){return 'http://catalog.lapcat.org/search/i'+v_ISBN;}
//
// Function - Catalog Request Link
function F_CRL(v_ISBN){return 'http://catalog.lapcat.org/search?/i'+v_ISBN+'/i'+v_ISBN+'/1%2C1%2C1%2CE/request&FF=i'+v_ISBN+'&1%2C1%2C';}
//
// Function - Convert Stars
function F_CS(v_R){var v_SHTML='';var v_H=(v_R/2)%1;if(v_H>=0.5){v_H=1;}else{v_H=0;}var v_F=Math.floor(v_R/2);var v_Re=5-v_F-v_H;for(r=0;r<v_F;r++){v_SHTML+=F_SI(0);}for(r=0;r<v_H;r++){v_SHTML+=F_SI(2);}for(r=0;r<v_Re;r++){v_SHTML+=F_SI(1);}return v_SHTML;}
//
// Function - Clear Search Information
function F_CSI(v_Z,v_ClearTag){for(v_K in A_SI){switch(v_K){case 'calendar':A_SI[v_K]=0;break;case 'change-search':case 'change-sort':if(v_Z){A_SI[v_K]=0;}break;case 'change-tag':if(v_ClearTag){A_SI[v_K]=0;V_TID=0;V_TT='';}break;default:A_SI[v_K]='';break;}}}
//
// Function - Create URL (for dockables)
function F_CURL(){var v_URL='';for(v_K in A_PI){v_URL+='/'+A_PI[v_K];}for(v_K in A_SI){v_URL+='/'+A_SI[v_K];}return v_URL;}
//
// Function - Drop Box Area Check
function F_DBAC(a_R){for(v_K in a_R){if(a_R[v_K]==parseInt(A_SI['change-search'])){return true;}}return false;}
//
// Function - Clear Left Side (jQuery)
function F_CLS(v_L){
	if(!V_CLS){
		switch(v_L){
			case 0:default:
				$('#lapcat\\|line-options').hide();
				$('#area-secondary\\|drop').hide();
				$('#area-secondary\\|tag').css('visibility','hidden');
				break;
			case 2:case 3:
				$('#lapcat\\|line-options').hide();
				$('#area-secondary\\|drop').hide();
				$('#area-secondary\\|tag').css('visibility','visible');
				break;
			case 1:
				$('#lapcat\\|line-options').show();
				$('#area-secondary\\|drop').show();
				$('#area-secondary\\|tag').css('visibility','visible');
				break;
			case 4:
				$('#lapcat\\|line-options').show();
				$('#area-secondary\\|drop').hide();
				$('#area-secondary\\|tag').css('visibility','hidden');
				break;
		}
	}
}
//
// Function - Convert Tag Information
function F_CTI(v_XML){var a_TD=F_B(F_PSXML(v_XML,'value'),'');V_TID=parseInt(F_PSXML(a_TD[0],'value'));V_TT=F_PSXML(a_TD[1],'value');}
//
// Function - Menu (jQuery)
function F_Menu(){
	if(!V_LI){$('#layout\\|join-LAPCAT').show();}else{$('#layout\\|join-LAPCAT').hide();}
	switch(A_PI['area-ID']){
		case 2:case 3:
			$('#layout\\|menu-holder').show();
			$('#other-options\\|create-hotkey').hide();
			$('#other-options\\|random').show();
			$('#other-options\\|reset').hide();
			break;
		case 131:case 28:case 34:case 10:
			$('#layout\\|menu-holder').hide();
			//if(V_LI){$('#other-options\\|create-hotkey').show();}
			$('#other-options\\|random').hide();
			$('#other-options\\|reset').show();
			break;
		default:
			$('#layout\\|menu-holder').hide();
			$('#other-options\\|create-hotkey').hide();
			$('#other-options\\|random').hide();
			$('#other-options\\|reset').hide();
		break;
	}
}
//
// Function - Reset
function F_Reset(){F_MR('/'+A_AT[A_PI['area-ID']]+'/reset-search/ajax',true);}
//
// Function - Clear
function F_Clear(){F_MR('/'+A_AT[A_PI['area-ID']]+'/clear/ajax',true);}
//
// Function - Drop Box Searches
function F_DBS(){
	F_Menu();
	switch(A_PI['area-ID']){
		case 8:
			// Hours (and Locations)
			F_CLS(4);
			break;
		case 2:case 3:
			// Home / Join / My Library
			F_CLS(2);
			F_MDB('change-tag',false,true);
			break;
		case 10:case 131:
			// Databases / (News and) Articles
			F_CLS(1);
			for(v_Ke in A_SI){
				switch(v_Ke){
					case 'change-sort':F_MDB(v_Ke);break;
					case 'change-tag':F_MDB(v_Ke,false,true);break;
					default:F_CDB(v_Ke);break;}}break;
		case 28:
			// (Calendar of) Events
			F_CLS(1);
			for(v_Ke in A_SI){
				switch(v_Ke){
					case 'calendar':case 'change-sort':F_MDB(v_Ke);break;
					case 'change-search':F_MDB(v_Ke,true);break;
					case 'change-tag':F_MDB(v_Ke,false,true);break;
					default:F_CDB(v_Ke);break;}}break;
		case 34:
			// Materials
			F_CLS(1);
			for(v_Ke in A_SI){
				switch(v_Ke){
					case 'calendar':F_CDB(v_Ke);break;
					case 'change-search':case 'change-sort':F_MDB(v_Ke);break;
					case 'change-tag':F_MDB(v_Ke,false,true);break;
					default:if(A_SI[v_Ke]!=''||F_DBAC(A_MTR[v_Ke])){F_MDB(v_Ke);}else{F_CDB(v_Ke);}break;}}break;
		default:break;}
}
//
// Function - Dock Dockables
/*
function F_DD(){var v_HTML='';for(v_K in A_DS){switch(parseInt(v_K)){case 1:v_I=1201;break;case 2:v_I=1202;break;default:v_I=1200;break;}F_MIFS('bar-hotkey|dockable-ID|CD','/lapcat/images/42-42-'+v_I+'.png');if(A_DS[v_K]==4){v_HTML+=document.getElementById('dockable|dockable-ID|hotkey').innerHTML.replace(/dockable-ID/g,v_K);}}F_MEHTML('dock|hotkeys',v_HTML);}
*/
//
// Function - Image Replacement and Majax
function F_IRM(v_M){if(v_M){/*if(majax){majaxProcessSpans();}*/}if(document.getElementsByName('CC_Image')){var A_RI=new Array();var a_CCI=document.getElementsByName('CC_Image');var v_CCIR='';for(var v_CC=0;v_CC<a_CCI.length;v_CC++){A_RI[v_CC]=new Image();A_RI[v_CC].name=a_CCI[v_CC].id;v_CCIR=a_CCI[v_CC].id.replace(/D-/,'');v_CCIR=v_CCIR.replace(/MC-/,'');A_RI[v_CC].onload=function(){if(this.height>1){v_La=document.getElementById(this.name);for(v_Re=0;v_Re<4;v_Re++){if(v_La){v_La.src=this.src;v_La.id='replaced';}else{break;}}}};A_RI[v_CC].src='http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=S&Value='+v_CCIR;}}}
//
// Function - Join (jQuery)
function F_J(){$('#displays\\|text').html($('#join\\|lapcat').html());}
//
// Function - Link Move To Area
function F_LMTA(v_T,v_V,v_RS){F_MR('/'+A_AT[A_PI['area-ID']]+'/'+v_T+'/'+v_V+'/ajax');}
//
// Function - Material Credit Link
function F_MCL(a_I){
	switch(parseInt(a_I['type'])){
		// Book, Downloadable Book, Large Print Book - Author
		case 1:case 24:case 50:return '<div style="float:left; height:20px; overflow:hidden;"><font class="dark-grey" style="margin-left:16px;">by</font>'+V_PBD+'<a class="med-grey" href="javascript:F_LMTA(\'author\',\''+a_I['author']+'\');" onfocus="javascript:this.blur();">'+a_I['author']+'</a></div>';break;
		// Music - Musical Artist
		case 2:return '<div style="float:left; height:20px; overflow:hidden;"><font class="dark-grey" style="margin-left:16px;">by</font>'+V_PBD+'<a class="med-grey" href="javascript:F_LMTA(\'m-artist\',\''+a_I['m-artist']+'\');" onfocus="javascript:this.blur();">'+a_I['m-artist']+'</a></div>';break;
		// Movie - Actor
		case 3:case 5:return '<div style="float:left; height:20px; overflow:hidden;"><font class="dark-grey" style="margin-left:16px;">starring</font>'+V_PBD+'<a class="med-grey" href="javascript:F_LMTA(\'actor\',\''+a_I['act1']+'\');" onfocus="javascript:this.blur();">'+a_I['act1']+'</a></div>';break;
		// Video Game - Console
		case 4:return '<div style="float:left; height:20px; overflow:hidden;"><font class="dark-grey" style="margin-left:16px;">on</font>'+V_PBD+'<a class="med-grey" href="javascript:F_LMTA(\'console-name\',\''+a_I['console-name']+'\');" onfocus="javascript:this.blur();">'+a_I['console-name']+'</a></div>';break;
		// Audio Book, Downloadable Audio Book, Downloadable Audio Player - Author, Narrator
		case 23:case 75:case 159:return '<div style="float:left; overflow:hidden;"><font class="dark-grey" style="margin-left:16px;">by</font>'+V_PBD+'<a class="med-grey" href="javascript:F_LMTA(\'author\',\''+a_I['author']+'\');" onfocus="javascript:this.blur();">'+a_I['author']+'</a><br/><font class="dark-grey" style="margin-left:16px;">narrated by</font>'+V_PBD+'<a class="med-grey" href="javascript:F_LMTA(\'narrator\',\''+a_I['narrator']+'\');" onfocus="javascript:this.blur();">'+a_I['narrator']+'</a></div>';break;
		// Graphic Novel - Artist
		case 32:return '<div style="float:left; overflow:hidden;"><font class="dark-grey" style="margin-left:16px;">illustrated by</font>'+V_PBD+'<a class="med-grey" href="javascript:F_LMTA(\'artist\',\''+a_I['artist']+'\');" onfocus="javascript:this.blur();">'+a_I['artist']+'</a><br/><font class="dark-grey" style="margin-left:16px;">written by</font>'+V_PBD+'<a class="med-grey" href="javascript:F_LMTA(\'writer\',\''+a_I['writer']+'\');" onfocus="javascript:this.blur();">'+a_I['writer']+'</a></div>';break;

		default:break;}
}
//
// Function - Popular Tags (jQuery)
function F_PopularTags(v_XML){
	var a_Tags=F_B(F_PSXML(v_XML,'value'),'tag');
	var a_Tag=new Array();
	var v_HTML='';
	var v_Link='';
	for(v_K in a_Tags){
		a_Tag=F_CXMLA(a_Tags[v_K]);
		v_Link=$('#menu-line\\|holder').html();
		// Replace Data
		for(v_Key in a_Tag){v_Link=v_Link.replace('replace-'+v_Key,a_Tag[v_Key]);}
		v_HTML+=v_Link;
	}
	$('#layout\\|menu').html(v_HTML);
}
//
// Function - Populate Calendar (jQuery)
function F_PC(){
	function f_LDOM(v_Y,v_M){return(new Date((new Date(v_Y, v_M+1,1))-1)).getDate();}
	function f_MCaL(v_K){return '<a class="white" href="javascript:F_MR(\'/events/calendar/'+v_K+'/ajax\');" onfocus="javascript:this.blur();" style="vertical-align:top;">'+v_K+'</a>';}
	function f_MCaD(v_K){return '<font style="font-size:12px;">-</font>';}
	var a_M=new Array('January','February','March','April','May','June','July','August','September','October','November','December');
	var v_D=new Date();
	var v_M=v_D.getMonth();
	V_M=a_M[v_M];
	var v_Y=v_D.getFullYear();
	var v_DOM=v_D.getDate();
	var v_DOW=v_D.getDay();
	var v_DIM=f_LDOM(v_Y,v_M);
	var v_DD=v_D;
	v_DD.setDate(1);
	var v_FDOM=v_DD.getDay();
	V_CA=v_FDOM;
	$('#calendar\\|month').html(V_M);
	for(v_K=1;v_K<=42;v_K++){
		var v_CalendarCell=$('#calendar\\|'+v_K);
		if(v_K<=v_FDOM){
			v_CalendarCell.removeClass().addClass('option-empty');
		}else if(v_K>=(v_DOM+v_FDOM)&&v_K<=(v_DIM+v_FDOM)){
			v_CalendarCell.html(f_MCaL(v_K-v_FDOM));
		}else{
			if(v_K<(v_DIM+v_FDOM)){
				v_CalendarCell.html(f_MCaD(v_K-v_FDOM));
			}
			v_CalendarCell.removeClass().addClass('option-empty');
		}
	}
}
//
// Function - Toggle Stars (jQuery)
function F_ToggleStars(v_Toggle){switch(v_Toggle){case 0:default:$('#stars-select').show();break;case 1:$('#stars-my-rating').show();break;}}
//
// Function - Objectives
function F_Objectives(){F_MR('/lapcat/code/objectives.php?url=reset/'+A_PI['area-ID']+'/'+A_PI['target']);}
//
// Function - Element Is Empty
function F_ElementIsEmpty(v_EID){if(F_EE(v_EID)){if(F_CEIHTML(v_EID)!=''){return false;}}return true;}
//
// Function - Modify Drop Box (jQuery)
function F_MDB(v_T,v_Z,v_All){
	var v_AreaName=A_AT[A_PI['area-ID']];
	if(v_All){v_AreaName='all';}
	var v_Drop=$('#area\\|hotkey\\|'+v_T+'\\|drop');
	var v_AreaDrop=$('#DB\\|'+v_AreaName+'\\|'+v_T+'\\|drop');
	if(A_SI[v_T]==0||A_SI[v_T]==''||v_Z){if(v_Drop.text()==''||(V_AreaChanged&&v_T!='change-tag')){v_Drop.html(v_AreaDrop.html());}}
	var v_AreaCurrent=$('#DB\\|'+v_AreaName+'\\|'+v_T+'\\|current');
	var v_AreaSearch=$('#DB\\|'+v_AreaName+'\\|'+v_T+'\\|'+A_SI[v_T]);
	if(A_SI[v_T]==0||A_SI[v_T]==''||v_Z){
		switch(v_T){
			case 'change-search':
				// Change Search
				// Change search to selected value
				v_AreaCurrent.html(((A_SI[v_T]>0)?v_AreaSearch.text()+F_MLMTA(v_T,0):A_DBSe[A_PI['area-ID']]));
				v_AreaSearch.attr('selected','selected');
				break;
			case 'change-sort':
				// Change Sort
				// Change search to selected value
				v_AreaCurrent.html(((A_SI[v_T]>0)?v_AreaSearch.text()+F_MLMTA(v_T,0):A_DBSo[A_PI['area-ID']]));
				v_AreaSearch.attr('selected','selected');
				break;
			case 'change-tag':
				// Change Tag
				// Change search to tag name
				v_AreaCurrent.html(((A_SI[v_T]>0)?V_TT:''));
				$('#DB\\|'+v_AreaName+'\\|'+v_T).val('search here');
				break;
			case 'calendar':
				// Populate Calendar
				// Change search to month and day
				$('.option-gold').removeClass('option-gold').addClass('option-theme');
				F_PC();
				break;
			default:
				// Clear
				// Clear search
				v_AreaCurrent.html(A_SI[v_T]+((A_SI[v_T]!='')?F_MLMTA(v_T,''):''));
				break;
			}
	}else{
		switch(v_T){
			case 'calendar':
				// Change Calendar
				// Clear search
				$('.option-gold').removeClass('option-gold').addClass('option-theme');
				$('#calendar\\|'+(parseInt(A_SI[v_T])+V_CA)).removeClass().addClass('option-gold');
				if(A_SI[v_T]>0){
					$('#calendar\\|month').html(V_M+' '+A_SI['calendar']+F_MLMTA(v_T,0));
				}else{
					$('#calendar\\|month').html(V_M);
				}break;
			case 'change-search':case 'change-sort':
				// Change Search / Change Sort
				// Clear search
				if(A_SI[v_T]>0){
					v_AreaSearch.attr('selected','selected');
					v_AreaCurrent.html(v_AreaSearch.html()+F_MLMTA(v_T,0));
				}else{
					$('#DB\\|'+v_AreaName+'\\|'+v_T).val(0);
					v_AreaCurrent.html(((v_T=='change-search')?'All Materials':'Rating'));
				}break;
			case 'change-tag':
				// Change Tag
				// Clear search
				$('#DB\\|'+v_AreaName+'\\|'+v_T).val('');
				if(A_SI[v_T]>0||v_All){
					v_AreaCurrent.html(V_TT+F_MLMTA(v_T,''));
				}else{
					v_AreaCurrent.html('');
				}break;
			default:
				// Clear
				// Clear search
				$('#DB\\|'+v_AreaName+'\\|'+v_T).val('');
				if(A_SI[v_T]!=''){
					v_AreaCurrent.html(A_SI[v_T]+F_MLMTA(v_T,''));
				}else{
					v_AreaCurrent.html('');
				}break;}}
}
//
// Function - Modify Element Selected
function F_MES(v_EID){if(F_EE(v_EID)){document.getElementById(v_EID).selected='selected';}}
//
// Function - Modify Element Z-Index
function F_MEZ(v_EID,v_V){if(F_EE(v_EID)){document.getElementById(v_EID).style.zIndex=v_V;}}
//
// Function - Make Link (Move To Area)
function F_MLMTA(v_T,v_V){return '<a href="javascript:F_LMTA(\''+v_T+'\',\''+v_V+'\',true);" onfocus="javascript:this.blur();" style="font-size:10px;"><font class="dark-red" style="font-size:10px; margin-left:5px;">x</font></a>';}
//
// Function - On / Off Button
function F_OOB(v_EID,v_OO){if(F_EE(v_EID)){if(v_OO){F_MEC(v_EID,'option-red');F_MEC(v_EID+'|F','dark-red');}else{F_MEC(v_EID,'option-black');F_MEC(v_EID+'|F','white');}}}
//
// Function - Set Dockable (jQuery)
function F_SetDockable(v_T,v_ISBN){
	$('#dockable\\|0').html('');
	switch(v_T){
		case 0:default:
			$('#lapcat\\|dockable').css('z-index',-8);
			$('#dockable\\|content').attr('src','');
			break;
		case 1:
			$('#dockable\\|0').html('Close Catalog');
			$('#lapcat\\|dockable').css('z-index',18);
			$('#dockable\\|content').attr('src',((v_ISBN>0)?F_CML(v_ISBN):'http://catalog.lapcat.org'));
			break;
		case 2:case 7:
			$('#dockable\\|0').html('Close Objectives');
			$('#lapcat\\|dockable').css('z-index',18);
			$('#dockable\\|content').attr('src',V_DN+'lapcat/code/objectives.php?url='+((v_T==7)?'edit':'reset')+'/'+A_PI['area-ID']+'/'+A_PI['target']);
			break;
		case 8:
			$('#dockable\\|0').html('Close Objectives');
			$('#lapcat\\|dockable').css('z-index',18);
			$('#dockable\\|content').attr('src',V_DN+'lapcat/code/objectives.php?url=join');
			break;
		case 12:
			$('#dockable\\|0').html('Close Options');
			$('#lapcat\\|dockable').css('z-index',18);
			$('#dockable\\|content').attr('src',V_DN+'lapcat/code/options.php?url=continue');
			break;
		case 3:
			$('#dockable\\|0').html('Close Hangman');
			$('#lapcat\\|dockable').css('z-index',18);
			$('#dockable\\|content').attr('src',V_DN+'lapcat/code/hangman.php?url=reset');
			break;
		case 4:
			$('#lapcat\\|dockable').css('z-index',-8);
			window.open($('#dockable\\|content').attr('src'),'dockable-'+v_T+'-window');
			break;
		case 5:
			$('#lapcat\\|dockable').css('z-index',-8);
			window.open(F_CML(v_ISBN),'dockable-'+v_T+'-window');
			break;
		case 6:
			$('#dockable\\|0').html('Close Donations');
			$('#lapcat\\|dockable').css('z-index',18);
			$('#dockable\\|content').attr('src','https://catalog.lapcat.org/donate');
			break;
		case 9:case 11:
			$('#dockable\\|0').html('Close Market');
			$('#lapcat\\|dockable').css('z-index',18);
			if(v_T==9){
				$('#dockable\\|content').attr('src',V_DN+'lapcat/code/market.php?url=reset');
			}else{
				$('#dockable\\|content').attr('src',V_DN+'lapcat/code/market.php?url='+F_CAPL());
			}
			break;
		case 10:
			$('#dockable\\|0').html('Close Tickets');
			$('#lapcat\\|dockable').css('z-index',18);
			$('#dockable\\|content').attr('src',V_DN+'/tickets');
			break;
	}
}
//
// Function - Record (Left / Right)
function F_RLR(v_V){
	switch(v_V){
		case true:if(V_LIK+1<=9){V_LIK++;}break;
		case false:if(V_LIK-1>=0){V_LIK--;}break;
		default:break;}
	F_MR('/'+A_AT[A_PI['area-ID']]+'/open-line/'+A_LI[V_LIK]+'/ajax');
}
//
// Function - Page (Down / Up)
function F_PDU(v_V){F_MR('/'+A_AT[A_PI['area-ID']]+'/'+((v_V)?'next':'previous')+'/ajax');}
//
// Function - Parse XML (to Array - Page Information)
function F_PXMLAPI(v_XML){
	V_AreaChanged=false;
	var a_I=F_CXMLA(v_XML);
	if(A_PI['area-ID']!=a_I['area-ID']){
		V_AreaChanged=true;
		F_CSI(true,false);
		setTimeout('F_MEC(\'MMS-'+A_PI['area-ID']+'\','+'\'menu-link\')',30);
		setTimeout('F_MEC(\'MMS-'+a_I['area-ID']+'\','+'\'option-selected\')',30);
	}
	for(v_K in a_I){A_PI[v_K]=parseInt(a_I[v_K]);}
	A_PI['library-name']=A_Libraries[A_PI['library-ID']];}
//
// Function - Change Promotion (jQuery)
function F_ChangePromotion(v_XML){$('#promotions\\|spot').attr('src',V_DN+'promotions/'+F_PSXML(v_XML,'value'));}
//
// Function - Parse XML (to Element)
function F_PXMLEle(v_XML){var a_I=F_CXMLA(v_XML);for(v_K in a_I){F_MEHTML(v_K,a_I[v_K]);}}
//
// Function - Update Record Navigation
function F_UpdateRecordNavigation(){
	// Previous Record (button)
	if(V_LIK>0){$('#option\\|left\\|visibility').css('visibility','visible');
	}else{$('#option\\|left\\|visibility').css('visibility','hidden');}
	// Next Record (button)
	if(V_LIK<(A_LI.length-1)&&A_PI['total-records']>0){$('#option\\|right\\|visibility').css('visibility','visible');
	}else{$('#option\\|right\\|visibility').css('visibility','hidden');}
	// Previous Page (button)
	if(A_PI['current-page']>1){$('#option\\|up\\|visibility').css('visibility','visible');
	}else{$('#option\\|up\\|visibility').css('visibility','hidden');}
	// Next Page (button)
	if(A_PI['current-page']<A_PI['total-pages']){$('#option\\|down\\|visibility').css('visibility','visible');
	}else{$('#option\\|down\\|visibility').css('visibility','hidden');}
}
//
// Function - Parse XML Information (jQuery)
function F_PXMLI(v_XML){
	V_LIK=0;
	V_MIM=false;
	var v_Link=F_CAPL();
	$('#area-page-link').html(v_Link);
	var a_I=F_CXMLA(v_XML);
	for(v_K in a_I){if(parseInt(a_I[v_K])>0){A_PI[v_K]=parseInt(a_I[v_K]);}else{A_PI[v_K]=a_I[v_K];}}
	$('#displays\\|header').html(a_I['header']);
}
//
// Function - Parse XML (Open Line)
function F_PXMLOL(v_XML){
	var a_T=F_PT(v_XML);
	var v_XML=F_PGXML(v_XML,'tag-set','rest');
	var v_Description=F_PGXML(v_XML,'description','pull');
	var a_I=F_CXMLA(F_PGXML(v_XML,'description','rest'));
	F_MEC('OLi|'+A_PI['target'],'line');
	A_PI['target']=a_I['ID'];
	F_GetLine(A_PI['target']);
	F_MEHTML('OL|data',F_CEIHTML('OL|'+A_AT[A_PI['area-ID']]+'|holder'));
	if(V_MIM){F_MEHTML('OL|more-info',F_CEIHTML('OL|less-info|link'));}
	setTimeout('F_MEC(\'OLi|'+A_PI['target']+'\',\'open-line\')',30);
	F_OLiHTML(a_I,a_T,v_Description);
	F_MEC('home-library|'+A_PI['library-ID'],'gold');
	F_IRM(true);
}
//
// Function - Get Line
function F_GetLine(v_ID){for(v_K in A_LI){if(A_LI[v_K]==v_ID){V_LIK=parseInt(v_K);}}}
//
// Function - Parse Search Information
function F_ParseSearchInformation(v_XML){var a_Search=F_CXMLA(v_XML);for(v_Key in a_Search){A_SI[v_Key]=a_Search[v_Key];}F_DBS();}
//
// Function - Create Area Page Link
function F_CAPL(){
	var a_APL=new Array();
	var v_S=A_AT[A_PI['area-ID']];
	a_APL[0]='multi';
	a_APL[1]=v_S;
	for(v_K in A_SI){
		switch(v_K){
			case 'change-search':case 'change-sort':case 'change-tag':case 'calendar':if(A_SI[v_K]>0){a_APL[a_APL.length]=v_K;a_APL[a_APL.length]=A_SI[v_K];}break;
			default:if(A_SI[v_K]!=''){a_APL[a_APL.length]=v_K;a_APL[a_APL.length]=A_SI[v_K];}break;}}
	return a_APL.join('/');
}
//
// Function - Read Attribute Value
/*
function F_RAV(v_EID,v_A){if(F_EE(v_EID)){return document.getElementById(v_EID).attributes[v_A].value;}}
*/
//
// Function - Search Box Move To Area
function F_SBMTA(v_T,v_A){
	var v_E=A_AT[A_PI['area-ID']];
	if(v_A){v_E='all';}
	var v_V=F_RV('DB|'+v_E+'|'+v_T);
	if(F_IA(v_V,A_AC)||v_E!='all'){
		F_SV('DB|'+v_E+'|'+v_T,'');
		A_SI[v_T]=v_V;
		F_MR(A_AT[A_PI['area-ID']]+'/'+v_T+'/'+v_V+'/ajax');}
}
//
// Function - In Array
function F_IA(v_Search,a_Data){for(v_Key in a_Data){if(v_Search==a_Data[v_Key]){return true;}}return false;}
//
// Function - Star Image
function F_SI(v_S){return '<img src="'+V_DN+'lapcat/images/14-14-'+v_S+'.png" style="border:0; height:14px; width:14px;" />';}
//
// Function - More Suggestions
function F_MoSu(v_XML){
	/*
	var v_Title=F_PGXML(v_XML,'suggestion-title','pull');
	var a_I=F_B(F_PSXML(v_XML,'value'),'more-suggestion');
	F_MEHTML('displays|text',F_CEIHTML('suggestion|holder').replace(/replace-ID/g,1),true);
	F_MEHTML('suggestion|1|header',v_Title);
	var a_D=new Array();
	for(v_K in a_I){
		a_D=F_CXMLA(a_I[v_K]);
		F_MEHTML('suggestion|1|box',F_CEIHTML('suggestion|materials').replace(/replace-ID/g,(v_K+V_IC)).replace('replace-title',a_D['title']).replace('replace-ISBNorSN',a_D['ISBNorSN']),true);
		F_MEHTML('suggestion|'+(v_K+V_IC)+'|cover-image',F_CI(a_D['ISBNorSN']));
	}
	F_IRM(false);
	*/
}
//
// Function - Suggestions
function F_Su(v_XML){
	F_MEHTML('displays|text','');
	V_IC=0;
	var v_Title=F_PGXML(v_XML,'suggestion-title','pull');
	var a_I=F_B(F_PSXML(v_XML,'value'),'suggestion');
	F_MEHTML('displays|text',F_CEIHTML('suggestion|holder').replace(/replace-ID/g,0));
	F_MEHTML('suggestion|0|header',v_Title);
	var a_D=new Array();
	for(v_K in a_I){
		a_D=F_CXMLA(a_I[v_K]);
		F_MEHTML('suggestion|0|box',F_CEIHTML('suggestion|materials').replace(/replace-ID/g,v_K).replace('replace-title',a_D['title']).replace('replace-ISBNorSN',a_D['ISBNorSN']),true);
		F_MEHTML('suggestion|'+v_K+'|cover-image',F_CI(a_D['ISBNorSN']));
		F_MEHTML('suggestion|'+v_K+'|search',F_CEIHTML('search|holder').replace(/replace-ID/g,v_K).replace('replace-title',a_D['title']));
		V_IC++;
	}
	F_IRM(false);
}
//
// Function - Possibles
function F_Po(v_XML){
	var v_Title=F_PGXML(v_XML,'suggestion-title','pull');
	var a_I=F_B(F_PSXML(v_XML,'value'),'possible');
	F_MEHTML('displays|text',F_CEIHTML('suggestion|holder').replace(/replace-ID/g,1),true);
	F_MEHTML('suggestion|1|header',v_Title);
	var a_D=new Array();
	for(v_K in a_I){
		a_D=F_CXMLA(a_I[v_K]);
		F_MEHTML('suggestion|1|box',F_CEIHTML('suggestion|events').replace(/replace-ID/g,v_K).replace('replace-name',a_D['name']).replace('replace-o-date',a_D['o-date']),true);
		F_MEHTML('possible|'+v_K+'|search',F_CEIHTML('possible|holder').replace(/replace-ID/g,v_K).replace('replace-title',a_D['name']));
	}
}
//
// Function - Parse XML (to Hotkey Bar)
function F_PXMLHoB(v_XML,v_T){if(v_XML!='<hotkeys></hotkeys>'){var a_I=F_B(F_PSXML(v_XML,'value'),'hotkey');for(v_K in a_I){F_PXMLHot(a_I[v_K],v_T,'-'+(parseInt(v_K)+1));}}}
//
// Function - Parse XML (to Hotkey)
function F_PXMLHot(v_XML,v_T,v_TE){
	var a_I=F_CXMLA('<hotkey>'+v_XML+'</hotkey>');
	F_MIFS(v_T+v_TE,((a_I['hotkey-image']>999)?'/lapcat/images/42-42-'+a_I['hotkey-image']+'.png':'/lapcat/layout/images/1-1-0.png'));
	F_MEC(v_T+'-pop'+v_TE,'shown option-all');F_MEV(v_T+'-pop'+v_TE,true);
	//F_MEC(v_T+'-link'+v_TE,((a_I['hotkey-image']>999)?'option-blue':'option-red'));
	F_MEHTML(v_T+'-info'+v_TE,((a_I['hotkey-image']>999)?a_I['special']:a_I['special']));
	document.getElementById(v_T+'-link'+v_TE).attributes['onclick'].value='javascript:F_MR(\''+a_I['hotkey-link']+'\');';
}
//
// Function - Parse Points Information
function F_PPI(v_XML){var a_I=F_CXMLA(v_XML);for(v_K in a_I){A_PoI[v_K]=a_I[v_K];F_MEHTML('LI-'+v_K,A_PoI[v_K]);}}




//
// Function - No My Library (Suggestions / Possibles)
function F_NML(){
	$('#option\\|right\\|visibility').css('visibility','hidden');
	F_MEHTML('displays|text','<font style="margin-left:4px; margin-top:140px;">There are no materials or events that meet the criteria.');}
//
// VARIABLES
//
// Variable - Previously Blue Dash
var V_PBD='<font class="text-font" style="font-size:14px; font-weight:bold;"> - </font>';
//
// FUNCTIONS
//
//
// Function - Parse XML (to News / Events / Materials / Databases)
function F_PXMLEve(v_XML,v_T){
	var a_I=F_B(F_PSXML(v_XML,'value'),v_T);
	F_MEHTML('displays|text','');
	F_MEHTML('displays|text',F_CEIHTML('DT|holder'));
	F_MEHTML('line|data','');
	A_LI=Array();
	var a_Line=new Array();
	for(v_K in a_I){
		a_Line=F_CXMLA(a_I[v_K]);
		A_LI[v_K]=a_Line['ID'];
		F_HTMLLin(parseInt(v_K)+(A_PI['current-page']*10)-9,a_Line);}
}
//
// Function - Pad
function F_Pad(v_V){if(v_V<10){return '0'+v_V;}else{return v_V;}}
//
// Function - HTML Icons
function F_HTMLI(a_I,v_HW,v_T){
	var a_IS=new Array();
	switch(A_PI['area-ID']){
		case 131:
			var v_DR=new Date();
			var v_DA=v_DR.getFullYear()+'-'+F_Pad(v_DR.getMonth()+1)+'-'+v_DR.getDate();
			var v_DB=a_I['entered-on'].substr(0,10);
			if(a_I['duration']>0){a_IS[a_IS.length]='<img src="/lapcat/images/31-31-90.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" title="Important Message from the La Porte County Public Library System" />';}
			if(v_DA==v_DB){a_IS[a_IS.length]='<img src="/lapcat/images/31-31-91.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" title="New '+((a_I['duration']>0)?'Message':'Article')+'" />';}
			break;
		case 10:break;
		case 28:
			if(a_I['summer']==3){a_IS[a_IS.length]='<img src="/lapcat/images/31-31-10.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" title="Summer Reading Program" />';}
			if(a_I['slider']==3){a_IS[a_IS.length]='<img src="/lapcat/images/31-31-11.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" title="Patron Plus Program" />';}
			if(a_I['watched']>0){a_IS[a_IS.length]='<img src="/lapcat/images/31-31-0.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" title="Anticipation" />';}
			break;
		case 34:
			if(a_I['watchlist']>0){a_IS[a_IS.length]='<img src="/lapcat/images/31-31-0.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" title="Watch List" />';}
			if(a_I['rating']>=9){a_IS[a_IS.length]='<img src="/lapcat/images/31-31-33.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" title="LAPCAT Gold Award" />';
			}else if(a_I['rating']>=7){a_IS[a_IS.length]='<img src="/lapcat/images/31-31-50.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" title="LAPCAT Silver Award" />';
			}else if(a_I['rating']>=4){a_IS[a_IS.length]='<img src="/lapcat/images/31-31-51.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" title="LAPCAT Bronze Award" />';
			}break;
		default:break;
	}
	if(a_IS.length==0){a_IS[0]='<img src="/lapcat/layout/images/1-1-0.png" style="height:'+v_HW+'px; width:'+v_HW+'px;" />';}
	if(v_T){return a_IS[0];}else{return a_IS.join('');}
}
//
// Function - Open Dockable
function F_OpenDockable(v_T){
	switch(v_T){
		case 0:default:
			V_MIM=true;
			F_MEC('line|data','hidden');
			F_MEC('OL|scrollbar','scrollbar');
			F_MEHTML('OL|more-info',F_CEIHTML('OL|less-info|link'));
			break;
		case 1:
			V_MIM=false;
			F_MEC('line|data','');
			F_MEC('OL|scrollbar','scrollbar-hidden');
			F_MEHTML('OL|more-info',F_CEIHTML('OL|more-info|link'));
			break;
	}
}
//
// Function - HTML Dockable (Undock / New Window)
function F_HTMLD(a_I){
	switch(A_PI['area-ID']){
		case 10:return '<div style="height:20px; overflow:hidden; text-align:right; width:370px;">'+F_HTMLI(a_I,16)+'<a href="'+a_I['link']+'" onfocus="javascript:this.blur();" target="_blank"><img class="C-new-window" src="/lapcat/layout/icons/21-21-12.png" title="Open in New Window" /></a></div>';break;
		case 28:case 131:return '<div style="height:20px; overflow:hidden; text-align:right; width:370px;">'+F_HTMLI(a_I,16)+'</div>';break;
		case 34:return '<div style="height:20px; overflow:hidden; text-align:right; width:370px;">'+F_HTMLI(a_I,16)+'<a href="javascript:F_SetDockable(1,\''+a_I['ISBNorSN']+'\');" onfocus="javascript:this.blur();"><img class="C-load" src="/lapcat/layout/icons/21-21-19.png" title="Open in Dockable" /></a></div>';break;
		default:return '<div style="height:20px; overflow:hidden; text-align:right; width:370px;">'+F_HTMLI(a_I,16)+'</div>';break;
	}
}
//
// Function - Promotion Timer
function F_PromotionTimer(){setInterval('F_MR(\'/promotions/ajax\')',30*1000);}
//
// Function - HTML Line
function F_HTMLL(v_N,a_I){return '<div style="height:20px; overflow:hidden; width:370px;"><font class="med-grey" style="font-size:10px; margin-left:4px; margin-right:4px;">'+v_N+'.</font><a href="javascript:F_MR(\'/'+A_AT[A_PI['area-ID']]+'/open-line/'+a_I['ID']+'/ajax\');" id="OPLI|'+a_I['ID']+'" onfocus="javascript:this.blur();" style="display:none;"></a><font style="font-size:15px;">'+a_I['name']+'</font></div>'+F_HTMLD(a_I);}
//
// Function - HTML Line (Base)
function F_HTMLLin(v_N,a_I){
	F_MEHTML('line|data',F_CEIHTML('L|holder').replace(/replace-ID/g,a_I['ID']),true);
	if(F_EE('OLi|'+a_I['ID'])){
		document.getElementById('OLi|'+a_I['ID']).attributes['onclick'].value='javascript:F_MR(\'/'+A_AT[A_PI['area-ID']]+'/open-line/'+a_I['ID']+'/ajax\');';}
	F_MEHTML('OLLi|'+a_I['ID'],F_HTMLL(v_N,a_I));
	F_MEHTML('OLD|'+a_I['ID'],F_CML(a_I['ISBNorSN']));
}
//
// Function - Parse Tags
function F_PT(v_XML){var a_R=new Array();var v_TN='';var v_TID=0;var a_T=F_B(F_PSXML(F_PSXML(F_PGXML(v_XML,'tag-set','pull'),'value'),'value'),'tag');for(v_K in a_T){v_TN=F_PSXML(F_PGXML(a_T[v_K],'name','pull'),'value');v_TID=F_PSXML(F_PGXML(a_T[v_K],'tag-ID','pull'),'value');a_R[v_TID]=v_TN;}return a_R;}
//
// Function - Hours Open Line
function F_ParseHoursOL(v_ML,v_XML){
	if(!v_ML){
		var a_I=F_B(F_PSXML(v_XML,'value'),'day');
		var a_Day=new Array();
	}
	F_MEC('OLi|'+A_PI['target'],'line');
	A_PI['target']=F_PSXML(F_PGXML(v_XML,'ID','pull'),'value');
	F_GetLine(A_PI['target']);
	F_MEHTML('OL|data',F_CEIHTML('OL|'+A_AT[A_PI['area-ID']]+'|holder'));
	setTimeout('F_MEC(\'OLi|'+A_PI['target']+'\',\'open-line\')',30);
	F_MEHTML('replace-library-name',F_PSXML(F_PGXML(v_XML,'library-name','pull'),'value'));
	F_MEHTML('replace-street',F_PSXML(F_PGXML(v_XML,'street','pull'),'value'));
	F_MEHTML('replace-city-state',F_PSXML(F_PGXML(v_XML,'city-state','pull'),'value'));
	F_MEHTML('replace-zip',F_PSXML(F_PGXML(v_XML,'zip','pull'),'value'));
	F_MEHTML('replace-phone',F_PSXML(F_PGXML(v_XML,'phone','pull'),'value'));
	F_OLiHTML();
	if(v_ML){F_MEHTML('OL|location|hours','<font class="opposite" style="margin-left:3px;">Mobile Library hours and locations coming soon.</font>');
	}else{
		for(v_K in a_I){
			a_Day=F_CXMLA('<data>'+a_I[v_K]+'</data>');
			F_MEHTML('day|'+a_Day['day-of-week']+'|start',((a_Day['time-start']=='Closed')?'<font class="dark-red" style="font-weight:bold;">Closed</font>':a_Day['time-start']));
			F_MEHTML('day|'+a_Day['day-of-week']+'|end',((a_Day['time-end']=='Closed')?'<font class="dark-red" style="font-weight:bold;">Closed</font>':a_Day['time-end']));}}
}
//
// Function - Open Line HTML
function F_OLiHTML(a_I,a_T,v_Description){
	switch(A_PI['area-ID']){
		case 8:
			F_MEHTML('OL|location-image','<img class="border-main-1" src="/lapcat/layout/library/150-100-'+A_PI['target']+'.png" style="height:100px; width:150px;" />');
			F_MEHTML('OL|options',F_Opt());
			break;
		case 10:case 28:case 131:
			F_MEHTML('OL|description',F_ConvertHTML(v_Description));
		case 34:
			switch(A_PI['area-ID']){
				case 131:
					//if(a_I['duration']>0){F_MEHTML('OL|locations');}
					break;
				case 28:
					if(a_I['library']==A_PI['library-name']){$('#OL\\|library').addClass('gold');}
					F_MEHTML('OL|progress-bar',F_CPB(a_I['counted'],40,100,10));
					break;
				case 34:
					F_MEHTML('OL|cover-image',F_CI(a_I['ISBNorSN']));
					F_MEHTML('OL|star-rating',F_CS(a_I['rating']));
					F_MEHTML('stars-my-rating',F_CS(a_I['my-rating']));
					F_MEHTML('OL|credit',F_MCL(a_I));
					if(F_EE('OL-M|ISBNorSN')){
						F_MR('/available/'+a_I['ISBNorSN']+'/ajax');
						document.getElementById('OL-M|ISBNorSN').title='i'+a_I['ISBNorSN'];}
					break;
				default:break;}
			F_MEHTML('OL|options',F_Opt(a_I));
			F_MEHTML('OL|group-icons',F_HTMLI(a_I,31,true));
			F_MEHTML('OL|tags',F_TagHTML(a_T));
			for(v_K in a_I){
				if(v_K=='text'){a_I[v_K]=F_ConvertHTML(a_I[v_K]);}
				if(v_K=='sub-name'){if(a_I[v_K]==0){a_I[v_K]='';}else{a_I[v_K]='<font class="dark-grey">:</font>'+a_I[v_K];}}
				F_MEHTML('OL|'+v_K,a_I[v_K]);}
			break;
		default:break;}
}
//
// Function - Copy Element
function F_CopyElement(v_ElementName,v_Copies){var v_HTML='';for(v_C=0;v_C<v_Copies;v_C++){v_HTML+=F_CEIHTML(v_ElementName);}return v_HTML;}
//
// Function - Available
function F_Available(v_XML){var a_I=F_CXMLA(v_XML);for(v_Key in a_I){F_MEHTML('OL-M|'+v_Key,((a_I[v_Key]>0)?F_CopyElement('stage|OL-checkmark',a_I[v_Key]):'&nbsp;'));}}
//
// Function - Convert HTML
function F_ConvertHTML(v_Data){return v_Data.replace(/&quot;/g,'"').replace(/&amp;/g,'&').replace(/&lt;/g,'<').replace(/&gt;/g,'>');}
//
// Function - Count Stars
function F_CountStars(){
	var v_Stars=0;
	for(v_Key in A_Sky){v_Stars+=A_Sky[v_Key];}
	F_MR('/materials/rate/'+(v_Stars*2)+'/ajax');
	A_Star=Array(0,0,0,0,0);
}
//
// Function - Tags HTML
function F_TagHTML(a_T){var v_C=0;var v_HTML='';for(v_K in a_T){v_HTML+=((v_C>0)?', ':'')+'<a class="gold-tag '+((V_TT==a_T[v_K])?'gold':'opposite')+'" href="javascript:F_LMTA(\'change-tag\',\''+v_K+'\',true);" onfocus="javascript:this.blur();"><strong>'+a_T[v_K]+'</strong></a>';v_C++;}return v_HTML;}
//
// Function - Click Button
function F_ClickButton(v_T,v_N){F_MR('/'+A_AT[A_PI['area-ID']]+'/'+v_T+'/'+(($('#OL-option\\|'+v_N).hasClass('option-red'))?'0':'1')+'/ajax');}
//
// Function - Options
function F_Opt(a_I){
	var v_HTML='';
	switch(A_PI['area-ID']){
		case 131:
			if(V_LI){
				var v_I=parseInt(a_I['favorite']);
				v_HTML+=F_RSPD('stage|OL-option|normal',0,Array('Favorite','F_ClickButton(\'favorite\',0);',((v_I==0)?'white':'dark-red'),((v_I==0)?'option-black':'option-red')));
				if(V_Similar){v_HTML+=F_RSPD('stage|OL-option|normal',1,Array('Back','F_Back()','white','option-blue'));
				}else{v_HTML+=F_RSPD('stage|OL-option|normal',1,Array('Similar','F_History();F_MR(\'/news/similar/'+a_I['name']+'/ajax\',true)','white','option-blue'));}
				/*
				if(a_I['duration']==0){
					var v_I=parseInt(a_I['flagged']);
					v_HTML+=F_OptHTML('Flag','javascript:F_MR(\'/news/flag/'+a_I['ID']+'/ajax\');',((v_I==0)?'option-black':'option-red'),((v_I==0)?'white':'dark-red'),70);}
				*/
//				if(a_I['is-me']==A_PoI['username']){
//					v_HTML+=F_RSPD('stage|OL-option|normal',3,Array('Edit','F_MR(\'/news/edit/'+a_I['ID']+'/ajax\')','white','option-purple'));}
			}break;
		case 8:
			var v_PI=parseInt(A_PI['target']);
			if(V_LI){
				var v_I=parseInt(A_PI['library-ID']);
				//alert(v_I+' = '+v_PI);
				v_HTML+=F_RSPD('stage|OL-option|normal',0,Array('Home','F_MR(\'/hours/home/'+v_PI+'/ajax\')','white',((v_I==v_PI)?'option-gold':'option-black')));}
			v_HTML+=F_RSPD('stage|OL-option|normal',1,Array('Events','F_MR(\'/events/library-search/'+(v_PI+1)+'/ajax\')','white','option-blue'));
			break;
		case 28:
			if(V_LI){
				var v_I=parseInt(a_I['favorite']);
				v_HTML+=F_RSPD('stage|OL-option|normal',0,Array('Favorite','F_ClickButton(\'favorite\',0);',((v_I==0)?'white':'dark-red'),((v_I==0)?'option-black':'option-red')));
				v_I=parseInt(a_I['watched']);
				v_HTML+=F_RSPD('stage|OL-option|normal',1,Array('Anticipate','F_ClickButton(\'anticipate\',1);',((v_I==0)?'white':'dark-red'),((v_I==0)?'option-black':'option-red')));
			}
			if(V_Similar){v_HTML+=F_RSPD('stage|OL-option|normal',2,Array('Back','F_Back()','white','option-blue'));
			}else{v_HTML+=F_RSPD('stage|OL-option|normal',2,Array('Similar','F_History();F_MR(\'/events/similar/'+a_I['name']+'/ajax\',true)','white','option-blue'));}
			//if(a_I['is-me']==A_PoI['username']){
//				v_HTML+=F_RSPD('stage|OL-option|normal',3,Array('Edit','F_SetDockable(7)','white','option-purple'));
			//}
			break;
		case 34:
			if(V_LI){
				var v_I=parseInt(a_I['favorite']);
				v_HTML+=F_RSPD('stage|OL-option|normal',0,Array('Favorite','F_MR(\'/materials/favorite/'+a_I['ID']+'/ajax\')',((v_I==0)?'white':'dark-red'),((v_I==0)?'option-black':'option-red')));
				v_I=parseInt(a_I['watchlist']);
				v_HTML+=F_RSPD('stage|OL-option|normal',1,Array('Watch','F_MR(\'/materials/watch/'+a_I['ID']+'/ajax\')',((v_I==0)?'white':'dark-red'),((v_I==0)?'option-black':'option-red')));
				v_I=parseInt(a_I['collected']);
				v_HTML+=F_RSPD('stage|OL-option|normal',2,Array('Collect','F_MR(\'/materials/collect/'+a_I['ID']+'/ajax\')',((v_I==0)?'white':'dark-red'),((v_I==0)?'option-black':'option-red')));
//				if(a_I['is-me']==A_PoI['username']){
//					v_HTML+=F_RSPD('stage|OL-option|normal',3,Array('Edit','F_MR(\'/materials/edit/'+a_I['ID']+'/ajax\')','white','option-purple'));}
			}
			if(V_Similar){v_HTML+=F_RSPD('stage|OL-option|normal',4,Array('Back','F_Back()','white','option-blue'));
			}else{v_HTML+=F_RSPD('stage|OL-option|normal',4,Array('Similar','F_History();F_MR(\'/materials/similar/'+a_I['name']+'/ajax\',true)','white','option-blue'));}
			break;
		default:break;
	}
	return v_HTML;
}
//
// Function - Replace Stage Part Data
function F_RSPD(v_IDText,v_ID,a_Data){
	var v_HTML=F_CEIHTML(v_IDText).replace(/replace-ID/g,v_ID);
	for(v_Key in a_Data){v_HTML=v_HTML.replace('replace-'+v_Key,a_Data[v_Key]);}
	return v_HTML;
}
//
// Function - Option HTML
function F_OptHTML(v_N,v_L,v_C,v_Co,v_W,v_F,v_K){if(v_F>0){v_F='right'}else{v_F='left'};return '<span class="'+v_C+' fg-button ui-corner-all" onclick="'+v_L+'" style="float:'+v_F+'; margin-'+v_F+':8px; padding:2px; width:'+((v_W>0)?v_W:90)+'px;"><a class="'+v_Co+'">'+v_N+'</a></span>';}

