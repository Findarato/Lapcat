<?
//header('content-type:text/css'); header("Expires: ".gmdate("D, d M Y H:i:s", (time()+900000)) . " GMT"); 
header('content-type:text/css'); header("Expires: ".time(). " GMT"); 
if(extension_loaded('zlib')){ob_start('ob_gzhandler');}
// Tiled Images
// 18-18-100 (More Diagonal Lines)
// 18-18-101 (Logo-Based Design with One Diagonal Line)
// 18-18-102 (More Vertical Lines)
// 18-18-103 (More Horizontal Lines)
// 18-18-104 (Less Diagonal Lines)
// 18-18-105 (Less Diagonal Fence Lines)
// 18-18-106 (Less Diagonal Fence Lines with Highlights)
// 18-18-107 (Less Criss-Cross Lines)
// 18-18-108 (Less Diagonal Gear-Work Lines)
// 18-18-109 (Less Diagonal Puzzle Lines)
// 18-18-110 (Hypnotic Boxes)
// 18-18-111 (Flower Petal Design)
// 18-18-112 (Very Small Boxes)
// 18-18-113 (Less Diagonal Wave Lines)
// 18-18-114 (Odd Patchwork)
// 18-18-115 (Angel Print)
// 18-18-116 (Four Hearts)
// 18-18-117 (Arrows All Ways)
//
// 18-1050-100 (More Diagonal Lines with Blue Gradient BG)
// 18-1050-101 (More Diagonal Lines with Red Gradient BG)
// 18-1050-102 (More Diagonal Lines with  Gradient BG)
// 18-1050-103 (More Diagonal Lines with Green Gradient BG)
// 18-1050-104 (More Diagonal Lines with Purple Gradient BG)
// 18-1050-105 (More Diagonal Lines with Rose Gradient BG)
// 18-1050-106 (Fake Wood Fence)
//

// 22 - (base: light)	(color: blue)	(background: /lapcat/layout/images/1680-1050-31.png)	(special-background: /lapcat/layout/tiled-images/18-1050-100.png)
// 29 - (base: dark)	(color:blue)	(background: /lapcat/layout/images/1680-1050-40.png)	(special-background: /lapcat/layout/images/8-1-24.png)
// 32 - (base: light)	(color:green)	(background: /lapcat/layout/images/1680-1050-31.png)	(special-background: /lapcat/layout/tiled-images/18-1050-103.png)
// 39 - (base: dark)	(color:green)	(background: /lapcat/layout/images/1-1050-1.png)		(special-background: /lapcat/layout/images/1-1-26.png)

/*
		'A'=>'80,140,200',  // Theme Color I
		'B'=>'67,118,169',  // Theme Color II
		'C'=>'124,164,214', // Theme Color III
		'D'=>'34,54,68',    // Theme Color IV 
		'E'=>'63,74,84',    // Theme Color V
		'F'=>'35,155,255',  // Theme Color VI
*/


function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    return $buffer;
}
function rgb2hsl($rgb){
    $clrR = ($rgb[0]);
    $clrG = ($rgb[1]);
    $clrB = ($rgb[2]);
	if(isset($rgb[3])){
		$clrA = ($rgb[3]);		
	}else{$clrA = false;}
    
    $clrMin = min($clrR, $clrG, $clrB);
    $clrMax = max($clrR, $clrG, $clrB);
    $deltaMax = $clrMax - $clrMin;
    
    $L = ($clrMax + $clrMin) / 510;
    
    if (0 == $deltaMax){
        $H = 0;
        $S = 0;
    }
    else{
        if (0.5 > $L){
            $S = $deltaMax / ($clrMax + $clrMin);
        }
        else{
            $S = $deltaMax / (510 - $clrMax - $clrMin);
        }

        if ($clrMax == $clrR) {
            $H = ($clrG - $clrB) / (6.0 * $deltaMax);
        }
        else if ($clrMax == $clrG) {
            $H = 1/3 + ($clrB - $clrR) / (6.0 * $deltaMax);
        }
        else {
            $H = 2 / 3 + ($clrR - $clrG) / (6.0 * $deltaMax);
        }

        if (0 > $H) $H += 1;
        if (1 < $H) $H -= 1;
    }
    if($clrA){
		return array(round($H*360), round($S),round($L),$clrA);
	}else{return array(round($H*360), round($S),round($L));}
}

$v_HSL = false;
$v_RGBorHSL = "rgb";
$v_RGBAorHSLA = "rgba";
$v_hslword = "";

//Color indexes to be generated
//Used in the loop to generate most of the theme code
$a_colorNameArray = array(
	"A",	"B",	"C",	"D",
	"E",	"F",	"G",	"H",
	"I",	"J",	"K",	"L",
	"M",	"N",	"O",	"P",
	"Q",	"R",	"S",	"T",
	"U",	"V",	"W",	"X",
	"Y",	"Z"
);


