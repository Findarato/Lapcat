// LAPCAT - Client
// 2010-02-01
//
// A r r a y s   a n d   V a r i a b l e s
//
// Array - Cells
var A_Cells={
	1:{
		// Box for List of Materials (with cover images)
		'active':true,
		'cell-number':1,
		'fade':{'on':true,'timer':600},
		'line-HTML':100,
		'list-HTML':100,
		'maximum-lines-shrunk':5,
		'maximum-lines-expanded':10,
		'open-line-HTML':10,
		'show':{
			'cover-images':true,
			'header':true,
			'open-line':false
		},
		'redraw-on-expand':false,
		'refresh':{'on':true,'timer':10000},
		'size':{
			'header':1000,
			'height':'175px',
			'width':'99%'
		},
		'type':'materials',
		'URL':'/quick/materials/suggest'
	},
	2:{
		// Box for List of Events
		'active':true,
		'cell-number':2,
		'fade':{'on':true,'timer':600},
		'line-HTML':200,
		'list-HTML':300,
		'open-line-HTML':10,
		'maximum-lines-shrunk':10,
		'maximum-lines-expanded':10,
		'redraw-on-expand':false,
		'refresh':{'on':false,'timer':10000},
		'show':{
			'cover-images':false,
			'header':true,
			'open-line':true
		},
		'size':{
			'header':40,
			'height':'342px',
			'width':'322px'
		},
		'type':'events',
		'URL':'/quick/events/suggest'
	},
	3:{
		// Box for List of News
		'active':true,
		'cell-number':3,
		'fade':{'on':true,'timer':600},
		'line-HTML':300,
		'list-HTML':300,
		'maximum-lines-shrunk':10,
		'maximum-lines-expanded':10,
		'open-line-HTML':10,
		'redraw-on-expand':false,
		'refresh':{'on':false,'timer':10000},
		'show':{
			'cover-images':false,
			'header':true,
			'open-line':true
		},
		'size':{
			'header':40,
			'height':'342px',
			'width':'322px'
		},
		'type':'news',
		'URL':'/quick/news/suggest'
	},
		// Box for Featured Database
	4:{
		'active':true,
		'cell-number':4,
		'line-HTML':500,
		'list-HTML':100,
		'open-line-HTML':10,
		'fade':{'on':true,'timer':600},
		'maximum-lines-shrunk':1,
		'maximum-lines-expanded':10,
		'redraw-on-expand':true,
		'refresh':{'on':false,'timer':10000},
		'show':{
			'cover-images':false,
			'header':true,
			'open-line':true
		},
		'size':{
			'header':40,
			'height':'342px',
			'width':'160px'
		},
		'type':'databases',
		'URL':'/quick/databases/suggest'
	}
	//,
		// Box for Promotion
	//5:{'type':'promotions'}
}
//
// Array - Data
var A_Data={
	1:{
		'cell-number':1,
		'data':{},
		'header':'',
		'open-line-data':{},
		'page':{}
	},
	2:{
		'cell-number':2,
		'data':{},
		'header':'',
		'open-line-data':{},
		'page':{}
	},
	3:{
		'cell-number':3,
		'data':{},
		'header':'',
		'open-line-data':{},
		'page':{}
	},
	4:{
		'cell-number':4,
		'data':{},
		'header':'',
		'open-line-data':{},
		'page':{}
	}
}
//
// Array - History
var A_History={
	'movement':{
		'current':'',
		'previous':''
	}
};

// Array - Magnified
var A_Magnified={'on':false,'cell-number':0};

$(document).ready(function(){
	A_Displays[1]=new F_ConstructDisplay(1);
	A_Displays[2]=new F_ConstructDisplay(2);
	A_Displays[3]=new F_ConstructDisplay(3);
	A_Displays[4]=new F_ConstructDisplay(4);
	$('#tab-home').removeClass('menu-normal').addClass('menu-highlight');
	A_History['movement']={'current':'home','previous':''};
	F_RequestPopularTags();
	F_ShowSearchMenu('home');
	$('.drops').fadeTo(0,0.50);
});

//
// D i s p l a y s
// *******************************************************************************

//
// Array - Displays
var A_Displays={};

