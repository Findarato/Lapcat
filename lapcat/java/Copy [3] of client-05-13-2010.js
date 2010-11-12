//
function F_RequestSingleImage(v_Size,v_ISBNorSN,v_Destination,v_MaximumHeight,v_MaximumWidth){
	var v_Image=new Image();
	$(v_Image)
		.load(function(){
			$(this).hide();
			$(v_Destination).append(this);
			if(v_Size=='L'){
				if($(this).height()>1){
					var v_Width=$(this).width();
					var v_Height=$(this).height();
					var v_Counter=19;
					while(v_Height>=v_MaximumHeight||v_Width>=v_MaximumWidth){
						v_Width=Math.floor($(this).width()*(0.05*v_Counter));
						v_Height=Math.floor($(this).height()*(0.05*v_Counter));
						v_Counter--;
					}
					$(this).height(v_Height);
					$(this).width(v_Width);
				}
			}
			$(this).fadeIn();
		}).attr('src','http://cdn1.lapcat.org/coverCache/imageFetch.php?isbn='+v_ISBNorSN+'&size='+v_Size);
}
//
//
//
//
//
//
//
//
var A_Constructs={
	'databases':{
		'area-name':'Databases',
		'blind-URL':'/quick/databases/search',
		'data':new Array(),
		'data-in-full':true,
		'expand':{'height':548,'width':960},
		'has-images':false,
		'header':{'loading':{'class':'font-I font-italic','text':'Loading...'},'ready':{'class':'font-X','text':''}},
		'list-ID':0,
		'line-replace':{'one':'name','two':'library','three':'credited','four':'date-words'},
		'line-value-replace':{},
		'open-line-replace':{'one':'name','two':'library','three':'credited','four':'date-words'},
		'page-data':new Array(),
		'previous-page':0,
		'show-header-text-while-shrunk':false,
		'show-list-button':false,
		'shrink':{'height':286,'width':240},
		'size':'shrink',
		'spacer':false,
		'status':'loading',
		'target':0,
		'view':'list',
		'viewable-at-home':true,
		'views':new Array('list'),
		'visibility':'show'
	},
	'events':{
		'area-name':'Events',
		'blind-URL':'/quick/events/search',
		'data':new Array(),
		'data-in-full':true,
		'expand':{'height':548,'width':960},
		'has-images':false,
		'header':{'loading':{'class':'font-I font-italic','text':'Loading...'},'ready':{'class':'font-X','text':''}},
		'list-ID':0,
		'line-replace':{'one':'name','three':'library','four':'date-words'},
		'line-value-replace':{'two':'at'},
		'open-line-replace':{'one':'name','two':'library','three':'library','four':'date-words'},
		'page-data':new Array(),
		'previous-page':0,
		'show-header-text-while-shrunk':false,
		'show-list-button':false,
		'shrink':{'height':286,'width':240},
		'size':'shrink',
		'spacer':false,
		'status':'loading',
		'target':0,
		'view':'list',
		'viewable-at-home':true,
		'views':new Array('list'),
		'visibility':'show'
	},
	'materials':{
		'area-name':'Materials',
		'blind-URL':'/quick/materials/search',
		'data':new Array(),
		'data-in-full':true,
		'expand':{'height':462,'width':960},
		'has-images':true,
		'header':{'loading':{'class':'font-I font-italic','text':'Loading...'},'ready':{'class':'font-X','text':''}},
		'list-ID':0,
		'line-replace':{'one':'name','two':'credit-word','three':'credit-name','four':'date-words','five':'ISBNorSN','seven':'available-home','eight':'available-other','nine':'ISBNorSN'},
		'line-value-replace':{},
		'lists-requested':false,
		'open-line-replace':{'one':'name','two':'ISBNorSN','three':'summary','four':'credit-word','five':'credit-name','six':'date-words','seven':'available-home','eight':'available-other','nine':'ISBNorSN'},
		'page-data':new Array(),
		'previous-page':0,
		'search-parameters':{'date':'','search':'','sort':'','tag':'','type':'1'},
		'search-is-ready':false,
		'show-header-text-while-shrunk':true,
		'show-list-button':true,
		'shrink':{'height':198,'width':960},
		'size':'shrink',
		'spacer':true,
		'status':'loading',
		'target':0,
		'view':'list',
		'viewable-at-home':true,
		'views':new Array('list','images'),
		'visibility':'show'
	},
	'news':{
		'area-name':'News',
		'blind-URL':'/quick/news/search',
		'data':new Array(),
		'data-in-full':false,
		'expand':{'height':548,'width':960},
		'has-images':false,
		'header':{'loading':{'class':'font-I font-italic','text':'Loading...'},'ready':{'class':'font-X','text':''}},
		'list-ID':0,
		'line-replace':{'one':'name','three':'username','four':'date-words'},
		'line-value-replace':{'two':'by'},
		'open-line-replace':{'one':'name','two':'username','three':'credited','four':'date-words'},
		'page-data':new Array(),
		'previous-page':0,
		'show-header-text-while-shrunk':false,
		'show-list-button':false,
		'shrink':{'height':286,'width':240},
		'size':'shrink',
		'spacer':false,
		'status':'loading',
		'target':0,
		'view':'list',
		'viewable-at-home':true,
		'views':new Array('list'),
		'visibility':'show'
	}
};
var V_Area='home';
var V_AnchoredMessageBoxOnScreen=false;
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
// Function - Pull Data From List
function F_PullDataFromList(v_AreaName){
	var v_ListID=A_Constructs[v_AreaName]['list-ID'];
	var a_StoredData=$.parseJSON(localStorage.getItem(v_AreaName+'-data'));
	var a_StoredListData=$.parseJSON(localStorage.getItem(v_AreaName+'-by-list'));
	var a_Data=new Array();
	var v_ID=0;
	var v_Counter=0;
	for(var v_Key in a_StoredListData){
		if(v_Counter<1){
			//alert(v_Key+' = '+a_StoredListData[v_Key]);
			v_Counter++;
		}
		//v_ID=a_StoredListData[v_ListID][v_Key];
		//a_Data[v_ID]=a_StoredData[v_ID];
	}
	return a_Data;
}
// Function - Clone Construct
function F_CloneConstruct(v_AreaName){
	var o_Construct=$('#construct-template').clone().attr('id',v_AreaName+'-construct').appendTo('#destination-content');
	$('#'+v_AreaName+'-construct #header-area-icon-'+v_AreaName).show();
	if(A_Constructs[v_AreaName]['spacer']){o_Construct.css({'margin-bottom':16});}

	// Function - Append Data
	$('#'+v_AreaName+'-construct').bind('append-data',function(v_Event){
		var a_Data=A_Constructs[v_AreaName]['data'];
		var v_ViewName='';
		// Loop through this construct's list of views.
		for(var v_Key in A_Constructs[v_AreaName]['views']){
			// v_ViewName = this view's name - i.e. Calendar, List, Images
			v_ViewName=A_Constructs[v_AreaName]['views'][v_Key];
			// Clear this view's HTML.
			$('#'+v_AreaName+'-construct #'+v_ViewName+'-data').html('');
			// Loop through each line in the data, then append the data to cloned HTML.
			for(var v_SecondKey in a_Data){
				$('#'+v_AreaName+'-construct #'+v_ViewName+'-data').append(F_CloneLineAndInsertData(v_AreaName,v_ViewName,a_Data[v_SecondKey]));
			}
		}
	});

	// Function - Change Header
	$('#'+v_AreaName+'-construct').bind('change-header',function(v_Event,v_Mode){
		if(v_Mode=='loading'){$(this).fadeTo(0,0.35);}else{$(this).fadeTo(0,1.00);}
		$(this).find('#header-text').attr('class',A_Constructs[v_AreaName]['header'][v_Mode]['class']).html(A_Constructs[v_AreaName]['header'][v_Mode]['text']);
		$(this).find('#header-area-name').html(A_Constructs[v_AreaName]['area-name']);
	});

	// Function - Change Page
	$('#'+v_AreaName+'-construct').bind('change-page',function(v_Event,v_Page){
		if(A_Constructs[v_AreaName]['data-in-full']){
			$('#'+v_AreaName+'-construct #list-data').css({'top':(-440*(v_Page-1))});
			A_Constructs[v_AreaName]['target']=(v_Page*10)-10;
			if(v_Page!==A_Constructs[v_AreaName]['previous-page']){
				A_Constructs[v_AreaName]['previous-page']=v_Page;
				A_Constructs[v_AreaName]['page-data']['current-page']=v_Page;
				$('#'+v_AreaName+'-construct').trigger('update-page-buttons').trigger('highlight-target').trigger('expand');
			}
		}
	});

	// Function - Change View
	$('#'+v_AreaName+'-construct').bind('change-view',function(v_Event){
		var v_LastKey=(A_Constructs[v_AreaName]['views'].length-1);
		var v_NextKey=0;
		var v_Pass=false;
		for(var v_Key in A_Constructs[v_AreaName]['views']){if(A_Constructs[v_AreaName]['view']==A_Constructs[v_AreaName]['views'][v_Key]){if(!v_Pass){v_Key=parseInt(v_Key);if(v_Key<v_LastKey){v_Key++;v_NextKey=v_Key;}}}}
		$('#'+v_AreaName+'-construct').trigger('show-view',v_NextKey);
	});

	// Function - Close Line
	$('#'+v_AreaName+'-construct').bind('close-line',function(v_Event){
		$('#'+v_AreaName+'-construct #open-line-left').css('width','100%');
		$('#'+v_AreaName+'-construct #open-line-right').css('width',0);
		$('#'+v_AreaName+'-construct #'+v_AreaName+'-open-line').hide();
	});

	// Function - Expand
	$('#'+v_AreaName+'-construct').bind('expand',function(v_Event){
		A_Constructs[v_AreaName]['size']='expand';
		$('#button-page-list').show();
		$(this)
			.css({'height':A_Constructs[v_AreaName]['expand']['height'],'width':A_Constructs[v_AreaName]['expand']['width']})
			.trigger('update-control-icons')
			.trigger('update-page-buttons')
			.trigger('open-line')
			.trigger('highlight-page');
		F_HighlightMenu('expand',v_AreaName);
		$(this).show();
		$(this).find('#header-text-on').show();
	});

	// Function - Hide Others
	$('#'+v_AreaName+'-construct').bind('hide-others',function(v_Event){for(var v_Key in A_Constructs){if(v_Key!==V_Area){$('#'+v_Key+'-construct').hide();}}});

	// Function - Highlight Page
	$('#'+v_AreaName+'-construct').bind('highlight-page',function(v_Event){
		$('#button-page-list .button-Y-2').removeClass('button-Y-2').addClass('button-Y-35');
		$('#button-page-list #page-button-'+A_Constructs[v_AreaName]['page-data']['current-page']).removeClass('button-Y-35').addClass('button-Y-2');
	});

	// Function - Highlight Target
	$('#'+v_AreaName+'-construct').bind('highlight-target',function(v_Event){
		var a_Data=A_Constructs[v_AreaName]['data'];
		var v_Target=A_Constructs[v_AreaName]['target'];
		$('#'+v_AreaName+'-construct .open-line').removeClass('open-line').addClass('button-Y-35');
		$('#'+v_AreaName+'-line-'+v_Target).removeClass('button-Y-35').addClass('open-line');
		$('#'+v_AreaName+'-construct #open-line-right').html(F_CloneOpenLineAndInsertData(v_AreaName,a_Data[v_Target]));
		v_Target++;
		$('#'+v_AreaName+'-construct #list-population').html(v_Target);
	});

	// Function - Open Line
	$('#'+v_AreaName+'-construct').bind('open-line',function(v_Event){
		$('#'+v_AreaName+'-construct #open-line-left').css('width',580);
		$('#'+v_AreaName+'-construct #open-line-right').css('width',380);
		$('#'+v_AreaName+'-open-line').show();
	});

	// Function - Display Items
	$('#'+v_AreaName+'-construct').bind('display-items',function(v_Event){
		A_Constructs[v_AreaName]['target']=0;
		$('#'+v_AreaName+'-construct').trigger('change-header','ready');
		var a_Data=F_PullDataFromList(v_AreaName);
		var v_ViewName='';
		for(var v_Key in A_Constructs[v_AreaName]['views']){
			v_ViewName=A_Constructs[v_AreaName]['views'][v_Key];
			$('#'+v_AreaName+'-construct #'+v_ViewName+'-data').html('');
			for(var v_SecondKey in a_Data){
				$('#'+v_AreaName+'-construct #'+v_ViewName+'-data').append(F_CloneLineAndInsertData(v_AreaName,v_ViewName,a_Data[v_SecondKey]));
			}
		}
	});

	// Function - Request Blind URL
	$('#'+v_AreaName+'-construct').bind('request-blind-URL',function(v_Event){
		if(A_Constructs[v_AreaName]['status']=='ready'){
			A_Constructs[v_AreaName]['status']='loading';
			$('#'+v_AreaName+'-construct').trigger('change-header','loading');
			$('#button-page-list').fadeTo(0,0.35);
		}
		A_Constructs[v_AreaName]['target']=0;
		var v_Action='';
		var a_CurrentlyStoredInformation=$.parseJSON(localStorage.getItem(v_AreaName+'-items'));
		for(var v_Key in A_ItemsToDisplay[v_AreaName]){
			if(!a_CurrentlyStoredInformation[A_ItemsToDisplay[v_AreaName][v_Key]]['name']){
				v_Action+=((v_Action!=='')?'|':'')+A_ItemsToDisplay[v_AreaName][v_Key];
			}
		}
		$.getJSON('/quick/request-items/'+v_Action,function(o_JSON){
			switch(o_JSON['switch']){
				case 'data':
					//alert('!');
					return;
					A_Constructs[v_AreaName]['status']='ready';
					A_Constructs[v_AreaName]['header']['ready']['text']=o_JSON['header'];
					A_Constructs[v_AreaName]['data']=o_JSON['data'];
					A_Constructs[v_AreaName]['page-data']=o_JSON['page'];
					A_Constructs[v_AreaName]['previous-page']=0;
					$('#'+v_AreaName+'-construct #list-population-total').html(o_JSON['page']['total-records']);
					if(F_ArrayKeyExists('list-ID',o_JSON)){A_Constructs[v_AreaName]['list-ID']=o_JSON['list-ID'];}
					$('#'+v_AreaName+'-construct').trigger('change-header',A_Constructs[v_AreaName]['status']).trigger('append-data');
					$('#button-page-list').fadeTo(0,1.00);
					if(A_Constructs[v_AreaName]['size']=='expand'){$('#'+v_AreaName+'-construct').trigger('change-page',o_JSON['page']['current-page']);}else{$('#'+v_AreaName+'-construct').trigger('highlight-target');}
					if(o_JSON['alias']=='materials'){F_RequestMaterialLists();}
					break;
				case '':default:
					break;
			}
		});
		return;
		if(A_Constructs[v_AreaName]['status']=='ready'){
			A_Constructs[v_AreaName]['status']='loading';
			$('#'+v_AreaName+'-construct').trigger('change-header','loading');
			$('#button-page-list').fadeTo(0,0.35);
		}
		A_Constructs[v_AreaName]['target']=0;
		$.getJSON(A_Constructs[v_AreaName]['blind-URL'],function(o_JSON){
			switch(o_JSON['switch']){
				case 'data':
					A_Constructs[v_AreaName]['status']='ready';
					A_Constructs[v_AreaName]['header']['ready']['text']=o_JSON['header'];
					A_Constructs[v_AreaName]['data']=o_JSON['data'];
					A_Constructs[v_AreaName]['page-data']=o_JSON['page'];
					A_Constructs[v_AreaName]['previous-page']=0;
					$('#'+v_AreaName+'-construct #list-population-total').html(o_JSON['page']['total-records']);
					if(F_ArrayKeyExists('list-ID',o_JSON)){A_Constructs[v_AreaName]['list-ID']=o_JSON['list-ID'];}
					$('#'+v_AreaName+'-construct').trigger('change-header',A_Constructs[v_AreaName]['status']).trigger('append-data');
					$('#button-page-list').fadeTo(0,1.00);
					if(A_Constructs[v_AreaName]['size']=='expand'){$('#'+v_AreaName+'-construct').trigger('change-page',o_JSON['page']['current-page']);}else{$('#'+v_AreaName+'-construct').trigger('highlight-target');}
					if(o_JSON['alias']=='materials'){F_RequestMaterialLists();}
					break;
				case '':default:
					break;
			}
		});
	});

	// Function - Select From List
	$('#'+v_AreaName+'-construct').bind('select-from-list',function(v_Event){
		$('#black-screen').show();
		var v_X=$(this).offset().left-16;
		var v_Y=$(this).offset().top-5;
		$('#list-changer-lines').html(F_GetListChangerHTML('list-changer',A_MaterialLists,4));
		$('#list-changer').css('left',v_X).css('top',v_Y).show();
		//$('#list-options-lines').html(F_GetListOptionsHTML('list-options',A_MaterialLists,4));
		$('#list-options').css('left',v_X+333).css('top',v_Y).show();
		F_ChangeListLine();
	});

	// Function - Show Or Hide
	$('#'+v_AreaName+'-construct').bind('show-or-hide',function(v_Event,v_Mode){switch(v_Mode){case 'hide':$(this).hide();break;default:case 'show':$(this).show();break;}});

	// Function - Show Others
	$('#'+v_AreaName+'-construct').bind('show-others',function(v_Event){for(var v_Key in A_Constructs){if(A_Constructs[v_Key]['viewable-at-home']){$('#'+v_Key+'-construct').show();}}});

	// Function - Show View
	$('#'+v_AreaName+'-construct').bind('show-view',function(v_Event,v_NextKey){
		$('#'+v_AreaName+'-construct #'+A_Constructs[v_AreaName]['view']+'-data').hide();
		A_Constructs[v_AreaName]['view']=A_Constructs[v_AreaName]['views'][v_NextKey];
		$('#'+v_AreaName+'-construct #'+A_Constructs[v_AreaName]['view']+'-data').show();
	});

	// Function - Shrink
	$('#'+v_AreaName+'-construct').bind('shrink',function(v_Event){
		$('#button-page-list').hide();
		A_Constructs[v_AreaName]['size']='shrink';
		$(this)
			.css({'height':A_Constructs[v_AreaName]['shrink']['height'],'width':A_Constructs[v_AreaName]['shrink']['width']})
			.trigger('update-control-icons')
			.trigger('close-line');
		if(A_Constructs[v_AreaName]['show-header-text-while-shrunk']){$(this).find('#header-text-on').show();}else{$(this).find('#header-text-on').hide();}
	});

	// Function - Shrink All
	$('#'+v_AreaName+'-construct').bind('shrink-all',function(v_Event){
		for(var v_Key in A_Constructs){if(A_Constructs[v_Key]['size']=='expand'){$('#'+v_Key+'-construct').trigger('shrink');}}
		F_HighlightMenu('shrink',v_AreaName);
	});

	// Function - Update Control Icons
	$('#'+v_AreaName+'-construct').bind('update-control-icons',function(v_Event){
		if(!A_Constructs[v_AreaName]['show-list-button']){$('#'+v_AreaName+'-construct #list-button').replaceWith('');}
		$('#'+v_AreaName+'-construct #control-icons img').each(function(){
			var v_ControlName=$(this).attr('id').replace('control-','');
			switch(v_ControlName){
				case 'views':if(A_Constructs[v_AreaName]['views'].length>1){$(this).show();}else{$(this).hide();}break;
				case 'expand':case 'shrink':if(A_Constructs[v_AreaName]['size']==v_ControlName){$(this).hide();}else{$(this).show();}break;
				default:break;
			}
		});
	});

	// Function - Update Page Buttons
	$('#'+v_AreaName+'-construct').bind('update-page-buttons',function(v_Event){
		var v_CurrentPage=A_Constructs[v_AreaName]['page-data']['current-page'];
		var v_TotalPages=A_Constructs[v_AreaName]['page-data']['total-pages'];
		var a_PageButtons={'first':1,'spacer-A':-1,'previous':(v_CurrentPage-1),'current':v_CurrentPage,'next':(v_CurrentPage+1),'spacer-B':-1,'last':v_TotalPages};

		if(a_PageButtons['first']<a_PageButtons['previous']){if((a_PageButtons['first']+1)<a_PageButtons['previous']){a_PageButtons['spacer-A']=0;}
		}else{a_PageButtons['previous']=-1;if(a_PageButtons['first']==a_PageButtons['current']){a_PageButtons['current']=-1;}}

		if(a_PageButtons['next']<a_PageButtons['last']){if((a_PageButtons['next']+1)<a_PageButtons['last']){a_PageButtons['spacer-B']=0;}
		}else{a_PageButtons['next']=-1;if(a_PageButtons['last']==a_PageButtons['current']){a_PageButtons['current']=-1;}}

		if(a_PageButtons['first']==a_PageButtons['last']){a_PageButtons['last']=-1;}

		$('#button-page-list').html($('<div/>',{'class':'font-I','css':{'float':'left','font-size':10,'letter-spacing':-1,'margin-right':1},'html':'page'}));
		for(var v_Key in a_PageButtons){
			if(a_PageButtons[v_Key]>0){
				$('#button-page-list').append(
					$('<div/>',{
						'id':'page-button-'+a_PageButtons[v_Key],
						'class':'button-Y-35 shadow-or-light-X-down',
						'css':{'float':'left','height':13,'margin-left':2,'text-align':'center','width':20},
						'html':a_PageButtons[v_Key],
						click:function(){$('#'+v_AreaName+'-construct').trigger('change-page',parseInt($(this).attr('id').replace('page-button-','')));}
					})
				);
			}else if(a_PageButtons[v_Key]==0){
				$('#button-page-list').append($('<div/>',{'class':'font-I','css':{'float':'left','font-size':10,'text-align':'center','width':24},'html':'...'}));
			}
		}
	});
	
	if(A_Constructs[v_AreaName]['views'].length>1){$('#'+v_AreaName+'-construct').find('#control-views').live('click',function(v_Event){$('#'+v_AreaName+'-construct').trigger('change-view');});}

	$('#'+v_AreaName+'-construct').find('#control-expand').live('click',function(v_Event){$('#'+v_AreaName+'-construct').trigger('expand');});
	$('#'+v_AreaName+'-construct').find('#control-shrink').live('click',function(v_Event){$('#'+v_AreaName+'-construct').trigger('shrink-all');});

	$('#'+v_AreaName+'-construct').find('#button-list-selector').live('click',function(v_Event){$('#'+v_AreaName+'-construct').trigger('select-from-list');});
	$('#'+v_AreaName+'-construct').find('#button-list-previous').live('click',function(v_Event){var v_PreviousListKey=V_CurrentListKey;V_CurrentListKey--;if(V_CurrentListKey<0){V_CurrentListKey=V_LastListKey;}F_RequestMaterialList();});
	$('#'+v_AreaName+'-construct').find('#button-list-next').live('click',function(v_Event){var v_PreviousListKey=V_CurrentListKey;V_CurrentListKey++;if(V_CurrentListKey>V_LastListKey){V_CurrentListKey=0;}F_RequestMaterialList();});

	$('#'+v_AreaName+'-construct').find('[id|="'+v_AreaName+'-line"]').live('click',function(v_Event){
		var v_Target=parseInt($(this).attr('id').replace(v_AreaName+'-line-',''));
		if(v_Target!==A_Constructs[v_AreaName]['target']){
			A_Constructs[v_AreaName]['target']=v_Target;
			$('#'+v_AreaName+'-construct').trigger('highlight-target').trigger('expand');
		}else if(A_Constructs[v_AreaName]['size']=='shrink'){
			$('#'+v_AreaName+'-construct').trigger('highlight-target').trigger('expand');
		}
	});

	$('#'+v_AreaName+'-construct')
		.trigger('change-header',A_Constructs[v_AreaName]['status'])
		.trigger(A_Constructs[v_AreaName]['size'])
		.trigger('update-control-icons')
		.trigger('show-or-hide',A_Constructs[v_AreaName]['visibility']);
		//.trigger('display-list');
		//.trigger('request-blind-URL');
}
function F_CloneConstructs(a_Constructs){for(var v_Key in a_Constructs){F_CloneConstruct(a_Constructs[v_Key]);}}
function F_CloneOpenLineAndInsertData(v_AreaName,a_Data){
	var o_OpenLine=$('#open-line-template').clone().attr('id',v_AreaName+'-open-line');
	o_OpenLine.find('[id|="replace"]').each(function(v_Event){
		var v_ReplaceKey=$(this).attr('id').replace('replace-','');
		if(F_ArrayKeyExists(v_ReplaceKey,A_Constructs[v_AreaName]['open-line-replace'])){
			var v_Value=a_Data[A_Constructs[v_AreaName]['open-line-replace'][v_ReplaceKey]];
			switch($(this).attr('name')){
				case 'credit-icon':
					switch(v_AreaName){
						case 'materials':case 'news':$(this).attr('src','http://cdn1.lapcat.org/fugue/icons/user-small.png');$(this).show();break;
						case 'events':$(this).attr('src','http://cdn1.lapcat.org/fugue/icons/building-small.png');$(this).show();break;
						case 'home':default:break;
					}
					break;
				case 'fade-on-zero':if(v_AreaName=='materials'){if(v_Value>0){$(this).fadeTo(0,1.00);}else{$(this).fadeTo(0,0.35);}}break;
				case 'image-L':F_RequestSingleImage('L',A_Constructs[v_AreaName]['data'][A_Constructs[v_AreaName]['target']]['ISBNorSN'].replace(/ /g,''),'#'+v_AreaName+'-open-line #replace-'+v_ReplaceKey,337,237);break;
				case 'show':$(this).show();break;
				case 'normal-blank':var v_Value=a_Data[A_Constructs[v_AreaName]['open-line-replace'][v_ReplaceKey]];if(v_Value==''){break;}else{$(this).attr('class','font-X');}
				case 'normal':default:$(this).html(v_Value);break;
			}
		}
	});
	return o_OpenLine;
}
function F_HighlightMenu(v_Mode,v_AreaName){
	if(v_Mode!=='expand'){$('#'+v_AreaName+'-construct').trigger('show-others');}
	$('#menu-'+V_Area).removeClass('button-gold').addClass('menu-Y-35');
	V_Area=((v_Mode=='expand')?v_AreaName:'home');
	$('#menu-'+V_Area).removeClass('menu-Y-35').addClass('button-gold');
	if(v_Mode=='expand'){$('#'+v_AreaName+'-construct').trigger('hide-others');}
}
function F_RequestImage(v_View,a_Data,v_Size,v_Target,v_Destination){
	var a_Images=Array();
	var v_Pass=true;
	for(var v_Key in a_Data){
		if(v_Target>=0){if(v_Key==v_Target){v_Pass=true;}else{v_Pass=false;}}
		if(v_Pass){
			a_Images[v_Key]=$('<img/>');
			if(v_View=='list'){a_Images[v_Key].addClass('show-cover');}
			a_Images[v_Key].attr('src','http://cdn1.lapcat.org/coverCache/imageFetch.php?isbn='+a_Data[v_Key]['ISBNorSN'].replace(/ /g,'')+'&size='+v_Size);
			a_Images[v_Key].attr('id',v_View+'-cover-'+v_Key);
			$('#image-holder').append(a_Images[v_Key]);
			a_Images[v_Key].bind('load',function(){
				if($(this).height()>1){
					var v_Width=$(this).width();
					var v_Height=$(this).height();
					if(v_View=='very-small-image'||v_View=='small-image'||v_View=='large-image'){
						v_GoalWidth=36;
						v_GoalHeight=42;
						if(v_View=='large-image'){
							v_GoalWidth=237;
							v_GoalHeight=337;
						}else if(v_View=='small-image'){
							v_GoalWidth=108;
							v_GoalHeight=126;
						}
						var v_Counter=19;
						while(v_Width>=v_GoalWidth||v_Height>=v_GoalHeight){
							v_Width=Math.floor($(this).width()*(0.05*v_Counter));v_Counter--;
							v_Height=Math.floor($(this).height()*(0.05*v_Counter));v_Counter--;
						}
					}
					$(this).height(v_Height);
					$(this).width(v_Width);
					if(v_Destination){$('#'+v_Destination).html($(this).clone());}else{$('#on-screen-'+$(this).attr('id')).replaceWith($(this).clone());}
				}
			}).each(function(){if(this.complete){$(this).trigger('load');}});
		}
	}
}
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
$('.menu-move-click').live('click',function(){
	var v_AreaName=$(this).attr('id').replace('menu-','');
	$('#'+((v_AreaName=='home')?V_Area:v_AreaName)+'-construct').trigger(((v_AreaName=='home')?'shrink-all':'expand'));
	return false;
});
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
var A_ElementsOnScreen=new Array();
var V_CurrentListKey=0;
var V_LastListKey=0;
var V_MaterialListKey=0;
function F_AddElements(a_Elements){
	for(var v_Key in a_Elements){
		A_ElementsOnScreen[a_Elements[v_Key]]=false;
		switch(a_Elements[v_Key]){
			case 'black-screen':
				$('<div/>',{
					'id':'black-screen',
					'class':'color-K-3 image-lines',
					'css':{'display':'none','height':'100%','left':0,'position':'fixed','top':0,'width':'100%','z-index':45}
				}).click(function(){F_CloseBlackScreen();return false;})
				.appendTo('body');
				break;
			case 'list-changer':case 'list-options':
				var v_ShowArrows=false;
				if(a_Elements[v_Key]=='list-changer'){v_ShowArrows=true;}
				$('<div/>',{
					'id':a_Elements[v_Key],
					'class':'border-all-I-65 color-X-1 corners-bottom-3 corners-top-3',
					'css':{'display':'none','height':182,'left':0,'position':'absolute','top':0,'width':330,'z-index':50},
					'html':$('<div/>',{
						'css':{'height':180,'padding-left':3,'position':'relative','width':325},
						'html':$('<div/>',{
							'id':a_Elements[v_Key]+'-background',
							'class':'border-all-I-1-35 color-I-4 corners-bottom-3 corners-top-3 shadow-or-light-X-up',
							'css':{'background-position':'0px 1px','height':174,'left':0,'padding':3,'position':'absolute','top':0,'width':322},
							'html':''
						})
					})
				}).appendTo('body');
				$('<div/>',{'id':a_Elements[v_Key]+'-inside','css':{'height':148,'padding-top':2,'width':320}}).appendTo('#'+a_Elements[v_Key]+'-background');
				$('<div/>',{
					'id':a_Elements[v_Key]+'-lines',
					'class':((a_Elements[v_Key]=='list-changer')?'border-all-I-1-65 color-X-1 corners-bottom-3 corners-top-3 shadow-or-light-X-down':'')+' font-fake font-X',
					'css':{'background-position':'0px 111px','height':128,'overflow':'hidden','position':'absolute','top':25,'width':318}
				}).appendTo('#'+a_Elements[v_Key]+'-inside');
				if(v_ShowArrows){
					$('<div/>',{'id':a_Elements[v_Key]+'-top-bar','class':'font-fake font-X','css':{'font-size':12,'height':16,'left':32,'position':'absolute','text-align':'center','top':4,'width':48}}).appendTo('#'+a_Elements[v_Key]+'-inside');
					$('<div/>',{'id':a_Elements[v_Key]+'-top-arrow','class':'button-Y-65 font-fake font-X shadow-or-light-X-down list-changer-up-click','css':{'height':16,'left':139,'position':'absolute','text-align':'center','top':4,'width':48},'html':$('<img/>',{'src':'http://cdn1.lapcat.org/fugue/icons/control-090.png','css':{'height':16,'width':16}})}).appendTo('#'+a_Elements[v_Key]+'-inside');
					$('<div/>',{'id':a_Elements[v_Key]+'-bottom-arrow','class':'button-Y-65 font-fake font-X shadow-or-light-X-down list-changer-down-click','css':{'bottom':4,'height':16,'left':139,'position':'absolute','text-align':'center','width':48},'html':$('<img/>',{'src':'http://cdn1.lapcat.org/fugue/icons/control-270.png','css':{'height':16,'width':16}})	}).appendTo('#'+a_Elements[v_Key]+'-inside');
				}else{
					$('<div/>',{'class':'button-green font-fake font-G shadow-or-light-Y-up','css':{'font-size':12,'height':16,'position':'absolute','left':4,'text-align':'center','top':4,'width':48,'z-index':70},'html':'view'}).click(function(){F_CloseBlackScreen();return false;}).appendTo('#'+a_Elements[v_Key]+'-inside');
				}
				break;
			default:
				break;
		}
	}
}
function F_CloseAllElements(){for(var v_ElementID in A_ElementsOnScreen){F_CloseElement(v_ElementID);}}
function F_CloseBlackScreen(){$('#black-screen').hide();F_CloseAllElements();if(V_MaterialListKey!==V_CurrentListKey){F_RequestMaterialList();}}
function F_CloseElement(v_ElementID){A_ElementsOnScreen[v_ElementID]=false;$('#'+v_ElementID).hide();}
function F_RequestMaterialLists(){
	$.getJSON('/quick/get-material-lists',function(o_JSON){
		switch(o_JSON['switch']){
			case 'data':
				V_MaterialListsCurrentID=o_JSON['list-ID'];
				A_MaterialLists=o_JSON['data'];
				V_MaterialListsEnd=A_MaterialLists.length;
				V_LastListKey=V_MaterialListsEnd-1;
				$('#button-lists').show();
				break;
			default:break;
		}
	});
}
function F_RequestMaterialList(){
	V_MaterialListKey=V_CurrentListKey;
	A_Constructs['materials']['blind-URL']='/quick/get-material-list/'+V_MaterialListKey;
	$('#materials-construct').trigger('request-blind-URL');
}
$('.list-changer-line-click').live('click',function(){
	var v_Key=parseInt($(this).attr('id').replace('list-line-',''));
	if(v_Key==V_CurrentListKey){
		F_CloseBlackScreen();
	}else{
		var v_PreviousListKey=V_CurrentListKey;
		V_CurrentListKey=v_Key;
		if(V_CurrentListKey!==v_PreviousListKey){F_ChangeListLine();}
	}
});
$('.list-changer-up-click').live('click',function(){var v_PreviousListKey=V_CurrentListKey;V_CurrentListKey--;if(V_CurrentListKey<0){V_CurrentListKey=0;}else{F_ChangeListLine();}});
$('.list-changer-down-click').live('click',function(){var v_PreviousListKey=V_CurrentListKey;V_CurrentListKey++;if(V_CurrentListKey>V_LastListKey){V_CurrentListKey=V_LastListKey;}else{F_ChangeListLine();}});
function F_OpenDockable(v_URL){window.open(v_URL);}
function F_OpenHelp(){if(V_AnchoredMessageBoxOnScreen){F_CloseHelp();}else{V_AnchoredMessageBoxOnScreen=true;$('#anchored-box-container').show();$('#anchored-box').animate({'margin-top':0},650,'linear');}}
function F_CloseHelp(){V_AnchoredMessageBoxOnScreen=false;$('#anchored-box').animate({'margin-top':118},650,'linear',function(){$('#anchored-box-container').hide();});}



