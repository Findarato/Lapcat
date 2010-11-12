// LAPCAT - Client
// January 2010

//
// Arrays and Variables

//
// Array - Page
var A_Page=eval({});
//
// Variable - Area
var V_Area='home';
//
// Array - Displays
var A_Displays=eval({});
//
// Variable - Loading (Counter)
var V_Loading=0;
//
// Variable - URL
var V_URL='';

//
// Automatic

//
// Automatic - Ready
$(document).ready(function(){
	F_ClearDisplays();
	F_InitializeDisplays();
	//F_InitializeDisplays();
	//V_Display.f_RequestData(V_URL);
	
	//F_InitializeDisplays();
	//F_InitializeDateSelector();
	//F_Refresh();
	//F_Move('home',true);
	//F_RequestMonthViewData();
});

//
// Functions

// Function - Clear Display
function F_ClearDisplay(v_Key){$('#content-'+v_Key).html('&nbsp;');};
// Function - Clear Displays
function F_ClearDisplays(){for(var v_Key=1;v_Key<4;v_Key++){F_ClearDisplay(v_Key);}};
//
// Function - Create Display
function F_CreateDisplay(v_Active,v_Area,a_Cells,a_Parameters){
	// Array - Cells
	this.a_Cells=a_Cells;
	// Array - Parameters
	this.a_Parameters=eval({
		'covers':true,
		'fade-timer':600,
		'header':true
	});

	// Varaible - Active
	this.v_Active=false;
	// Variable - Area
	this.v_Area=v_Area;
	// Variable - Initialized
	this.v_Initialized=false;

	// Function - Activate
	this.f_Activate=function(){
		this.v_Active=true;
	};
	// Function - Blind Request
	this.f_BlindRequest=function(){
		for(var v_Key in this.a_Cells){
			switch(v_Key){
				case 'browse':
				case 'events':case 'materials':case 'news':
					if(this.v_Initialized){
						this.f_RequestCellData(v_Key);
					}else{
						this.f_RequestData('/quick/'+this.v_Area+'/get-html/'+v_Key);
					}
					break;
			}
		}
	};
	// Function - Construct Cell
	this.f_ConstructCell=function(v_Main,a_Cell){
		var v_CellHTML=this.a_Cells[v_Main]['html'];
		for(var v_Key in a_Cell){
			while(v_CellHTML.indexOf('replace-'+v_Key)>-1){
				v_CellHTML=v_CellHTML.replace('replace-'+v_Key,a_Cell[v_Key]);
			}
		}
		return v_CellHTML;
	};
	// Function - Deactivate
	this.f_Deactivate=function(){
		this.v_Active=false;
	};
	// Function - Fade All Cells
	this.f_FadeAllCells=function(){
		for(var v_Key in this.a_Cells){
			this.f_FadeCell(v_Key,this.a_Cells[v_Key]['cell'],true);
		}
	};
	// Function - Fade Cell
	this.f_FadeCell=function(v_CellKey,v_ContentKey,v_Out){
		var v_Out=v_Out;
		var v_CellKey=v_CellKey;
		var v_FadeTimer=this.a_Parameters['fade-timer'];
		$('#destination-'+v_ContentKey).queue(function(){
			if(v_Out){
				$(this).fadeOut(v_FadeTimer,function(){
					//F_ClearDisplay(v_FadeKey);
				});
			}else{
				$(this).fadeIn(v_FadeTimer,function(){
					F_SetData(v_CellKey);
				});
			}
			$(this).dequeue();
		});
	};
	// Function - Initialize
	this.f_Initialize=function(){
		this.f_SetDestinationSize();
		this.f_BlindRequest();
		this.v_Initialized=true;
	};
	// Function - Moved From Me
	this.f_MovedFromMe=function(){
		this.f_FadeAllCells();
		$('#tab-'+this.v_Area).removeClass('option-selected');
		this.f_Deactivate();
	};
	// Function - Moved To Me
	this.f_MovedToMe=function(){
		if(this.v_Initialized){this.f_FadeAllCells();}
		$('#tab-'+this.v_Area).addClass('option-selected');
		this.f_Activate();
		this.f_Initialize();
	};
	// Function - Moved To Same
	this.f_MovedToSame=function(){
		this.f_FadeAllCells();
		this.f_BlindRequest();
	};
	// Function - Request Cell Data
	this.f_RequestCellData=function(v_Cell){
		switch(v_Cell){
			case 'browse':
				this.f_RequestData('/quick/'+this.v_Area+'/'+v_Cell);
				break;
			case 'events':case 'materials':case 'news':
				this.f_RequestData('/quick/'+this.v_Area+'/suggest/'+v_Cell);
				break;
		}
	};
	// Function - Process Data
	this.f_ProcessData=function(o_JSON){
		switch(o_JSON['type']){
			case 'get-html':
				this.a_Cells[o_JSON['cell']]['html']=o_JSON['data'];
				this.f_RequestCellData(o_JSON['cell']);
				break;
			case 'data':
				this.a_Cells[o_JSON['cell']]['data']=o_JSON['data'];
				this.a_Cells[o_JSON['cell']]['header']=o_JSON['header'];
				if(o_JSON['pointer']=='home'){
					if(this.a_Parameters['covers']&&o_JSON['cell']=='materials'){this.f_RequestCovers(o_JSON['cell']);}
				}else{
					// Open Line
				}
				this.f_ReadyData(o_JSON['cell']);
				//this.f_SetData(o_JSON['cell']);
				break;
			case 'failed':
				alert('f_ProcessData failed');
				break;
			default:
				break;
		}
		F_StopLoading();
	};
	// Function - Ready Data
	this.f_ReadyData=function(v_CellKey){
		for(var v_DataKey in this.a_Cells[v_CellKey]['data']){
			for(var v_SubKey in this.a_Cells[v_CellKey]['data'][v_DataKey]){
				switch(v_SubKey){
					case 'name':case 'title':
						this.a_Cells[v_CellKey]['data'][v_DataKey]['clean-name']=F_Clean(this.a_Cells[v_CellKey]['data'][v_DataKey][v_SubKey]);
						this.a_Cells[v_CellKey]['data'][v_DataKey]['dirty-name']=F_Dirty(this.a_Cells[v_CellKey]['data'][v_DataKey][v_SubKey]);
						break;
					default:break;
				}
			}
		}
		var o_jQuery=$(F_CopyHTML('stage-list'));
		// Header
		if(this.a_Parameters['header']){o_jQuery.find('#part-list-header').html(this.a_Cells[v_CellKey]['header']);}else{o_jQuery.find('#part-list-header-cell').hide();}
		// Data
		for(var v_DataKey in this.a_Cells[v_CellKey]['data']){o_jQuery.find('#part-list-cells').append(this.f_ConstructCell(v_CellKey,this.a_Cells[v_CellKey]['data'][v_DataKey]));}
		this.a_Cells[v_CellKey]['display']=o_jQuery.html();
		this.f_FadeCell(v_CellKey,this.a_Cells[v_CellKey]['cell'],false);
	};
	// Function - Request Covers
	this.f_RequestCovers=function(v_Main){var a_Images=[];for(var v_Key in this.a_Cells[v_Main]['data']){a_Images[v_Key]=new Image();a_Images[v_Key].src='http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=S&Value='+this.a_Cells[v_Main]['data'][v_Key]['ISBNorSN'];a_Images[v_Key].alt='suggestions-'+this.a_Cells[v_Main]['data'][v_Key]['ISBNorSN']+'-cover';a_Images[v_Key].onload=function(){if(this.height>1){$('#'+this.alt).attr('src',this.src);};};}};
	// Function - Request Data
	this.f_RequestData=function(v_URL){
		if(this.v_Active){
			F_StartLoading();
			var v_Area=this.v_Area;
			$.getJSON(v_URL,function(o_JSON){
				if(o_JSON['pointer']==v_Area){
					A_Displays[v_Area].f_ProcessData(o_JSON);
				}
			});
		}
	};
	// Function - Set Data
	this.f_SetData=function(v_CellKey){
		$('#content-'+this.a_Cells[v_CellKey]['cell']).html(this.a_Cells[v_CellKey]['display']);
	};
	// Set Destination Size
	this.f_SetDestinationSize=function(){
		for(var v_Key in this.a_Cells){
			$('#content-'+this.a_Cells[v_Key]['cell']).css('height',this.a_Cells[v_Key]['height']);
			$('#content-'+this.a_Cells[v_Key]['cell']).css('width',this.a_Cells[v_Key]['width']);
			$('#destination-'+this.a_Cells[v_Key]['cell']).css('height',this.a_Cells[v_Key]['height']);
			$('#destination-'+this.a_Cells[v_Key]['cell']).css('width',this.a_Cells[v_Key]['width']);
		}
	};
	// Function - Set Parameters
	this.f_SetParameters=function(a_Parameters){
		for(var v_Key in a_Parameters){
			switch(v_Key){
				case 'header':this.a_Parameters[v_Key]=a_Parameters[v_Key];break;
				default:break;
			}
		}
	};
	
	// Initialize
	this.f_SetParameters(a_Parameters);
	if(v_Active){this.f_MovedToMe();}
}
//
// Function - Move To Area
function F_MoveToArea(v_Destination){
	if(v_Destination!=V_Area){
		// Different Area
		A_Displays[V_Area].f_MovedFromMe();
		A_Displays[v_Destination].f_MovedToMe();
	}else{
		A_Displays[V_Area].f_MovedToSame();
		// Same Area
	}
	V_Area=v_Destination;
}
//
// Function - Initialize Displays
function F_InitializeDisplays(){
	A_Displays['home']=new F_CreateDisplay(true,'home',
		eval({
			'materials':{'cell':1,'data':[],'display':'','header':'','html':'','height':'175px','width':'100%'},
			'events':{'cell':2,'data':[],'display':'','header':'','html':'','height':'auto','width':'398px'},
			'news':{'cell':3,'data':[],'display':'','header':'','html':'','height':'auto','width':'398px'}
		}),
		eval({
			'header':true
		})
	);
	A_Displays['databases']=new F_CreateDisplay(false,'databases',
		eval({
			'browse':{'cell':1,'data':[],'display':'','header':'','html':'','height':'auto','width':'100%'}
		}),
		eval({
			'header':false
		})
	);
	A_Displays['events']=new F_CreateDisplay(false,'events',
		eval({
			'browse':{'cell':1,'data':[],'display':'','header':'','html':'','height':'auto','width':'100%'}
		}),
		eval({
			'header':false
		})
	);
	A_Displays['materials']=new F_CreateDisplay(false,'materials',
		eval({
			'browse':{'cell':1,'data':[],'display':'','header':'','html':'','height':'auto','width':'100%'}
		}),
		eval({
			'header':false
		})
	);
	A_Displays['news']=new F_CreateDisplay(false,'news',
		eval({
			'browse':{'cell':1,'data':[],'display':'','header':'','html':'','height':'auto','width':'100%'}
		}),
		eval({
			'header':false
		})
	);
}
//
// Function - Set Data
function F_SetData(v_CellKey){A_Displays[V_Area].f_SetData(v_CellKey);};

