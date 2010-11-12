//
// Function - Print R
function F_PrintR(a_Print,v_Counter,v_Alert){function f_AddSpace(v_Counter){var v_Spaces='';for(var v_Space=0;v_Space<v_Counter;v_Space++){v_Spaces+=' ';}return v_Spaces;}var v_HTML='';if(isNaN(v_Counter)){v_Counter=0;}else{v_Counter++;}for(var v_Key in a_Print){v_HTML+=f_AddSpace(v_Counter*2)+((typeof a_Print[v_Key]=='object')?v_Key+' {\n'+F_PrintR(a_Print[v_Key],v_Counter)+'}\n':v_Key+' => '+a_Print[v_Key]+'\n');}if(v_Alert){alert(v_HTML);}else{return v_HTML;}}

//
// **************************************************************************************************************************************************************************

//
// Array - Drops
var A_Drops=eval({
	News:{
		search:{},
        sort:{
			0:{ID:'change-sort-0',name:'Date',value:0},
			1:{ID:'change-sort-1',name:'A-Z',value:1},
			2:{ID:'change-sort-2',name:'Z-A',value:2}
        }
    },
	Events:{
		search:{
			0:{ID:'change-search-0',name:'All Libraries',value:0},
			1:{ID:'change-search-1',name:'Main Library',value:1},
			2:{ID:'change-search-2',name:'Coolspring',value:2},
			3:{ID:'change-search-3',name:'Fish Lake',value:3},
			4:{ID:'change-search-4',name:'Hanna',value:4},
			5:{ID:'change-search-5',name:'Kingsford Heights',value:5},
			6:{ID:'change-search-6',name:'Rolling Prairie',value:6},
			7:{ID:'change-search-7',name:'Union Mills',value:7},
			8:{ID:'change-search-8',name:'Mobile Library',value:8}
		},
        sort:{
			0:{ID:'change-sort-0',name:'Date',value:0},
			1:{ID:'change-sort-1',name:'Anticipation',value:1},
			2:{ID:'change-sort-2',name:'A-Z',value:2},
			3:{ID:'change-sort-3',name:'Z-A',value:3}
        }
	},
	Materials:{
		search:{
			0:{ID:'change-search-0',name:'All Materials',value:0},
			1:{ID:'change-search-1',name:'Books',value:1},
			2:{ID:'change-search-2',name:'Music',value:2},
			3:{ID:'change-search-3',name:'Movies',value:3},
			4:{ID:'change-search-4',name:'Video Games',value:4},
			5:{ID:'change-search-5',name:'Television Shows',value:5},
			23:{ID:'change-search-23',name:'Audio Books',value:23},
			32:{ID:'change-search-32',name:'Graphic Novels',value:32},
			50:{ID:'change-search-50',name:'Large Print Books',value:50},
			75:{ID:'change-search-75',name:'Digital Audio Players',value:75},
			24:{ID:'change-search-24',name:'Downloadable Books',value:24},
			159:{ID:'change-search-159',name:'Downloadable Audio Books',value:159}
		},
        sort:{
			0:{ID:'change-sort-0',name:'Year',value:0},
			1:{ID:'change-sort-1',name:'Rating',value:1},
			2:{ID:'change-sort-2',name:'A-Z',value:2},
			3:{ID:'change-sort-3',name:'Z-A',value:3}
        }
	},
	Databases:{
		search:{},
        sort:{
			0:{ID:'change-sort-0',name:'A-Z',value:0},
			1:{ID:'change-sort-1',name:'Z-A',value:1}
        }
	}
});
A_Drops=eval(A_Drops);

//
// Array - Menu
var A_Menu=eval({
	2:'Home',
	3:'Home',
	131:'News',
	28:'Events',
	34:'Materials',
	10:'Databases',
	8:'Hours',
	99:'Jobs'
});
A_Menu=eval(A_Menu);

//
// Array - Sky
var A_Sky=eval({0:0,1:0,2:0,3:0,4:0});

//
// Variable - Domain Name
var V_DN=window.location;

//
// Function - Available
function F_Available(v_XML){
	var a_Data=F_CXMLA(v_XML);
	for(var v_Key in a_Data){
		if(parseInt(a_Data[v_Key])>0){
			F_InsertElement('stage-checkmark','materials-'+v_Key,false);
		}
	}
}

