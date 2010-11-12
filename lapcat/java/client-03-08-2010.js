// LAPCAT - Client
// 2010-03-08
var V_LogCounter=0;

function F_CreateLogWindow(){
	$('<div/>',{
		'class':'border-all-I-1-65 corners-top-2 corners-bottom-2 color-F-1 font-fake font-X inside-border',
		'id':'log-window',
		'css':{'position':'fixed','top':0,'right':0,'height':180,'padding-top':2,'padding-bottom':2,'width':480,'z-index':20}
	}).appendTo('body');
}

/* Function - Show Log */
function F_ShowLog(a_Log){
	var a_Colors={'narrator':'font-Y','narrator-bold':'font-bold font-Y'};
	for(var v_Key in a_Log){
		if(V_LogCounter>=11){
			$('#log-line-'+(V_LogCounter-11)).replaceWith('');
		}
		V_LogCounter++;
		$('<div/>',{
			'id':'log-line-'+V_LogCounter,
			'class':a_Colors[a_Log[v_Key]['type']],
			'css':{'font-size':12,'height':14,'padding-left':3,'width':480},
			'html':a_Log[v_Key]['text']
		}).appendTo('#log-window');
	}
}


/* Array - Anticipated Events */
var A_AnticipatedEvents=new Array();
/* Variable - Total Anticipated Events */
var V_TotalAnticipatedEvents=0;

/* Function - Get Anticipated Events List */
function F_GetAnticipatedEventsList(){
	var v_EventCount=A_AnticipatedEvents.length;
	if(v_EventCount>1){
		F_ShowAnticipatedEvents();
	}else{
		$.getJSON('/quick/get-anticipated-events',function(o_JSON){
			if(o_JSON['switch']=='failed'){return;}
			V_TotalAnticipatedEvents=o_JSON['markers'];
			A_AnticipatedEvents=o_JSON['data'];
			F_ShowAnticipatedEvents();
		});
	}
}
/* Function - Show Anticipated Events */
function F_ShowAnticipatedEvents(){
	$('#anticipated-events-list').html('');
	for(var v_Key in A_AnticipatedEvents){
		$('<div/>',{
			'class':'button-Y-35 font-fake font-G shadow-or-light-X-up clicked-anticipated-event',
			'css':{'float':'center','font-size':12,'height':18,'margin-top':2,'overflow':'hidden','padding-left':2,'padding-right':2,'width':109},
			'id':'anticipated-event-'+A_AnticipatedEvents[v_Key]['id'],
			'html':A_AnticipatedEvents[v_Key]['name']
		}).appendTo('#anticipated-events-list');
	}
	if(V_TotalAnticipatedEvents>2){
		$('<div/>',{
			'class':'button-blue-2 font-fake font-G clicked-show-all-anticipated-events',
			'css':{'float':'right','font-size':12,'height':16,'margin-top':2,'margin-right':1,'overflow':'hidden','padding-left':2,'padding-right':2,'width':60},
			'html':'show all'
		}).appendTo('#anticipated-events-list');
		$('<div/>',{
			'class':'font-fake font-G',
			'css':{'float':'right','font-size':11,'height':18,'margin-top':3,'overflow':'hidden','width':40},
			'html':'+'+(V_TotalAnticipatedEvents-3)+' more'
		}).appendTo('#anticipated-events-list');
	}
}

/* Live Event - Clicked Anticipated Event */
$('.clicked-show-all-anticipated-events').live('click',function(){
	var v_Construct=F_GetConstruct('events');
	A_Cells[v_Construct]['blind-URL']='/quick/events/search/anticipated';
	$('#'+v_Construct).trigger('blind-request');
	$('#menu-events').click();
	if(A_Cells[v_Construct]['view']!=='list'){F_ChangeView(v_Construct,'list');}
});

/* Live Event - Clicked Anticipated Event */
$('.clicked-anticipated-event').live('click',function(){
	var v_EventID=parseInt($(this).attr('id').replace('anticipated-event-',''));
	var v_EventName=$(this).html();
	var v_Construct=F_GetConstruct('events');
	$('#'+v_Construct).trigger('construct-blind-search',{0:'specific',1:v_EventName,2:v_EventID,3:true});
	$('#menu-events').click();
	if(A_Cells[v_Construct]['view']!=='list'){F_ChangeView(v_Construct,'list');}
});




