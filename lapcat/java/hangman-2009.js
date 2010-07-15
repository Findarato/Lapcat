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

//
//
// FUNCTIONS
//
// Function - Make Request
function Func_MR(v_URL){
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
					switch(v_T){
						case 'puzzle':F_Set_Tiles(a_RT[v_Lo]);break;
						default:alert('hangman-2009: '+v_T);break;
					}
				}}}};
	v_HTTP.open('GET',v_URL,true);
   	v_HTTP.send(null);
}
//
// Function - Set Tiles
function F_Set_Tiles(v_XML){
	var a_I=F_B(F_PSXML(v_XML,'value'),'tile');
	var v_HTML='';
	for(v_K in a_I){
		a_Tile=F_CXMLA(a_I[v_K]);
		if(a_Tile['revealed']<4){F_MEHTML('container-main|hangman',F_CEIHTML('tile|template').replace('replace-letter',a_Tile['letter']),true);
		}else{F_MEHTML('container-main|hangman',F_CEIHTML('tile|blank'),true);}
	}
}