// LAPCAT
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
// Array - Page
var A_Page=eval({});
//
// Array - Master
var A_Master=eval({
	'allow-animations':true,
	'allow-fade':true,
	'font-size':12
});
//
// Array - Tag
var A_Tag=eval({
	'ID':'',
	'name':''
});

//
// Variable - Area
var V_AreaName='';
//
// Variable - Expand
var V_Expand=false;
//
// Variable - Loading
var V_Loading=0;
//
// Variable - Logged In
var V_LoggedIn=false;

//
// Function - Initialize Displays
function F_InitializeDisplays(){
	A_Displays['suggestions']=new F_CreateObject_Display('home','suggestions',{'auto-refresh':true,'covers':true,'fade':true,'height':'170px','width':'100%'});
	A_Displays['possibles']=new F_CreateObject_Display('home','possibles',{'fade':true});
	A_Displays['interests']=new F_CreateObject_Display('home','interests',{'fade':true});
	A_Displays['browse']=new F_CreateObject_Display('news','browse',{'fade':true,'header':false,'height':'455px','width':'100%'});
}
//
// Function - Copy HTML
function F_CopyHTML(v_ElementID){return $('#'+v_ElementID).html();}
//
// Function - Create Object - Display
function F_CreateObject_Display(v_Parent,v_Name,a_Parameters){
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
			$(this.v_Target).queue(function(){A_Displays[v_Name].f_Effects('slide-left');$(this).dequeue();});
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
		if(v_OpenLine){$(this.v_Target).queue(function(){A_Displays[v_Name].f_Effects('slide-left');$(this).dequeue();});}
		F_ShowContentMenu();
	};
	// Function - Effects
	this.f_Effects=function(v_Effect){
		if(A_Master['allow-animations']&&this.a_Parameters['animations']){
			switch(v_Effect){
				case 'slide-left':
					$(this.v_Target).find('.open-line-click').addClass('shadow-right-12');
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
	this.f_MovedFromParent=function(){$('#tab-'+this.v_Parent).removeClass('option-selected');$('#'+this.v_Destination).html('&nbsp;').hide();};
	// Function - Moved To Parent
	this.f_MovedToParent=function(){$('#tab-'+this.v_Parent).addClass('option-selected');$('#'+this.v_Destination).show();this.f_RequestData();};
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
	this.f_RequestData=function(v_URL){F_StartLoading();$.getJSON(((v_URL)?v_URL:'/'+this.v_Parent+'/'+this.v_Name+'/json/ajax'),function(o_JSON){return F_SetDisplayData(o_JSON);});};
	// Function - Request Line
	this.f_RequestLine=function(v_TargetID){F_StartLoading();$.getJSON('/'+this.v_Parent+'/thin-line/'+v_TargetID+'/json/ajax',function(o_JSON){return F_SetOpenLineData(o_JSON);});};
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
			this.f_ConstructDisplay();
			this.f_Display(false);
		}
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
	// Function - Set Open Line Data
	this.f_SetOpenLineData=function(o_JSON){
		this.a_OpenLine=o_JSON['open-line'];
		this.o_jQuery.find(this.v_Target).removeClass('open-line');
		this.v_Target='#part-list-line-'+this.a_OpenLine['ID'];
		this.f_ShowOpenLine();
		this.f_Display(true);
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
	// Function - Show Tags
	this.f_ShowTags=function(){
		var v_HTML='';
		for(var v_Key in this.a_OpenLine['tag-set']){v_HTML+='<a class="basic-tag-link fake-link gold" id="tag-'+this.a_OpenLine['tag-set'][v_Key]['ID']+'" style="float:left; margin-left:3px;">'+this.a_OpenLine['tag-set'][v_Key]['name']+'</a>';}
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
// Function - Move To Area
function F_MoveToArea(v_AreaName){
	var v_Moved=((v_AreaName!=V_AreaName)?true:false);
	if(v_Moved){$('#destination-content').html('');}
	switch(v_AreaName){
		case 'home':case 'my-library':
			if(v_Moved){$('#destination-content').html(A_Displays['suggestions'].f_Fresh()+A_Displays['possibles'].f_Fresh()+A_Displays['interests'].f_Fresh());}
			A_Displays['suggestions'].f_MovedToParent();
			A_Displays['possibles'].f_MovedToParent();
			A_Displays['interests'].f_MovedToParent();
			A_Displays['browse'].f_MovedFromParent();
			break;
		case 'databases':
		case 'events':
		case 'hours':
		case 'jobs':
		case 'materials':
		case 'news':
			if(A_Displays['browse'].v_Parent!=v_AreaName){
				A_Displays['browse']=new F_CreateObject_Display(v_AreaName,'browse',{'fade':true,'header':false,'height':'455px','width':'100%'});
			}
		default:
			if(v_Moved){$('#destination-content').html(A_Displays['browse'].f_Fresh());}
			A_Displays['suggestions'].f_MovedFromParent();
			A_Displays['possibles'].f_MovedFromParent();
			A_Displays['interests'].f_MovedFromParent();
			A_Displays['browse'].f_MovedToParent();
			break;
	}
	V_AreaName=v_AreaName;
	F_ShowTinyMenu();
	F_ShowSearchMenu();
}
//
// Function - Open Line Font Size
function F_OpenLineFontSize(){
	$('#open-line-description-font').css('font-size',A_Master['font-size']+'px').find('.catalog-link').css('font-size',A_Master['font-size']+'px');
}
//
// Function - Set Display Data
function F_SetDisplayData(o_JSON){if(A_Displays[o_JSON['pointer']]){A_Displays[o_JSON['pointer']].f_SetData(o_JSON);}F_StopLoading();}
//
// Function - Set Open Line Data
function F_SetOpenLineData(o_JSON){if(A_Displays[o_JSON['pointer']]){A_Displays[o_JSON['pointer']].f_SetOpenLineData(o_JSON);}F_StopLoading();}
//
// Function - Start Loading
function F_StartLoading(){V_Loading++;if(V_Loading>0){$('#loading-dots').show();}}
//
// Function - Stop Loading
function F_StopLoading(){V_Loading--;if(V_Loading<1){$('#loading-dots').hide();}}
//
// Function - Toggle Option
function F_ToggleOption(v_OptionID,v_Toggle){
	$('#option-'+v_OptionID).show().removeClass(((v_Toggle)?'option-black':'option-red')).addClass(((v_Toggle)?'option-red':'option-black'));
	$('#font-'+v_OptionID).removeClass(((v_Toggle)?'white':'dark-red')).addClass(((v_Toggle)?'dark-red':'white'));
}
//
// Function - Show Tiny Menu
function F_ShowTinyMenu(){
	V_LoggedIn=true;
	var a_Buttons=eval({'random':false,'reset':false,'favorites':false,'anticipated':false,'summer':false,'slider':false,'collected':false});
	switch(V_AreaName){
		case 'home':a_Buttons['random']=true;break;
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
// Function - Show Search Menu
function F_ShowSearchMenu(){
	V_LoggedIn=true;
	var a_Changes=eval({'change-tag':false});
	var v_ChangeTagRSS=false;
	switch(V_AreaName){
		case 'home':
			a_Changes['change-tag']=true;
			break;
		case 'news':
			a_Changes['change-tag']=true;
			v_ChangeTagRSS=true;
			break;
		case 'events':
			a_Changes['change-tag']=true;
			v_ChangeTagRSS=true;
			break;
		case 'materials':
			a_Changes['change-tag']=true;
			v_ChangeTagRSS=true;
			break;
		case 'databases':
			a_Changes['change-tag']=true;
			v_ChangeTagRSS=true;
			break;
		default:break;
	}
	for(v_Key in a_Changes){if(a_Changes[v_Key]){$('#container-'+v_Key).show();}else{$('#container-'+v_Key).hide();}}
	$('#change-tag-RSS').css({'visibility':((v_ChangeTagRSS)?'visible':'hidden')});
	V_LoggedIn=false;
}
//
// Function - Show Content Menu
function F_ShowContentMenu(){
	V_LoggedIn=true;
	var a_Buttons=eval({'previous-page':false,'previous-record':false,'next-record':false,'next-page':false});
	switch(V_AreaName){
		case 'databases':case 'events':case 'materials':case 'news':
			a_Buttons['previous-page']=A_Page['current-page']>1;
			a_Buttons['previous-record']=A_Page['current-record']>0;
			a_Buttons['next-record']=A_Page['current-record']<parseInt(A_Page['number-of-records'])-1&&parseInt(A_Page['current-record'])+((parseInt(A_Page['current-page'])-1)*A_Page['number-of-records'])<(parseInt(A_Page['total-records'])-1);
			a_Buttons['next-page']=parseInt(A_Page['current-page'])<parseInt(A_Page['total-pages']);
			break;
		default:break;
	}
	for(v_Key in a_Buttons){if(a_Buttons[v_Key]){$('#button-'+v_Key).css('visibility','visible');}else{$('#button-'+v_Key).css('visibility','hidden');}}
	V_LoggedIn=false;
}
/*
var A_Test=eval({});
A_Test['suggestions']=$(document.createElement('div'))
	.data('v_Destination','#destination-content')
	.data('v_Name','suggestions')
	.bind('f_ShowData',function(e){
		for(var v_Key in $(this).data('o_JSON')['data']){
			$($(this).data('v_Destination')).append(
				F_CreateElement(
					'a',
					'catalog-link fake-link',
					$(this).data('o_JSON')['data'][v_Key]['ISBNorSN'],
					'cat-link',
					F_Clean($(this).data('o_JSON')['data'][v_Key]['title'])
				)
			);
		}
	})
	.bind('f_RequestData',function(e,v_URL){
		var v_Selector=$(this);
		$.getJSON(v_URL,function(o_JSON){
			$(v_Selector).data('o_JSON',o_JSON);
			$(v_Selector).trigger('f_ShowData');
		});
	})
	.addClass('color-hex')
	.css({'height':'100px','width':'100px;'})
	;

var V_Master=eval({});
V_Master=$(document.createElement('div'))
	.css({'height':'245px','width':'100%'})
	.data('name','news')
	.data('parameters',{
		'fade-on':true,
		'fade-timer':1000,
		'refresh-on':false,
		'refresh-timer':30000
	})
	.html('<font class="white">long article</font>')
	.bind('add-trigger',function(e,v_Trigger){
		var v_Selector=$(this);
		$(this).queue(
			function(){
				$(v_Selector).trigger(v_Trigger);
				$(v_Selector).dequeue();
		   }
		);
	})
	.bind('insert-data',function(e){
		$(this).html('<font class="white">'+$(this).data('JSON')['data'][0]['name']+'</font>');
	})
	.bind('request-data',function(e){
		var v_Selector=$(this);
		$.getJSON('/'+$(this).data('name')+'/browse/json/ajax',function(o_JSON){
			$(v_Selector).data('JSON',o_JSON);
			if($(v_Selector).data('parameters')['fade-on']){
				$(v_Selector).queue(function(){$(v_Selector).fadeOut($(v_Selector).data('parameters')['fade-timer']);$(v_Selector).dequeue();});
			}
			$('#queue-count').html($(this).queue().length);

			$(v_Selector).queue(function(){$(v_Selector).fadeIn($(v_Selector).data('parameters')['fade-timer']);$(v_Selector).dequeue();});
			$('#queue-count').html($(this).queue().length);

			if($(v_Selector).data('parameters')['fade-on']){
				$(v_Selector).queue(function(){$(v_Selector).fadeIn($(v_Selector).data('parameters')['fade-timer']);$(v_Selector).dequeue();});
			}
			$('#queue-count').html($(this).queue().length);
		});
	})
	.bind('set-parameters',function(e,a_Parameters){
		for(var v_Key in a_Parameters){
			$(this).data('parameters')[v_Key]=a_Parameters[v_Key];
		}
	})
	;

//V_Master.trigger('request-data');
//setTimeout("V_Master.trigger(\'request-data\')",1);

$(document).ready(function(){
	$('#destination-content').html(V_Master);
	V_Master.trigger('request-data');
});
*/

$(document).ready(function(){
	F_InitializeDisplays();
	F_MoveToArea('home');
});




//
// Function - Create Element
/*
function F_CreateElement(v_Element,v_Class,v_ID,v_Name,v_InnerHTML){
	var v_NewElement=$(document.createElement(v_Element)).addClass(v_Class).attr({'ID':v_ID,'name':v_Name}).html(v_InnerHTML);
	return v_NewElement;
}
*/

//
// Live Events

//
// Live - Basic Tag Link
$('.basic-tag-link').live('click',function(){
	$.getJSON('/'+V_AreaName+'/change-tag/'+$(this).attr('ID').replace(/tag-/g,'')+'/json/ajax',function(o_JSON){
		F_SetDisplayData(o_JSON);
	});
});
//
// Live - Browse Link
$('.browse-link').live('click',function(){
	$.getJSON('/'+V_AreaName+'/browse/'+$(this).attr('ID').replace(/tag-/g,'')+'/json/ajax',function(o_JSON){
		F_SetDisplayData(o_JSON);
	});
});
//
// Live - Option Expand
$('.option-expand').live('click',function(){
	F_Expand();
	F_ToggleOption('expand',V_Expand);
});
//
// Live - Open Line Click
$('.open-line-click').live('click',function(){
	A_Displays['browse'].f_OpenLine($(this).attr('ID').replace(/click-/g,''));
});
//
// Live - Increase Font Size
$('.increase-font-size').live('click',function(){
	A_Master['font-size']+=2;
	if(A_Master['font-size']>30){A_Master['font-size']=30;}
	F_OpenLineFontSize();
});
//
// Live - Decrease Font Size
$('.decrease-font-size').live('click',function(){
	A_Master['font-size']-=2;
	if(A_Master['font-size']<10){A_Master['font-size']=10;}
	F_OpenLineFontSize();
});
//
// Live - Button Clicks
$('.button-clicks').live('click',function(){
	var v_Button=$(this).attr('ID').replace('button-','');
	switch(v_Button){
		case 'anticipated':case 'collected':case 'favorites':case 'slider':case 'summer':
		case 'next-page':case 'previous-page':
			A_Displays['browse'].f_RequestData('/'+V_AreaName+'/'+v_Button+'/json/ajax');
			break;
		case 'next-record':A_Displays['browse'].f_NextRecord();break;
		case 'previous-record':A_Displays['browse'].f_PreviousRecord();break;
		case 'log-out':break;
		case 'random':F_MoveToArea(V_AreaName);break;
		case 'reset':break;
		default:break;
	}
});
//
// Live - Menu Link
$('.menu-link').live('click',function(){
	F_MoveToArea($(this).attr('ID').replace(/tab-/g,''));
});

$('.catalog-link,.no-icon-link').live('click',function(){F_SetDockableURL('Catalog',$(this).attr('href'));return false;});
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
// Function - Clean
function F_Clean(v_Data){return v_Data.replace(/\\'/g,'\'').replace(/\\"/g,'"').replace(/\\0/g,'\0').replace(/\\\\/g,'\\');} 
//
// Function - Clear Displays
function F_ClearDisplays(){var a_Displays=eval({0:1,1:2,2:3});for(var v_Key in a_Displays){$('#content-display-'+a_Displays[v_Key]).empty();}}
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
// Function - Dirty
function F_Dirty(v_Data){return escape(v_Data);}
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