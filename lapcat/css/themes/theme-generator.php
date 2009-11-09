<?
header('content-type:text/css'); header("Expires: ".gmdate("D, d M Y H:i:s", (time()+900000)) . " GMT"); 
// Theme - 2
// 20 - Blue with B/W BG (Full)
// 21 - Blue with B/W BG (Half)
// 22 - Blue with Light BG
// 23 - Blue without BG
// 24 - Blue and Teal with B/W BG (Full)
// 25 - Blue and Silver with B/W BG (Full)
// 26 - Blue with Special BG
// 27 - Blue and Silver with Alternate Special BG
// 28 - Blue and Silver with Diamond BG (Tiled)
// Theme - 3
// 30 - Green with B/W BG (Full)
// 31 - Green with B/W BG (Half)
// 32 - Green with Light BG
// 33 - Green without BG
// 34 - Green and Brown with B/W BG (Full)
// 35 - Green and Silver with B/W BG (Full)
// 38 - Green and Silver with Diamond BG (Tiled)
// Theme - 4
// 40 - Rose with B/W BG (Full)
// 41 - Rose with B/W BG (Half)
// 42 - Rose with Light BG
// 43 - Rose without BG
// 44 - Rose with B/W BG (Full) and Alternate Colors
// 45 - Rose and Silver with B/W BG (Full)
// 48 - Rose and Silver with Diamond BG (Tiled)
// Theme - 5
// 50 - Purple with B/W BG (Full)
// 51 - Purple with B/W BG (Half)
// 52 - Purple with Light BG
// 53 - Purple without BG
// 54 - Purple with B/W BG (Full) and Alternate Colors
// 55 - Purple and Silver with B/W BG (Full)
// 58 - Purple and Silver with Diamond BG (Tiled)
// Theme - 6
// 60 - Brown with B/W BG (Full)
// 61 - Brown with B/W BG (Half)
// 62 - Brown with Light BG
// 63 - Brown without BG
// 64 - Brown with B/W BG (Full) and Alternate Colors
// 65 - Brown and Silver with B/W BG (Full)
// 68 - Brown and Silver with Diamond BG (Tiled)
// Theme - 7
// 70 - Red with B/W BG (Full)
// 71 - Red with B/W BG (Half)
// 72 - Red with Light BG
// 73 - Red without BG
// 74 - Red with B/W BG (Full) and Alternate Colors
// 75 - Red and Silver with B/W BG (Full)
// 78 - Red and Silver with Diamond BG (Tiled)
// Theme - 9
// 90 - Teal with B/W BG (Full)
// 91 - Teal with B/W BG (Half)
// 92 - Teal with Light BG
// 93 - Teal without BG
// 94 - Teal with B/W BG (Full) and Alternate Colors
// 95 - Teal and Silver with B/W BG (Full)
// 98 - Teal and Silver with Diamond BG (Tiled)
$a_Theme=array(
	'background'=>'url(/lapcat/layout/images/1680-1050-31.png)', // BGImage
	'color'=>array(
		'A'=>'80,142,203',
		'B'=>'67,118,169',
		'C'=>'124,164,214',
		'D'=>'34,54,68',
		'E'=>'13,24,34',
		'F'=>'35,155,255'
	),
	'font'=>array(
		'A'=>'255,255,255',
		'B'=>'255,255,255',
		'C'=>'255,255,255',
		'D'=>'255,255,255',
		'E'=>'248,194,29',
		'F'=>'85,85,85',
		'G'=>'125,125,125',
		'H'=>'170,170,170'
	),
	'transparency'=>array(
		'A'=>'url(/lapcat/layout/images/1-1-25.png)',
		'B'=>'url(/lapcat/layout/images/1-1-50.png)',
		'C'=>'url(/lapcat/layout/images/1-1-75.png)'
	)
);
if(isset($_GET['theme'])){
	$v_Theme=$_GET['theme'];
	$v_Theme=27;
	switch($v_Theme){
		// Background - B/W (Full)
		case '20':case '30':case '40':case '50':case '60':case '70':case '90':
		case '24':case '34':case '44':case '54':case '64':case '74':case '94':
		case '25':case '35':case '45':case '55':case '65':case '75':case '95':
			$a_Theme['background']='url(/lapcat/layout/images/1-1050-0.png)';
			break;
			
		// Background - B/W (Half)
		case '21':case '31':case '41':case '51':case '61':case '71':case '91':
			$a_Theme['background']='url(/lapcat/layout/images/1-1050-3.png)';
			break;
			
		// Background - Light
		case '9':
		case '22':case '32':case '42':case '52':case '62':case '72':case '92':
			$a_Theme['background']='url(/lapcat/layout/images/1680-1050-31.png)';
			$a_Theme['font']['A']='0,0,0';
			$a_Theme['font']['D']='255,255,255';
			$a_Theme['font']['E']='0,60,190';
			$a_Theme['transparency']=array('A'=>'url(/lapcat/layout/images/1-1-52.png)','B'=>'url(/lapcat/layout/images/1-1-77.png)');
			break;
			
		// Background - None
		case '2':
		case '23':case '33':case '43':case '53':case '63':case '73':case '93':
			$a_Theme['background']='none';
			break;
			
		// Background - Blue Nebula
		case '3':
		case '26':
			$a_Theme['background']='url(/lapcat/layout/images/1680-1050-1.png)';
			break;

		// Background - Alternate
		case '27':
			$a_Theme['background']='url(/lapcat/layout/images/1680-1050-40.png)';
			break;

		// Background - Diamond (Tiled)
		case '28':case '38':case '48':case '58':case '68':case '78':case '98':
			$a_Theme['background']='url(/lapcat/layout/images/10-10-90.png)';
			break;

		default:
			break;
	}
	switch($v_Theme){
		// Base Color - Green
		case '30':case '31':case '32':case '33':case '34':case '35':case '38':
			$a_Theme['color']=array('A'=>'142,203,80','B'=>'118,169,67','C'=>'94,135,54','D'=>'47,68,27','E'=>'24,34,13','F'=>'155,255,35');
			break;
			
		// Base Color - Rose
		case '40':case '41':case '42':case '43':case '44':case '45':case '48':
			$a_Theme['color']=array('A'=>'203,80,142','B'=>'169,67,118','C'=>'135,54,94','D'=>'68,27,47','E'=>'34,13,24','F'=>'255,35,155');
			break;
			
		// Base Color - Purple
		case '50':case '51':case '52':case '53':case '54':case '55':case '58':
			$a_Theme['color']=array('A'=>'142,80,203','B'=>'118,67,169','C'=>'94,54,135','D'=>'47,27,68','E'=>'24,13,34','F'=>'155,35,255');
			break;
			
		// Base Color - Brown
		case '60':case '61':case '62':case '63':case '64':case '65':case '68':
			$a_Theme['color']=array('A'=>'203,142,80','B'=>'169,118,67','C'=>'135,94,54','D'=>'68,47,27','E'=>'34,24,13','F'=>'255,155,35');
			break;
			
		// Base Color - Red
		case '70':case '71':case '72':case '73':case '74':case '75':case '78':
			$a_Theme['color']=array('A'=>'223,42,40','B'=>'189,18,27','C'=>'155,0,14','D'=>'88,0,0','E'=>'54,0,0','F'=>'255,55,0');
			break;
			
		// Base Color - Teal
		case '90':case '91':case '92':case '93':case '94':case '95':case '98':
			$a_Theme['color']=array('A'=>'80,203,142','B'=>'67,169,118','C'=>'54,135,94','D'=>'27,68,47','E'=>'13,34,24','F'=>'35,255,155');
			break;
			
		default:
			break;
	}
	// Alternate Themes
	switch($v_Theme){
		// Alternate Color - Silver
		case '25':case '35':case '45':case '55':case '65':case '75':case '85':case '95':
		case '27':
		case '28':case '38':case '48':case '58':case '68':case '78':case '98':
			$a_Theme['color']['B']='55,55,55';break;
		
		default:break;
	}
	// Alternate Themes
	switch($v_Theme){
		// Base and Alternate Color - Blue and Teal
		case '24':$a_Theme['color']['B']='67,169,118';$a_Theme['color']['C']='54,135,94';$a_Theme['color']['F']='35,255,155';$a_Theme['font']['E']='35,255,155';break;
		
		// Base and Alternate Color - Green and Brown
		case '34':$a_Theme['color']['B']='169,118,67';$a_Theme['color']['C']='135,94,54';$a_Theme['color']['F']='255,155,35';$a_Theme['font']['E']='255,155,35';break;
		
		// Base and Alternate Color - Rose and Purple
		case '44':$a_Theme['color']['B']='118,67,169';$a_Theme['color']['C']='94,54,135';$a_Theme['color']['F']='155,35,255';$a_Theme['font']['E']='155,35,255';break;
		
		// Base and Alternate Color - Purple and Blue
		case '54':$a_Theme['color']['B']='67,118,169';$a_Theme['color']['C']='54,94,135';$a_Theme['color']['F']='35,155,255';$a_Theme['font']['E']='35,155,255';break;
		
		// Base and Alternate Color - Brown and Red
		case '64':$a_Theme['color']['B']='189,18,27';$a_Theme['color']['C']='155,0,14';$a_Theme['color']['F']='255,55,0';$a_Theme['font']['E']='255,55,0';break;
		
		// Base and Alternate Color - Red and Rose
		case '74':$a_Theme['color']['B']='169,67,118';$a_Theme['color']['C']='135,54,94';$a_Theme['color']['F']='255,35,155';$a_Theme['font']['E']='255,35,155';break;
		
		// Base and Alternate Color - Teal and Green
		case '94':$a_Theme['color']['B']='118,169,67';$a_Theme['color']['C']='94,135,54';$a_Theme['color']['F']='155,255,35';$a_Theme['font']['E']='155,255,35';break;
		
		default:break;
	}
}