function F_ProcessRecords(v_AreaName,a_NewOrModifiedRecords){
	var a_OldRecords=$.parseJSON(localStorage.getItem(v_AreaName+'-items'));
	for(var v_Key in a_NewOrModifiedRecords){a_OldRecords[v_Key]=a_NewOrModifiedRecords[v_Key];}
	localStorage.setItem(v_AreaName+'-items',JSON.stringify(a_OldRecords));
}
function F_ProcessTags(v_AreaName,a_Tags){
	var a_TagsByRecordID={};
	var a_TagsByTagID={};
	var v_RecordID=0;
	var v_TagID=0;
	for(var v_Key in a_Tags){
		v_RecordID=a_Tags[v_Key]['ID'];
		v_TagID=a_Tags[v_Key]['tag_ID'];
		if(!F_ArrayKeyExists(v_RecordID,a_TagsByRecordID)){a_TagsByRecordID[v_RecordID]=new Array();}
		a_TagsByRecordID[v_RecordID][a_TagsByRecordID[v_RecordID].length]=v_TagID;
		if(!F_ArrayKeyExists(v_TagID,a_TagsByTagID)){a_TagsByTagID[v_TagID]=new Array();}
		a_TagsByTagID[v_TagID][a_TagsByTagID[v_TagID].length]=v_RecordID;
	}
	localStorage.setItem(v_AreaName+'-tags-by-record-ID',JSON.stringify(a_TagsByRecordID));
	localStorage.setItem(v_AreaName+'-tags-by-tag-ID',JSON.stringify(a_TagsByTagID));
}
function F_PullRecordsFromRecords(a_PulledRecords,a_PulledRecordKeys){
	var a_SiftedRecords=new Array();
	for(var v_Key in a_PulledRecordKeys){
		if(a_PulledRecords[v_Key]){
			a_SiftedRecords[v_Key]=a_PulledRecords[v_Key];
		}
	}
	return a_SiftedRecords;
}
//
//
//
//
var A_ItemsToDisplay=new Array();
var A_Lists=new Array();
var A_MaterialsByTagID=new Array();
//
function F_CreateMaterialSearchArrays(){
	var a_CurrentlyStoredMaterials=$.parseJSON(localStorage.getItem('materials-items'));
	var a_ItemsByTagID=new Array();
	var v_TagID=0;
	for(var v_MaterialID in a_CurrentlyStoredMaterials){
		for(v_Counter=1;v_Counter<=4;v_Counter++){
			v_TagID=parseInt(a_CurrentlyStoredMaterials[v_MaterialID]['tag'+v_Counter+'_id']);
			if(v_TagID>0){
				if(!a_ItemsByTagID[v_TagID]){a_ItemsByTagID[v_TagID]=new Array();}
				a_ItemsByTagID[v_TagID][v_MaterialID]=v_MaterialID;
			}
		}
	}
	A_MaterialsByTagID=a_ItemsByTagID;
}
function F_PerformSearch(v_AreaName){
	var a_Parameters=A_Constructs[v_AreaName]['search-parameters'];
	localStorage.setItem(v_AreaName+'-search-parameters',JSON.stringify(a_Parameters));
	var a_AllItems=$.parseJSON(localStorage.getItem(v_AreaName+'-items'));
	var a_PulledItems=a_AllItems;
	var a_PulledItemKeys=new Array();
	for(var v_Key in a_Parameters){
		if(a_Parameters[v_Key]!==''){
			switch(v_Key){
				case 'date':break;
				case 'search':break;
				case 'sort':break;
				case 'tag':case 'type':
					a_PulledItemIDs=A_MaterialsByTagID[a_Parameters[v_Key]];
					a_PulledItems=F_PullMaterials(a_PulledItemIDs,a_PulledItems);
					for(var v_Key in a_PulledItems){
						$('#destination-content').append('<div style="height:16px; width:100%;"><font class="font-fake font-K">'+a_PulledItems[v_Key]['category']+'</font></div>');
					}
					break;
				default:
					break;
			}
		}
	}
}
function F_PullMaterials(a_PulledItemIDs,a_PulledItems){
	var a_Items=new Array();
	for(var v_Key in a_PulledItemIDs){
		if(a_PulledItems[a_PulledItemIDs[v_Key]]){
			a_Items[a_Items.length]=a_PulledItems[a_PulledItemIDs[v_Key]];
		}
	}
	return a_Items;
}
function F_RequestLists(v_AreaName){
	$.getJSON('/quick/lists/'+v_AreaName,function(o_JSON){
		switch(o_JSON['area']){
			case 'materials':
				A_Lists[o_JSON['area']]=new Array();
				A_Lists[o_JSON['area']]=o_JSON['lists'];
				A_ItemsToDisplay[o_JSON['area']]=A_Lists[o_JSON['area']][0]['ID-list'];
				//F_CloneConstruct(o_JSON['area']);
				break;
			default:
				break;
		}
	});
}



