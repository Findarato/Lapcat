<!--//                     //-->
<!--// objectives-2009.php //-->
<!--//                     //-->
//
//
// ARRAYS
//
//
// VARIABLES
//
var V_RowMx=0;
var V_ColumnMax=0;
//
//
// FUNCTIONS
//
// Function - Make Request
function Fun_MR(v_URL){
	var v_HTTP=false;
	if(window.XMLHttpRequest){v_HTTP=new XMLHttpRequest();if(v_HTTP.overrideMimeType){v_HTTP.overrideMimeType('text/html');}
	}else if(window.ActiveXObject){try{v_HTTP=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{v_HTTP=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}}
	if(!v_HTTP){return false;}
	F_MEHTML('container-main|map','Loading...');
	v_HTTP.onreadystatechange=function f_RC(){
		if(v_HTTP.readyState==4){
			if(v_HTTP.status==200){
				var v_LDM='';
				var v_RT=v_HTTP.responseText;
				var a_RT=v_RT.split('<boom>');
				var v_L=a_RT.length;
				for(v_Lo=0;v_Lo<v_L;v_Lo++){
					var v_T=F_PSXML(a_RT[v_Lo],'name');
					switch(v_T){
						case 'start-ability':F_StartAbility();break;
						case 'start-action':F_StartAction();break;
						case 'start-form':F_StartForm();break;
						case 'start-message':F_StartMessage();break;
						case 'page-info':F_PageInfo(a_RT[v_Lo]);break;
						case 'card-added':F_CardAdded(a_RT[v_Lo]);break;
						case 'ability-list':F_AbilityList(a_RT[v_Lo]);break;
						case 'action-list':F_ActionList(a_RT[v_Lo]);break;
						case 'list':F_List(a_RT[v_Lo]);break;
						case 'map':F_CreateMap(a_RT[v_Lo]);break;
						case 'updates':F_Updates(a_RT[v_Lo]);break;
						default:alert('mow-2009: '+v_T);break;
					}
				}}}};
	v_HTTP.open('GET',v_URL,true);
   	v_HTTP.send(null);
}
//
// Function - Updates
function F_Updates(v_XML){
	F_MEHTML('messages|mow','');
	var a_List=F_B(F_PSXML(v_XML,'value'),'data');
	var v_HTML='';
	var a_I=new Array();
	for(v_K in a_List){
		v_HTML=F_CEIHTML('message|template');
		a_I=F_CXMLA(a_List[v_K]);
		for(v_K in a_I){v_HTML=v_HTML.replace('replace-'+v_K,a_I[v_K]);}
		F_MEHTML('messages|mow',v_HTML,true);
	}
}
//
// Function - List Line
function F_ListLine(a_List,v_HTML){
	for(v_Key in a_List){
		if(v_Key=='GameText'){v_HTML=v_HTML.replace('replace-'+v_Key,F_ConvertValue(v_Key,a_List[v_Key]));
		}else{v_HTML=v_HTML.replace('replace-'+v_Key,F_ConvertValue(v_Key,a_List[v_Key]));}
	}
	return v_HTML;
}
//
// Function - Ability List Line
function F_AbilityListLine(a_List,v_HTML){
	for(v_Key in a_List){
		v_HTML=v_HTML.replace('replace-'+v_Key,F_ConvertValue(v_Key,a_List[v_Key]));
	}
	return v_HTML;
}
//
// Function - Action List Line
function F_ActionListLine(a_List,v_HTML){for(v_Key in a_List){v_HTML=v_HTML.replace('replace-'+v_Key,F_ConvertValue(v_Key,a_List[v_Key]));}return v_HTML;}
//
// Function Convert Value
function F_ConvertValue(v_K,v_D){
	switch(v_K){
		case 'IsUnique':if(parseInt(v_D)==0){v_D='No';}else{v_D='Yes';}break;
		case 'Type':
			switch(parseInt(v_D)){
				case 0:v_D='Scroll';break;
				case 1:v_D='Landmark';break;
				case 2:v_D='Chest';break;
				case 3:v_D='Item';break;
				case 4:v_D='Creature';break;
				default:break;}break;
		case 'Class':
			switch(parseInt(v_D)){
				case 0:v_D='Inanimate';break;
				case 1:v_D='Beast';break;
				case 2:v_D='Warrior';break;
				case 3:v_D='Rogue';break;
				case 4:v_D='Wizard';break;
				case 5:v_D='Cleric';break;
				case 6:v_D='Undead';break;
				default:break;}break;
		case 'AbilityNature':case 'ActionNature':
			switch(parseInt(v_D)){
				case 0:v_D='Defensive';break;
				case 1:v_D='Neutral';break;
				case 2:v_D='Offensive';break;
				default:break;}break;
		case 'ActionType':
			switch(parseInt(v_D)){
				case 0:v_D='Action';break;
				case 1:v_D='Trigger';break;
				default:break;}break;
		case 'Alignment':
			switch(parseInt(v_D)){
				case 0:v_D='Neutral';break;
				case 1:v_D='Good';break;
				case 2:v_D='Evil';break;
				default:break;}break;
		default:break;
	}
	return v_D;
}
//
// Function - Ability List
function F_AbilityList(v_XML){
	var a_I=F_B(F_PSXML(v_XML,'value'),'data');
	var a_L=new Array();
	F_MEHTML('container-main|map',F_CEIHTML('ability-list|header'));
	var v_C=0;
	for(v_K in a_I){
		a_L=F_CXMLA(a_I[v_K]);
		F_MEHTML('container-main|map',F_AbilityListLine(a_L,F_CEIHTML('ability-list|template').replace(/replace-ID/g,a_L['ID'])),true);
		if(v_C==0){document.getElementById('ability-list-line|color|'+a_L['ID']).style.backgroundColor='#FFFFFF';
		}else{document.getElementById('ability-list-line|color|'+a_L['ID']).style.backgroundColor='#DEDEDE';}
		if(v_C==1){v_C--;}else{v_C++;}
	}
}
//
// Function - Action List
function F_ActionList(v_XML){
	var a_I=F_B(F_PSXML(v_XML,'value'),'data');
	var a_L=new Array();
	F_MEHTML('container-main|map',F_CEIHTML('action-list|header'));
	var v_C=0;
	for(v_K in a_I){
		a_L=F_CXMLA(a_I[v_K]);
		F_MEHTML('container-main|map',F_ActionListLine(a_L,F_CEIHTML('action-list|template').replace(/replace-ID/g,a_L['ID'])),true);
		if(v_C==0){document.getElementById('action-list-line|color|'+a_L['ID']).style.backgroundColor='#FFFFFF';
		}else{document.getElementById('action-list-line|color|'+a_L['ID']).style.backgroundColor='#DEDEDE';}
		if(v_C==1){v_C--;}else{v_C++;}
	}
}
//
// Function - List
function F_List(v_XML){
	var a_I=F_B(F_PSXML(v_XML,'value'),'data');
	var a_L=new Array();
	F_MEHTML('container-main|map',F_CEIHTML('list|header'));
	var v_C=0;
	for(v_K in a_I){
		a_L=F_CXMLA(a_I[v_K]);
		F_MEHTML('container-main|map',F_ListLine(a_L,F_CEIHTML('list|template').replace(/replace-ID/g,a_L['ID'])),true);
		if(v_C==0){document.getElementById('list-line|color|'+a_L['ID']).style.backgroundColor='#FFFFFF';
		}else{document.getElementById('list-line|color|'+a_L['ID']).style.backgroundColor='#DEDEDE';}
		if(v_C==1){v_C--;}else{v_C++;}
	}
}
//
// Function - Card Added
function F_CardAdded(v_XML){
	F_MEHTML('container-main|message','Most recent card added: '+F_PSXML(v_XML,'value'));
	Fun_MR('/lapcat/code/mow.php?url=start');
}
//
// Function - Retrieve Messages
function F_RetrieveMessages(){Fun_MR('/lapcat/code/mow.php?url=retrieve-messages/ajax');}
//
// Function - Start Form
function F_StartForm(){F_MEHTML('container-main|map',F_CEIHTML('form|add-card'));}
//
// Function - Start Ability
function F_StartAbility(){F_MEHTML('container-main|map',F_CEIHTML('form|add-ability'));}
//
// Function - Start Action
function F_StartAction(){F_MEHTML('container-main|map',F_CEIHTML('form|add-action'));}
//
// Function - Start Message
function F_StartMessage(){F_MEHTML('container-main|map',F_CEIHTML('form|add-message'));}
//
// Function - Create Map
function F_CreateMap(v_XML){
	F_RetrieveMessages();
	F_MEHTML('container-main|map','');
	F_MEHTML('container-main|mow',F_CEIHTML('map|template'));
	var a_I=F_B(F_PSXML(v_XML,'value'),'map-row');
	var v_Temp='';
	var v_Row=0;
	var v_Column=0;
	for(v_K in a_I){
		var a_R=F_B(F_PSXML(a_I[v_K],'value'),'');
		v_Column=0;
		for(v_Ke in a_R){
			v_Temp=F_CEIHTML('card|template').replace(/replace-X/g,v_Column);
			F_MEHTML('container-main|map',v_Temp.replace(/replace-Y/g,v_Row),true);
			F_MEHTML('card|'+v_Column+'|'+v_Row,v_Column+','+v_Row);
			v_Column++;
		}
		v_Row++;
	}
}
//
// Function - Show Card
function F_SC(v_X,v_Y){
	F_MEHTML('container-right|mow','card|'+v_X+'|'+v_Y);
}
//
// Function - Page Info
function F_PageInfo(v_XML){
	var a_I=F_B(F_PSXML(v_XML,'value'),'');
	V_RowMax=F_PSXML(a_I[0],'value');
	V_ColumnMax=F_PSXML(a_I[1],'value');
	document.getElementById('container-main|map').attributes['style'].value='width:'+V_ColumnMax*68+'px;';
}