/* Variable - Maximum Width */
var V_MaximumWidth=960;
/* Variable - Quarter Maximum Width */
var V_QuarterMaximumWidth=Math.floor(V_MaximumWidth*0.25);
/* Variable - Open Line Maximum Height */
var V_OpenLineMaximumHeight=526;
/* Variable - Shrunk Top Row Maximum Height */
var V_ShrunkTopRowMaximumHeight=220;
/* Variable - Shrunk Bottom Row Maximum Height */
var V_ShrunkBottomRowMaximumHeight=326;
/* Variable - Calendar Created */
var V_CalendarCreated=false;
/* Array - Calendar */
var A_Calendar={
	'days-in-month':0,
	'first-day-starts-on':0,
	'month':0,
	'today':0,
	'year':0,
	'date-today':''
};
/* Array - Cells */
var A_Cells={
	'construct-1':{
		'alias':'materials',
		'blind-URL':'/quick/materials/search',
		'cover-images':true,
		'data':{},
		'failed':false,
		'has-data':false,
		'header':'',
		'limit-lines-to':{'list':10,'image':12},
		'on-screen':false,
		'open-line':20,
		'open-line-options':['expand','favorite','similar'],
		'open-lines':{'list':true,'image':false},
		'page':{},
		'parameters':{
			'expanded':{'css':{'height':V_OpenLineMaximumHeight,'width':V_MaximumWidth}},
			'expanded-with-open-line':{'css':{'height':V_OpenLineMaximumHeight,'width':Math.floor(V_MaximumWidth*0.40)}},
			'shrunk':{'css':{'height':V_ShrunkTopRowMaximumHeight,'width':V_MaximumWidth,'overflow':'hidden'}}
		},
		'refresh-counter':0,
		'refresh-on':true,
		'refresh-timer':20000,
		'seconds':10,
		'show-while-shrunk':true,
		'size':'shrunk',
		'start':10,
		'status':'none',
		'target':0,
		'view':'image',
		'views':{'image':100,'list':400}
	},
	'construct-2':{
		'alias':'events',
		'blind-URL':'/quick/events/search',
		'cover-images':false,
		'data':{},
		'failed':false,
		'has-data':false,
		'header':'',
		'limit-lines-to':{'list':10},
		'on-screen':false,
		'open-line':20,
		'open-line-options':['expand','favorite','watched','similar','share'],
		'open-lines':{'list':true,'month':false},
		'page':{},
		'parameters':{
			'expanded':{'css':{'height':V_OpenLineMaximumHeight,'width':V_MaximumWidth}},
			'expanded-with-open-line':{'css':{'height':V_OpenLineMaximumHeight,'width':Math.floor(V_MaximumWidth*0.40)}},
			'shrunk':{'css':{'height':V_ShrunkBottomRowMaximumHeight,'width':V_QuarterMaximumWidth,'overflow':'hidden'}}
		},
		'refresh-counter':0,
		'refresh-on':false,
		'refresh-timer':0,
		'seconds':10,
		'show-while-shrunk':true,
		'size':'shrunk',
		'start':10,
		'status':'none',
		'target':0,
		'view':'list',
		'views':{'list':200,'month':0}
	},
	'construct-3':{
		'alias':'news',
		'blind-URL':'/quick/news/search',
		'cover-images':false,
		'data':{},
		'failed':false,
		'has-data':false,
		'header':'',
		'limit-lines-to':{'list':10,'featured':0},
		'on-screen':false,
		'open-line':20,
		'open-line-options':['expand','favorite','share'],
		'open-lines':{'list':true,'featured':false},
		'page':{},
		'parameters':{
			'expanded':{'css':{'height':V_OpenLineMaximumHeight,'width':V_MaximumWidth}},
			'expanded-with-open-line':{'css':{'height':V_OpenLineMaximumHeight,'width':Math.floor(V_MaximumWidth*0.40)}},
			'shrunk':{'css':{'height':V_ShrunkBottomRowMaximumHeight,'width':V_QuarterMaximumWidth,'overflow':'hidden'}}
		},
		'refresh-counter':0,
		'refresh-on':false,
		'refresh-timer':0,
		'seconds':10,
		'show-while-shrunk':true,
		'size':'shrunk',
		'start':10,
		'status':'none',
		'target':0,
		'view':'list',
		'views':{'list':300}
		//'views':{'list':300,'featured':500}
	},
	'construct-4':{
		'alias':'databases',
		'blind-URL':'/quick/databases/search',
		'cover-images':false,
		'data':{},
		'failed':false,
		'has-data':false,
		'header':'',
		'limit-lines-to':{'list':10,'featured':0},
		'on-screen':false,
		'open-line':20,
		'open-line-options':['expand','favorite'],
		'open-lines':{'list':true,'featured':false},
		'page':{},
		'parameters':{
			'expanded':{'css':{'height':V_OpenLineMaximumHeight,'width':V_MaximumWidth}},
			'expanded-with-open-line':{'css':{'height':V_OpenLineMaximumHeight,'width':Math.floor(V_MaximumWidth*0.40)}},
			'shrunk':{'css':{'height':V_ShrunkBottomRowMaximumHeight,'width':V_QuarterMaximumWidth,'overflow':'hidden'}}
		},
		'refresh-counter':0,
		'refresh-on':false,
		'refresh-timer':0,
		'seconds':10,
		'show-while-shrunk':true,
		'size':'shrunk',
		'start':10,
		'status':'none',
		'target':0,
		'view':'list',
		'views':{'list':700}
		//'views':{'list':700,'featured':800}
	},
	'construct-5':{
		'alias':'hours',
		'blind-URL':'/quick/hours/search',
		'cover-images':false,
		'data':{},
		'failed':false,
		'has-data':false,
		'header':'',
		'limit-lines-to':{'list':10},
		'on-screen':false,
		'open-line':20,
		'open-line-options':['make-home'],
		'open-lines':{'list':true},
		'page':{},
		'parameters':{
			'expanded':{'css':{'height':V_OpenLineMaximumHeight,'width':V_MaximumWidth}},
			'expanded-with-open-line':{'css':{'height':V_OpenLineMaximumHeight,'width':Math.floor(V_MaximumWidth*0.40)}},
			'shrunk':{'css':{'height':V_OpenLineMaximumHeight,'width':V_MaximumWidth,'overflow':'hidden'}}
		},
		'refresh-counter':0,
		'refresh-on':false,
		'refresh-timer':0,
		'seconds':10,
		'show-while-shrunk':false,
		'size':'shrunk',
		'start':10,
		'status':'none',
		'target':0,
		'view':'list',
		'views':{'list':900}
	},
	'construct-6':{
		'alias':'hiring',
		'blind-URL':'/quick/hiring/search',
		'cover-images':false,
		'data':{},
		'failed':false,
		'has-data':false,
		'header':'',
		'limit-lines-to':{'list':10},
		'on-screen':false,
		'open-line':20,
		'open-line-options':[''],
		'open-lines':{'list':true},
		'page':{},
		'parameters':{
			'expanded':{'css':{'height':V_OpenLineMaximumHeight,'width':V_MaximumWidth}},
			'expanded-with-open-line':{'css':{'height':V_OpenLineMaximumHeight,'width':Math.floor(V_MaximumWidth*0.40)}},
			'shrunk':{'css':{'height':V_OpenLineMaximumHeight,'width':V_MaximumWidth,'overflow':'hidden'}}
		},
		'refresh-counter':0,
		'refresh-on':false,
		'refresh-timer':0,
		'seconds':10,
		'show-while-shrunk':false,
		'size':'shrunk',
		'start':10,
		'status':'none',
		'target':0,
		'view':'list',
		'views':{'list':1000}
	}
};
/* Array - Drops */
var A_Drops={
	'home':{
		'popular':{}
	},
	'news':{
		'search':A_ContentProviders
    },
	'events':{
		'search':{
			0:{'name':'all libraries','value':0},
			1:{'name':'main library','value':1},
			2:{'name':'coolspring','value':2},
			3:{'name':'fish lake','value':3},
			4:{'name':'hanna','value':4},
			5:{'name':'kingsford heights','value':5},
			6:{'name':'rolling prairie','value':6},
			7:{'name':'union mills','value':7},
			8:{'name':'mobile library','value':8},
			9:{'name':'see description','value':9}
		}
	},
	'materials':{
		'type':{
			0:{'name':'all materials','value':0},
			1:{'name':'books','value':1},
			2:{'name':'music','value':2},
			3:{'name':'movies','value':3},
			4:{'name':'video games','value':4},
			5:{'name':'television shows','value':5},
			23:{'name':'audio books','value':23},
			24:{'name':'digital books','value':24},
			32:{'name':'graphic novels','value':32},
			50:{'name':'large print books','value':50},
			75:{'name':'digital audio players','value':75},
			159:{'name':'digital audio books','value':159}
		}
	},
	'databases':{}
};
/* Array - Promotions */
var A_Promotions={};
/* Array - Send With Search */
var A_SendWithSearch={
	'construct-1':{'similar':'text','specific':'text','date':'text','popular':'value','search':'text','tag':'value','type':'value'},
	'construct-2':{'similar':'text','specific':'text','date':'text','popular':'value','search':'value','tag':'value','type':'value'},
	'construct-3':{'similar':'text','specific':'text','date':'text','popular':'value','search':'text','tag':'value','type':'value'},
	'construct-4':{'similar':'text','specific':'text','date':'text','popular':'value','search':'text','tag':'value','type':'value'}
};
/* Array - Search */
var A_Search={
	'construct-1':{
		'similar':{'on':false,'text':'','value':''},
		'specific':{'on':false,'text':'','value':''},
		'date':{'on':false,'text':'','value':''},
		'popular':{'on':false,'text':'','value':''},
		'search':{'on':false,'text':'','value':''},
		'tag':{'on':false,'text':'','value':''},
		'type':{'on':false,'text':'','value':''}
	},
	'construct-2':{
		'similar':{'on':false,'text':'','value':''},
		'specific':{'on':false,'text':'','value':''},
		'date':{'on':false,'text':'','value':''},
		'popular':{'on':false,'text':'','value':''},
		'search':{'on':false,'text':'','value':''},
		'tag':{'on':false,'text':'','value':''},
		'type':{'on':false,'text':'','value':''}
	},
	'construct-3':{
		'similar':{'on':false,'text':'','value':''},
		'specific':{'on':false,'text':'','value':''},
		'date':{'on':false,'text':'','value':''},
		'popular':{'on':false,'text':'','value':''},
		'search':{'on':false,'text':'','value':''},
		'tag':{'on':false,'text':'','value':''},
		'type':{'on':false,'text':'','value':''}
	},
	'construct-4':{
		'similar':{'on':false,'text':'','value':''},
		'specific':{'on':false,'text':'','value':''},
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
	'materials':{'change-tag':true,'change-tag-RSS':true,'change-popular':true,'change-type':true,'change-search':false,'date-selector':false},
	'databases':{'change-tag':true,'change-tag-RSS':false,'change-popular':true,'change-type':false,'change-search':false,'date-selector':false},
	'hours':{'change-tag':false,'change-tag-RSS':false,'change-popular':false,'change-type':false,'change-search':false,'date-selector':false},
	'hiring':{'change-tag':false,'change-tag-RSS':false,'change-popular':false,'change-type':false,'change-search':false,'date-selector':false}
};
/* Array - Starting Tag */
var A_StartingTag={'ID':0,'name':''};
/* Array - User */
var A_User={
	'logged-in':false
};
/* Variable - Anchored Counter */
var V_AnchoredCounter=0;
/* Variable - Anchored Account Box On Screen */
var V_AnchoredAccountBoxOnScreen=false;
/* Variable - Anchored Message Box On Screen */
var V_AnchoredMessageBoxOnScreen=false;
/* Variable - Area */
var V_Area='home';
/* Variable - Current Day Of Week */
var V_CurrentDayOfWeek=0;
/* Variable - Expanded Open Line */
var V_ExpandedOpenLine=false;
/* Variable - Font Size */
var V_FontSize=15;
/* Variable - Home Library -  */
var V_HomeLibrary=1;
/* Variable - Promotion Counter */
var V_PromotionCounter=0;
/* Variable - Theme */
var V_Theme=22;

/* Function - Show Stars */
function F_ShowStars(v_Construct){$('#'+v_Construct+'-open-line #star-rating').html(F_ConvertToStars($('#'+v_Construct+'-open-line #star-rating').html())).show();}
/* Function - Convert To Stars */
function F_ConvertToStars(v_Rating){
	if(v_Rating=='null'){v_Rating=0;}
	var v_Half=(v_Rating/2)%1;
	if(v_Half>=0.5){v_Half=1;}else{v_Half=0;}
	var v_Floor=Math.floor(v_Rating/2);
	var v_Empty=5-v_Floor-v_Half;
	var v_HTML='';
	for(v_Counter=0;v_Counter<v_Floor;v_Counter++){v_HTML+='<img src="/lapcat/images/14-14-0.png"/>';}
	for(v_Counter=0;v_Counter<v_Half;v_Counter++){v_HTML+='<img src="/lapcat/images/14-14-2.png"/>';}
	for(v_Counter=0;v_Counter<v_Empty;v_Counter++){v_HTML+='<img src="/lapcat/images/14-14-1.png"/>';}
	return v_HTML;
}

/* Function - Add Anchored Update Message */
function F_AddAnchoredUpdateMessage(v_Text){
	V_AnchoredCounter++;
	if(V_AnchoredCounter>5){$('#anchored-line-'+(V_AnchoredCounter-6)).replaceWith('');}
	$('#anchored-message-text').append($('<div/>',{'html':v_Text,'id':'anchored-line-'+V_AnchoredCounter}));
}
/* Function - Add Promotion */
function F_AddPromotion(v_Promotion,a_HardParameters){
	var a_Parameters={
		'height':V_ShrunkBottomRowMaximumHeight,
		'width':200
	};
	var o_Promotion=$('<div/>',{
		'css':$.extend({},a_Parameters,a_HardParameters),
		'id':v_Promotion
	});
	o_Promotion.html(
		$('<img/>',{
			'class':'border-all-F-1 corners-bottom-1 corners-top-1',
			'css':{'height':216,'margin-left':4,'margin-top':5,'width':182},
			'src':'',
			'id':'promotion-image'
		})
	);
	o_Promotion.append(
		$('<div/>',{
			'class':'corners-bottom-2 corners-top-2 shadow-or-light-X-up',
			'css':{'height':88,'margin-left':4,'width':184}
		})
	);

	o_Promotion.appendTo($('#destination-content'));

	o_Promotion
		.bind('advance-promotion',function(){
			V_PromotionCounter++;
			if(V_PromotionCounter>=V_PromotionLimit){V_PromotionCounter=0;}
			o_Promotion.trigger('change-promotion');
		})
		.bind('change-promotion',function(){
			o_Promotion.find('#promotion-image').attr('src','promotions/'+A_Promotions[V_PromotionCounter]['file-name']);
			setTimeout('$(\'#promotion-1\').trigger(\'advance-promotion\');',30000);
		});

	$.getJSON('/quick/promotions',function(o_JSON){
		A_Promotions=o_JSON['data'];
		V_PromotionLimit=A_Promotions.length;
		V_PromotionCounter=Math.floor(Math.random()*V_PromotionLimit);
		o_Promotion.trigger('change-promotion');
	});
}
/* Function - Add Construct */
function F_AddConstruct(v_Construct,a_HardParameters){
	var v_Alias=A_Cells[v_Construct]['alias'];
	var v_Size=A_Cells[v_Construct]['size'];
	var a_Parameters=A_Cells[v_Construct]['parameters'];

	var o_Construct=$('<div/>',{
		'css':$.extend({},a_Parameters[v_Size]['css'],a_HardParameters),
		'id':v_Construct
	});

	o_Construct
		.append($('<div/>',{
			'ID':v_Construct+'-header',
			'css':((A_Cells[v_Construct]['show-while-shrunk'])?{}:{'display':'none'}),
			'html':$('#'+v_Alias+'-header').html()
		}));

	o_Construct
		.append($('<div/>',{
			'ID':v_Construct+'-views'
		}));

	for(var v_View in A_Cells[v_Construct]['views']){
		o_Construct.find('#'+v_Construct+'-views')
			.append($('<div/>',{
				'ID':v_Construct+'-view-'+v_View,
				'css':$.extend({},a_Parameters[v_Size]['css'],{'display':'none','float':'left'})
			}));
	}

	o_Construct.find('#'+v_Construct+'-views')
		.append($('<div/>',{
			'ID':v_Construct+'-open-line',
			'css':{'display':'none','float':'left','height':V_OpenLineMaximumHeight,'width':Math.floor(V_MaximumWidth*0.60)},
			'html':F_CopyHTML('open-line-HTML-'+A_Cells[v_Construct]['open-line'])
		}));

	o_Construct.find('#'+v_Construct+'-views')
		.append($('<div/>',{
			'ID':v_Construct+'-no-results',
			'css':{'display':'none','float':'left','height':V_OpenLineMaximumHeight,'width':'100%'}
		}));

	o_Construct
		.bind('hide-construct',function(){o_Construct.hide();})
		.bind('hide-open-line',function(){o_Construct.find('#'+v_Construct+'-open-line').hide();})
		.bind('hide-other-views',function(){o_Construct.find('[id|="'+v_Construct+'-view"]').hide();})
		.bind('hide-view',function(){o_Construct.find('#'+v_Construct+'-view-'+A_Cells[v_Construct]['view']).hide();})
		.bind('show-construct',function(){o_Construct.show();})
		.bind('show-open-line',function(){o_Construct.find('#'+v_Construct+'-open-line').show();})
		.bind('show-view',function(){o_Construct.find('#'+v_Construct+'-view-'+A_Cells[v_Construct]['view']).show();});

	o_Construct
		.bind('blind-request',function(){
			if(v_Alias=='materials'){$('#image-holder').html('');}
			if(A_Cells[v_Construct]['on-screen']&&(V_Area==v_Alias||V_Area=='home')){o_Construct.fadeTo(0,0.25);}
			$.getJSON(A_Cells[v_Construct]['blind-URL'],function(o_JSON){o_Construct.trigger('process-data',o_JSON);});
			//F_AddAnchoredUpdateMessage('Display ('+v_Alias+') has requested data.');
		})
		.bind('process-data',function(v_Event,o_JSON){
			//F_AddAnchoredUpdateMessage('Display ('+v_Alias+') has received data.');
			F_SetAllData(v_Construct,o_JSON);
			A_Cells[v_Construct]['has-data']=true;
			if(o_JSON['switch']=='failed'){
				A_Cells[v_Construct]['failed']=true;
				o_Construct
					.trigger('add-no-results');
			}else{
				A_Cells[v_Construct]['failed']=false;
				o_Construct
					.trigger('add-lines')
					.trigger('add-open-line')
					.trigger('after-effects')
					.trigger('highlight-line');
				if(V_Area==o_JSON['alias']){
					o_Construct.trigger('show-open-line');
					F_ShowPageButtons(v_Construct);
				}
				F_ShowLog(o_JSON['log']);
			}
			if(A_Cells[v_Construct]['on-screen']&&(V_Area==v_Alias||V_Area=='home')){
				if(!V_ExpandedOpenLine&&!A_Cells[v_Construct]['failed']){
					o_Construct
						.trigger('show-view')
				}
				o_Construct
					.fadeTo(0,1.00);
			}
			F_TriggerClientChanges(o_JSON['client-changes']);
		});

	o_Construct
		.bind('add-no-results',function(){
			//var a_Data=A_Cells[v_Construct]['data'];
			o_Construct.find('#header').html(A_Cells[v_Construct]['header']);
			o_Construct.find('#'+v_Construct+'-view-'+A_Cells[v_Construct]['view']).hide();
			o_Construct.find('#'+v_Construct+'-open-line').hide();
			$('#button-page-list').hide();
			var v_HTML=$('<div/>');
			v_HTML
				.append($('<font/>',{
					'css':{'font-size':12,'margin-left':3},
					'html':'The following search returned no results.'
				}))
				.append($('<br/>'))
				.append($('<font/>',{
					'class':'font-italic',
					'css':{'font-size':12,'margin-left':9},
					'html':A_Cells[v_Construct]['header']
				}))
				.append($('<br/>'))
				.append($('<br/>'))
				.append($('<font/>',{
					'css':{'font-size':12,'margin-left':3},
					'html':'Suggestions:'
				}));
			for(var v_Key in A_Search[v_Construct]){
				if(F_ArrayKeyExists('on',A_Search[v_Construct][v_Key])){
					if(A_Search[v_Construct][v_Key]['on']){
						if(v_Alias=='materials'&&v_Key=='type'){
						}else{
						// Date / Popular / Search / Tag / Type
							v_CSS=((v_Key=='tag')?'remove-from-all-searches':'remove-from-search');
							v_HTML
								.append($('<br/>'))
								.append($('<img/>',{
									'class':'fake-link '+v_CSS,
									'css':{'height':8,'width':8,'margin-left':9},
									'id':'remove-'+v_Key,
									'src':'http://cdn1.lapcat.org/famfamfam/silk/cross.png',
									'title':'Click to remove this criteria from the search.'}
								))
								.append($('<font/>',{
									'class':'fake-link '+v_CSS,
									'id':'remove-'+v_Key,
									'css':{'font-size':12,'margin-left':1},
									'html':'Remove '+A_Search[v_Construct][v_Key]['text']+' from the search.'}
								));
						}
					}
				}else{
					if(v_Key){
						// Similar / Specific
					}
				}
			}
			o_Construct.find('#'+v_Construct+'-no-results')
				.html(v_HTML.html())
				.show();
		})
		.bind('show-line-conditions',function(v_Event,v_Key){
			var a_Data=A_Cells[v_Construct]['data'][v_Key];
			o_Construct.find('#icons-'+v_Key+' [id|="area-condition"]').hide();
			for(var v_DataKey in a_Data){
				switch(v_DataKey){
					case 'collect':case 'watchlist':break;
					case 'favorite':if(a_Data[v_DataKey]>0){o_Construct.find('#icons-'+v_Key+' #area-condition-heart').show();}break;
					case 'watched':if(a_Data[v_DataKey]>0){o_Construct.find('#icons-'+v_Key+' #area-condition-eye').show();}break;
					case 'summer':if(a_Data[v_DataKey]>0){o_Construct.find('#icons-'+v_Key+' #area-condition-sun').show();}break;
					case 'o-date':
						if(v_Alias=='news'){
							if(a_Data[v_DataKey]==A_Calendar['date-today']){
								o_Construct.find('#icons-'+v_Key+' #area-condition-new').show();
							}
						}
						break;
					default:break;
				}
			}
		})
		.bind('add-lines',function(){
			A_Cells[v_Construct]['target']=0;
			var a_Data=A_Cells[v_Construct]['data'];
			o_Construct.find('#header').html(A_Cells[v_Construct]['header']);
			for(var v_View in A_Cells[v_Construct]['views']){
				if(v_View=='month'){
					if(!V_CalendarCreated){F_BuildCalendar(v_Construct);}
				}else{
					o_Construct.find('#'+v_Construct+'-view-'+v_View).html('');
					var v_Limit=A_Cells[v_Construct]['limit-lines-to'][A_Cells[v_Construct]['view']];
					for(var v_Key in a_Data){
						o_Construct.find('#'+v_Construct+'-view-'+v_View)
							.append(F_ConstructAndReplace(F_CopyHTML('line-HTML-'+A_Cells[v_Construct]['views'][v_View]),a_Data[v_Key]));
						o_Construct.trigger('show-line-conditions',v_Key);
						if(v_Key==v_Limit){break;}
					}
					if(A_Cells[v_Construct]['cover-images']){F_RequestImage(v_View,a_Data);}
				}
			}
		})
		.bind('add-open-line',function(){
			var a_Data=A_Cells[v_Construct]['data'];
			o_Construct.find('#'+v_Construct+'-open-line #content-open-line')
				.html(F_ConstructAndReplace(F_CopyHTML('stage-'+v_Alias+'-content'),a_Data[A_Cells[v_Construct]['target']]));
			var v_Option='';
			for(var v_Key in A_Cells[v_Construct]['open-line-options']){
				v_Option=A_Cells[v_Construct]['open-line-options'][v_Key];
				switch(v_Option){
					case 'similar':
						if(!A_Cells[v_Construct]['data'][A_Cells[v_Construct]['target']]['show-similar']){
							o_Construct.find('#option-'+A_Cells[v_Construct]['open-line-options'][v_Key]).hide();
							break;
						}
					case 'share':
						o_Construct.find('#option-'+A_Cells[v_Construct]['open-line-options'][v_Key]+' [name="fb_share"]')
							.attr('share_url','http://www.lapcat.org/'+V_Area+'/specific/'+a_Data[A_Cells[v_Construct]['target']]['id']);
						o_Construct.find('.FBConnectButton_Text_Simple').css({'text-decoration':'none'});
					case 'favorite':case 'watched':case 'watchlist':
						if(v_Option!=='similar'&&v_Option!=='share'){
							if(!A_User['logged-in']){break;}
						}
					case 'expand':
						o_Construct.find('#option-'+A_Cells[v_Construct]['open-line-options'][v_Key]).show();
						break;
					default:
						break;
				}
			}
		})
		.bind('after-effects',function(){
			switch(v_Alias){
				case 'databases':
					F_TurnOffLinks(v_Construct);
					break;
				case 'hours':
					F_ShowLocationInformation(v_Construct);
					F_FixMobileLibraryData(v_Construct);
					break;
				case 'materials':
					F_ShowAvailable(v_Construct+((A_Cells[v_Construct]['view']=='image')?'-view-image':'-open-line'));
					if(A_Cells[v_Construct]['view']=='list'){F_ShowStars(v_Construct);}
					if(A_Cells[v_Construct]['refresh-on']){F_ToggleRefresh(v_Construct,true);}
					break;
				case 'events':
					F_ShowHomeLibraries();
					F_ReplaceTimes(v_Construct);
					break;
				default:break;
			}
		});
	o_Construct
		.bind('re-size',function(){
			o_Construct.find('#'+v_Construct+'-views').css($.extend({},a_Parameters[A_Cells[v_Construct]['size']]['css'],{'width':V_MaximumWidth}));
			o_Construct.find('#'+v_Construct+'-view-'+A_Cells[v_Construct]['view']).css(a_Parameters[A_Cells[v_Construct]['size']]['css']);
			o_Construct.css(a_Parameters[((V_Area==v_Alias)?'expanded':'shrunk')]['css']);
		})
		.bind('re-draw',function(){
			F_ExpandOpenLine(v_Construct);
			if(!A_Cells[v_Construct]['show-while-shrunk']){
				if(A_Cells[v_Construct]['size']=='shrunk'){o_Construct.find('#'+v_Construct+'-view-list').hide();}
				o_Construct.find('#'+v_Construct+'-header').hide();
			}
		})
		.bind('zoom-in',function(){
			F_ShowPageButtons(v_Construct);
			$('#promotion-1').hide();
			V_Area=v_Alias;
			F_HighlightMenu();
			o_Construct.find('#zoom-in').hide();
			o_Construct.find('#zoom-out').show();
			A_Cells[v_Construct]['size']='expanded'+((A_Cells[v_Construct]['open-lines'][A_Cells[v_Construct]['view']])?'-with-open-line':'');
			o_Construct
				.trigger('re-size')
				.trigger('re-draw');
			F_ShrinkOtherConstructs(v_Construct,false);
			o_Construct.show();
			o_Construct.find('#'+v_Construct+'-header').show();
			if(A_Cells[v_Construct]['has-data']){
				F_ShowSearchMenu(V_Area);
				if(A_Cells[v_Construct]['size']=='expanded-with-open-line'){
					if(!A_Cells[v_Construct]['failed']){
						o_Construct
							.trigger('add-open-line')
							.trigger('after-effects')
							.trigger('show-open-line');
					}
				}
			}
			if(V_Area=='events'){$('#on-screen-calendar').trigger('expand-events');}
			if(A_Cells[v_Construct]['refresh-on']){F_ToggleRefresh(v_Construct,true);}
		})
		.bind('zoom-out',function(){
			F_HideAllOpenLines(v_Construct);
			$('#construct-5').hide();
			$('#construct-6').hide();
			$('#promotion-1').show();
			$('#on-screen-calendar').trigger('shrink-events');
			$('#button-page-list').hide();
			V_Area='home';
			F_ShowSearchMenu(V_Area);
			F_HighlightMenu();
			$('[id|="zoom-out"]').each(function(v_Index){$(this).hide();});
			$('[id|="zoom-in"]').each(function(v_Index){$(this).show();});
			A_Cells[v_Construct]['size']='shrunk';
			o_Construct
				.trigger('re-size')
				.trigger('re-draw');
			F_ReDrawOtherConstructs(v_Construct);
			F_ShrinkOtherConstructs(v_Construct,true);
			F_ToggleAllRefresh();
		});

	o_Construct
		.bind('highlight-line',function(){
			o_Construct.find('.open-line').removeClass('open-line').addClass('button-Y-35');
			o_Construct.find('[name="counter-'+A_Cells[v_Construct]['target']+'"]').removeClass('button-Y-35').addClass('open-line');
		});


	o_Construct.appendTo($('#destination-content'));

	o_Construct.bind('construct-blind-search',function(v_Event,a_Search){
		if(a_Search[0]=='similar'||a_Search[0]=='specific'){
			if(A_Search[v_Construct][a_Search[0]]['on']&&a_Search[1]==''){
				A_Search[v_Construct][a_Search[0]]={'on':false,'text':'','value':''};
				$('#change-'+a_Search[0]+'-master').attr('value','title search');
			}else{
				if(v_Alias=='materials'){
					A_Search[v_Construct]['type']={'on':true,'text':'all materials','value':0};
				}
				A_Search[v_Construct][a_Search[0]]={'on':true,'text':a_Search[2],'value':a_Search[1]};
				$('#change-'+a_Search[0]+'-master').attr('value',a_Search[2]);
			}
		}else{
			o_Construct.find('#search-on-'+a_Search[0]).show();
			$('#change-'+a_Search[0]+'-master').attr('value',a_Search[2]);
			A_Search[v_Construct][a_Search[0]]={'on':true,'text':a_Search[2],'value':a_Search[1]};
		}
		if(a_Search[1]>0){$('#'+a_Search[0]+'-selected').show();}else{$('#'+a_Search[0]+'-selected').hide();}
		A_Cells[v_Construct]['blind-URL']='/quick/'+v_Alias+'/search/'+F_ConstructSearch(v_Construct);
		if(a_Search[3]){o_Construct.trigger('blind-request');}
	});

	F_ResetConstruct(v_Construct);
}
/* Function - Add Information Box */
function F_AddInformationBox(a_Parameters,v_ShowTime,v_Time){
	var a_Defaults={
		'css':{'display':'none','padding':2,'margin-top':6,'height':70,'width':240,'line-height':'100%'},
		'class':'border-all-Z-1 color-F-1 corners-bottom-2 corners-top-2 light-up font-G font-fake',
		'html':'LAPCAT',
		'title':'Click to close this box.'
	};
	var v_Seconds=Math.floor(v_Time/1000);
	var v_Notice=$('<div/>',$.extend(a_Defaults,a_Parameters));
	v_Notice.append('<div style="'+((v_ShowTime)?'':'display:none; ')+'float:right; height:16px; weight:16px;"><font class="font-bold font-G" id="seconds-left">'+v_Seconds+'</font></div>');
	v_Notice.prependTo($('#information-box'))
		.fadeIn(600)
		.bind('click',function(){
			$(this).fadeOut(600,function(){$(this).replaceWith();});
		}).bind('auto-remove',function(){
			setTimeout(function(){v_Notice.trigger('click');},v_Time);
		}).bind('counter-update',function(){
			var v_Seconds=v_Notice.find('#seconds-left').html();
			v_Seconds=parseInt(v_Seconds);
			v_Seconds--;
			setTimeout(function(){
				v_Notice.find('#seconds-left').html(v_Seconds);
				if(v_Seconds>0){v_Notice.trigger('counter-update');}
			},1000);
		}).trigger('auto-remove')
		.trigger('counter-update');
}
/* Function - Add To All Searches */
function F_AddToAllSearches(a_Search){for(var v_Key in A_Search){$('#'+v_Key).trigger('construct-blind-search',a_Search);}}
/* Function - Array Key Exists */
function F_ArrayKeyExists(v_Key,a_Array){for(var v_ArrayKey in a_Array){if(v_ArrayKey==v_Key){return true;}}return false;}
/* Function - Log In Or Create Account */
function F_LogInOrCreateAccount(){
	$.getJSON('/lapcat/code/accounts.php',$('#account-log-in').serialize(),function(o_JSON){
		switch(o_JSON['switch']){
			case 'passed':F_LogUser(true,true,o_JSON['theme'],o_JSON['type']);break;
			case 'could-not-create-account':
				var a_Parameters={'html':'<font class="font-G" style="font-size:12px;">LAPCAT users must be 13 years of age or older. Please review the <a class="font-L" href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a> for further details.</font>'};
				F_AddInformationBox(a_Parameters,false,3000);
				break;
			case 'failed':
				var a_Parameters={'html':'<font class="font-G" style="font-size:12px;">Invalid username or password.</font>'};
				F_AddInformationBox(a_Parameters,false,3000);
				default:break;
		}
	});
}
/* Function - Bind */
function F_Bind(){
	$('.log-out-click').bind('click',function(){$.getJSON('/quick/log-out',function(){F_LogUser(true,false,22,2);});});
	$('[name="password"]').keydown(function(v_KeyPressed){if(v_KeyPressed.keyCode==13){F_LogInOrCreateAccount();}});
}
/* Function - Blind Request All */
function F_BlindRequestAll(){for(var v_Key in A_Cells){$('#'+v_Key).trigger('blind-request');}}
/* Function - Prepare Calendar */
function F_PrepareCalendar(){
	var v_Date=new Date();
	A_Calendar['month']=v_Date.getMonth();
	A_Calendar['year']=v_Date.getFullYear();
	A_Calendar['days-in-month']=F_GetDaysInMonth(A_Calendar['year'],A_Calendar['month']+1);
	A_Calendar['today']=v_Date.getDate();
	v_Date.setDate(1);
	A_Calendar['first-day-starts-on']=v_Date.getDay();
	A_Calendar['date-today']=A_Calendar['year']+'-'+(A_Calendar['month']+1)+'-'+A_Calendar['today'];
}
/* Function - Build Calendar */
function F_BuildCalendar(v_Construct){
	V_CalendarCreated=true;
	var a_Months=['January','February','March','April','May','June','July','August','September','October','November','December'];
	var a_Weekdays=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	
	var o_Event='';
	var v_EventSize=9;
	var v_WeekHeight=Math.floor(100/7);
	var v_DayWidth=Math.floor(100/7);

	var o_HomeEvent=$('<div/>',{
		'class':'color-M-1 border-all-F-1 corners-bottom-2 corners-top-2 font-fake name-hover fake-link clicked-calendar-event',
		'css':{'float':'left','height':v_EventSize,'width':v_EventSize,'margin-top':1,'margin-left':1,'overflow':'hidden'}
	});

	var o_OtherEvent=$('<div/>',{
		'class':'color-I-1 border-all-I-1-65 corners-bottom-2 corners-top-2 font-fake name-hover fake-link clicked-calendar-event',
		'css':{'float':'left','height':v_EventSize,'width':v_EventSize,'margin-top':1,'margin-left':1,'overflow':'hidden'}
	});

	var o_Calendar=$('<div/>',{
		'class':'corners-bottom-2 corners-top-2',
		'css':{'height':'92%','padding':2,'width':'auto'}
	});

	o_Calendar.append(
		$('<table/>',{
			'class':'border-all-I-1-65 font-G',
			'css':{'height':'100%','width':'100%'},
			'id':'on-screen-calendar'
		})
	);

	o_Calendar.find('#on-screen-calendar')
		.append($('<tr/>',{
			'class':'color-X-3 shadow-or-light-X-up font-fake font-X font-bold',
			'css':{'height':Math.floor(v_WeekHeight/2)+'%','text-align':'center','vertical-align':'middle'},
			'html':'<td colspan="2"><div class="button-Y-35 float-left shadow-or-light-X-down" style="background-position:bottom; width:65%; overflow:hidden;" title="Click to show the previous month.">&lt;</div></td><td colspan="3" style="vertical-align:bottom;">'+a_Months[A_Calendar['month']]+'</td><td colspan="2"><div class="button-Y-35 float-right shadow-or-light-X-down" style="background-position:bottom; width:65%; overflow:hidden;" title="Click to show the next month.">&gt;</div></td>',
			'id':'calendar-header'
		}))
		.append($('<tr/>',{
			'class':'color-X-3 font-X font-bold font-fake shadow-or-light-X-down',
			'css':{'background-position':'bottom','height':Math.floor(v_WeekHeight/2)+'%','text-align':'center','vertical-align':'middle','font-size':8},
			'html':'<td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td>',
			'id':'calendar-header'
		}));

	o_Calendar
		.bind('expand-events',function(){
			o_Calendar.find('[id|="location"]').each(function(v_Index){
				$(this).css({'height':13,'width':'96%'}).html(A_Cells[v_Construct]['month-data'][v_Index]['name']);
			});
		})
		.bind('shrink-events',function(){
			o_Calendar.find('[id|="location"]').each(function(){
				$(this).css({'height':v_EventSize,'width':v_EventSize}).html('');
			});
		});

	o_Calendar.bind('apply-data',function(){
		o_Calendar.find('[id|="location"]').replaceWith('');
		a_Data=A_Cells[v_Construct]['month-data'];
		var a_Date='';
		var v_StartTime='';
		var v_EndTime='';
		for(var v_Key in a_Data){
			v_StartTime=F_GetRealTime(a_Data[v_Key]['o-date']+' '+a_Data[v_Key]['start']);
			v_EndTime=F_GetRealTime(a_Data[v_Key]['o-date']+' '+a_Data[v_Key]['end']);
			a_Date=a_Data[v_Key]['o-date'].split('-');
			if(a_Date[0]==A_Calendar['year']&&a_Date[1]==A_Calendar['month']+1){
				if(V_HomeLibrary==a_Data[v_Key]['library-ID']){o_Event=o_HomeEvent.clone();}else{o_Event=o_OtherEvent.clone();}
				o_Event
					.attr('data',a_Data[v_Key]['ID']+'|'+a_Data[v_Key]['name'])
					.attr('id','location-'+a_Data[v_Key]['library-ID'])
					.attr('name',a_Data[v_Key]['name']+' <font class="font-I">at</font> '+a_Data[v_Key]['library']+'<br/><font class="font-I">This event starts at</font> '+v_StartTime+'<font class="font-I">.</font>'+((!v_EndTime)?'':'<br/><font class="font-I">This event ends at</font> '+v_EndTime+'<font class="font-I">.</font>'));
				o_Calendar.find('#day-'+a_Data[v_Key]['day']).append(o_Event);
			}
		}
	});

	var v_ThisDay=1-A_Calendar['first-day-starts-on'];
	var v_ShowDay=false;
	var v_DayOnCalendar=false;
	for(var v_Week=0;v_Week<6;v_Week++){
		o_Calendar.find('#on-screen-calendar').append(
			$('<tr/>',{
				'id':'week-'+v_Week,
				'css':{'height':v_WeekHeight+'%','vertical-align':'top','font-size':11}
			})
		);
		for(var v_Day=0;v_Day<7;v_Day++){
			v_ShowDay=false;
			v_DayOnCalendar=false;
			if(v_ThisDay>A_Calendar['first-day-starts-on']&&v_ThisDay>=A_Calendar['today']&&v_ThisDay<=A_Calendar['days-in-month']){v_ShowDay=true;}
			if(v_ThisDay>0&&v_ThisDay<A_Calendar['days-in-month']){v_DayOnCalendar=true;}
			o_Calendar.find('#week-'+v_Week).append(
				$('<td/>',{
					'id':'day-'+v_ThisDay,
					'class':((v_ShowDay)?((v_ThisDay==A_Calendar['today'])?'color-Z-3':'color-F-4 light-down')+' border-all-I-1-65':'color-X-4 border-all-I-1-35'+((!v_ShowDay&&(v_ThisDay-7)>A_Calendar['days-in-month'])?'':' shadow-up')),
					'css':{'text-align':'center','width':v_DayWidth+'%','overflow':'hidden'},
					'html':((v_ShowDay)?'<div class="color-E-2 font-Y" style="height:12px; width:100%;">'+v_ThisDay+'</div>':((v_DayOnCalendar)?'<div class="color-E-4 font-I" style="height:12px; width:100%">'+v_ThisDay+'</font>':''))
				})
			);
			v_ThisDay++;
		}
	}

	o_Calendar
		.appendTo($('#'+v_Construct+'-view-month'));

	$.getJSON('/quick/request-calendar',function(o_JSON){A_Cells['construct-2']['month-data']=o_JSON;$('#on-screen-calendar').trigger('apply-data');});
}
/* Live Event - Clicked Calendar Event */
$('.clicked-calendar-event').live('click',function(){
	var a_Data=$(this).attr('data').split('|');
	var v_EventID=parseInt(a_Data[0]);
	var v_EventName=a_Data[1];
	var v_Construct=F_GetConstruct('events');
	$('#'+v_Construct).trigger('construct-blind-search',{0:'specific',1:v_EventName,2:v_EventID,3:true});
	$('#menu-events').click();
	if(A_Cells[v_Construct]['view']!=='list'){F_ChangeView(v_Construct,'list');}
});
/* Function - Change View */
function F_ChangeView(v_Construct,v_View){
	$('#'+v_Construct).find('#'+v_View+'-view').hide();
	$('#'+v_Construct).find('#'+A_Cells[v_Construct]['view']+'-view').show();
	A_Cells[v_Construct]['view']=v_View;
	if(V_Area!=='home'){
		A_Cells[v_Construct]['size']='expanded'+((A_Cells[v_Construct]['open-lines'][A_Cells[v_Construct]['view']])?'-with-open-line':'');
		if(A_Cells[v_Construct]['size']=='expanded-with-open-line'&&!A_Cells[v_Construct]['failed']){
			$('#'+v_Construct)
				.trigger('after-effects')
				.trigger('show-open-line');
		}else{
			$('#'+v_Construct).trigger('hide-open-line');
		}
	}
	$('#'+v_Construct)
		.trigger('hide-other-views')
		.trigger('re-size')
		.trigger('re-draw')
		.trigger('highlight-line');
	if(!V_ExpandedOpenLine&&!A_Cells[v_Construct]['failed']){
		$('#'+v_Construct)
			.trigger('show-view');
	}
}
/* Function - Close Dockable */
function F_CloseDockable(v_URL){
	$('#dockable-black-curtain').hide();
	$('#dockable-close-link').hide();
	if(!A_User['logged-in']){$('#top-link-log-in').show();}
	$('#dockable-window').css({'visibility':'hidden'});
	$('#dockable-content').css({'visibility':'hidden'});
	$('#dockable-content').attr('src','');
}
/* Function - Construct And Replace */
function F_ConstructAndReplace(v_HTML,a_Data){for(var v_Key in a_Data){while(v_HTML.indexOf('replace-'+v_Key)>-1){v_HTML=v_HTML.replace('replace-'+v_Key,a_Data[v_Key]);}}return v_HTML;};
/* Function - Construct Search */
function F_ConstructSearch(v_Construct){
	var a_Search=new Array();
	for(var v_Key in A_Search[v_Construct]){
		if(A_Search[v_Construct][v_Key]['on']){a_Search[a_Search.length]=v_Key+'='+A_Search[v_Construct][v_Key][A_SendWithSearch[v_Construct][v_Key]];}
	}
	return a_Search.join(',');
}
/* Function - Convert Name To Data */
function F_ConvertNameToData(v_String){var a_NameData=v_String.split('_');var a_NewData=Array();var a_Data=Array();for(var v_Key in a_NameData){a_Data=a_NameData[v_Key].split('|');a_NewData[a_Data[0]]=a_Data[1];}return a_NewData;}
/* Function - Copy HTML */
function F_CopyHTML(v_Element){return $('#'+v_Element).html();}
/* Function -  F_Expand Open Line */
function F_ExpandOpenLine(v_Construct){
	if(V_ExpandedOpenLine&&A_Cells[v_Construct]['size']=='expanded-with-open-line'){
		$('#'+v_Construct).trigger('hide-view');
		$('#'+v_Construct+'-open-line').css('width',V_MaximumWidth);
	}else{
		if(!A_Cells[v_Construct]['failed']){$('#'+v_Construct).trigger('show-view');}
		$('#'+v_Construct+'-open-line').css('width',Math.floor(V_MaximumWidth*0.60));
	}
}
/* Function - First Key */
function F_FirstKey(v_Construct){for(var v_View in A_Cells[v_Construct]['views']){return v_View;}}
/* Function - Get Construct */
function F_GetConstruct(v_Area){for(var v_Key in A_Cells){if(A_Cells[v_Key]['alias']==v_Area){return v_Key;}}}
/* Function - Get Construct ID */
function F_GetConstructID(v_ID){var a_ID=v_ID.split('-');return a_ID[0]+'-'+a_ID[1];}
/* Function - Get Construct By Alias */
function F_GetConstructByAlias(v_Area){for(var v_Key in A_Cells){if(A_Cells[v_Key]['alias']==v_Area){return v_Key;}}}
/* Function - Get Days In Month */
function F_GetDaysInMonth(v_Year,v_Month){var v_Date=new Date(v_Year,v_Month,0);return v_Date.getDate();}
/* Function - Get Library Name */
function F_GetLibraryName(){var a_LibraryNames={1:'Main Library',2:'Coolspring',3:'Fish Lake',4:'Hanna',5:'Kingsford Heights',6:'Rolling Prairie',7:'Union Mills',8:'Mobile Library'};return a_LibraryNames[V_HomeLibrary];}
/* Function - Get Real Time */
function F_GetRealTime(v_DateString){
	var a_DateTime=v_DateString.split(' ');
	v_DateString='March 25, 2010 '+a_DateTime[1];
	var v_Date=new Date(v_DateString);
	var a_DateForFireFox=a_DateTime[0].split('-');
	a_DateForFireFox.reverse();
	v_Date.setFullYear(a_DateForFireFox[2],a_DateForFireFox[1],a_DateForFireFox[0]);
	var v_Hours=v_Date.getHours();
	if(v_Hours==0){return false;}
	var v_Minutes=v_Date.getMinutes();
	var v_Extra='AM';
	if(v_Hours==12){v_Extra='PM';}
	if(v_Hours>12){v_Hours-=12;v_Extra='PM';}
	if(v_Minutes<10){v_Minutes='0'+v_Minutes;}
	return v_Hours+':'+v_Minutes+' '+v_Extra;
}
/* Function - Get Visibility Status */
function F_GetVisibilityStatus(v_Construct){return ((V_Area==A_Cells[v_Construct]['alias']||(V_Area=='home'&&A_Cells[v_Construct]['show-while-shrunk']))?true:false);}
/* Function - Close Account */
function F_CloseAccount(){
	V_AnchoredAccountBoxOnScreen=false;
	$('#anchored-account-box').animate({bottom:'-=126'},1000);
}
/* Function - Close Help */
function F_CloseHelp(){
	V_AnchoredMessageBoxOnScreen=false;
	$('#anchored-message-box').animate({bottom:'-=126'},1000);
}
/* Function - Hide All Open Lines */
function F_HideAllOpenLines(){for(var v_Key in A_Cells){F_HideOpenLine(v_Key);}}
/* Function - Hide Others */
function F_HideOpenLine(v_Construct){$('#'+v_Construct+'-open-line').hide();}
/* Function - Highlight Menu */
function F_HighlightMenu(){
	$('.menu-Z-35')
		.removeClass('font-E').addClass('font-X')
		.removeClass('menu-Z-35').addClass('menu-Y-65');
	$('#menu-'+V_Area)
		.removeClass('font-X').addClass('font-E')
		.removeClass('menu-Y-65').addClass('menu-Z-35');
}
/* Function - Line Click */
function F_LineClick(v_Construct,v_LineKey){A_Cells[v_Construct]['target']=v_LineKey;$('#'+v_Construct).trigger('zoom-in').trigger('highlight-line');}
/* Function - Log In User */
function F_LogUser(v_ShowMessage,v_Status,v_Theme,v_Type){
	if(v_ShowMessage){
		var a_Parameters={};
		a_Parameters={'html':'<font class="font-G" style="font-size:12px;">You have successfully logged '+((v_Status)?'into':'out of')+' LAPCAT.</font>'};
		F_AddInformationBox(a_Parameters,false,3000);
	}
	if(v_Status){
		if(v_Type>=5){
			$('#top-link-tickets').show();
			$('#top-link-objectives').show();
		}
		$('#top-link-log-in').hide();
		$('#top-link-log-out').show();
		$('#top-link-account').show();
		$('[name="username"]').attr('value','library card number');
		$('[name="password"]').attr('value','LCPL');
		$('[id|="start-menu-not-logged-in"]').hide();
		$('[id|="start-menu-logged-in"]').show();
		$('#start-menu-arrow-1').hide();
		$('#start-menu-arrow-2').hide();
		F_GetAnticipatedEventsList();
	}else{
		$('#top-link-objectives').hide();
		$('#top-link-tickets').hide();
		$('#top-link-account').hide();
		$('#top-link-log-out').hide();
		$('#top-link-log-in').show();
		$('[id|="start-menu-logged-in"]').hide();
		$('[id|="start-menu-not-logged-in"]').show();
		$('#start-menu-arrow-1').show();
		$('#start-menu-arrow-2').show();
	}
	A_User['logged-in']=v_Status;
	A_User['type']=v_Type;
	if(v_Theme!==V_Theme){$('#index-css-theme').attr('href','/lapcat/css/themes/theme-generator.php?theme='+v_Theme);}
	V_Theme=v_Theme;
}
/* Function - Open Dockable */
function F_OpenDockable(v_URL){
	$('#dockable-black-curtain').show();
	$('#dockable-close-link').show();
	if(!A_User['logged-in']){$('#top-link-log-in').hide();}
	$('#dockable-window').css({'visibility':'visible'});
	$('#dockable-content').css({'visibility':'visible'});
	$('#dockable-content').attr('src',v_URL);
}
/* Function - Open Help */
function F_OpenHelp(){
	if(V_AnchoredAccountBoxOnScreen){
		F_CloseAccount();
	}
	if(V_AnchoredMessageBoxOnScreen){
		F_CloseHelp();
	}else{
		V_AnchoredMessageBoxOnScreen=true;
		$('#anchored-message-box').animate({bottom:'+=126'},1000);
	}
}
/* Function - Open Help */
function F_OpenAccount(){
	if(V_AnchoredMessageBoxOnScreen){
		F_CloseHelp();
	}
	if(V_AnchoredAccountBoxOnScreen){
		F_CloseAccount();
	}else{
		V_AnchoredAccountBoxOnScreen=true;
		$('#anchored-account-box').animate({bottom:'+=126'},1000);
	}
}
/* Function - Populate Drops */
function F_PopulateDrops(v_Construct,v_Area,v_Specific,v_DropKey){
	if(F_ArrayKeyExists(v_Area,A_Drops)){
		var v_Pass=false;
		var a_Data={'construct':v_Construct};
		for(var v_DropType in A_Drops[v_Area]){
			a_Data['key']=v_DropType;
			v_Pass=false;
			if(v_Specific){
				if(v_DropType!=v_DropKey){break;}
			}
			$('#change-'+v_DropType+'-drops-lines').html('');
			if(v_DropType=='popular'||v_DropType=='tag'){a_Data['class-A']='add-to-all-searches';}else{a_Data['class-A']='add-to-search';}
			for(var v_LineKey in A_Drops[v_Area][v_DropType]){
				a_Data['text']=A_Drops[v_Area][v_DropType][v_LineKey]['name'];
				a_Data['value']=A_Drops[v_Area][v_DropType][v_LineKey]['value'];
				v_Pass=true;
				$('#change-'+v_DropType+'-drops-lines').append(F_ConstructAndReplace(F_CopyHTML('data-div-A'),a_Data));
			}
			var v_DefaultValue=0;
			switch(v_DropType){
				case 'popular':
					for(var v_Key in A_Drops[v_Area]['popular']){v_DefaultValue=v_Key;break;}
					if(v_Area!=='home'){if(A_Search[v_Area]['popular']['value']>0){v_DefaultValue=A_Search[v_Area]['popular']['value'];}}
					$('#change-popular-master').html(((v_DefaultValue>0)?A_Drops[v_Area]['popular'][v_DefaultValue]['name']:'empty'));
					break;
				case 'search':case 'sort':case 'type':
					v_DefaultValue=A_Search[v_Construct][v_DropType]['value'];
					if(v_DefaultValue==''){v_DefaultValue=0;}
					if(v_Area=='materials'){v_DefaultValue=1;}
					$('#change-'+v_DropType+'-master').html(A_Drops[v_Area][v_DropType][v_DefaultValue]['name']);
					break;
				default:break;
			}
			if(!v_Pass){$('#change-'+v_DropType+'-drops-lines').html('<div style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:auto;"><font class="font-H">No Results</font></div>');}
		}
	}
}
/* Function - Populate Tag Drop */
function F_PopulateTagDrop(v_Value){
	$('#change-tag-drops-lines').html('');
	var v_Pass=false;
	for(var v_LineKey in A_Tags){
		if(v_Value==A_Tags[v_LineKey]['name'].substr(0,v_Value.length)){
			v_Pass=true;
			$('#change-tag-drops-lines').append('<div class="effect-hover-Z-2 fake-link add-to-all-searches" id="value-'+A_Tags[v_LineKey]['ID']+'" name="key|tag_value|'+A_Tags[v_LineKey]['ID']+'_text|'+A_Tags[v_LineKey]['name']+'" style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;">'+A_Tags[v_LineKey]['name']+'</div>');
		}
	}
	if(!v_Pass){$('#change-tag-drops-lines').html('<div style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:170px;"><font class="font-H">No Results</font></div>');}
}
/* Function - Refresh */
function F_Refresh(v_Construct,v_Counter){
	if(A_Cells[v_Construct]['refresh-on']){
		if(A_Cells[v_Construct]['refresh-counter']==v_Counter&&(V_Area==A_Cells[v_Construct]['alias']||V_Area=='home')){
			$('#'+v_Construct).trigger('blind-request');
			F_StartRefresh(v_Construct);
		}
	}
}
/* Function - Remove From Search */
function F_RemoveFromSearch(v_Construct,v_Key){
	A_Search[v_Construct][v_Key]={'on':true,'text':'','value':''};
	$('#change-'+v_Key+'-master').attr('value','').html(((F_ArrayKeyExists(v_Key,A_Drops[V_Area]))?A_Drops[V_Area][v_Key][0]['name']:''));
	$('#'+v_Key+'-selected').hide();
	A_Cells[v_Construct]['blind-URL']='/quick/'+A_Cells[v_Construct]['alias']+'/search/'+F_ConstructSearch(v_Construct);
}
/* Function - Request Image */
function F_RequestImage(v_View,a_Data){
	var a_Images=Array();
	for(var v_Key in a_Data){
		a_Images[v_Key]=$('<img/>');
		if(v_View=='list'){a_Images[v_Key].addClass('show-cover');}
		a_Images[v_Key].attr('src','http://cdn1.lapcat.org/coverCache/imageFetch.php?isbn='+a_Data[v_Key]['ISBNorSN'].replace(/ /g,'')+'&size=S');
		a_Images[v_Key].attr('id',v_View+'-cover-'+v_Key);
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
				$('#on-screen-'+$(this).attr('id')).replaceWith($(this).clone());
			}
		}).each(function(){if(this.complete){$(this).trigger('load');}});
	}
}
/* Function - Request Popular Tags */
function F_RequestPopularTags(){$.getJSON('/quick/popular-tags',function(o_JSON){if(!o_JSON['failed']){F_SetPopularTags(o_JSON['data']);}});}
/* Function - Reset Construct */
function F_ResetConstruct(v_Construct){
	A_Cells[v_Construct]['view']=F_FirstKey(v_Construct);
	A_Cells[v_Construct]['size']='shrunk';
	A_Cells[v_Construct]['on-screen']=F_GetVisibilityStatus(v_Construct);
	A_Cells[v_Construct]['blind-URL']='/quick/'+A_Cells[v_Construct]['alias']+'/search';
}
/* Function - Re-Draw Other Constructs */
function F_ReDrawOtherConstructs(v_Construct){for(var v_Key in A_Cells){if(v_Construct!==v_Key){$('#'+v_Key).trigger('re-draw');}}}
/* Function - Set Data */
function F_SetAllData(v_Construct,o_JSON){for(var v_Key in o_JSON){if(F_ArrayKeyExists(v_Key,A_Cells[v_Construct])){A_Cells[v_Construct][v_Key]=o_JSON[v_Key];}}}
/* Function - Set General Font Size */
function F_SetGeneralFontSize(){$('[id="general-font-size"]').css('font-size',V_FontSize+'px');}
/* Function - Set Popular Tags */
function F_SetPopularTags(a_Data){for(var v_Tag in a_Data){A_Drops['home']['popular'][a_Data[v_Tag]['ID']]={'name':a_Data[v_Tag]['name'],'value':a_Data[v_Tag]['ID']};}F_PopulateDrops('construct-0','home',true,'popular');}
/* Function - Show Available */
function F_ShowAvailable(v_Construct){
	$('#'+v_Construct+' [name="available-at-home"]').each(function(v_Index){
		var v_CopiesAvailableAtHome=parseInt($(this).html());
		if(v_CopiesAvailableAtHome>0){
			$(this).html(F_CopyHTML('checkmark-green'));
			$(this).find('#available').attr('title',v_CopiesAvailableAtHome+' cop'+((v_CopiesAvailableAtHome==1)?'y':'ies')+' available at my home library ('+F_GetLibraryName()+').');
		}else if(v_CopiesAvailableAtHome<100){
			$(this).html($(F_CopyHTML('checkmark-green')).fadeTo(0,0.15));
			$(this).find('#available').attr('title','No copies available at my home library ('+F_GetLibraryName()+').');
		}
		$(this).show();
	});
	$('#'+v_Construct+' [name="available-at-other"]').each(function(v_Index){
		var v_CopiesAvailableAtOtherLibraries=parseInt($(this).html());
		if(v_CopiesAvailableAtOtherLibraries>0){
			$(this).html(F_CopyHTML('checkmark-grey'));
			$(this).find('#available').attr('title',v_CopiesAvailableAtOtherLibraries+' cop'+((v_CopiesAvailableAtOtherLibraries==1)?'y':'ies')+' available at other libraries.');
		}else{
			$(this).html($(F_CopyHTML('checkmark-grey')).fadeTo(0,0.15));
			$(this).find('#available').attr('title','No copies available at other libraries.');
		}
		$(this).show();
	});
}
/* Function - Replace Times */
function F_ReplaceTimes(v_Construct){
	var v_Target=A_Cells[v_Construct]['target'];
	var v_StartTime=F_GetRealTime(A_Cells[v_Construct]['data'][v_Target]['o-date']+' '+A_Cells[v_Construct]['data'][v_Target]['start']);
	var v_EndTime=F_GetRealTime(A_Cells[v_Construct]['data'][v_Target]['o-date']+' '+A_Cells[v_Construct]['data'][v_Target]['end']);
	$('#'+v_Construct+'-open-line #start-time').html(v_StartTime);
	if(v_EndTime){
		$('#'+v_Construct+'-open-line #end-time').html(v_EndTime);
		$('#has-end-time').show();
	}else{
		$('#has-end-time').hide();
	}
}
/* Function - Show Home Libraries */
function F_ShowHomeLibraries(){$('font:.location-'+V_HomeLibrary).removeClass('library-link-1').addClass('library-link-3 font-M');}
/* Function - Turn Off Links */
function F_TurnOffLinks(v_Construct){
	var v_Target=A_Cells[v_Construct]['target'];
	if(A_Cells[v_Construct]['data'][v_Target]['at-home']==3&&A_Cells[v_Construct]['data'][v_Target]['in-or-out']=='out'){
		$('#'+v_Construct+' #database-link').removeClass('button-blue database-dockable font-G shadow-or-light-X-up').addClass('button-Y-fake font-X');
	}
}
/* Function - Fix Mobile Library Data */
function F_FixMobileLibraryData(v_Construct){
	if(F_ArrayKeyExists(7,A_Cells[v_Construct]['data'])){
		for(var v_Counter=0;v_Counter<7;v_Counter++){
			A_Cells[v_Construct]['data'][7]['time-'+v_Counter]='&nbsp;';
		}
	}
}
/* Function - Show Location Information */
function F_ShowLocationInformation(v_Construct){
	$('#'+v_Construct+' [id|="current-day-cell"]').each(function(v_Index){
		//alert($(this).attr('id').replace('current-day-cell-',''));
		var v_Day=parseInt($(this).attr('id').replace('current-day-cell-',''));
		//alert(v_Day+' :: '+A_Calendar['first-day-starts-on']);
		if(v_Day<A_Calendar['first-day-starts-on']){
			$(this).addClass('color-Z-4 shadow-or-light-X-up');
		}else if(v_Day==A_Calendar['first-day-starts-on']){
			$(this).addClass('color-Z-2 shadow-or-light-Y-up');
		}
	});
}
/* Function - Hours Event Click */
$('.hours-event-click').live('click',function(){
	var a_Data=F_ConvertNameToData($(this).attr('name'));
	var v_Construct=a_Data['construct'];
	var v_Alias=A_Cells[v_Construct]['alias'];
	$('#'+a_Data['construct'])
		.trigger('construct-blind-search',{0:'search',1:a_Data['search-ID'],2:a_Data['search-text'],3:false})
		.trigger('construct-blind-search',{0:'date',1:a_Data['date-ID'],2:a_Data['date-text'],3:true});
	$('#menu-'+v_Alias).click();
});
/* Function - Show Page Buttons */
function F_ShowPageButtons(v_Construct){
	//var a_Data=F_GetData(v_Construct,'page');
	var a_Data=A_Cells[v_Construct]['page'];
	//alert('Current Page: '+a_Data['current-page']);
	//alert('Total Pages: '+a_Data['total-pages']);
	//alert('Total Records: '+a_Data['total-records']);
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
				$('#button-page-list').append('<div class="'+((a_Buttons[v_Key]['value']==a_Data['current-page'])?'button-blue-2':'page-click button-blue')+'" id="button-page" name="'+a_Buttons[v_Key]['value']+'" onfocus="javascript:this.blur();" style="float:left; margin-right:4px; height:12px; text-align:center; vertical-align:top; width:18px;"><font class="font-G" style="font-weight:bold; font-size:10px; vertical-align:top;">'+a_Buttons[v_Key]['value']+'</font></div>');
			}else{
				// Text
				$('#button-page-list').append('<font class="font-bold font-X" style="float:left; font-size:10px; margin-right:4px; vertical-align:top; text-align:center; width:20px;">'+a_Buttons[v_Key]['value']+'</font>');
			}
		}
	}
	$('#button-page-list').show();
}