// Function - Process Materials
function F_ProcessMaterials(a_ModifiedMaterials){
	var a_CurrentlyStoredMaterials=$.parseJSON(localStorage.getItem('materials-items'));
	var v_ModifiedMaterialID=0;
	var v_Counter=0;
	for(var v_Key in a_ModifiedMaterials){
		if(v_Counter<4){
			//alert(a_ModifiedMaterials[v_Key]['isbn_sn']);
			v_Counter++;
		}
		v_ModifiedMaterialID=parseInt(a_ModifiedMaterials[v_Key]['id']);
		a_CurrentlyStoredMaterials[v_ModifiedMaterialID]=a_ModifiedMaterials[v_Key];
	}
	localStorage.setItem('materials-items',JSON.stringify(a_CurrentlyStoredMaterials));
	F_CreateMaterialSearchArrays();
}
// Function - Request Items
function F_RequestItems(v_AreaName){
	var v_Date=new Date();
	var v_Stamp=v_Date.getTime();
	var v_Action='/quick/local-storage-items/'+v_AreaName;
	localStorage.clear();
	if(localStorage.getItem(v_AreaName+'-stamp')){
		v_Action+='/'+localStorage.getItem(v_AreaName+'-stamp');
	}else{
		localStorage.setItem(v_AreaName+'-stamp',0);
		localStorage.setItem(v_AreaName+'-items','{}');
		v_Action+='/0';
	}
	$.getJSON(v_Action,function(o_JSON){
		localStorage.setItem(v_AreaName+'-stamp',o_JSON['stamp']);
		switch(o_JSON['area']){
			case 'materials':
				F_ProcessMaterials(o_JSON['items']);
				break;
			default:
				break;
		}
	});
}
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
// Function - Alert Each
function F_AlertEach(a_Data,v_Limit){
	if(!v_Limit){v_Limit=20;}
	var v_Counter=0;
	for(var v_Key in a_Data){
		alert(v_Key+' = '+a_Data[v_Key]);
		if(v_Limit<=v_Counter){return;}else{v_Counter++;}
	}
}
//
// Function - Get List Changer HTML
function F_GetListChangerHTML(v_ElementID,a_Data,v_MaximumLines){
	var o_HTML=$('<div/>',{'css':{'float':'left','width':'100%'}});
	var v_SectionStarts=0;
	var v_TotalLines=a_Data.length;
	var v_SectionEnds=v_TotalLines;
	if(v_SectionEnds>v_MaximumLines){v_SectionEnds=v_MaximumLines-1;}
	if(V_CurrentListKey>0){$('#'+v_ElementID+'-top-arrow').show();}else{$('#'+v_ElementID+'-top-arrow').hide();}
	if(V_CurrentListKey<v_SectionEnds){$('#'+v_ElementID+'-bottom-arrow').show();}else{$('#'+v_ElementID+'-bottom-arrow').hide();}
	$('#'+v_ElementID+'-top-bar').html('<span id="'+v_ElementID+'-current">'+(V_CurrentListKey+1)+'</span><font class="font-I">/</font>'+v_TotalLines);
	o_HTML.html($('<div/>',{
		'id':v_ElementID+'-adjust-inside',
		'css':{'display':'block','height':110,'overflow-y':'hidden','margin-left':19,'margin-top':9,'position':'relative','top':0,'vertical-align':'top','width':320,'z-index':60},
		'html':$('<div/>',{'id':v_ElementID+'-adjustment','css':{'position':'absolute','top':0}})
	}));
	o_HTML.find('#'+v_ElementID+'-adjustment').append(F_GetListLinesHTML(a_Data));
	return o_HTML;
}
//
// Function - Get List Lines HTML
function F_GetListLinesHTML(a_Data){
	var v_HTML=$('<div/>');
	for(var v_Key in a_Data){
		v_HTML.append($('<div/>',{
			'id':'list-line-'+v_Key,
			'class':'button-Y-35 font-X shadow-or-light-Y-down list-changer-line-click',
			'css':{'float':'left','font-size':14,'height':18,'margin':1,'margin-left':2,'margin-right':2,'padding-left':3,'text-align':'left','width':269},
			'html':a_Data[v_Key][1]
		}));
	}
	return v_HTML;
}
//
// Function - Get List Options HTML
function F_GetListOptionsHTML(v_ElementID,a_Data,v_MaximumLines){
	var o_HTML=$('<div/>',{
		'css':{'float':'left','width':'100%'},
		'html':($('<div/>',{
			'id':v_ElementID+'-adjust-text',
			'class':'border-all-I-1-65 color-X-1 corners-bottom-3 corners-top-3 font-X',
			'css':{'display':'block','font-size':14,'height':78,'overflow-y':'hidden','margin-left':2,'margin-top':9,'padding-left':2,'position':'relative','top':0,'vertical-align':'top','width':312,'z-index':60},
			'html':a_Data[V_CurrentListKey][2]
		}))
	});
	var a_Options=[1,2,3];
	var v_Header=false;
	for(var v_Key in a_Options){
		if(F_ArrayKeyExists('option-'+a_Options[v_Key],a_Data[V_CurrentListKey])){
			if(!v_Header){v_Header=true;
				o_HTML.append($('<div/>',{
					'class':'font-italic font-X',
					'css':{'font-size':12,'height':14,'margin':1,'margin-left':2,'margin-right':2,'padding-left':2,'text-align':'left','width':313},
					'html':'Search the catalog for...'
				}));
			}
			o_HTML.append(
				$('<div/>',{
					'id':'option-'+v_Key,
					'class':'button-blue-2 font-fake font-Y shadow-or-light-Y-down browse-link',
					'name':a_Data[V_CurrentListKey]['option-'+a_Options[v_Key]]['URL'],
					'css':{'float':'left','font-size':14,'height':18,'margin':1,'margin-left':2,'margin-right':2,'padding-left':3,'text-align':'center','width':150},
					'html':a_Data[V_CurrentListKey]['option-'+a_Options[v_Key]]['name']
				}
			));
		}
	}
	return o_HTML;
}
//
// Function - Change List Line
function F_ChangeListLine(){alert('!');
	if(V_LastListKey>4){
		if(V_CurrentListKey>0){$('#list-changer-top-arrow').show();}else{$('#list-changer-top-arrow').hide();}
		if(V_CurrentListKey<V_LastListKey){$('#list-changer-bottom-arrow').show();}else{$('#list-changer-bottom-arrow').hide();}
		var v_Top=0;
		if(V_CurrentListKey>4){v_Top=-22*(V_CurrentListKey-4);}
		$('#list-changer-adjustment').css('top',v_Top);
	}else{
		$('#list-changer-top-arrow').hide();
		$('#list-changer-bottom-arrow').hide();
	}
	$('#list-changer-lines .button-gold').removeClass('button-gold font-K').addClass('button-Y-35 font-X');
	$('#list-changer-lines #list-line-'+V_CurrentListKey).removeClass('button-Y-35 font-X').addClass('button-gold font-K');
	$('#list-changer-current').html(V_CurrentListKey+1);
	$('#list-options-lines').html(F_GetListOptionsHTML('list-options',A_MaterialLists,4));
}
//
// Function - Clone Line And Insert Data
function F_CloneLineAndInsertData(v_AreaName,v_ViewName,a_Data){
	var v_CellType='';
	switch(v_ViewName){case 'list':default:v_CellType='line';break;case 'images':v_CellType='image';break;}
	var v_LineDestination=v_AreaName+'-'+v_CellType+'-'+a_Data['counter'];
	var o_Line=$('#'+v_CellType+'-template').clone().attr('id',v_LineDestination);
	for(var v_Key in A_Parameters[v_AreaName]['line-value-replace']){o_Line.find('#replace-'+v_Key).html(A_Parameters[v_AreaName]['line-value-replace'][v_Key]);}
	o_Line.find('[id|="replace"]').each(function(v_Event){
		var v_ReplaceKey=$(this).attr('id').replace('replace-','');
		if(F_ArrayKeyExists(v_ReplaceKey,A_Parameters[v_AreaName]['line-replace'])){
			var v_Value=a_Data[A_Parameters[v_AreaName]['line-replace'][v_ReplaceKey]];
			switch($(this).attr('name')){
				case 'credit-icon':
					switch(v_AreaName){
						case 'materials':case 'news':$(this).attr('src','http://cdn1.lapcat.org/fugue/icons/user-small.png');$(this).show();break;
						case 'events':$(this).attr('src','http://cdn1.lapcat.org/fugue/icons/building-small.png');$(this).show();break;
						case 'home':default:break;
					}
					break;
				case 'credit-word':
					switch(a_Data['category']){
						case '':
						default:
							$(this).html('by');
							break;
					}
					break;
				case 'fade-on-zero':if(parseInt(v_Value)>0){$(this).fadeTo(0,1.00);}else{$(this).fadeTo(0,0.35);}break;
				case 'image-S':F_RequestSingleImage('S',a_Data['ISBNorSN'].replace(/ /g,''),'#'+v_LineDestination+' #replace-'+v_ReplaceKey);break;
				case 'word-at':case 'word-by':$(this).html($(this).attr('name').replace('word-',''));break;
				case 'normal':default:$(this).html(v_Value);break;
			}
		}
	});
	o_Line.show();
	return o_Line;
}
//
// Function - In Array
function F_InArray(v_Value,a_Array){for(var v_Key in a_Array){if(a_Array[v_Key]==v_Value){return true;}}return false;}
//
// Function - Array Key Exists
function F_ArrayKeyExists(v_Key,a_Array){for(var v_ArrayKey in a_Array){if(v_ArrayKey==v_Key){return true;}}return false;}
//
// Function - Pull Data From Storage
function F_PullDataFromStorage(v_AreaName,v_Name,v_ID){var a_StoredData=$.parseJSON(localStorage.getItem(v_AreaName+'-'+v_Name));if(v_ID){return a_StoredData[v_ID];}else{return a_StoredData;}}
//
// Function - Process Data
function F_ProcessData(v_AreaName,v_Name,a_Data){
	var v_ItemName=v_AreaName+'-'+v_Name;
	var a_StoredData=$.parseJSON(localStorage.getItem(v_ItemName));
	switch(v_Name){
		case 'data':case 'list':
			for(var v_Key in a_Data){a_StoredData[a_Data[v_Key]['id']]=a_Data[v_Key];}
			break;
		default:
			for(var v_Key in a_Data){a_StoredData[v_Key]=a_Data[v_Key];}
			break;
	}
	localStorage.setItem(v_ItemName,JSON.stringify(a_StoredData));
}
//
// Function - Return Storage Data
function F_ReturnStorageData(v_AreaName,v_Type){return $.parseJSON(localStorage.getItem(v_AreaName+'-'+v_Type));}
//
// Function - Not Empty
function F_NotEmpty(a_Data){for(var v_Key in a_Data){return true;}return false;}
//
// Array - Parameters
var A_Parameters={
	'hotkeys':{
		'groups':{},
		'line-replace':{'A':'title','B':'description','Z':''},
		'line-value-replace':{},
		'name':'Hotkeys',
		'requests':{
			'hotkeys':{'initialized':false,'access':false,'trigger':false},
		},
		'required-to-display':['hotkeys'],
		'show-control-icons':false,
		'show-header-text-while-shrunk':false,
		'show-list-button':false,
		'show-list-population':false,
		'expand':{'height':462,'width':960},
		'shrink':{'height':198,'width':960},
		'spacer':false,
		'views':['hotkeys']
	},
	'events':{
		'groups':{},
		'line-replace':{'A':'title','B':'location','C':'o_place'},
		'line-value-replace':{},
		'name':'Events',
		'requests':{
			'data':{'initialized':false,'access':false,'trigger':['get-page-information']},
		},
		'required-to-display':['data'],
		'show-control-icons':true,
		'show-header-text-while-shrunk':false,
		'show-list-button':false,
		'show-list-population':true,
		'expand':{'height':548,'width':960},
		'shrink':{'height':286,'width':240},
		'spacer':false,
		'views':['list']
	},
	'materials':{
		'groups':{
			'actors':{},
			'author':{},
			'list':{}
		},
		'line-replace':{'A':'title','B':'credit-word','C':'credit-name','D':'category','E':'category'},
		'line-value-replace':{},
		'name':'Materials',
		'requests':{
			'data':{'initialized':false,'access':false,'trigger':false},
			'list':{'initialized':false,'access':false,'trigger':['pull-groups','perform-list-operations']},
			'actor':{'initialized':false,'access':false,'trigger':false},
			'actors':{'initialized':false,'access':false,'trigger':['gather-actors']},
			'author':{'initialized':false,'access':false,'trigger':['save-as-group']}
		},
		'required-to-display':['data','list','actor','actors','author'],
		'show-control-icons':true,
		'show-header-text-while-shrunk':true,
		'show-list-button':true,
		'show-list-population':true,
		'expand':{'height':462,'width':960},
		'shrink':{'height':198,'width':960},
		'spacer':true,
		'views':['list','images']
	}
}
//
// Array - Class Sets
var A_ClassSets={
	'header':{'loading':{'class':'font-I font-italic','text':'Loading...'},'ready':{'class':'font-X','text':''}}
}
//
// Function - Gather List Keys
function F_GatherListKeys(a_Items){var a_Keys=new Array();for(var v_Key in a_Items){a_Keys[a_Keys.length]=v_Key;}return a_Keys;}
//
// Function - Storage Key Exists
function F_StorageKeyExists(v_Key){return ((localStorage.getItem(v_Key))?true:false);}
//
// Function - Pull Data From Storage By Group
function F_PullDataFromStorageByGroup(v_AreaName,a_IDs){
	var a_Data=new Array();
	var a_StoredData=$.parseJSON(localStorage.getItem(v_AreaName+'-data'));
	var v_ID=0;
	for(var v_Key in a_IDs){
		v_ID=a_IDs[v_Key];
		a_Data[v_Key]=a_StoredData[v_ID];
	}
	return a_Data;
}
//
// Function - Pull Value From Group
function F_PullValueFromGroup(v_AreaName,v_Group,v_Key,v_SecondaryKey){
	var a_StoredData=$.parseJSON(localStorage.getItem(v_AreaName+'-'+v_Group));
	return a_StoredData[v_Key][v_SecondaryKey];
}
//
// Function - Pull List Header
function F_PullListHeader(v_AreaName,v_ListID){
	var a_StoredData=$.parseJSON(localStorage.getItem(v_AreaName+'-list'));
	return a_StoredData[v_ListID]['name'];
}
//
// Function - Create Area Construct
function F_CreateAreaConstruct(v_AreaName){
	var a_Parameters={
		'current-page':1,
		'current-record':0,
		'display-status':false,
		'display-status-text':'loading',
		'groups':A_Parameters[v_AreaName]['groups'],
		'header':{
			'loading':{'class':'font-I font-italic','text':'Loading...'},
			'ready':{'class':'font-X','text':''}
		},
		'HTML-holder':'',
		'list-keys':new Array(),
		'previous-list-counter':0,
		'requests':A_Parameters[v_AreaName]['requests'],
		'selected-list':0,
		'selected-list-counter':0,
		'selected-view':0,
		'size':'shrink',
		'total-pages':0,
		'total-records':0,
		'view-name':A_Parameters[v_AreaName]['views'][0],
		'visible':true
	};
	// Clone Construct Template
	var o_Area=$('#construct-template').clone().attr('id',v_AreaName+'-construct').appendTo('#destination-content');
	$('#'+v_AreaName+'-construct #header-area-icon-'+v_AreaName).show();
	if(A_Parameters[v_AreaName]['spacer']){o_Area.css({'margin-bottom':16});}


	// F U N C T I O N S

	// Function - Get Page Information
	$('#'+v_AreaName+'-construct').bind('get-page-information',function(a_Event,a_Data){
	});

	// Function - Initialize Storage
	$('#'+v_AreaName+'-construct').bind('initialize-storage',function(a_Event){
		for(var v_Key in a_Parameters['requests']){
			if(!a_Parameters['requests'][v_Key]['initialized']){
				a_Parameters['requests'][v_Key]['initialized']=true;
				// Check to see if item exists in storage.
				if(!F_StorageKeyExists(v_AreaName+'-'+v_Key)){
					// Initialize the item in storage if it does not exist.
					$('#'+v_AreaName+'-construct').trigger('initialize-storage-item',v_Key);
				}else{
					// Flag the item as ready to be used. Check to see if the construct is ready to be displayed.
					$('#'+v_AreaName+'-construct')
						.trigger('cycle-triggers',[v_Key,$.parseJSON(localStorage.getItem(v_AreaName+'-'+v_Key))])
						.trigger('check-display-status',v_Key);
				}
				// Make a request for data based on the saved timestamp. This is 0 for new storage items.
				$('#'+v_AreaName+'-construct').trigger('request-data',[v_Key,localStorage.getItem(v_AreaName+'-'+v_Key+'-stamp')]);
			}
		}
	});

	// Function - Initialize Storage Item
	$('#'+v_AreaName+'-construct').bind('initialize-storage-item',function(a_Event,v_Name){
	 	var v_ItemName=v_AreaName+'-'+v_Name;
		if(!localStorage.getItem(v_ItemName+'-stamp')){
			localStorage.setItem(v_ItemName+'-stamp',0);
			localStorage.setItem(v_ItemName,'{}');
		}
	});

	// Function - Request Data
	$('#'+v_AreaName+'-construct').bind('request-data',function(a_Event,v_Name,v_Stamp){
		var v_ItemName=v_AreaName+'-'+v_Name;
		$.getJSON('/quick/pull/'+v_AreaName+'/'+v_Name+'/'+v_Stamp,function(o_JSON){
			F_ProcessData(v_AreaName,v_Name,o_JSON['items']);
			localStorage.setItem(v_ItemName+'-stamp',o_JSON['stamp']);
			$('#'+v_AreaName+'-construct')
				.trigger('cycle-triggers',[v_Name,o_JSON['items']])
				.trigger('check-display-status',v_Name);
		});
	});

	// Function - Cycle Triggers
	$('#'+v_AreaName+'-construct').bind('cycle-triggers',function(a_Event,v_Name,a_Data){
		if(a_Parameters['requests'][v_Name]['trigger']){
			for(var v_Key in a_Parameters['requests'][v_Name]['trigger']){
				$('#'+v_AreaName+'-construct').trigger(a_Parameters['requests'][v_Name]['trigger'][v_Key],[v_Name,a_Data]);
			}
		}
	});

	// Function - Check Display Status
	$('#'+v_AreaName+'-construct').bind('check-display-status',function(a_Event,v_Name){
		a_Parameters['requests'][v_Name]['access']=true;
		if(!a_Parameters['display-status']){
			for(var v_Key in A_Parameters[v_AreaName]['required-to-display']){
				if(!a_Parameters['requests'][A_Parameters[v_AreaName]['required-to-display'][v_Key]]['access']){return;}
			}
			a_Parameters['display-status']=true;
			a_Parameters['display-status-text']='ready';
			if(a_Parameters['display-status']&&F_InArray(v_Name,A_Parameters[v_AreaName]['required-to-display'])){$('#'+v_AreaName+'-construct').trigger('display');}
		}
	});

	// Function - Pull Groups
	$('#'+v_AreaName+'-construct').bind('pull-groups',function(a_Event,v_Name,a_Data){
		// Pull array of material IDs from items.
		if(!F_NotEmpty(a_Data)){return;}
		var a_Group=new Array();
		for(var v_Key in a_Data){
			if(F_NotEmpty(a_Data[v_Key]['group'])){
				a_Group[a_Data[v_Key]['id']]=a_Data[v_Key]['group'];
			}
		}
		a_Parameters['groups'][v_Name]=a_Group;
	});

	// Function - Save As Group
	$('#'+v_AreaName+'-construct').bind('save-as-group',function(a_Event,v_Name,a_Data){if(!F_NotEmpty(a_Data)){return;}else{a_Parameters['groups'][v_Name]=a_Data;}});

	// Function - Gathor Actors
	$('#'+v_AreaName+'-construct').bind('gather-actors',function(a_Event,v_Name,a_Data){
		// Gather actors by material ID.
		if(!F_NotEmpty(a_Data)){return;}
		var a_Group=new Array();
		var v_MaterialID=0;
		for(var v_Key in a_Data){
			v_MaterialID=a_Data[v_Key]['material_id'];
			if(!F_ArrayKeyExists(v_MaterialID,a_Group)){a_Group[v_MaterialID]=new Array();}
			a_Group[v_MaterialID][a_Group[v_MaterialID].length]=a_Data[v_Key]['actor_id'];
		}
		a_Parameters['groups']['actors']=a_Group;
	});

	// Function - Perform List Operations
	$('#'+v_AreaName+'-construct').bind('perform-list-operations',function(a_Event,v_Name,a_Items){
		if(F_NotEmpty(a_Items)){
			if(A_Parameters[v_AreaName]['show-list-button']){$('#'+v_AreaName+'-construct #button-lists').show();}
			// Select list to use.
			if(a_Parameters['selected-list']==0){
				// Use selected list from storage if it exists.
				if(F_StorageKeyExists('selected-'+v_AreaName+'-list')){
					if(!F_NotEmpty(a_Parameters['list-keys'])){a_Parameters['list-keys']=F_GatherListKeys(a_Items);}
					a_Parameters['selected-list']=localStorage.getItem('selected-'+v_AreaName+'-list');
					a_Parameters['selected-list-counter']=localStorage.getItem('selected-'+v_AreaName+'-list-counter');
				}
				// At this point, if the selected list is still 0, then randomly select one of the lists.
				if(a_Parameters['selected-list']==0){
					a_Parameters['list-keys']=F_GatherListKeys(a_Items);
					a_Parameters['selected-list-counter']=Math.floor(Math.random()*a_Parameters['list-keys'].length);
					a_Parameters['selected-list']=a_Parameters['list-keys'][a_Parameters['selected-list-counter']];
					localStorage.setItem('selected-'+v_AreaName+'-list',a_Parameters['selected-list']);
					localStorage.setItem('selected-'+v_AreaName+'-list-counter',a_Parameters['selected-list-counter']);
				}
			}
			a_Parameters['header']['ready']['text']=F_PullListHeader(v_AreaName,a_Parameters['selected-list']);
		}
	});

	// Function - Display
	$('#'+v_AreaName+'-construct').bind('display',function(a_Event){
		var v_ViewName=A_Parameters[v_AreaName]['views'][a_Parameters['selected-view']];
		switch(v_ViewName){
			case 'hotkeys':
				var a_StoredData=F_PullDataFromStorage(v_AreaName,v_ViewName,false);
				a_StoredData[a_StoredData.length]={'title':'<font class="font-H">Create Hotkey</font>','code':'create-hotkey','description':'Create a new hotkey.','requires':''};
				break;
			case '':default:
				switch(v_AreaName){
					case 'events':
						var a_StoredData=F_PullDataFromStorage(v_AreaName,'data',false);
						break;
					case '':default:
						var a_StoredData=F_PullDataFromStorageByGroup(v_AreaName,a_Parameters['groups']['list'][a_Parameters['selected-list']]);
						break;
				}
				break;
		}
		$('#'+v_AreaName+'-construct #'+v_ViewName+'-data').html('');
		var a_Data={};
		var v_Counter=0;
		$('#'+v_AreaName+'-construct').trigger('change-header',a_Parameters['display-status-text']);
		if(A_Parameters[v_AreaName]['show-list-population']){$('#'+v_AreaName+'-construct').trigger('update-list-population');}
		for(var v_Key in a_StoredData){
			a_Data=a_StoredData[v_Key];
			a_Data['counter']=v_Counter;
			v_Counter++;
			$('#'+v_AreaName+'-construct')
				.trigger('clone-line-and-insert-data',[v_ViewName,a_Data])
				.find('#'+v_ViewName+'-data').append(a_Parameters['HTML-holder']);
		}
	});

	// Function - Shrink
	$('#'+v_AreaName+'-construct').bind('shrink',function(v_Event){
		$('#button-page-list').hide();
		a_Parameters['size']='shrink';
		$(this).trigger('re-size','shrink')
			.trigger('update-control-icons');
			//.trigger('close-line');
		if(A_Parameters[v_AreaName]['show-header-text-while-shrunk']){$(this).find('#header-text-on').show();}else{$(this).find('#header-text-on').hide();}
	});

	// Function - Expand
	$('#'+v_AreaName+'-construct').bind('expand',function(v_Event){
		alert('!');
		a_Parameters['size']='expand';
		$('#button-page-list').show();
		$(this).trigger('re-size','expand')
			.trigger('update-control-icons');
			//.trigger('update-page-buttons')
			//.trigger('open-line')
			//.trigger('highlight-page');
		//F_HighlightMenu('expand',v_AreaName);
		$(this).show();
		$(this).find('#header-text-on').show();
	});

	// Function - Update List Population
	$('#'+v_AreaName+'-construct').bind('update-list-population',function(){
		if(a_Parameters['selected-list']>0){
			a_Parameters['total-records']=a_Parameters['groups']['list'][a_Parameters['selected-list']].length;
		}else{
			//a_Parameters['total-records']=a_Parameters['groups']['list'][a_Parameters['selected-list']].length;
		}
		a_Parameters['total-pages']=Math.floor(a_Parameters['total-records']/10)+((a_Parameters['total-records']%10>0)?1:0);
		$('#'+v_AreaName+'-construct #list-population').html(a_Parameters['current-page']);
		$('#'+v_AreaName+'-construct #list-population-total').html(a_Parameters['total-pages']);
		$('#button-page-list').fadeTo(0,1.00);
	});

	// Function - Re-Size
	$('#'+v_AreaName+'-construct').bind('re-size',function(v_Event,v_Size){$(this).css({'height':A_Parameters[v_AreaName][v_Size]['height'],'width':A_Parameters[v_AreaName][v_Size]['width']});});

	// Function - Clone Line And Insert Data
	$('#'+v_AreaName+'-construct').bind('clone-line-and-insert-data',function(a_Event,v_ViewName,a_Data){
		var v_CellType='';
		switch(v_ViewName){case 'hotkeys':v_CellType='hotkey';break;case 'images':v_CellType='image';break;case 'list':default:v_CellType='line';break;}
		var v_LineDestination=v_AreaName+'-'+v_CellType+'-'+a_Data['counter'];
		var o_Line=$('#'+v_CellType+'-template').clone().attr('id',v_LineDestination);
		for(var v_Key in A_Parameters[v_AreaName]['line-value-replace']){o_Line.find('#replace-'+v_Key).html(A_Parameters[v_AreaName]['line-value-replace'][v_Key]);}
		o_Line.find('[id|="replace"]').each(function(v_Event){
			var v_ReplaceKey=$(this).attr('id').replace('replace-','');
			if(F_ArrayKeyExists(v_ReplaceKey,A_Parameters[v_AreaName]['line-replace'])){
				var v_Value=a_Data[A_Parameters[v_AreaName]['line-replace'][v_ReplaceKey]];
				switch($(this).attr('name')){
					case 'credit-icon':
						switch(v_AreaName){
							case 'materials':case 'news':$(this).attr('src','http://cdn1.lapcat.org/fugue/icons/user-small.png');$(this).show();break;
							case 'events':$(this).attr('src','http://cdn1.lapcat.org/fugue/icons/building-small.png');$(this).show();break;
							case 'home':default:break;
						}
						break;
					case 'credit-word':
						switch(a_Data['category']){
							case 'DVD':
								$(this).html('starring');
								break;
							default:
								$(this).html('by');
								break;
						}
						break;
					case 'credit-name':
						switch(a_Data['category']){
							case 'Books':
								var v_AuthorID=a_Data['author_id'];
								if(F_ArrayKeyExists(v_AuthorID,a_Parameters['groups']['author'])){
									$(this).html(F_PullValueFromGroup(v_AreaName,'author',v_AuthorID,'name'));
								}
								break;
							case 'DVD':
								if(F_ArrayKeyExists(a_Data['id'],a_Parameters['groups']['actors'])){
									var v_ActorID=0;
									var v_Counter=0;
									for(var v_SecondaryKey in a_Parameters['groups']['actors'][a_Data['id']]){
										var v_ActorID=a_Parameters['groups']['actors'][a_Data['id']][v_SecondaryKey];
										if(v_Counter>0){
											$(this).append(', '+F_PullValueFromGroup(v_AreaName,'actor',v_ActorID,'name'));
										}else{
											$(this).html(F_PullValueFromGroup(v_AreaName,'actor',v_ActorID,'name'));
										}
										v_Counter++;
									}
								}
								break;
							default:
								$(this).html('The credit-name "'+a_Data['category']+'" has not been added yet.');
								break;
						}
						break;
					case 'fade-on-zero':if(parseInt(v_Value)>0){$(this).fadeTo(0,1.00);}else{$(this).fadeTo(0,0.35);}break;
					case 'image-S':F_RequestSingleImage('S',a_Data['ISBNorSN'].replace(/ /g,''),'#'+v_LineDestination+' #replace-'+v_ReplaceKey);break;
					case 'word-at':case 'word-by':$(this).html($(this).attr('name').replace('word-',''));break;
					case 'title':$(this).attr('title',v_Value);break;
					case 'hotkey-list':$(this).html(F_GetHotkeyList(v_AreaName,a_Data['code'],a_Data['requires']));break;
					case 'normal':default:$(this).html(v_Value);break;
				}
			}
		});
		o_Line.show();
		a_Parameters['HTML-holder']=o_Line;
	});

	// Function - Update Control Icons
	$('#'+v_AreaName+'-construct').bind('update-control-icons',function(v_Event){
		if(!A_Parameters[v_AreaName]['show-list-button']){$('#'+v_AreaName+'-construct #list-button').replaceWith('');}
		if(!A_Parameters[v_AreaName]['show-control-icons']){return;}
		$('#'+v_AreaName+'-construct #control-icons').show();
		$('#'+v_AreaName+'-construct #control-icons img').each(function(){
			var v_ControlName=$(this).attr('id').replace('control-','');
			switch(v_ControlName){
				case 'views':if(A_Parameters[v_AreaName]['views'].length>1){$(this).show();}else{$(this).hide();}break;
				case 'expand':case 'shrink':if(a_Parameters['size']==v_ControlName){$(this).hide();}else{$(this).show();}break;
				default:break;
			}
		});
	});

	// Click Function - Button List Previous
	$('#'+v_AreaName+'-construct').find('#button-list-previous').live('click',function(a_Event){
		// Decrease selected list counter by 1.
		a_Parameters['selected-list-counter']--;
		if(a_Parameters['selected-list-counter']<0){a_Parameters['selected-list-counter']=(a_Parameters['list-keys'].length-1);}
		// Change selected list.
		a_Parameters['selected-list']=a_Parameters['list-keys'][a_Parameters['selected-list-counter']];
		localStorage.setItem('selected-'+v_AreaName+'-list',a_Parameters['selected-list']);
		localStorage.setItem('selected-'+v_AreaName+'-list-counter',a_Parameters['selected-list-counter']);
		a_Parameters['header']['ready']['text']=F_PullListHeader(v_AreaName,a_Parameters['selected-list']);
		$('#'+v_AreaName+'-construct').trigger('display');
	});

	// Click Function - Button List Next
	$('#'+v_AreaName+'-construct').find('#button-list-next').live('click',function(a_Event){
		// Increase selected list counter by 1.
		a_Parameters['selected-list-counter']++;
		if(a_Parameters['selected-list-counter']>=(a_Parameters['list-keys'].length)){a_Parameters['selected-list-counter']=0;}
		// Change selected list.
		a_Parameters['selected-list']=a_Parameters['list-keys'][a_Parameters['selected-list-counter']];
		localStorage.setItem('selected-'+v_AreaName+'-list',a_Parameters['selected-list']);
		localStorage.setItem('selected-'+v_AreaName+'-list-counter',a_Parameters['selected-list-counter']);
		a_Parameters['header']['ready']['text']=F_PullListHeader(v_AreaName,a_Parameters['selected-list']);
		$('#'+v_AreaName+'-construct').trigger('display');
	});

	// Function - Change Header
	$('#'+v_AreaName+'-construct').bind('change-header',function(a_Event,v_Mode){
		if(v_Mode=='loading'){$(this).fadeTo(0,0.35);}else{$(this).fadeTo(0,1.00);}
		$(this).find('#header-text').attr('class',a_Parameters['header'][v_Mode]['class']).html(a_Parameters['header'][v_Mode]['text']);
		$(this).find('#header-area-name').html(A_Parameters[v_AreaName]['name']);
	});














	// Function - Show Or Hide
	$('#'+v_AreaName+'-construct').bind('show-or-hide',function(v_Event,v_Visible){switch(v_Visible){case false:$(this).hide();break;default:case true:$(this).show();break;}});

	$('#'+v_AreaName+'-construct').bind('change-list-html',function(v_Event,a_Items){
		var o_HTML=$('<div/>',{'css':{'float':'left','width':'100%'}});
		var v_SectionStarts=0;
		var v_TotalLines=a_Items[1].length;
		var v_SectionEnds=v_TotalLines;
		if(v_SectionEnds>a_Items[2]){v_SectionEnds=a_Items[2]-1;}
		if(a_Parameters['selected-list-counter']>0){$('#'+a_Items[0]+'-top-arrow').show();}else{$('#'+a_Items[0]+'-top-arrow').hide();}
		if(a_Parameters['selected-list-counter']<v_SectionEnds){$('#'+a_Items[0]+'-bottom-arrow').show();}else{$('#'+a_Items[0]+'-bottom-arrow').hide();}
		$('#'+a_Items[0]+'-top-bar').html('<span id="'+a_Items[0]+'-current">'+(a_Parameters['selected-list-counter']+1)+'</span><font class="font-I">/</font>'+v_TotalLines);
		o_HTML.html($('<div/>',{
			'id':a_Items[0]+'-adjust-inside',
			'css':{'display':'block','height':110,'overflow-y':'hidden','margin-left':19,'margin-top':9,'position':'relative','top':0,'vertical-align':'top','width':320,'z-index':60},
			'html':$('<div/>',{'id':a_Items[0]+'-adjustment','css':{'position':'absolute','top':0}})
		}));
		o_HTML.find('#'+a_Items[0]+'-adjustment').append(F_GetListLinesHTML(a_Items[1]));
		$('#'+a_Items[0]+'-lines').html(o_HTML);
	});

	//
	// Function - Select From List
	$('#'+v_AreaName+'-construct').bind('select-from-list',function(v_Event){
		$('#black-screen').show();
		var v_X=$(this).offset().left-16;
		var v_Y=$(this).offset().top-5;
		$('#'+v_AreaName+'-construct').trigger('change-list-html',['list-changer',F_ReturnStorageData(v_AreaName,'list'),4]);
		$('#list-changer').css('left',v_X).css('top',v_Y).show();
		//$('#list-options-lines').html(F_GetListOptionsHTML('list-options',F_ReturnStorageData(v_AreaName,'list'),4));
		$('#list-options').css('left',v_X+333).css('top',v_Y).show();
		//F_ChangeListLine();
	});

	// Click Function - Expand
	$('#'+v_AreaName+'-construct').find('#control-expand').live('click',function(a_Event){$('#'+v_AreaName+'-construct').trigger('expand');});

	// Click Function - Shrink
	$('#'+v_AreaName+'-construct').find('#control-shrink').live('click',function(a_Event){$('#'+v_AreaName+'-construct').trigger('shrink');});


	$('#'+v_AreaName+'-construct').find('#button-list-selector').live('click',function(a_Event){
		$('#'+v_AreaName+'-construct').trigger('select-from-list');
	});

	//
	// S T A R T
	$('#'+v_AreaName+'-construct')
		.trigger('initialize-storage')
		.trigger(a_Parameters['size'])
		.trigger('update-control-icons')
		//.trigger('show-or-hide',a_Parameters['visible']);
}
//
// Function - Get Hotkey List
function F_GetHotkeyList(v_AreaName,v_Code,v_RequiredData){
	var v_HTML='';
	switch(v_RequiredData){
		case '':break;
		default:
			v_HTML=v_Code+', '+v_RequiredData;
			break;
	}
	return v_HTML;
}
function F_ClearStorage(){localStorage.clear();alert('cleared');}
//
//
// Function - Get First Keys
function F_GetFirstKeys(a_Records,v_Total){
	var a_RecordKeys=new Array();
	var v_Counter=1;
	for(var v_Key in a_Records){a_RecordKeys[a_RecordKeys.length]=v_Key;v_Counter++;if(v_Counter>v_Total){break;}}
	return a_RecordKeys;
}










