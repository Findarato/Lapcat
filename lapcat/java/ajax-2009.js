// LAPCAT

//
// Function - Make HTTP Request
function F_MakeHTTPRequest(v_URL){
	var v_HTTP=false;
	if(window.XMLHttpRequest){v_HTTP=new XMLHttpRequest();if(v_HTTP.overrideMimeType){v_HTTP.overrideMimeType('text/html');}}else if(window.ActiveXObject){try{v_HTTP=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{v_HTTP=new ActiveXObject('Microsoft.XMLHTTP');}catch(e){}}}
	if(!v_HTTP){return false;}
	v_HTTP.onreadystatechange=function f_Ready(){
		if(v_HTTP.readyState==4){
			if(v_HTTP.status==200){
				var v_XML=v_HTTP.responseText;
				var a_XML=v_XML.split('<boom>');
				var v_Length=a_XML.length;
				var v_Type='';
				for(var v_Key in a_XML){
					v_Type=F_PSXML(a_XML[v_Key],'name');
					switch(v_Type){
						case 'suggestions':
							O_DM.f_DirectContent(v_Type,a_XML[v_Key]);
							break;
						default:
							break;
					}
				}
			}
		}
	};
	v_HTTP.open('GET',v_URL,true);
   	v_HTTP.send(null);
}

//
//
// Array - Libraries
var A_Libraries=eval({0:'Main Library',1:'Coolspring',2:'Fish Lake',3:'Hanna',4:'Kingsford Heights',5:'Rolling Prairie',6:'Union Mills',7:'Mobile Library'});
//
// VARIABLES
//
// Variable - Last URL
var V_LastURL='';
//
// Variable - Cleared Left Side
var V_CLS=false;
//
// Variable - Similar
var V_Similar=false;
//
// FUNCTIONS
//
// Function - Back
function F_Back(){
	F_MR('/'+A_AT[A_PI['area-ID']]+'/back/ajax');
}
//
// Function - History
function F_History(){
	V_LastURL=F_CAPL();
}
//
// Function - Make Request
function F_MR(v_URL,v_AddToHistory){
	var v_HTTP=false;
	if(window.XMLHttpRequest){
		v_HTTP=new XMLHttpRequest();
		if(v_HTTP.overrideMimeType){
			v_HTTP.overrideMimeType('text/html');
		}
	}else if(window.ActiveXObject){
		try{
			v_HTTP=new ActiveXObject('Msxml2.XMLHTTP');
		}catch(e){
			try{v_HTTP=new ActiveXObject('Microsoft.XMLHTTP');
			}catch(e){
			}
		}
	}
	
	if(!v_HTTP){
		return false;
	}
	//F_InsertElement('stage-loading-animation','loading-dots',false);
	v_HTTP.onreadystatechange=function f_RC(){
		if(v_HTTP.readyState==4){
			if(v_HTTP.status==200){
				var v_RT=v_HTTP.responseText;
				var a_RT=v_RT.split('<boom>');
				var v_L=a_RT.length;
				A_PI['requests']++;
				V_CLS=false;
				V_Similar=false;
				for(v_Lo=0;v_Lo<v_L;v_Lo++){
					var v_T=F_PSXML(a_RT[v_Lo],'name');
					switch(v_T){
						case 'interests':case 'possibles':case 'suggestions':
							//O_C.f_StoreData(v_T,a_RT[v_Lo]);
							break;
						/*
						case '':
							break;
						case 'area-info':case 'points-info':case 'search-information':
							O_LAPCAT.o_Information.f_StoreXML(v_T,a_RT[v_Lo]);
							break;
						case 'available':
							F_Available(a_RT[v_Lo],v_T);
							break;
						case 'change-tag-AC':
							O_AutoComplete.f_StoreXML(v_T,a_RT[v_Lo]);
							break;
						case 'change-tag-AC/':
							O_AutoComplete.f_Display(v_T.replace('/',''),Array());
							break;
						case 'databases':case 'materials':case 'events':case 'interests':case 'locations':case 'news':case 'possibles':case 'suggestions':
							O_LAPCAT.o_Content.f_StoreXML(v_T,a_RT[v_Lo]);
							break;
						case 'databases-info':case 'events-info':case 'hours-info':case 'materials-info':case 'news-info':
						case 'no-databases':case 'no-events':case 'no-hours':case 'no-materials':case 'no-news':
							O_LAPCAT.o_Interface.f_StoreXML('screen-info',a_RT[v_Lo]);
							break;
						case 'logged-in':case 'logged-out':
							O_LAPCAT.o_User.f_Log(v_T);
							break;
						case 'message':
							F_Message(a_RT[v_Lo]);
							break;
						case 'my-library-ID':
							O_LAPCAT.o_Information.a_StorageXML['points-info']['library-ID']=F_PSXML(a_RT[v_Lo],'value');
							break;
						case 'no-interests':case 'no-possibles':case 'no-suggestions':
							O_LAPCAT.o_Content.f_TogglePushed(v_T.replace('no-',''),a_RT[v_Lo]);
							break;
						case 'open-line':
							O_LAPCAT.o_Content.f_StoreOpenLineXML(a_RT[v_Lo]);
							break;
						case 'page':
							O_LAPCAT.o_Interface.f_ShowPage(a_RT[v_Lo]);
							break;
						case 'popular-tags':
							O_LAPCAT.o_Interface.f_StorePopularTags(a_RT[v_Lo]);
							break;
						case 'promotions-list':
							O_LAPCAT.o_Interface.f_StoreXML(v_T,a_RT[v_Lo]);
							break;
						case 'thin-line':
							O_LAPCAT.o_Content.f_StoreOpenLineXML(a_RT[v_Lo]);
							O_LAPCAT.o_Interface.f_ShowScreenButtons();
							O_LAPCAT.o_Content.f_ShowOpenLine();
							if(!O_LAPCAT.o_Content.v_SameOpenLine){
								O_LAPCAT.o_Content.f_ShowTags();
								O_LAPCAT.o_Content.f_ShowOptions();
								if(O_LAPCAT.o_Interface.v_AreaName=='Materials'){F_CoverImages();}
								if(O_LAPCAT.o_Interface.a_Tag['ID']>0){O_LAPCAT.o_Interface.f_ShowSelectedTag();}
							}
							break;
						case 'similar-on':
							O_LAPCAT.o_Content.f_ToggleSimilar(false);
							break;
						case 'similar-off':
							O_LAPCAT.o_Content.f_ToggleSimilar(true);
							break;
						case 'tag-select':
							O_LAPCAT.o_Interface.f_SetTag(a_RT[v_Lo]);
							break;
						*/
						default://alert('The page "ajax-2009.js" says: '+a_RT[v_Lo]);
							break;
					}
				}
				$('#loading-dots').empty();
			}
		}
	};
	v_HTTP.open('GET',v_URL,true);
   	v_HTTP.send(null);
}