//
// Function - Box
function F_Box(v_Target){
	var v_Position=$('#'+v_Target).position();
	$('#stage-auto-complete').css({top:v_Position.top+21,left:v_Position.left,position:'absolute',width:'171px'}).show();
}
//
// Function - Change Search
function F_ChangeSearch(v_Action,v_Target){
	F_MR('/'+O_LAPCAT.o_Interface.v_AreaName+'/'+v_Action+'/'+v_Target+'/ajax');
}
//
// Function - Check Drop
function F_CheckDrop(v_Value){
	setTimeout('$(\'#stage-auto-complete\').hide();',150);
	return 'search here';
}
//
// Function - Close Dockable
function F_CloseDockable(){
	$('#interface-close-dockable').empty();
	$('#lapcat-dockable').css('z-index',-8);
	$('#dockable-content').attr('src','');
}
//
// Function - Convert HTML
function F_ConvertHTML(v_Data){
	return v_Data.replace(/&quot;/g,'"').replace(/&amp;/g,'&').replace(/&lt;/g,'<').replace(/&gt;/g,'>');
}
//
// Function - Convert Stars
function F_ConvertStars(v_Rating){
	var v_HTML='';
	var v_Half=(v_Rating/2)%1;
	if(v_Half>=0.5){v_Half=1;}else{v_Half=0;}
	var v_Full=Math.floor(v_Rating/2);
	var v_Stars=5-v_Full-v_Half;
	for(v_F=0;v_F<v_Full;v_F++){v_HTML+='<img src="/lapcat/images/14-14-0.png" style="height:14px; width:14px;" />';}
	for(v_F=0;v_F<v_Half;v_F++){v_HTML+='<img src="/lapcat/images/14-14-2.png" style="height:14px; width:14px;" />';}
	for(v_F=0;v_F<v_Stars;v_F++){v_HTML+='<img src="/lapcat/images/14-14-1.png" style="height:14px; width:14px;" />';}
	return v_HTML;
}
//
// Function - Count Stars
function F_CountStars(){
	var v_Stars=0;
	for(var v_Key in A_Sky){v_Stars+=A_Sky[v_Key];}
	F_MR('/materials/rate/'+(v_Stars*2)+'/ajax');
	A_Sky=Array(0,0,0,0,0);
}
//
// Function - Cover Images
function F_CoverImages(){
	if($('CC_Image')){
		var a_ReturnedImages=new Array();
		var a_CoverImages=document.getElementsByName('CC_Image');
		var v_CCIR='';
		for(var v_Counter=0;v_Counter<a_CoverImages.length;v_Counter++){
			a_ReturnedImages[v_Counter]=new Image();
			a_ReturnedImages[v_Counter].name=a_CoverImages[v_Counter].id;
			v_CCIR=a_CoverImages[v_Counter].id.replace(/D-/,'');
			v_CCIR=v_CCIR.replace(/MC-/,'');
			a_ReturnedImages[v_Counter].onload=function(){
				if(this.height>1){
					v_Element=$('#'+this.name);
					for(v_Replaced=0;v_Replaced<4;v_Replaced++){
						if(v_Element){
							v_Element.attr('src',this.src).attr('id','replaced');
						}else{
							break;
						}
					}
				}
			};
			a_ReturnedImages[v_Counter].src='http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=S&Value='+v_CCIR;
		}
	}
}
// Function - Create Array
// Accepts two arrays. The first array contains a set of keys. The second array contains a set of values. Returns a new array with keys => values.
// Keeping in case I need it.
function F_CreateArray(a_Keys,a_Values){
	var a_Data=new Array();
	if(a_Keys.count==a_Values.count){
		for(v_Key in a_Keys){
			a_Data[a_Keys[v_Key]]=a_Values[v_Key];
		}
	}
	return a_Data;
}
// Function - Get Records Text
function F_GetRecordsText(v_Pushed,v_Help){
	var a_Data=new Array();
	if(v_Pushed&&O_LAPCAT.o_Interface.v_AreaName=='Home'){
		var a_Types=eval({interests:'news or articles',possibles:'events',suggestions:'materials'});
		a_Data['text']='<font style="font-style:italic;">There are no '+a_Types[v_Pushed]+' that match the tag.</font>';
	}else if(O_LAPCAT.o_Interface.v_AreaName=='Jobs'){
		a_Data['text']='<font style="font-style:italic;">This area is under construction.</font>';
	}else{
		var a_Types=eval({Databases:'databases or services',Events:'events',Materials:'materials',News:'news or articles'});
		a_Data['text']='<font style="font-style:italic;">There are no '+a_Types[O_LAPCAT.o_Interface.v_AreaName]+' that match the following search.</font><br/><font style="padding-left:24px;">'+O_LAPCAT.o_Interface.a_StorageXML['screen-info']['header']+'</font>';
	}
	if(!v_Help){a_Data['text']+=O_LAPCAT.o_Information.f_GetOtherSearches();}
	return a_Data;
}
//
// Function - Insert Element
function F_InsertElement(v_Element,v_Destination,v_Append,v_InsertData,a_Data,v_InsertID,v_ID){
	var v_HTML=$('#'+v_Element).html();
	if(v_InsertID){v_HTML=v_HTML.replace(/replace-ID/g,v_ID);}
	for(v_Key in a_Data){
		while(v_HTML.indexOf('replace-'+v_Key)>-1){
			v_HTML=v_HTML.replace('replace-'+v_Key,a_Data[v_Key]);
		}
	}
	if(v_Append){
		$('#'+v_Destination).append(v_HTML);
	}else{
		$('#'+v_Destination).html(v_HTML);
	}
}
//
// Function - Log Out
function F_LogOut(){
	F_MR('/log-out/ajax');
	setTimeout('F_MR(\'/home/ajax\')',500);
}
//
// Function - Notice
function F_Notice(v_Title,v_Body,v_Sticky){
	var v_Notice='<div class="notice fakelink"><div class="notice-body color-background OL-fred"><div style="float:left; width:auto;"><h3><font class="white">'+v_Title+'</font></h3><font class="white" style="font-size:12px;">'+v_Body+'</font></div></div></div>';
	if(v_Sticky){$(v_Notice).purr({isSticky:true});
	}else{$(v_Notice).purr({isSticky:false});}
}
//
// Function - Message
function F_Message(v_XML){
	var a_Data=F_CXMLA(v_XML);
	F_Notice(a_Data['message-title'],a_Data['message-body'],((a_Data['message-sticky']>0)?true:false));
}
//
// Function - Move
function F_Move(v_Target,v_Destination,v_Parent){
	$('#'+v_Destination).html('<div id="curtains-to-stage"></div>');
	$('#curtains-to-stage').replaceWith($('#'+v_Target));
	$('#'+v_Target).attr('id','');
	$('#'+v_Parent).html('<div id="'+v_Target+'"></div>');
}
//
// Function - Open Line
function F_OpenLine(v_LineID){
	F_MR('/'+O_LAPCAT.o_Interface.v_AreaName+'/thin-line/'+v_LineID+'/simple/ajax');
}
//
// Function - Push Button
function F_PushButton(v_Button){
	var v_Filter=O_LAPCAT.o_Information.a_StorageXML['search-information']['change-filter'];
	var v_ID=O_LAPCAT.o_Content.a_OpenLineXML['ID'];
	switch(v_Button){
		case 0:O_LAPCAT.o_Interface.f_PreviousPage();break;
		case 1:O_LAPCAT.o_Interface.f_PreviousRecord();break;
		case 2:O_LAPCAT.o_Interface.f_NextRecord();break;
		case 3:O_LAPCAT.o_Interface.f_NextPage();break;
		case 4:O_LAPCAT.o_Interface.f_ClearSearch();break;
		case 5:O_LAPCAT.o_Interface.f_ResetSearch();break;
		case 6:O_LAPCAT.o_Interface.f_ChangeDrop('search');break;
		case 7:O_LAPCAT.o_Interface.f_ChangeDrop('sort');break;
		case 8:O_AutoComplete.f_AutoComplete('change-tag');break;
		case 9:
			F_ToggleOption('favorite');
			F_MR('/'+O_LAPCAT.o_Interface.v_AreaName+'/favorite/'+v_ID+'/simple/ajax');
			$('#icon-'+v_ID+'-92').toggle();
			break;
		case 10:
			F_MR('/'+O_LAPCAT.o_Interface.v_AreaName+'/similar/'+O_LAPCAT.o_Content.a_OpenLineXML['name']+'/ajax');
			break;
		case 11:
			F_ToggleOption('anticipate');
			F_MR('/'+O_LAPCAT.o_Interface.v_AreaName+'/anticipate/'+O_LAPCAT.o_Content.a_OpenLineXML['ID']+'/simple/ajax');
			$('#icon-'+v_ID+'-0').toggle();
			break;
		case 12:
			F_ToggleOption('collection');
			F_MR('/'+O_LAPCAT.o_Interface.v_AreaName+'/collection/'+O_LAPCAT.o_Content.a_OpenLineXML['ID']+'/simple/ajax');
			$('#icon-'+v_ID+'-94').toggle();
			break;
		case 13:
			F_ToggleOption('watchlist');
			F_MR('/'+O_LAPCAT.o_Interface.v_AreaName+'/watch/'+O_LAPCAT.o_Content.a_OpenLineXML['ID']+'/simple/ajax');
			$('#icon-'+v_ID+'-0').toggle();
			break;
		case 14:case 15:case 16:case 17:case 18:case 20:
			var a_Filter=eval({14:'favorites',15:'anticipated',16:'summer',17:'points',18:'collection',20:'anticipated'});
			if(v_Filter==''||v_Filter!=a_Filter[v_Button]){F_MR('/'+O_LAPCAT.o_Interface.v_AreaName+'/change-filter/'+a_Filter[v_Button]+'/ajax');
			}else{F_MR('/'+O_LAPCAT.o_Interface.v_AreaName+'/change-filter//ajax');}
			break;
		case 19: // Log Out
			F_LogOut();
			break;
		case 96: // Events
			F_MR('/Events/change-search/'+(parseInt(v_ID)+1)+'/ajax');
			break;
		case 97: // Home
			F_ToggleOption('home');
			F_MR('/Hours/home/'+v_ID+'/simple/ajax');
			break;
		case 98: // More Info
			O_LAPCAT.o_Interface.f_ToggleMoreInfo();
			F_ToggleOption('more-info');
			break;
		case 99: // Back
			O_LAPCAT.o_Interface.f_Show();
			break;
		default:break;
	}
}
//
// Function - Set Dockable
function F_SetDockable(v_ID,v_URL){
	$('#interface-close-dockable').html('Close '+v_ID);
	$('#lapcat-dockable').css('z-index',18);
	switch(v_ID){
		case 'Databases':
			$('#dockable-content').attr('src',v_URL);
			break;
		case 'Catalog':
			$('#dockable-content').attr('src',((!v_URL)?'http://catalog.lapcat.org':v_URL));
			break;
		case 'Donations':
			$('#dockable-content').attr('src','https://catalog.lapcat.org/donate');
			break;
		case 'Objectives':
			v_URL=parseInt(v_URL);
			if(v_URL>0){
				$('#dockable-content').attr('src',V_DN+'lapcat/code/objectives.php?url=continue/'+v_URL);
			}else{
				$('#dockable-content').attr('src',V_DN+'lapcat/code/objectives.php?url=reset');
			}
			break;
		case 'Options':
			$('#dockable-content').attr('src',V_DN+'lapcat/code/options.php?url=continue');
			break;
		case 'Tickets':
			$('#dockable-content').attr('src',V_DN+'/tickets');
			break;
		default:
			break;
	}
}
//
// Function - Set Menu
function F_SetMenu(v_Tab){O_LAPCAT.o_Interface.f_ChangeTab(v_Tab);}
//
// Function - Toggle Button
function F_ToggleButton(v_ButtonID){
	var v_Toggle=false;
	if($('#button-'+v_ButtonID).hasClass('toggle-button')){v_Toggle=true;}
	if($('.red-button').length>0){$('.red-button').removeClass('red-button').addClass('toggle-button');}
	if(v_Toggle){$('#button-'+v_ButtonID).removeClass('toggle-button').addClass('red-button');}
}
//
// Function - Set Option
function F_SetOption(v_OptionID,v_SetOption){
	switch(v_SetOption){
		case 'option-red':
			$('#button-'+v_OptionID).removeClass('option-black').addClass('option-red');
			$('#font-'+v_OptionID).removeClass('white').addClass('dark-red');
			break;
		case 'option-black':
			$('#button-'+v_OptionID).removeClass('option-red').addClass('option-black');
			$('#font-'+v_OptionID).removeClass('dark-red').addClass('white');
			break;
		default:
			break;
	}
}
//
// Function - Toggle Option
function F_ToggleOption(v_OptionID,v_SetOption){
	switch(v_SetOption){
		case 'option-black':case 'option-red':
			F_SetOption(v_OptionID,v_SetOption);
			break;
		default:
			if($('#button-'+v_OptionID).hasClass('option-black')){
				F_SetOption(v_OptionID,'option-red');
			}else{
				F_SetOption(v_OptionID,'option-black');
			}
			break;
	}
}
//
// Function - Toggle Stars
function F_ToggleStars(v_Toggle){switch(v_Toggle){case 0:default:$('#stars-select').show();break;case 1:$('#stars-my-rating').show();break;}}
//
// Function - User Object
function F_UserObject(){
	// Variable - Log Status
	this.v_LogStatus=3;
	// Function - Log
	this.f_Log=function(v_LogStatus){
		if(v_LogStatus!=this.v_LogStatus){
			if(v_LogStatus=='logged-in'){
				this.v_LogStatus=2;
				$('#hotkey-holder').show();
				$('#stars-my-rating').show();
				$('#stars-my-rating-text').show();
				$('#stars-select').show();
			}else{
				this.v_LogStatus=3;
				$('#hotkey-holder').hide();
				$('#stars-my-rating').hide();
				$('#stars-my-rating-text').hide();
				$('#stars-select').hide();
			}
			F_InsertElement('stage-user-status-'+this.v_LogStatus,'stage-user-status',false,true,O_LAPCAT.o_Information.a_StorageXML['points-info'],true,v_LogStatus);
		}
		O_LAPCAT.o_Interface.f_Show();
		if(O_LAPCAT.o_Interface.a_Tag['ID']>0){O_LAPCAT.o_Interface.f_ShowSelectedTag();}
	};
	// Function - Reset
	this.f_Reset=function(){};
	this.f_Reset();
}