$a_CSS=array(
	'A'=>'background-image:url(/lapcat/layout/images/1-13-0.png); background-repeat:repeat-x',
	'B'=>'border:1px solid rgb(0,0,0); border:1px solid rgba(0,0,0,1.0)');
if(isset($_GET['json'])){
	$jsonReturn = array('colors'=>$a_Theme);
	echo json_encode($jsonReturn);
}else{
	// Default
	echo '.round-corners{-moz-border-radius:4px;-webkit-border-radius:4px;}';
	echo '.info-black{background-color:rgb(255,255,255); background-color:rgba(255,255,255,0.5); border:1px solid rgb(235,235,255); border:1px solid rgba(235,235,255,0.65);}';
	echo '#purr-container{position:fixed; top:27px; right:7px; z-index:8;}';
	echo '.notice{position:relative; width:188px; margin-bottom:6px;}';
	echo '.notice-body{text-align:left; min-height: 65px; padding: 2px 2px 2px 2px;}';
	echo '.notice-body h3{margin:0; font-size:1.1em;}';
	echo '.toggle-button{background-color:rgb('.$a_Theme['color']['E'].'); border:1px solid rgb('.$a_Theme['color']['A'].'); cursor:pointer; vertical-align:middle; -moz-border-radius:4px;-webkit-border-radius:4px;}';
	echo '.toggle-button:hover{background-color:rgb('.$a_Theme['color']['F'].'); border:1px solid rgb('.$a_Theme['color']['B'].'); -moz-border-radius:4px;-webkit-border-radius:4px;}';
	echo '.red-button{background-color:rgb(155,0,14); border:1px solid rgb(223,42,40); cursor:pointer; vertical-align:middle; -moz-border-radius:4px;-webkit-border-radius:4px;}';
	echo '.red-button:hover{background-color:rgb(181,26,40); border:1px solid rgb(249,68,66); -moz-border-radius:4px;-webkit-border-radius:4px;}';
	
	// Tiled Images
	echo '.image-lines{background-image:url(/lapcat/layout/images/18-18-0.png); background-repeat:repeat;}';
	
	// Background
	echo '.image-background{background-image:'.$a_Theme['background'].'; background-repeat:repeat;}';
	
	// Color
	// A
	echo '.border-strong-1{border:1px solid rgb('.$a_Theme['color']['A'].');}';
	echo '.border-strong-2{border:2px solid rgb('.$a_Theme['color']['A'].');}';
	echo '.color-main{background-color:rgb('.$a_Theme['color']['A'].'); background-color:rgba('.$a_Theme['color']['A'].',0.6);}';
	echo '.color-strong, .open-line:hover{background-color:rgb('.$a_Theme['color']['A'].');}';
	echo '.border-bot-dark-1{border-bottom:1px solid rgb('.$a_Theme['color']['A'].'); border-bottom:1px solid rgba('.$a_Theme['color']['A'].',0.8);}';
	echo '.dropdown-main{background-color:rgb(255,255,255); border:1px solid rgb('.$a_Theme['color']['A'].'); color:rgb(0,0,0);}';
	echo '.line{background-image:none; -moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; -moz-border-radius-bottomleft:6px; -webkit-border-bottom-left-radius:6px; border:1px solid rgba('.$a_Theme['color']['A'].',0);}';
	echo '.menu-link{-moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; -moz-border-radius-topright:6px; -webkit-border-top-right-radius:6px; background-color:rgb('.$a_Theme['color']['A'].'); background-color:rgba('.$a_Theme['color']['A'].',0.3); border:1px solid rgb('.$a_Theme['color']['E'].'); border-bottom:0; cursor:pointer;}';
	// B
	echo '.next-button{background-color:rgb('.$a_Theme['color']['B'].'); cursor:pointer;}';
	echo '.border-main-1{border:1px solid rgb('.$a_Theme['color']['B'].');}';
	echo '.border-main-2{border:1px solid rgb('.$a_Theme['color']['B'].');}';
	echo '.dropbutton{background-color:rgb('.$a_Theme['color']['B'].'); border:1px solid rgb('.$a_Theme['color']['B'].'); color:rgb(255,255,255); cursor:pointer; -moz-border-radius:6px; -webkit-border-radius:6px;}';
	// C
	echo '.border-dark-1{border:1px solid rgb('.$a_Theme['color']['C'].'); border:1px solid rgba('.$a_Theme['color']['C'].',0.3);}';
	echo '.border-dark-2{border:2px solid rgb('.$a_Theme['color']['C'].'); border:2px solid rgba('.$a_Theme['color']['C'].',0.3);}';
	echo '.border-dark-3{border:1px solid rgb('.$a_Theme['color']['C'].'); border:1px solid rgba('.$a_Theme['color']['C'].',0.6);}';
	echo '.border-dark-4{border:2px solid rgb('.$a_Theme['color']['C'].'); border:2px solid rgba('.$a_Theme['color']['C'].',0.6);}';
	echo '.option-theme{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',1.0); '.$a_CSS['A'].'; '.$a_CSS['B'].';}';
	echo '.color-dark{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',0.3);}';
	echo '.color-background{background-color:rgb('.$a_Theme['color']['C'].');}';
	echo '.line:hover{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',0.6); cursor:pointer;}';
	// D
	echo '.color-darker{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',0.3);}';
	echo '.dropdown{background-color:rgb('.$a_Theme['color']['E'].'); border:1px solid rgb('.$a_Theme['color']['F'].'); color:rgb(255,255,255);}';
	// E
	echo '.OL-fred{border:1px solid rgb('.$a_Theme['color']['D'].');}';
	echo '.color-darkest{background-color:rgb('.$a_Theme['color']['D'].'); background-color:rgba('.$a_Theme['color']['D'].',0.3);}';
	echo '.border-hex-1{border:1px solid rgb('.$a_Theme['color']['F'].');}';
	switch($v_Theme){
		// Background - Light
		case '9':
		case '22':case '32':case '42':case '52':case '62':case '72':case '92':
			echo '.color-hex{background-color:rgb('.$a_Theme['color']['A'].'); background-color:rgba('.$a_Theme['color']['A'].',0.6);}';
			break;
		default:
			echo '.color-hex{background-color:rgb('.$a_Theme['color']['D'].'); background-color:rgba('.$a_Theme['color']['D'].',0.6);}';
			break;
	}
	echo '.open-line{-moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; -moz-border-radius-bottomleft:6px; -webkit-border-bottom-left-radius:6px;  background-color:rgb('.$a_Theme['color']['E'].'); border:1px solid rgb('.$a_Theme['color']['F'].'); border-right:1px solid rgb('.$a_Theme['color']['D'].'); cursor:pointer; text-align:right;}';
	echo '.option-selected{-moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; -moz-border-radius-topright:6px; -webkit-border-top-right-radius:6px; background-color:rgb('.$a_Theme['color']['D'].'); border:1px solid rgb('.$a_Theme['color']['F'].'); border-bottom:0; cursor:pointer;}';
	// F
	echo '.border-off-1{border:1px solid rgb('.$a_Theme['color']['E'].');}';
	echo '.border-off-2{border:2px solid rgb('.$a_Theme['color']['E'].');}';
	echo '.border-bot-off-1{border-bottom:1px solid rgba('.$a_Theme['color']['E'].',1.0);}';
	echo '.option-empty{background-color:rgb('.$a_Theme['color']['E'].'); '.$a_CSS['A'].'; '.$a_CSS['B'].';}';
	echo '.color-heavy{background-color:rgb('.$a_Theme['color']['E'].'); background-color:rgba('.$a_Theme['color']['E'].',0.6);}';
	echo '.option-theme:hover{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',1.0);}';
	echo '.color-off{background-color:rgb('.$a_Theme['color']['E'].'); background-color:rgba('.$a_Theme['color']['E'].',0.6);}';
	// G
	echo '.border-theme-1{1px solid rgb('.$a_Theme['color']['F'].');}';
	echo '.calendar-cell:hover, .next-button:hover{background-color:rgb('.$a_Theme['color']['C'].');}';
	echo '.color-highlight,.calendar-cell{background-color:rgb('.$a_Theme['color']['C'].');}';
	echo '.dropbutton:hover{background-color:rgb('.$a_Theme['color']['F'].'); border:1px solid rgb('.$a_Theme['color']['F'].'); color:rgb(255,255,255);}';
	echo '.menu-link:hover{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',0.6);}';
	echo '.hotkey{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',0.3);}';
	echo '.hotkey:hover{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',0.6);}';
	echo '.notice .close{background-color:rgb('.$a_Theme['color']['F'].'); position:absolute; top:2px; right:2px; display:block; width:14px; height:13px;}';

	// Font
	echo 'a, font{color:rgb('.$a_Theme['font']['A'].');}';
	echo '.option-selected font, .open-line font{color:rgb('.$a_Theme['font']['B'].');}';
	echo '.option-selected:hover font{color:rgb('.$a_Theme['font']['C'].');}';
	echo '.opposite{color:rgb('.$a_Theme['font']['D'].');}';
	echo '.gold{color:rgb('.$a_Theme['font']['E'].');}';
	echo '.grey{color:rgb('.$a_Theme['font']['F'].');}';
	echo '.medGrey{color:rgb('.$a_Theme['font']['G'].');}';
	echo '.darkGrey{color:rgb('.$a_Theme['font']['H'].');}';
	
	// Transparency
	echo '.dark{background-image:'.$a_Theme['transparency']['A'].'; background-repeat:repeat;}';
	echo '.darker{background-image:'.$a_Theme['transparency']['B'].'; background-repeat:repeat;}';
	echo '.dark-all{background-image:'.$a_Theme['transparency']['C'].'; background-repeat:repeat;}';
}
?>