//
// ARRAYS
//
// Array - Area Text
var A_AT=new Array();A_AT[10]='databases';A_AT[28]='events';A_AT[34]='materials';A_AT[131]='news';A_AT[2]='join';A_AT[3]='my-library';A_AT[8]='hours';
//
// Array - Page Information
var A_PI=new Array();A_PI['area-ID']=0;A_PI['screen']=1;A_PI['requests']=0;A_PI['library-ID']=0;A_PI['target']=0;A_PI['area-page-link']='';A_PI['total']=0;
//
// VARIABLES
//
// Variable - Auto-Complete
var V_AC=false;
//
// Variable - Auto-Complete Target (for Objectives)
var V_ACT=0;
//
// FUNCTIONS

//
// Function - Convert XML (to Array)
function F_CXMLA(v_XML,v_Test){var a_LDA=new Array();v_XML=F_PSXML(v_XML,'value').replace(/><\//g,'>EMPTY</');var a_DSDA=F_B(v_XML,'');var v_Value='';var v_Name='';for(var v_Key in a_DSDA){v_Value=F_PSXML(a_DSDA[v_Key],'value');v_Name=F_PSXML(a_DSDA[v_Key],'name');a_LDA[v_Name]=((v_Value=='EMPTY')?'':v_Value);}return a_LDA;}


//
// Function - Boom
function F_B(v_T,v_AT){if(v_AT==''){var v_DT=v_T.replace(/></g,'><BOOM><');}else{var v_HT=v_T.split('</'+v_AT+'><'+v_AT+'>');v_DT=v_HT.join('</'+v_AT+'><BOOM><'+v_AT+'>');}return v_DT.split('<BOOM>');}
//
// Function - Modify Element Class
function F_MEC(v_EID,v_MV){if(F_EE(v_EID)){document.getElementById(v_EID).className=v_MV;}}
//
// Function - Modify IFrame Source (or Image Source)
function F_MIFS(v_EID,v_MV){if(F_EE(v_EID)){document.getElementById(v_EID).attributes['src'].value=v_MV;}}
//
// Function - TimeStamp
function F_TS(){var v_D=new Date();return v_D.getTime();}
//
// Function - Create Progress Bar
function F_CPB(v_P,v_PT,v_T,v_TT){
	if(F_EE('objective-complete')){
		if(v_P==v_PT){F_MEV('objective-submit',true);}else{F_MEV('objective-submit',false);}}
	var v_PP=Math.floor(100/v_T);
	var v_HTML='<div style="height:4px; width:auto;"><table style="height:3px; width:100%;"><tr>';
	for(var v_ED=0;v_ED<v_T;v_ED++){
		if(v_ED<v_P){v_HTML+='<td style="background-color:rgba(255,0,0,1.0); width:'+v_PP+'%;"></td>';}else{v_HTML+='<td style="width:'+v_PP+'%;"></td>';}}
	v_HTML+='</tr></table></div>';
	return v_HTML;
}
//
// Function - Copy Element Inner HTML
function F_CEIHTML(v_EID){if(F_EE(v_EID)){return document.getElementById(v_EID).innerHTML;}}
//
// Function - Element Exists
function F_EE(v_EID){if(document.getElementById(v_EID)){return true;}else{return false;}}
//
// Function - Modify Element HTML
function F_MEHTML(v_EID,v_MV,v_T){if(F_EE(v_EID)){if(v_T){document.getElementById(v_EID).innerHTML+=v_MV;}else{document.getElementById(v_EID).innerHTML=v_MV;}}}
//
// Function - Modify Element Visibility
function F_MEV(v_EID,v_V){if(F_EE(v_EID)){document.getElementById(v_EID).style.visibility=((v_V)?'visible':'hidden');}}
//
// Function - Pull Group XML
function F_PGXML(v_PGXML,v_TTP,v_RD){
	var a_XML=new Array();
	var v_SIO=v_PGXML.indexOf('<'+v_TTP+'/>');
	if(v_SIO>-1){
		a_XML['pull']=v_PGXML.substr(v_SIO,v_TTP.length+3);
		a_XML['rest']=v_PGXML.substr(0,v_SIO)+v_PGXML.substr(v_SIO+v_TTP.length+3);
		a_XML['empty_tag']=true;
	}else{
		var v_IO=v_PGXML.indexOf('<'+v_TTP+'>');
		var v_LIO=v_PGXML.indexOf('</'+v_TTP+'>');
		if(v_IO==-1&&v_LIO==-1){
			if(v_RD=='rest'){
				return v_PGXML;
			}else{
				return '';
			}
		}
		a_XML['pull']=v_PGXML.substr(v_IO,(v_LIO-v_IO+v_TTP.length+3));
		a_XML['rest']=v_PGXML.substr(0,v_IO)+v_PGXML.substr(v_LIO+v_TTP.length+3);
		a_XML['empty_tag']=false;
	}
	if(v_RD==''){
		return a_XML;
	}else{
		return a_XML[v_RD];
	}
}
//
// Function - Pull Single XML
function F_PSXML(v_SXML,v_PT){var v_SIO=v_SXML.indexOf('>');var a_S=new Array();a_S['name']='';a_S['value']='';if(v_SIO>0){a_S['name']=v_SXML.substr(1,v_SIO-1);var v_ET='</'+a_S['name']+'>';var v_SLIO=v_SXML.indexOf(v_ET);a_S['value']=v_SXML.substr(v_SIO+1,(v_SLIO-v_SIO)-1);}if(v_PT=='value'){return a_S['value'];}else if(v_PT=='name'){return a_S['name'];}else{return a_S;}}
//
// Function - Parse XML (to Auto-Complete)
function F_PXMLAC(v_T,v_XML){
	var v_R=v_T.replace('-AC','');
	A_AC=Array();
	var a_Results=F_B(F_PSXML(v_XML,'value'),'data');
	var a_Result=new Array();
	for(v_K in a_Results){
		a_Result=F_CXMLA(a_Results[v_K]);
		A_AC[v_K]=a_Result['result'];
	}
	V_AC=true;
	F_SBAC(v_R,V_ACT);
}
//
// Function - Read Value
function F_RV(v_EID){if(F_EE(v_EID)){return document.getElementById(v_EID).value;}}
//
// Function - Clear Auto-Complete (for Objectives)
function F_CACo(v_Input_ID,v_TN){
	F_MEHTML('objective-tag-'+v_Input_ID,'');
	F_SV('objective-data-'+v_Input_ID,v_TN);
	F_COD(v_Input_ID,16);
	V_AC=false;
}
//
// Function - Search Box Auto-Complete
function F_SBAC(v_T,v_Input_ID){
	var v_AN=((v_T=='change-tag')?'all':A_AT[A_PI['area-ID']]);
	var v_Se='';
	if(v_T=='form'){v_Se=F_RV('objective-data-'+v_Input_ID).toLowerCase();}else{v_Se=F_RV('DB|'+v_AN+'|'+v_T).toLowerCase();}
	var v_L=v_Se.length;
	if(v_L==0){
		V_AC=false;
		if(v_T=='form'){F_MEHTML('objective-tag-'+v_Input_ID,'');F_COD(v_Input_ID,16);}else{F_MEHTML('DB|'+v_AN+'|'+v_T+'|AC','');}
	}else if(V_AC){
		var v_C=0;
		var v_HTML='';
		var a_AC=new Array();
		for(v_K in A_AC){if(A_AC[v_K].substr(0,v_L).toLowerCase()==v_Se){a_AC[v_K]=A_AC[v_K];}}
		v_HTML='<div class="border-main-1 color-heavy shine-less" style="height:68px; overflow-y:scroll; vertical-align:top;">';
		var v_href='';
		var v_onclick='';
		for(v_K in a_AC){
			if(v_T=='form'){v_href='F_CACo('+v_Input_ID+',\''+a_AC[v_K]+'\')';v_onclick='';
			}else{v_href='F_CAC(\''+v_T+'\',\''+v_AN+'\')';v_onclick='F_LMTA(\''+v_T+'\',\''+a_AC[v_K]+'\')';}
			v_HTML+='<a href="javascript:'+v_href+';" onclick="javascript:'+v_onclick+';" onfocus="javascript:this.blur();"><font>'+a_AC[v_K]+'</font></a><br/>';v_C++;}
		if(v_C==0){v_HTML+='<font class="med-grey" style="font-style:italic;">No results.</font>';}
		v_HTML+='</div>';
		if(v_T=='form'){F_MEHTML('objective-tag-'+v_Input_ID,v_HTML);
		}else{F_MEHTML('DB|'+v_AN+'|'+v_T+'|AC',v_HTML);}
	}else{
		if(v_T=='form'){Fu_MR('/lapcat/code/objectives.php?url=change-tag/'+v_Input_ID+'/'+v_Se+'/ajax');
		}else{F_MR(v_AN+'/'+v_T+'-AC/'+v_Se+'/ajax');}
	}
}
//
// Function - Set Value
function F_SV(v_EID,v_V){if(F_EE(v_EID)){document.getElementById(v_EID).value=v_V;}}
//
// Function - Show Message
function F_ShowMessage(v_XML){var a_I=F_CXMLA(v_XML);F_Notice(a_I['message-title'],a_I['message-body'],((a_I['message-sticky']>0)?true:false));}
//
// Function - Notice
function F_Notice(v_Title,v_Body,v_Sticky,v_TicketID){
	var v_Notice='<div class="color-theme notice fakelink">'
		+'<div class="notice-body color-theme OL-fred">'
		+'<div style="float:left; width:auto;"><h3><font class="white">'+v_Title+'</font></h3>'
		+'<font class="white" style="font-size:12px;">'+v_Body+'</font></div>'
		+'</div>'
		+'</div>';
		if(v_Sticky){$(v_Notice).purr({isSticky:true});
		}else{$(v_Notice).purr({isSticky:false});}
		//if(sticky){$( v_Notice ).click(function(){loadTicket(v_TicketID)}).purr({isSticky: true});
		//}else{$( v_Notice ).click(function(){loadTicket(v_TicketID)}).purr({isSticky: false});}
}