/* Live Event - Clicked Reset Search */
$('.clicked-reset-search').live('click',function(){
	var v_Construct=F_GetConstruct(V_Area);
	F_ResetConstruct(v_Construct);
	A_Cells[v_Construct]['blind-URL']='/quick/'+V_Area+'/reset';
	$('#'+v_Construct).trigger('blind-request');
	F_ResetConstruct(v_Construct);
});

/* Live Event - Page Click */
$('.page-click').live('click',function(){
	var v_Construct=F_GetConstruct(V_Area);
	A_Cells[v_Construct]['blind-URL']='/quick/'+V_Area+'/change-page/'+$(this).attr('name');
	$('#'+v_Construct).trigger('blind-request');
	A_Cells[v_Construct]['blind-URL']='/quick/'+V_Area+'/search/'+F_ConstructSearch(v_Construct);
	var pageTracker = _gat._getTracker('UA-8067208-1');		
	pageTracker._trackPageview('Changed pages to page '+$(this).attr('name')+' in '+V_Area+'.');
});

/* Function - Show Search Menu */
function F_ShowSearchMenu(v_Area){
	var v_Construct=F_GetConstructByAlias(v_Area);
	F_PopulateDrops(v_Construct,v_Area);
	for(v_Key in A_SearchBox[v_Area]){if(A_SearchBox[v_Area][v_Key]){$('#container-'+v_Key).show();}else{$('#container-'+v_Key).hide();}}
	//$('#change-tag-RSS').css({'visibility':((A_SearchBox[v_Area]['change-tag-RSS'])?'visible':'hidden')});
}
/* Function - Shrink Other Constructs */
function F_ShrinkOtherConstructs(v_Construct,v_ShowConstruct){
	for(var v_Key in A_Cells){
		if(v_Key!==v_Construct){
			A_Cells[v_Key]['size']='shrunk';
			$('#'+v_Key)
				.trigger('re-size')
				.trigger(((v_ShowConstruct)?'show':'hide')+'-construct');
		}
	}
}
/* Function - Start Refresh */
function F_StartRefresh(v_Construct){
	A_Cells[v_Construct]['refresh-counter']++;
	setTimeout('F_Refresh(\''+v_Construct+'\',\''+A_Cells[v_Construct]['refresh-counter']+'\');',A_Cells[v_Construct]['refresh-timer']);
}
/* Function - Toggle All Refresh */
function F_ToggleAllRefresh(){
	for(var v_Key in A_Cells){
		if(A_Cells[v_Key]['refresh-on']){
			F_ToggleRefresh(v_Key,true);
		}
	}
}
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
/* Function - Trigger Client Changes */
function F_TriggerClientChanges(a_Changes){for(var v_Key in a_Changes){$('#'+F_GetConstruct(a_Changes[v_Key]['area'])).trigger('construct-blind-search',{0:a_Changes[v_Key]['key'],1:a_Changes[v_Key]['value'],2:a_Changes[v_Key]['text'],3:false});}}

