//
// ARRAYS
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
	F_InsertElement('stage-loading-animation','loading-dots',false);
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
						/*
						case 'actor-AC':case 'artist-AC':case 'author-AC':case'console-name-AC':case 'm-artist-AC':case 'narrator-AC':case 'writer-AC':
							F_PXMLAC(v_T,a_RT[v_Lo]);
							break;
						case 'actions':
							$('#OL\\|options').html(F_Opt());
							break;
						case 'area-info':
							F_PXMLAPI(a_RT[v_Lo]);
							break;
						case 'back':
							V_LastURL='';
							break;
						case 'change-tag-AC':
							F_PXMLAC(v_T,a_RT[v_Lo]);
							break;
						case 'hours-mobile-library':
							F_ParseHoursOL(true,a_RT[v_Lo]);
							F_UpdateRecordNavigation();
							break;
						case 'hours-open-line':
							F_ParseHoursOL(false,a_RT[v_Lo]);
							F_UpdateRecordNavigation();
							break;
						case 'logged-in':
							V_LI=true;
							$('#user-status-14').hide();
							$('#user-status-15').show();
							$('#hotkey-holder').show();
							$('#top-level-options').show();
							$('#top-level-tickets').show();
							$('#stars-my-rating').show();
							$('#stars-my-rating-text').show();
							$('#LI-username').html(A_PoI['username']);
							$('#LI-usertype').html(A_PoI['usertype']);
							break;
						case 'logged-out':
							V_LI=false;
							$('#user-status-14').show();
							$('#user-status-15').hide();
							$('#hotkey-holder').hide();
							$('#top-level-options').hide();
							$('#top-level-tickets').hide();
							$('#stars-my-rating').hide();
							$('#stars-my-rating-text').hide();
							break;
						case 'message':
							F_ShowMessage(a_RT[v_Lo]);
							break;
						case 'my-library-ID':
							A_PI['library-ID']=F_PSXML(a_RT[v_Lo],'value');
							A_PI['library-name']=A_Libraries[A_PI['library-ID']];
							break;
						case 'no-databases':case 'no-events':case 'no-materials':case 'no-news':
							F_PXMLI(a_RT[v_Lo]);
							F_NoRecords();
							F_UpdateRecordNavigation();
							break;
						case 'open-line':
							F_PXMLOL(a_RT[v_Lo]);
							F_UpdateRecordNavigation();
							break;
						case 'search-information':
							F_ParseSearchInformation(a_RT[v_Lo]);
							break;
						case 'similar':
							F_CLS(0);
							V_CLS=true;
							V_Similar=true;
							break;
						case 'thin-line':
							F_ThinLineHTML(a_RT[v_Lo]);
							break;


						case 'available':case 'available-home':
							F_Available(a_RT[v_Lo],v_T);
							break;
						case 'popular-tags':
							F_PopularTags(a_RT[v_Lo]);
							break;
						case 'promotion':
							F_ChangePromotion(a_RT[v_Lo]);
							break;
						case 'tag-select':
							F_CTI(a_RT[v_Lo]);
							break;
						case 'databases-info':case 'events-info':case 'materials-info':case 'news-info':case 'hours-info':
							F_PXMLI(a_RT[v_Lo]);
							break;
						case 'locations':
							F_PXMLEve(a_RT[v_Lo],'hours');
							break;
						case 'databases':
							F_PXMLEve(a_RT[v_Lo],'database');
							break;
						case 'events':
							F_PXMLEve(a_RT[v_Lo],'event');
							break;
						case 'hotkeys':
							F_PXMLHoB(a_RT[v_Lo],'bar-hotkey');
							break;
						case 'materials':
							F_PXMLEve(a_RT[v_Lo],'material');
							break;
						case 'suggestions':
							F_Su(a_RT[v_Lo]);
							break;
						case 'more-suggestions':
							F_MoSu(a_RT[v_Lo]);
							break;
						case 'possibles':
							F_Po(a_RT[v_Lo]);
							break;
						case 'no-suggestions':
							F_NML();
							break;
						case 'no-possibles':
							break;
						case 'news':
							F_PXMLEve(a_RT[v_Lo],'new');
							break;
						case 'points-info':
							F_PPI(a_RT[v_Lo]);
							break;
						case 'validated':
							F_PD(1,4,a_RT[v_Lo]);
							break;
						default:
							break;
						*/
