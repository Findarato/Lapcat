/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
/*                      */
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
		'line-replace':{'one':'name','two':'credit-word','three':'credit-name','four':'date-words'},
		'line-value-replace':{},
		'lists-requested':false,
		'open-line-replace':{'one':'name','two':'ISBNorSN','three':'summary','four':'credit-word','five':'credit-name','six':'date-words','seven':'available-home','eight':'available-other','nine':'ISBNorSN'},
		'page-data':new Array(),
		'previous-page':0,
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
function F_CloneConstruct(v_AreaName){
	var o_Construct=$('#construct-template').clone().attr('id',v_AreaName+'-construct').appendTo('#destination-content');
	$('#'+v_AreaName+'-construct #header-area-icon-'+v_AreaName).show();
	if(A_Constructs[v_AreaName]['spacer']){o_Construct.css({'margin-bottom':16});}

	$('#'+v_AreaName+'-construct').bind('append-data',function(v_Event){
		var a_Data=A_Constructs[v_AreaName]['data'];
		var v_ViewName='';
		for(var v_Key in A_Constructs[v_AreaName]['views']){
			v_ViewName=A_Constructs[v_AreaName]['views'][v_Key];
			$('#'+v_AreaName+'-construct #'+v_ViewName+'-data').html('');
			for(var v_SecondKey in a_Data){$('#'+v_AreaName+'-construct #'+v_ViewName+'-data').append(F_CloneLineAndInsertData(v_AreaName,v_ViewName,a_Data[v_SecondKey]));}
		}
	});

	$('#'+v_AreaName+'-construct').bind('change-header',function(v_Event,v_Mode){
		if(v_Mode=='loading'){$(this).fadeTo(0,0.35);}else{$(this).fadeTo(0,1.00);}
		$(this).find('#header-text').attr('class',A_Constructs[v_AreaName]['header'][v_Mode]['class']).html(A_Constructs[v_AreaName]['header'][v_Mode]['text']);
		$(this).find('#header-area-name').html(A_Constructs[v_AreaName]['area-name']);
	});

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

	$('#'+v_AreaName+'-construct').bind('change-view',function(v_Event){
		var v_LastKey=(A_Constructs[v_AreaName]['views'].length-1);
		var v_NextKey=0;
		var v_Pass=false;
		for(var v_Key in A_Constructs[v_AreaName]['views']){if(A_Constructs[v_AreaName]['view']==A_Constructs[v_AreaName]['views'][v_Key]){if(!v_Pass){v_Key=parseInt(v_Key);if(v_Key<v_LastKey){v_Key++;v_NextKey=v_Key;}}}}
		$('#'+v_AreaName+'-construct #'+A_Constructs[v_AreaName]['view']+'-data').hide();
		A_Constructs[v_AreaName]['view']=A_Constructs[v_AreaName]['views'][v_NextKey];
		$('#'+v_AreaName+'-construct #'+A_Constructs[v_AreaName]['view']+'-data').show();
	});

	$('#'+v_AreaName+'-construct').bind('close-line',function(v_Event){
		$('#'+v_AreaName+'-construct #open-line-left').css('width','100%');
		$('#'+v_AreaName+'-construct #open-line-right').css('width',0);
		$('#'+v_AreaName+'-construct #'+v_AreaName+'-open-line').hide();
	});

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

	$('#'+v_AreaName+'-construct').bind('hide-others',function(v_Event){for(var v_Key in A_Constructs){if(v_Key!==V_Area){$('#'+v_Key+'-construct').hide();}}});

	$('#'+v_AreaName+'-construct').bind('highlight-page',function(v_Event){
		$('#button-page-list .button-Y-2').removeClass('button-Y-2').addClass('button-Y-35');
		$('#button-page-list #page-button-'+A_Constructs[v_AreaName]['page-data']['current-page']).removeClass('button-Y-35').addClass('button-Y-2');
	});

	$('#'+v_AreaName+'-construct').bind('highlight-target',function(v_Event){
		var a_Data=A_Constructs[v_AreaName]['data'];
		var v_Target=A_Constructs[v_AreaName]['target'];
		$('#'+v_AreaName+'-construct .open-line').removeClass('open-line').addClass('button-Y-35');
		$('#'+v_AreaName+'-line-'+v_Target).removeClass('button-Y-35').addClass('open-line');
		$('#'+v_AreaName+'-construct #open-line-right').html(F_CloneOpenLineAndInsertData(v_AreaName,a_Data[v_Target]));
		v_Target++;
		$('#'+v_AreaName+'-construct #list-population').html(v_Target);
	});

	$('#'+v_AreaName+'-construct').bind('open-line',function(v_Event){
		$('#'+v_AreaName+'-construct #open-line-left').css('width',580);
		$('#'+v_AreaName+'-construct #open-line-right').css('width',380);
		$('#'+v_AreaName+'-open-line').show();
	});

	$('#'+v_AreaName+'-construct').bind('request-blind-URL',function(v_Event){
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
					if(o_JSON['alias']=='materials'){F_RequestLists();}
					break;
				case '':default:
					break;
			}
		});
	});

	$('#'+v_AreaName+'-construct').bind('select-from-list',function(v_Event){
		$('#black-screen').show();
		var v_X=$(this).offset().left-16;
		var v_Y=$(this).offset().top-5;
		$('#list-changer-lines').html(F_GetListChangerHTML('list-changer',A_MaterialLists,4));
		$('#list-changer').css('left',v_X).css('top',v_Y).show();
		$('#list-options-lines').html(F_GetListOptionsHTML('list-options',A_MaterialLists,4));
		$('#list-options').css('left',v_X+333).css('top',v_Y).show();
		F_ChangeListLine();
	});

	$('#'+v_AreaName+'-construct').bind('show-or-hide',function(v_Event,v_Mode){switch(v_Mode){case 'hide':$(this).hide();break;default:case 'show':$(this).show();break;}});

	$('#'+v_AreaName+'-construct').bind('show-others',function(v_Event){for(var v_Key in A_Constructs){if(A_Constructs[v_Key]['viewable-at-home']){$('#'+v_Key+'-construct').show();}}});

	$('#'+v_AreaName+'-construct').bind('shrink',function(v_Event){
		$('#button-page-list').hide();
		A_Constructs[v_AreaName]['size']='shrink';
		$(this)
			.css({'height':A_Constructs[v_AreaName]['shrink']['height'],'width':A_Constructs[v_AreaName]['shrink']['width']})
			.trigger('update-control-icons')
			.trigger('close-line');
		if(A_Constructs[v_AreaName]['show-header-text-while-shrunk']){$(this).find('#header-text-on').show();}else{$(this).find('#header-text-on').hide();}
	});

	$('#'+v_AreaName+'-construct').bind('shrink-all',function(v_Event){
		for(var v_Key in A_Constructs){if(A_Constructs[v_Key]['size']=='expand'){$('#'+v_Key+'-construct').trigger('shrink');}}
		F_HighlightMenu('shrink',v_AreaName);
	});

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
		.trigger('show-or-hide',A_Constructs[v_AreaName]['visibility'])
		.trigger('request-blind-URL');
}
function F_CloneConstructs(a_Constructs){for(var v_Key in a_Constructs){F_CloneConstruct(a_Constructs[v_Key]);}}
function F_CloneLineAndInsertData(v_AreaName,v_ViewName,a_Data){
	var v_CellType='';
	switch(v_ViewName){case 'list':default:v_CellType='line';break;case 'images':v_CellType='image';break;}
	var o_Line=$('#'+v_CellType+'-template').clone().attr('id',v_AreaName+'-'+v_CellType+'-'+a_Data['counter']);
	for(var v_Key in A_Constructs[v_AreaName]['line-value-replace']){o_Line.find('#replace-'+v_Key).html(A_Constructs[v_AreaName]['line-value-replace'][v_Key]);}
	o_Line.find('[id|="replace"]').each(function(v_Event){
		var v_ReplaceKey=$(this).attr('id').replace('replace-','');
		if(F_ArrayKeyExists(v_ReplaceKey,A_Constructs[v_AreaName]['line-replace'])){
			var v_Value=a_Data[A_Constructs[v_AreaName]['line-replace'][v_ReplaceKey]];
			switch($(this).attr('name')){
				case 'credit-icon':
					switch(v_AreaName){
						case 'materials':case 'news':$(this).attr('src','http://cdn1.lapcat.org/fugue/icons/user-small.png');$(this).show();break;
						case 'events':$(this).attr('src','http://cdn1.lapcat.org/fugue/icons/building-small.png');$(this).show();break;
						case 'home':default:break;
					}
					break;
				case 'fade-on-zero':if(parseInt(v_Value)>0){$(this).fadeTo(0,1.00);}else{$(this).fadeTo(0,0.35);}break;
				case 'image-S':
					if(A_Constructs[v_AreaName]['has-images']){
						$('#image-holder').html('');
						$(this).html('').show();
						F_RequestImage('small-image',A_Constructs[v_AreaName]['data'],'S',A_Constructs[v_AreaName]['target'],$(this).attr('id'));
					}else{
						$(this).hide();
					}
					break;
				case 'word-at':case 'word-by':$(this).html($(this).attr('name').replace('word-',''));break;
				case 'normal':default:$(this).html(v_Value);break;
			}
		}
	});
	o_Line.show();
	return o_Line;
}
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
				case 'image-L':
					if(A_Constructs[v_AreaName]['has-images']){
						$('#image-holder').html('');
						$(this).html('').show();
						F_RequestImage('large-image',A_Constructs[v_AreaName]['data'],'L',A_Constructs[v_AreaName]['target'],v_AreaName+'-open-line #replace-two');
					}else{
						$(this).hide();
					}
					break;
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
					if(v_View=='small-image'||v_View=='large-image'){
						v_GoalWidth=36;
						v_GoalHeight=42;
						if(v_View=='large-image'){
							v_GoalWidth=237;
							v_GoalHeight=337;
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
function F_RequestLists(){
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
function F_ArrayKeyExists(v_Key,a_Array){for(var v_ArrayKey in a_Array){if(v_ArrayKey==v_Key){return true;}}return false;}
function F_ChangeListLine(){
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
function F_CloseAllElements(){for(var v_ElementID in A_ElementsOnScreen){F_CloseElement(v_ElementID);}}
function F_CloseBlackScreen(){$('#black-screen').hide();F_CloseAllElements();if(V_MaterialListKey!==V_CurrentListKey){F_RequestMaterialList();}}
function F_CloseElement(v_ElementID){A_ElementsOnScreen[v_ElementID]=false;$('#'+v_ElementID).hide();}
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
function F_GetListLinesHTML(a_Data){
	var v_HTML=$('<div/>');
	for(var v_Key in a_Data){
		v_HTML.append($('<div/>',{
			'id':'list-line-'+v_Key,
			'class':'button-Y-35 font-X shadow-or-light-Y-down list-changer-line-click',
			'css':{'float':'left','font-size':14,'height':18,'margin':1,'margin-left':2,'margin-right':2,'padding-left':3,'text-align':'left','width':269},
			'html':a_Data[v_Key]['name']
		}));
	}
	return v_HTML;
}
function F_GetListOptionsHTML(v_ElementID,a_Data,v_MaximumLines){
	var o_HTML=$('<div/>',{
		'css':{'float':'left','width':'100%'},
		'html':($('<div/>',{
			'id':v_ElementID+'-adjust-text',
			'class':'border-all-I-1-65 color-X-1 corners-bottom-3 corners-top-3 font-X',
			'css':{'display':'block','font-size':14,'height':78,'overflow-y':'hidden','margin-left':2,'margin-top':9,'padding-left':2,'position':'relative','top':0,'vertical-align':'top','width':312,'z-index':60},
			'html':a_Data[V_CurrentListKey]['description']
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
$(document).ready(function(){
	$('#interface-content-displays').css({'width':960});
	F_AddElements(['black-screen','list-changer','list-options']);
	F_CloneConstructs(['materials','events','news','databases']);
	F_HighlightMenu(((V_Area=='home')?'shrink':A_Constructs[V_Area]['size']),V_Area);
});