/* Live Event - Text */
$(':text').live('click',function(){$(this).select();$(this).focus();});
/* Live Event - Add To All Searches */
$('.add-to-all-searches').live('click',function(){
	$('.drops-out').trigger('mouseout');
	var a_Data=F_ConvertNameToData($(this).attr('name'));
	for(var v_Construct in A_Search){$('#'+v_Construct).trigger('construct-blind-search',{0:a_Data['key'],1:a_Data['value'],2:a_Data['text'],3:true});}
	return false;
});
/* Live Event - Add To Search */
$('.add-to-search').live('click',function(){
	$('.drops-out').trigger('mouseout');
	var a_Data=F_ConvertNameToData($(this).attr('name'));
	$('#'+a_Data['construct']).trigger('construct-blind-search',{0:a_Data['key'],1:a_Data['value'],2:a_Data['text'],3:true});
	return false;
});
/* Live Event - Remove From Search */
$('.remove-from-search').live('click',function(){
	var v_Construct=F_GetConstructID($(this).parents('[id|="construct"]').attr('id'));
	var v_Key=$(this).attr('id').replace('remove-','');
	$('#'+v_Construct).trigger('construct-blind-search',{0:v_Key,1:'',2:'',3:true});
	return false;
});
/* Live Event - Remove From Search */
$('.remove-from-all-searches').live('click',function(){
	var v_Key=$(this).attr('id').replace('remove-','');
	for(var v_Construct in A_Search){$('#'+v_Construct).trigger('construct-blind-search',{0:v_Key,1:'',2:'',3:true});}
	return false;
});
/* Live Event - Auto Refresh Click */
$('.auto-refresh-click').live('click',function(){F_ToggleRefresh(F_GetConstructID($(this).parents('[id|="construct"]').attr('id')),true);});
/* Live Event - Browse Link / Database Dockable */
$('.browse-link,.database-dockable').live('click',function(){
	var pageTracker = _gat._getTracker('UA-8067208-1');		
	pageTracker._trackPageview('Opened the catalog or a database.');
	F_OpenDockable($(this).attr('name'));
	return false;
});
/* Live Event - Catalog Link */
$('.catalog-link').live('click',function(){
	var pageTracker = _gat._getTracker('UA-8067208-1');		
	pageTracker._trackPageview('Opened the catalog.');
	F_OpenDockable($(this).attr('href'));
	return false;
});
/* Live Event - Close Anchored Account */
$('.close-anchored-account').live('click',function(){F_CloseAccount();});
/* Live Event - Close Anchored Message */
$('.close-anchored-message').live('click',function(){F_CloseHelp();});
/* Live Event - Close Dockable */
$('.close-dockable').live('click',function(){F_CloseDockable();});
/* Live Event - Decrease Font */
$('.decrease-font-click').live('click',function(){V_FontSize-=2;if(V_FontSize<11){V_FontSize=11;}F_SetGeneralFontSize();});
/* Live Event - Drops */
$('.drops:visible')
	.live('mouseover',function(){$(this).fadeTo(0,1.00);})
	.live('mouseout',function(){$(this).fadeTo(0,0.50);})
	.live('click',function(){$('#'+$(this).attr('ID')+'-lines').show();});
