// LAPCAT - Client
// 2010-02-01
// Array - Areas
//
// Array - Areas
var A_Areas={
	'home':{'change-tag':true,'change-tag-RSS':false,'change-popular':true,'change-search':false,'change-sort':false,'date-selector':false,'month-view':false},
	'news':{'change-tag':true,'change-tag-RSS':true,'change-popular':false,'change-search':false,'change-sort':true,'date-selector':false,'month-view':false},
	'events':{'change-tag':true,'change-tag-RSS':true,'change-popular':false,'change-search':true,'change-sort':true,'date-selector':true,'month-view':true},
	'materials':{'change-tag':true,'change-tag-RSS':true,'change-popular':false,'change-search':false,'change-sort':false,'date-selector':false,'month-view':false},
	'databases':{'change-tag':true,'change-tag-RSS':false,'change-popular':false,'change-search':false,'change-sort':true,'date-selector':false,'month-view':false},
	'hours':{'change-tag':false,'change-tag-RSS':false,'change-popular':false,'change-search':false,'change-sort':false,'date-selector':false,'month-view':false},
	'hiring':{'change-tag':false,'change-tag-RSS':false,'change-popular':false,'change-search':false,'change-sort':false,'date-selector':false,'month-view':false}
};
// Array - Displays
var A_Displays={
	0:{
		'active':false,
		'alias':'home'
	},
	1:{
		'active':true,
		'alias':'materials',
		'data':{},
		'header':'',
		'image-size':'S',
		'line-HTML':600,
		'list-HTML':300,
		'open-line-data':{},
		'open-line-HTML':10,
		'special-line-HTML':1,
		'page':{},
		'refresh':{
			'counter':0,
			'on':false,
			'ready':true,
			'timer':30000
		},
		'show':{
			'cover-images':true,
			'header':true,
			'open-line':true,
			'special-line':false
		},
		'special-data':{},
		'target':0,
		'expanded':{
			'content':{
				'height':'auto',
				'width':'820px'
			},
			'height':{
				'container':'180px',
				'data':'180px',
				'open-line-data':'auto'
			},
			'width':{
				'container':'820px',
				'data':'820px',
				'open-line-data':'820px'
			}
		},
		'shrunk':{
			'content':{
				'height':'205px',
				'width':'820px'
			},
			'height':{
				'container':'205px',
				'data':'205px',
				'open-line-data':'205px'
			},
			'width':{
				'container':'820px',
				'data':'820px',
				'open-line-data':'0px'
			}
		},
		'size':'shrunk',
		'switch':{},
		'URL':'/quick/materials/suggest'
	},
	2:{
		'active':true,
		'alias':'events',
		'data':{},
		'expanded':{
			'content':{
				'height':'auto',
				'width':'820px'
			},
			'height':{
				'container':'482px',
				'data':'482px',
				'open-line-data':'auto'
			},
			'width':{
				'container':'820px',
				'data':'322px',
				'open-line-data':'820px'
			}
		},
		'header':'',
		'image-size':'S',
		'line-HTML':200,
		'list-HTML':300,
		'open-line-data':{},
		'open-line-HTML':10,
		'page':{},
		'refresh':{
			'counter':0,
			'on':false,
			'ready':true,
			'timer':30000
		},
		'show':{
			'cover-images':false,
			'header':true,
			'open-line':true,
			'special-line':false
		},
		'shrunk':{
			'content':{
				'height':'298px',
				'width':'322px'
			},
			'height':{
				'container':'298px',
				'data':'298px',
				'open-line-data':'298px'
			},
			'width':{
				'container':'322px',
				'data':'322px',
				'open-line-data':'0px'
			}
		},
		'size':'shrunk',
		'special-data':{},
		'switch':{},
		'target':0,
		'URL':'/quick/events/suggest'
	},
	3:{
		'active':true,
		'alias':'news',
		'data':{},
		'expanded':{
			'content':{
				'height':'auto',
				'width':'820px'
			},
			'height':{
				'container':'482px',
				'data':'482px',
				'open-line-data':'auto'
			},
			'width':{
				'container':'820px',
				'data':'322px',
				'open-line-data':'820px'
			}
		},
		'header':'',
		'image-size':'S',
		'line-HTML':300,
		'list-HTML':300,
		'open-line-data':{},
		'open-line-HTML':10,
		'page':{},
		'refresh':{
			'counter':0,
			'on':false,
			'ready':true,
			'timer':30000
		},
		'show':{
			'cover-images':false,
			'header':true,
			'open-line':true,
			'special-line':false
		},
		'shrunk':{
			'content':{
				'height':'298px',
				'width':'322px'
			},
			'height':{
				'container':'298px',
				'data':'298px',
				'open-line-data':'298px'
			},
			'width':{
				'container':'322px',
				'data':'322px',
				'open-line-data':'0px'
			}
		},
		'size':'shrunk',
		'special-data':{},
		'switch':'',
		'target':0,
		'URL':'/quick/news/suggest'
	}
};
// Variable - Current Display
var V_CurrentDisplay=0;
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
// Variable - Home Library
var V_HomeLibrary=0;
// M a s t e r   F a d e
//
// Variable - Master Fade Counter
var V_MasterFadeCounter=0;
// Function - Master Fade Count Down
function F_MasterFadeCountDown(){if(V_MasterFadeCounter>0){V_MasterFadeCounter--;if(V_MasterFadeCounter==0){$('#destination-content').fadeIn('fast');}else if(V_MasterFadeCounter==1){$('#loader').hide();}}else{return;}}