$a_ThemeHSL=array(
	'background'=>'url(/lapcat/layout/images/1680-1050-31.png)', // BG Image
	'special-background'=>'url(/lapcat/layout/transparent-colors/1-1-G-50.png)',
	'accent-color'=>array(
		'A'=>'212,51%,60%',  // Accent Color I
		'B'=>'213,43%,52%'   // Accent Color II
	),
	'color'=>array(
		'A'=>'212,51%,60%',  // Theme Color I
		'B'=>'213,43%,53%',  // Theme Color II
		'C'=>'213,35%,45%',  // Theme Color III
		'D'=>'214,27%,37%',   // Theme Color IV
		'E'=>'216,20%,30%',   // Theme Color V
		'F'=>'220,11%,22%',    // Theme Color VI
		'G'=>'0,0%,100%', // White
		'H'=>'0,0%,67%', // Grey I
		'I'=>'0,0%,49%', // Grey II
		'J'=>'0,0%,33%',    // Grey III
		'K'=>'0,0%,0%',       // Black
		'L'=>'46,82%,53%',  // Theme Color VII
		'M'=>'97,51%,33%',   // Basic Color I - Green
		'N'=>'40,60%,69%', // Basic Color II - Orange,
		'P'=>'288,98%,49%',   // Basic Color IV - Purple
		'Q'=>'132,98%,49%',    // Basic Color V - Green
		'R'=>'0,98%,49%',     // Basic Color VI - Red
		'S'=>'60,98%,49%',      // Basic Color VI - Yellow
		'T'=>'0,51%,45%'   // Basic Color III - Purple
	),
	'transparency'=>array(
		'A'=>'url(/lapcat/layout/transparent-colors/1-1-G-10.png)',
		'B'=>'url(/lapcat/layout/transparent-colors/1-1-G-25.png)',
		'C'=>'url(/lapcat/layout/transparent-colors/1-1-G-50.png)',
		'D'=>'url(/lapcat/layout/transparent-colors/1-1-G-75.png)',
		'E'=>'url(/lapcat/layout/transparent-colors/1-1-G-95.png)',
		'F'=>'url(/lapcat/layout/transparent-colors/1-1-G-100.png)'
	)
);