/* Live Event - Drops Out */
$('.drops-out:visible').live('mouseleave',function(){$(this).hide();});
/* Live Event - Drops Out Top */
$('.drops-out-top:visible').live('mouseleave',function(){$('#'+($(this).attr('ID')).replace('container-','')+'-drops-lines').hide();});
/* Live Event - Give Link */
$('.give-link').live('click',function(){return window.open('https://catalog.lapcat.org:443/donate','donate','width=550,height=550,status=yes,scrollbars=yes,resizable');});
/* Live Event - Increase Font */
$('.increase-font-click').live('click',function(){V_FontSize+=2;if(V_FontSize>19){V_FontSize=19;}F_SetGeneralFontSize();});
/* Live Event - Line Click */
$('.line-click').live('click',function(){F_LineClick(F_GetConstructID($(this).parents('[id|="construct"]').attr('id')),$(this).attr('name').replace(/counter-/g,''));});
/* Live Event - Magnifier Click */
$('.magnifier-click').live('click',function(){
	$('#'+$(this).parents('[id|="construct"]').attr('id')).trigger($(this).attr('id'));
	var pageTracker = _gat._getTracker('UA-8067208-1');		
	pageTracker._trackPageview('Clicked on a magnifier.');
});
/* Live Event - Menu Move Click */
$('.menu-move-click').live('click',function(){
	var v_Area=$(this).attr('id').replace(/menu-/g,'');
	var v_Movement=false;
	var v_PreviousArea=V_Area;
	if(V_Area!==v_Area){v_Movement=true;}
	var v_Construct=F_GetConstructByAlias(v_Area);
	if(v_Movement){if(v_Area!=='home'){$('#'+v_Construct).trigger('zoom-in');}else{$('#'+F_GetConstructByAlias(v_PreviousArea)).trigger('zoom-out');}}
	var pageTracker = _gat._getTracker('UA-8067208-1');		
	pageTracker._trackPageview('Moved to '+v_Area+' from '+V_Area+'.');
	V_Area=v_Area;
});
/* Live Event - Name Hover */
$('.name-hover').live('mouseover',function(){
	$('#message-text').html('<font class="font-G" style="font-size:12px;">'+$(this).attr('name')+'</font>').css('height','auto').css('width','auto');
	$('#message-box').css('top',($(this).position().top)+((V_Area=='events')?20:0)).css('left',($(this).position().left)+20).show();
});
/* Live Event - Name Hover / Show Cover */
$('.name-hover,.show-cover').live('mouseout',function(){$('#message-box').hide();});
/* Live Event - Name Search */
$('.name-search').live('submit',function(){
	var v_Construct=F_GetConstructID($(this).parents('[id|="construct"]').attr('id'));
	$('#'+v_Construct).trigger('construct-blind-search',{0:'similar',1:true,2:$(this).find('#change-similar-master').attr('value'),3:true});
	return false;
});
/* Live Event - Next Materials */
$('.next-materials').live('click',function(){
	var v_Construct=F_GetConstruct('materials');
	var v_CurrentKey=A_Search[v_Construct]['type']['value'];
	var v_NextKey=0;
	if(v_CurrentKey==159){
		v_NextKey=0;
	}else{
		var v_Break=false;
		for(var v_Key in A_Drops['materials']['type']){
			v_NextKey=v_Key;
			if(v_Break){break;}
			if(v_Key==v_CurrentKey){v_Break=true;}
		}
	}
	$('#'+v_Construct).trigger('construct-blind-search',{0:'type',1:v_NextKey,2:A_Drops['materials']['type'][v_NextKey]['name'],3:true});
});
/* Live Event - Option Click */
$('.option-click').live('click',function(){
	var v_Option=$(this).attr('id').replace('option-','');
	var v_Construct=F_GetConstructID($(this).parents('[id|="construct"]').attr('id'));
	var a_Words={'news':'article','events':'event','databases':'database','materials':'material'};
	var v_Word=a_Words[V_Area];
	var a_Inserted={
		'watched':'You are now anticipating this '+v_Word+'.',
		'favorite':'You have added this '+v_Word+' as a favorite.'
	};
	var a_NotInserted={
		'watched':'You are no longer anticipating this '+v_Word+'.',
		'favorite':'You have removed this '+v_Word+' as a favorite.'
	};
	switch(v_Option){
		case 'similar':
			$('#'+v_Construct).trigger('construct-blind-search',{0:'similar',1:true,2:A_Cells[v_Construct]['data'][A_Cells[v_Construct]['target']]['name'],3:true});
			break;
		case 'expand':
			V_ExpandedOpenLine=((V_ExpandedOpenLine)?false:true);
			F_ExpandOpenLine(v_Construct);
			break;
		case 'collect':case 'watchlist':
			return;
		case 'favorite':case 'watched':
			if(A_User['logged-in']){
				var v_Construct=F_GetConstruct(V_Area);
				var v_Target=A_Cells[v_Construct]['target'];
				$.getJSON('/quick/'+V_Area+'/'+v_Option+'/'+A_Cells[v_Construct]['data'][v_Target]['ID'],function(o_JSON){
					var a_Parameters={'html':((o_JSON['inserted'])?a_Inserted[v_Option]:a_NotInserted[v_Option])};
					F_AddInformationBox(a_Parameters,false,3000);
					if(v_Option=='watched'){F_GetAnticipatedEventsList();}
					A_Cells[v_Construct]['data'][v_Target][v_Option]=((o_JSON['inserted'])?1:0);
					$('#'+v_Construct).trigger('show-line-conditions',v_Target);
				});
			}
			break;
		default:break;
	}
});
/* Live Event - Previous Materials */
$('.previous-materials').live('click',function(){
	var v_Construct=F_GetConstruct('materials');
	var v_CurrentKey=A_Search[v_Construct]['type']['value'];
	var v_PreviousKey=159;
	if(v_CurrentKey!==0){
		for(var v_Key in A_Drops['materials']['type']){
			if(v_Key==v_CurrentKey){break;}
			v_PreviousKey=v_Key;
		}
	}
	$('#'+v_Construct).trigger('construct-blind-search',{0:'type',1:v_PreviousKey,2:A_Drops['materials']['type'][v_PreviousKey]['name'],3:true});
});
/* Live Event - Remove Search Click */
$('.remove-search-click').live('click',function(){
	var v_Construct=F_GetConstructID($(this).parents('[id|="construct"]').attr('id'));
	var v_Key=$(this).attr('id').replace('search-on-','');
	$('#'+v_Construct+' #search-on-'+v_Key).hide();
	F_RemoveFromSearch(v_Construct,v_Key);
	$('#'+v_Construct).trigger('blind-request');
});
/* Live Event - Show Cover */
$('.show-cover').live('mouseover',function(v_XY){
	$('#message-text').html($(this).clone().removeClass('show-cover').css('height','auto').css('width','auto'));
	$('#message-box').css('top',$(this).position().top).css('left',($(this).position().left)+36).show();
});
/* Live Event - Stop Refresh Click */
$('.stop-refresh-click').live('click',function(){F_ToggleRefresh(F_GetConstructID($(this).parents('[id|="construct"]').attr('id')),false);});
/* Live Event - Tag Box */
$('.tag-box').live('keyup',function(){if($(this).attr('value').length>0){$('#change-tag-drops-lines').show();F_PopulateTagDrop($(this).attr('value'))}else{$('#change-tag-drops-lines').hide();}});
/* Live Event - View Click */
$('.view-click').live('click',function(){
	var v_Construct=F_GetConstructID($(this).parents('[id|="construct"]').attr('id'));
	var v_View=$(this).attr('id').replace(/-view/g,'');
	if(!A_Cells[v_Construct]['failed']){F_ChangeView(v_Construct,v_View);}
	var pageTracker = _gat._getTracker('UA-8067208-1');		
	pageTracker._trackPageview('Changed view in '+v_Construct+' to '+v_View+'.');
});