//
// Clicks

//
// Click - Menu Click
$('.menu-click').live('click',function(){
	F_MoveToArea($(this).attr('ID').replace(/tab-/g,''),true);
});

// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************



//
// Functions

//
// Function - Clean
function F_Clean(v_Data){return v_Data.replace(/\\'/g,'\'').replace(/\\"/g,'"').replace(/\\0/g,'\0').replace(/\\\\/g,'\\');} 
//
// Function - Copy HTML
function F_CopyHTML(v_ElementID){return $('#'+v_ElementID).html();}
//
// Function - Create Display 2
function F_CreateDisplay2(v_Type,a_Parameters){
	// Array - Cells
	this.a_Cells=[];
	// Array - Data
	this.a_Data=[];
	// Array - Open Line
	this.a_OpenLine=[];
	// Array - Parameters
	this.a_Parameters=eval({
		'animations':true,
		'auto-refresh':false,
		'covers':false,
		'display-on-set':true,
		'fade':false,
		'fade-timer':600,
		'header':true,
		'i-am':true,
		'refresh-timer':10,
		'height':'245px',
		'width':'385px',
		'lines-shown':5
	});
	// Object - jQuery
	this.o_jQuery='';
	// Variable - Base
	this.v_Base='stage-list';
	// Variable - Open Line Base
	this.v_OpenLineBase='basic';
	// Variable - Open Line Target
	this.v_OpenLineTarget='';
	// Variable - Type
	this.v_Type=v_Type;

	// Function - After Fade
	this.f_AfterFade=function(v_Pointer){
		$('#destination-content').html(this.o_jQuery.html());
		if(this.a_Parameters['covers']){this.f_RequestCovers(v_Pointer);}
		//this.f_ShowOptions();
		var v_FadeTimer=this.a_Parameters['fade-timer'];
		$('#destination-content').queue(function(){
			$(this).fadeIn(v_FadeTimer);
			$(this).dequeue();
		});
		//if(this.v_Name=='browse'){$(this.v_Target).queue(function(){A_Displays[v_Name].f_Effects('bounce-left');$(this).dequeue();});}
	};
	// Function - Construct Cell
	this.f_ConstructCell=function(v_Pointer,a_Cell){
		var v_CellHTML=F_CopyHTML('stage-list-cell-'+this.a_Cells[v_Pointer]['stage-list-cell']);
		for(var v_Key in a_Cell){
			while(v_CellHTML.indexOf('replace-'+v_Key)>-1){
				v_CellHTML=v_CellHTML.replace('replace-'+v_Key,a_Cell[v_Key]);
			}
		}
		return v_CellHTML;
	};
	// Function - Construct Display
	this.f_ConstructDisplay=function(v_Pointer){
		if(this.a_Parameters['header']){
			this.o_jQuery.find('#part-list-header').html(this.a_Cells[v_Pointer]['header']);
		}else{
			this.o_jQuery.find('#part-list-header-cell').hide();
		}
		this.o_jQuery.find('#part-list-cells').html('');
		for(var v_Key in this.a_Cells[v_Pointer]['data']){
			this.o_jQuery.find('#part-list-cells').append(this.f_ConstructCell(v_Pointer,this.a_Cells[v_Pointer]['data'][v_Key]));
		}
		if(this.v_OpenLineTarget!==''){
			this.o_jQuery.find('#part-list-cells').css({'width':'385px'});
			//this.f_ShowOpenLine();
		}
	};
	// Function - Create Cell
	this.f_CreateCell=function(v_Type){return eval({'data':[],'header':'','stage-list-cell':v_Type});};
	// Function - Display
	this.f_Display=function(v_Pointer,v_IsOpenLine){
		if(A_Master['allow-fade']&&this.a_Parameters['fade']&&!v_IsOpenLine){
			$('#destination-content').fadeOut(this.a_Parameters['fade-timer'],function(){
				V_Display.f_AfterFade(v_Pointer);
			});
		}else{
			$('#destination-content').html(this.o_jQuery.html());
			//if(this.a_Parameters['covers']){this.f_RequestCovers();}
			//this.f_ShowOptions();
		}
		/*
		if(v_IsOpenLine){
			$(this.v_OpenLineTarget).queue(function(){
				V_Display.f_Effects('bounce-left');
				$(this).dequeue();
			});
		}
		*/
		//F_ShowContentMenu();
	};
	// Function - Process Data
	this.f_ProcessData=function(o_JSON){
		this.f_SetData(o_JSON);
		//F_ShowSearchMenu();
		F_StopLoading();
	};
	// Function - Request Covers
	this.f_RequestCovers=function(v_Pointer){var a_Images=[];for(var v_Key in this.a_Cells[v_Pointer]['data']){a_Images[v_Key]=new Image();a_Images[v_Key].src='http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=S&Value='+this.a_Cells[v_Pointer]['data'][v_Key]['ISBNorSN'];a_Images[v_Key].alt='suggestions-'+this.a_Cells[v_Pointer]['data'][v_Key]['ISBNorSN']+'-cover';a_Images[v_Key].onload=function(){if(this.height>1){$('#'+this.alt).attr('src',this.src);};};}};
	// Function - Request Data
	this.f_RequestData=function(v_URL){
		F_StartLoading();
		$.getJSON(v_URL,function(o_JSON){
			V_Display.f_ProcessData(o_JSON);
		});
	};
	// Function - Reset To Base
	this.f_ResetToBase=function(){
		switch(this.v_Type){
			default:
			case 'home':
				this.v_Base='stage-list';
				this.v_OpenLineBase='basic';
				this.a_Cells=eval({
					'suggest-materials':this.f_CreateCell('materials'),
					'suggest-events':this.f_CreateCell('events'),
					'suggest-news':this.f_CreateCell('news')
				});
				break;
		}
		this.o_jQuery=$(F_CopyHTML(this.v_Base));
	};
	// Function - Set Data
	this.f_SetData=function(o_JSON){
		var v_Pointer=o_JSON['pointer'];
		for(var v_Key in o_JSON){
			switch(v_Key){
				case 'header':
					$('#change-tag-RSS-link').attr('title',o_JSON['header']);
				case 'data':
					this.a_Cells[v_Pointer][v_Key]=o_JSON[v_Key];
					break;
				case 'open-line':
					this.a_OpenLine=o_JSON['open-line'];
					this.v_OpenLineTarget='#part-list-line-'+o_JSON['open-line']['ID'];
					break;
				case 'page':
					A_Page=o_JSON['page'];
					A_Page['number-of-records']=F_Count(this.a_Cells[v_Pointer]['data']);
					break;
				default:break;
			}
		}
		for(var v_Key in this.a_Cells[v_Pointer]['data']){
			for(var v_SubKey in this.a_Cells[v_Pointer]['data'][v_Key]){
				switch(v_SubKey){
					case 'name':case 'title':
						this.a_Cells[v_Pointer]['data'][v_Key]['clean-name']=F_Clean(this.a_Cells[v_Pointer]['data'][v_Key][v_SubKey]);
						this.a_Cells[v_Pointer]['data'][v_Key]['dirty-name']=F_Dirty(this.a_Cells[v_Pointer]['data'][v_Key][v_SubKey]);
						break;
					default:break;
				}
			}
		}
		if(this.a_Parameters['display-on-set']){
			if(o_JSON['fail']){
				$('#interface-screen-buttons').hide();
				this.o_jQuery.find('#part-list-open-line').hide();
				//this.f_ConstructEmptyDisplay();
			}else{
				$('#interface-screen-buttons').show();
				this.o_jQuery.find('#part-list-open-line').show();
				this.f_ConstructDisplay(v_Pointer);
			}
			//if(!A_Search['month-view']){this.f_Display(false);}
		}
		this.f_Display(v_Pointer);
	};
	// Function - Set Parameters
	this.f_SetParameters=function(a_Parameters){for(var v_Key in a_Parameters){this.a_Parameters[v_Key]=a_Parameters[v_Key];}};

	// Initialization
	this.f_SetParameters(a_Parameters);
	this.f_ResetToBase();

	// Function - Moved From Parent
	this.f_MovedFromParent=function(){$('#destination-content').html('&nbsp;').hide();};
	// Function - Moved To Parent
	this.f_MovedToParent=function(v_Request){$('#tab-'+V_AreaName).addClass('option-selected');if(v_Request){this.f_RequestData();}};
}
//
// Function - Dirty
function F_Dirty(v_Data){return escape(v_Data);}
//
// Function - Initialize Displays 2
function F_InitializeDisplays2(){
	V_Display=new F_CreateDisplay('home',{'auto-refresh':true,'covers':true,'fade':true,'height':'170px','width':'100%'});
}
//
// Function - Set Display Data
function F_SetDisplayData(o_JSON){
	V_Display.f_ProcessData(o_JSON);
	A_Displays[((A_Displays[o_JSON['pointer']])?o_JSON['pointer']:'browse')].f_SetData(o_JSON);
	F_ShowSearchMenu();
	F_StopLoading();
}
//
// Function - Start Loading
function F_StartLoading(){V_Loading++;if(V_Loading>0){$('#loading-dots').show();}}
//
// Function - Stop Loading
function F_StopLoading(){V_Loading--;if(V_Loading<1){V_Loading=0;$('#loading-dots').hide();}}















//
// Array - Drops
var A_Drops=eval({
	'news':{
		'search':{},
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
		'search':{},
        'sort':{
			0:{'name':'A-Z','value':0},
			1:{'name':'Z-A','value':1}
        }
	}
});
//
// Array - Search
var A_Search=eval({
	'date':{
		'on':false,
		'text':'',
		'words':''
	},
	'month-view':false,
	'search':{
		'on':false,
		'value':0
	},
	'sort':{
		'on':false,
		'value':0
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
});

//
// Functions

//
// Function - Add Tag Search
function F_AddTagSearch(v_ID,v_Text){
	A_Search['tag']['on']=true;
	A_Search['tag']['previous']=A_Search['tag']['current'];
	A_Search['tag']['current']['ID']=v_ID;
	A_Search['tag']['current']['text']=v_Text;
	$('#change-tag-catalog-link').html('<a class="catalog-link fake-link" id="tag-'+v_ID+'" style="float:right; margin-left:3px;">'+v_Text+'</a>');
	$('#tag-selected').show();
}
//
// Function - Add Date Search
function F_AddDateSearch(v_Text,v_Words){
	A_Search['date']['on']=true;
	A_Search['date']['text']=v_Text;
	A_Search['date']['words']=v_Words;
	$('#date-text').html('<font style="float:right; font-size:12px; margin-left:3px;">'+v_Text+'</font>');
	$('#date-selected').show();
}
//
// Function - Add Search Search
function F_AddSearchSearch(v_Value,v_Text){
	if(v_Value>0){
		A_Search['search']['on']=true;
		A_Search['search']['text']=v_Text;
		A_Search['search']['value']=v_Value;
		$('#search-text').html('<font style="float:right; font-size:12px; margin-left:3px;">'+v_Text+'</font>');
		$('#search-selected').show();
	}else{
		F_RemoveSearchSearch();
	}
}
//
// Function - Add Sort Search
function F_AddSortSearch(v_Value,v_Text){
	if(v_Value>0){
		A_Search['sort']['on']=true;
		A_Search['sort']['text']=v_Text;
		A_Search['sort']['value']=v_Value;
		$('#sort-text').html('<font style="float:right; font-size:12px; margin-left:3px;">'+v_Text+'</font>');
		$('#sort-selected').show();
	}else{
		F_RemoveSortSearch();
	}
}
//
// Function - Build Page Buttons
function F_BuildPageButtons(){
	var a_Buttons=eval({
		1:{'on':true,'button':true,'value':1},
		2:{'on':false,'button':false,'value':'...'},
		3:{'on':false,'button':true,'value':2},
		4:{'on':false,'button':true,'value':3},
		5:{'on':false,'button':true,'value':4},
		6:{'on':false,'button':false,'value':'...'}
	});
	if(A_Page['current-page']<3){
		a_Buttons[3]['on']=true;
		a_Buttons[3]['value']=2;
		if(A_Page['total-pages']>2){
			a_Buttons[4]['on']=true;
			a_Buttons[4]['value']=3;
		}
		if(A_Page['total-pages']>3){
			a_Buttons[6]['on']=true;
		}
		if(A_Page['current-page']==2&&A_Page['total-pages']>3){
			a_Buttons[5]['on']=true;
			a_Buttons[5]['value']=4;
		}
	}else if(A_Page['current-page']==A_Page['total-pages']){
		a_Buttons[5]['on']=true;
		a_Buttons[5]['value']=A_Page['total-pages'];
		a_Buttons[4]['on']=true;
		a_Buttons[4]['value']=A_Page['total-pages']-1;
		a_Buttons[3]['on']=true;
		a_Buttons[3]['value']=A_Page['total-pages']-2;
		if(A_Page['total-pages']-A_Page['current-page']>2){
			a_Buttons[6]['on']=true;
		}
		if(A_Page['current-page']>3){
			a_Buttons[2]['on']=true;
		}
	}else{
		if(A_Page['current-page']>3){a_Buttons[2]['on']=true;}
		if(A_Page['total-pages']-A_Page['current-page']>1){
			a_Buttons[6]['on']=true;
		}
		a_Buttons[3]['on']=true;
		a_Buttons[3]['value']=A_Page['current-page']-1;
		a_Buttons[4]['on']=true;
		a_Buttons[4]['value']=A_Page['current-page'];
		a_Buttons[5]['on']=true;
		a_Buttons[5]['value']=parseInt(A_Page['current-page'])+1;
	}
	$('#button-page-list').html('<font class="white" style="float:left; font-weight:bold; font-size:10px; margin-left:4px; margin-right:2px; vertical-align:top; width:auto;">Page</font>');
	for(var v_Key in a_Buttons){
		if(a_Buttons[v_Key]['on']){
			if(a_Buttons[v_Key]['button']){
				$('#button-page-list').append('<div class="simple-click '+((a_Buttons[v_Key]['value']==A_Page['current-page'])?'current-page-button':'toggle-button')+' fred" id="button-page" name="'+a_Buttons[v_Key]['value']+'" onfocus="javascript:this.blur();" style="float:left; margin-right:4px; height:12px; text-align:center; vertical-align:top; width:18px;"><font class="white" style="font-weight:bold; font-size:10px; vertical-align:top;">'+a_Buttons[v_Key]['value']+'</font></div>');
			}else{
				$('#button-page-list').append('<font class="white" style="float:left; font-weight:bold; font-size:10px; margin-right:4px; vertical-align:top; text-align:center; width:20px;">'+a_Buttons[v_Key]['value']+'</font>');
			}
		}
	}
}
//
// Function - Remove Date Search
function F_RemoveDateSearch(){
	A_Search['date']['on']=false;
	A_Search['date']['text']='';
	A_Search['date']['words']='';
	$('#date-text').html('');
	$('#date-selected').hide();
}
//
// Function - Remove Search Search
function F_RemoveSearchSearch(){
	A_Search['search']['on']=false;
	A_Search['search']['text']='';
	A_Search['search']['value']=0;
	$('#search-text').html('');
	$('#search-selected').hide();
}
//
// Function - Remove Sort Search
function F_RemoveSortSearch(){
	A_Search['sort']['on']=false;
	A_Search['sort']['text']='';
	A_Search['sort']['value']=0;
	$('#sort-text').html('');
	$('#sort-selected').hide();
}
//
// Function - Remove Tag Search
function F_RemoveTagSearch(){
	A_Search['tag']['on']=false;
	A_Search['tag']['previous']=A_Search['tag']['current'];
	A_Search['tag']['current']['ID']=0;
	A_Search['tag']['current']['text']='';
	$('#change-tag-catalog-link').html('');
	$('#tag-selected').hide();
}
//
// Function - Request Month View Data
function F_RequestMonthViewData(){$.getJSON('/month-view/json/ajax',function(o_JSON){F_InitializeMonthView(o_JSON);});}
//
// Function - Reset
function F_ResetHome(){
	F_RemoveTagSearch();
	F_SendCommandRequest('change-tag','home');
}
//
// Function - Move
function F_Move(v_AreaName,v_Request){
	var v_Moved=((v_AreaName!=V_AreaName)?true:false);
	if(v_Moved){
		$('#destination-content').html('');
		$('#interface-screen-buttons').hide();
	}
	$('#tab-'+V_AreaName).removeClass('option-selected');
	switch(v_AreaName){
		case 'home':
			if(v_Moved){
				$('#destination-content').html(A_Displays['suggestions'].f_Fresh()+A_Displays['possibles'].f_Fresh()+A_Displays['interests'].f_Fresh());
				F_RequestPopularTags();
			}
			A_Displays['suggestions'].f_MovedToParent(v_Request);
			A_Displays['possibles'].f_MovedToParent(v_Request);
			A_Displays['interests'].f_MovedToParent(v_Request);
			A_Displays['browse'].f_MovedFromParent();
			break;
		case 'databases':case 'events':case 'hours':case 'jobs':case 'materials':case 'news':
			if(A_Displays['browse'].v_Parent!=v_AreaName){
				A_Displays['browse']=new F_CreateObject_Display(v_AreaName,((v_AreaName=='news')?'articles':v_AreaName),'browse',{'fade':true,'header':false,'height':'455px','width':'100%'});
			}
		default:
			if(v_Moved){$('#destination-content').html(A_Displays['browse'].f_Fresh());}
			if(V_AreaName=='home'){
				A_Displays['suggestions'].f_MovedFromParent();
				A_Displays['possibles'].f_MovedFromParent();
				A_Displays['interests'].f_MovedFromParent();
			}
			A_Displays['browse'].f_MovedToParent(v_Request);
			break;
	}
	V_AreaName=v_AreaName;
	F_ShowTinyMenu();
}
//
// Function - Populate Drop
function F_PopulateDrop(v_Type){
	$('#change-'+v_Type+'-options').html('');
	for(var v_Key in A_Drops[V_AreaName][v_Type]){
		$('#change-'+v_Type+'-options').append('<option class="'+v_Type+'-click" value="'+A_Drops[V_AreaName][v_Type][v_Key]['value']+'" label="'+A_Drops[V_AreaName][v_Type][v_Key]['name']+'">'+A_Drops[V_AreaName][v_Type][v_Key]['name']+'</option>');
	}
	$('#change-'+v_Type+'-options').val(A_Search[v_Type]['value']);
}
//
// Function - Send Command Request
function F_SendCommandRequest(v_Type,v_AreaName){
	switch(v_Type){
		case 'change-date':
			F_Move(v_AreaName,false);
			A_Displays['browse'].f_RequestData('/'+v_AreaName+'/calendar/'+A_Search['date']['text']+'/json/ajax');
			break;
		case 'change-search':
		case 'change-sort':
			F_Move(v_AreaName,false);
			A_Displays['browse'].f_RequestData('/'+v_AreaName+'/'+v_Type+'/'+A_Search[v_Type.replace('change-','')]['value']+'/json/ajax');
			if(v_Type=='change-search'){
				$.getJSON('/month-view/json/ajax',function(o_JSON){
					$('#stage-month-view').data('Settings').daysToHighlight=o_JSON['calendar'];
					$.fn.dateter.drawHighlight($("#stage-month-view").data("Settings"));
				});
			}
			break;
		case 'change-tag':
			if(v_AreaName=='home'){
				var a_Types=new Array('suggestions','possibles','interests');
				for(var v_Key in a_Types){
					$.getJSON('/home/change-tag-'+a_Types[v_Key]+'/'+A_Search['tag']['current']['ID']+'/json/ajax',function(o_JSON){
						F_SetDisplayData(o_JSON);
					});
				}
			}else{
				$.getJSON('/'+v_AreaName+'/change-tag/'+A_Search['tag']['current']['ID']+'/json/ajax',function(o_JSON){
					F_SetDisplayData(o_JSON);
				});
			}
			if(A_Search['tag']['on']){F_RequestPopularTags();}
			break;
		default:
			break;
	}
}
//
// Function - Show Search Menu
function F_ShowSearchMenu(){
	V_LoggedIn=true;
	var a_Changes=eval({'change-tag':false,'popular-tags':false,'change-search':false,'change-sort':false,'date-selector':false});
	var v_ChangeTagRSS=false;
	switch(V_AreaName){
		case 'home':
			a_Changes['change-tag']=true;
			a_Changes['popular-tags']=true;
			break;
		case 'news':
			a_Changes['change-tag']=true;
			a_Changes['change-sort']=true;
			F_PopulateDrop('sort');
			a_Changes['date-selector']=true;
			$('#option-month-view').hide();
			v_ChangeTagRSS=true;
			break;
		case 'events':
			a_Changes['change-tag']=true;
			a_Changes['change-search']=true;
			F_PopulateDrop('search');
			a_Changes['change-sort']=true;
			F_PopulateDrop('sort');
			a_Changes['date-selector']=true;
			$('#option-month-view').show();
			v_ChangeTagRSS=true;
			break;
		case 'materials':
			a_Changes['change-tag']=true;
			a_Changes['change-search']=true;
			F_PopulateDrop('search');
			a_Changes['change-sort']=true;
			F_PopulateDrop('sort');
			v_ChangeTagRSS=true;
			break;
		case 'databases':
			a_Changes['change-tag']=true;
			a_Changes['change-sort']=true;
			F_PopulateDrop('sort');
			v_ChangeTagRSS=true;
			break;
		default:break;
	}
	for(v_Key in a_Changes){if(a_Changes[v_Key]){$('#container-'+v_Key).show();}else{$('#container-'+v_Key).hide();}}
	$('#change-tag-RSS').css({'visibility':((v_ChangeTagRSS)?'visible':'hidden')});
	V_LoggedIn=false;
}
//
// Function - Show Tiny Menu
function F_ShowTinyMenu(){
	V_LoggedIn=true;
	var a_Buttons=eval({'random':false,'reset':false,'favorites':false,'anticipated':false,'summer':false,'slider':false,'collected':false});
	switch(V_AreaName){
		case 'home':
			a_Buttons['random']=true;
			a_Buttons['reset']=true;
			break;
		case 'news':
			a_Buttons['reset']=true;
			if(V_LoggedIn){a_Buttons['favorites']=true;}
			break;
		case 'events':
			a_Buttons['reset']=true;a_Buttons['summer']=true;a_Buttons['slider']=true;
			if(V_LoggedIn){a_Buttons['favorites']=true;a_Buttons['anticipated']=true;}
			break;
		case 'materials':
			a_Buttons['reset']=true;
			if(V_LoggedIn){a_Buttons['favorites']=true;a_Buttons['collected']=true;}
			break;
		case 'databases':a_Buttons['reset']=true;break;
		default:break;
	}
	for(v_Key in a_Buttons){if(a_Buttons[v_Key]){$('#button-'+v_Key).show();}else{$('#button-'+v_Key).hide();}}
	V_LoggedIn=false;
};

//
// Live Events

//
// Click - Option Clicks
$('.option-click').live('click',function(){
	var v_Option=$(this).attr('ID').replace('option-','');
	switch(v_Option){
		case 'month-view':
			if(A_Search['month-view']){
				A_Search['month-view']=false;
				A_Displays['browse'].f_ShowList();
				$('#interface-screen-buttons').show();
			}else{
				A_Search['month-view']=true;
				A_Displays['browse'].f_ShowCalendar();
				$('#interface-screen-buttons').hide();
			}
			F_ToggleOption('month-view',A_Search['month-view']);
			break;
		default:break;
	}
});
//
// Click - Button Clicks
$('.simple-click').live('click',function(){
	var v_Button=$(this).attr('ID').replace('button-','');
	switch(v_Button){
		case 'page':
			A_Displays['browse'].f_RequestData('/'+V_AreaName+'/page/'+$(this).attr('name')+'/json/ajax/');
			break;
		case 'anticipated':case 'collected':case 'favorites':case 'slider':case 'summer':
		case 'next-page':case 'previous-page':
			A_Displays['browse'].f_RequestData('/'+V_AreaName+'/'+v_Button+'/json/ajax');
			break;
		case 'reset':
			if(V_AreaName=='home'){
				F_ResetHome();
			}else{
				F_RemoveTagSearch();
				A_Displays['browse'].f_RequestData('/'+V_AreaName+'/reset/json/ajax');
			}
			break;
		case 'next-record':A_Displays['browse'].f_NextRecord();break;
		case 'previous-record':A_Displays['browse'].f_PreviousRecord();break;
		case 'log-out':break;
		case 'random':F_Move(V_AreaName,true);break;
		default:break;
	}
});
//
// Click - Date Click
$('.date-click').live('click',function(){
	var v_Text=$(this).attr('ID');
	var v_AreaName=$(this).attr('name');
	if(v_Text!==''){F_AddDateSearch(v_Text,$(this).html());}else{F_RemoveDateSearch();}
	F_SendCommandRequest('change-date',((v_AreaName!=='')?v_AreaName:V_AreaName));
});
//
// Click - Search Click
$('.search-click').live('click',function(){
	F_AddSearchSearch($(this).attr('value'),$(this).html());
	$('#change-search-options').blur();
	F_SendCommandRequest('change-search',V_AreaName);
});
//
// Click - Sort Click
$('.sort-click').live('click',function(){
	F_AddSortSearch($(this).attr('value'),$(this).html());
	$('#change-sort-options').blur();
	F_SendCommandRequest('change-sort',V_AreaName);
});
//
// Click - Tag Click
$('.tag-click').live('click',function(){
	var v_ID=parseInt($(this).attr('ID').replace('tag-',''));
	if(v_ID>0){F_AddTagSearch(v_ID,$(this).html());}else{F_RemoveTagSearch();}
	F_SendCommandRequest('change-tag',V_AreaName);
});

// LAPCAT - Client
// October 2009

//
// Array - User
var A_User=eval({
	'ID':0,
	'first-name':'',
	'last-name':'',
	'user-name':'',
	'permission':2
});

//
// Array - Displays
var A_Displays=eval({});
//
// Array - Master
var A_Master=eval({
	'allow-animations':true,
	'allow-fade':true,
	'font-size':12
});
//
// Variable - Expand
var V_Expand=false;
//
// Variable - Logged In
var V_LoggedIn=false;

//
// Function - Close Dockable
function F_CloseDockable(){
	$('#dockable-window').css({'visibility':'hidden'});
	$('#dockable-content').css({'visibility':'hidden'});
	$('#dockable-close').html('');
}
//
// Function - Create Object - Display
function F_CreateObject_Display(v_Parent,v_Group,v_Name,a_Parameters){
	// Array - Data
	this.a_Data=eval({});
	// Array - Parameters
	this.a_Parameters=eval({
		'animations':true,
		'auto-refresh':false,
		'base':'stage-list',
		'cell':'stage-list-cell-'+v_Name,
		'covers':false,
		'display-on-set':true,
		'fade':false,
		'fade-timer':600,
		'header':true,
		'i-am':true,
		'open-line-cell':'basic',
		'refresh-timer':10,
		'height':'245px',
		'width':'385px',
		'lines-shown':5
	});

	// Object - jQuery
	this.o_jQuery='';

	// Variable - Data Received
	this.v_DataReceived=false;
	// Variable - Destination
	this.v_Destination='destination-'+v_Name;
	// Variable - Group
	this.v_Group=v_Group;
	// Variable - Header
	this.v_Header='';
	// Variable - Name
	this.v_Name=v_Name;
	// Variable - Parent
	this.v_Parent=v_Parent;
	// Variable - Part
	this.v_Part='part-'+v_Parent+'-'+v_Name;
	// Variable - Similar
	this.v_Similar=false;
	// Variable - Target
	this.v_Target='';

	// Function - After Fade
	this.f_AfterFade=function(){
		var v_Name=this.v_Name;
		$('#'+this.v_Destination).html(this.o_jQuery.html());
		if(this.a_Parameters['covers']){this.f_RequestCovers();}
		this.f_ShowOptions();
		var v_FadeTimer=this.a_Parameters['fade-timer'];
		$('#'+this.v_Destination).queue(function(){$(this).fadeIn(v_FadeTimer);$(this).dequeue();});
		if(this.v_Name=='browse'){
			$(this.v_Target).queue(function(){
				A_Displays[v_Name].f_Effects('bounce-left');
				$(this).dequeue();
			});
		}
	};
	// Function - Construct Cell
	this.f_ConstructCell=function(a_Cell){
		var v_CellHTML=F_CopyHTML(this.a_Parameters['cell']);
		for(var v_Key in a_Cell){while(v_CellHTML.indexOf('replace-'+v_Key)>-1){v_CellHTML=v_CellHTML.replace('replace-'+v_Key,a_Cell[v_Key]);}}
		return v_CellHTML;
	};
	// Function - Construct Display
	this.f_ConstructDisplay=function(){
		if(this.a_Parameters['header']){
			this.o_jQuery.find('#part-list-header').html(this.v_Header);
		}else{
			this.o_jQuery.find('#part-list-header-cell').hide();
		}
		this.o_jQuery.find('#part-list-cells').html('');
		for(var v_Key in this.a_Data){this.o_jQuery.find('#part-list-cells').append(this.f_ConstructCell(this.a_Data[v_Key]));}
		if(this.v_Target!==''){
			this.o_jQuery.find('#part-list-cells').css({'width':'385px'});
			this.f_ShowOpenLine();
		}
	};
	// Function - Construct Empty Display
	this.f_ConstructEmptyDisplay=function(){
		// This information is shown when a display receives 0 matches.
		this.o_jQuery.find('#part-list-header').html('No matches.');
		var v_HTML='<font style="font-size:12px; font-style:italic; margin-left:4px;">There are no '+this.v_Group+' that match the following search:</font><br/><font style="font-size:14px; margin-left:12px;">'+this.v_Header+'</font><br/><font style="font-size:12px; font-style:italic; margin-left:4px;">Suggestions:</font>';
		if(A_Search['tag']['on']){
			// Suggestion 1
			// Search the catalog for this tag.
			v_HTML+='<br/><font style="font-size:14px; margin-left:12px;">Search the catalog for <span class="catalog-link fake-link" href="http://catalog.lapcat.org/search/X?SEARCH='+A_Search['tag']['current']['text']+'&SORT=D&searchscope=12" ID="'+A_Search['tag']['current']['ID']+'">'+A_Search['tag']['current']['text']+'</span>.</font>';
			// Suggestion 2
			// Remove this tag from the search.
			v_HTML+='<br/><a class="tag-click fake-link" ID="tag-0" style="font-size:14px; margin-left:12px; text-decoration:underline;">Remove</a><font style="font-size:14px;"> (<font style="font-size:12px; font-style:italic;">'+A_Search['tag']['current']['text']+'</font>) from this search.</font>';
		}
		
		// Suggestion 3
		// Reset the search.
		v_HTML+='<br/><a class="simple-click fake-link" ID="button-reset" style="font-size:14px; margin-left:12px; text-decoration:underline;">Reset</a><font style="font-size:14px;"> this search.</font>';
		v_HTML+='</font>';
		this.o_jQuery.find('#part-list-cells').html(v_HTML);
	};
	// Function - Construct Open Line
	this.f_ConstructOpenLine=function(){
		var v_HTML=F_CopyHTML('stage-'+this.v_Parent+'-content')
		for(var v_Key in this.a_OpenLine){while(v_HTML.indexOf('replace-'+v_Key)>-1){v_HTML=v_HTML.replace('replace-'+v_Key,this.a_OpenLine[v_Key]);}}
		return v_HTML;
	};
	// Function - Display
	this.f_Display=function(v_OpenLine){
		if(V_Expand){this.o_jQuery.find('#part-list-cells').hide();}
		var v_Name=this.v_Name;
		if(A_Master['allow-fade']&&this.a_Parameters['fade']&&!v_OpenLine){
			$('#'+this.v_Destination).fadeOut(this.a_Parameters['fade-timer'],function(){A_Displays[v_Name].f_AfterFade();});
		}else{
			$('#'+this.v_Destination).html(this.o_jQuery.html());
			if(this.a_Parameters['covers']){this.f_RequestCovers();}
			this.f_ShowOptions();
		}
		if(v_OpenLine){$(this.v_Target).queue(function(){A_Displays[v_Name].f_Effects('bounce-left');$(this).dequeue();});}
		F_ShowContentMenu();
	};
	// Function - Effects
	this.f_Effects=function(v_Effect){
		if(A_Master['allow-animations']&&this.a_Parameters['animations']){
			switch(v_Effect){
				case 'bounce-left':
					$(this.v_Target+'-font')
						.animate({marginRight:'18px'},600)
						.animate({marginRight:'16px'},200)
						.animate({marginRight:'17px'},100);
					break;
				default:break;
			}
		}
	};
	// Function - Fresh
	this.f_Fresh=function(){return '<div id="'+this.v_Destination+'" style="float:left; height:'+this.a_Parameters['height']+'; overflow:hidden; width:'+this.a_Parameters['width']+';">&nbsp;</div>';};
	// Function - Moved From Parent
	this.f_MovedFromParent=function(){
		$('#'+this.v_Destination).html('&nbsp;').hide();
	};
	// Function - Moved To Parent
	this.f_MovedToParent=function(v_Request){
		$('#tab-'+this.v_Parent).addClass('option-selected');
		if(this.v_Parent=='events'&&A_Search['month-view']){
			this.f_ShowCalendar();
		}else{
			this.f_ShowList();
		}
		if(v_Request){this.f_RequestData();}
	};
	// Function - Open Line
	this.f_OpenLine=function(v_TargetID){this.f_RequestLine(v_TargetID);};
	// Function - Next Record
	this.f_NextRecord=function(){
		A_Page['current-record']++;
		if(A_Page['current-record']>=A_Page['number-of-records']){A_Page['current-record']=A_Page['number-of-records']-1;}
		this.f_RequestLine(this.a_Data[A_Page['current-record']]['ID']);
	};
	// Function - Previous Record
	this.f_PreviousRecord=function(){
		A_Page['current-record']--;
		if(A_Page['current-record']<0){A_Page['current-record']=0;}
		this.f_RequestLine(this.a_Data[A_Page['current-record']]['ID']);
	};
	// Function - Request Covers
	this.f_RequestCovers=function(){var a_Images=eval({});for(var v_Key in this.a_Data){a_Images[v_Key]=new Image();a_Images[v_Key].src='http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=S&Value='+this.a_Data[v_Key]['ISBNorSN'];a_Images[v_Key].alt='suggestions-'+this.a_Data[v_Key]['ISBNorSN']+'-cover';a_Images[v_Key].onload=function(){if(this.height>1){$('#'+this.alt).attr('src',this.src);};};}};
	// Function - Request Data
	this.f_RequestData=function(v_URL){
		F_StartLoading();
		$.getJSON(((v_URL)?v_URL:'/'+this.v_Parent+'/'+this.v_Name+'/json/ajax'),function(o_JSON){
			return F_SetDisplayData(o_JSON);
		});
	};
	// Function - Request Line
	this.f_RequestLine=function(v_TargetID){F_StartLoading();$.getJSON('/'+this.v_Parent+'/open-line/'+v_TargetID+'/json/ajax',function(o_JSON){return F_SetOpenLineData(o_JSON);});};
	// Function - Reset Display
	this.f_ResetDisplay=function(){this.o_jQuery=$(F_CopyHTML(this.a_Parameters['base']));};
	// Function - Set Current Record
	this.f_SetCurrentRecord=function(){for(var v_Key in this.a_Data){if(this.a_OpenLine['ID']==this.a_Data[v_Key]['ID']){A_Page['current-record']=v_Key;}}};
	// Function - Set Data
	this.f_SetData=function(o_JSON){
		for(var v_Key in o_JSON){
			switch(v_Key){
				case 'data':this.a_Data=o_JSON['data'];break;
				case 'header':
					// Hovering over the RSS icon will show the current search information.
					// For example: I am browsing news and articles tagged as Adventure sorted by date.
					this.v_Header=o_JSON['header'];
					$('#change-tag-RSS-link').attr('title',this.v_Header);
					break;
				case 'open-line':
					this.a_OpenLine=o_JSON['open-line'];
					this.v_Target='#part-list-line-'+this.a_OpenLine['ID'];
					break;
				case 'page':
					A_Page=o_JSON['page'];
					A_Page['number-of-records']=F_Count(this.a_Data);
					break;
				default:break;
			}
		}
		for(var v_Key in this.a_Data){
			for(var v_SubKey in this.a_Data[v_Key]){
				switch(v_SubKey){
					case 'name':case 'title':
						this.a_Data[v_Key]['clean-name']=F_Clean(this.a_Data[v_Key][v_SubKey]);
						this.a_Data[v_Key]['dirty-name']=F_Dirty(this.a_Data[v_Key][v_SubKey]);
						break;
					default:break;
				}
			}
		}
		if(this.a_Parameters['display-on-set']){
			if(o_JSON['fail']){
				$('#interface-screen-buttons').hide();
				this.o_jQuery.find('#part-list-open-line').hide();
				this.f_ConstructEmptyDisplay();
			}else{
				$('#interface-screen-buttons').show();
				this.o_jQuery.find('#part-list-open-line').show();
				this.f_ConstructDisplay();
			}
			if(!A_Search['month-view']){this.f_Display(false);}
		}
	};
	// Function - Set Open Line Data
	this.f_SetOpenLineData=function(o_JSON){
		this.a_OpenLine=o_JSON['open-line'];
		this.o_jQuery.find(this.v_Target).removeClass('open-line');
		this.v_Target='#part-list-line-'+this.a_OpenLine['ID'];
		this.f_ShowOpenLine();
		this.f_Display(true);
	};
	// Function - Show Calendar
	this.f_ShowCalendar=function(){
		$('#'+this.v_Destination).hide();
		$('#stage-month-view').show();
	};
	// Function - Show List
	this.f_ShowList=function(){
		$('#stage-month-view').hide();
		$('#'+this.v_Destination).show();
	};
	// Function - Show Open Line
	this.f_ShowOpenLine=function(){
		this.o_jQuery.find(this.v_Target).addClass('open-line');
		this.o_jQuery.find('#part-list-open-line').html(F_CopyHTML('stage-open-line'));
		this.o_jQuery.find('#content-open-line').html(this.f_ConstructOpenLine());
		this.o_jQuery.find('#open-line-description-font').css('font-size',A_Master['font-size']+'px').find('.catalog-link').css('font-size',A_Master['font-size']+'px');
		this.o_jQuery.find('#open-line-tags').html(this.f_ShowTags());
		this.f_SetCurrentRecord();
	};
	// Function - Show Options
	this.f_ShowOptions=function(){
		for(var v_Key in this.a_OpenLine){
			if(V_LoggedIn){
				switch(v_Key){
					case 'favorite':F_ToggleOption(v_Key,this.a_OpenLine[v_Key]);break;
					default:break;
				}
			}
		}
		switch(V_AreaName){
			case 'events':case 'materials':case 'news':
				if(!this.v_Similar){$('#option-similar').show();}
				F_ToggleOption('expand',V_Expand);
				break;
			default:break;
		}
	};
	// Function - Show Tags
	this.f_ShowTags=function(){
		var v_HTML='';
		for(var v_Key in this.a_OpenLine['tag-set']){v_HTML+='<a class="tag-click fake-link gold" id="tag-'+this.a_OpenLine['tag-set'][v_Key]['ID']+'" style="float:left; margin-left:3px;">'+this.a_OpenLine['tag-set'][v_Key]['name']+'</a>';}
		return v_HTML;
	};
	// Function - Set Parameters
	this.f_SetParameters=function(a_Parameters){for(var v_Key in a_Parameters){this.a_Parameters[v_Key]=a_Parameters[v_Key];}};

	// Initialization
	this.f_SetParameters(a_Parameters);
	this.f_ResetDisplay();
}
//
// Function - Expand
function F_Expand(){if(V_Expand){V_Expand=false;$('#part-list-cells').show();}else{V_Expand=true;$('#part-list-cells').hide();}}
//
// Function - Initialize Date Selector
function F_InitializeDateSelector(){
	$('#button-date-selector').dateter({
			'pastDayShades':false,
			'borderClass':'border-main-1',
			'backgroundClass':'color-off',
			'shadeClass':'dark',
			'highLightToday':true,
			'height':'114px',
			'width':'176px'
		},
		// Call Back Function I
		function(v_Month,v_Day,v_Year){
			F_AddDateSearch(v_Year+'-'+v_Month+'-'+v_Day);
			F_SendCommandRequest('change-date',V_AreaName);
		}
	);
}
//
// Function - Initialize Displays 2
function F_InitializeDisplays2(){
	A_Displays['suggestions']=new F_CreateObject_Display('home','materials','suggestions',{'auto-refresh':true,'covers':true,'fade':true,'height':'170px','width':'100%'});
	A_Displays['possibles']=new F_CreateObject_Display('home','events','possibles',{'fade':true});
	A_Displays['interests']=new F_CreateObject_Display('home','articles','interests',{'fade':true});
	A_Displays['browse']=new F_CreateObject_Display('news','articles','browse',{'fade':true,'header':false,'height':'455px','width':'100%'});
}
//
// Function - Initialize Month View
function F_InitializeMonthView(a_Data){
	$('#stage-month-view').dateter({
		'displayHeader':false,
		'pastDayShades':false,
		'daysToHighlight':a_Data['calendar'],
		'height':'454px',
		'highLightColors':a_Data['colors'],
		'borderClass':'border-main-1',
		'shadeClass':'dark',
		'highLightToday':true,
		'highLightTodayClass':'',
		'noClick':true,
		'uniqueName':'month-view',
		'largeDisplay':true,
		'headerSelectors':{
			'title':$('#largeName'),
			'back':$('#largePrevious'),
			'next':$('#largeNext')
		}},
		function(v_Month,v_Day,v_Year){
			alert(v_Month);
		},
		function(v_Month,v_Day,v_Year){
			if($('#stage-month-view').data('Settings').daysToHighlight[v_Year]){
				if(!$('#stage-month-view').data('Settings').daysToHighlight[v_Year][v_Month]){
					$.getJSON('request-view/'+v_Year+'-'+v_Month+'-1'+'/json/ajax',function(o_JSON){
						a_Data['calendar']=$.extend(true,a_Data['calendar'],o_JSON['calendar']);
						$('#stage-month-view').data('Settings').daysToHighlight=a_Data['calendar'];
					});
				}
			}else{
				/*
				if(Params.year!=v_Year){
					Params.year=v_Year;
					Params.CalendarJSON[Params.year]={};
				}
				$.getJSON('request-view/'+v_Year+'-'+v_Month+'-'+v_Day+'-'+'/json/ajax',function(o_JSON){
					a_Data['calendar']=$.extend(true,a_Data['calendar'],o_JSON['calendar']);
					$('#stage-month-view').data('Settings').daysToHighlight=a_Data['calendar'];
				});
				*/
			}
		});
}
//
// Function - Request Popular Tags
function F_RequestPopularTags(){$.getJSON('/popular-tags/json/ajax',function(o_JSON){if(!o_JSON['fail']){F_SetPopularTags(o_JSON);}});}
//
// Function - Set Popular Tags
function F_SetPopularTags(o_JSON){
	for(var v_Tag in o_JSON['data']){
		$('#popular-tag-'+v_Tag).find('a').html(o_JSON['data'][v_Tag]['name']).attr('ID','tag-'+o_JSON['data'][v_Tag]['ID']);
	}
}
//
// Function - Open Dockable
function F_OpenDockable(v_URL,v_Name){
	$('#dockable-window').css({'visibility':'visible'});
	$('#dockable-content').css({'visibility':'visible'});
	$('#dockable-close').html('Close '+v_Name);
	$('#dockable-content').attr('src',v_URL);
}
//
// Function - Open Line Font Size
function F_OpenLineFontSize(){
	$('#open-line-description-font').css('font-size',A_Master['font-size']+'px').find('.catalog-link').css('font-size',A_Master['font-size']+'px');
}
//
// Function - Refresh
function F_Refresh(){$.getJSON('/refresh/json/ajax');}
//
// Function - Set Display Data 2
function F_SetDisplayData2(o_JSON){
	A_Displays[((A_Displays[o_JSON['pointer']])?o_JSON['pointer']:'browse')].f_SetData(o_JSON);
	F_ShowSearchMenu();
	F_StopLoading();
}
//
// Function - Set Open Line Data
function F_SetOpenLineData(o_JSON){
	A_Displays[((A_Displays[o_JSON['pointer']])?A_Displays[o_JSON['pointer']]:'browse')].f_SetOpenLineData(o_JSON);
	F_StopLoading();
}
//
// Function - Show Content Menu
function F_ShowContentMenu(){
	V_LoggedIn=true;
	var a_Buttons=eval({'previous-page':false,'previous-record':false,'page-list':false,'next-record':false,'next-page':false});
	switch(V_AreaName){
		case 'databases':case 'events':case 'materials':case 'news':
			a_Buttons['previous-page']=A_Page['current-page']>1;
			a_Buttons['previous-record']=A_Page['current-record']>0;
			a_Buttons['next-record']=A_Page['current-record']<parseInt(A_Page['number-of-records'])-1&&parseInt(A_Page['current-record'])+((parseInt(A_Page['current-page'])-1)*A_Page['number-of-records'])<(parseInt(A_Page['total-records'])-1);
			a_Buttons['next-page']=parseInt(A_Page['current-page'])<parseInt(A_Page['total-pages']);
			if(a_Buttons['next-page']||a_Buttons['previous-page']){
				a_Buttons['page-list']=true;
				F_BuildPageButtons();
			}
			break;
		default:break;
	}
	for(v_Key in a_Buttons){if(a_Buttons[v_Key]){$('#button-'+v_Key).css('visibility','visible');}else{$('#button-'+v_Key).css('visibility','hidden');}}
	V_LoggedIn=false;
}
//
// Function - Toggle Option
function F_ToggleOption(v_OptionID,v_Toggle){
	$('#option-'+v_OptionID).show().removeClass(((v_Toggle)?'option-black':'option-red')).addClass(((v_Toggle)?'option-red':'option-black'));
	$('#font-'+v_OptionID).removeClass(((v_Toggle)?'white':'dark-red')).addClass(((v_Toggle)?'dark-red':'white'));
}

//
// Triggers

//
// Click - Fake Click
$('.fake-click').live('click',function(){
	F_Move($(this).attr('ID'),false);
	A_Displays['browse'].f_RequestData($(this).attr('href'));
	return false;
});
//
// Click - Browse Link
$('.browse-link,.catalog-link').live('click',function(){
	F_OpenDockable($(this).attr('href'),'Catalog');
});
//
// Click - Close Link
$('.close-link').live('click',function(){
	F_CloseDockable();
});
//
// Click - Decrease Font Size
$('.decrease-font-size').live('click',function(){
	A_Master['font-size']-=2;
	if(A_Master['font-size']<10){A_Master['font-size']=10;}
	F_OpenLineFontSize();
});
//
// Click - Increase Font Size
$('.increase-font-size').live('click',function(){
	A_Master['font-size']+=2;
	if(A_Master['font-size']>30){A_Master['font-size']=30;}
	F_OpenLineFontSize();
});
//
// Click - Open Line Click
$('.open-line-click').live('click',function(){
	A_Displays['browse'].f_OpenLine($(this).attr('ID').replace(/click-/g,''));
});
//
// Click - Option Expand
$('.option-expand').live('click',function(){
	F_Expand();
	F_ToggleOption('expand',V_Expand);
});


$('.no-icon-link').live('click',function(){F_SetDockableURL('Catalog',$(this).attr('href'));return false;});
$('.tag-link').live('click',function(){F_MakeHTTPRequest($(this).attr('href'));return false;});
$('.browse').live('click',function(){F_MakeHTTPRequest($(this).attr('href'));return false;});




// LAPCAT
// September 2009

//
// Function - Print R
function F_PrintR(a_Print,v_Counter,v_Alert){function f_AddSpace(v_Counter){var v_Spaces='';for(var v_Space=0;v_Space<v_Counter;v_Space++){v_Spaces+=' ';}return v_Spaces;}var v_HTML='';if(isNaN(v_Counter)){v_Counter=0;}else{v_Counter++;}for(var v_Key in a_Print){v_HTML+=f_AddSpace(v_Counter*2)+((typeof a_Print[v_Key]=='object')?v_Key+' {\n'+F_PrintR(a_Print[v_Key],v_Counter)+'}\n':v_Key+' => '+a_Print[v_Key]+'\n');}if(v_Alert){alert(v_HTML);}else{return v_HTML;}}

// Function - Create Object - User
function F_CreateObject_User(){
	// Array - Information
	this.a_Information=eval({});
	// Variable - Log Status
	this.v_LogStatus=0;
	// Variable - Name
	this.v_Name='user';
	// Variable - Parent
	this.v_Parent='master';
	// Function - Reset User
	this.f_ResetUser=function(){
		if(this.v_LogStatus){
			$.getJSON('/information/points/json/ajax',function(o_JSON){F_ProcessInformationJSON(o_JSON);});
		}else{
			this.a_Information=eval({
				'points':{
					'LAPCAT':0,
					'objective':0,
					'patron-plus':0
				},
				'search':{}
			});
		}
	};
	// Function - Toggle Log Status
	this.f_ToggleLogStatus=function(){if(this.v_LogStatus){this.v_LogStatus=false;}else{this.v_LogStatus=true;}this.f_ResetUser();};
	this.f_ResetUser();
}


//
// Global Functions

//
// Function - Alert Each
function F_AlertEach(a_Data){for(var v_Key in a_Data){alert(v_Key+' = '+a_Data[v_Key]);}}
//
// Function - Clear Displays 2
function F_ClearDisplays2(){var a_Displays=eval({0:1,1:2,2:3});for(var v_Key in a_Displays){$('#content-display-'+a_Displays[v_Key]).empty();}}
//
// Function - Count
function F_Count(a_Data){var v_Counter=0;for(var v_Key in a_Data){v_Counter++;}return v_Counter;}
//
// Function - Create Progress Bar
function F_CreateProgressBar(v_Progress,v_Total,v_NumberOfCells,v_Divider){
	var v_CellWidth=Math.floor(v_Total/v_NumberOfCells);
	var a_HTML=eval({'filled':'<td style="background-color:rgba(255,0,0,1.0); border-right:1px solid rgba(125,125,125,1.0); width:'+v_CellWidth+'%;"></td>','empty':'<td style="border-right:1px solid rgba(125,125,125,1.0); width:'+v_CellWidth+'%;"></td>'});
	var v_HTML='<div style="height:4px; width:auto;"><table style="height:3px; width:100%;" title="'+v_Progress+' of '+v_Total+'"><tr>';
	for(var v_Counter=0;v_Counter<v_NumberOfCells;v_Counter++){v_HTML+=((v_Counter<v_Progress)?a_HTML['filled']:a_HTML['empty']);}
	v_HTML+='</tr></table></div>';
	return v_HTML;
}
//
// Function - Process Information JSON
function F_ProcessInformationJSON(o_JSON){
	if(o_JSON['fail']){
		F_PrintR(o_JSON,0,true);
	}else{
		alert('logged-in - need to process the information');
	}
}
//
// Function - Set Dockable URL
function F_SetDockableURL(v_Type,v_URL){
	alert('!');
}