// Function - Construct And Replace
function F_ConstructAndReplace(v_HTML,a_Data){for(var v_Key in a_Data){while(v_HTML.indexOf('replace-'+v_Key)>-1){v_HTML=v_HTML.replace('replace-'+v_Key,a_Data[v_Key]);}}return v_HTML;};
//
// Function - Construct Display
function F_ConstructDisplay(v_CellNumber){
	// Varaible - Cell Number
	this.v_CellNumber=v_CellNumber;
	// Variable - Container
	this.v_Container='#content-'+v_CellNumber;
	// Variable - Ready For Refresh
	this.v_ReadyForRefresh=true;
	// Variable - Refresh Counter
	this.v_RefreshCounter=0;
	// Variable - Expanded
	this.v_Size='shrunk';
	// Variable - Target
	this.v_Target=0;
	
	// Function - Apply Data
	this.f_ApplyData=function(){
		var v_HTML=F_CopyHTML('line-HTML-'+A_Cells[this.v_CellNumber]['line-HTML']);
		$(this.v_Container).find('#data').html('');
		$(this.v_Container).find('#replace-master').attr('ID','tab-'+A_Cells[this.v_CellNumber]['type']);
		for(var v_Key in A_Data[this.v_CellNumber]['data']){
			if(parseInt(v_Key)+1>A_Cells[this.v_CellNumber]['maximum-lines-'+this.v_Size]){break;}
			$(this.v_Container).find('#data')
				.append(F_ConstructAndReplace(v_HTML,A_Data[this.v_CellNumber]['data'][v_Key]));
		}
	};
	// Function - Apply Header
	this.f_ApplyHeader=function(){
		$(this.v_Container).find('#header')
			.html(A_Data[this.v_CellNumber]['header']);
		
	};
	// Function - Apply Open Line
	this.f_ApplyOpenLineData=function(v_OpenLine){
		var v_HTML=F_CopyHTML('stage-'+A_Cells[this.v_CellNumber]['type']+'-content');
		if(!F_ArrayKeyExists(this.v_Target,A_Data[this.v_CellNumber]['open-line-data'])){return;}
		if(v_OpenLine){$(this.v_Container).find('#browse-'+A_Data[this.v_CellNumber]['open-line-data'][this.v_Target]['ID']).addClass('open-line');}
		$(this.v_Container).find('#content-open-line')
			.html(F_ConstructAndReplace(v_HTML,A_Data[this.v_CellNumber]['open-line-data'][this.v_Target]));
	};
	// Function - Blind Request
	this.f_BlindRequest=function(){
		this.f_RequestData(A_Cells[this.v_CellNumber]['URL']);
	};
	// Function - Construct Container
	this.f_ConstructContainer=function(){
		var v_HTML=F_CopyHTML('list-HTML-'+A_Cells[this.v_CellNumber]['list-HTML']);
		$(this.v_Container).html(v_HTML);
	};
	// Function - Deactivate Cell
	this.f_DeactivateCell=function(){A_Cells[this.v_CellNumber]['active']=false;};
	// Function - Activate Cell
	this.f_ActivateCell=function(){A_Cells[this.v_CellNumber]['active']=true;};
	// Function - Expand Container
	this.f_ExpandContainer=function(){
		this.v_Size='expanded';
		A_Magnified={'on':true,'cell-number':this.v_CellNumber};
		$(this.v_Container).css('height','auto').css('width','100%');
		$(this.v_Container).find('#container').css('width','100%');
		if(A_Cells[this.v_CellNumber]['show']['open-line']){
			$(this.v_Container).find('#data').css('width','auto');
			$(this.v_Container).find('#open-line-data').css('width','100%').html(F_CopyHTML('open-line-HTML-'+A_Cells[this.v_CellNumber]['open-line-HTML']));
			this.f_ApplyOpenLineData(true);
		}
		F_ConstructPageButtons(this.v_CellNumber);
		$('#button-page-list').css('visibility','visible');
	};
	// Function - Hide Container
	this.f_HideContainer=function(){$(this.v_Container).hide();};
	// Function - Modify Container Size
	this.f_ModifyContainerSize=function(){
		$(this.v_Container)
			.css('height',A_Cells[this.v_CellNumber]['size']['height'])
			.css('width',A_Cells[this.v_CellNumber]['size']['width']);
		$(this.v_Container).find('#container')
			.css('height',A_Cells[this.v_CellNumber]['size']['height'])
			.css('width',A_Cells[this.v_CellNumber]['size']['width']);
	};
	// Function - Prepare Refresh
	this.f_PrepareRefresh=function(){
		this.v_ReadyForRefresh=true;
		this.v_RefreshCounter++;
		setTimeout('A_Displays[\''+this.v_CellNumber+'\'].f_Refresh(\''+this.v_RefreshCounter+'\');',A_Cells[v_CellNumber]['refresh']['timer']);
	};
	// Function - Process Data
	this.f_ProcessData=function(o_JSON){
		var v_CellNumber=this.v_CellNumber;
		if(!A_Cells[v_CellNumber]['active']){return;}
		if(A_Cells[v_CellNumber]['refresh']['on']){this.f_PrepareRefresh();}
		var v_Failed=false;
		switch(o_JSON['switch']){
			case 'failed':
				v_Failed=true;
			case 'open-line':
			case 'data':
				for(var v_Key in o_JSON){if(F_ArrayKeyExists(v_Key,A_Data[v_CellNumber])){A_Data[v_CellNumber][v_Key]=o_JSON[v_Key];}}
				F_CleanData(v_CellNumber);
				$(this.v_Container)
					.fadeOut('slow',function(){
						if(v_Failed){
							F_ApplyEmptyDisplay(v_CellNumber);
							A_Data[v_CellNumber]['open-line-data']={};
						}else{
							A_Displays[v_CellNumber].f_ApplyData();
							if(A_Cells[v_CellNumber]['show']['open-line']){A_Displays[v_CellNumber].f_ApplyOpenLineData(false);}
							A_Displays[v_CellNumber].f_ApplyHeader();
						}
						if(A_Cells[v_CellNumber]['active']){$(A_Displays[v_CellNumber].v_Container).fadeIn('slow');}
						if(A_Cells[v_CellNumber]['show']['cover-images']){F_RequestCovers(v_CellNumber);}
					});
				break;
			default:
				break;
		}
	};
	// Function - Refresh
	this.f_Refresh=function(v_RefreshCounter){
		if(A_Cells[this.v_CellNumber]['active']){
			if(this.v_RefreshCounter==v_RefreshCounter){
				if(this.v_ReadyForRefresh){
					this.v_ReadyForRefresh=false;
					this.f_BlindRequest();
				}
			}
		}
	};
	// Function - Request Data
	this.f_RequestData=function(v_URL){$.getJSON(v_URL,function(o_JSON){A_Displays[F_GetCellNumber(o_JSON['alias'])].f_ProcessData(o_JSON);});};
	// Function - Shrink Container
	this.f_ShrinkContainer=function(){
		this.v_Size='shrunk';
		A_Magnified={'on':false,'cell-number':0};
		if(A_Cells[this.v_CellNumber]['show']['open-line']){
			$(this.v_Container).find('#open-line-data').css('width','auto');
			$(this.v_Container).find('#data').css('width','100%');
			$(this.v_Container).find('#open-line-data').html('');
		}
		this.f_ModifyContainerSize();
	};
	// Function - Show Container
	this.f_ShowContainer=function(){
		$(this.v_Container).show();
	};
	// Function - Send Command Request
	this.f_SendCommandRequest=function(v_Request,v_Optional){
		this.v_ReadyForRefresh=false;
		this.v_RefreshCounter++;
		var v_MonthViewRequest=false;
		var v_Alias=A_Cells[this.v_CellNumber]['type'];
		switch(v_Request){
			case 'popular':case 'tag':
				v_Optional=A_Search[v_Request]['current']['ID'];
			case 'page':
				this.f_RequestData('/quick/'+v_Alias+'/change-'+v_Request+'/'+v_Optional);
				break;
			case 'reset':
				this.f_RequestData('/quick/'+v_Alias+'/reset');
				break;
			default:
				break;
		}
	};

	this.f_ConstructContainer();
	this.f_ModifyContainerSize();
	this.f_BlindRequest();
}

//
// M o v e m e n t