$a_Theme=array(
	'background'=>'url(/lapcat/layout/images/1680-1050-31.png)', // BG Image
	'special-background'=>'url(/lapcat/layout/transparent-colors/1-1-G-50.png)',
	'accent-color'=>array(
		'A'=>'90,150,220',  // Accent Color I
		'B'=>'80,130,190'   // Accent Color II
	),
	'color'=>array(
		'A'=>'90,150,220',  // Theme Color I
		'B'=>'80,130,190',  // Theme Color II
		'C'=>'70,110,160',  // Theme Color III
		'D'=>'60,90,130',   // Theme Color IV
		'E'=>'50,70,100',   // Theme Color V
		'F'=>'40,50,70',    // Theme Color VI
		'G'=>'255,255,255', // White
		'H'=>'170,170,170', // Grey I
		'I'=>'125,125,125', // Grey II
		'J'=>'85,85,85',    // Grey III
		'K'=>'0,0,0',       // Black
		'L'=>'240,190,30',  // Theme Color VII
		'M'=>'70,150,20',   // Basic Color I - Green
		'N'=>'250,200,100', // Basic Color II - Orange,
		'P'=>'200,0,250',   // Basic Color IV - Purple
		'Q'=>'0,250,50',    // Basic Color V - Green
		'R'=>'250,0,0',     // Basic Color VI - Red
		'S'=>'250,250,0',      // Basic Color VI - Yellow
		'T'=>'180,50,50'   // Basic Color III - Purple
	),
	'transparency'=>array(
		'A'=>'url(/lapcat/layout/transparent-colors/1-1-G-10.png)',
		'B'=>'url(/lapcat/layout/transparent-colors/1-1-G-25.png)',
		'C'=>'url(/lapcat/layout/transparent-colors/1-1-G-50.png)',
		'D'=>'url(/lapcat/layout/transparent-colors/1-1-G-75.png)',
		'E'=>'url(/lapcat/layout/transparent-colors/1-1-G-95.png)',
		'F'=>'url(/lapcat/layout/transparent-colors/1-1-G-100.png)'
	)
);
$a_BG=array(
	20=>'url(/lapcat/layout/images/1-1050-1.png)',
	30=>'url(/lapcat/layout/images/1-1050-1.png)',
	40=>'url(/lapcat/layout/images/1-1050-1.png)',
	50=>'url(/lapcat/layout/images/1-1050-1.png)',
	60=>'url(/lapcat/layout/images/1-1050-1.png)',
	70=>'url(/lapcat/layout/images/1-1050-1.png)',
	90=>'url(/lapcat/layout/images/1-1050-1.png)',

	21=>'url(/lapcat/layout/transparent-colors/1-1-G-100.png)',
	22=>'url(/lapcat/layout/images/1680-1050-31.png)',
	//22=>'url("http://wallpaper.lapcat.org/admin/wallpaper-519641.jpg")',
	26=>'url(/lapcat/layout/images/1680-1050-1.png)',
	28=>'url(/lapcat/images/20-20-0.png)',
	29=>'url(/lapcat/layout/images/1680-1050-40.png)',
	32=>'url(/lapcat/layout/images/1680-1050-31.png)',
	39=>'url(/lapcat/layout/images/1-1-75.png)',
	42=>'url(/lapcat/layout/images/1680-1050-31.png)',
	65=>'url(/lapcat/layout/images/1680-1050-104.png)',
	68=>'url(/lapcat/layout/images/1680-1050-51.png)',
	69=>'url(/lapcat/layout/tiled-images/18-1050-106.png)',
	78=>'url(/lapcat/layout/images/1680-1050-19.png)'
);
$a_SpecialBG=array(
	20=>'url(/lapcat/layout/tiled-images/18-18-103.png)',
	30=>'url(/lapcat/layout/tiled-images/18-18-109.png)',
	40=>'url(/lapcat/layout/tiled-images/18-18-116.png)',
	50=>'url(/lapcat/layout/tiled-images/18-18-113.png)',
	60=>'url(/lapcat/layout/tiled-images/18-18-100.png)', // not done
	70=>'url(/lapcat/layout/tiled-images/18-18-100.png)', // not done
	90=>'url(/lapcat/layout/tiled-images/18-18-114.png)',
	
	21=>'url(/lapcat/layout/transparent-colors/1-1-K-10.png)',
	22=>'url(/lapcat/layout/transparent-colors/1-1-G-50.png)',
	26=>'url(/lapcat/layout/tiled-images/18-18-103.png)',
	28=>'url(/lapcat/layout/tiled-images/18-18-103.png)',
	29=>'url(/lapcat/layout/images/8-1-24.png)',
	32=>'url(/lapcat/layout/tiled-images/18-18-109.png)',
	39=>'url(/lapcat/layout/tiled-images/18-18-101.png)',
	42=>'url(/lapcat/layout/tiled-images/18-18-116.png)',
	65=>'url(/lapcat/layout/tiled-images/18-18-116.png)',
	68=>'url(/lapcat/layout/tiled-images/18-18-117.png)',
	69=>'url(/lapcat/layout/tiled-images/18-18-102.png)',
	78=>'url(/lapcat/layout/tiled-images/18-18-108.png)'
);
$a_OpenLineBG=array(
	21=>'url(/lapcat/layout/transparent-colors/1-1-K-10.png)',
	22=>'url(/lapcat/layout/transparent-colors/1-1-G-10.png)',
	26=>'url(/lapcat/layout/transparent-colors/1-1-K-50.png)',
	28=>'url(/lapcat/layout/transparent-colors/1-1-K-100.png)',
	29=>'url(/lapcat/layout/transparent-colors/1-1-K-100.png)',
	68=>'url(/lapcat/layout/transparent-colors/1-1-K-75.png)'
);
if(isset($_GET['theme'])){
	$v_Theme=$_GET['theme'];
	$v_Theme=22;
	if(isset($_GET['hsl'])){$v_HSL = true;$a_Theme = $a_ThemeHSL;$v_RGBorHSL="hsl";$v_RGBAorHSLA="hsla";$v_hslword = "hsl";}
	//$v_HSL = true;
	if(array_key_exists($v_Theme,$a_BG)){$a_Theme['background']=$a_BG[$v_Theme];}
	if(array_key_exists($v_Theme,$a_SpecialBG)){$a_Theme['special-background']=$a_SpecialBG[$v_Theme];}
	if(array_key_exists($v_Theme,$a_OpenLineBG)){$a_Theme['open-line-background']=$a_OpenLineBG[$v_Theme];}
	
	if( file_exists("cache/".$v_Theme.$v_hslword.".cache") && !isset($_GET["update"]) ){
		$theme = join("",file("cache/".$v_Theme.".cache"));
		echo $theme ."<!-- FROM CACHE //-->" ;
		return;
	}else{
		$v_CSS = "";
		$staticCss = array("static.css");
		foreach($staticCss as $f){$v_CSS .= file_get_contents($f);}
		//include "static.css";
		
		switch($v_Theme){
			// Background - Light
			case '9':
			case '22':case '32':case '42':case '52':case '62':case '72':case '92':case '82':
				if($v_HSL){
					$a_Theme['color']['L']='25,94%,51%';
					$a_Theme['color']['M']='97,51%,33%'; // Darker Green
					$a_Theme['color']['N']='23,31%,43%'; // Darker Brown
				}
				else{
					$a_Theme['color']['L']='250,110,10';
					$a_Theme['color']['M']='70,150,20'; // Darker Green
					$a_Theme['color']['N']='150,100,70'; // Darker Brown
				}
				break;
	
			case '21':case '81':
				$a_Theme['color']['L']='250,110,10';
				$a_Theme['color']['M']='70,150,20'; // Darker Green
				$a_Theme['color']['N']='200,90,5'; // Darker Brown
				break;
	
			default:
				$a_Theme['transparency']['A']='url(/lapcat/layout/transparent-colors/1-1-K-10.png)';
				$a_Theme['transparency']['B']='url(/lapcat/layout/transparent-colors/1-1-K-25.png)';
				$a_Theme['transparency']['C']='url(/lapcat/layout/transparent-colors/1-1-K-50.png)';
				$a_Theme['transparency']['D']='url(/lapcat/layout/transparent-colors/1-1-K-75.png)';
				$a_Theme['transparency']['E']='url(/lapcat/layout/transparent-colors/1-1-K-95.png)';
				$a_Theme['transparency']['F']='url(/lapcat/layout/transparent-colors/1-1-K-100.png)';
				break;
		}
		switch($v_Theme){
			// Base Color - Green
			case '30':case '31':case '32':case '33':case '34':case '35':case '38':case '39':
				if($v_HSL){
					$a_Theme['color']['A']='178,51%,60%'; //0
					$a_Theme['color']['B']='179,43%,53%'; //1
					$a_Theme['color']['C']='179,35%,45%'; //1
					$a_Theme['color']['D']='180,27%,37%'; //2
					$a_Theme['color']['E']='181,20%,30%'; //3
					$a_Theme['color']['F']='186,11%,22%'; //8
					$a_Theme['accent-color']['A']='2,51%,60%'; // Lighter Accent Color
					$a_Theme['accent-color']['B']='2,43%,52%'; // Darker Accent Color
				}else{
					$a_Theme['color']['A']='142,203,80';
					$a_Theme['color']['B']='118,169,67';
					$a_Theme['color']['C']='94,135,54';
					$a_Theme['color']['D']='47,68,27';
					$a_Theme['color']['E']='24,34,13';
					$a_Theme['color']['F']='55,55,35';
					$a_Theme['accent-color']['A']='50,65,75'; // Lighter Accent Color
					$a_Theme['accent-color']['B']='20,190,0'; // Darker Accent Color
				}
				break;
				
			// Base Color - Rose
			case '40':case '41':case '42':case '43':case '44':case '45':case '48':case '49':
				$a_Theme['color']['A']='203,80,142';
				$a_Theme['color']['B']='169,67,118';
				$a_Theme['color']['C']='135,54,94';
				$a_Theme['color']['D']='68,27,47';
				$a_Theme['color']['E']='34,13,24';
				$a_Theme['color']['F']='255,35,155';
				break;
				
			// Base Color - Purple
			case '50':case '51':case '52':case '53':case '54':case '55':case '58':case '59':
				$a_Theme['color']['A']='142,80,203';
				$a_Theme['color']['B']='118,67,169';
				$a_Theme['color']['C']='94,54,135';
				$a_Theme['color']['D']='47,27,68';
				$a_Theme['color']['E']='24,13,34';
				$a_Theme['color']['F']='155,35,255';
				break;
				
			// Base Color - Brown
			case '60':case '61':case '62':case '63':case '64':case '65':case '68':case '69':
				$a_Theme['color']['A']='210,150,90';
				$a_Theme['color']['B']='175,125,75';
				$a_Theme['color']['C']='140,100,60';
				$a_Theme['color']['D']='105,75,45';
				$a_Theme['color']['E']='70,50,30';
				$a_Theme['color']['F']='35,25,15';
				$a_Theme['accent-color']['A']='250,165,75'; // Lighter Accent Color
				$a_Theme['accent-color']['B']='200,90,0'; // Darker Accent Color
			break;
				
			// Base Color - Red
			case '70':case '71':case '72':case '73':case '74':case '75':case '78':case '79':
				$a_Theme['color']['A']='223,42,40';
				$a_Theme['color']['B']='189,18,27';
				$a_Theme['color']['C']='155,0,14';
				$a_Theme['color']['D']='88,0,0';
				$a_Theme['color']['E']='54,0,0';
				$a_Theme['color']['F']='255,55,0';
			break;
			
			//Thanks a latte
			case '80':case '81':case '82':case '83':case '84':case '85':case '88':case '89':
				if($v_HSL){
					$a_Theme['color']['A']='43,60%,22%'; //0
					$a_Theme['color']['B']='223,40%,22%'; //1
					$a_Theme['color']['C']='43,30%,22%'; //1
					$a_Theme['color']['D']='223,27%,22%'; //2
					$a_Theme['color']['E']='43,20%,22%'; //3
					$a_Theme['color']['F']='223,11%,22%'; //8
					$a_Theme['accent-color']['A']='43,60%,60%'; // Lighter Accent Color
					$a_Theme['accent-color']['B']='223,43%,52%'; // Darker Accent Color
				}else{
					$a_Theme['color']['A']='142,203,80';
					$a_Theme['color']['B']='118,169,67';
					$a_Theme['color']['C']='94,135,54';
					$a_Theme['color']['D']='47,68,27';
					$a_Theme['color']['E']='24,34,13';
					$a_Theme['color']['F']='55,55,35';
					$a_Theme['accent-color']['A']='50,65,75'; // Lighter Accent Color
					$a_Theme['accent-color']['B']='20,190,0'; // Darker Accent Color
				}
				break;
	
			// Base Color - Teal
			case '90':case '91':case '92':case '93':case '94':case '95':case '98':case '99':
				$a_Theme['color']['A']='80,203,142';
				$a_Theme['color']['B']='67,169,118';
				$a_Theme['color']['C']='54,135,94';
				$a_Theme['color']['D']='27,68,47';
				$a_Theme['color']['E']='13,34,24';
				$a_Theme['color']['F']='35,255,155';
				break;
				
			default:
				break;
		}
	}
	
	//start using the colors that were picked
	$a_CSS=array(
		'A'=>' background-image:url(/lapcat/layout/images/1-13-0.png); background-repeat:repeat-x;',
		'B'=>' border:1px solid rgb(0,0,0); border:1px solid rgb(0,0,0,1.0);',
		'C'=>' background-image:'.$a_Theme['special-background'].';',
		'D'=>' background-image:'.$a_Theme['open-line-background'].';'
	);
	
	/* Test to see if the color profile needs to be returns as json.  If it does then just die out */
	if(isset($_GET['json'])){
		$jsonReturn = array('colors'=>$a_Theme);
		echo json_encode($jsonReturn);
		return;
	}

	// B o r d e r s
	// Border - A
	
	//Translucent borders
	$v_CSS .= '.border-all-I-1-35{border:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.35);}';
	$v_CSS .= '.border-all-I-1-65{border:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.65);}';
	$v_CSS .= '.border-bottom-I-1-35{border-bottom:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.35);}';
	$v_CSS .= '.border-bottom-I-1-65{border-bottom:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.65);}';
	$v_CSS .= '.border-left-I-1-35{border-left:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.35);}';
	$v_CSS .= '.border-left-I-1-65{border-left:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.65);}';
	$v_CSS .= '.border-right-I-1-35{border-right:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.35);}';
	$v_CSS .= '.border-right-I-1-65{border-right:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.65);}';
	$v_CSS .= '.border-top-I-1-35{border-top:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.35);}';
	$v_CSS .= '.border-top-I-1-65{border-top:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['I'].',0.65);}';


	foreach ($a_colorNameArray as $value){
		if(isset($a_Theme['color'][$value])){ //best not generate them if they are not needed
			// B o r d e r s
			$v_CSS .= '.border-all-'.$value.'-1{border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color'][$value].');}';
			$v_CSS .= '.border-all-'.$value.'-2{border:2px solid '.$v_RGBorHSL.'('.$a_Theme['color'][$value].');}';	
			$v_CSS .= '.border-bottom-'.$value.'-1{border-bottom:1px solid '.$v_RGBorHSL.'('.$a_Theme['color'][$value].');}';
			$v_CSS .= '.border-left-'.$value.'-1{border-left:1px solid '.$v_RGBorHSL.'('.$a_Theme['color'][$value].');}';
			$v_CSS .= '.border-right-'.$value.'-1{border-right:1px solid '.$v_RGBorHSL.'('.$a_Theme['color'][$value].');}';
			$v_CSS .= '.border-sides-'.$value.'-1{border-left:1px solid '.$v_RGBorHSL.'('.$a_Theme['color'][$value].'); border-right:1px solid '.$v_RGBorHSL.'('.$a_Theme['color'][$value].');}';
			$v_CSS .= '.border-top-'.$value.'-1{border-top:1px solid '.$v_RGBorHSL.'('.$a_Theme['color'][$value].');}';
			// C o l o r s
			$v_CSS .= '.color-'.$value.'-1{background-color:'.$v_RGBorHSL.'('.$a_Theme['color'][$value].');}';
			$v_CSS .= '.color-'.$value.'-2{background-color:'.$v_RGBorHSL.'('.$a_Theme['color'][$value].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color'][$value].',0.8);}';
			$v_CSS .= '.color-'.$value.'-3{background-color:'.$v_RGBorHSL.'('.$a_Theme['color'][$value].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color'][$value].',0.6);}';
			$v_CSS .= '.color-'.$value.'-4{background-color:'.$v_RGBorHSL.'('.$a_Theme['color'][$value].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color'][$value].',0.3);}';
			// Font
			$v_CSS .= '.font-'.$value.'{color:'.$v_RGBorHSL.'('.$a_Theme['color'][$value].');}';
			
			// E f f e c t s
			// Effect - Hover
			$v_CSS .= '.effect-hover-'.$value.'-1:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color'][$value].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color'][$value].',1.00);}';
			$v_CSS .= '.effect-hover-'.$value.'-2:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color'][$value].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color'][$value].',0.65);}';
			$v_CSS .= '.effect-hover-'.$value.'-3:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color'][$value].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color'][$value].',0.35);}';
		}
	}
	
	//switch that sets some values to be either light or dark
	switch($v_Theme){
		case '9':
		case '21': case '22':case '32':case '42':case '52':case '62':case '72':case '92': case '82':
		
			$v_CSS .= '.LAPCAT-image{background-image:url(/lapcat/images/100-18-1.png); background-repeat:no-repeat;}';
			// L i g h t
			// Default Font Color
			$v_CSS .= '	a, font{color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].');	}';
			// Effect
			$v_CSS .= '.effect-hover-X-1:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.effect-hover-X-2:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.8);}';
			$v_CSS .= '.effect-hover-X-3:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.6);}';
			$v_CSS .= '.effect-hover-X-4:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.3);}';
			$v_CSS .= '.effect-hover-Z-1:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].');}';
			$v_CSS .= '.effect-hover-Z-1-35:hover{background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['A'].',0.35);}';
			$v_CSS .= '.effect-hover-Z-1-65:hover{background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['A'].',0.65);}';
			$v_CSS .= '.effect-hover-Z-2:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['A'].',0.8);}';
			$v_CSS .= '.effect-hover-Z-3:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['A'].',0.6);}';
			$v_CSS .= '.effect-hover-Z-4:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['A'].',0.3);}';
			// Color - G
			$v_CSS .= '.color-X-1{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.color-X-2{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.8);}';
			$v_CSS .= '.color-X-3{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.6);}';
			$v_CSS .= '.color-X-4{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.3);}';
			$v_CSS .= '.color-Y-1{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.color-Y-2{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.8);}';
			$v_CSS .= '.color-Y-3{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.6);}';
			$v_CSS .= '.color-Y-4{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.3);}';
			$v_CSS .= '.color-Z-1{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].');}';
			$v_CSS .= '.color-Z-2{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['A'].',0.8);}';
			$v_CSS .= '.color-Z-3{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['A'].',0.6);}';
			$v_CSS .= '.color-Z-4{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['A'].',0.3);}';
			// Borders
			$v_CSS .= '.border-all-X-1{border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.border-all-X-2{border:2px solid '.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.border-bottom-X-1{border-bottom:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.border-left-X-1{border-left:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.border-right-X-1{border-right:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.border-sides-X-1{border-left:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); border-right:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.border-top-X-1{border-top:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.border-all-Z-1{border:1px solid '.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].');}';
			// Fonts
			$v_CSS .= '.font-X{color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.font-Y{color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.font-Z{color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].');}';
			$v_CSS .= '.menu-highlight{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].');}';
			$v_CSS .= '.menu-normal{background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.8);}';

			// Shadow or Light X - Down / Up (for Light)
			$v_CSS .= '.shadow-or-light-X-down{background-image:url(/lapcat/layout/icons/16-16-26.png); background-repeat:repeat-x;}';
			$v_CSS .= '.shadow-or-light-X-up{background-image:url(/lapcat/layout/icons/16-16-27.png); background-repeat:repeat-x;}';
			// Shadow or Light Y - Down / Up (for Light)
			$v_CSS .= '.shadow-or-light-Y-down{background-image:url(/lapcat/layout/icons/16-16-31.png); background-repeat:repeat-x;}';
			$v_CSS .= '.shadow-or-light-Y-up{background-image:url(/lapcat/layout/icons/16-16-29.png); background-repeat:repeat-x;}';
			// Open Line
			$v_CSS .= '.open-line{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['D'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.10); border:1px solid rgba(76,76,76,0.35); cursor:pointer; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
			$v_CSS .= '.open-line:hover{background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.15);}';

		break;
		// D a r k		
		case '29':case '39':case '49':case '59':case '69':case '79':case '99':default:
			$v_CSS .= '.LAPCAT-image{background-image:url(/lapcat/images/100-18-0.png); background-repeat:no-repeat;}';
			// Link - Open Line
			$v_CSS .= '.open-line{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['B'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['B'].',0.35);}';
			// Shadow or Light - Down / Up (for Dark)
			$v_CSS .= '.shadow-or-light-X-down{background-image:url(/lapcat/layout/icons/16-16-31.png); background-repeat:repeat-x;}';
			$v_CSS .= '.shadow-or-light-X-up{background-image:url(/lapcat/layout/icons/16-16-29.png); background-repeat:repeat-x;}';
			// Shadow or Light - Down / Up (for Dark)
			$v_CSS .= '.shadow-or-light-Y-down{background-image:url(/lapcat/layout/icons/16-16-26.png); background-repeat:repeat-x;}';
			$v_CSS .= '.shadow-or-light-Y-up{background-image:url(/lapcat/layout/icons/16-16-27.png); background-repeat:repeat-x;}';
		
			// Default Font Color
			$v_CSS .= 'a, font{color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			// Effect
			$v_CSS .= '.effect-hover-X-1:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.effect-hover-X-2:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.8);}';
			$v_CSS .= '.effect-hover-X-3:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.6);}';
			$v_CSS .= '.effect-hover-X-4:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.3);}';
			$v_CSS .= '.effect-hover-Z-1:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].');}';
			$v_CSS .= '.effect-hover-Z-1-35:hover{background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['B'].',0.35);}';
			$v_CSS .= '.effect-hover-Z-1-65:hover{background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['B'].',0.65);}';
			$v_CSS .= '.effect-hover-Z-2:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['B'].',0.8);}';
			$v_CSS .= '.effect-hover-Z-3:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['B'].',0.6);}';
			$v_CSS .= '.effect-hover-Z-4:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['B'].',0.3);}';
			// Color
			$v_CSS .= '.color-X-1{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.color-X-2{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.8);}';
			$v_CSS .= '.color-X-3{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.6);}';
			$v_CSS .= '.color-X-4{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['K'].',0.3);}';
			$v_CSS .= '.color-Y-1{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.color-Y-2{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.8);}';
			$v_CSS .= '.color-Y-3{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.6);}';
			$v_CSS .= '.color-Y-4{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.3);}';
			$v_CSS .= '.color-Z-1{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].');}';
			$v_CSS .= '.color-Z-2{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['B'].',0.8);}';
			$v_CSS .= '.color-Z-3{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['B'].',0.6);}';
			$v_CSS .= '.color-Z-4{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['accent-color']['B'].',0.3);}';
			// Border
			$v_CSS .= '.border-all-X-1{border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.border-all-X-2{border:2px solid '.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.border-bottom-X-1{border-bottom:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.border-left-X-1{border-left:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.border-right-X-1{border-right:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.border-sides-X-1{border-left:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); border-right:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.border-top-X-1{border-top:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.border-all-Z-1{border:1px solid '.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].');}';
			// Font
			$v_CSS .= '.font-X{color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
			$v_CSS .= '.font-Y{color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';
			$v_CSS .= '.font-Z{color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].');}';

			$v_CSS .= '.menu-highlight{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].');}';
			$v_CSS .= '.menu-normal{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['F'].');}';
			// Open Line
			$v_CSS .= '.open-line{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['D'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.10); border:1px solid '.$v_RGBAorHSLA.'(76,76,76,0.35); cursor:pointer; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
			$v_CSS .= '.open-line:hover{background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['G'].',0.15);}';

		break;
	}

	$v_CSS .= '.color-M-1{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['M'].');}';
	
	$v_CSS .= '.catalog-link{color:'.$v_RGBorHSL.'(125,125,255);}';

	// B a c k g r o u n d s
	// Background - Special I
	$v_CSS .= '.background-special-1{'.$a_CSS['C'].'}';
	$v_CSS .= '.background-open-line-1{'.$a_CSS['D'].'}';
	$v_CSS .= '.background-alpha-1{background-image:'.$a_Theme['transparency']['F'].'; background-repeat:repeat;}';
	$v_CSS .= '.background-alpha-2{background-image:'.$a_Theme['transparency']['E'].'; background-repeat:repeat;}';
	$v_CSS .= '.background-alpha-3{background-image:'.$a_Theme['transparency']['D'].'; background-repeat:repeat;}';
	$v_CSS .= '.background-alpha-4{background-image:'.$a_Theme['transparency']['C'].'; background-repeat:repeat;}';
	$v_CSS .= '.background-alpha-5{background-image:'.$a_Theme['transparency']['B'].'; background-repeat:repeat;}';
	$v_CSS .= '.background-alpha-6{background-image:'.$a_Theme['transparency']['A'].'; background-repeat:repeat;}';

	// F o n t s
	// Font - Default
	$v_CSS .= '.font-bold{font-weight:bold;}';
	$v_CSS .= '.font-italic{font-style:italic;}';
	$v_CSS .= '.font-fake{font-family:Arial, Helvetica, sans-serif;}';
	
	// D r o p d o w n s
	// Dropdown - A
	$v_CSS .= '.dropdown-A-1{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['A'].'); color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].');}';
	$v_CSS .= '.dropdown-A-2{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['G'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['A'].'); color:'.$v_RGBorHSL.'('.$a_Theme['color']['K'].');}';

	$v_CSS .= '.dropdown{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['F'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['A'].'); color:rgb(255,255,255);}';
	$v_CSS .= '.dropdown-black{background-color:rgb(0,0,0); border:1px solid rgb(26,26,26); color:rgb(255,255,255);}';
	
	// E f f e c t s

	$v_CSS .= '.fake-link{cursor:pointer;}';
	$v_CSS .= '.color-blue{background-color:rgb(0,13,52);}';
	$v_CSS .= '.border-blue{border:1px solid rgb(0,13,119);}';
	
	// Button - Theme
	$v_CSS .= '.button-theme{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['F'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['C'].'); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	$v_CSS .= '.button-theme:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['D'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['A'].');}';
	// Button - Accent
	$v_CSS .= '.button-accent{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['N'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['L'].'); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	$v_CSS .= '.button-accent:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['L'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['L'].');}';

	// Button - Current Page
	$v_CSS .= '.current-page-button{background-color:'.$v_RGBorHSL.'('.$a_Theme['accent-color']['B'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['accent-color']['A'].'); vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';

	$v_CSS .= '.calendar-cell{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['C'].');}';

	// Background
	$v_CSS .= '.image-background{background-image:'.$a_Theme['background'].'; background-repeat:repeat;}';

	// Color
	// A
	$v_CSS .= '.line{background-image:none; -moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; -moz-border-radius-bottomleft:6px; -webkit-border-bottom-left-radius:6px; border-bottom-left-radius:6px; border-top-left-radius:6px; border:1px solid '.$v_RGBAorHSLA.'('.$a_Theme['color']['A'].',0);}';
	// B
	$v_CSS .= '.next-button{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['B'].'); cursor:pointer;}';

	$v_CSS .= '.dropbutton{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['B'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['B'].'); color:rgb(255,255,255); cursor:pointer; -moz-border-radius:6px; -webkit-border-radius:6px; border-radius:6px;}';
	// C
	$v_CSS .= '.option-theme{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['C'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['C'].',1.0);'.$a_CSS['A'].$a_CSS['B'].'}';
	$v_CSS .= '.line:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['C'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['C'].',0.6); cursor:pointer;}';
	// D
	// E
	$v_CSS .= '.OL-fred{border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['D'].');}';
	$v_CSS .= '.option-selected{-moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; -moz-border-radius-topright:6px; -webkit-border-top-right-radius:6px; border-top-left-radius:6px; border-top-right-radius:6px; background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['D'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['F'].'); border-bottom:0; cursor:pointer;}';
	// F
	$v_CSS .= '.option-empty{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['E'].');'.$a_CSS['A'].$a_CSS['B'].'}';
	$v_CSS .= '.option-theme:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['F'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['F'].',1.0);}';
	// G
	$v_CSS .= '.calendar-cell:hover, .next-button:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['C'].');}';
	$v_CSS .= '.dropbutton:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['F'].'); border:1px solid '.$v_RGBorHSL.'('.$a_Theme['color']['F'].'); color:rgb(255,255,255);}';
	$v_CSS .= '.hotkey{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['F'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['F'].',0.3);}';
	$v_CSS .= '.hotkey:hover{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['F'].'); background-color:'.$v_RGBAorHSLA.'('.$a_Theme['color']['F'].',0.6);}';
	$v_CSS .= '.notice .close{background-color:'.$v_RGBorHSL.'('.$a_Theme['color']['F'].'); position:absolute; top:2px; right:2px; display:block; width:14px; height:13px;}';

	// Font
	$v_CSS .= '.option-selected font{color:'.$v_RGBorHSL.'('.$a_Theme['color']['B'].');}';
	$v_CSS .= '.option-selected:hover font{color:'.$v_RGBorHSL.'('.$a_Theme['color']['C'].');}';
	echo compress($v_CSS)."<!-- NOT CACHED //-->";
	file_put_contents("cache/".$v_Theme.$v_hslword.".cache", "<!-- CACHED on ".date("D.M.Y")." //-->" .compress($v_CSS));

}
if(extension_loaded('zlib')){ob_end_flush();}
?>