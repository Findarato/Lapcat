<!--//                //-->
<!--// market-2009.js //-->
<!--//                //-->
//
//
// ARRAYS
//
// Array - Code
var A_Code=new Array();
//
// VARIABLES
//
// FUNCTIONS
//
// Function - Make Request
function F_MakeR(v_URL){
	var v_HTTP=false;
	if(window.XMLHttpRequest){v_HTTP=new XMLHttpRequest();if(v_HTTP.overrideMimeType){v_HTTP.overrideMimeType('text/html');}
	}else if(window.ActiveXObject){try{v_HTTP=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{v_HTTP=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}}
	if(!v_HTTP){return false;}
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
						case 'create-events-hotkey':case 'create-materials-hotkey':
							switch(v_T){
								default:case 'create-events-hotkey':
									$('#HT\\|materials\\|holder').hide();
									$('#HT\\|events\\|holder').show();
									break;
								case 'create-materials-hotkey':
									$('#HT\\|events\\|holder').hide();
									$('#HT\\|materials\\|holder').show();
									break;
							}
							F_CreateHotkey(v_T,a_RT[v_Lo]);
							break;
						case 'hotkeys':
							F_Hotkeys(a_RT[v_Lo]);
							break;
						case 'hotkey-code':
							F_HotkeyCode(a_RT[v_Lo]);
							break;
						case 'manage-hotkeys':
							F_ManageHotkeys(a_RT[v_Lo]);
							break;
						case 'message':
							F_ShowMessage(a_RT[v_Lo]);
							break;
						default:
							alert('market-2009: '+a_RT[v_Lo]);
							break;
					}
				}}}};
	v_HTTP.open('GET',v_URL,true);
   	v_HTTP.send(null);
}
//
// Function - Hotkey Code
function F_HotkeyCode(v_XML){A_Code=F_CXMLA(v_XML);}
//
// Function - Add Hotkey
function F_AddHotkey(v_Area){
	var v_Selected=$('#HT\\|'+v_Area).val();
	F_MakeR('/lapcat/code/market.php?url=purchase-hotkey/ajax/'+v_Selected);
}
//
// Function - Create Hotkey
function F_CreateHotkey(v_T,v_XML){
	var a_Link=F_CXMLA(v_XML);
	var v_HTML=F_CEIHTML('stage|create-hotkey');
	for(v_Key in a_Link){v_HTML=v_HTML.replace('replace-'+v_Key,a_Link[v_Key]);}
	F_MEHTML('container-main|market',v_HTML);
}
//
// Function - Hotkeys
function F_Hotkeys(v_XML){
	var a_Hotkeys=F_B(F_PSXML(v_XML,'value'),'hotkey');
	F_MEHTML('container-main|market',F_HotkeyTemplate(a_Hotkeys));
}
//
// Function - Manage Hotkeys
function F_ManageHotkeys(v_XML){
	var a_Hotkeys=F_B(F_PSXML(v_XML,'value'),'hotkey');
	F_MEHTML('container-main|market',F_ManageHotkeysTemplate(a_Hotkeys));
}
//
// Function - Manage Hotkeys Template
function F_ManageHotkeysTemplate(a_Hotkeys){
	var a_Hotkey=new Array();
	var v_HTML='';
	var v_HotkeyHTML='';
	v_HTML+=F_CEIHTML('market|manage|hotkeys|header');
	for(v_K in a_Hotkeys){
		a_Hotkey=F_CXMLA(a_Hotkeys[v_K]);
		v_HotkeyHTML=F_CEIHTML('market|manage|hotkeys|template').replace(/replace-position/g,a_Hotkey['position']);
		if(a_Hotkey['hotkey-image']<1000){a_Hotkey['hotkey-image']=999;}
		for(v_Key in a_Hotkey){v_HotkeyHTML=v_HotkeyHTML.replace('replace-'+v_Key,a_Hotkey[v_Key]);}
		v_HTML+=v_HotkeyHTML;
	}
	return v_HTML;
}
//
// Function - Hotkey Template
function F_HotkeyTemplate(a_Hotkeys){
	var a_Hotkey=new Array();
	var v_HTML='';
	var v_HotkeyHTML='';
	v_HTML+=F_CEIHTML('market|hotkey|header');
	for(v_K in a_Hotkeys){
		a_Hotkey=F_CXMLA(a_Hotkeys[v_K]);
		v_HotkeyHTML=F_CEIHTML('market|hotkey|template').replace(/replace-portal-ID/g,a_Hotkey['portal-ID']);
		for(v_Key in a_Hotkey){v_HotkeyHTML=v_HotkeyHTML.replace('replace-'+v_Key,a_Hotkey[v_Key]);}
		v_HTML+=v_HotkeyHTML;
	}
	return v_HTML;
}