//
// Function - Move To
function F_MoveTo(v_Alias){
	var v_CellNumber=F_GetCellNumber(v_Alias);
	var v_Moved=false;
	if(v_Alias!==A_History['movement']['current']){
		A_History['movement']={'current':v_Alias,'previous':A_History['movement']['current']};
		$('.menu-highlight').removeClass('menu-highlight').addClass('menu-normal');
		$('#tab-'+v_Alias).removeClass('menu-normal').addClass('menu-highlight');
		v_Moved=true;
	}
	switch(v_Alias){
		case 'home':
			$('.open-line').removeClass('open-line');
			$('#button-page-list').css('visibility','hidden');
			F_ShrinkAllContainers();
			F_ShowAllDisplays();
			A_Displays[1].f_PrepareRefresh(); // Hard Value
			break;
		case 'materials':
			A_Displays[1].f_PrepareRefresh(); // Hard Value
		case 'databases':case 'events':case 'news':
			if(v_Moved){F_HideOtherDisplays(v_CellNumber);
			}else{A_Displays[v_CellNumber].f_ApplyOpenLineData(true);}
			break;
	}
	if(v_Moved){F_ShowSearchMenu(v_Alias);}
}
//
// Function - Send Command Request
function F_SendCommandRequest(v_Request,v_Optional){
	switch(A_History['movement']['current']){
		case 'home':
			A_Displays[1].f_SendCommandRequest(v_Request);
			A_Displays[2].f_SendCommandRequest(v_Request);
			A_Displays[3].f_SendCommandRequest(v_Request);
			break;
		case 'databases':case 'events':case 'materials':case 'news':
			switch(v_Request){
				case 'tag':
					A_Displays[1].f_SendCommandRequest(v_Request);
					A_Displays[2].f_SendCommandRequest(v_Request);
					A_Displays[3].f_SendCommandRequest(v_Request);
					break;
				case 'page':
					A_Displays[F_GetCellNumber(A_History['movement']['current'])].f_SendCommandRequest(v_Request,v_Optional);
					break;
				default:
					A_Displays[F_GetCellNumber(A_History['movement']['current'])].f_SendCommandRequest(v_Request);
					break;
			}
			break;
	}
}
//
// D i s p l a y s
//
// Function - Apply Empty Display
function F_ApplyEmptyDisplay(v_CellNumber){
	var o_HTML=$(F_CopyHTML('list-HTML-'+A_Cells[v_CellNumber]['list-HTML']));
	// Header
	o_HTML.find('#header').html('No results.');
	$('#change-tag-RSS:visible').attr('title','');
	// Width
	o_HTML.find('#data').css('width',A_Cells[v_CellNumber]['size']['width']);

	// Suggestions
	var v_HTML='<font class="font-italic font-X" style="font-size:12px; margin-left:4px;">There are no '+A_Cells[v_CellNumber]['type']+' that match the following search:</font><br/><font class="font-X" style="font-size:14px; margin-left:12px;">'+A_Data[v_CellNumber]['header']+'</font><br/><font class="font-italic font-X" style="font-size:12px; margin-left:4px; margin-top:3px;">Suggestions:</font>';
		
	// Search Criteria
	if(A_Search['tag']['on']){
		// Tag
		v_HTML+='<br/><font class="font-G" style="font-size:14px; margin-left:12px;">Search the catalog for <span class="catalog-link fake-link" name="http://catalog.lapcat.org/search/X?SEARCH='+A_Search['tag']['current']['text']+'&SORT=D&searchscope=12" ID="'+A_Search['tag']['current']['ID']+'">'+A_Search['tag']['current']['text']+'</span>.</font>';
		v_HTML+='<br/><a class="font-G remove-tag fake-link" name="tag/drop" style="font-size:14px; margin-left:12px; text-decoration:underline;">Remove</a><font class="font-G" style="font-size:14px;"> (<font class="font-G" style="font-size:12px; font-style:italic;">'+A_Search['tag']['current']['text']+'</font>) from this search.</font>';
	}else if(A_Search['popular']['on']){
		// Popular
		v_HTML+='<br/><font class="font-G" style="font-size:14px; margin-left:12px;">Search the catalog for <span class="catalog-link fake-link" name="http://catalog.lapcat.org/search/X?SEARCH='+A_Search['popular']['current']['text']+'&SORT=D&searchscope=12" ID="'+A_Search['popular']['current']['ID']+'">'+A_Search['popular']['current']['text']+'</span>.</font>';
		v_HTML+='<br/><a class="font-G remove-tag fake-link" name="tag/drop" style="font-size:14px; margin-left:12px; text-decoration:underline;">Remove</a><font class="font-G" style="font-size:14px;"> (<font class="font-G" style="font-size:12px; font-style:italic;">'+A_Search['popular']['current']['text']+'</font>) from this search.</font>';
	}
	if(F_HasSearchCriteria()){v_HTML+='<br/><a class="simple-click fake-link font-G" ID="button-reset" style="font-size:14px; margin-left:12px; text-decoration:underline;">Reset</a><font class="font-G" style="font-size:14px;"> this search.</font>';}
	v_HTML+='</font>';
	o_HTML.find('#data').html(v_HTML);
	$(A_Displays[v_CellNumber].v_Container).html(o_HTML.html());
	$(A_Displays[v_CellNumber].v_Container).find('#replace-master').attr('ID','tab-'+A_Cells[v_CellNumber]['type']);
}
//
// Function - Hide Other Displays
function F_HideOtherDisplays(v_CellNumber){
	$('#destination-content')
		.hide(0,function(){
			for(var v_Key in A_Displays){
				if(v_Key!==v_CellNumber){
					A_Displays[v_Key].f_DeactivateCell();
					A_Displays[v_Key].f_HideContainer();
				}else{
					A_Displays[v_Key].f_ExpandContainer();
					A_Displays[v_Key].f_ShowContainer();
				}
			}
		}).show();
	$('[name="magnify"]:visible').attr('src','http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png');
}
//
// Function - Shrink All Containers
function F_ShrinkAllContainers(v_CellNumber){
	$('#destination-content')
		.hide(0,function(){
			for(var v_Key in A_Displays){A_Displays[v_Key].f_ShrinkContainer();}
		}).show();
	$('[name="magnify"]:visible').attr('src','http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png');
}
//
// Function - Show All Displays
function F_ShowAllDisplays(v_CellNumber){
	for(var v_Key in A_Displays){
		A_Displays[v_Key].f_ActivateCell();
		A_Displays[v_Key].f_ShowContainer();
	}
}
//
// S e a r c h
// *******************************************************************************
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
function F_ChangePopularSearch(v_Value,v_Text){$('#change-popular-drops-lines').hide();if(v_Value>0){F_AddPopularSearch(v_Value,v_Text);if(A_Search['tag']['on']){F_RemoveTagSearch();}F_SendCommandRequest('popular');if(A_History['movement']['current']=='home'){F_RequestPopularTags();}}else{F_RemovePopularSearch();F_SendCommandRequest('popular');}}
//
// Function - Change Date Search
function F_ChangeDateSearch(v_Value,v_Text){if(v_Value>0){F_AddDateSearch(v_Value,v_Text);$('#change-date-master').html(v_Text);}else{F_RemoveDateSearch();}F_SendCommandRequest('date');}
//
// Function - Change Expand
function F_ChangeExpand(){if(A_Search['expand']){A_Search['expand']=false;$('#list-cells').show();F_ToggleOption('expand',false);}else{A_Search['expand']=true;$('#list-cells').hide();F_ToggleOption('expand',true);}}
//
// Function - Change Search Search
function F_ChangeSearchSearch(v_Value,v_Text){$('#change-search-drops-lines').hide();if(v_Value>0){F_AddSearchSearch(v_Value,v_Text);$('#change-search-master').html(v_Text);}else{F_RemoveSearchSearch();}F_SendCommandRequest('search');}
//
// Function - Change Similar
function F_ChangeSimilar(v_TurnOff){if(A_Search['similar']||v_TurnOff){A_Search['similar']=false;}else{A_Search['similar']=true;}F_SendCommandRequest('similar');}
//
// Function - Change Sort Search
function F_ChangeSortSearch(v_Value,v_Text){$('#change-sort-drops-lines').hide();if(v_Value>0){F_AddSortSearch(v_Value,v_Text);$('#change-sort-master').html(v_Text);}else{F_RemoveSortSearch();}F_SendCommandRequest('sort');}
//
// Function - Change Tag Search
function F_ChangeTagSearch(v_Value,v_Text){$('#change-tag-drops-lines').hide();if(v_Value>0){F_AddTagSearch(v_Value,v_Text);if(A_Search['popular']['on']){F_RemovePopularSearch();}}else{F_RemoveTagSearch();}F_SendCommandRequest('tag');F_RequestPopularTags();}
//
// Function - Remove Date Search
function F_RemoveDateSearch(){A_Search['date']={'on':false,'text':'','words':''};$('#change-date-master').html('select day');$('#date-selected').hide();}
//
// Function - Remove Popular Search
function F_RemovePopularSearch(){A_Search['popular']={'on':false,'current':{'ID':0,'text':''}};var v_DefaultPopular=0;for(var v_Key in A_Drops['home']['popular']){v_DefaultPopular=v_Key;break;}$('#change-popular-master').html(((v_DefaultPopular>0)?A_Drops['home']['popular'][v_DefaultPopular]['name']:'empty'));$('#popular-selected').hide();}
//
// Function - Remove Search Search
function F_RemoveSearchSearch(){A_Search['search']={'on':false,'text':'','value':0};$('#change-search-master').html(A_Drops[A_History['movement']['current']]['search'][A_Search['search']['value']]['name']);$('#search-selected').hide();}
//
// Function - Remove Sort Search
function F_RemoveSortSearch(){A_Search['sort']={'on':false,'text':'','value':0};$('#change-sort-master').html(A_Drops[A_History['movement']['current']]['sort'][A_Search['sort']['value']]['name']);$('#sort-selected').hide();}
//
// Function - Remove Tag Search
function F_RemoveTagSearch(){A_Search['tag']={'on':false,'previous':A_Search['tag']['current'],'current':{'ID':0,'text':''}};$('#change-tag-master').attr('value','search here');$('#tag-selected').hide();}
//
// Function - Show Search Menu
function F_ShowSearchMenu(v_Alias){
	F_PopulateDrops(v_Alias);
	for(v_Key in A_Areas[v_Alias]){if(A_Areas[v_Alias][v_Key]){$('#container-'+v_Key).show();}else{$('#container-'+v_Key).hide();}}
	if(A_Areas[v_Alias]['month-view']){
		$('#option-'+((A_Search['month-view'])?'list-view':'month-view')).show();
	}else{
		$('#option-list-view').hide();
		$('#option-month-view').hide();
	}
	$('#change-tag-RSS').css({'visibility':((A_Areas[v_Alias]['change-tag-RSS'])?'visible':'hidden')});
}
//
// O t h e r
// *******************************************************************************
//
// Function - Clean
function F_Clean(v_Data){return v_Data.replace(/\\'/g,'\'').replace(/\\"/g,'"').replace(/\\0/g,'\0').replace(/\\\\/g,'\\');} 
//
// Function - Clean Data
function F_CleanData(v_CellNumber){for(var v_Key in A_Data[v_CellNumber]['data']){for(var v_SubKey in A_Data[v_CellNumber]['data'][v_Key]){switch(v_SubKey){case 'name':case 'title':A_Data[v_CellNumber]['data'][v_Key]['clean-name']=F_Clean(A_Data[v_CellNumber]['data'][v_Key][v_SubKey]);A_Data[v_CellNumber]['data'][v_Key]['dirty-name']=F_Dirty(A_Data[v_CellNumber]['data'][v_Key][v_SubKey]);break;default:break;}}}}
//
// Function - Copy HTML
function F_CopyHTML(v_ElementID){return $('#'+v_ElementID).html();}
//
// Function - Dirty
function F_Dirty(v_Data){return escape(v_Data);}
//
// Function - Get Cell Number
function F_GetCellNumber(v_Alias){for(var v_CellNumber in A_Cells){if(A_Cells[v_CellNumber]['type']==v_Alias){return v_CellNumber;}}}
//
// Function - Get Open Line Data Key
function F_GetOpenLineDataKey(v_CellNumber,v_Target){alert('get open line data key');return;
	if(v_Target==0){return 0;}
	for(var v_Key in A_Data[v_CellNumber]['open-line-data']){if(A_Data[v_CellNumber]['open-line-data'][v_Key]['ID']==v_Target){return v_Key;}}
	return -1;
}
//
// Function - Request Covers
function F_RequestCovers(v_CellNumber){var a_Images=[];for(var v_Key in A_Data[v_CellNumber]['data']){a_Images[v_Key]=new Image();a_Images[v_Key].src='http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=S&Value='+A_Data[v_CellNumber]['data'][v_Key]['ISBNorSN'];a_Images[v_Key].alt='suggestions-'+A_Data[v_CellNumber]['data'][v_Key]['ISBNorSN']+'-cover';a_Images[v_Key].onload=function(){if(this.height>1){$('#'+this.alt).attr('src',this.src);};};}};



//
// L i v e   E v e n t s
// *******************************************************************************

//
// Live Event - Databases Line Click
$('.databases-line-click').live('click',function(){
	var v_LineKey=$(this).attr('name').replace(/counter-/g,'');
	var v_CellNumber=F_GetCellNumber('databases');
	A_Displays[v_CellNumber].v_Target=v_LineKey;
	$('.open-line:visible').removeClass('open-line');
	F_MoveTo('databases');
});
//
// Live Event - Events Line Click
$('.events-line-click').live('click',function(){
	var v_LineKey=$(this).attr('name').replace(/counter-/g,'');
	var v_CellNumber=F_GetCellNumber('events');
	A_Displays[v_CellNumber].v_Target=v_LineKey;
	$('.open-line:visible').removeClass('open-line');
	F_MoveTo('events');
});
//
// Live Event - News Line Click
$('.news-line-click').live('click',function(){
	var v_LineKey=$(this).attr('name').replace(/counter-/g,'');
	var v_CellNumber=F_GetCellNumber('news');
	A_Displays[v_CellNumber].v_Target=v_LineKey;
	$('.open-line:visible').removeClass('open-line');
	F_MoveTo('news');
});
//
// Live Event - Menu Click
$('.move-to-click').live('click',function(){F_MoveTo($(this).attr('ID').replace(/tab-/g,''));});








/*
		1:{
			'alias':'materials',
			'cell-number':1,
			'cell-type':'materials',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'175px',
			'initialized':false,
			'line-type':100,
			'line-HTML':'',
			'list-type':1,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':true,
			'URL':'/quick/home/suggest/materials',
			'width':'100%'
		},
		2:{
			'alias':'events',
			'cell-number':2,
			'cell-type':'events',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':200,
			'line-HTML':'',
			'list-type':2,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/home/suggest/events',
			'width':'315px'
		},
		3:{
			'alias':'news',
			'cell-number':3,
			'cell-type':'articles',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':300,
			'line-HTML':'',
			'list-type':2,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/home/suggest/news',
			'width':'315px'
		},
		4:{
			'alias':'databases',
			'cell-number':4,
			'cell-type':'databases',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':500,
			'line-HTML':'',
			'list-type':1,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/home/suggest/databases',
			'width':'160px'
		}

*/



// LAPCAT - Client
// January 2010

//
// Array - Actions
var A_Actions=new Array();
//
// Array - Areas
var A_Areas={
	'home':{
		'change-tag':true,
		'change-tag-RSS':false,
		'change-popular':true,
		'change-search':false,
		'change-sort':false,
		'date-selector':false,
		'month-view':false
	},
	'news':{
		'change-tag':true,
		'change-tag-RSS':true,
		'change-popular':false,
		'change-search':false,
		'change-sort':true,
		'date-selector':false,
		'month-view':false
	},
	'events':{
		'change-tag':true,
		'change-tag-RSS':false,
		'change-popular':false,
		'change-search':true,
		'change-sort':true,
		'date-selector':true,
		'month-view':true
	},
	'materials':{
		'change-tag':true,
		'change-tag-RSS':false,
		'change-popular':false,
		'change-search':false,
		'change-sort':false,
		'date-selector':false,
		'month-view':false
	},
	'databases':{
		'change-tag':true,
		'change-tag-RSS':false,
		'change-popular':false,
		'change-search':false,
		'change-sort':true,
		'date-selector':false,
		'month-view':false
	},
	'hours':{
		'change-tag':false,
		'change-tag-RSS':false,
		'change-popular':false,
		'change-search':false,
		'change-sort':false,
		'date-selector':false,
		'month-view':false
	},
	'hiring':{
		'change-tag':false,
		'change-tag-RSS':false,
		'change-popular':false,
		'change-search':false,
		'change-sort':false,
		'date-selector':false,
		'month-view':false
	}
};
//
// Array - Defaults
var A_Defaults={
	'home':{
		1:{
			'alias':'materials',
			'cell-number':1,
			'cell-type':'materials',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'175px',
			'initialized':false,
			'line-type':100,
			'line-HTML':'',
			'list-type':1,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':true,
			'URL':'/quick/home/suggest/materials',
			'width':'100%'
		},
		2:{
			'alias':'events',
			'cell-number':2,
			'cell-type':'events',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':200,
			'line-HTML':'',
			'list-type':2,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/home/suggest/events',
			'width':'315px'
		},
		3:{
			'alias':'news',
			'cell-number':3,
			'cell-type':'articles',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':300,
			'line-HTML':'',
			'list-type':2,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/home/suggest/news',
			'width':'315px'
		},
		4:{
			'alias':'databases',
			'cell-number':4,
			'cell-type':'databases',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':500,
			'line-HTML':'',
			'list-type':1,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/home/suggest/databases',
			'width':'160px'
		}
	},
	'news':{
		1:{
			'alias':'browse',
			'cell-number':1,
			'cell-type':'articles',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':400,
			'line-HTML':'',
			'list-type':1,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/news/browse',
			'width':'100%'
		}
	},
	'events':{
		1:{
			'alias':'browse',
			'cell-number':1,
			'cell-type':'events',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':400,
			'line-HTML':'',
			'list-type':1,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/events/browse',
			'width':'100%'
		}
	},
	'materials':{
		1:{
			'alias':'browse',
			'cell-number':1,
			'cell-type':'materials',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':400,
			'line-HTML':'',
			'list-type':1,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/materials/browse',
			'width':'100%'
		}
	},
	'databases':{
		1:{
			'alias':'browse',
			'cell-number':1,
			'cell-type':'databases',
			'data':eval({}),
			'display-HTML':'',
			'faded':false,
			'header':'',
			'height':'auto',
			'initialized':false,
			'line-type':400,
			'line-HTML':'',
			'list-type':1,
			'list-HTML':'',
			'open-line-type':10,
			'open-line-HTML':'',
			'ready':false,
			'show-covers':false,
			'URL':'/quick/databases/browse',
			'width':'100%'
		}
	}
};
//
// Array - Displays
var A_Displays=new Array();
//
// Array - Drops
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
//
// Array - Parameters
var A_Parameters={
	'background-alignment':'left'
};
//
// Array - Search
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
//
// Array - Starting Tag
var A_StartingTag={'ID':0,'name':''};

//
// Variable - Area
var V_Area='home';
//
// Variable - First Load
var V_FirstLoad=false;
//
// Variable - Set On Data
var V_SetOnData=false;

//
// Start
/*
$(document).ready(function(){
	var A_URL=window.location.href.split('/');
	if(F_ArrayKeyExists(3,A_URL)){
		var v_Word=A_URL[3].replace(/%20/g,' ');
		for(var v_TagKey in A_Tags){if(A_Tags[v_TagKey]['name']==v_Word){A_StartingTag=A_Tags[v_TagKey];break;}}
		if(A_StartingTag['ID']>0){
			F_AddTagSearch(A_StartingTag['ID'],A_StartingTag['name']);
		}else{
			var v_Pass=false;
			for(var v_MenuKey in A_Areas){if(v_MenuKey==v_Word){V_Area=v_MenuKey;v_Pass=true;}}
			if(!v_Pass){
				switch(v_Word){
					case 'catalog':F_OpenDockable('http://catalog.lapcat.org');break;
					case 'give':F_OpenDockable('https://catalog.lapcat.org/webapp/iii/ecom/donate.do');break;
					case 'options':F_OpenDockable('https://dev.lapcat.org/lapcat/code/options.php?url=continue');break;
					default:break;
				}
			}
		}
	}
	F_ApplyParameters();
	F_CreateDisplays();
	F_RequestPopularTags();
	F_Move(V_Area,true);
	$('.drops').fadeTo(0,0.50);
	F_InitializeDateSelector();
	F_RequestMonthViewData();
});
*/
//
// Function - Request Month View Data
function F_RequestMonthViewData(){$.getJSON('quick/month-view',function(o_JSON){F_InitializeMonthView(o_JSON);});}

//
// Function - Add Action
function F_AddAction(v_Area,v_Action,v_Target,v_Perform,a_Parameters){var v_NextActionKey=A_Actions.length;if(v_NextActionKey>=0){A_Actions[v_NextActionKey]=eval({'area':v_Area,'action':v_Action,'target':v_Target,'parameters':a_Parameters});if(v_Perform){F_NextAction();}}}
//
// Function - Apply Parameters
function F_ApplyParameters(){for(var v_Key in A_Parameters){switch(v_Key){case 'background-alignment':$('#'+v_Key).css('background-position',A_Parameters[v_Key]);break;}}}
//
// Function - Check For Faded
function F_CheckForFaded(v_Area,v_CellNumber){if(A_Displays[v_Area].a_Cells[v_CellNumber]['faded']){A_Displays[v_Area].f_SetData(v_CellNumber);}else{A_Displays[v_Area].f_StartFadeTimer(v_Area,v_CellNumber);}}
//
// Function - Check For Ready Data
function F_CheckForReady(v_Area,v_CellNumber){if(A_Displays[v_Area].a_Cells[v_CellNumber]['ready']){F_CheckForFaded(v_Area,v_CellNumber);}else{A_Displays[v_Area].f_StartReadyTimer(v_Area,v_CellNumber);}}
//
// Function - Clear All Searches
function F_ClearAllSearches(){for(var v_Key in A_Search){if(A_Search[v_Key]['on']){switch(v_Key){case 'date':F_RemoveDateSearch();break;case 'search':F_RemoveSearchSearch();break;case 'sort':F_RemoveSortSearch();break;}}}}
//
// Function - Clear Display
function F_ClearDisplay(v_ContentKey){$('#content-'+v_ContentKey).html('&nbsp;');};
//
// Function - Clear Displays
function F_ClearDisplays(){for(var v_Key=1;v_Key<5;v_Key++){F_ClearDisplay(v_Key);}};
//
// Function - Create Display
function F_CreateDisplay(v_Active,v_Area,a_Cells,a_Parameters){
}
//
// Function - Has Search Criteria
function F_HasSearchCriteria(){
	var v_Counter=0;
	for(var v_SearchKey in A_Search){if(A_Search[v_SearchKey]['on']){v_Counter++;}}
	if(v_Counter>0){return true;}
	return false;
}
//
// Function - Initialize Date Selector
function F_InitializeDateSelector(){
	$('#button-date-selector').dateter({
			'borderClass':'border-all-C-1',
			'backgroundClass':'color-F-1',
			'shadeClass':'background-alpha-4',
			'pastDayShadeClass':'background-alpha-4 font-I',
			'fontColor':'font-X',
			'highLightToday':true,
			'highLightTodayClass':'color-Z-2 effect-hover-Z-1',
			'calendarCell':'color-E-2 effect-hover-Z-1',
			'height':'114px',
			'width':'176px',
			'offsetX':-37,
			'offsetY':23,
			'uniqueName':'smallCal'
		},
		// Call Back Function I
		function(v_Month,v_Day,v_Year){
			F_AddDateSearch(v_Year+'-'+v_Month+'-'+v_Day);
			A_Displays[V_Area].f_SendCommandRequest('date');
		}
	);
}
//
// Function - Initialize Month View
function F_InitializeMonthView(a_Data){
	$('#stage-month-view').dateter({
		'displayHeader':true,
		'pastDayShadeClass':'background-alpha-4 font-I',
		'daysToHighlight':a_Data['calendar'],
		'height':'454px',
		'highLightColors':a_Data['colors'],
		'borderClass':'border-all-C-1',
		'fontColor':'font-X',
		'shadeClass':'background-alpha-4',
		'highLightToday':true,
		'highLightTodayClass':'color-Z-2 effect-hover-Z-1',
		'calendarCell':'color-E-2 effect-hover-Z-1',
		'noClick':true,
		'popUpBox':'<div style="background-Color:replace-color">replace-title replace-startTime replace-startTime replace-note replace-location<div id="popUpCloseButton" style="height:10px;width:10px;background-Color:replace-color"></div></div>',
		'initialFetchMonths':0,
		'largeDisplay':true,
		'uniqueName':'largeCal',
		'headerSelectors':{
			'title':$('#largeName'),
			'back':$('#largePrevious'),
			'next':$('#largeNext')
		}},
		function(v_Month,v_Day,v_Year){
			F_AddDateSearch(v_Year+'-'+v_Month+'-'+v_Day);
			A_Displays[V_Area].f_SendCommandRequest('date');
			F_ToggleMonthView();
		},
		function(v_Month,v_Day,v_Year){
			$.getJSON('/quick/request-view/'+v_Year+'-'+v_Month+'-1',function(o_JSON){
				//a_Data['calendar']=$.extend(true,a_Data['calendar'],o_JSON['calendar']);
				//$('#stage-month-view').data('Settings').daysToHighlight=a_Data['calendar'];
				$('#stage-month-view').data('Settings').daysToHighlight=o_JSON['calendar'];
			});
		});
}
//
// Function - Move
function F_Move(v_Destination,v_Fade,v_UseURL,v_URL){
	if(v_Destination!=V_Area){
		F_ClearDisplays();
		A_Displays[V_Area].f_MovedFromMe(v_Fade);
		A_Displays[v_Destination].v_ReadyForRefresh=false;
	}
	V_Area=v_Destination;
	A_Displays[V_Area].f_MovedToMe(v_Fade,v_UseURL,v_URL);
	F_ShowSearchMenu();
}
//
// Function - Next Action
function F_NextAction(){
	var a_Action=A_Actions.shift();
	var v_Pass=true;
	var v_NextQueue='';
	switch(a_Action['action']){
		case 'fade-out':v_NextQueue=A_Displays[a_Action['area']].f_FadeCellOut(a_Action['target']);break;
		case 'fade-in':v_NextQueue=A_Displays[a_Action['area']].f_FadeCellIn(a_Action['target']);break;
		case 'bounce-left':v_NextQueue=A_Displays[a_Action['area']].f_BounceLeft(a_Action['target']);break;
		default:v_Pass=false;break;
	}
	if(v_Pass){$('#'+v_NextQueue).dequeue();}
}
//
// Function - Open Dockable
function F_OpenDockable(v_URL){
	$('#dockable-close-link').show();
	if(!A_User['logged-in']){$('#user-access').css('visibility','hidden');}
	$('#dockable-window').css({'visibility':'visible'});
	$('#dockable-content').css({'visibility':'visible'});
	$('#dockable-content').attr('src',v_URL);
}
//
// Function - Populate Drops
function F_PopulateDrops(v_Alias,v_Specific,v_DropKey){
	var v_Pass=false;
	if(A_Drops[v_Alias]){
		for(var v_DropType in A_Drops[v_Alias]){
			v_Pass=false;
			if(v_Specific){if(v_DropType!=v_DropKey){break;}}
			$('#change-'+v_DropType+'-drops-lines').html('');
			for(var v_LineKey in A_Drops[v_Alias][v_DropType]){v_Pass=true;$('#change-'+v_DropType+'-drops-lines').append('<div class="'+v_DropType+'-change fake-link effect-hover-Z-2" id="value-'+A_Drops[v_Alias][v_DropType][v_LineKey]['value']+'" style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;">'+A_Drops[v_Alias][v_DropType][v_LineKey]['name']+'</div>');}
			switch(v_DropType){
				case 'popular':
					var v_DefaultPopular=0;
					for(var v_Key in A_Drops[v_Alias]['popular']){v_DefaultPopular=v_Key;break;}
					if(A_Search['popular']['current']['ID']>0){v_DefaultPopular=A_Search['popular']['current']['ID'];}
					$('#change-popular-master').html(((v_DefaultPopular>0)?A_Drops[v_Alias]['popular'][v_DefaultPopular]['name']:'empty'));
					break;
				case 'search':case 'sort':
					$('#change-'+v_DropType+'-master').html(A_Drops[v_Alias][v_DropType][A_Search[v_DropType]['value']]['name']);
					break;
				default:
					break;
			}
			if(!v_Pass){$('#change-'+v_DropType+'-drops-lines').html('<div style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;"><font class="font-H">No Results</font></div>');}
		}
	}
}
//
// Function - Populate Auto Drop
function F_PopulateAutoDrop(v_Value){
	$('#change-tag-drops-lines').html('');
	var v_Pass=false;
	for(var v_LineKey in A_Tags){
		if(v_Value==A_Tags[v_LineKey]['name'].substr(0,v_Value.length)){
			v_Pass=true;
			$('#change-tag-drops-lines').append('<div class="effect-hover-Z-2 fake-link tag-change" id="value-'+A_Tags[v_LineKey]['ID']+'" name="tag/drop" style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;">'+A_Tags[v_LineKey]['name']+'</div>');
		}
	}
	if(!v_Pass){$('#change-tag-drops-lines').html('<div style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;"><font class="font-H">No Results</font></div>');}
}
//
// Function - Request Popular Tags
function F_RequestPopularTags(){$.getJSON('/quick/popular-tags',function(o_JSON){if(!o_JSON['failed']){F_SetPopularTags(o_JSON);}});}
//
// Function - Set Popular Tags
function F_SetPopularTags(o_JSON){for(var v_Tag in o_JSON['data']){A_Drops['home']['popular'][o_JSON['data'][v_Tag]['ID']]=eval({'name':o_JSON['data'][v_Tag]['name'],'value':o_JSON['data'][v_Tag]['ID']});}F_PopulateDrops('home',true,'popular');}
//
// Function - Show Calendar
function F_ShowCalendar(){$('#destination-content').hide();$('#stage-month-view').show();$('#option-month-view').hide();$('#option-list-view').show();};
//
// Function - Show List
function F_ShowList(){$('#stage-month-view').hide();$('#destination-content').show();$('#option-list-view').hide();$('#option-month-view').show();}
//
// Function - Show Options
function F_ShowOptions(v_CellNumber){
	var v_SimilarPass=false;
	for(var v_Key in A_Displays[V_Area].a_Cells[v_CellNumber]['open-line-data']){
		switch(v_Key){
			case 'similar_named':if(parseInt(A_Displays[V_Area].a_Cells[v_CellNumber]['open-line-data'][v_Key])>1){v_SimilarPass=true;}break;
			case 'collect':case 'favorite':case 'watched':case 'watchlist':
				if(A_User['logged-in']){F_ToggleOption(v_Key,A_Displays[V_Area].a_Cells[v_CellNumber]['open-line-data'][v_Key]);break;}
			default:break;
		}
	}
	switch(V_Area){
		case 'events':case 'materials':case 'news':
			if(!A_Search['similar']&&v_SimilarPass){$('#option-similar').show();}
			F_ToggleOption('expand',A_Search['expand']);
			break;
		default:break;
	}
};
//
// Function - Toggle Month View
function F_ToggleMonthView(v_TurnOff){
	if(A_Search['month-view']||v_TurnOff){
		A_Search['month-view']=false;
		F_ShowList();
		$('#interface-screen-buttons').show();
	}else{
		A_Search['month-view']=true;
		F_ShowCalendar();
		$('#interface-screen-buttons').hide();
	}
}
//
// Function - Toggle Option
function F_ToggleOption(v_OptionID,v_Toggle){
	$('#option-'+v_OptionID).show().removeClass(((v_Toggle)?'button-black':'button-red')).addClass(((v_Toggle)?'button-red':'button-black'));
	$('#font-'+v_OptionID).removeClass(((v_Toggle)?'font-G':'dark-red')).addClass(((v_Toggle)?'dark-red':'font-G'));
}




//
// S e a r c h   R e l a t e d   F u n c t i o n s
// *******************************************************************************


//
// L i v e   E v e n t    F u n c t i o n s
// *******************************************************************************

//
// Live Event - Popular Change
$('.popular-change').live('click',function(){var v_Value=parseInt($(this).attr('ID').replace('value-',''));var v_Text=$(this).html();F_ChangePopularSearch(v_Value,v_Text);});
//
// Live Event - Remove Date
$('.remove-date').live('click',function(){F_ChangeDateSearch(0);});
//
// Live Event - Remove Popular
$('.remove-popular').live('click',function(){F_ChangePopularSearch(0);});
//
// Live Event - Remove Sort
$('.remove-sort').live('click',function(){F_ChangeSortSearch(0);});
//
// Live Event - Remove Search
$('.remove-search').live('click',function(){F_ChangeSearchSearch(0);});
//
// Live Event - Remove Tag
$('.remove-tag').live('click',function(){F_ChangeTagSearch(0);});
//
// Live Event - Search Change
$('.search-change').live('click',function(){var v_Value=parseInt($(this).attr('ID').replace('value-',''));var v_Text=$(this).html();F_ChangeSearchSearch(v_Value,v_Text);return false;});
//
// Live Event - Sort Change
$('.sort-change').live('click',function(){var v_Value=parseInt($(this).attr('ID').replace('value-',''));var v_Text=$(this).html();F_ChangeSortSearch(v_Value,v_Text);return false;});
//
// Live Event - Tag Box (Key Down)
$('.tag-box').live('keyup',function(){if($(this).attr('value').length>0){$('#change-tag-drops-lines').show();F_PopulateAutoDrop($(this).attr('value'))}else{$('#change-tag-drops-lines').hide();}});
//
// Live Event - Tag Change
$('.tag-change').live('click',function(){var v_Value=parseInt($(this).attr('ID').replace('value-',''));var v_Text=$(this).html();F_ChangeTagSearch(v_Value,v_Text);return false;});
//
// Live Event - Text (Box)
$(':text').live('click',function(){$(this).select();$(this).focus();});
//
// Live Event - Text (Box)
$('.user-click').live('click',function(){alert('you clicked me');return false;});
//
// Live Event - Option Click
$('.option-click').live('click',function(){
	var v_Option=$(this).attr('ID').replace('option-','');
	switch(v_Option){
		case 'list-view':case 'month-view':F_ToggleMonthView();break;
		case 'similar':F_ChangeSimilar();break;
		case 'favorite':break;
		case 'expand':F_ChangeExpand();break;
		default:break;
	}
});
$('.page-click').live('click',function(){
	F_SendCommandRequest('page',$(this).attr('name'));
});
//
// Live Event - Simple Click
$('.simple-click').live('click',function(){
	var v_Button=$(this).attr('ID').replace('button-','');
	switch(v_Button){
		case 'page':
			$('#content-1').fadeTo(0,0.65);
			V_SetOnData=true;
			A_Displays[V_Area].f_RequestData('/quick/'+V_Area+'/page/'+$(this).attr('name'));
			break;
		case 'anticipated':case 'collected':case 'favorites':case 'slider':case 'summer':
		case 'next-page':case 'previous-page':
			//A_Displays['browse'].f_RequestData('/'+V_AreaName+'/'+v_Button+'/json/ajax');
			break;
		case 'reset':
			F_ChangeSimilar(true);
			F_RemoveDateSearch();
			F_RemoveSearchSearch();
			F_RemoveSortSearch();
			F_RemovePopularSearch();
			F_RemoveTagSearch();
			if(V_Area=='home'){A_Displays[V_Area].f_SendCommandRequest('tag');}else{A_Displays[V_Area].f_SendCommandRequest('reset');}
			break;
		case 'next-record':
			//A_Displays['browse'].f_NextRecord();
			break;
		case 'previous-record':
			//A_Displays['browse'].f_PreviousRecord();
			break;
		case 'log-out':break;
		case 'random':
			//F_Move(V_AreaName,true);
			break;
		default:break;
	}
});

//
// P a g e   B u t t o n s
// *******************************************************************************

//
// Function - Construct Page Buttons
function F_ConstructPageButtons(v_CellNumber){
	var a_Buttons=eval({
		1:{'on':true,'button':true,'value':1},
		2:{'on':false,'button':false,'value':'...'},
		3:{'on':false,'button':true,'value':2},
		4:{'on':false,'button':true,'value':3},
		5:{'on':false,'button':true,'value':4},
		6:{'on':false,'button':false,'value':'...'}
	});
	if(A_Data[v_CellNumber]['page']['current-page']<3){
		if(A_Data[v_CellNumber]['page']['total-pages']>1){
			a_Buttons[3]['on']=true;
			a_Buttons[3]['value']=2;
		}
		if(A_Data[v_CellNumber]['page']['total-pages']>2){
			a_Buttons[4]['on']=true;
			a_Buttons[4]['value']=3;
		}
		if(A_Data[v_CellNumber]['page']['total-pages']>3){
			a_Buttons[6]['on']=true;
		}
		if(A_Data[v_CellNumber]['page']['current-page']==2&&A_Data[v_CellNumber]['page']['total-pages']>3){
			a_Buttons[5]['on']=true;
			a_Buttons[5]['value']=4;
		}
	}else if(A_Data[v_CellNumber]['page']['current-page']==A_Data[v_CellNumber]['page']['total-pages']){
		a_Buttons[5]['on']=true;
		a_Buttons[5]['value']=A_Data[v_CellNumber]['page']['total-pages'];
		a_Buttons[4]['on']=true;
		a_Buttons[4]['value']=A_Data[v_CellNumber]['page']['total-pages']-1;
		a_Buttons[3]['on']=true;
		a_Buttons[3]['value']=A_Data[v_CellNumber]['page']['total-pages']-2;
		if(A_Data[v_CellNumber]['page']['total-pages']-A_Data[v_CellNumber]['page']['current-page']>2){
			a_Buttons[6]['on']=true;
		}
		if(A_Data[v_CellNumber]['page']['current-page']>3){
			a_Buttons[2]['on']=true;
		}
	}else{
		if(A_Data[v_CellNumber]['page']['current-page']>3){
			a_Buttons[2]['on']=true;
		}
		if(A_Data[v_CellNumber]['page']['total-pages']-A_Data[v_CellNumber]['page']['current-page']>1){
			a_Buttons[6]['on']=true;
		}
		a_Buttons[3]['on']=true;
		a_Buttons[3]['value']=A_Data[v_CellNumber]['page']['current-page']-1;
		a_Buttons[4]['on']=true;
		a_Buttons[4]['value']=A_Data[v_CellNumber]['page']['current-page'];
		a_Buttons[5]['on']=true;
		a_Buttons[5]['value']=parseInt(A_Data[v_CellNumber]['page']['current-page'])+1;
	}
	$('#button-page-list').html('<font class="font-bold font-X" style="float:left; font-size:10px; margin-left:4px; margin-right:2px; text-align:center; vertical-align:top; width:auto;">Page</font>');
	for(var v_Key in a_Buttons){
		if(a_Buttons[v_Key]['on']){
			if(a_Buttons[v_Key]['button']){
				// Buttons
				$('#button-page-list').append('<div class="page-click '+((a_Buttons[v_Key]['value']==A_Data[v_CellNumber]['page']['current-page'])?'current-page-button':'button-accent')+'" id="button-page" name="'+a_Buttons[v_Key]['value']+'" onfocus="javascript:this.blur();" style="float:left; margin-right:4px; height:12px; text-align:center; vertical-align:top; width:18px;"><font class="font-G" style="font-weight:bold; font-size:10px; vertical-align:top;">'+a_Buttons[v_Key]['value']+'</font></div>');
			}else{
				// Text
				$('#button-page-list').append('<font class="font-bold font-G" style="float:left; font-size:10px; margin-right:4px; vertical-align:top; text-align:center; width:20px;">'+a_Buttons[v_Key]['value']+'</font>');
			}
		}
	}
}


//
// O t h e r

//
// Function - Array Key Exists
function F_ArrayKeyExists(v_Key,a_Array){for(var v_ArrayKey in a_Array){if(v_ArrayKey==v_Key){return true;}}return false;}
//
// Function - Print R
function F_PrintR(a_Print,v_Counter,v_Alert){function f_AddSpace(v_Counter){var v_Spaces='';for(var v_Space=0;v_Space<v_Counter;v_Space++){v_Spaces+=' ';}return v_Spaces;}var v_HTML='';if(isNaN(v_Counter)){v_Counter=0;}else{v_Counter++;}for(var v_Key in a_Print){v_HTML+=f_AddSpace(v_Counter*2)+((typeof a_Print[v_Key]=='object')?v_Key+' {\n'+F_PrintR(a_Print[v_Key],v_Counter)+'}\n':v_Key+' => '+a_Print[v_Key]+'\n');}if(v_Alert){alert(v_HTML);}else{return v_HTML;}}




























//
// Arrays and Variables

//
// Array - User
var A_User=eval({
	'logged-in':false
});
//
// Variable - Loading (Counter)
var V_Loading=0;
//
// Variable - URL
var V_URL='';

//
// Automatic



//
// Functions

//
// Function - Close Dockable
function F_CloseDockable(){
	$('#dockable-close-link').hide();
	if(!A_User['logged-in']){$('#user-access').css('visibility','visible');}
	$('#dockable-window').css({'visibility':'hidden'});
	$('#dockable-content').css({'visibility':'hidden'});
	//$('#dockable-content').attr('src','');
}
//
// Function - Start Loading
// function F_StartLoading(){V_Loading++;if(V_Loading>0){$('#loading-dots').show();}}
//
// Function - Stop Loading
// function F_StopLoading(){V_Loading--;if(V_Loading<1){V_Loading=0;$('#loading-dots').hide();}}

//
// Live - Browse Link / Catalog Link / Database Dockable
$('.browse-link,.catalog-link,.database-dockable').live('click',function(){F_OpenDockable($(this).attr('name'));return false;});
//
// Live - Close Link
$('.close-link').live('click',function(){F_CloseDockable();});
//
// Live - Date Click
$('.date-click').live('click',function(){
	alert('this is still being used?');
	var v_Text=$(this).attr('ID');
	if(v_Text!==''){F_AddDateSearch(v_Text,$(this).html());}else{F_RemoveDateSearch();}
	A_Displays[V_Area].f_SendCommandRequest('change-date');
});
// Live - Drops
$('.drops:visible').live('mouseover',function(){
	$(this).fadeTo(0,1.00);
});
// Live - Drops
$('.drops:visible').live('mouseout',function(){
	$(this).fadeTo(0,0.50);
});
// Live - Drops
$('.drops:visible').live('click',function(){
	$('#'+$(this).attr('ID')+'-lines').show();
});
// Live - Drops Out Top
$('.drops-out-top:visible').live('mouseleave',function(){
	$('#'+($(this).attr('ID')).replace('container-','')+'-drops-lines').hide();
});
// Live - Drops Out
$('.drops-out:visible').live('mouseleave',function(){
	$(this).hide();
});
