<!--//                     //-->
<!--// objectives-2009.php //-->
<!--//                     //-->
//
//
// ARRAYS
//
// Array - Objective Parts
var A_OP=new Array();A_OP['current-total']=0;A_OP['required-total']=0;
//
// Array - Part Data
var A_PD=new Array();
//
//
// VARIABLES
//
// Variable - Tag Count
var V_TC=0;
// Variable - TinyMCE
var V_MCE=0;
//
//
// FUNCTIONS
//
// Function - Make Request
function Fu_MR(v_URL){
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
						case 'AC-target':V_ACT=F_PSXML(a_RT[v_Lo],'value');break;
						case 'form-AC':F_PXMLAC(v_T,a_RT[v_Lo]);break;
						case 'objective':Fu_PXMLOb(a_RT[v_Lo]);break;
						case 'objectives':Fu_PXML(a_RT[v_Lo]);break;
						case 'message':Fu_M(a_RT[v_Lo]);break;
						case 'return-data':Fu_CRD(a_RT[v_Lo]);break;
						case 'objective-errors':Fu_UOE(a_RT[v_Lo]);break;
						default:break;
					}
				}}}};
	v_HTTP.open('GET',v_URL,true);
   	v_HTTP.send(null);
}
//
// Function - Complete Return Data
function Fu_CRD(v_XML){
	var a_I=F_CXMLA(v_XML);
	for(v_K in a_I){
		if(F_EE('objective-data-'+v_K)){
			switch(parseInt(v_K)){
				case 30:
					// Patron Plus
					if(a_I[v_K]==1){F_SV('objective-data-'+v_K,1);document.getElementById('objective-data-'+v_K).checked=true;}break;
				case 32:
					// Summer Reading Program
					if(a_I[v_K]==3){F_SV('objective-data-'+v_K,1);document.getElementById('objective-data-'+v_K).checked=true;}break;
				case 33:
					// Tournament
					if(a_I[v_K]=='Yes'){F_SV('objective-data-'+v_K,1);document.getElementById('objective-data-'+v_K).checked=true;}break;
				default:F_SV('objective-data-'+v_K,a_I[v_K]);break;
			}
			if(document.getElementById('objective-data-'+v_K).onchange){document.getElementById('objective-data-'+v_K).onchange();}
		}
	}
}
//
// Function - Update Objective Errors
function Fu_UOE(v_XML){var a_I=F_CXMLA(F_PSXML(v_XML,'value'));for(v_K in a_I){F_MEHTML('objective-error-'+(v_K.replace(/objective-data-/,'')),'<font class="dark-red">'+a_I[v_K]+'</font>');}}
//
// Function - Message
function Fu_M(v_M){F_MEHTML('container-main|objectives','<font style="font-size:14px;">'+v_M+'</font>');}
//
// Function - HTML Line
function Fu_HTMLLin(v_N,a_I){return '<div style="height:20px; overflow:hidden; width:370px;"><font class="med-grey" style="font-size:10px; margin-left:4px;">'+v_N+'.</font> <a href="javascript:Fu_MR(\'/lapcat/code/objectives.php?url=objective/'+a_I['ID']+'/ajax\');" onfocus="javascript:this.blur();"><font style="font-size:14px;">'+a_I['name']+'</font></a></div>';}
//
// Function - Parse XML
function Fu_PXML(v_XML){
	F_MEHTML('container-main|objectives','');
	var a_I=F_B(F_PSXML(v_XML,'value'),'objective');
	for(v_K in a_I){F_MEHTML('container-main|objectives',Fu_HTMLLin(parseInt(v_K)+1,F_CXMLA(a_I[v_K])),true);}
}
//
// Function - Compare Values
function Fu_CV(v_PID,v_OD,v_ODa){
	var v_ODV=F_RV('objective-data-'+v_OD);
	var v_ODaV=F_RV('objective-data-'+v_ODa);
	if(v_ODV!=''&&v_ODV==v_ODaV||(v_PID==v_OD&&v_ODV!=''&&v_ODaV==''||v_PID==v_ODa&&v_ODaV!=''&&v_ODV=='')){return 3;}else{return 2;}
}
//
// Function - Validate Form
function F_VF(v_N){if(A_OP['current-total']>0&&A_OP['current-total']==A_OP['required-total']){return true;}else{return false;}}
//
// Function - Parse XML (Objective)
function Fu_PXMLOb(v_XML, v_HO, v_T, v_FD){
	var a_IT = new Array();
	var a_Tr = new Array();
	var a_PB = F_B(F_PSXML(F_PGXML(v_XML, 'parts', 'pull'), 'value'), 'part');
	A_PD = [];
	for (v_K in a_PB) {
		a_Tr[v_K] = F_CXMLA(a_PB[v_K]);
		a_IT[a_Tr[v_K]['position']] = a_Tr[v_K];
	}
	var a_Ob = F_CXMLA(F_PGXML(v_XML, 'parts-box', 'rest'));
	var v_HTML = '';
	v_HTML += '<table style="height:470px; width:100%;"><tr><td style="vertical-align:top; width:100%;">';
	v_HTML += '<table style="width:100%;"><tr><td style="vertical-align:top; width:160px;"><font style="font-size:14px; font-weight:bold; margin-left:6px;"><span id="objective-name">...</span></font></td><td style="vertical-align:top; width:auto;"><font style="margin-left:6px;"><span id="objective-description">...</span></font></td></tr></table>';
	v_HTML += '<table style="width:100%;"><tr><td id="objective-progress" style="vertical-align:top; width:100%;"><font>...</font></td></tr></table>';
	v_HTML += '<table style="width:100%;"><tr><td style="vertical-align:top; width:100%;"><font style="margin-left:6px;">&radic;<span id="objective-current-total" style="margin-left:6px;">...</span><font class="med-grey"> / </font><span id="objective-required-total">...</span></font></td></tr></table>';
	v_HTML += '<table style="width:100%;"><tr><td style="vertical-align:top; width:100%;"><form id="objective-form" action="/lapcat/code/objectives.php?url=action/' + a_Ob['ID'] + '" autocomplete="off" method="post" name="objective-form" onsubmit="javascript:return F_VF(\'objective-form\');">';
	for (v_K in a_IT) {
		v_HTML += '<table style="width:100%;"><tr><td style="vertical-align:top; width:100%;"><font><span id="objective-input-' + a_IT[v_K]['part-ID'] + '">...</span></font></td></tr></table>';
	}
	v_HTML += '<table style="width:100%;"><tr><td id="objective-complete" style="vertical-align:top; width:100%;"><span id="objective-submit"><input class="dropbutton" onclick="" type="submit" value="Submit"/></span></td></tr></table>';
	v_HTML += '</form></td></tr></table>';
	v_HTML += '</td></tr></table>';
	F_MEHTML('container-main|objectives', v_HTML);
	F_MEHTML('objective-progress', F_CPB(0, a_Ob['required-total'], a_Ob['required-total'], 1));
	for (v_K in a_Ob) {
		F_MEHTML('objective-' + v_K, a_Ob[v_K]);
	}
	for (v_K in a_IT) {
		if (a_IT[v_K]['required'] == 2) {
			A_PD[a_IT[v_K]['part-ID']] = 0;
		}
		F_MEHTML('objective-input-' + a_IT[v_K]['part-ID'], F_OIT(a_IT[v_K]));
	}
	$("#objective-data-"+V_MCE).markItUp(mySettings);

}
//
// Function - Check Objective Data
function F_COD(v_PID,v_MID){
	var v_P=false;
	var v_EM='';
	var v_V=F_RV('objective-data-'+v_PID);
	function f_DC(v_V,v_Ma,v_Mi){if(v_V.length==0){v_EM='No data has been entered.';}else if(v_V.length<v_Mi){v_EM='This data is too short.';}else if(v_V.length>v_Ma){v_EM='This data is too long.';}}
	switch(v_MID){
		case 0:v_P=true;break;
		// Account Name
		// Alpha, Numeric, Other (6 - 16 characters)
		case 2:if(v_V.length>=6&&v_V.length<=16){v_P=true;}else{f_DC(v_V,6,16);}break;
		// First Name, Last Name
		// Alpha (2 - 16 characters)
		case 3:if(v_V.length>=2&&v_V.length<=16){v_P=true;}else{f_DC(v_V,2,16);}break;
		// Month of Birth
		// Numeric (Value: 1 - 12)
		case 4:if(v_V>=1&&v_V<=12){v_P=true;}else{v_EM='No month has been selected.';}break;
		// Year of Birth
		// Numeric
		case 5:if(v_V>0){v_P=true;}else{v_EM='No year has been selected.';}break;
		// Password (8 - 32 characters)
		case 6:if(v_V.length>=8&&v_V.length<=32){if(Fu_CV(v_PID,4,5)==3){v_P=true;}else{v_EM='The passwords do not match.';}}else{f_DC(v_V,8,32);}break;
		// PIN (4 characters)
		case 7:if(v_V.length==4){v_P=true;}else{f_DC(v_V,4,4);}break;
		// Card Number (7 or 13 characters)
		// Numeric
		case 8:if(v_V.length==7||v_V.length==13){v_P=true;}else{f_DC(v_V,13,13);}break;
		// Terms of Service
		// Numeric (Value: 2 - 3)
		case 10:if(v_V==3){v_P=true;}break;
		// Security Code
		// Alpha-Numeric (5 characters)
		case 11:if(v_V.length==5){v_P=true;}else{f_DC(v_V,5,5);}break;
		// Email Address
		case 12:v_P=true;break;
		// Text Area (Article)
		// Alpha, Numeric, Other (3 - 1500 characters)
		//case 13:if(v_V.length>=3&&v_V.length<=1500){v_P=true;}else{f_DC(v_V,3,1500);}break;
		// Title (Article)
		// Alpha, Numeric, Other (4 - 60 characters)
		case 14:if(v_V.length>=4&&v_V.length<=60){v_P=true;}else{f_DC(v_V,4,60);}break;
		// Duration (Message)
		// Numeric (Value: 1 - 7)
		case 15:v_V=parseInt(v_V);if(v_V>=1&&v_V<=7){v_P=true;}else{v_EM='This data must be a number from 1 to 7.';}break;
		// Tag
		case 16:if(v_V!=''){v_P=true;}else{v_EM='No data has been entered.';}break;
		// Time (Start / End)
		case 17:v_P=true;break;
		// Name (Event)
		case 30:if(v_V.length>=4&&v_V.length<=90){v_P=true;}else{f_DC(v_V,4,90);}break;
		default:break;}
	if(v_P){A_PD[v_PID]=1;}else{A_PD[v_PID]=0;}
	var v_CT=0;
	var v_C=0;
	for(v_K in A_PD){if(A_PD[v_K]==1){v_CT++;}v_C++;}
	A_OP['current-total']=v_CT;
	A_OP['required-total']=v_C;
	if(v_P){F_MEHTML('objective-pass-'+v_PID,'&radic;');F_MEHTML('objective-error-'+v_PID,'');
	}else{F_MEHTML('objective-pass-'+v_PID,'');F_MEHTML('objective-error-'+v_PID,v_EM);}
	F_MEHTML('objective-current-total',A_OP['current-total']);
	F_MEHTML('objective-progress',F_CPB(A_OP['current-total'],A_OP['required-total'],A_OP['required-total'],1));
}
//
// Function - Objective Input Type
function F_OIT(a_F){
	var v_HTML='...';
	var v_RHTML='';
	if(a_F['required']==2){v_RHTML='<font class="dark-red">&curren;</font>';}
	switch(parseInt(a_F['input-type'])){
		/* Check */
		case 9:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><span id="objective-pass-'+a_F['part-ID']+'"></span></td><td style="width:120px;"></td><td style="width:210px;"><input type="checkbox" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:if(this.value<3){this.value++;}else{this.value--;}F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" value="2"/><font style="margin-left:4px;">I agree to the <a class="gold" href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a>.</font></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">This box is unchecked.</span></font></td></tr></table>';break;
		/* Summer Reading Program */
		case 10:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><span id="objective-pass-'+a_F['part-ID']+'"></span></td><td style="width:120px;"></td><td style="width:210px;"><input type="checkbox" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:if(this.value<1){this.value++;}else{this.value--;}" value="0"/><font style="margin-left:4px;">Summer Reading Program</font></td><td style="text-align:left; width:auto;"></td></tr></table>';break;
		/* Patron Plus */
		case 11:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><span id="objective-pass-'+a_F['part-ID']+'"></span></td><td style="width:120px;"></td><td style="width:210px;"><input type="checkbox" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:if(this.value<1){this.value++;}else{this.value--;}" value="0"/><font style="margin-left:4px;">Patron Plus</font></td><td style="text-align:left; width:auto;"></td></tr></table>';break;
		/* Tournament */
		case 12:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><span id="objective-pass-'+a_F['part-ID']+'"></span></td><td style="width:120px;"></td><td style="width:210px;"><input type="checkbox" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:if(this.value<1){this.value++;}else{this.value--;}" value="0"/><font style="margin-left:4px;">Tournament</font></td><td style="text-align:left; width:auto;"></td></tr></table>';break;
		/* Date */
		case 13:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>Date</font><font class="med-grey">: </font></td><td style="width:210px;"><input class="dropdown" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" id="objective-data-'+a_F['part-ID']+'" type="text"/></td><td style="text-align:left; width:180px;"><font class="white"><span id="objective-instructions-'+a_F['part-ID']+'">MM/DD/YYYY</span></font></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">No data has been entered.</span></font></td></tr></table>';break;
		/* Time */
		case 14:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><input class="dropdown" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" id="objective-data-'+a_F['part-ID']+'" type="text"/></td><td style="text-align:left; width:180px;"><font class="white"><span id="objective-instructions-'+a_F['part-ID']+'">HH:MM (AM or PM)</span></font></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">No data has been entered.</span></font></td></tr></table>';break;
		/* Tag Set */
		case 20:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; vertical-align:top; width:20px;">'+v_RHTML+'</td><td style="text-align:center; vertical-align:top; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; vertical-align:top; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><input class="dropdown" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onkeyup="javascript:F_SBAC(\'form\','+a_F['part-ID']+');" type="text" value="" style="width:160px;"></input></td><td style="text-align:left; vertical-align:top; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">No data has been entered.</span></font></td></tr><tr><td colspan="3"></td><td><div id="objective-tag-'+a_F['part-ID']+'" style="vertical-align:bottom;"></div></td><td></td></tr></table>';break;
		/* Text Area */
		case 21:V_MCE=a_F['part-ID'];v_HTML='<table style="width:100%;"><tr><td style="text-align:center; vertical-align:top; width:20px;">'+v_RHTML+'</td><td style="text-align:center; vertical-align:top; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; vertical-align:top; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td>'+F_CEIHTML('tinymce').replace(/replace-part-ID/g,a_F['part-ID']).replace('replace-mod-ID',a_F['mod-ID'])+'</td></tr></table>';break;
		/* Text */
		case 22:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><input class="dropdown" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" id="objective-data-'+a_F['part-ID']+'" type="text"/></td><td style="text-align:left; width:180px;"></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">No data has been entered.</span></font></td></tr></table>';break;
		/* Password */
		case 24:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><input class="dropdown" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" type="password"/></td><td style="text-align:left; width:180px;"><font class="white"><span id="objective-instructions-'+a_F['part-ID']+'">8 - 32 characters</span></font></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">No data has been entered.</span></font></td></tr></table>';break;
		/* PIN */
		case 25:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><input class="dropdown" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" type="password"/></td><td style="text-align:left; width:180px;"><font class="white"><span id="objective-instructions-'+a_F['part-ID']+'">4 characters</span></font></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">No data has been entered.</span></font></td></tr></table>';break;
		/* Email Address */
		case 26:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><input class="dropdown" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" id="objective-data-'+a_F['part-ID']+'" type="text"/></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">No data has been entered.</span></font></td></tr></table>';break;
		/* Date - Month */
		case 27:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><select class="dropdown" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" style="width:160px;" type="text" value=""><option value="">Month</option>';
		var a_M=Array('January','February','March','April','May','June','July','August','September','October','November','December');
		for(v_K in a_M){v_HTML+='<option value="'+(parseInt(v_K)+1)+'">'+a_M[v_K]+'</option>';}
		v_HTML+='</select></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">No data has been selected.</span></font></td></tr></table>';break;
		/* Date - Year */
		case 28:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><select class="dropdown" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" style="width:160px;" type="text" value=""><option value="">Year</option>';
		var v_D=new Date();
		var v_Y=v_D.getFullYear()-13;
		var a_Y=new Array();
		for(v_K=v_Y;v_K>(v_Y-87);v_K--){a_Y[v_K]=v_K;}
		for(v_K in a_Y){v_HTML+='<option value="'+v_K+'">'+a_Y[v_K]+'</option>';}
		v_HTML+='</select></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">No data has been selected.</span></font></td></tr></table>';break;
		/* Security Code */
		case 29:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><input class="dropdown" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" id="objective-data-'+a_F['part-ID']+'" type="text"/></td><td style="text-align:left; width:auto;"><font class="med-grey"><span id="objective-error-'+a_F['part-ID']+'">Enter the data as it appears in the security box.</span></font></td></tr><tr><td colspan="3"></td><td colspan="2"><img id="security-code" src="/lapcat/code/captcha.php" /><a href="javascript:F_NSC();"> Generate New Code</a></td></tr></table>';break;
		/* Library */
		case 30:v_HTML='<table style="width:100%;"><tr><td style="text-align:center; width:20px;">'+v_RHTML+'</td><td style="text-align:center; width:20px;"><font><span id="objective-pass-'+a_F['part-ID']+'"></span></font></td><td style="text-align:right; width:120px;"><font>'+a_F['name']+'</font><font class="med-grey">: </font></td><td style="width:210px;"><select class="dropdown" id="objective-data-'+a_F['part-ID']+'" name="objective-data-'+a_F['part-ID']+'" onchange="javascript:F_COD('+a_F['part-ID']+','+a_F['mod-ID']+');" style="width:160px;" type="text" value=""><option value="0">All Locations</option>';
		var a_L=new Array('Main Library','Coolspring','Fish Lake','Hanna','Kingsford Heights','Rolling Prairie','Union Mills','Bookmobile','None - See Description');
		for(v_K in a_L){v_HTML+='<option value="'+(parseInt(v_K)+1)+'">'+a_L[v_K]+'</option>';}
		v_HTML+='</select></td><td style="text-align:left; width:auto;"></td></tr></table>';break;
		default:break;
	}
	return v_HTML;
}
//
// Function - New Security Code
function F_NSC(){F_MIFS('security-code','/lapcat/code/captcha.php?timestamp='+F_TS());}