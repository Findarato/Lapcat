// LAPCAT - Client
// 2010-02-06
/* Document - Ready */
$(document).ready(function(){
	F_HighlightMenu();
	F_BlindURL('construct-1');
	F_BlindURL('construct-2');
	F_BlindURL('construct-3');
	F_BlindURL('construct-4');
	F_RequestPopularTags();
	F_ShowSearchMenu(V_Area);
	$('.drops').fadeTo(0,0.50);
});
/* Array - Cells */
var A_Cells={
	'construct-1':{
		'active':false,
		'alias':'materials',
		'blind-URL':'/quick/materials/suggest',
		'cover-images':true,
		'data':{},
		'expanded':{
			'construct':{'height':'auto','width':'812px'},
			'header':{'width':'676px'},
			'master':{'height':'auto','width':'400px'},
			'open-line':{'height':'auto','width':'412px'}
		},
		'failed':false,
		'featured-view':0,
		'future-view':0,
		'header':'',
		'image-view':100,
		'list-view':400,
		'page':'',
		'previous-target':0,
		'refresh-counter':0,
		'refresh-on':true,
		'refresh-timer':20000,
		'shrunk':{
			'construct':{'height':'201px','width':'812px'},
			'header':{'width':'676px'},
			'master':{'height':'auto','width':'812px'},
			'open-line':{'height':'auto','width':'auto'}
		},
		'size':'shrunk',
		'target':0,
		'view':'image'
	},
	'construct-2':{
		'active':false,
		'alias':'events',
		'blind-URL':'/quick/events/suggest',
		'cover-images':false,
		'data':{},
		'expanded':{
			'construct':{'height':'480px','width':'812px'},
			'header':{'width':'704px'},
			'master':{'height':'auto','width':'400px'},
			'open-line':{'height':'auto','width':'412px'}
		},
		'failed':false,
		'featured-view':0,
		'future-view':200,
		'header':'',
		'image-view':0,
		'list-view':0,
		'page':'',
		'previous-target':0,
		'refresh-counter':0,
		'refresh-on':false,
		'refresh-timer':30000,
		'shrunk':{
			'construct':{'height':'292px','width':'302px'},
			'header':{'width':'212px'},
			'master':{'height':'auto','width':'302px'},
			'open-line':{'height':'auto','width':'auto'}
		},
		'size':'shrunk',
		'target':0,
		'view':'month'
	},
	'construct-3':{
		'active':false,
		'alias':'news',
		'blind-URL':'/quick/news/suggest',
		'cover-images':false,
		'data':{},
		'expanded':{
			'construct':{'height':'480px','width':'812px'},
			'header':{'width':'728px'},
			'master':{'height':'auto','width':'400px'},
			'open-line':{'height':'auto','width':'412px'}
		},
		'failed':false,
		'featured-view':500,
		'future-view':0,
		'header':'',
		'image-view':0,
		'list-view':300,
		'page':'',
		'previous-target':0,
		'refresh-counter':0,
		'refresh-on':false,
		'refresh-timer':30000,
		'shrunk':{
			'construct':{'height':'292px','width':'302px'},
			'header':{'width':'212px'},
			'master':{'height':'auto','width':'302px'},
			'open-line':{'height':'auto','width':'auto'}
		},
		'size':'shrunk',
		'target':0,
		'view':'featured'
	},
	'construct-4':{
		'active':false,
		'alias':'databases',
		'blind-URL':'/quick/databases/suggest',
		'cover-images':false,
		'data':{},
		'expanded':{
			'construct':{'height':'480px','width':'812px'},
			'header':{'width':'780px'},
			'master':{'height':'auto','width':'400px'},
			'open-line':{'height':'auto','width':'412px'}
		},
		'failed':false,
		'featured-view':800,
		'future-view':0,
		'header':'',
		'image-view':0,
		'list-view':700,
		'page':'',
		'previous-target':0,
		'refresh-counter':0,
		'refresh-on':false,
		'refresh-timer':30000,
		'shrunk':{
			'construct':{'height':'292px','width':'195px'},
			'header':{'width':'148px'},
			'master':{'height':'auto','width':'195px'},
			'open-line':{'height':'auto','width':'auto'}
		},
		'size':'shrunk',
		'target':0,
		'view':'featured'
	}
};
/* Array - Drops */
var A_Drops={
	'home':{
		'popular':{}
	},
	'news':{
		'search':{}
    },
	'events':{
		'search':{
			0:{'name':'All Libraries','value':0},
			1:{'name':'Main Library','value':1},
			2:{'name':'Coolspring','value':2},
			3:{'name':'Fish Lake','value':3},
			4:{'name':'Hanna','value':4},
			5:{'name':'Kingsford Heights','value':5},
			6:{'name':'Rolling Prairie','value':6},
			7:{'name':'Union Mills','value':7},
			8:{'name':'Mobile Library','value':8},
			9:{'name':'See Description','value':9}
		}
	},
	'materials':{
		'type':{
			1:{'name':'Books','value':1},
			2:{'name':'Music','value':2},
			3:{'name':'Movies','value':3},
			4:{'name':'Video Games','value':4},
			5:{'name':'Television Shows','value':5},
			23:{'name':'Audio Books','value':23},
			24:{'name':'Digital Books','value':24},
			32:{'name':'Graphic Novels','value':32},
			50:{'name':'Large Print Books','value':50},
			75:{'name':'Digital Audio Players','value':75}
		},
		'search':{
		}
	},
	'databases':{}
};
/* Array - Search */
var A_Search={
	'construct-1':{
		'similar':false,
		'specific':false,
		'date':{'on':false,'text':'','value':''},
		'popular':{'on':false,'text':'','value':''},
		'search':{'on':false,'text':'','value':''},
		'tag':{'on':false,'text':'','value':''},
		'type':{'on':false,'text':'','value':''}
	},
	'construct-2':{
		'similar':false,
		'specific':false,
		'date':{'on':false,'text':'','value':''},
		'popular':{'on':false,'text':'','value':''},
		'search':{'on':false,'text':'','value':''},
		'tag':{'on':false,'text':'','value':''},
		'type':{'on':false,'text':'','value':''}
	},
	'construct-3':{
		'similar':false,
		'specific':false,
		'date':{'on':false,'text':'','value':''},
		'popular':{'on':false,'text':'','value':''},
		'search':{'on':false,'text':'','value':''},
		'tag':{'on':false,'text':'','value':''},
		'type':{'on':false,'text':'','value':''}
	},
	'construct-4':{
		'similar':false,
		'specific':false,
		'date':{'on':false,'text':'','value':''},
		'popular':{'on':false,'text':'','value':''},
		'search':{'on':false,'text':'','value':''},
		'tag':{'on':false,'text':'','value':''},
		'type':{'on':false,'text':'','value':''}
	}
};
/* Array - Search Box */
var A_SearchBox={
	'home':{'change-tag':true,'change-tag-RSS':false,'change-popular':true,'change-type':false,'change-search':false,'date-selector':false},
	'news':{'change-tag':true,'change-tag-RSS':true,'change-popular':true,'change-type':false,'change-search':true,'date-selector':false},
	'events':{'change-tag':true,'change-tag-RSS':true,'change-popular':true,'change-type':false,'change-search':true,'date-selector':true},
	'materials':{'change-tag':true,'change-tag-RSS':true,'change-popular':true,'change-type':true,'change-search':true,'date-selector':false},
	'databases':{'change-tag':true,'change-tag-RSS':false,'change-popular':true,'change-type':false,'change-search':false,'date-selector':false},
	'hours':{'change-tag':false,'change-tag-RSS':false,'change-popular':false,'change-type':false,'change-search':false,'date-selector':false},
	'hiring':{'change-tag':false,'change-tag-RSS':false,'change-popular':false,'change-type':false,'change-search':false,'date-selector':false}
};
/* Array - User */
var A_User={
	'logged-in':false
};
/* Variable - Area */
var V_Area='home';
/* Variable - Home Library -  */
var V_HomeLibrary=1;
/* Function - Add Header */
function F_AddHeader(v_Construct){$('#'+v_Construct+' #header').html(A_Cells[v_Construct]['header']).show();}
/* Function - Add Lines */
function F_AddLines(v_Construct,v_View,v_StoreInViewHolder){
	var a_Data=F_GetData(v_Construct,'data');
	var a_Images=Array();
	var v_HTML='';
	for(var v_Key in a_Data){
		v_HTML+='<table cellpadding="0" cellspacing="0" id="line-'+v_Key+'" style="float:left; height:auto; width:'+((v_View=='list'||v_View=='future')?'100%':'auto')+';"><tr>';
		if(A_Cells[v_Construct]['cover-images']){
			if(v_View=='list'||v_View=='future'){v_HTML+='<td style="width:38px;"><div class="float-left" style="margin-right:2px; margin-top:4px; min-width:38px; text-align:center; width:38px;"><img id="on-screen-'+v_View+'-view-cover-'+v_Key+'"/></div></td><td style="width:auto;">';}else{v_HTML+='<td style="width:auto;">';}
		}else{v_HTML+='<td style="width:auto;">';}
		v_HTML+=F_ConstructAndReplace(F_CopyHTML('line-HTML-'+A_Cells[v_Construct][v_View+'-view']),a_Data[v_Key])+'</td></tr></table>';
		if(v_View=='featured'){break;}
	}
	if(v_StoreInViewHolder){$('#'+v_Construct+' #'+v_View+'-view-master').html(v_HTML);}else{$('#'+v_Construct+' #master').html(v_HTML);}
	if(A_Cells[v_Construct]['cover-images']){
		for(var v_Key in a_Data){
			a_Images[v_Key]=$('<img/>');
			if(v_View=='list'){a_Images[v_Key].addClass('show-cover');}
			a_Images[v_Key].attr('src','http://dev.lapcat.org/tickets/test/imageFetch.php?isbn='+a_Data[v_Key]['ISBNorSN'].replace(/ /g,'')+'&size=S');
			a_Images[v_Key].attr('id',v_View+'-view-cover-'+v_Key);
			$('#image-holder').append(a_Images[v_Key]);
			a_Images[v_Key].bind('load',function(){
				if($(this).height()>1){
					var v_Width=$(this).width();
					var v_Height=$(this).height();
					if(v_View=='list'){
						var v_Counter=19;
						while(v_Width>=36||v_Height>=42){
							v_Width=Math.floor($(this).width()*(0.05*v_Counter));v_Counter--;
							v_Height=Math.floor($(this).height()*(0.05*v_Counter));v_Counter--;
						}
					}
					$(this).height(v_Height);
					$(this).width(v_Width);
					$('#on-screen-'+$(this).attr('id')).replaceWith($(this));
					$('#image-holder #'+$(this).attr('id')).remove();
				}else{
					$('#on-screen-'+$(this).attr('id')).replaceWith('');
					$('#image-holder #'+$(this).attr('id')).remove();
				}
			})
			.each(function(){if(this.complete){$(this).trigger('load');}});
			if(v_View=='featured'){break;}
		}
	}
}
/* Function - Add To Search */
function F_AddToSearch(v_Construct,v_Key,v_Value,v_Text){
	A_Search[v_Construct][v_Key]={'on':true,'text':v_Text,'value':v_Value};
	$('#'+v_Construct+' #search-on-'+v_Key).show();
	$('#change-'+v_Key+'-master').attr('value',v_Text);
	$('#'+v_Key+'-selected').show();
	F_RequestOtherURL(v_Construct,v_Key,v_Value);
}
/* Function - Array Key Exists */
function F_ArrayKeyExists(v_Key,a_Array){for(var v_ArrayKey in a_Array){if(v_ArrayKey==v_Key){return true;}}return false;}
/* Function - Blind URL */
function F_BlindURL(v_Construct){
	if(A_Cells[v_Construct]['refresh-on']){if(A_Cells[v_Construct]['refresh-counter']>0){F_StartRefresh(v_Construct);}else{F_ToggleRefresh(v_Construct,true);}}
	if(A_Cells[v_Construct]['active']){$('#'+v_Construct).fadeTo(0,0.25);}
	$.getJSON(A_Cells[v_Construct]['blind-URL'],function(o_JSON){
		if(A_Cells[v_Construct]['active']){$('#'+v_Construct).fadeTo(0,1.00);}
		switch(o_JSON['switch']){case 'data':F_ProcessData(v_Construct,o_JSON);break;default:break;}
		F_ShowConstruct(v_Construct);
	});
}
/* Function - Change Featured View */
function F_ChangeFeaturedView(v_Construct,v_View){
	A_Cells[v_Construct]['view']=v_View;
	$('#'+v_Construct+' #'+((v_View=='list')?'featured-view-':'')+'master').hide();
	$('#'+v_Construct+' #'+((v_View=='list')?'':'featured-view-')+'master').show();
	F_HighlightOpenLine(v_Construct);
	$('#'+v_Construct+' #'+((v_View=='list')?'list':'featured')+'-view').hide();
	$('#'+v_Construct+' #'+((v_View=='list')?'featured':'list')+'-view').fadeTo(0,1.00).show();
}
/* Function - Change Month View */
function F_ChangeMonthView(v_Construct,v_View){
	if(v_View=='future'&&A_Cells[v_Construct]['size']=='expanded'){F_ShowPageButtons(v_Construct);}else{F_HidePageButtons();}
	A_Cells[v_Construct]['view']=v_View;
	$('#'+v_Construct+' #'+((v_View=='future')?'month-view-':'')+'master').hide();
	$('#'+v_Construct+' #'+((v_View=='future')?'':'month-view-')+'master').show();
	$('#'+v_Construct+' #'+((v_View=='future')?'future':'month')+'-view').hide();
	$('#'+v_Construct+' #'+((v_View=='future')?'month':'future')+'-view').fadeTo(0,1.00).show();
}
/* Function - Change View */
function F_ChangeView(v_Construct,v_View){
	A_Cells[v_Construct]['view']=v_View;
	$('#'+v_Construct+' #'+((v_View=='list')?'image-view-':'')+'master').hide();
	$('#'+v_Construct+' #'+((v_View=='list')?'':'image-view-')+'master').show();
	F_HighlightOpenLine(v_Construct);
	$('#'+v_Construct+' #'+((v_View=='list')?'list':'image')+'-view').hide();
	$('#'+v_Construct+' #'+((v_View=='list')?'image':'list')+'-view').fadeTo(0,1.00).show();
}
/* Function - Clear Master */
function F_ClearMaster(v_Construct,v_Master){$('#'+v_Construct+' #'+v_Master).html('');}
/* Function - Clear Open Line */
function F_ClearOpenLine(v_Construct){$('#'+v_Construct+' #open-line').html('');}
/* Function - Clear Page Buttons */
function F_ClearPageButtons(){$('#button-page-list').html('');}
/* Function - Close Dockable */
function F_CloseDockable(v_URL){
	$('#dockable-close-link').hide();
	if(!A_User['logged-in']){$('#user-access').css('visibility','visible');}
	$('#dockable-window').css({'visibility':'hidden'});
	$('#dockable-content').css({'visibility':'hidden'});
}
/* Function - Construct And Replace */
function F_ConstructAndReplace(v_HTML,a_Data){for(var v_Key in a_Data){while(v_HTML.indexOf('replace-'+v_Key)>-1){v_HTML=v_HTML.replace('replace-'+v_Key,a_Data[v_Key]);}}return v_HTML;};
/* Function - Convert Name To Data */
function F_ConvertNameToData(v_String){var a_NameData=v_String.split('_');var a_NewData=Array();var a_Data=Array();for(var v_Key in a_NameData){a_Data=a_NameData[v_Key].split('|');a_NewData[a_Data[0]]=a_Data[1];}return a_NewData;}
/* Function - Copy HTML */
function F_CopyHTML(v_Element){return $('#'+v_Element).html();}
/* Function - Activate All */
function F_ActivateAll(){for(var v_Key in A_Cells){A_Cells[v_Key]['active']=true;}}
/* Function - Deactivate Others */
function F_DeactivateOthers(v_Construct){for(var v_Key in A_Cells){if(v_Key!==v_Construct){A_Cells[v_Key]['active']=false;}}}
/* Function - Disable Image View Click */
function F_DisableImageViewClick(v_Construct){
	if(A_Cells[v_Construct]['view']=='image'){F_ChangeView(v_Construct,'list');}
	$('.auto-refresh-click').die('click');
	$('.image-view-click').die('click');
	$('.stop-refresh-click').die('click');
	$('#auto-refresh:visible').fadeTo(0,0.35);
	$('#image-view:visible').fadeTo(0,0.35);
	$('#stop-refresh:visible').fadeTo(0,0.35);
}
/* Function - Enable Image View Click */
function F_EnableImageViewClick(){
	$('#auto-refresh:visible').fadeTo(0,1.00);
	$('#image-view:visible').fadeTo(0,1.00);
	$('#stop-refresh:visible').fadeTo(0,1.00);
	$('.auto-refresh-click').die('click');
	$('.image-view-click').die('click');
	$('.stop-refresh-click').die('click');
	$('.auto-refresh-click').live('click',function(){F_ToggleRefresh($(this).parents('[id|="construct"]').attr('id'),true);});
	$('.image-view-click').live('click',function(){F_ChangeView($(this).parents('[id|="construct"]').attr('id'),'image');});
	$('.stop-refresh-click').live('click',function(){F_ToggleRefresh($(this).parents('[id|="construct"]').attr('id'),false);});
}
/* Function - Expand */
function F_Expand(v_Construct){
	F_ShowSearchMenu(V_Area);
	V_Area=A_Cells[v_Construct]['alias'];
	A_Cells[v_Construct]['active']=true;
	F_DeactivateOthers(v_Construct);
	F_HighlightMenu();
	F_HighlightOpenLine(v_Construct);
	F_HideOthers(v_Construct);
	F_ShowConstruct(v_Construct);
	switch(V_Area){
		case 'databases':case 'news':
			if(A_Cells[v_Construct]['view']=='featured'){F_ChangeFeaturedView(v_Construct,'list');}
			break;
		case 'events':
			F_ReSizeCalendar(v_Construct,'expanded');
			break;
		case 'materials':
			if(A_Cells[v_Construct]['refresh-on']){F_ToggleRefresh(v_Construct,false);}
			F_DisableImageViewClick(v_Construct);
			break;
		default:break;
	}
	if(A_Cells[v_Construct]['failed']||(V_Area=='events'&&A_Cells[v_Construct]['view']=='month')){
		F_HidePageButtons();
	}else{
		F_ShowPageButtons(v_Construct);
	}
	F_ShrinkOthers(v_Construct);
	A_Cells[v_Construct]['size']='expanded';
	F_ToggleMagnifier(v_Construct);
	$('#'+v_Construct).css('height',A_Cells[v_Construct]['expanded']['construct']['height']).css('width',A_Cells[v_Construct]['expanded']['construct']['width']);
	$('#'+v_Construct+' #master').css('width',A_Cells[v_Construct]['expanded']['master']['width']);
	$('#'+v_Construct+' #open-line').css('width',A_Cells[v_Construct]['expanded']['open-line']['width']).show();
	$('#'+v_Construct+' #header').css('width',A_Cells[v_Construct]['expanded']['header']['width']);
}
/* Function - Get Construct */
function F_GetConstruct(v_Area){for(var v_Key in A_Cells){if(A_Cells[v_Key]['alias']==v_Area){return v_Key;}}}
/* Function - Get Data */
function F_GetData(v_Construct,v_Name){return A_Cells[v_Construct][v_Name];}
/* Function - Has Search Criteria */
function F_HasSearchCriteria(v_Construct){var v_Counter=0;for(var v_SearchKey in A_Search[v_Construct]){if(A_Search[v_Construct][v_SearchKey]['on']){v_Counter++;}}if(v_Counter>0){return true;}return false;}
/* Function - Hide Construct */
function F_HideConstruct(v_Construct){$('#'+v_Construct).hide();}
/* Function - Hide Page Buttons */
function F_HidePageButtons(){$('#button-page-list').hide();}
/* Function - Hide Others */
function F_HideOthers(v_Construct){for(var v_Key in A_Cells){if(v_Key!==v_Construct){F_HideConstruct(v_Key);}}}
/* Function - Highlight Menu */
function F_HighlightMenu(){$('.menu-highlight').removeClass('menu-highlight').addClass('menu-normal');$('#menu-'+V_Area).removeClass('menu-normal').addClass('menu-highlight');}
/* Function - Highlight Open Line */
function F_HighlightOpenLine(v_Construct){$('#'+v_Construct+' .open-line:visible').removeClass('open-line');$('#'+v_Construct+' [name="counter-'+(A_Cells[v_Construct]['target'])+'"]').addClass('open-line');}
/* Function - Initialize Month View */
function F_InitializeMonthView(a_Calendar){
	$('#month-view-master').dateter({
		'daysToHighlight':a_Calendar,
		'displayHeader':true,
		'pastDayShadeClass':'background-alpha-4 font-I',
		'height':parseInt(A_Cells['construct-2']['shrunk']['construct']['height'])-21,
		'borderRoundClass':'corners-top-2 corners-bottom-2 name-hover specific-click',
		'highLightSize':'4px',
		'highLightColors':["#FFAA00","#EEBB11","#DDCC22","#CCDD33","#BBEE44","#AAFF55","#991166","#882277","#773388","#664499"],
		'borderClass':'border-all-C-1',
		'fontColor':'font-X',
		'shadeClass':'background-alpha-4',
		'highLightToday':true,
		'highLightTodayClass':'color-A-2 effect-hover-A-1',
		'calendarCell':'color-E-2 effect-hover-A-1',
		'noClick':true,
		'popUpBox':'',
		'initialFetchMonths':0,
		'largeDisplay':true,
		'uniqueName':'largeCal',
		'headerSelectors':{
			'title':$('#largeName'),
			'back':$('#largePrevious'),
			'next':$('#largeNext')
		}},
		function(v_Month,v_Day,v_Year){},
		function(v_Month,v_Day,v_Year){
			var v_Value=A_Search[F_GetConstruct('materials')]['search']['value'];
			if(v_Value==''){return;}
			$('#month-view-master .location-'+v_Value).show();
			$('#month-view-master .dateterHighlight:not(.location-'+v_Value+')').hide();
		});
}
/* Function - Open Dockable */
function F_OpenDockable(v_URL){
	$('#dockable-close-link').show();
	if(!A_User['logged-in']){$('#user-access').css('visibility','hidden');}
	$('#dockable-window').css({'visibility':'visible'});
	$('#dockable-content').css({'visibility':'visible'});
	$('#dockable-content').attr('src',v_URL);
}
/* Function - Process Data */
function F_ProcessData(v_Construct,o_JSON){
	A_Cells[v_Construct]['failed']=false;
	F_StoreData(v_Construct,'header',o_JSON['header']);
	F_StoreData(v_Construct,'page',o_JSON['page']);
	F_StoreData(v_Construct,'data',o_JSON['data']);
	F_TriggerClientChanges(o_JSON['client-changes']);
	F_TriggerClientTriggers(o_JSON['client-triggers']);
	F_AddHeader(v_Construct);
	F_ClearMaster(v_Construct,'master');
	var v_View=A_Cells[v_Construct]['view'];
	//if(A_Cells[v_Construct]['active']){alert(v_Construct+' is ACTIVE.');}
	switch(A_Cells[v_Construct]['alias']){
		case 'databases':
			F_AddLines(v_Construct,'list',false);
			if(A_Cells[v_Construct]['featured-view']>0){F_AddLines(v_Construct,'featured',true);}
			F_ChangeFeaturedView(v_Construct,v_View);
			break;
		case 'events':
			F_AddLines(v_Construct,'future',false);
			$.getJSON('quick/month-view',function(o_JSON){F_InitializeMonthView(o_JSON['calendar']);});
			F_ChangeMonthView(v_Construct,v_View);
			break;
		case 'materials':
			F_AddLines(v_Construct,'list',false);
			if(A_Cells[v_Construct]['image-view']>0){F_AddLines(v_Construct,'image',true);}
			F_ChangeView(v_Construct,v_View);
			break;
		case 'news':
			F_AddLines(v_Construct,'list',false);
			if(A_Cells[v_Construct]['featured-view']>0){F_AddLines(v_Construct,'featured',true);}
			F_ChangeFeaturedView(v_Construct,v_View);
			break;
		default:break;
	}
	F_HighlightOpenLine(v_Construct);
	if(V_Area=='home'){F_Shrink(v_Construct);A_Cells[v_Construct]['active']=true;}
	$('#'+v_Construct+' #icons').show();
	$('#'+v_Construct+' #failed-master').hide();
	F_TriggerClasses();
	if(A_Cells[v_Construct]['alias']=='events'){F_ShowHomeLibraries();}
}
/* Function - Populate Drops */
function F_PopulateDrops(v_Construct,v_Area,v_Specific,v_DropKey){
	if(F_ArrayKeyExists(v_Area,A_Drops)){
		var v_Pass=false;
		for(var v_DropType in A_Drops[v_Area]){
			v_Pass=false;
			if(v_Specific){
				if(v_DropType!=v_DropKey){break;}
			}
			$('#change-'+v_DropType+'-drops-lines').html('');
			for(var v_LineKey in A_Drops[v_Area][v_DropType]){
				v_Pass=true;
				$('#change-'+v_DropType+'-drops-lines').append('<div class="'+v_DropType+'-change fake-link effect-hover-Z-2" id="value-'+A_Drops[v_Area][v_DropType][v_LineKey]['value']+'" style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;">'+A_Drops[v_Area][v_DropType][v_LineKey]['name']+'</div>');
			}
			var v_DefaultValue=0;
			switch(v_DropType){
				case 'popular':
					for(var v_Key in A_Drops[v_Area]['popular']){
						v_DefaultValue=v_Key;
						break;
					}
					if(v_Area!=='home'){
						if(A_Search[v_Area]['popular']['value']>0){
							v_DefaultValue=A_Search[v_Area]['popular']['value'];
						}
					}
					$('#change-popular-master').html(((v_DefaultValue>0)?A_Drops[v_Area]['popular'][v_DefaultValue]['name']:'empty'));
					break;
				case 'search':case 'sort':case 'type':
					v_DefaultValue=A_Search[v_Construct][v_DropType]['value'];
					//alert(v_DefaultValue); /*ALERT*/
					$('#change-'+v_DropType+'-master').html(((v_DefaultValue>0)?A_Drops[v_Area][v_DropType][v_DefaultValue]['name']:'empty'));
					break;
				default:break;
			}
			if(!v_Pass){
				$('#change-'+v_DropType+'-drops-lines').html('<div style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;"><font class="font-H">No Results</font></div>');
			}
		}
	}
}
/* Function - Process Failed */
function F_ProcessFailed(v_Construct){
	$('#'+v_Construct+' [name="construct-views"]').hide();
	$('#change-tag-RSS:visible').attr('title','');
	var v_HTML='<font class="font-italic font-X" style="font-size:12px; margin-left:4px;">No results.</font><br/><font class="font-italic font-X" style="font-size:14px; margin-left:4px; margin-top:3px;">Suggestions:</font>';
	if(A_Search[v_Construct]['tag']['on']){
		v_HTML+='<br/><font class="font-X" style="font-size:14px; margin-left:12px;">Search the catalog for <span class="catalog-link fake-link" name="http://catalog.lapcat.org/search/X?SEARCH='+A_Search[v_Construct]['tag']['text']+'&SORT=D&searchscope=12" ID="'+A_Search[v_Construct]['tag']['ID']+'">'+A_Search[v_Construct]['tag']['text']+'</span>.</font>';
		v_HTML+='<br/><a class="font-X remove-tag fake-link" name="tag/drop" style="font-size:14px; margin-left:12px; text-decoration:underline;">Remove</a><font class="font-X" style="font-size:14px;"> (<font class="font-X" style="font-size:12px; font-style:italic;">'+A_Search[v_Construct]['tag']['text']+'</font>) from this search.</font>';
	}else if(A_Search[v_Construct]['popular']['on']){
		v_HTML+='<br/><font class="font-X" style="font-size:14px; margin-left:12px;">Search the catalog for <span class="catalog-link fake-link" name="http://catalog.lapcat.org/search/X?SEARCH='+A_Search[v_Construct]['popular']['text']+'&SORT=D&searchscope=12" ID="'+A_Search[v_Construct]['popular']['ID']+'">'+A_Search[v_Construct]['popular']['text']+'</span>.</font>';
		v_HTML+='<br/><a class="font-X remove-tag fake-link" name="tag/drop" style="font-size:14px; margin-left:12px; text-decoration:underline;">Remove</a><font class="font-X" style="font-size:14px;"> (<font class="font-X" style="font-size:12px; font-style:italic;">'+A_Search[v_Construct]['popular']['text']+'</font>) from the search.</font>';
	}
	if(F_HasSearchCriteria(v_Construct)){v_HTML+='<br/><a class="simple-click fake-link font-X" ID="button-reset" style="font-size:14px; margin-left:12px; text-decoration:underline;">Reset</a><font class="font-X" style="font-size:14px;"> the search.</font>';}
	v_HTML+='</font>';
	$('#'+v_Construct+' #failed-master').html(v_HTML).show();
}
/* Function - Remove From Search */
function F_RemoveFromSearch(v_Construct,v_Key){A_Search[v_Construct][v_Key]={'on':true,'text':'','value':''};F_RequestOtherURL(v_Construct,v_Key,'');}
/* Function - Request Other URL */
function F_RequestOtherURL(v_Construct,v_Key,v_Value){
	if(A_Cells[v_Construct]['active']){$('#'+v_Construct).fadeTo(0,0.25);}
	if(A_Cells[v_Construct]['refresh-on']){F_StartRefresh(v_Construct);}
	switch(v_Key){
		case 'date':case 'popular':case 'search':case 'sort':case 'tag':case 'type':
		$.getJSON('quick/'+A_Cells[v_Construct]['alias']+'/change-'+v_Key+'/'+v_Value,function(o_JSON){
			if(A_Cells[v_Construct]['active']){$('#'+v_Construct).fadeTo(0,1.00);}
			switch(o_JSON['switch']){
				case 'failed':
					A_Cells[v_Construct]['failed']=true;
					F_StoreData(v_Construct,'header',o_JSON['header']);
					F_AddHeader(v_Construct);
					F_ProcessFailed(v_Construct);
					break;
				case 'data':
					F_ProcessData(v_Construct,o_JSON);
					break;
				default:break;
			}
			if(A_Cells[v_Construct]['active']){F_ShowConstruct(v_Construct);}
		});
		break;
		default:break;
	}
}
/* Function - Request Popular Tags */
function F_RequestPopularTags(){$.getJSON('/quick/popular-tags',function(o_JSON){if(!o_JSON['failed']){F_SetPopularTags(o_JSON);}});}
/* Function - Re-Size Calendar */
function F_ReSizeCalendar(v_Construct,v_Size){
	$('#month-view-master').data('Settings').height=parseInt(A_Cells[v_Construct][v_Size]['construct']['height'])-50;
	$.fn.dateter.resize($('#month-view-master').data('Settings').height,$('#month-view-master'));
}
/* Function - Show Construct */
function F_ShowConstruct(v_Construct){$('#'+v_Construct).show();}
/* Function - Show Home Libraries */
function F_ShowHomeLibraries(){$('.location-'+V_HomeLibrary).removeClass('library-link-1').addClass('library-link-3 font-M');}
/* Function - Show Others */
function F_ShowOthers(v_Construct){for(var v_Key in A_Cells){if(v_Key!==v_Construct){F_ShowConstruct(v_Key);}}}
/* Function - Show Page Buttons */
function F_ShowPageButtons(v_Construct){
	var a_Data=A_Cells[v_Construct]['page'];
	var a_Buttons=eval({
		1:{'on':true,'button':true,'value':1},
		2:{'on':false,'button':false,'value':'...'},
		3:{'on':false,'button':true,'value':2},
		4:{'on':false,'button':true,'value':3},
		5:{'on':false,'button':true,'value':4},
		6:{'on':false,'button':false,'value':'...'}
	});
	if(a_Data['current-page']<3){
		if(a_Data['total-pages']>1){
			a_Buttons[3]['on']=true;
			a_Buttons[3]['value']=2;
		}
		if(a_Data['total-pages']>2){
			a_Buttons[4]['on']=true;
			a_Buttons[4]['value']=3;
		}
		if(a_Data['total-pages']>3){
			a_Buttons[6]['on']=true;
		}
		if(a_Data['current-page']==2&&a_Data['total-pages']>3){
			a_Buttons[5]['on']=true;
			a_Buttons[5]['value']=4;
		}
	}else if(a_Data['current-page']==a_Data['total-pages']){
		a_Buttons[5]['on']=true;
		a_Buttons[5]['value']=a_Data['total-pages'];
		a_Buttons[4]['on']=true;
		a_Buttons[4]['value']=a_Data['total-pages']-1;
		a_Buttons[3]['on']=true;
		a_Buttons[3]['value']=a_Data['total-pages']-2;
		if(a_Data['total-pages']-a_Data['current-page']>2){
			a_Buttons[6]['on']=true;
		}
		if(a_Data['current-page']>3){
			a_Buttons[2]['on']=true;
		}
	}else{
		if(a_Data['current-page']>3){
			a_Buttons[2]['on']=true;
		}
		if(a_Data['total-pages']-a_Data['current-page']>1){
			a_Buttons[6]['on']=true;
		}
		a_Buttons[3]['on']=true;
		a_Buttons[3]['value']=a_Data['current-page']-1;
		a_Buttons[4]['on']=true;
		a_Buttons[4]['value']=a_Data['current-page'];
		a_Buttons[5]['on']=true;
		a_Buttons[5]['value']=parseInt(a_Data['current-page'])+1;
	}
	$('#button-page-list').html('<font class="font-bold font-X" style="float:left; font-size:10px; margin-left:4px; margin-right:2px; text-align:center; vertical-align:top; width:auto;">Page</font>');
	for(var v_Key in a_Buttons){
		if(a_Buttons[v_Key]['on']){
			if(a_Buttons[v_Key]['button']){
				// Buttons
				$('#button-page-list').append('<div class="page-click '+((a_Buttons[v_Key]['value']==a_Data['current-page'])?'current-page-button':'button-accent')+'" id="button-page" name="'+a_Buttons[v_Key]['value']+'" onfocus="javascript:this.blur();" style="float:left; margin-right:4px; height:12px; text-align:center; vertical-align:top; width:18px;"><font class="font-G" style="font-weight:bold; font-size:10px; vertical-align:top;">'+a_Buttons[v_Key]['value']+'</font></div>');
			}else{
				// Text
				$('#button-page-list').append('<font class="font-bold font-G" style="float:left; font-size:10px; margin-right:4px; vertical-align:top; text-align:center; width:20px;">'+a_Buttons[v_Key]['value']+'</font>');
			}
		}
	}
	$('#button-page-list').show();
}
/* Function - Show Search Menu */
function F_ShowSearchMenu(v_Area){
	var v_Construct=F_GetConstruct(v_Area);
	F_PopulateDrops(v_Construct,v_Area);
	for(v_Key in A_SearchBox[v_Area]){if(A_SearchBox[v_Area][v_Key]){$('#container-'+v_Key).show();}else{$('#container-'+v_Key).hide();}}
	$('#change-tag-RSS').css({'visibility':((A_SearchBox[v_Area]['change-tag-RSS'])?'visible':'hidden')});
}
/* Function - Shrink */
function F_Shrink(v_Construct){
	F_ClearOpenLine(v_Construct);
	A_Cells[v_Construct]['size']='shrunk';
	F_ToggleMagnifier(v_Construct);
	$('#'+v_Construct).css('height',A_Cells[v_Construct]['shrunk']['construct']['height']).css('width',A_Cells[v_Construct]['shrunk']['construct']['width']);
	$('#'+v_Construct+' #master').css('width',A_Cells[v_Construct]['shrunk']['master']['width']);
	$('#'+v_Construct+' #open-line').css('width',A_Cells[v_Construct]['shrunk']['open-line']['width']).hide();
	$('#'+v_Construct+' #header').css('width',A_Cells[v_Construct]['shrunk']['header']['width']);
	switch(A_Cells[v_Construct]['alias']){
		case 'materials':
			F_EnableImageViewClick();
			break;
		case 'events':
			if($('#month-view-master').data('Settings')){F_ReSizeCalendar(v_Construct,'shrunk');}
			break;
		default:break;
	}
}
/* Function - Shrink Others */
function F_ShrinkOthers(v_Construct){for(var v_Key in A_Cells){if(v_Key!==v_Construct){F_Shrink(v_Key);}}}
/* Function - Store Data */
function F_StoreData(v_Construct,v_Key,a_Data){A_Cells[v_Construct][v_Key]=a_Data;}
/* Function - Toggle Refresh */
function F_ToggleRefresh(v_Construct,v_On){
	if(v_On){
		A_Cells[v_Construct]['refresh-on']=true;
		$('#'+v_Construct+' #stop-refresh').show();
		$('#'+v_Construct+' #auto-refresh').hide();
		F_StartRefresh(v_Construct);
	}else{
		A_Cells[v_Construct]['refresh-on']=false;
		$('#'+v_Construct+' #auto-refresh').show();
		$('#'+v_Construct+' #stop-refresh').hide();
	}
}
/* Function - Start Refresh */
function F_StartRefresh(v_Construct){
	A_Cells[v_Construct]['refresh-counter']++;
	setTimeout('F_Refresh(\''+v_Construct+'\',\''+A_Cells[v_Construct]['refresh-counter']+'\');',A_Cells[v_Construct]['refresh-timer']);
}
/* Function - Refresh */
function F_Refresh(v_Construct,v_Counter){
	if(A_Cells[v_Construct]['refresh-on']){
		if(A_Cells[v_Construct]['refresh-counter']==v_Counter&&A_Cells[v_Construct]['active']){
			F_BlindURL(v_Construct);
			F_StartRefresh(v_Construct);
		}
	}
}
/* Function - Toggle Magnifier */
function F_ToggleMagnifier(v_Construct){
	var v_Size=A_Cells[v_Construct]['size'];
	$('#'+v_Construct+' #'+((v_Size=='shrunk')?'zoom-out':'zoom-in')).hide();
	$('#'+v_Construct+' #'+((v_Size=='shrunk')?'zoom-in':'zoom-out')).fadeTo(0,1.00).show();
}
/* Function - Toggle Size */
function F_ToggleSize(v_Construct){
	if(A_Cells[v_Construct]['size']=='shrunk'){
		F_Expand(v_Construct);
	}else{
		V_Area='home';
		F_HighlightMenu();
		F_Shrink(v_Construct);
		F_ActivateAll();
		F_ShowOthers(v_Construct);
		F_ClearPageButtons();
		F_HidePageButtons();
	}
}
/* Function - Trigger Classes */
function F_TriggerClasses(v_Construct){
	var v_Class='hide-username';
	$('.'+v_Class+':visible').hide();
}
/* Function - Trigger Client Changes */
function F_TriggerClientChanges(a_Changes){for(var v_Key in a_Changes){A_Search[F_GetConstruct(a_Changes[v_Key]['area'])][a_Changes[v_Key]['search']]['value']=a_Changes[v_Key]['value'];}}
/* Function - Trigger Client Triggers */
function F_TriggerClientTriggers(a_Triggers){for(var v_Key in a_Triggers){switch(a_Triggers[v_Key]){
	case 'show-previous-next':$('#show-previous-next').show();break;
	default:break;
}}}
/* Live Event - Add To Search */
$('.add-to-search').live('click',function(){var a_Data=F_ConvertNameToData($(this).attr('name'));F_AddToSearch(a_Data['construct'],a_Data['key'],a_Data['value'],a_Data['text']);return false;});
/* Live Event - Add To All Searches */
$('.add-to-all-searches').live('click',function(){
	var a_Data=F_ConvertNameToData($(this).attr('name'));
	for(var v_Construct in A_Search){for(var v_Key in A_Search[v_Construct]){if(a_Data['key']==v_Key){F_AddToSearch(v_Construct,v_Key,a_Data['value'],a_Data['text']);}}}
	return false;
});
/* Live Event - Auto Refresh Click */
$('.auto-refresh-click').live('click',function(){F_ToggleRefresh($(this).parents('[id|="construct"]').attr('id'),true);});
/* Live Event - Browse Link / Catalog Link / Database Dockable */
$('.browse-link,.catalog-link,.database-dockable').live('click',function(){F_OpenDockable($(this).attr('name'));return false;});
/* Live Event - Close Dockable */
$('.close-dockable').live('click',function(){F_CloseDockable();});
/* Live Event - Drops */
$('.drops:visible').live('mouseover',function(){$(this).fadeTo(0,1.00);});
$('.drops:visible').live('mouseout',function(){$(this).fadeTo(0,0.50);});
$('.drops:visible').live('click',function(){$('#'+$(this).attr('ID')+'-lines').show();});
/* Live Event - Drops Out */
$('.drops-out:visible').live('mouseleave',function(){$(this).hide();});
/* Live Event - Drops Out Top */
$('.drops-out-top:visible').live('mouseleave',function(){$('#'+($(this).attr('ID')).replace('container-','')+'-drops-lines').hide();});
/* Live Event - Featured View Click */
$('.featured-view-click').live('click',function(){F_ChangeFeaturedView($(this).parents('[id|="construct"]').attr('id'),$(this).attr('id').replace(/-view/g,''));});
/* Live Event - Future View Click */
$('.future-view-click').live('click',function(){F_ChangeMonthView($(this).parents('[id|="construct"]').attr('id'),'future');});
/* Live Event - Give Link */
$('.give-link').live('click',function(){return window.open('https://catalog.lapcat.org:443/donate','donate','width=550,height=650,status=yes,scrollbars=yes,resizable');});
/* Live Event - Image View Click */
$('.image-view-click').live('click',function(){F_ChangeView($(this).parents('[id|="construct"]').attr('id'),'image');});
/* Live Event - Line Click */
$('.line-click').live('click',function(){
	var v_Construct=$(this).parents('[id|="construct"]').attr('id');
	V_Area=A_Cells[v_Construct]['alias'];
	F_HighlightMenu();
	var v_LineKey=$(this).attr('name').replace(/counter-/g,'');
	A_Cells[v_Construct]['previous-target']=A_Cells[v_Construct]['target'];
	A_Cells[v_Construct]['target']=v_LineKey;
	if(A_Cells[v_Construct]['size']=='shrunk'){
		F_Expand(v_Construct);
	}else{
		F_HighlightOpenLine(v_Construct);
	}
});
/* Live Event - List View Click */
$('.list-view-click').live('click',function(){F_ChangeView($(this).parents('[id|="construct"]').attr('id'),'list');});
/* Live Event - Magnifier Click */
$('.magnifier-click').live('click',function(){
	var v_Construct=$(this).parents('[id|="construct"]').attr('id');
	F_ToggleSize(v_Construct);
});
/* Live Event - Menu Move Click */
$('.menu-move-click').live('click',function(){
	var v_Area=$(this).attr('id').replace(/menu-/g,'');
	var v_Movement=false;
	var v_PreviousArea=V_Area;
	if(V_Area!==v_Area){v_Movement=true;}
	V_Area=v_Area;
	var v_Construct=F_GetConstruct(V_Area);
	if(v_Movement){if(V_Area!=='home'){F_ToggleSize(v_Construct);}else{F_ToggleSize(F_GetConstruct(v_PreviousArea));}}
	F_ShowSearchMenu(v_Area);
});
/* Live Event - Month View Click */
$('.month-view-click').live('click',function(){F_ChangeMonthView($(this).parents('[id|="construct"]').attr('id'),'month');});
/* Live Event - Name Hover */
$('.name-hover').live('mouseover',function(){
	$('#message-text').html('<font class="font-G" style="font-size:12px;">'+$(this).attr('name')+'</font>').css('height','auto').css('width','auto');
	$('#message-box').css('top',($(this).position().top)+98).css('left',($(this).position().left)+20).show();
});
/* Live Event - Next Materials */
$('.next-materials').live('click',function(){
	var v_Construct=F_GetConstruct('materials');
	var v_CurrentKey=A_Search[v_Construct]['type']['value']
	var v_NextKey=0;
	if(v_CurrentKey==75){v_NextKey=1;}else{var v_Break=false;for(var v_Key in A_Drops['materials']['type']){v_NextKey=v_Key;if(v_Break){break;}if(v_Key==v_CurrentKey){v_Break=true;}}}
	F_AddToSearch(v_Construct,'type',v_NextKey,A_Drops['materials']['type'][v_NextKey]['name']);
});
/* Live Event - Previous Materials */
$('.previous-materials').live('click',function(){
	var v_Construct=F_GetConstruct('materials');
	var v_CurrentKey=A_Search[v_Construct]['type']['value']
	var v_PreviousKey=0;
	if(v_CurrentKey==1){v_PreviousKey=75;}else{for(var v_Key in A_Drops['materials']['type']){if(v_Key==v_CurrentKey){break;}v_PreviousKey=v_Key;}}
	F_AddToSearch(v_Construct,'type',v_PreviousKey,A_Drops['materials']['type'][v_PreviousKey]['name']);
});
/* Live Event - Remove From All Searches */
$('.remove-from-all-searches').live('click',function(){
	for(var v_Construct in A_Search){for(var v_Key in A_Search[v_Construct]){F_RemoveFromSearch(v_Construct,v_Key);}}
	return false;
});
/* Live Event - Remove Search Click */
$('.remove-search-click').live('click',function(){
	var v_Construct=$(this).parents('[id|="construct"]').attr('id');
	var v_Key=$(this).attr('id').replace('search-on-','');
	$('#'+v_Construct+' #search-on-'+v_Key).hide();
	F_RemoveFromSearch(v_Construct,v_Key);
});
/* Live Event - Show Cover */
$('.show-cover').live('mouseover',function(v_XY){
	$('#message-text').html($(this).clone().removeClass('show-cover').css('height','auto').css('width','auto'));
	$('#message-box').css('top',($(this).position().top)+118).css('left',($(this).position().left)+36).show();
});
/* Live Event - Show Cover / Name Hover */
$('.show-cover,.name-hover').live('mouseout',function(){$('#message-box').hide();});
/* Live Event - Stop Refresh Click */
$('.stop-refresh-click').live('click',function(){F_ToggleRefresh($(this).parents('[id|="construct"]').attr('id'),false);});
/* Live Event - Tag Box */
$('.tag-box').live('keyup',function(){if($(this).attr('value').length>0){$('#change-tag-drops-lines').show();F_PopulateAutoDrop($(this).attr('value'))}else{$('#change-tag-drops-lines').hide();}});
/* Function - Populate Auto Drop */
function F_PopulateAutoDrop(v_Value){$('#change-tag-drops-lines').html('');var v_Pass=false;for(var v_LineKey in A_Tags){if(v_Value==A_Tags[v_LineKey]['name'].substr(0,v_Value.length)){v_Pass=true;$('#change-tag-drops-lines').append('<div class="effect-hover-Z-2 fake-link add-to-all-searches" id="value-'+A_Tags[v_LineKey]['ID']+'" name="key|tag_value|'+A_Tags[v_LineKey]['ID']+'_text|'+A_Tags[v_LineKey]['name']+'" style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;">'+A_Tags[v_LineKey]['name']+'</div>');}}if(!v_Pass){$('#change-tag-drops-lines').html('<div style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;"><font class="font-H">No Results</font></div>');}}
/* Live Event - Text */
$(':text').live('click',function(){$(this).select();$(this).focus();});