//
// Function - Process Data
function F_ProcessData(v_CellNumber){
	switch(A_Displays[v_CellNumber]['switch']){
		case 'failed':
			F_ApplyEmptyDisplay(v_CellNumber);
			return;
			break;
		case 'data':
			F_ApplyData(v_CellNumber);
			F_ApplyHeader(v_CellNumber);
			if(A_Displays[v_CellNumber]['show']['cover-images']){F_RequestCovers(v_CellNumber,A_Displays[v_CellNumber]['image-size']);}
			if(A_Displays[v_CellNumber]['refresh']['on']){F_PrepareRefresh(v_CellNumber);}
		default:
			break;
	}
	if(V_CurrentDisplay==v_CellNumber){F_ConstructPageButtons(v_CellNumber);}
	$('[name="magnify"]').show();
	$('[name="library-8"]').removeClass('library-link-1').addClass('library-link-3 font-M');
	$('[name="library-'+V_HomeLibrary+'"]').removeClass('library-link-1').addClass('library-link-3 font-M');
}
$('#content-1')
	.live('process-data',function(){
		$(this).fadeOut('fast',function(){
			F_ProcessData(1);
			if(A_Displays[1]['active']){if(!A_Displays[1]['show']['special-line']||A_Displays[1]['target']<1){$('#content-1').fadeIn('fast');}}
			F_MasterFadeCountDown();
		});
	})
	.live('expand',function(){
		$('#destination-content').fadeOut('fast',function(){
			F_Expand(1);
		}).fadeIn('fast');
	})
	.live('open-line',function(){
		if(A_Displays[1]['show']['open-line']){F_ApplyOpenLineData(1);}
	})
	.live('shrink',function(){
		$(this).fadeOut('fast',function(){
			F_Shrink(1);
		}).fadeIn('fast');
	});
$('#content-2')
	.live('process-data',function(){
		$(this).fadeOut('fast',function(){
			F_ProcessData(2);
			if(A_Displays[2]['active']){if(!A_Displays[2]['show']['special-line']||A_Displays[2]['target']<1){$('#content-1').fadeIn('fast');}}
			F_MasterFadeCountDown();
		}).fadeIn('fast');
	})
	.live('expand',function(){
		$('#destination-content').fadeOut('fast',function(){
			F_Expand(2);
		}).fadeIn('fast');
	})
	.live('open-line',function(){
		if(A_Displays[2]['show']['open-line']){F_ApplyOpenLineData(2);}
	})
	.live('shrink',function(){
		$(this).fadeOut('fast',function(){
			F_Shrink(2);
		}).fadeIn('fast');
	});
$('#content-3')
	.live('process-data',function(){
		$(this).fadeOut('fast',function(){
			F_ProcessData(3);
			if(A_Displays[3]['active']){if(!A_Displays[3]['show']['special-line']||A_Displays[3]['target']<1){$('#content-1').fadeIn('fast');}}
			F_MasterFadeCountDown();
		}).fadeIn('fast');
	})
	.live('expand',function(){
		$('#destination-content').fadeOut('fast',function(){
			F_Expand(3);
		}).fadeIn('fast');
	})
	.live('open-line',function(){
		if(A_Displays[3]['show']['open-line']){F_ApplyOpenLineData(3);}
	})
	.live('shrink',function(){
		$(this).fadeOut('fast',function(){
			F_Shrink(3);
		}).fadeIn('fast');
	});

