// LAPCAT - Client
// 2010-02-03
var A_Areas={
	'home':{'change-tag':true,'change-tag-RSS':false,'change-popular':true,'change-search':false,'change-sort':false,'date-selector':false},
	'news':{'change-tag':true,'change-tag-RSS':true,'change-popular':true,'change-search':false,'change-sort':true,'date-selector':false},
	'events':{'change-tag':true,'change-tag-RSS':true,'change-popular':true,'change-search':true,'change-sort':true,'date-selector':true},
	'materials':{'change-tag':true,'change-tag-RSS':true,'change-popular':true,'change-search':false,'change-sort':false,'date-selector':false},
	'databases':{'change-tag':true,'change-tag-RSS':false,'change-popular':true,'change-search':false,'change-sort':true,'date-selector':false},
	'hours':{'change-tag':false,'change-tag-RSS':false,'change-popular':false,'change-search':false,'change-sort':false,'date-selector':false},
	'hiring':{'change-tag':false,'change-tag-RSS':false,'change-popular':false,'change-search':false,'change-sort':false,'date-selector':false}
};
var A_Cells={
	'construct-1':{
		'alias':'materials',
		'blind-URL':'/fresh/materials/suggest',
		'cover-images':true,
		'data':{},
		'expanded':{'construct':{'height':'auto','width':'812px'},'master':{'height':'auto','width':'400px'},'open-line':{'height':'auto','width':'412px'}},
		'failed':false,
		'header':'',
		'image-view':100,
		'list-view':400,
		'future-view':0,
		'page':{},
		'previous-target':0,
		'shrunk':{'construct':{'height':'205px','width':'812px'},'master':{'height':'auto','width':'812px'},'open-line':{'height':'auto','width':'auto'}},
		'size':'shrunk',
		'target':0,
		'view':'list'
	},
	'construct-2':{
		'alias':'events',
		'blind-URL':'/fresh/events/suggest',
		'cover-images':false,
		'data':{},
		'expanded':{'construct':{'height':'500px','width':'812px'},'master':{'height':'auto','width':'400px'},'open-line':{'height':'auto','width':'412px'}},
		'failed':false,
		'header':'',
		'image-view':0,
		'list-view':0,
		'future-view':200,
		'page':{},
		'previous-target':0,
		'shrunk':{'construct':{'height':'296px','width':'302px'},'master':{'height':'auto','width':'302px'},'open-line':{'height':'auto','width':'auto'}},
		'size':'shrunk',
		'target':0,
		'view':'future'
	},
	'construct-3':{
		'alias':'news',
		'blind-URL':'/fresh/news/suggest',
		'cover-images':false,
		'data':{},
		'expanded':{'construct':{'height':'500px','width':'812px'},'master':{'height':'auto','width':'400px'},'open-line':{'height':'auto','width':'412px'}},
		'failed':false,
		'header':'',
		'image-view':0,
		'list-view':300,
		'future-view':0,
		'page':{},
		'previous-target':0,
		'shrunk':{'construct':{'height':'296px','width':'302px'},'master':{'height':'auto','width':'302px'},'open-line':{'height':'auto','width':'auto'}},
		'size':'shrunk',
		'target':0,
		'view':'list'
	}
};
var A_Drops={
	'home':{
		'popular':{}
	},
	'news':{
		'sort':{
			0:{'name':'Date','value':0},
			1:{'name':'A-Z','value':1},
			2:{'name':'Z-A','value':2}
        }
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
			8:{'name':'Mobile Library','value':8}
		},
        'sort':{
			0:{'name':'Date','value':0},
			1:{'name':'Anticipation','value':1},
			2:{'name':'A-Z','value':2},
			3:{'name':'Z-A','value':3}
        }
	},
	'materials':{
		'search':{
			0:{'name':'All Materials','value':0},
			1:{'name':'Books','value':1},
			2:{'name':'Music','value':2},
			3:{'name':'Movies','value':3},
			4:{'name':'Video Games','value':4},
			5:{'name':'Television Shows','value':5},
			23:{'name':'Audio Books','value':23},
			32:{'name':'Graphic Novels','value':32},
			50:{'name':'Large Print Books','value':50},
			75:{'name':'Digital Audio Players','value':75},
			24:{'name':'Downloadable Books','value':24},
			159:{'name':'Downloadable Audio Books','value':159}
		},
        'sort':{
			0:{'name':'Year','value':0},
			1:{'name':'Rating','value':1},
			2:{'name':'A-Z','value':2},
			3:{'name':'Z-A','value':3}
        }
	},
	'databases':{
        'sort':{
			0:{'name':'A-Z','value':0},
			1:{'name':'Z-A','value':1}
        }
	}
};
var A_Search={
	'date':{
		'on':false,
		'text':'',
		'words':''
	},
	'month-view':false,
	'expand':false,
	'similar':false,
	'search':{
		'on':false,
		'text':'',
		'value':0
	},
	'sort':{
		'on':false,
		'text':'',
		'value':0
	},
	'popular':{
		'on':false,
		'current':{
			'ID':0,
			'name':''
		}
	},
	'tag':{
		'on':false,
		'current':{
			'ID':0,
			'name':''
		},
		'previous':{
			'ID':0,
			'name':''
		}
	}
};
function F_ClearNonTagSearches(){
	for(var v_Key in A_Search){
		switch(v_Key){
			case 'date':F_RemoveDateSearch();break;
			case 'search':F_RemoveSearchSearch();break;
			case 'sort':F_RemoveSortSearch();break;
			default:break;
		}
	}
}
function F_ArrayKeyExists(v_Key,a_Array){for(var v_ArrayKey in a_Array){if(v_ArrayKey==v_Key){return true;}}return false;}
var A_User={
	'logged-in':false
};
var V_Area='home';
var V_HomeLibrary=0;
$(document).ready(function(){
	F_ShowLoader();
	F_HighlightMenu();
	F_BlindRequest('construct-1');
	F_BlindRequest('construct-2');
	F_BlindRequest('construct-3');
	F_HidePageButtons();
	F_RequestPopularTags();
	F_ShowSearchMenu(V_Area);
	$('.drops').fadeTo(0,0.50);
	F_InitializeMonthView();
});
$('.name-hover').live('mouseover',function(){
	$('#message-text').html('<font class="font-X" style="font-size:12px;">'+$(this).attr('name')+'</font>').css('height','auto').css('width','auto');
	$('#message-box').css('top',($(this).position().top)+98).css('left',($(this).position().left)+20).show();
});
$('.specific-click').live('click',function(){
	var a_Data=$(this).attr('id').split('-');
	var v_Construct=$(this).parents('[id|="construct"]').attr('id');
	if(a_Data[0]=='cs'){
		if(V_Area=='events'){
			
		}
	}else{
		var v_Counter=$(this).attr('name').replace('specific-','');
		A_Cells[v_Construct]['previous-target']=A_Cells[v_Construct]['target'];
		A_Cells[v_Construct]['target']=v_Counter;
		F_LineClick(v_Construct);
	}
});
function F_InitializeMonthView(){
	$('#month-view-master').dateter({
		'displayHeader':true,
		'pastDayShadeClass':'background-alpha-4 font-I',
		'height':parseInt(A_Cells['construct-2']['shrunk']['construct']['height'])-20,
		'borderRoundClass':'corners-top-2 corners-bottom-2 name-hover specific-click',
		'highLightSize':'10px',
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
		function(v_Month,v_Day,v_Year){
			//F_AddDateSearch(v_Year+'-'+v_Month+'-'+v_Day);
			//A_Displays[V_Area].F_MakeRequest('date');
			//F_ToggleMonthView();
		},
		function(v_Month,v_Day,v_Year){
			$.getJSON('/quick/request-view/'+v_Year+'-'+v_Month+'-1',function(o_JSON){
				//a_Data['calendar']=$.extend(true,a_Data['calendar'],o_JSON['calendar']);
				//$('#stage-month-view').data('Settings').daysToHighlight=a_Data['calendar'];
				$('#month-view-master').data('Settings').daysToHighlight=o_JSON['calendar'];
			});
		});
}
function F_ShowSearchMenu(v_Alias){
	F_PopulateDrops(v_Alias);
	for(v_Key in A_Areas[v_Alias]){if(A_Areas[v_Alias][v_Key]){$('#container-'+v_Key).show();}else{$('#container-'+v_Key).hide();}}
	$('#change-tag-RSS').css({'visibility':((A_Areas[v_Alias]['change-tag-RSS'])?'visible':'hidden')});
}
function F_OpenDockable(v_URL){
	$('#dockable-close-link').show();
	if(!A_User['logged-in']){$('#user-access').css('visibility','hidden');}
	$('#dockable-window').css({'visibility':'visible'});
	$('#dockable-content').css({'visibility':'visible'});
	$('#dockable-content').attr('src',v_URL);
}
$('.browse-link,.catalog-link,.database-dockable').live('click',function(){F_OpenDockable($(this).attr('name'));return false;});
$('.give-link').live('click',function(){return window.open('https://catalog.lapcat.org:443/donate','donate','width=550,height=650,status=yes,scrollbars=yes,resizable');});
$('.line-click').live('click',function(){
	var v_Construct=$(this).parents('[id|="construct"]').attr('id');
	V_Area=A_Cells[v_Construct]['alias'];
	F_HighlightMenu();
	var v_LineKey=$(this).attr('name').replace(/counter-/g,'');
	A_Cells[v_Construct]['previous-target']=A_Cells[v_Construct]['target'];
	A_Cells[v_Construct]['target']=v_LineKey;
	F_LineClick(v_Construct);
});
$('.menu-move-click').live('click',function(){
	var v_Area=$(this).attr('id').replace(/menu-/g,'');
	var v_Movement=false;
	var v_PreviousArea=V_Area;
	if(V_Area!==v_Area){F_ClearNonTagSearches();v_Movement=true;}
	V_Area=v_Area;
	var v_ConstructKey=F_GetConstructKey(V_Area);
	if(v_Movement){if(V_Area!=='home'){F_ToggleSize(v_ConstructKey);}else{F_ToggleSize(F_GetConstructKey(v_PreviousArea));}}
	F_ShowSearchMenu(v_Area);
});
function F_CapitalizeWord(v_Word){return v_Word.charAt(0).toUpperCase()+v_Word.slice(1);}
function F_GetConstructKey(v_Area){for(var v_Key in A_Cells){if(A_Cells[v_Key]['alias']==v_Area){return v_Key;}}}
$('.show-cover,.name-hover').live('mouseout',function(){$('#message-box').hide();});
$('.show-cover').live('mouseover',function(v_XY){
	$('#message-text').html($(this).clone().removeClass('show-cover').css('height','auto').css('width','auto'));
	$('#message-box').css('top',($(this).position().top)+118).css('left',($(this).position().left)+36).show();
});
$('.list-view-click').live('click',function(){F_ChangeView($(this).parents('[id|="construct"]').attr('id'),'list');});
$('.future-view-click').live('click',function(){F_ChangeMonthView($(this).parents('[id|="construct"]').attr('id'),'future');});
$('.month-view-click').live('click',function(){F_ChangeMonthView($(this).parents('[id|="construct"]').attr('id'),'month');});
$('.magnifier-click').live('click',function(){F_ToggleSize($(this).parents('[id|="construct"]').attr('id'));});
function F_BlindRequest(v_Construct){
	$.getJSON(A_Cells[v_Construct]['blind-URL'],function(o_JSON){
		F_HideLoader();
		$('[id="master-header"]').show();
		switch(o_JSON['switch']){
			case 'failed':
				A_Cells[v_Construct]['failed']=true;
				F_StoreData(v_Construct,'header',o_JSON['header']);
				F_ApplyEmptyDisplay(v_Construct);
				break;
			case 'data':
				var v_HTML='';
				A_Cells[v_Construct]['failed']=false;
				F_StoreData(v_Construct,'header',o_JSON['header']);
				F_StoreData(v_Construct,'page',o_JSON['page']);
				F_StoreData(v_Construct,'data',o_JSON['data']);
				F_AddHeader(v_Construct);
				F_ClearMaster(v_Construct);
				switch(A_Cells[v_Construct]['alias']){
					case 'events':
						F_AddLines(v_Construct,'future',false);
						break;
					case 'materials':case 'news':
						F_AddLines(v_Construct,'list',false);
						if(A_Cells[v_Construct]['image-view']>0){F_AddLines(v_Construct,'image',true);}
						break;
					default:break;
				}
				F_HighlightOpenLine(v_Construct);
				if(V_Area=='home'){
					F_Shrink(v_Construct);
					F_ShowConstruct(v_Construct);
				}else{
					if(A_Cells[v_Construct]['alias']==V_Area){F_Expand(v_Construct);}
				}
				$('#'+v_Construct+' #icons').show();
				$('#'+v_Construct+' #failed-master').hide();
				$('#'+v_Construct+' #master').show();
				F_ShowHomeLibraries();
				$('[id="master"]').show();
				break;
			default:break;
		}
	});
}
function F_DisableImageViewClick(v_Construct){
	if(A_Cells[v_Construct]['view']=='image'){F_ChangeView(v_Construct,'list');}
	$('.auto-refresh-click').die('click');
	$('.image-view-click').die('click');
	$('.stop-refresh-click').die('click');
	$('#auto-refresh:visible').fadeTo(0,0.35);
	$('#image-view:visible').fadeTo(0,0.35);
	$('#stop-refresh:visible').fadeTo(0,0.35);
}
function F_ToggleRefresh(v_On){if(v_On){$('#stop-refresh').show();$('#auto-refresh').hide();}else{$('#auto-refresh').show();$('#stop-refresh').hide();}}
$(':text').live('click',function(){$(this).select();$(this).focus();});
$('.drops:visible').live('mouseover',function(){$(this).fadeTo(0,1.00);});
$('.drops:visible').live('mouseout',function(){$(this).fadeTo(0,0.50);});
$('.drops:visible').live('click',function(){$('#'+$(this).attr('ID')+'-lines').show();});
$('.drops-out-top:visible').live('mouseleave',function(){$('#'+($(this).attr('ID')).replace('container-','')+'-drops-lines').hide();});
$('.drops-out:visible').live('mouseleave',function(){$(this).hide();});
$('.page-click').live('click',function(){F_MakeRequest('page',$(this).attr('name'));});

$('.auto-refresh-click').live('click',function(){F_ToggleRefresh(true);});
$('.image-view-click').live('click',function(){F_ChangeView($(this).parents('[id|="construct"]').attr('id'),'image');});
$('.stop-refresh-click').live('click',function(){F_ToggleRefresh(false);});
function F_EnableImageViewClick(){
	$('#auto-refresh:visible').fadeTo(0,1.00);
	$('#image-view:visible').fadeTo(0,1.00);
	$('#stop-refresh:visible').fadeTo(0,1.00);
	$('.auto-refresh-click').die('click');
	$('.image-view-click').die('click');
	$('.stop-refresh-click').die('click');
	$('.auto-refresh-click').live('click',function(){F_ToggleRefresh(true);});
	$('.image-view-click').live('click',function(){F_ChangeView($(this).parents('[id|="construct"]').attr('id'),'image');});
	$('.stop-refresh-click').live('click',function(){F_ToggleRefresh(false);});
}

function F_ClearOpenLine(v_Construct){$('#'+v_Construct+' #open-line').html('');}
function F_AddOpenLine(v_Construct){
	$('#'+v_Construct+' #open-line').html(F_ConstructAndReplace(F_CopyHTML('stage-'+A_Cells[v_Construct]['alias']+'-content'),F_GetLine(v_Construct,'data',A_Cells[v_Construct]['target'])));
	F_HighlightOpenLine(v_Construct);
}
function F_AddHeader(v_Construct){$('#'+v_Construct+' #header').html(A_Cells[v_Construct]['header']).show();}
function F_ChangeMonthView(v_Construct,v_View){
	if(v_View=='future'){$('#button-page-list').show();}else{$('#button-page-list').hide();}
	A_Cells[v_Construct]['view']=v_View;
	$('#'+v_Construct+((v_View=='future')?' #month-view-master':' #master')).hide();
	$('#'+v_Construct+((v_View=='future')?' #master':' #month-view-master')).show();
	$('#'+((v_View=='future')?'future':'month')+'-view').hide();
	$('#'+((v_View=='future')?'month':'future')+'-view').fadeTo(0,1.00).show();
}
function F_ChangeView(v_Construct,v_View){
	A_Cells[v_Construct]['view']=v_View;
	$('#'+v_Construct+((v_View=='list')?' #image-view-master':' #master')).hide();
	$('#'+v_Construct+((v_View=='list')?' #master':' #image-view-master')).show();
	F_HighlightOpenLine(v_Construct);
	$('#'+((v_View=='list')?'list':'image')+'-view').hide();
	$('#'+((v_View=='list')?'image':'list')+'-view').fadeTo(0,1.00).show();
}
function F_ConstructAndReplace(v_HTML,a_Data){for(var v_Key in a_Data){while(v_HTML.indexOf('replace-'+v_Key)>-1){v_HTML=v_HTML.replace('replace-'+v_Key,a_Data[v_Key]);}}return v_HTML;};
function F_Clean(v_Data){return v_Data.replace(/\\'/g,'\'').replace(/\\"/g,'"').replace(/\\0/g,'\0').replace(/\\\\/g,'\\');} 
function F_ClearMaster(v_Construct){$('#'+v_Construct+' #master').html('');}
function F_CopyHTML(v_Element){return $('#'+v_Element).html();}
function F_Expand(v_Construct){
	V_Area=A_Cells[v_Construct]['alias'];
	F_HighlightMenu();
	F_HighlightOpenLine(v_Construct);
	F_HideOthers(v_Construct);
	F_ShowConstruct(v_Construct);
	switch(V_Area){
		case 'events':
			if(A_Cells[v_Construct]['view']=='month'){$('#button-page-list').hide();}
			F_ReSizeCalendar(v_Construct,'expanded');
			break;
		case 'materials':
			F_DisableImageViewClick(v_Construct);
			break;
		default:break;
	}
	if(A_Cells[v_Construct]['failed']){
		$('#button-page-list').hide();
	}else{
		F_ShowPageButtons(v_Construct);
	}
	F_ShrinkOthers(v_Construct);
	A_Cells[v_Construct]['size']='expanded';
	$('#'+v_Construct).css('height',A_Cells[v_Construct]['expanded']['construct']['height']).css('width',A_Cells[v_Construct]['expanded']['construct']['width']);
	$('#'+v_Construct+' #master').css('width',A_Cells[v_Construct]['expanded']['master']['width']);
	$('#'+v_Construct+' #open-line').css('width',A_Cells[v_Construct]['expanded']['open-line']['width']).show();
}
function F_ReSizeCalendar(v_Construct,v_Size){$.fn.dateter.resize(parseInt(A_Cells[v_Construct][v_Size]['construct']['height'])-50,$('#month-view-master'));}
function F_GetData(v_Construct,v_Name){return A_Cells[v_Construct][v_Name];}
function F_GetLine(v_Construct,v_Name,v_LineKey){return A_Cells[v_Construct][v_Name][v_LineKey];}
function F_HighlightOpenLine(v_Construct){$('#'+v_Construct+' .open-line:visible').removeClass('open-line');$('#'+v_Construct+' [name="counter-'+(A_Cells[v_Construct]['target'])+'"]').addClass('open-line');}
function F_HighlightMenu(){$('.menu-highlight').removeClass('menu-highlight').addClass('menu-normal');$('#menu-'+V_Area).removeClass('menu-normal').addClass('menu-highlight');}
function F_LineClick(v_Construct){if(A_Cells[v_Construct]['size']=='shrunk'){F_Expand(v_Construct);}F_AddOpenLine(v_Construct);}
function F_FadeInConstruct(v_Construct){$('#'+v_Construct).fadeIn('fast');}
function F_Shrink(v_Construct){
	F_ClearOpenLine(v_Construct);
	A_Cells[v_Construct]['size']='shrunk';
	$('#'+v_Construct).css('height',A_Cells[v_Construct]['shrunk']['construct']['height']).css('width',A_Cells[v_Construct]['shrunk']['construct']['width']);
	$('#'+v_Construct+' #master').css('width',A_Cells[v_Construct]['shrunk']['master']['width']);
	$('#'+v_Construct+' #open-line').css('width',A_Cells[v_Construct]['shrunk']['open-line']['width']).show();
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
function F_ShrinkOthers(v_Construct){for(var v_Key in A_Cells){if(v_Key!==v_Construct){F_Shrink(v_Key);}}}
function F_HideConstruct(v_Construct){$('#'+v_Construct).hide();}
function F_HideLoader(){$('#loader').hide();}
function F_HideOthers(v_Construct){for(var v_Key in A_Cells){if(v_Key!==v_Construct){F_HideConstruct(v_Key);}}}
function F_ClearPageButtons(){$('#button-page-list').html('');}
function F_HidePageButtons(){$('#button-page-list').hide();}
function F_PopulateDrops(v_Alias,v_Specific,v_DropKey){var v_Pass=false;if(A_Drops[v_Alias]){for(var v_DropType in A_Drops[v_Alias]){v_Pass=false;if(v_Specific){if(v_DropType!=v_DropKey){break;}}$('#change-'+v_DropType+'-drops-lines').html('');for(var v_LineKey in A_Drops[v_Alias][v_DropType]){v_Pass=true;$('#change-'+v_DropType+'-drops-lines').append('<div class="'+v_DropType+'-change fake-link effect-hover-Z-2" id="value-'+A_Drops[v_Alias][v_DropType][v_LineKey]['value']+'" style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;">'+A_Drops[v_Alias][v_DropType][v_LineKey]['name']+'</div>');}switch(v_DropType){case 'popular':var v_DefaultPopular=0;for(var v_Key in A_Drops[v_Alias]['popular']){v_DefaultPopular=v_Key;break;}if(A_Search['popular']['current']['ID']>0){v_DefaultPopular=A_Search['popular']['current']['ID'];}$('#change-popular-master').html(((v_DefaultPopular>0)?A_Drops[v_Alias]['popular'][v_DefaultPopular]['name']:'empty'));break;case 'search':case 'sort':$('#change-'+v_DropType+'-master').html(A_Drops[v_Alias][v_DropType][A_Search[v_DropType]['value']]['name']);break;default:break;}if(!v_Pass){$('#change-'+v_DropType+'-drops-lines').html('<div style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;"><font class="font-H">No Results</font></div>');}}}}
function F_PopulateAutoDrop(v_Value){$('#change-tag-drops-lines').html('');var v_Pass=false;for(var v_LineKey in A_Tags){if(v_Value==A_Tags[v_LineKey]['name'].substr(0,v_Value.length)){v_Pass=true;$('#change-tag-drops-lines').append('<div class="effect-hover-Z-2 fake-link tag-change" id="value-'+A_Tags[v_LineKey]['ID']+'" name="tag/drop" style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;">'+A_Tags[v_LineKey]['name']+'</div>');}}if(!v_Pass){$('#change-tag-drops-lines').html('<div style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;"><font class="font-H">No Results</font></div>');}}
function F_RequestPopularTags(){$.getJSON('/quick/popular-tags',function(o_JSON){if(!o_JSON['failed']){F_SetPopularTags(o_JSON);}});}
function F_SetPopularTags(o_JSON){for(var v_Tag in o_JSON['data']){A_Drops['home']['popular'][o_JSON['data'][v_Tag]['ID']]={'name':o_JSON['data'][v_Tag]['name'],'value':o_JSON['data'][v_Tag]['ID']};}F_PopulateDrops('home',true,'popular');}
function F_ShowConstruct(v_Construct){$('#'+v_Construct).show();}
function F_ShowHomeLibraries(){$('[name="library-'+V_HomeLibrary+'"]').removeClass('library-link-1').addClass('library-link-3 font-M');}
function F_ShowLoader(){$('#loader').show();}
function F_ShowOthers(v_Construct){for(var v_Key in A_Cells){if(v_Key!==v_Construct){F_ShowConstruct(v_Key);}}}
function F_StoreData(v_Construct,v_Key,a_Data){A_Cells[v_Construct][v_Key]=a_Data;}
function F_ToggleSize(v_Construct){if(A_Cells[v_Construct]['size']=='shrunk'){F_ShowPageButtons(v_Construct);F_Expand(v_Construct);}else{V_Area='home';F_HighlightMenu();F_Shrink(v_Construct);F_ShowOthers(v_Construct);F_ClearPageButtons();F_HidePageButtons();}}
function F_ShowPageButtons(v_Construct){
	var a_Data=F_GetData(v_Construct,'page');
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
function F_AddLines(v_Construct,v_View,v_StoreInViewHolder){
	var a_Data=F_GetData(v_Construct,'data');
	var a_Images=Array();
	var v_HTML='';
	for(var v_Key in a_Data){
		v_HTML+='<table cellpadding="0" cellspacing="0" id="line-'+v_Key+'" style="float:left; height:42px; width:'+((v_View=='list'||v_View=='future')?'100%':'auto')+';"><tr>';
		if(A_Cells[v_Construct]['cover-images']){
			if(v_View=='list'||v_View=='future'){v_HTML+='<td style="width:38px;"><div class="float-left" style="margin-right:2px; margin-top:4px; min-width:38px; text-align:center; width:38px;"><img class="show-cover" id="'+v_View+'-view-cover-'+v_Key+'" /></div></td><td style="width:auto;">';}else{v_HTML+='<td style="width:auto;">';}
			a_Images[v_Key]=new Image();
			a_Images[v_Key].src='http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=S&Value='+a_Data[v_Key]['ISBNorSN'];
			a_Images[v_Key].alt=v_View+'-view-cover-'+v_Key;
			a_Images[v_Key].onload=function(){
				if(this.height>1){
					var v_Width=this.width;
					var v_Height=this.height;
					if(v_View=='list'){
						var v_Counter=19;
						while(v_Width>=36||v_Height>=42){
							v_Width=Math.floor(this.width*(0.05*v_Counter));v_Counter--;
							v_Height=Math.floor(this.height*(0.05*v_Counter));v_Counter--;
						}
					}
					$('#'+this.alt).css('height',v_Height+'px');
					$('#'+this.alt).css('width',v_Width+'px');
					$('#'+this.alt).attr('src',this.src);
				}
			}
		}else{v_HTML+='<td style="width:auto;">';}
		v_HTML+=F_ConstructAndReplace(F_CopyHTML('line-HTML-'+A_Cells[v_Construct][v_View+'-view']),a_Data[v_Key])+'</td></tr></table>';
	}
	if(v_StoreInViewHolder){$('#'+v_Construct+' #'+v_View+'-view-master').html(v_HTML);}else{$('#'+v_Construct+' #master').html(v_HTML);}
}
$('.popular-change').live('click',function(){var v_Value=parseInt($(this).attr('ID').replace('value-',''));var v_Text=$(this).html();F_ChangePopularSearch(v_Value,v_Text);});
$('.remove-date').live('click',function(){F_ChangeDateSearch(0);});
$('.remove-popular').live('click',function(){F_ChangePopularSearch(0);});
$('.remove-search').live('click',function(){F_ChangeSearchSearch(0);});
$('.remove-sort').live('click',function(){F_ChangeSortSearch(0);});
$('.remove-tag').live('click',function(){F_ChangeTagSearch(0);});
$('.search-change').live('click',function(){var v_Value=parseInt($(this).attr('ID').replace('value-',''));var v_Text=$(this).html();F_ChangeSearchSearch(v_Value,v_Text);return false;});
$('.sort-change').live('click',function(){var v_Value=parseInt($(this).attr('ID').replace('value-',''));var v_Text=$(this).html();F_ChangeSortSearch(v_Value,v_Text);return false;});
$('.tag-box').live('keyup',function(){if($(this).attr('value').length>0){$('#change-tag-drops-lines').show();F_PopulateAutoDrop($(this).attr('value'))}else{$('#change-tag-drops-lines').hide();}});
$('.tag-change').live('click',function(){var v_Value=parseInt($(this).attr('ID').replace('value-',''));var v_Text=$(this).html();F_ChangeTagSearch(v_Value,v_Text);return false;});
function F_MakeRequest(v_Request,v_Optional){
	$('[id="master-header"]').hide();
	$('[name="construct-views"]').hide();
	F_ShowLoader();
	switch(v_Request){
		case 'search':case 'sort':case 'page':
			if(V_Area=='home'){return;}
			var v_Construct=F_GetConstructKey(V_Area);
			A_Cells[v_Construct]['blind-URL']='quick/'+V_Area+'/change-'+v_Request+'/'+v_Optional;
			F_BlindRequest(v_Construct);
			break;
		case 'popular':case 'tag':
			F_RequestAll(v_Request,v_Optional);
			break;
		default:alert(v_Request+', '+v_Optional);break;
	}
}
function F_RequestAll(v_Request,v_Optional){
	for(var v_Key in A_Cells){
		switch(v_Request){
			case 'tag':case 'popular':
				A_Cells[v_Key]['blind-URL']='quick/'+A_Cells[v_Key]['alias']+'/change-'+v_Request+'/'+v_Optional;
				F_BlindRequest(v_Key);
				break;
			default:break;
		}
	}
}
function F_ApplyEmptyDisplay(v_Construct){
	$('#'+v_Construct+' [name="construct-views"]').hide();
	$('#'+v_Construct+' #header').html('No results.').show();
	$('#'+v_Construct+' #icons').hide();
	$('#change-tag-RSS:visible').attr('title','');
	var v_HTML='<font class="font-italic font-X" style="font-size:12px; margin-left:4px;">There are no '+A_Cells[v_Construct]['alias']+' that match the following search:</font><br/><font class="font-X" style="font-size:14px; margin-left:12px;">'+A_Cells[v_Construct]['header']+'</font><br/><font class="font-italic font-X" style="font-size:12px; margin-left:4px; margin-top:3px;">Suggestions:</font>';
	if(A_Search['tag']['on']){
		v_HTML+='<br/><font class="font-G" style="font-size:14px; margin-left:12px;">Search the catalog for <span class="catalog-link fake-link" name="http://catalog.lapcat.org/search/X?SEARCH='+A_Search['tag']['current']['text']+'&SORT=D&searchscope=12" ID="'+A_Search['tag']['current']['ID']+'">'+A_Search['tag']['current']['text']+'</span>.</font>';
		v_HTML+='<br/><a class="font-G remove-tag fake-link" name="tag/drop" style="font-size:14px; margin-left:12px; text-decoration:underline;">Remove</a><font class="font-G" style="font-size:14px;"> (<font class="font-G" style="font-size:12px; font-style:italic;">'+A_Search['tag']['current']['text']+'</font>) from this search.</font>';
	}else if(A_Search['popular']['on']){
		v_HTML+='<br/><font class="font-G" style="font-size:14px; margin-left:12px;">Search the catalog for <span class="catalog-link fake-link" name="http://catalog.lapcat.org/search/X?SEARCH='+A_Search['popular']['current']['text']+'&SORT=D&searchscope=12" ID="'+A_Search['popular']['current']['ID']+'">'+A_Search['popular']['current']['text']+'</span>.</font>';
		v_HTML+='<br/><a class="font-G remove-tag fake-link" name="tag/drop" style="font-size:14px; margin-left:12px; text-decoration:underline;">Remove</a><font class="font-G" style="font-size:14px;"> (<font class="font-G" style="font-size:12px; font-style:italic;">'+A_Search['popular']['current']['text']+'</font>) from this search.</font>';
	}
	if(F_HasSearchCriteria()){v_HTML+='<br/><a class="simple-click fake-link font-G" ID="button-reset" style="font-size:14px; margin-left:12px; text-decoration:underline;">Reset</a><font class="font-G" style="font-size:14px;"> this search.</font>';}
	v_HTML+='</font>';
	$('#'+v_Construct+' #failed-master').html(v_HTML).show();
}
function F_HasSearchCriteria(){var v_Counter=0;for(var v_SearchKey in A_Search){if(A_Search[v_SearchKey]['on']){v_Counter++;}}if(v_Counter>0){return true;}return false;}
//
// Function - Add Popular Search
function F_AddPopularSearch(v_Value,v_Text){A_Search['popular']={'on':true,'current':{'ID':v_Value,'text':v_Text}};$('#change-popular-master').html(v_Text);$('#popular-selected').show();}
//
// Function - Add Date Search
function F_AddDateSearch(v_Text,v_Words){A_Search['date']={'on':true,'text':v_Text,'words':v_Words};$('#change-date-master').html(v_Text);$('#date-selected').show();}
//
// Function - Add Search Search
function F_AddSearchSearch(v_Value,v_Text){A_Search['search']={'on':true,'text':v_Text,'value':v_Value};$('#search-selected').show();}
//
// Function - Add Sort Search
function F_AddSortSearch(v_Value,v_Text){A_Search['sort']={'on':true,'text':v_Text,'value':v_Value};$('#sort-selected').show();}
//
// Function - Add Tag Search
function F_AddTagSearch(v_Value,v_Text){A_Search['tag']={'on':true,'previous':A_Search['tag']['current'],'current':{'ID':v_Value,'text':v_Text}};$('#change-tag-master').attr('value',v_Text);$('#tag-selected').show();}
//
// Function - Change Popular Search
function F_ChangePopularSearch(v_Value,v_Text){$('#change-popular-drops-lines').hide();if(v_Value>0){F_AddPopularSearch(v_Value,v_Text);if(A_Search['tag']['on']){F_RemoveTagSearch();}F_MakeRequest('popular',v_Value);if(V_Area=='home'){F_RequestPopularTags();}}else{F_RemovePopularSearch();F_MakeRequest('popular',v_Value);}}
//
// Function - Change Date Search
function F_ChangeDateSearch(v_Value,v_Text){if(v_Value>0){F_AddDateSearch(v_Value,v_Text);$('#change-date-master').html(v_Text);}else{F_RemoveDateSearch();}F_MakeRequest('date',v_Value);}
//
// Function - Change Expand
function F_ChangeExpand(){if(A_Search['expand']){A_Search['expand']=false;$('#list-cells').show();F_ToggleOption('expand',false);}else{A_Search['expand']=true;$('#list-cells').hide();F_ToggleOption('expand',true);}}
//
// Function - Change Search Search
function F_ChangeSearchSearch(v_Value,v_Text){$('#change-search-drops-lines').hide();if(v_Value>0){F_AddSearchSearch(v_Value,v_Text);$('#change-search-master').html(v_Text);}else{F_RemoveSearchSearch();}F_MakeRequest('search',v_Value);}
//
// Function - Change Similar
function F_ChangeSimilar(v_TurnOff){if(A_Search['similar']||v_TurnOff){A_Search['similar']=false;}else{A_Search['similar']=true;}F_MakeRequest('similar');}
//
// Function - Change Sort Search
function F_ChangeSortSearch(v_Value,v_Text){$('#change-sort-drops-lines').hide();if(v_Value>0){F_AddSortSearch(v_Value,v_Text);$('#change-sort-master').html(v_Text);}else{F_RemoveSortSearch();}F_MakeRequest('sort',v_Value);}
//
// Function - Change Tag Search
function F_ChangeTagSearch(v_Value,v_Text){$('#change-tag-drops-lines').hide();if(v_Value>0){F_AddTagSearch(v_Value,v_Text);if(A_Search['popular']['on']){F_RemovePopularSearch();}}else{F_RemoveTagSearch();}F_MakeRequest('tag',v_Value);F_RequestPopularTags();}
//
// Function - Remove Date Search
function F_RemoveDateSearch(){
	A_Search['date']={'on':false,'text':'','words':''};
	if(F_ArrayKeyExists('date',A_Drops[V_Area])){
		$('#change-date-master').html('select day');
		$('#date-selected').hide();
	}
}
//
// Function - Remove Popular Search
function F_RemovePopularSearch(){
	A_Search['popular']={'on':false,'current':{'ID':0,'text':''}};
	var v_DefaultPopular=0;
	for(var v_Key in A_Drops['home']['popular']){v_DefaultPopular=v_Key;break;}
	$('#change-popular-master').html(((v_DefaultPopular>0)?A_Drops['home']['popular'][v_DefaultPopular]['name']:'empty'));
	$('#popular-selected').hide();
}
//
// Function - Remove Search Search
function F_RemoveSearchSearch(){
	A_Search['search']={'on':false,'text':'','value':0};
	if(F_ArrayKeyExists('search',A_Drops[V_Area])){
		$('#change-search-master').html(A_Drops[V_Area]['search'][A_Search['search']['value']]['name']);
		$('#search-selected').hide();
	}
}
//
// Function - Remove Sort Search
function F_RemoveSortSearch(){
	A_Search['sort']={'on':false,'text':'','value':0};
	if(F_ArrayKeyExists('sort',A_Drops[V_Area])){
		$('#change-sort-master').html(A_Drops[V_Area]['sort'][A_Search['sort']['value']]['name']);
		$('#sort-selected').hide();
	}
}
//
// Function - Remove Tag Search
function F_RemoveTagSearch(){A_Search['tag']={'on':false,'previous':A_Search['tag']['current'],'current':{'ID':0,'text':''}};$('#change-tag-master').attr('value','search here');$('#tag-selected').hide();}