/* Function - Parse URL */
function F_ParseURL(){
	var A_URL=window.location.href.split('/');
	if(F_ArrayKeyExists(3,A_URL)){
		var v_Pass=false;
		var v_Word=A_URL[3].replace(/%20/g,' ').toLowerCase();
		/* URL Navigation - Tag Search */
		if(!v_Pass){
			for(var v_TagKey in A_Tags){if(A_Tags[v_TagKey]['name']==v_Word){A_StartingTag=A_Tags[v_TagKey];v_Pass=true;break;}}
		}
		if(A_StartingTag['ID']>0){
			F_AddToAllSearches({0:'tag',1:A_StartingTag['ID'],2:A_StartingTag['name'],3:false});
		}else{
			/* URL Navigation - Specific Area */
			for(var v_MenuKey in A_SearchBox){
				if(v_MenuKey==v_Word){
					V_Area=v_MenuKey;
					var v_Construct=F_GetConstruct(v_MenuKey);
					if(F_ArrayKeyExists(5,A_URL)){
						A_Cells[v_Construct]['blind-URL']='/quick/'+V_Area+'/specific/'+A_URL[5];
					}else{
						A_Cells[v_Construct]['blind-URL']='/quick/'+V_Area+'/search';
					}
					$('#'+v_Construct).trigger('zoom-in');
					v_Pass=true;
				}
			}
			/* URL Navigation - Special */
			if(!v_Pass){
				switch(v_Word){
					case 'catalog':F_OpenDockable('http://catalog.lapcat.org');break;
					case 'give':$('#give-link').click();break;
					default:break;
				}
			}
		}
	}
	F_ShowSearchMenu(V_Area);
}

/* Function - Search Catalog */
function F_SearchCatalog(){F_OpenDockable('http://catalog.lapcat.org/search/X'+$('#form-catalog-search-text').attr('value').replace(/ /g,'+'));}


/* Document - Ready */
$(document).ready(function(){
	//F_CreateLogWindow();
	F_PrepareCalendar();
	F_OpenHelp();
	$.getJSON('/quick/status',function(o_JSON){F_LogUser(false,o_JSON['switch'],o_JSON['theme'],o_JSON['type']);});
	F_HighlightMenu();
	F_AddConstruct('construct-1',{});
	F_AddPromotion('promotion-1',{'float':'left'});
	F_AddConstruct('construct-2',{'float':'left','padding-right':12});
	F_AddConstruct('construct-3',{'float':'left','padding-right':12});
	F_AddConstruct('construct-4',{'float':'left','padding-right':12});
	F_AddConstruct('construct-5',{'display':'none','float':'left'});
	F_AddConstruct('construct-6',{'display':'none','float':'left'});
	//F_RequestPopularTags();
	F_ParseURL();
	F_BlindRequestAll();
	$('.drops').fadeTo(0,0.50);
	F_Bind();
});