$(document).ready(function(){
	F_ConstructAll();
	F_BlindAll();
	F_ShrinkAll();
	F_RequestPopularTags();
	F_ShowSearchMenu('home');
	$('.drops').fadeTo(0,0.50);
	F_RequestMonthViewData();
});
//
// Function - Expand
function F_Expand(v_CellNumber){
	V_CurrentDisplay=v_CellNumber;
	F_TurnCalendarOff();
	F_ToggleMenuHighlight(v_CellNumber);
	F_HideOthers(v_CellNumber);
	F_ChangeMagnifier(v_CellNumber,'out');
	F_ShowMe(v_CellNumber);
	if(A_Displays[v_CellNumber]['show']['special-line']){F_ApplySpecialLineData(v_CellNumber);}else{F_TurnSpecialLineOff();}
	F_AdjustSize(v_CellNumber,'expanded');
	if(A_Displays[v_CellNumber]['show']['open-line']){F_ApplyOpenLineData(v_CellNumber);}
	F_ConstructPageButtons(v_CellNumber);
	$('#button-page-list').css('visibility','visible');
}
// Function - Shrink
function F_Shrink(v_CellNumber){
	F_ToggleMenuHighlight(0);
	F_ChangeMagnifier(v_CellNumber,'in');
	F_ShowAll();
	F_AdjustSize(v_CellNumber,'shrunk');
	if(A_Displays[v_CellNumber]['refresh']['on']){F_PrepareRefresh(v_CellNumber);}
}
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
	if(A_Displays[v_CellNumber]['page']['current-page']<3){
		if(A_Displays[v_CellNumber]['page']['total-pages']>1){
			a_Buttons[3]['on']=true;
			a_Buttons[3]['value']=2;
		}
		if(A_Displays[v_CellNumber]['page']['total-pages']>2){
			a_Buttons[4]['on']=true;
			a_Buttons[4]['value']=3;
		}
		if(A_Displays[v_CellNumber]['page']['total-pages']>3){
			a_Buttons[6]['on']=true;
		}
		if(A_Displays[v_CellNumber]['page']['current-page']==2&&A_Displays[v_CellNumber]['page']['total-pages']>3){
			a_Buttons[5]['on']=true;
			a_Buttons[5]['value']=4;
		}
	}else if(A_Displays[v_CellNumber]['page']['current-page']==A_Displays[v_CellNumber]['page']['total-pages']){
		a_Buttons[5]['on']=true;
		a_Buttons[5]['value']=A_Displays[v_CellNumber]['page']['total-pages'];
		a_Buttons[4]['on']=true;
		a_Buttons[4]['value']=A_Displays[v_CellNumber]['page']['total-pages']-1;
		a_Buttons[3]['on']=true;
		a_Buttons[3]['value']=A_Displays[v_CellNumber]['page']['total-pages']-2;
		if(A_Displays[v_CellNumber]['page']['total-pages']-A_Displays[v_CellNumber]['page']['current-page']>2){
			a_Buttons[6]['on']=true;
		}
		if(A_Displays[v_CellNumber]['page']['current-page']>3){
			a_Buttons[2]['on']=true;
		}
	}else{
		if(A_Displays[v_CellNumber]['page']['current-page']>3){
			a_Buttons[2]['on']=true;
		}
		if(A_Displays[v_CellNumber]['page']['total-pages']-A_Displays[v_CellNumber]['page']['current-page']>1){
			a_Buttons[6]['on']=true;
		}
		a_Buttons[3]['on']=true;
		a_Buttons[3]['value']=A_Displays[v_CellNumber]['page']['current-page']-1;
		a_Buttons[4]['on']=true;
		a_Buttons[4]['value']=A_Displays[v_CellNumber]['page']['current-page'];
		a_Buttons[5]['on']=true;
		a_Buttons[5]['value']=parseInt(A_Displays[v_CellNumber]['page']['current-page'])+1;
	}
	$('#button-page-list').html('<font class="font-bold font-X" style="float:left; font-size:10px; margin-left:4px; margin-right:2px; text-align:center; vertical-align:top; width:auto;">Page</font>');
	for(var v_Key in a_Buttons){
		if(a_Buttons[v_Key]['on']){
			if(a_Buttons[v_Key]['button']){
				// Buttons
				$('#button-page-list').append('<div class="page-click '+((a_Buttons[v_Key]['value']==A_Displays[v_CellNumber]['page']['current-page'])?'current-page-button':'button-accent')+'" id="button-page" name="'+a_Buttons[v_Key]['value']+'" onfocus="javascript:this.blur();" style="float:left; margin-right:4px; height:12px; text-align:center; vertical-align:top; width:18px;"><font class="font-G" style="font-weight:bold; font-size:10px; vertical-align:top;">'+a_Buttons[v_Key]['value']+'</font></div>');
			}else{
				// Text
				$('#button-page-list').append('<font class="font-bold font-G" style="float:left; font-size:10px; margin-right:4px; vertical-align:top; text-align:center; width:20px;">'+a_Buttons[v_Key]['value']+'</font>');
			}
		}
	}
}
//
// Function - Request Month View Data
function F_RequestMonthViewData(){$.getJSON('quick/month-view',function(o_JSON){F_InitializeMonthView(o_JSON);});}
//
// Function - Show Calendar
function F_ShowCalendar(){$('#destination-content').fadeOut('fast',function(){$('#stage-month-view').fadeIn('fast');$('#option-month-view').hide();$('#option-list-view').show();});};
//
// Function - Show List
function F_ShowList(){$('#stage-month-view').fadeOut('fast',function(){$('#destination-content').fadeIn('fast');$('#option-list-view').hide();$('#option-month-view').show();});}
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
// Function - Set Popular Tags
function F_SetPopularTags(o_JSON){for(var v_Tag in o_JSON['data']){A_Drops['home']['popular'][o_JSON['data'][v_Tag]['ID']]=eval({'name':o_JSON['data'][v_Tag]['name'],'value':o_JSON['data'][v_Tag]['ID']});}F_PopulateDrops('home',true,'popular');}
//
// Function - Add Tag Search
function F_AddTagSearch(v_Value,v_Text){A_Search['tag']={'on':true,'previous':A_Search['tag']['current'],'current':{'ID':v_Value,'text':v_Text}};$('#change-tag-master').attr('value',v_Text);$('#tag-selected').show();}
//
// Live Event - Remove Tag
$('.remove-tag').live('click',function(){F_ChangeTagSearch(0);});
//
// Function - Remove Tag Search
function F_RemoveTagSearch(){A_Search['tag']={'on':false,'previous':A_Search['tag']['current'],'current':{'ID':0,'text':''}};$('#change-tag-master').attr('value','search here');$('#tag-selected').hide();}
//
// Function - Change Tag Search
function F_ChangeTagSearch(v_Value,v_Text){$('#change-tag-drops-lines').hide();if(v_Value>0){F_AddTagSearch(v_Value,v_Text);if(A_Search['popular']['on']){F_RemovePopularSearch();}}else{F_RemoveTagSearch();}F_MakeRequest('tag',v_Value);F_RequestPopularTags();}
//
// Live Event - Tag Change
$('.tag-change').live('click',function(){var v_Value=parseInt($(this).attr('ID').replace('value-',''));var v_Text=$(this).html();F_ChangeTagSearch(v_Value,v_Text);return false;});
//
// Live Event - Tag Box (Key Down)
$('.tag-box').live('keyup',function(){if($(this).attr('value').length>0){$('#change-tag-drops-lines').show();F_PopulateAutoDrop($(this).attr('value'))}else{$('#change-tag-drops-lines').hide();}});
//
// Live Event - Text
$(':text').live('click',function(){$(this).select();$(this).focus();});
//
// Live Event - Drops
$('.drops:visible').live('mouseover',function(){$(this).fadeTo(0,1.00);});
//
// Live Event - Drops
$('.drops:visible').live('mouseout',function(){$(this).fadeTo(0,0.50);});
//
// Live Event - Drops
$('.drops:visible').live('click',function(){$('#'+$(this).attr('ID')+'-lines').show();});
//
// Live Event - Drops Out Top
$('.drops-out-top:visible').live('mouseleave',function(){$('#'+($(this).attr('ID')).replace('container-','')+'-drops-lines').hide();});
//
// Live Event - Drops Out
$('.drops-out:visible').live('mouseleave',function(){$(this).hide();});
//
// Live Event - Page Click
$('.page-click').live('click',function(){F_MakeRequest('page',$(this).attr('name'));});
//
// Live Event - Events Line Click
$('.line-click').live('click',function(){
	var v_LineKey=$(this).attr('name').replace(/counter-/g,'');
	var a_ID=$(this).attr('ID').split('-');
	F_LineClick(F_GetCellNumber(a_ID[0]),v_LineKey);
});
//
// Function - Line Click
function F_LineClick(v_CellNumber,v_LineKey){
	A_Displays[v_CellNumber]['target']=v_LineKey-1;
	$('.open-line:visible').removeClass('open-line');
	if(v_CellNumber>0){$('#content-'+v_CellNumber).trigger(((A_Displays[v_CellNumber]['size']=='shrunk')?'expand':'open-line'));}
}
//
// Live Event - Menu Move Click
$('.menu-move-click').live('click',function(){
	var v_CellNumber=F_GetCellNumber($(this).attr('ID').replace(/menu-/g,''));
	if(v_CellNumber>0){$('#content-'+v_CellNumber).trigger('expand');}else{F_ShrinkAll();}
	F_ShowSearchMenu(A_Displays[v_CellNumber]['alias']);
});
//
// Live Event - Move To Click
$('.move-to-click').live('click',function(){
	var v_CellNumber=F_GetCellNumber($(this).attr('ID').replace(/tab-/g,''));
	if(v_CellNumber>0){$('#content-'+v_CellNumber).trigger('expand');}else{F_ShrinkAll();}
});
//
// Live Event - Magnifier Click
$('.magnifier-click').live('click',function(){
	var v_CellNumber=F_GetCellNumber($(this).attr('ID').replace(/tab-/g,''));
	A_Displays[v_CellNumber]['target']=$(this).attr('name').replace(/counter-/g,'');
	A_Displays[v_CellNumber]['special-data']=A_Displays[v_CellNumber]['data'][A_Displays[v_CellNumber]['target']-1];
	$('#content-'+v_CellNumber).trigger(((A_Displays[v_CellNumber]['size']=='shrunk')?'expand':'shrink'));
});
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
// Function - Adjust Size
function F_AdjustSize(v_CellNumber,v_Size){
	A_Displays[v_CellNumber]['size']=v_Size;
	$('#content-'+v_CellNumber).css('height',A_Displays[v_CellNumber][v_Size]['content']['height']).css('width',A_Displays[v_CellNumber][v_Size]['content']['width']);
	for(var v_Key in A_Displays[v_CellNumber][v_Size]['height']){$('#content-'+v_CellNumber).find('#'+v_Key).css('height',A_Displays[v_CellNumber][v_Size]['height'][v_Key]);}
	for(var v_Key in A_Displays[v_CellNumber][v_Size]['width']){$('#content-'+v_CellNumber).find('#'+v_Key).css('width',A_Displays[v_CellNumber][v_Size]['width'][v_Key]);}
}
//
// Function - Apply Data
function F_ApplyData(v_CellNumber){
	var v_HTML=F_CopyHTML('line-HTML-'+A_Displays[v_CellNumber]['line-HTML']);
	$('#content-'+v_CellNumber).find('#data').html('');
	$('#content-'+v_CellNumber).find('#replace-master').attr('ID','tab-'+A_Displays[v_CellNumber]['alias']);
	for(var v_Key in A_Displays[v_CellNumber]['data']){
		$('#content-'+v_CellNumber).find('#data')
			.append(F_ConstructAndReplace(v_HTML,A_Displays[v_CellNumber]['data'][v_Key]));
	}
	F_ShowIcons(v_CellNumber);
}
//
// Function - Show Icons
function F_ShowIcons(v_CellNumber){
	for(var v_Key in A_Displays[v_CellNumber]['data']){
		for(var v_SubKey in A_Displays[v_CellNumber]['data'][v_Key]){
			v_Show=0;
			switch(v_SubKey){
				case 'summer':v_Show=10;break;
				case 'slider':v_Show=11;break;
				case 'tournament':v_Show=94;break;
				case 'rating':
					if(A_Displays[v_CellNumber]['data'][v_Key][v_SubKey]>=8){v_Show=33;
					}else if(A_Displays[v_CellNumber]['data'][v_Key][v_SubKey]>=6){v_Show=50;
					}else if(A_Displays[v_CellNumber]['data'][v_Key][v_SubKey]>=4){v_Show=51;}
					break;
				default:
					break;
			}
			if(v_Show>0){$('#icon-'+A_Displays[v_CellNumber]['data'][v_Key]['ID']+'-'+v_Show).show();}
		}
	}
}
//
// Function - Apply Empty Display
function F_ApplyEmptyDisplay(v_CellNumber){
	var o_HTML=$(F_CopyHTML('list-HTML-'+A_Displays[v_CellNumber]['list-HTML']));
	o_HTML.find('#header').html('No results.');
	$('#change-tag-RSS:visible').attr('title','');
	var v_HTML='<font class="font-italic font-X" style="font-size:12px; margin-left:4px;">There are no '+A_Displays[v_CellNumber]['alias']+' that match the following search:</font><br/><font class="font-X" style="font-size:14px; margin-left:12px;">'+A_Displays[v_CellNumber]['header']+'</font><br/><font class="font-italic font-X" style="font-size:12px; margin-left:4px; margin-top:3px;">Suggestions:</font>';
	if(A_Search['tag']['on']){
		v_HTML+='<br/><font class="font-G" style="font-size:14px; margin-left:12px;">Search the catalog for <span class="catalog-link fake-link" name="http://catalog.lapcat.org/search/X?SEARCH='+A_Search['tag']['current']['text']+'&SORT=D&searchscope=12" ID="'+A_Search['tag']['current']['ID']+'">'+A_Search['tag']['current']['text']+'</span>.</font>';
		v_HTML+='<br/><a class="font-G remove-tag fake-link" name="tag/drop" style="font-size:14px; margin-left:12px; text-decoration:underline;">Remove</a><font class="font-G" style="font-size:14px;"> (<font class="font-G" style="font-size:12px; font-style:italic;">'+A_Search['tag']['current']['text']+'</font>) from this search.</font>';
	}else if(A_Search['popular']['on']){
		v_HTML+='<br/><font class="font-G" style="font-size:14px; margin-left:12px;">Search the catalog for <span class="catalog-link fake-link" name="http://catalog.lapcat.org/search/X?SEARCH='+A_Search['popular']['current']['text']+'&SORT=D&searchscope=12" ID="'+A_Search['popular']['current']['ID']+'">'+A_Search['popular']['current']['text']+'</span>.</font>';
		v_HTML+='<br/><a class="font-G remove-tag fake-link" name="tag/drop" style="font-size:14px; margin-left:12px; text-decoration:underline;">Remove</a><font class="font-G" style="font-size:14px;"> (<font class="font-G" style="font-size:12px; font-style:italic;">'+A_Search['popular']['current']['text']+'</font>) from this search.</font>';
	}
	if(F_HasSearchCriteria()){v_HTML+='<br/><a class="simple-click fake-link font-G" ID="button-reset" style="font-size:14px; margin-left:12px; text-decoration:underline;">Reset</a><font class="font-G" style="font-size:14px;"> this search.</font>';}
	v_HTML+='</font>';
	o_HTML.find('#data').html(v_HTML);
	$('#content-'+v_CellNumber).html(o_HTML.html());
}
//
// Function - Apply Header
function F_ApplyHeader(v_CellNumber){$('#content-'+v_CellNumber).find('#header').html(A_Displays[v_CellNumber]['header']);}
//
// Function - Apply Open Line
function F_ApplyOpenLineData(v_CellNumber){
	$('#content-'+v_CellNumber).find('#open-line-data').html(F_CopyHTML('open-line-HTML-'+A_Displays[v_CellNumber]['open-line-HTML']));
	var v_HTML=F_CopyHTML('stage-'+A_Displays[v_CellNumber]['alias']+'-content');
	if(!F_ArrayKeyExists(A_Displays[v_CellNumber]['target'],A_Displays[v_CellNumber]['open-line-data'])){return;}
	$('#content-'+v_CellNumber).find('#'+A_Displays[v_CellNumber]['alias']+'-'+A_Displays[v_CellNumber]['open-line-data'][A_Displays[v_CellNumber]['target']]['ID']).addClass('open-line');
	$('#content-'+v_CellNumber).find('#content-open-line')
		.html(F_ConstructAndReplace(v_HTML,A_Displays[v_CellNumber]['open-line-data'][A_Displays[v_CellNumber]['target']]));
}
//
// Function - Apply Special Line
function F_ApplySpecialLineData(v_CellNumber){
	var v_Target=A_Displays[v_CellNumber]['target'];
	if(v_Target>0){
		//$('#special-line').html();
		$('#special-line').html(F_CopyHTML('special-line-HTML-'+A_Displays[v_CellNumber]['special-line-HTML']));
		F_TurnSpecialLineOn(v_CellNumber,v_Target);
	}
}
//
// Function - Array Key Exists
function F_ArrayKeyExists(v_Key,a_Array){for(var v_ArrayKey in a_Array){if(v_ArrayKey==v_Key){return true;}}return false;}
//
// Function - Blind All
function F_BlindAll(){
	V_MasterFadeCounter=0;
	$('#destination-content').fadeOut('fast',function(){$('#loader').fadeIn('fast');});
	for(var v_Key in A_Displays){if(v_Key>0){F_BlindRequest(v_Key);}}
}
//
// Function - Blind Request
function F_BlindRequest(v_CellNumber,v_NoMasterFade){
	if(!v_NoMasterFade){V_MasterFadeCounter++;}
	$.getJSON(A_Displays[v_CellNumber]['URL'],function(o_JSON){
		if(A_Displays[v_CellNumber]['active']){
			F_StoreData(v_CellNumber,o_JSON);
			F_CleanData(v_CellNumber);
			$('#content-'+v_CellNumber).trigger('process-data');
		}
	});
}
//
// Function - Change Magnifier
function F_ChangeMagnifier(v_CellNumber,v_InOrOut){$('#content-'+v_CellNumber).find('[name="magnify"]').attr('ID','tab-'+A_Displays[v_CellNumber]['alias']).attr('src','http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_'+v_InOrOut+'.png');}
//
// Function - Clean
function F_Clean(v_Data){return v_Data.replace(/\\'/g,'\'').replace(/\\"/g,'"').replace(/\\0/g,'\0').replace(/\\\\/g,'\\');} 
//
// Function - Clean Data
function F_CleanData(v_CellNumber){for(var v_Key in A_Displays[v_CellNumber]['data']){for(var v_SubKey in A_Displays[v_CellNumber]['data'][v_Key]){switch(v_SubKey){case 'name':case 'title':A_Displays[v_CellNumber]['data'][v_Key]['clean-name']=F_Clean(A_Displays[v_CellNumber]['data'][v_Key][v_SubKey]);A_Displays[v_CellNumber]['data'][v_Key]['dirty-name']=F_Dirty(A_Displays[v_CellNumber]['data'][v_Key][v_SubKey]);break;default:break;}}}}
//
// Function - Construct All
function F_ConstructAll(){for(var v_Key in A_Displays){if(v_Key>0){F_ConstructCell(v_Key);}}}
//
// Function - Construct And Replace
function F_ConstructAndReplace(v_HTML,a_Data){for(var v_Key in a_Data){while(v_HTML.indexOf('replace-'+v_Key)>-1){v_HTML=v_HTML.replace('replace-'+v_Key,a_Data[v_Key]);}}return v_HTML;};
//
// Function - Construct Cell
function F_ConstructCell(v_CellNumber){var v_HTML=F_CopyHTML('list-HTML-'+A_Displays[v_CellNumber]['list-HTML']);$('#content-'+v_CellNumber).html(v_HTML);}
//
// Function - Copy HTML
function F_CopyHTML(v_ElementID){return $('#'+v_ElementID).html();}
//
// Function - Dirty
function F_Dirty(v_Data){return escape(v_Data);}
//
// Function - Get Cell Number
function F_GetCellNumber(v_Alias){for(var v_CellNumber in A_Displays){if(A_Displays[v_CellNumber]['alias']==v_Alias){return v_CellNumber;}}}
//
// Function - Has Search Criteria
function F_HasSearchCriteria(){var v_Counter=0;for(var v_SearchKey in A_Search){if(A_Search[v_SearchKey]['on']){v_Counter++;}}if(v_Counter>0){return true;}return false;}
//
// Function - Hide Others
function F_HideOthers(v_CellNumber){for(var v_Key in A_Displays){if(parseInt(v_Key)!==v_CellNumber){$('#content-'+v_Key).hide();A_Displays[v_Key]['active']=false;}}}
//
// Function - Make Request
function F_MakeRequest(v_Request,v_Optional){
	switch(v_Request){
		case 'page':F_RequestData(V_CurrentDisplay,'quick/'+A_Displays[V_CurrentDisplay]['alias']+'/change-'+v_Request+'/'+v_Optional,true);break;
		case 'tag':F_RequestAll(v_Request,v_Optional);break;
		default:break;
	}
}
//
// Function - Prepare Refresh
function F_PrepareRefresh(v_CellNumber){A_Displays[v_CellNumber]['refresh']['ready']=true;A_Displays[v_CellNumber]['refresh']['counter']++;setTimeout('F_Refresh(\''+v_CellNumber+'\',\''+A_Displays[v_CellNumber]['refresh']['counter']+'\');',A_Displays[v_CellNumber]['refresh']['timer']);}
//
// Function - Print R
function F_PrintR(a_Print,v_Counter,v_Alert){function f_AddSpace(v_Counter){var v_Spaces='';for(var v_Space=0;v_Space<v_Counter;v_Space++){v_Spaces+=' ';}return v_Spaces;}var v_HTML='';if(isNaN(v_Counter)){v_Counter=0;}else{v_Counter++;}for(var v_Key in a_Print){v_HTML+=f_AddSpace(v_Counter*2)+((typeof a_Print[v_Key]=='object')?v_Key+' {\n'+F_PrintR(a_Print[v_Key],v_Counter)+'}\n':v_Key+' => '+a_Print[v_Key]+'\n');}if(v_Alert){alert(v_HTML);}else{return v_HTML;}}
//
// Function - Refresh
function F_Refresh(v_CellNumber,v_RefreshCounter){if(A_Displays[v_CellNumber]['active']){if(A_Displays[v_CellNumber]['refresh']['counter']==v_RefreshCounter){if(A_Displays[v_CellNumber]['refresh']['ready']){F_BlindRequest(v_CellNumber);}}}}
//
// Function - Request Data
function F_RequestData(v_CellNumber,v_URL,v_NoMasterFade){
	if(!v_NoMasterFade){V_MasterFadeCounter++;}
	$.getJSON(v_URL,function(o_JSON){
		F_StoreData(v_CellNumber,o_JSON);
		F_CleanData(v_CellNumber);
		$('#content-'+v_CellNumber).trigger('process-data');
	});
}
//
// Function - Request All
function F_RequestAll(v_Request,v_Optional){
	V_MasterFadeCounter=0;
	$('#destination-content').fadeOut('fast',function(){$('#loader').fadeIn('fast');});
	for(var v_Key in A_Displays){
		if(v_Key>0){
			switch(v_Request){
				case 'tag':F_RequestData(v_Key,'quick/'+A_Displays[v_Key]['alias']+'/change-'+v_Request+'/'+v_Optional);break;
				default:break;
			}
		}
	}
}
//
// Function - Request Covers
function F_RequestCovers(v_CellNumber,v_CheckSize){
	var a_Images=[];
	for(var v_Key in A_Displays[v_CellNumber]['data']){
		a_Images[v_Key]=new Image();
		a_Images[v_Key].src='http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=S&Value='+A_Displays[v_CellNumber]['data'][v_Key]['ISBNorSN'];
		a_Images[v_Key].alt='suggestions-'+A_Displays[v_CellNumber]['data'][v_Key]['ISBNorSN']+'-cover';
		a_Images[v_Key].onload=function(){
			if(this.height>1){
				var v_Width=this.width;
				var v_Height=this.height;
				if(v_CheckSize){
					var v_Counter=19;
					while(v_Width>=42||v_Height>=42){
						v_Width=Math.floor(this.width*(0.05*v_Counter));v_Counter--;
						v_Height=Math.floor(this.height*(0.05*v_Counter));v_Counter--;
					}
				}
				$('#'+this.alt).css('height',v_Height+'px');
				$('#'+this.alt).css('width',v_Width+'px');
				$('#'+this.alt).attr('src',this.src);
			}
		};
	}
}
//
// Function - Request Large Cover
function F_RequestLargeCover(v_CellNumber){
	var v_Image=new Image();
	v_Image.src='http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=L&Value='+A_Displays[v_CellNumber]['special-data']['ISBNorSN'];
	v_Image.alt='special-line-cover';
	v_Image.onload=function(){
		if(this.height>1){
			var v_Width=this.width;
			var v_Counter=19;
			var v_Looped=false;
			while(v_Width>=200){v_Width=Math.floor(this.width*(0.05*v_Counter));v_Counter--;v_Looped=true;}
			$('#'+this.alt).css('height',((v_Looped)?Math.floor(this.height*(0.05*v_Counter))+'px':this.height+'px'));
			$('#'+this.alt).css('width',v_Width+'px');
			$('#'+this.alt).attr('src',this.src);
		}
	}
}
//
// Function - Request Popular Tags
function F_RequestPopularTags(){$.getJSON('/quick/popular-tags',function(o_JSON){if(!o_JSON['failed']){F_SetPopularTags(o_JSON);}});}
//
// Function - Show All
function F_ShowAll(){for(var v_Key in A_Displays){if(v_Key>0){$('#content-'+v_Key).show();A_Displays[v_Key]['active']=true;}}}
//
// Function - Show Me
function F_ShowMe(v_CellNumber){if(v_CellNumber>0){$('#content-'+v_CellNumber).show();A_Displays[v_CellNumber]['active']=true;}}
//
// Function - Hide Me
function F_HideMe(v_CellNumber){if(v_CellNumber>0){$('#content-'+v_CellNumber).hide();A_Displays[v_CellNumber]['active']=false;}}
//
// Function - Shrink All
function F_ShrinkAll(){
	$('#destination-content').fadeOut('fast',function(){
		V_CurrentDisplay=0;
		F_ToggleMenuHighlight(0);
		$('#button-page-list').css('visibility','hidden');
		for(var v_Key in A_Displays){
			if(v_Key>0){
				if(A_Displays[v_Key]['show']['special-line']){A_Displays[v_Key]['target']=0;}
				$('#content-'+v_Key).find('#open-line-data').html('');
				F_ChangeMagnifier(v_Key,'in');
				F_TurnSpecialLineOff()
				F_ShowMe(v_Key);
				$('.open-line').removeClass('open-line');
				F_AdjustSize(v_Key,'shrunk');
				if(A_Displays[v_Key]['refresh']['on']){F_PrepareRefresh(v_Key);}
			}
		}
	}).fadeIn('fast');
}
//
// Function - Store Data
function F_StoreData(v_CellNumber,o_JSON){for(var v_Key in o_JSON){if(F_ArrayKeyExists(v_Key,A_Displays[v_CellNumber])){A_Displays[v_CellNumber][v_Key]=o_JSON[v_Key];}}}
//
// Function - Toggle Menu Highlight
function F_ToggleMenuHighlight(v_CellNumber){$('.menu-highlight').removeClass('menu-highlight').addClass('menu-normal');$('#menu-'+A_Displays[v_CellNumber]['alias']).removeClass('menu-normal').addClass('menu-highlight');}
//
// Function - Turn Special Line Off
function F_TurnSpecialLineOff(){$('#special-line-header').html('');$('#special-line').hide();}
//
// Function - Turn Special Line On
function F_TurnSpecialLineOn(v_CellNumber,v_Target){
	F_HideMe(v_CellNumber);
	F_RequestLargeCover(v_CellNumber,v_Target);
	A_Displays[v_CellNumber]['refresh']['ready']=false;
	$('#special-line-header').html(A_Displays[v_CellNumber]['special-data']['clean-name']);
	if(A_Displays[v_CellNumber]['special-data']['sub-title'].length>0){
		$('#special-line-sub-title').html('<font class="font-H">:</font> '+A_Displays[v_CellNumber]['special-data']['sub-title']);
	}
	$('#special-line').show();
}
//
// Function - Turn Calendar Off
function F_TurnCalendarOff(){A_Search['month-view']=false;$('#stage-month-view:visible').hide();}


//
// M i n i - C a l e n d a r   A n d   M o n t h   V i e w
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