//
// Array - Log
var A_Log=new Array();
//
// Array - Hotkey Buttons
var A_HotkeyButtons={
	'databases':'button-orange',
	'events':'button-green',
	'materials':'button-blue',
	'other':'button-blue',
	'news':'button-grey',
	'hours':'button-purple',
	'hiring':'button-black'
};
//
// Function - Add To Log
function F_AddToLog(v_LogText){A_Log[A_Log.length]=v_LogText;}
//
// Function - Show Log
function F_ShowLog(){$('#destination-content').html();for(var v_Key in A_Log){$('<div/>',{'css':{'width':'100%'},'html':v_Key+': '+A_Log[v_Key]}).appendTo('#destination-content');}}
//
// Function - Convert To Array
function F_ConvertToArray(a_Data){var a_Records=new Array();for(var v_Key in a_Data){a_Records[v_Key]=a_Data[v_Key];}return a_Records;}
//
// Function - Add Hotkey
function F_AddHotkey(v_ID){
	var a_Data={
		'area':A_Hotkeys[v_ID]['area'],
		'class':A_Hotkeys[v_ID]['class'],
		'id':v_ID,
		'name':A_Hotkeys[v_ID]['area']+'-'+v_ID,
		'records':new Array(),
		'total-records':0,
		'stamp':0,
		'title':A_Hotkeys[v_ID]['title']
	};
	var a_Parameters={
		'initialized':false,
		'ready':false,
		'visible':true
	};
	// Clone Hotkey
	var v_Template='hotkey';
	switch(a_Data['class']){
		case 'catalog':v_Template='catalog';break;
		default:
			break;
	}
	var o_Hotkey=$('#'+v_Template+'-template').clone().attr('id',a_Data['name']).appendTo('#destination-content').show();

	// L I V E   E V E N T S

	// F U N C T I O N S

	// Function - Request Records
	$('#'+a_Data['name']).bind('request-records',function(){
		F_AddToLog('"'+a_Data['name']+'" has requested records.'); // ADD TO LOG
		$.getJSON('/quick/request/'+a_Data['id']+'/'+a_Data['stamp'],function(o_JSON){
			a_Data['records']=o_JSON['records'];
			a_Data['total-records']=o_JSON['total-records'];
			F_AddToLog('"'+a_Data['name']+'" has received '+(a_Data['total-records'])+' total records.'); // ADD TO LOG
			a_Data['stamp']=o_JSON['stamp'];
			localStorage.setItem(a_Data['name'],JSON.stringify(a_Data));
			$('#'+a_Data['name']).trigger('check-display-status');
		});
	});

	// Function - Check Display Status
	$('#'+a_Data['name']).bind('check-display-status',function(){
		if(!a_Parameters['ready']){
			F_AddToLog('"'+a_Data['name']+'" is now ready.'); // ADD TO LOG
			a_Parameters['ready']=true;
		}else{
			F_AddToLog('"'+a_Data['name']+'" has already been set to ready. Need to compare received records to stored records.'); // ADD TO LOG
			//alert('!');
			// compare to stored data
			return;
		}
		$('#'+a_Data['name']).trigger('insert-data');
	});

	// Function - Insert Data
	$('#'+a_Data['name']).bind('insert-data',function(){
		F_AddToLog('"'+a_Data['name']+'" has inserted data.'); // ADD TO LOG
		$('#'+a_Data['name']+' #title').html(a_Data['title']);
		$('#'+a_Data['name']+' #icon-'+a_Data['area']).show();
		$('#'+a_Data['name']+' #color').addClass(A_HotkeyButtons[a_Data['area']]);
		switch(a_Data['class']){
			case 'catalog':
				break;
			case 'single-click':
			case 'main-list':case 'list':
				var v_Limit=1;
				var v_Type='cell';
				switch(a_Data['class']){
					case 'main-list':v_Limit=2;break;
					case 'list':v_Limit=4;break;
					case 'single-click':v_Type='single';
						case '':default:break;
				}
				var o_Cell='';
				var v_ReplaceKey=0;
				var v_ReplaceType='';
				var v_Data='';
				var a_FirstKeys=F_GetFirstKeys(a_Data['records'],v_Limit);
				for(var v_Key in a_FirstKeys){
					o_Cell=$('#'+v_Type+'-template').clone().attr('id',a_Data['name']+'-'+v_Type+'-'+v_Key);
					o_Cell.find('[id|="replace"]').each(function(a_Event){
						v_ReplaceKey=$(this).attr('id').replace('replace-','');
						v_ReplaceType=$(this).attr('name');
						v_Data=a_Data['records'][a_FirstKeys[v_Key]][v_ReplaceKey];
						switch(v_ReplaceType){
							case 'normal':$(this).html(v_Data);break;
							case '':default:
								break;
						}
					});
					o_Cell.appendTo('#'+a_Data['name']+' #content').show();
				}
				break;
			default:
				break;
		}
	});

	// Function - Start
	$('#'+a_Data['name']).bind('start',function(){
		switch(a_Data['class']){
			case 'main-list':case 'list':case 'single-click':
				a_Parameters['initialized']=true;
				if(!F_StorageKeyExists(a_Data['name'])){
					localStorage.setItem(a_Data['name'],'{}');
				}else{
					a_Data=$.parseJSON(localStorage.getItem(a_Data['name']));
					$('#'+a_Data['name']).trigger('check-display-status');
				}
				$('#'+a_Data['name']).trigger('request-records');
				break;
			case 'other':
			case '':default:
				break;
		}
	});

	//
	// S T A R T
	$('#'+a_Data['name']).trigger('start');
}
//
// Function - Start
function F_Start(){
	// V_LogStatus (created by server)
	// A_Hotkeys (created by server)
	for(var v_Key in A_Hotkeys){F_AddHotkey(v_Key);}
}
//
// S T A R T
$(document).ready(function(){
	//F_AddElements(['black-screen','list-changer','list-options']);
	//$('#interface-content-displays').css({'width':960});
	// F_ClearStorage();
	$('body').append('<div class="border-all-K-1 font-K color-X-1 fake-link" onclick="javascript:F_ClearStorage();" style="position:relative; width:100px; height:40px; float:right; text-align:center; z-index:1000;">CLEAR STORAGE</div><div class="border-all-K-1 font-K color-X-1 fake-link" onclick="javascript:F_ShowLog();" style="position:relative; width:100px; height:40px; float:right; margin-top:2px; text-align:center; z-index:1000;">SHOW LOG</div>');
	F_Start();
	//F_CreateAreaConstruct('events');
	//F_CreateAreaConstruct('hotkeys');
	// //F_CreateAreaConstruct('materials');
	//F_InitializeConstruct('materials');
	////F_CloneConstructs(['materials','events','news','databases']);
	//F_HighlightMenu(((V_Area=='home')?'shrink':A_Constructs[V_Area]['size']),V_Area);
});