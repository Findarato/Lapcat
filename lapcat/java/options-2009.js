<!--//                  //-->
<!--// options-2009.php //-->
<!--//                  //-->
//
//
// ARRAYS
//
var A_Options=new Array();
//
// VARIABLES
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
						case 'options':
							F_ParseOptions(a_RT[v_Lo]);
							break;
						default:alert(v_T);break;
					}
				}}}};
	v_HTTP.open('GET',v_URL,true);
   	v_HTTP.send(null);
}
//
// Function - Push Button
function F_PushButton(v_Button,v_Theme){
	switch(parseInt(v_Button)){
		case 30:
			F_ChangeTheme($('input[name=radio-set-theme-'+v_Theme+']:checked').val());
			break;
		default:
			break;
	}
}

//
// Function - Parse Options
function F_ParseOptions(v_XML){
	var a_Options=F_CXMLA(v_XML);
	for(v_K in a_Options){A_Options[v_K]=a_Options[v_K];}
	F_ChangeSetThemeButtons();
}
//
// Function - Change Set Theme Buttons
function F_ChangeSetThemeButtons(){
	$('.option-gold').addClass('option-black').removeClass('option-gold');
	$('#change-theme-'+A_Options['theme']).addClass('option-gold');
}
//
// Function - Change Theme
function F_ChangeTheme(v_Theme){
	Fu_MR('/lapcat/code/options.php?url=change-theme/'+v_Theme+'/ajax');
	$('#css-theme').attr('href','/lapcat/css/themes/theme-generator.php?theme='+v_Theme);
	window.parent.document.getElementById('index-css-theme').href='/lapcat/css/themes/theme-generator.php?theme='+v_Theme;
	/*
	$("#i-agree").click(function(){
        window.opener.$("#accept-terms").attr("checked","checked");
        window.close();
	});
	*/
}