//
// **************************************************************************************************************************************************************************

//
// Objects

//
// Function - Auto Complete Object
function F_AutoCompleteObject(){
	// Variable - First Letter
	this.v_FirstLetter='';
	// Array - Storage XML
	this.a_StorageXML=new Array();
	// Function - Reset
	this.f_Reset=function(){
		this.f_ResetStorageXML();
	};
	// Function - Auto Complete
	this.f_AutoComplete=function(v_Target,v_ObjectiveInputID){
		var v_AreaName=((v_Target=='change-tag')?'all':O_LAPCAT.o_Interface.v_AreaName);
		var v_Se='';
		if(v_Target=='form'){
			v_Se=F_RV('objective-data-'+v_ObjectiveInputID).toLowerCase();
		}else{
			v_Se=$('#change-tag-input').val().toLowerCase();
		}
		var v_L=v_Se.length;
		if(v_L==0){
			if(v_Target=='form'){F_MEHTML('objective-tag-'+v_ObjectiveInputID,'');F_COD(v_ObjectiveInputID,16);}else{F_MEHTML('DB|'+v_AreaName+'|'+v_Target+'|AC','');}
		}else if(v_Se.substr(0,1).toLowerCase()==this.v_FirstLetter&&this.a_StorageXML[v_Target+'-AC'].length>0){
			var a_Results=this.a_StorageXML[v_Target+'-AC'];
			var a_AutoComplete=new Array();
			for(v_K in a_Results){if(a_Results[v_K].substr(0,v_L).toLowerCase()==v_Se){a_AutoComplete[v_K]=a_Results[v_K];}}
			this.f_Display(v_Target,a_AutoComplete);
		}else{
			this.v_FirstLetter=v_Se.substr(0,1).toLowerCase();
			if(v_Target=='form'){Fu_MR('/lapcat/code/objectives.php?url=change-tag/'+v_ObjectiveInputID+'/'+v_Se+'/ajax');
			}else{F_MR(v_AreaName+'/'+v_Target+'-AC/'+this.v_FirstLetter+'/simple/ajax');}
		}
	};
	// Function - Display
	this.f_Display=function(v_Target,a_Results){
		var v_HTML='';
		var v_Counter=0;
		var v_ModifiedTarget=v_Target.replace('-AC','');
		var v_Pass=false;
		for(v_Key in a_Results){v_Pass=true;break;}
		if(v_Pass){
			for(v_Key in a_Results){
				v_HTML+='<div style="height:18px; overflow:hidden; padding-left:2px; width:auto;"><a class="white" href="javascript:F_ChangeSearch(\''+v_ModifiedTarget+'\','+v_Key+');" onfocus="javascript:this.blur();" style="font-size:12px;">'+a_Results[v_Key]+'</a></div>';
				v_Counter++;
			}
		}else{
			v_HTML='<div style="height:18px; overflow:hidden; padding-left:2px; width:auto;"><font class="white" style="font-size:12px;">No results.</font></div>';
			v_Counter++;
		}
		F_Box(v_ModifiedTarget+'-action');
		var v_Height=0;
		if(v_Counter>9){v_Height=180;}else{v_Height=v_Counter*18;}
		$('#stage-auto-complete').css('height',v_Height+'px').html(v_HTML);
	};
	// Function - Reset Storage XML
	this.f_ResetStorageXML=function(){
		this.a_StorageXML['change-tag-AC']=new Array();
	};
	// Function - Store XML
	this.f_StoreXML=function(v_StorageXMLKey,v_XML){
		var a_Data=F_B(F_PSXML(v_XML,'value'),'data');
		var a_Results=eval({})
		var a_XML=new Array();
		for(var v_Key in a_Data){
			a_XML=F_CXMLA(a_Data[v_Key]);
			a_Results[a_XML['result-ID']]=a_XML['result'];
		}
		//F_PrintR(a_Results,0,true);
		this.a_StorageXML[v_StorageXMLKey]=a_Results;
		O_AutoComplete.f_Display(v_StorageXMLKey,this.a_StorageXML[v_StorageXMLKey]);
	};
	this.f_Reset();
}
//
// Function - Content Object
function F_ContentObject(){
	// Array - Cells
	this.a_Cells=eval({suggestions:1,possibles:2,interests:3});
	// Array - Clear Pushed
	this.a_ClearPushed=new Array();
	// Array - Open Line XML
	this.a_OpenLineXML=new Array();
	// Array - Storage XML
	this.a_StorageXML=new Array();
	// Array - Storage XML Length
	this.a_StorageXMLLength=new Array();
	// Array - Open Line Tag XML
	this.a_OpenLineTagXML=new Array();
	// Array - Titles
	this.a_Titles=new Array();
	// Array - Last Open Line ID
	this.v_LastOpenLineID=0;
	// Array - Last Open Line ID
	this.v_SameOpenLine=false;
	// Variable - Help
	this.v_Help=false;
	// Variable - Similar
	this.v_Similar=true;
	// Variable - Suggestion Counter
	this.v_SuggestionCounter=0;
	// Function - Clean
	this.f_Clean=function(v_Data){return v_Data.replace('\\','').replace(/:/g,'').replace(/'/g,'&lsquo;');};
	// Function - Clear Pushed
	this.f_ClearPushed=function(v_Name){
		F_InsertElement('stage-message','interface-content-'+this.a_Cells[v_Name],false,true,F_GetRecordsText(v_Name,this.v_Help));
		this.v_Help=true;
	};
	// Function - Toggled Pushed
	this.f_TogglePushed=function(v_Name,v_XML){
		this.a_ClearPushed[v_Name]=false;
		this.a_Titles[v_Name]=F_PSXML(v_XML,'value');
	};
	// Function - Get Record Key
	this.f_GetRecordKey=function(v_OpenLineID){
		for(v_CurrentRecord in this.a_StorageXML['content']){
			if(this.a_StorageXML['content'][v_CurrentRecord]['ID']==v_OpenLineID){
				return v_CurrentRecord;
			}
		}
		return false;
	};
	// Function - Insert Option
	this.f_InsertOption=function(v_Button,v_Color,v_Font,v_Name){
		F_InsertElement('stage-option','open-line-options',true,true,eval({button:v_Button,color:v_Color,font:v_Font,name:v_Name}));
	};
	// Function - Reset
	this.f_Reset=function(){
		this.f_ResetStorageXML();
		this.f_ResetTitles();
		this.v_Similar=true;
	};
	// Function - Reset Clear Pushed
	this.f_ResetClearPushed=function(){
		this.a_ClearPushed['suggestions']=false;
		this.a_ClearPushed['possibles']=false;
		this.a_ClearPushed['interests']=false;
	};
	// Function - Reset Storage XML
	this.f_ResetStorageXML=function(){
		this.a_StorageXML=new Array();
		this.a_StorageXML['content']=new Array();
		this.a_StorageXML['possibles']=new Array();
		this.a_StorageXMLLength['possibles']=0;
		this.a_StorageXML['interests']=new Array();
		this.a_StorageXMLLength['interests']=0;
		this.a_StorageXML['suggestions']=new Array();
		this.a_StorageXMLLength['suggestions']=0;
		this.v_SuggestionCounter=0;
	};
	// Function - Show Anticipation
	this.f_ShowAnticipation=function(v_Counted){
		return F_CPB(((v_Counted)?v_Counted:this.a_OpenLineXML['counted']),40,100,10);
	};
	// Function - Show Pushed Records
	this.f_ShowPushedRecords=function(v_DisplayID,v_StorageXMLKey){
		var a_Data=new Array();
		a_Data['header']=this.a_Titles[v_StorageXMLKey+'s'];
		switch(v_StorageXMLKey){
			case 'suggestion':
				if(this.a_ClearPushed[v_StorageXMLKey+'s']){
					F_InsertElement('stage-header','interface-content-header-'+v_DisplayID,true,true,a_Data,false,0);
					var v_Start=parseInt(this.v_SuggestionCounter)*5;
					var v_End=parseInt(v_Start)+5;
					var v_Counter=0;
					for(v_ContentKey in this.a_StorageXML[v_StorageXMLKey+'s']){
						if(v_ContentKey>=v_Start&&v_ContentKey<v_End){
							F_InsertElement('stage-'+v_StorageXMLKey,'interface-content-'+v_DisplayID,true,true,this.a_StorageXML[v_StorageXMLKey+'s'][v_ContentKey],true,v_ContentKey);
							if(v_StorageXMLKey=='suggestion'){
								F_InsertElement('stage-materials-cover-image','suggestion-'+v_ContentKey+'-cover-image',false,false,Array(),true,this.a_StorageXML['suggestions'][v_ContentKey]['ISBNorSN']);
								a_Data['name']='';
								a_Data['ISBNorSN']=this.a_StorageXML['suggestions'][v_ContentKey]['ISBNorSN'];
								F_InsertElement('stage-catalog-ISBN-link','suggestion-'+v_ContentKey+'-catalog-link',false,true,a_Data,true,v_ContentKey);
								v_Counter++;
							}
							F_InsertElement('stage-'+v_StorageXMLKey+'-search-link',v_StorageXMLKey+'-'+v_ContentKey+'-search',false,true,this.a_StorageXML[v_StorageXMLKey+'s'][v_ContentKey],true,v_ContentKey);
						}
					}
				}else{
					F_InsertElement('stage-header','interface-content-header-'+v_DisplayID,true,true,a_Data,false,0);
					this.f_ClearPushed(v_StorageXMLKey+'s');
				}
				break;
			case 'interest':case 'possible':
				if(this.a_ClearPushed[v_StorageXMLKey+'s']){
					a_Data['type']=v_StorageXMLKey;
					F_InsertElement('stage-possibles-list','interface-content-header-'+v_DisplayID,true,true,a_Data,false,0);
					for(v_ContentKey in this.a_StorageXML[v_StorageXMLKey+'s']){
						F_InsertElement('stage-'+v_StorageXMLKey,v_StorageXMLKey+'s-list-content',true,true,this.a_StorageXML[v_StorageXMLKey+'s'][v_ContentKey],false,0);
						if(v_StorageXMLKey=='possible'){
							$('#anticipation-bar-'+this.a_StorageXML[v_StorageXMLKey+'s'][v_ContentKey]['ID']).html(this.f_ShowAnticipation(this.a_StorageXML[v_StorageXMLKey+'s'][v_ContentKey]['counted']));
						}
					}
				}else{
					F_InsertElement('stage-header','interface-content-header-'+v_DisplayID,true,true,a_Data,false,0);
					this.f_ClearPushed(v_StorageXMLKey+'s');
				}
				break;
			default:
				break;
		}
		if(v_StorageXMLKey=='suggestion'){F_CoverImages();}
	};
	// Function - Show Content
	this.f_ShowContent=function(){
		this.v_SameOpenLine=false;
		var a_OpenLines=new Array();
		var v_LineCounter=1;
		var v_OpenLineID=0;
		var a_Data=new Array();
		var v_ExtraKeys=(O_LAPCAT.o_Interface.v_CurrentPage*O_LAPCAT.o_Interface.v_MaximumRecords)-O_LAPCAT.o_Interface.v_MaximumRecords;
		F_InsertElement('stage-interface-content','interface-content',false);
		var v_AreaName=O_LAPCAT.o_Interface.v_AreaName;
		if(O_LAPCAT.o_Interface.v_MoreInfo&&(v_AreaName=='News'||v_AreaName=='Events'||v_AreaName=='Materials')){
			$('#content-lines').hide();
		}else{
			$('#content-lines').show();
		}
		//F_PrintR(this.a_StorageXML['content'],0,true);
		for(v_ContentKey in this.a_StorageXML['content']){
			a_Data=this.a_StorageXML['content'][v_ContentKey];
			a_Data['key']=parseInt(v_ContentKey)+v_ExtraKeys+1;
			v_OpenLineID=a_Data['ID'];
			a_OpenLines[v_LineCounter]=v_OpenLineID;
			F_InsertElement('stage-line','content-lines',true,true,a_Data,true,v_OpenLineID);
			this.f_ShowGroupIcons(v_OpenLineID,a_Data);
			v_LineCounter++;
		}
	};
	// Function - Show Options
	this.f_ShowGroupIcons=function(v_Target,a_Data){
		var v_Value='';
		var a_Icons=eval({favorite:92,slider:11,watched:0,watchlist:0,summer:10,bronze:51,silver:50,gold:33,collection:94});
		var a_Title=eval({favorite:'Favorite',slider:'LAPCAT Points Program',watched:'Watch',watchlist:'Watch List',summer:'Summer Reading Program',bronze:'',silver:'',gold:'',collection:'Collection'});
		var a_LineData=((a_Data)?a_Data:this.a_OpenLineXML);
		var v_LineID=a_LineData['ID'];
		for(var v_Key in a_LineData){
			v_Value=a_LineData[v_Key];
			switch(v_Key){
				case 'rating':
					if(v_Value>8){v_Key='gold';}else if(v_Value>6){v_Key='silver';}else if(v_Value>=4){v_Key='bronze';}else{break;}
					a_Title[v_Key]='Average Rating: '+v_Value;
				case 'bronze':case 'collection':case 'favorite':case 'gold':case 'silver':case 'slider':case 'summer':case 'watched':case 'watchlist':
					if(parseInt(v_Value)>0){$('#icon-'+v_Target+'-'+a_Icons[v_Key]).show().attr('title',a_Title[v_Key]);}
					break;
				default:
					break;
			}
		}
	};
	// Function - Show Display
	this.f_ShowDisplay=function(v_AreaName){
		var a_Names=eval({News:'basic',Events:'basic',Hours:'alternate',Materials:'alternate',Databases:'alternate'});
		F_InsertElement('stage-'+a_Names[v_AreaName]+'-display','content-graphics-line');
	};
	// Function - Show Icon
	this.f_ShowIcon=function(v_ID,v_Key,v_Title){
		return (($('#icon-'+v_ID+'-'+v_Key).length>0)?'':'<img id="icon-'+v_ID+'-'+v_Key+'" src="/lapcat/images/31-31-'+v_Key+'.png" style="height:16px; width:16px;" title="'+v_Title+'" />');
	};
	// Function - Show Open Line
	this.f_ShowOpenLine=function(){
		var v_AreaName=O_LAPCAT.o_Interface.v_AreaName;
		$('.open-line').removeClass().addClass('line');
		$('#open-line-'+this.a_OpenLineXML['ID']).removeClass().addClass('open-line');
		if(v_AreaName=='Databases'){this.a_OpenLineXML['link']=this.a_OpenLineXML[((this.a_OpenLineXML['at-home']<3)?'link-in':'link-out')];}
		F_InsertElement('stage-'+v_AreaName+'-content','content-open-line',false,true,this.a_OpenLineXML,true,this.a_OpenLineXML['ID']);
		switch(v_AreaName){
			case 'Hours':
				if(this.a_OpenLineXML['ID']==7){
					$('#stage-location-hours').html('');
				}else{
					var a_Days=F_B(F_PSXML(this.a_OpenLineXML['days'],'value'),'day');
					var a_DayNames=eval({0:'Sunday',1:'Monday',2:'Tuesday',3:'Wednesday',4:'Thursday',5:'Friday',6:'Saturday'});
					var a_Day=new Array();
					for(var v_Key in a_Days){
						a_Day=F_CXMLA(a_Days[v_Key]);
						a_Day['day-name']=a_DayNames[v_Key];
						F_InsertElement('stage-hours-line','stage-location-hours',true,true,a_Day)
					}
				}
				break;
			case 'Databases':
				break;
			case 'News':
				$('#rss-feed-link-name').attr('href','/rss-creator.php?area=Person&username='+this.a_OpenLineXML['username']+'&user-ID='+this.a_OpenLineXML['entered-by-ID']);
				$('#date-search').attr('href','javascript:F_MR(\'/'+v_AreaName+'/calendar/'+this.a_OpenLineXML['entered-on']+'/ajax\');');
				break;
			case 'Events':
				$('#open-line-anticipation-bar').html(this.f_ShowAnticipation());
				break;
			case 'Materials':
				//$('.catalog-link').click(function(){F_SetDockable('Catalog',$(this).attr('href'));return false;});
				$('#open-line-rating').html(F_ConvertStars(this.a_OpenLineXML['rating']));
				$('#stars-my-rating').html(F_ConvertStars(this.a_OpenLineXML['my-rating']));
				$('#home-library-'+O_LAPCAT.o_Information.a_StorageXML['points-info']['library-ID']).addClass('gold');
				F_MR('/available/'+this.a_OpenLineXML['ISBNorSN']+'/simple/ajax');
				break;
			default:break;
		}
	};
	// Function - Show Options
	this.f_ShowOptions=function(v_AreaName){
		var v_LogStatus=O_LAPCAT.o_User.v_LogStatus;
		var v_Value='';
		for(var v_Key in this.a_OpenLineXML){
			v_Value=this.a_OpenLineXML[v_Key];
			switch(O_LAPCAT.o_Interface.v_AreaName){
				case 'News':case 'Events':case 'Materials':
					if(this.v_Similar){$('#button-similar').show();}
					$('#button-more-info').show();
					break;
				case 'Hours':
					if(v_LogStatus<3){
						F_ToggleOption('home',((O_LAPCAT.o_Information.a_StorageXML['points-info']['library-ID']==this.a_OpenLineXML['ID'])?'option-red':'option-black'));
						$('#button-home').show();
					}
					$('#button-events').show();
					break;
				default:
					break;
			}
			switch(v_Key){
				case 'collection':case 'favorite':case 'watched':case 'watchlist':
					F_ToggleOption(v_Key,((this.a_OpenLineXML[v_Key]>0)?'option-red':'option-black'));
					if(v_LogStatus<3){
						$('#button-'+v_Key).show();
					}
					break;
				default:
					break;
			}
		}
		if(O_LAPCAT.o_Interface.v_MoreInfo){F_ToggleOption('more-info','option-red');}
	};
	// Function - Show Tags
	this.f_ShowTags=function(){
		$('#open-line-tags').empty();
		for(var v_TagKey in this.a_OpenLineTagXML){
			//F_PrintR(this.a_OpenLineTagXML,0,true);
			F_InsertElement('stage-tag','open-line-tags',true,true,this.a_OpenLineTagXML[v_TagKey],true,v_TagKey);
		}
	};
	// Function - Store Open Line XML
	this.f_StoreOpenLineXML=function(v_XML){
		var a_Data=new Array();
		this.a_OpenLineXML=new Array();
		this.a_OpenLineTagXML=new Array();
		var v_TagXML=F_PGXML(v_XML,'tag-set','pull');
		var v_Description=F_PGXML(v_XML,'description','pull');
		var v_Days=F_PGXML(v_XML,'days','pull');
		a_Data=F_B(F_PSXML(F_PSXML(v_TagXML,'value'),'value'),'tag');
		if(a_Data[0]){
			for(var v_TagKey in a_Data){
				this.a_OpenLineTagXML[v_TagKey]=F_CXMLA(a_Data[v_TagKey]);
			}
		}else{
			var a_Tag=new Array();
			a_Tag['tag-ID']=0;
			a_Tag['name']='';
			this.a_OpenLineTagXML[0]=a_Tag;
		}
		v_XML=F_PGXML(v_XML,'tag-set','rest');
		v_XML=F_PGXML(v_XML,'description','rest');
		v_XML=F_PGXML(v_XML,'days','rest');
		this.a_OpenLineXML=F_CXMLA(v_XML);
		this.a_OpenLineXML['description']=F_ConvertHTML(v_Description);
		this.a_OpenLineXML['days']=v_Days;
		if(this.v_LastOpenLineID==this.a_OpenLineXML['ID']){
			this.v_SameOpenLine=true;
		}else{
			this.v_LastOpenLineID=this.a_OpenLineXML['ID'];
			this.v_SameOpenLine=false;
		}
		O_LAPCAT.o_Interface.f_SetCurrentRecord(this.f_GetRecordKey(this.a_OpenLineXML['ID']));
	};
	// Function - Store XML
	this.f_StoreXML=function(v_StorageXMLKey,v_XML){
		this.v_Help=false;
		v_SingleKey=v_StorageXMLKey.slice(0,v_StorageXMLKey.length-1);
		var a_Data=new Array();
		switch(v_StorageXMLKey){
			case 'interests':case 'possibles':case 'suggestions':
				this.a_ClearPushed[v_StorageXMLKey]=true;
				this.a_Titles[v_StorageXMLKey]=F_PSXML(F_PGXML(v_XML,'suggestion-title','pull'),'value');
				a_Data=F_B(F_PSXML(F_PGXML(v_XML,'suggestion-title','rest'),'value'),v_SingleKey);
				this.a_StorageXMLLength[v_StorageXMLKey]=a_Data.length;
				break;
			default:
				a_Data=F_B(F_PSXML(v_XML,'value'),v_SingleKey);
				v_StorageXMLKey='content';
				break;
		}
		for(v_Key in a_Data){
			a_Data[v_Key]=F_CXMLA(a_Data[v_Key]);
			if(a_Data[v_Key]['name']){a_Data[v_Key]['name']=this.f_Clean(a_Data[v_Key]['name']);
			}else if(a_Data[v_Key]['title']){a_Data[v_Key]['title']=this.f_Clean(a_Data[v_Key]['title']);}
		}
		this.a_StorageXML[v_StorageXMLKey]=a_Data;
	};
	// Function - Reset Titles
	this.f_ResetTitles=function(){
		this.a_Titles=new Array();
		this.a_Titles['interests']='';
		this.a_Titles['possibles']='';
		this.a_Titles['suggestions']='';
	};
	// Function - Toggle Similar 
	this.f_ToggleSimilar=function(v_Similar){this.v_Similar=v_Similar;};
	this.f_Reset();
}
//
// Function - Information Object
function F_InformationObject(){
	// Array - Storage XML
	this.a_StorageXML=new Array();
	// Function - Create RSS Link
	this.f_CreateRSSLink=function(){
		var v_Link='/rss-creator.php?area='+O_LAPCAT.o_Interface.v_AreaName;
		for(v_Key in this.a_StorageXML['search-information']){
			//alert(v_Key+' = '+this.a_StorageXML['search-information'][v_Key]);
			v_Link+='&'+v_Key+'='+this.a_StorageXML['search-information'][v_Key];
		}
		return v_Link;
	};
	// Function - Get Other Searches
	this.f_GetOtherSearches=function(){
		var v_HTML='<br/><br/><font style="padding-left:9px;"></font>Suggestions:';
		switch(O_LAPCAT.o_Interface.v_AreaName){
			case 'News':case 'Events':case 'Materials':
				v_HTML+='<br/><font style="padding-left:24px;"></font>Watch this search with a <a class="rss-link" href="'+O_LAPCAT.o_Information.f_CreateRSSLink()+'" onfocus="javascript:this.blur();" style="font-size:14px; text-decoration:underline;" title="'+O_LAPCAT.o_Interface.a_StorageXML['screen-info']['header']+'">RSS feed.</a>';
				break;
			case 'Jobs':
				v_HTML+='<br/><a href="http://old.lapcat.org/jobs.html" onfocus="javascript:this.blur();" target="_blank" style="font-size:14px; margin-left:24px; text-decoration:underline;">Show</a> a listing of job opportunities. (<font style="font-style:italic;">This link will open in a new window.</font>)';
				break;
			default:
				break;
		}
		for(v_SearchKey in this.a_StorageXML['search-information']){
			switch(v_SearchKey){
				case 'change-tag':
					if(this.a_StorageXML['search-information'][v_SearchKey]>0){
						v_HTML+='<br/><font style="padding-left:24px;"></font>Search the catalog for <a class="catalog-link" href="http://catalog.lapcat.org/search/X?SEARCH='+escape(O_LAPCAT.o_Interface.a_Tag['name'].split('-').join('+'))+'&SORT=D&searchscope=12" style="font-size:14px;">'+O_LAPCAT.o_Interface.a_Tag['name']+'</a>.';
					}break;
				default:break;
			}
		}
		for(v_SearchKey in this.a_StorageXML['search-information']){
			switch(v_SearchKey){
				case 'change-search':case 'change-sort':case 'change-tag':
					if(this.a_StorageXML['search-information'][v_SearchKey]>0){
						v_HTML+='<br/><font style="padding-left:24px;"></font><a href="javascript:F_MR(\'/'+O_LAPCAT.o_Interface.v_AreaName+'/'+v_SearchKey+'/0/ajax\');" onfocus="javascript:this.blur();" style="font-size:14px; text-decoration:underline;">Remove</a> the criteria (<font style="font-style:italic;">';
						switch(v_SearchKey){
							case 'change-search':v_HTML+=A_Drops[O_LAPCAT.o_Interface.v_AreaName]['search'][this.a_StorageXML['search-information'][v_SearchKey]]['name'];break;
							case 'change-sort':v_HTML+=A_Drops[O_LAPCAT.o_Interface.v_AreaName]['sort'][this.a_StorageXML['search-information'][v_SearchKey]]['name'];break;
							case 'change-tag':v_HTML+=O_LAPCAT.o_Interface.a_Tag['name'];break;
							default:break;
						}
						v_HTML+='</font>) from this search.';
					}
					break;
				case 'calendar':
					if(this.a_StorageXML['search-information'][v_SearchKey]!==''&&this.a_StorageXML['search-information'][v_SearchKey]>0){
						v_HTML+='<br/><font style="padding-left:24px;"></font><a href="javascript:F_MR(\'/'+O_LAPCAT.o_Interface.v_AreaName+'/'+v_SearchKey+'//ajax\');" onfocus="javascript:this.blur();" style="font-size:14px; text-decoration:underline;">Remove</a> the criteria (<font style="font-style:italic;">';
						v_HTML+=this.a_StorageXML['search-information'][v_SearchKey];
						v_HTML+='</font>) from this search.';
					}
					break;
				case 'change-filter':
					if(this.a_StorageXML['search-information'][v_SearchKey]!==''){
						v_HTML+='<br/><font style="padding-left:24px;"></font><a href="javascript:F_MR(\'/'+O_LAPCAT.o_Interface.v_AreaName+'/'+v_SearchKey+'//ajax\');" onfocus="javascript:this.blur();" style="font-size:14px; text-decoration:underline;">Remove</a> the criteria (<font style="font-style:italic;">';
						v_HTML+=this.a_StorageXML['search-information'][v_SearchKey];
						v_HTML+='</font>) from this search.';
					}
					break;
				default:
					break;
			}
		}
		if(O_LAPCAT.o_Interface.v_AreaName!=='Hours'&&O_LAPCAT.o_Interface.v_AreaName!=='Jobs'){
			v_HTML+='<br/><font style="padding-left:24px;"></font><a href="javascript:F_MR(\'/'+O_LAPCAT.o_Interface.v_AreaName+'/reset-search/ajax\');" onfocus="javascript:this.blur();" style="font-size:14px; text-decoration:underline;">Reset</a> this search.';
		}
		return v_HTML;
	};
	// Function - Reset
	this.f_Reset=function(){
		this.f_ResetStorageXML();
	};
	// Function - Reset Storage XML
	this.f_ResetStorageXML=function(){
		this.a_StorageXML['area-info']=new Array();
		this.a_StorageXML['points-info']=new Array();
		this.a_StorageXML['search-information']=new Array();
	};
	// Function - Store XML
	this.f_StoreXML=function(v_StorageXMLKey,v_XML){
		this.a_StorageXML[v_StorageXMLKey]=F_CXMLA(v_XML,true);
		if(v_StorageXMLKey=='area-info'){
			O_LAPCAT.o_Interface.f_SetMainMenu(A_Menu[this.a_StorageXML['area-info']['area-ID']]);
		}
	};
	// Function - Reset
	this.f_Reset();
}
//
// Function - Interface Object
function F_InterfaceObject(){
	// Array - Dockables
	this.a_Dockables=new Array();
	// Array - Main Menu
	this.a_MainMenu=new Array();
	// Array - Popular Tags
	this.a_PopularTags=new Array();
	// Array - Storage XML
	this.a_StorageXML=new Array();
	// Array - Tag
	this.a_Tag=new Array();
	// Variable - Area Name
	this.v_AreaName='';
	// Variable - Current Page
	this.v_CurrentPage=1;
	// Variable - Current Record
	this.v_CurrentRecord=0;
	// Variable - Maximum Records
	this.v_MaximumRecords=10;
	// Variable - Page Display
	this.v_PageDisplay=false;
	// Variable - Popular Tags
	this.v_RefreshPopularTags=false;
	// Variable - Promotion Key
	this.v_PromotionKey=0;
	// Variable - More Info
	this.v_MoreInfo=false;
	// Function - More Info
	this.f_ToggleMoreInfo=function(v_Show){
		if(v_Show){
			this.v_MoreInfo=true;
			$('#content-lines').hide();
		}else if(this.v_MoreInfo){
			this.v_MoreInfo=false;
			$('#content-lines').show();
		}else{
			this.v_MoreInfo=true;
			$('#content-lines').hide();
		}
	};
	// Function - Change Drop
	this.f_ChangeDrop=function(v_Drop){
		F_MR('/'+this.v_AreaName+'/change-'+v_Drop+'/'+$('#change-'+v_Drop+'-options').val()+'/ajax');
	};
	// Function - Change Tab
	this.f_ChangeTab=function(v_Tab){
		this.f_SetMainMenu(v_Tab);
		switch(v_Tab){
			case 'Home':case 'Hours':case 'Jobs':
				F_MR('/'+v_Tab+'/browse/ajax');
				break;
			case 'My Library':
				F_MR('/my-library/clear/ajax');
				break;
			case 'News':case 'Events':case 'Materials':case 'Databases':
				F_MR('/'+v_Tab+'/clear-search/ajax');
				break;
			default:
				break;
		}
	};
	// Function - Clear Content
	this.f_ClearContent=function(){F_InsertElement('stage-message','interface-content',false,true,F_GetRecordsText());};
	// Function - Clear Search
	this.f_ClearSearch=function(){F_MR('/'+this.v_AreaName+'/clear/ajax');};
	// Function - Determine Dockables
	this.f_DetermineDockables=function(){
		switch(parseInt(O_LAPCAT.o_Information.a_StorageXML['points-info']['user-type-ID'])){
			case 11:case 10:case 9:
			case 8:case 7:case 6:case 5:
				this.a_Dockables['Tickets']=true;
			case 4:case 3:
				this.a_Dockables['Options']=true;
				break;
			default:
				break;
		}
	};
	// Function - Next Page
	this.f_NextPage=function(){this.v_CurrentRecord=0;F_MR('/'+this.v_AreaName+'/next/ajax');};
	// Function - Next Record
	this.f_NextRecord=function(){this.v_CurrentRecord++;var v_NextRecord=O_LAPCAT.o_Content.a_StorageXML['content'][this.v_CurrentRecord]['ID'];F_MR('/'+this.v_AreaName+'/thin-line/'+v_NextRecord+'/simple/ajax');};
	// Function - Previous Page
	this.f_PreviousPage=function(){this.v_CurrentRecord=0;F_MR('/'+this.v_AreaName+'/previous/ajax');};
	// Function - Previous Record
	this.f_PreviousRecord=function(){this.v_CurrentRecord--;var v_PreviousRecord=O_LAPCAT.o_Content.a_StorageXML['content'][this.v_CurrentRecord]['ID'];F_MR('/'+this.v_AreaName+'/thin-line/'+v_PreviousRecord+'/simple/ajax');};
	// Function - Reset
	this.f_Reset=function(){
		this.f_ResetStorageXML();
		this.f_ResetDockables();
		this.f_ResetMainMenu();
		this.f_ResetTag();
		F_MR('/promotions-list/simple/ajax');
		F_MR('/lapcat/ajax/get-XML.php');
	};
	// Function - Reset Dockables
	this.f_ResetDockables=function(){
		this.a_Dockables=new Array();
		this.a_Dockables['Tickets']=false;
		this.a_Dockables['Options']=false;
		this.a_Dockables['Objectives']=true;
		this.a_Dockables['Donations']=true;
		this.a_Dockables['Catalog']=true;
	};
	// Function - Reset Main Menu
	this.f_ResetMainMenu=function(){
		this.a_MainMenu=new Array();
		this.a_MainMenu['Home']=true;
		this.a_MainMenu['News']=false;
		this.a_MainMenu['Events']=false;
		this.a_MainMenu['Materials']=false;
		this.a_MainMenu['Databases']=false;
		this.a_MainMenu['Hours']=false;
		this.a_MainMenu['Jobs']=false;
	};
	// Function - Reset Search
	this.f_ResetSearch=function(){F_MR('/'+this.v_AreaName+'/reset-search/ajax');};
	
	// Function - Reset Storage XML
	this.f_ResetStorageXML=function(){this.a_StorageXML=new Array();this.a_StorageXML['screen-info']=new Array();this.a_StorageXML['promotions-list']=new Array();};
	
	// Function - Reset Tag
	this.f_ResetTag=function(){this.a_Tag=Array();this.a_Tag['ID']=0;this.a_Tag['name']='';};
	
	// Function - Set Current Record
	this.f_SetCurrentRecord=function(v_RecordKey){this.v_CurrentRecord=v_RecordKey;};

	// Function - Set Main Menu
	this.f_SetMainMenu=function(v_Tab){for(v_MainMenuKey in this.a_MainMenu){this.a_MainMenu[v_MainMenuKey]=false;}this.a_MainMenu[v_Tab]=true;};

	// Function - Set Tag
	this.f_SetTag=function(v_XML){this.a_Tag=F_CXMLA(v_XML);this.f_ShowSelectedTag();};

	// Function - Show
	this.f_Show=function(){
		this.f_DetermineDockables();
		this.f_ShowDockables();
		this.f_ShowMainMenu();
		this.f_ShowTinyMenu();
		this.f_ShowScreenButtons();
		if(!this.v_PageDisplay){
			this.f_ShowListOptions();
			this.f_ShowSearchOptions();
			this.f_ShowContent();
		}else{
			$('#interface-list-menu').hide();
			$('#interface-left-menu').hide();
			$('#interface-search-options').hide();
			$('#interface-date-selector').hide();
			this.v_PageDisplay=false;
		}
		if(this.a_MainMenu['Home']){
			if(this.v_RefreshPopularTags){
				this.v_RefreshPopularTags=false;
				this.f_ShowPopularTags('interface-left-menu');
			}
		}else{
			this.v_RefreshPopularTags=true;
		}
	};

	// Function - Show List Options
	this.f_ShowListOptions=function(){
		$('#interface-list-menu').html('<font class="med-grey" style="font-size:10px; padding-left:4px;">Featured Links</font>');
		switch(this.v_AreaName){
			case 'Home':
				// copy list link to interface-list-menu
				F_InsertElement('stage-basic-link','interface-list-menu',true,true,eval({ID:'features',name:'Most Recent Update',url:'/most-recent-update/ajax'}));
				break;
			case 'Events':
				// copy list link to interface-list-menu
				F_InsertElement('stage-basic-link','interface-list-menu',true,true,eval({ID:'masquerade',name:'Black & White Masquerade',url:'/black-and-white-masquerade/ajax'}));
				break;
			default:
				$('#interface-list-menu').hide();
				return;
				break;
		}
		$('#interface-list-menu').show();
	}

	// Function - Show Page
	this.f_ShowPage=function(v_Data){
		this.v_PageDisplay=true;
		F_InsertElement('stage-page-content','interface-content');
		$('#page-content-display').html(v_Data);
		//alert(v_Data);
	};

	// Function - Show Tiny Menu
	this.f_ShowTinyMenu=function(){
		$('#interface-tiny-options').empty();
		if(this.v_PageDisplay){
			F_InsertElement('stage-back-button','interface-tiny-main-option',false);
		}else{
			var v_First=false;
			var v_LogStatus=O_LAPCAT.o_User.v_LogStatus;
			var v_Filter=O_LAPCAT.o_Information.a_StorageXML['search-information']['change-filter'];
			switch(this.v_AreaName){
				case 'News':
					F_InsertElement('stage-reset-button','interface-tiny-main-option',false);
					if(v_LogStatus<3){
						F_InsertElement('stage-icon-button','interface-tiny-options',v_First,true,eval({button:92,ID:14,text:'Show my favorite news and articles.'}));
						if(v_Filter=='favorites'){$('#button-14').removeClass('toggle-button').addClass('red-button');}
						v_First=true;
					}
					break;
				case 'Events':
					F_InsertElement('stage-reset-button','interface-tiny-main-option',false);
					if(v_LogStatus<3){
						F_InsertElement('stage-icon-button','interface-tiny-options',v_First,true,eval({button:92,ID:14,text:'Show my favorite events.'}));
						if(v_Filter=='favorites'){$('#button-14').removeClass('toggle-button').addClass('red-button');}
						v_First=true;
						F_InsertElement('stage-icon-button','interface-tiny-options',v_First,true,eval({button:0,ID:15,text:'Show my anticipated events.'}));
						if(v_Filter=='anticipated'){$('#button-15').removeClass('toggle-button').addClass('red-button');}
					}
					F_InsertElement('stage-icon-button','interface-tiny-options',v_First,true,eval({button:10,ID:16,text:'Show Summer Reading Program events.'}));
					if(v_Filter=='summer'){$('#button-16').removeClass('toggle-button').addClass('red-button');}
					v_First=true;
					F_InsertElement('stage-icon-button','interface-tiny-options',v_First,true,eval({button:11,ID:17,text:'Show LAPCAT Points Program events.'}));
					if(v_Filter=='points'){$('#button-17').removeClass('toggle-button').addClass('red-button');}
					break;
				case 'Materials':
					F_InsertElement('stage-reset-button','interface-tiny-main-option',false);
					if(v_LogStatus<3){
						F_InsertElement('stage-icon-button','interface-tiny-options',v_First,true,eval({button:92,ID:14,text:'Show my favorite materials.'}));
						if(v_Filter=='favorites'){$('#button-14').removeClass('toggle-button').addClass('red-button');}
						v_First=true;
						F_InsertElement('stage-icon-button','interface-tiny-options',v_First,true,eval({button:0,ID:15,text:'Show my anticipated materials.'}));
						if(v_Filter=='anticipated'){$('#button-15').removeClass('toggle-button').addClass('red-button');}
						F_InsertElement('stage-icon-button','interface-tiny-options',v_First,true,eval({button:94,ID:18,text:'Show my collected materials.'}));
						if(v_Filter=='collection'){$('#button-18').removeClass('toggle-button').addClass('red-button');}
					}
					break;
				case 'Databases':case 'Hours':case 'Jobs':
					$('#interface-tiny-main-option').empty();
					break;
				default:
					F_InsertElement('stage-random-button','interface-tiny-main-option',false);
					break;
			}
		}
	};
	// Function - Show Left Links
	// this.f_ShowLeftLinks=function(){if(O_LAPCAT.o_User.v_LogStatus==3){$('#interface-left-links').html('<div style="float:left; height:16px; width:178px;"><font class="med-grey" style="font-size:10px; padding-left:3px;">New Users</font></div><div style="float:left; height:14px; width:178px;"><a class="gold" href="javascript:F_SetDockable(\'Objectives\',26);" style="padding-left:7px;">New Account</a></div>');}}
	
	// Function - Show Selected Tag
	this.f_ShowSelectedTag=function(){$('.tag').removeClass('gold').addClass('gold-tag');$('.tag-'+this.a_Tag['ID']).addClass('gold');};
	
	// Function - Show Content
	this.f_ShowContent=function(){
		if(this.a_MainMenu['Home']||this.a_StorageXML['screen-info']['total-records']>0){
			F_InsertElement('interface-content-displays','interface-content',false);
			switch(this.v_AreaName){
				case 'Home':
					O_LAPCAT.o_Content.f_ShowPushedRecords(1,'suggestion');
					O_LAPCAT.o_Content.f_ShowPushedRecords(2,'possible');
					O_LAPCAT.o_Content.f_ShowPushedRecords(3,'interest');
					break;
				case 'Databases':
				case 'Events':
				case 'Materials':
				case 'News':
				case 'Hours':
				
					O_LAPCAT.o_Content.f_ShowContent();
					O_LAPCAT.o_Content.f_ShowDisplay(this.v_AreaName);
					//alert('!');
					O_LAPCAT.o_Content.f_ShowOpenLine();
					O_LAPCAT.o_Content.f_ShowTags();
					O_LAPCAT.o_Content.f_ShowOptions();
					if(this.v_AreaName=='Materials'){F_CoverImages();}
					break;
				case 'Jobs':
					this.f_ClearContent();
					break;
				default:
					break;
			}
		}else{
			this.f_ClearContent();
		}
		O_LAPCAT.o_Content.v_Help=false;
	};
	// Function - Show Dockables
	this.f_ShowDockables=function(){
		var a_Data=new Array();
		$('#interface-dockables').empty();
		for(v_DockableKey in this.a_Dockables){
			if(this.a_Dockables[v_DockableKey]){
				F_InsertElement('stage-dockable-link','interface-dockables',true,true,eval({ID:v_DockableKey}));
				if(v_DockableKey=='Donations'){$('#dockable-link-'+v_DockableKey).removeClass('opposite').addClass('gold');
				}else if(v_DockableKey=='Objectives'){
					if(O_LAPCAT.o_User.v_LogStatus==3){$('#dockable-link-'+v_DockableKey).html('Create Account');}
				}
			}
		}
	};
	// Function - Show Main Menu
	this.f_ShowMainMenu=function(){
		var a_Data=new Array();
		var v_Key='';
		var a_Images=eval({0:'house',1:'newspaper',2:'calendar',3:'book_open',4:'database',5:'time',6:'user_suit'});
		var v_ImageCounter=0;
		$('#interface-main-menu').empty();
		for(v_MainMenuKey in this.a_MainMenu){
			v_Key=v_MainMenuKey;
			if(v_MainMenuKey=='Home'&&O_LAPCAT.o_User.v_LogStatus==2){v_Key='My Library';}
			a_Data['name']=v_Key;
			a_Data['icon']=a_Images[v_ImageCounter];
			v_ImageCounter++;
			F_InsertElement('stage-main-menu-link','interface-main-menu',true,true,a_Data,true,v_MainMenuKey);
			if(this.a_MainMenu[v_MainMenuKey]){
				this.v_AreaName=v_MainMenuKey;
				$('#main-menu-link-'+v_MainMenuKey).addClass('option-selected');
			}
		}
	};
	// Function - Show Popular Tags
	this.f_ShowPopularTags=function(v_Target){
		if(!v_Target){v_Target='interface-left-menu';}
		$('#'+v_Target).html('<font class="med-grey" style="font-size:10px; padding-left:4px;">Popular Tags</font>');
		var v_Counter=6;
		for(var v_TagKey in this.a_PopularTags){
			if(v_TagKey<v_Counter){
				F_InsertElement('stage-list-link',v_Target,true,true,this.a_PopularTags[v_TagKey],true,this.a_PopularTags[v_TagKey]['ID']);
			}
		}
	};
	// Function - Show Promotion
	this.f_ShowPromotion=function(){
		if(this.v_PromotionKey>this.a_StorageXML['promotions-list'].length-1){this.v_PromotionKey=0;}
		setTimeout('$(\'#interface-promotions\').attr(\'src\',\''+O_LAPCAT.v_DomainName+'/promotions/'+this.a_StorageXML['promotions-list'][this.v_PromotionKey]+'\');',120);
		setTimeout('O_LAPCAT.o_Interface.v_PromotionKey++;');
		setTimeout('O_LAPCAT.o_Interface.f_ShowPromotion();',30*1000);
	};
	// Function - Show Screen Buttons
	this.f_ShowScreenButtons=function(){
		var a_Case=eval({'previous-page':false,'previous-record':false,'next-record':false,'next-page':false});
		if(!O_LAPCAT.o_Interface.v_PageDisplay){
			// Previous Button
			a_Case['previous-page']=this.a_StorageXML['screen-info']['current-page']>1;
			// Previous Record Button
			a_Case['previous-record']=this.v_CurrentRecord>0;
			// Next Record Button
			a_Case['next-record']=this.v_CurrentRecord<parseInt(this.v_MaximumRecords)-1&&parseInt(this.v_CurrentRecord)+((parseInt(this.a_StorageXML['screen-info']['current-page'])-1)*this.v_MaximumRecords)<(parseInt(this.a_StorageXML['screen-info']['total-records'])-1);
			// Next Page Button
			a_Case['next-page']=parseInt(this.a_StorageXML['screen-info']['current-page'])<parseInt(this.a_StorageXML['screen-info']['total-pages']);
		}
		switch(this.v_AreaName){
			case 'News':case 'Events':case 'Materials':case 'Databases':case 'Hours':
				for(var v_Key in a_Case){$('#stage-'+v_Key+'-button').css('visibility',((a_Case[v_Key])?'visible':'hidden'));}
				break;
			default:
				for(var v_Key in a_Case){$('#stage-'+v_Key+'-button').css('visibility','hidden');}
				break;
		}
		// Log Out Button
		if(O_LAPCAT.o_User.v_LogStatus<3){
			$('#stage-log-out-button').show();
		}else{
			$('#stage-log-out-button').hide();
		}
	};
	// Function - Show Search Options
	this.f_ShowSearchOptions=function(){
		var a_Search=new Array();
		var v_AreaName=this.v_AreaName;
		a_Search=O_LAPCAT.o_Information.a_StorageXML['search-information'];
		if(O_LAPCAT.o_Content.v_Similar||this.a_MainMenu['Home']&&!this.v_PageDisplay){
			$('#interface-search-options').show();
			$('#interface-date-selector').show();
			$('#interface-left-menu').show();
		}else{
			$('#interface-search-options').hide();
			$('#interface-date-selector').hide();
			$('#interface-left-menu').hide();
		}
		if(this.v_PageDisplay){return;}
		if((!this.a_MainMenu['Hours']||!this.a_MainMenu['Jobs'])&&(O_LAPCAT.o_Content.v_Similar||this.a_MainMenu['Home'])){
			if(!this.a_MainMenu['Home']){$('#interface-left-menu').empty();}
			if(!this.a_MainMenu['Hours']&&!this.a_MainMenu['Jobs']){
				// Insert Element - Change Tag (Drop Box)
				F_InsertElement('form-change-tag','stage-curtains',false,true,this.a_Tag,true,this.a_Tag['ID']);
			}
			if(this.a_Tag['ID']>0){
				F_InsertElement('stage-reset-tag','tag-selected',false,true,eval({search:'change-tag',value:0}));
				if(!this.a_Tag['search-name']){this.a_Tag['search-name']=this.a_Tag['name'].split('-').join('+');}
				F_InsertElement('stage-catalog-link','change-tag-catalog-link',false,true,this.a_Tag,true,this.a_Tag['ID']);
				$('#catalog-link-'+this.a_Tag['ID']).css('text-decoration','none');
				$('#change-tag-input').attr('value',this.a_Tag['name']);
			}else{
				$('#tag-selected').empty();
			}
			if(this.a_MainMenu['Events']||this.a_MainMenu['News']||this.a_MainMenu['Materials']){
				$('#rss-feed-link').css('visibility','visible');
				if(this.a_MainMenu['Materials']){
					$('#interface-date-selector').hide();
				}else{
					$('#interface-date-selector').show();
				}
				$('#rss-feed-link').attr('href',O_LAPCAT.o_Information.f_CreateRSSLink()).attr('title',O_LAPCAT.o_Interface.a_StorageXML['screen-info']['header']);
			}else{
				$('#interface-date-selector').hide();
			}
			if(!this.a_MainMenu['Home']&&!this.a_MainMenu['Hours']&&!this.a_MainMenu['Jobs']){
				for(var v_Key in a_Search){
					switch(v_Key){
						case 'calendar':
							break;
						case 'change-search':
							// Insert Element - Change Search (Form)
							F_InsertElement('form-change-search','stage-curtains',true,true,a_Search);
							for(var v_DropKey in A_Drops[v_AreaName]['search']){
								// Insert Element - Option
								F_InsertElement('form-option','change-search-options',true,true,A_Drops[v_AreaName]['search'][v_DropKey]);
							}
							$('#change-search-options').val(a_Search[v_Key]);
							break;
						case 'change-sort':
							// Insert Element - Change Sort (Form)
							F_InsertElement('form-change-sort','stage-curtains',true,true,a_Search);
							for(var v_DropKey in A_Drops[v_AreaName]['sort']){
								// Insert Element - Option
								F_InsertElement('form-option','change-sort-options',true,true,A_Drops[v_AreaName]['sort'][v_DropKey]);
							}
							$('#change-sort-options').val(a_Search[v_Key]);
							break;
						case 'change-tag':
							break;
						default:
							break;
					}
				}
			}
			F_Move('stage-curtains','interface-search-options','curtains');
			if(!this.a_MainMenu['Home']&&!this.a_MainMenu['Hours']&&!this.a_MainMenu['Jobs']){
				$('#change-sort-selected').html(A_Drops[v_AreaName]['sort'][a_Search['change-sort']]['name']);
				if(a_Search['change-sort']>0){F_InsertElement('stage-reset-tag','sort-selected',false,true,eval({search:'change-sort',value:0}));}
			}
			if(this.a_MainMenu['News']||this.a_MainMenu['Events']){
				$('#change-date-selected').html(a_Search['calendar']);
				if(a_Search['calendar']>''){
					if(a_Search['calendar']>''){F_InsertElement('stage-reset-tag','date-selected',false,true,eval({search:'calendar',value:'\'\''}));}
				}else{
					$('#date-selected').html('');
				}
			}
			if(this.a_MainMenu['Events']||this.a_MainMenu['Materials']){
				$('#change-search-selected').html(A_Drops[v_AreaName]['search'][a_Search['change-search']]['name']);
				if(a_Search['change-search']>0){F_InsertElement('stage-reset-tag','search-selected',false,true,eval({search:'change-search',value:0}));}
			}
		}
		$('#button-date-selector').dateter({height:'114px',width:'176px'},function(v_Month,v_Day,v_Year){F_MR('/'+v_AreaName+'/calendar/'+v_Year+'-'+v_Month+'-'+v_Day+'/ajax');});
	};
	// Function - Store Popular Tags
	this.f_StorePopularTags=function(v_XML){
		this.a_PopularTags=new Array();
		var a_Tags=new Array();
		var a_Tag=new Array();
		a_Tags=F_B(F_PSXML(v_XML,'value'),'tag');
		for(var v_TagKey in a_Tags){
			this.a_PopularTags[v_TagKey]=F_CXMLA(a_Tags[v_TagKey]);
		}
		this.v_RefreshPopularTags=true;
	};
	// Function - Store XML
	this.f_StoreXML=function(v_StorageXMLKey,v_XML){
		this.a_StorageXML[v_StorageXMLKey]=F_CXMLA(v_XML);
		switch(v_StorageXMLKey){
			case 'promotions-list':
				this.v_PromotionKey=Math.floor(Math.random()*(this.a_StorageXML['promotions-list'].length-1));
				this.f_ShowPromotion();
				break;
			case 'screen-info':
				this.v_CurrentPage=this.a_StorageXML['screen-info']['current-page'];
				break;
			default:
				break;
		}
	};
	this.f_Reset();
}
//
// Function - LAPCAT Object
function F_LAPCATObject(v_DomainName){
	// Object - Content
	this.o_Content=new F_ContentObject();
	// Object - Information
	this.o_Information=new F_InformationObject();
	// Object - Interface
	this.o_Interface=new F_InterfaceObject();
	// Object - User
	this.o_User=new F_UserObject();
	// Variable - Domain Name
	this.v_DomainName=v_DomainName;
	// Function - Reset
	this.f_Reset=function(){};
	this.f_Reset();
}

//
// LAPCAT
var a_DomainName=window.location.toString().split('/');
var O_LAPCAT=new F_LAPCATObject(a_DomainName[0]+'/'+a_DomainName[1]+'/'+a_DomainName[2]);
var O_AutoComplete=new F_AutoCompleteObject();
$('.catalog-link').live('click',function(){F_SetDockable('Catalog',$(this).attr('href'));return false;});