<!--//                //-->
<!--// online-2009.js //-->
<!--//                //-->
//
//
// ARRAYS
//
//
// Array - Map
var A_Map=new Array();
//
// Array - Data
var A_Data=new Array();
A_Data['options']=new Array();
A_Data['player']=new Array();
A_Data['copy']=new Array();
//
// Array - Directions
var A_Directions=new Array('up','north','west','east','south','down');
//
// Array - Messages
var A_Messages=new Array();
//
// Array - Movement Types
var A_MovementTypes=new Array();
A_MovementTypes[3]='walk';
A_MovementTypes[4]='run';
A_MovementTypes[5]='sprint';
//
// VARIABLES
//
//
// Variable - Checked Navigation
var V_CheckedNavigation=false;
//
// Variable - Movement Type
var V_MovementType=3;
//
// Variable - Target
var V_Target=0;
//
// FUNCTIONS
//
// Function - Make Request
function F_MR(v_URL){
	V_CheckedNavigation=false;
	var v_HTTP=false;
	if(window.XMLHttpRequest){v_HTTP=new XMLHttpRequest();if(v_HTTP.overrideMimeType){v_HTTP.overrideMimeType('text/html');}
	}else if(window.ActiveXObject){try{v_HTTP=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{v_HTTP=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}}
	if(!v_HTTP){return false;}
	//F_MEHTML('container-main|map','Loading...');
	v_HTTP.onreadystatechange=function f_RC(){
		if(v_HTTP.readyState==4){
			if(v_HTTP.status==200){
				var v_LDM='';
				var v_RT=v_HTTP.responseText;
				var a_RT=v_RT.split('<boom>');
				var v_L=a_RT.length;
				for(v_Lo=0;v_Lo<v_L;v_Lo++){
					var v_T=F_PSXML(a_RT[v_Lo],'name');
					switch(v_T.replace('/','')){
						case 'actions':
							F_Actions(a_RT[v_Lo]);
							break;
						case 'player':
							F_CopyPosition();
						case 'options':
							F_SetData(v_T,a_RT[v_Lo]);
							break;
						case 'active-conditions':
							F_Conditions(a_RT[v_Lo]);
							break;
						case 'map':
							F_SetMapData(a_RT[v_Lo]);
							break;
						case 'message':
							F_DisplayMessage(a_RT[v_Lo]);
							break;
						case 'player-has-moved':
							F_PlayerHasMoved();
							F_CheckNavigation();
							break;
						default:
							alert('online-2009.js: '+v_T);
							break;
					}
				}}}};
	v_HTTP.open('GET',v_URL,true);
   	v_HTTP.send(null);
}
//
// Function - Copy Position
function F_CopyPosition(){
	A_Data['copy']=A_Data['player'];
}
//
// Function - Location Data
function F_PlayerLocation(){return A_Map[A_Data['player']['z']][A_Data['player']['y']][A_Data['player']['x']];}
//
// Function - Check Navigation
function F_CheckNavigation(){
	if(!V_CheckedNavigation){
		V_CheckedNavigation=true;
		var a_Location=F_PlayerLocation();
		for(v_K in A_Directions){
			if(a_Location[A_Directions[v_K]+'-is-blocked']==2){
				$('#N\\|'+A_Directions[v_K]).css('visibility','visible');
			}else{
				$('#N\\|'+A_Directions[v_K]).css('visibility','hidden');
			}
		}
	}
}
//
// Function - Clear Map
function F_ClearMap(){
	A_Map=Array();
	for(v_Z=1;v_Z<=parseInt(A_Data['options']['maximum-z']);v_Z++){
		A_Map[v_Z]=Array();
		for(v_Y=1;v_Y<=parseInt(A_Data['options']['maximum-y']);v_Y++){
			A_Map[v_Z][v_Y]=Array();
			for(v_X=1;v_X<=parseInt(A_Data['options']['maximum-x']);v_X++){
				A_Map[v_Z][v_Y][v_X]=new Array();
			}
		}
	}
}
//
// Function - Perform Action
function F_PerformAction(v_ID,v_Name){
	F_MR('/lapcat/online/online.php?url=continue/'+v_Name.replace(/ /g,'-')+'/'+V_Target+'/ajax');
}
//
// Function - Set Movement
function F_SetMovement(v_Type){
	$('.navigation-button-selected').removeClass('navigation-button-selected').addClass('navigation-button-type');
	switch(v_Type){
		case 3:default:V_MovementType=3;$('#N\\|3').removeClass().addClass('navigation-button-selected');break;
		case 4:case 5:V_MovementType=v_Type;$('#N\\|'+v_Type).removeClass().addClass('navigation-button-selected');break;
	}
}
//
// Function - Set Map Data
function F_SetMapData(v_XML){
	if(A_Map.length==0){F_ClearMap();}
	var a_Layers=F_B(F_PSXML(v_XML,'value'),'layer');
	var a_Rows='';
	var a_Locations='';
	for(v_Z in a_Layers){
		a_Rows=F_B(F_PSXML(a_Layers[v_Z],'value'),'row');
		for(v_Y in a_Rows){
			a_Locations=F_B(F_PSXML(a_Rows[v_Y],'value'),'location');
			for(v_X in a_Locations){
				if(parseInt(v_Z+1)==A_Data['player']['z']){
					F_SetLocationData(parseInt(v_Z)+1,parseInt(v_Y)+1,parseInt(v_X)+1,a_Locations[v_X]);
				}
			}
		}
	}
	F_DrawMap();
	F_CheckNavigation();
}
//
// Function - Move
function F_Move(v_Direction){F_MR('/lapcat/online/online.php?url=continue/'+A_MovementTypes[V_MovementType]+'/'+v_Direction+'/ajax');}
//
// Function - Player Has Moved
function F_PlayerHasMoved(){
	var v_Z=A_Data['player']['z'];
	var v_Y=A_Data['player']['y'];
	var v_X=A_Data['player']['x'];
	var a_Layer=A_Map[v_Z];
	F_MEHTML('D|map|level','Player (z,y,x): '+v_Z+','+v_Y+','+v_X);
	$('.location-player').removeClass('location-player').addClass('location-open');
	$('#'+v_Z+'\\|'+v_Y+'\\|'+v_X).removeClass('location-open').addClass('location-player');
	if(a_Layer[v_Y][v_X]['up-is-blocked']==2&&a_Layer[v_Y][v_X]['down-is-blocked']==2){$('#'+v_Z+'\\|'+v_Y+'\\|'+v_X).addClass('location-ladder-both');
	}else if(a_Layer[v_Y][v_X]['up-is-blocked']==2){$('#'+v_Z+'\\|'+v_Y+'\\|'+v_X).addClass('location-ladder-up');
	}else if(a_Layer[v_Y][v_X]['down-is-blocked']==2){$('#'+v_Z+'\\|'+v_Y+'\\|'+v_X).addClass('location-ladder-down');}
}
//
// Function - Actions
function F_Actions(v_XML){
	var a_Actions=new Array();
	a_Actions=F_B(F_PSXML(v_XML,'value'),'action');
	var a_I=new Array();
	F_MEHTML('D|actions','');
	$('#N\\|3').hide();
	$('#N\\|4').hide();
	$('#N\\|5').hide();
	for(v_K in a_Actions){
		a_I=F_CXMLA(a_Actions[v_K]);
		if(F_InArray(Array(a_I['ID']),Array(3,4,5))){
			$('#N\\|'+a_I['ID']).show();
			if(V_MovementType==a_I['ID']){$('#N\\|'+a_I['ID']).removeClass().addClass('navigation-button-selected');
			}else{$('#N\\|'+a_I['ID']).removeClass().addClass('navigation-button-type');}
		}else{
			F_MEHTML('D|actions',F_CEIHTML('stage|3').replace(/replace-ID/g,a_I['ID']).replace(/replace-name/g,a_I['name']),true);
		}
	}
}
//
// Function - In Array
function F_InArray(a_Search,a_Array){
	var v_InArray=false;
	for(v_Key_A in a_Array){
		for(v_Key_B in a_Search){
			if(a_Search[v_Key_B]==a_Array[v_Key_A]){v_InArray=true;}
		}
	}
	return v_InArray;
}
//
// Function - Conditions
function F_Conditions(v_XML){
	var a_Conditions=new Array();
	a_Conditions=F_B(F_PSXML(v_XML,'value'),'condition');
	var a_I=new Array();
	F_MEHTML('D|conditions','');
	for(v_K in a_Conditions){
		a_I=F_CXMLA(a_Conditions[v_K]);
		F_MEHTML('D|conditions',F_CEIHTML('stage|2').replace(/replace-ID/g,a_I['ID']).replace('replace-name',a_I['name']).replace('replace-description',a_I['description']),true);
	}
}
//
// Function - Draw Map
function F_DrawMap(){
	var v_Z=A_Data['player']['z'];
	var v_Y=A_Data['player']['y'];
	var v_X=A_Data['player']['x'];
	var a_Layer=A_Map[v_Z];
	F_MEHTML('D|map|level','Player Location: '+v_Z+','+v_Y+','+v_X);
	F_MEHTML('D|map|layer','');
	for(v_Y in a_Layer){
		for(v_X in a_Layer[v_Y]){
			if(v_X==A_Data['player']['x']&&v_Y==A_Data['player']['y']&&v_Z==A_Data['player']['z']){
				F_MEHTML('D|map|layer',F_CEIHTML('stage|0').replace('replace-Z',v_Z).replace('replace-Y',v_Y).replace('replace-X',v_X),true);
				$('#'+v_Z+'\\|'+v_Y+'\\|'+v_X).removeClass().addClass('location-player');
			}else{
				if(a_Layer[v_Y][v_X]['is-solid']==3){
					F_MEHTML('D|map|layer',F_CEIHTML('stage|1').replace('replace-Z',v_Z).replace('replace-Y',v_Y).replace('replace-X',v_X),true);
				}else{
					F_MEHTML('D|map|layer',F_CEIHTML('stage|0').replace('replace-Z',v_Z).replace('replace-Y',v_Y).replace('replace-X',v_X),true);
				}
			}
			if(a_Layer[v_Y][v_X]['up-is-blocked']==2&&a_Layer[v_Y][v_X]['down-is-blocked']==2){$('#'+v_Z+'\\|'+v_Y+'\\|'+v_X).addClass('location-ladder-both');
			}else if(a_Layer[v_Y][v_X]['up-is-blocked']==2){$('#'+v_Z+'\\|'+v_Y+'\\|'+v_X).addClass('location-ladder-up');
			}else if(a_Layer[v_Y][v_X]['down-is-blocked']==2){$('#'+v_Z+'\\|'+v_Y+'\\|'+v_X).addClass('location-ladder-down');}
		}
	}
}
//
// Function - Set Location Data
function F_SetLocationData(v_Z,v_Y,v_X,v_XML){
	var a_Data=F_CXMLA(v_XML);
	for(v_K in a_Data){
		A_Map[v_Z][v_Y][v_X][v_K]=a_Data[v_K];
	}
}
//
// Function - Set Data
function F_SetData(v_T,v_XML){var a_XML=F_CXMLA(v_XML);for(v_K in a_XML){A_Data[v_T][v_K]=a_XML[v_K];}}
//
// Function - Display Layer
function F_DisplayLayer(v_XML){
	var v_Z=A_Data['player']['z'];
	for(v_Y=1;v_Y<=A_Data['options']['maximum-y'];v_Y++){
		for(v_X=1;v_X<=A_Data['options']['maximum-x'];v_X++){
		}
	}
}
//
// Function - Display Message
function F_DisplayMessage(v_XML){
	/*
	<message>
		<message-text>XXX</message-text>
	</message>
	*/
	var a_XML=F_CXMLA(v_XML);
	F_AddMessage(a_XML['message-text']);
	F_MEHTML('display-messages-online','<font style="color:rgb(255,255,255);">'+A_Messages[A_Messages.length-1]+'</font>');
}
//
// Function - Add Message
function F_AddMessage(v_Message){
	A_Messages[A_Messages.length-1]=v_Message;
	if(A_Messages.length>20){
		F_ShiftMessage();
	}
}
//
// Function - Shift Message
function F_ShiftMessage(){
	var v_Trash=A_Messages.shift();
}
//
// Function - Page Info
function F_PageInfo(v_XML){
	alert(v_XML);
	/*
	var a_I=F_B(F_PSXML(v_XML,'value'),'');
	V_RowMax=F_PSXML(a_I[0],'value');
	V_ColumnMax=F_PSXML(a_I[1],'value');
	document.getElementById('container-main|map').attributes['style'].value='width:'+V_ColumnMax*68+'px;';
	*/
}