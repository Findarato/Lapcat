<?
header('content-type:text/css'); 
header("Expires: ".gmdate("D, d M Y H:i:s", (time()+900000)) . " GMT"); 
header('content-type:text/css'); header("Expires: ".time(). " GMT"); 
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
		'N'=>'250,200,100'  // Basic Color II - Orange
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
	$v_Theme=21;
	if(array_key_exists($v_Theme,$a_BG)){$a_Theme['background']=$a_BG[$v_Theme];}
	if(array_key_exists($v_Theme,$a_SpecialBG)){$a_Theme['special-background']=$a_SpecialBG[$v_Theme];}
	if(array_key_exists($v_Theme,$a_OpenLineBG)){$a_Theme['open-line-background']=$a_OpenLineBG[$v_Theme];}

	
	switch($v_Theme){
		// Background - Light
		case '9':
		case '22':case '32':case '42':case '52':case '62':case '72':case '92':case '82':
			$a_Theme['color']['L']='250,110,10';
			$a_Theme['color']['M']='70,150,20'; // Darker Green
			$a_Theme['color']['N']='150,100,70'; // Darker Brown
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
			$a_Theme['color']['A']='142,203,80';
			$a_Theme['color']['B']='118,169,67';
			$a_Theme['color']['C']='94,135,54';
			$a_Theme['color']['D']='47,68,27';
			$a_Theme['color']['E']='24,34,13';
			$a_Theme['color']['F']='55,55,35';
			$a_Theme['accent-color']['A']='50,65,75'; // Lighter Accent Color
			$a_Theme['accent-color']['B']='20,190,0'; // Darker Accent Color
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
			/*
			$a_Theme['color']['A']='203,142,80';
			$a_Theme['color']['B']='169,118,67';
			$a_Theme['color']['C']='135,94,54';
			$a_Theme['color']['D']='68,47,27';
			$a_Theme['color']['E']='34,24,13';
			$a_Theme['color']['F']='255,155,35';
			*/
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
			//FFF6B8, ABCCA7, 403529, 7A5E2F, A68236
			
			//342326, 948F70, C4C596, F4FABA, 9A9352
			$a_Theme['color']['A']='171,204,167';
			$a_Theme['color']['B']='255,246,184';
			$a_Theme['color']['C']='166,130,54';
			$a_Theme['color']['D']='122,94,47';
			$a_Theme['color']['F']='64,53,41';
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

$a_CSS=array(
	'A'=>' background-image:url(/lapcat/layout/images/1-13-0.png); background-repeat:repeat-x;',
	'B'=>' border:1px solid rgb(0,0,0); border:1px solid rgba(0,0,0,1.0);',
	'C'=>' background-image:'.$a_Theme['special-background'].';',
	'D'=>' background-image:'.$a_Theme['open-line-background'].';'
);
if(isset($_GET['json'])){
	$jsonReturn = array('colors'=>$a_Theme);
	echo json_encode($jsonReturn);
}else{
	/* Box Size */
	echo '.inside-border{-moz-box-sizing:border-box; -webkit-box-sizing:border-box; box-sizing:border-box;}';
	// D e f a u l t s
	//echo '.round-corners{-moz-border-radius:4px;-webkit-border-radius:4px;}';
	echo '.info-black{background-color:rgb(255,255,255); background-color:rgba(255,255,255,0.5); border:1px solid rgb(235,235,255); border:1px solid rgba(235,235,255,0.65);}';
	echo '#purr-container{position:fixed; top:27px; right:7px; z-index:8;}';
	echo '.notice{position:relative; width:188px; margin-bottom:6px;}';
	echo '.notice-body{text-align:left; min-height: 65px; padding: 2px 2px 2px 2px;}';
	echo '.notice-body h3{margin:0; font-size:1.1em;}';

	// F l o a t s
	// Float - Left / Right
	echo '.float-left{float:left;}';
	echo '.float-right{float:right;}';

	// L i n k s   ( w i t h   I m a g e s )
	// Link - Library
	echo '.library-link-1{padding-bottom:3px; padding-left:20px; background:url(http://cdn1.lapcat.org/famfamfam/silk/building.png) no-repeat 0 50%; text-decoration:none;}';
	echo '.library-link-2{padding-bottom:3px; padding-left:20px; background:url(http://cdn1.lapcat.org/famfamfam/silk/building.png) no-repeat 0 50%; text-decoration:underline;}';
	echo '.library-link-3{padding-bottom:3px; padding-left:20px; background:url(http://cdn1.lapcat.org/famfamfam/silk/building_go.png) no-repeat 0 50%; text-decoration:none;}';
	// Link - User
	echo '.user-link-1{padding-bottom:3px; padding-left:20px; background:url(http://cdn1.lapcat.org/famfamfam/silk/user.png) no-repeat 0 50%; text-decoration:none;}';
	echo '.user-link-2{padding-bottom:3px; padding-left:20px; background:url(http://cdn1.lapcat.org/famfamfam/silk/user.png) no-repeat 0 50%; text-decoration:underline;}';

	// C o r n e r s
	// Corner - Bottom
	echo '.corners-bottom-1{-moz-border-radius-bottomleft:2px; -webkit-border-bottom-left-radius:2px; -moz-border-radius-bottomright:2px; -webkit-border-bottom-right-radius:2px; border-bottom-left-radius:2px; border-bottom-right-radius:2px;}';
	echo '.corners-bottom-2{-moz-border-radius-bottomleft:4px; -webkit-border-bottom-left-radius:4px; -moz-border-radius-bottomright:4px; -webkit-border-bottom-right-radius:4px; border-bottom-left-radius:4px; border-bottom-right-radius:4px;}';
	echo '.corners-bottom-3{-moz-border-radius-bottomleft:6px; -webkit-border-bottom-left-radius:6px; -moz-border-radius-bottomright:6px; -webkit-border-bottom-right-radius:6px; border-bottom-left-radius:6px; border-bottom-right-radius:6px;}';
	// Corner - Bottom Left
	echo '.corners-bottom-left-1{-moz-border-radius-bottomleft:2px; -webkit-border-bottom-left-radius:2px; border-bottom-left-radius:2px;}';
	echo '.corners-bottom-left-2{-moz-border-radius-bottomleft:4px; -webkit-border-bottom-left-radius:4px; border-bottom-left-radius:4px;}';
	echo '.corners-bottom-left-3{-moz-border-radius-bottomleft:6px; -webkit-border-bottom-left-radius:6px; border-bottom-left-radius:6px;}';
	// Corner - Left
	echo '.corners-left-1{-moz-border-radius-bottomleft:2px; -webkit-border-bottom-left-radius:2px; -moz-border-radius-topleft:2px; -webkit-border-top-left-radius:2px; border-bottom-left-radius:2px; border-top-left-radius:2px;}';
	echo '.corners-left-2{-moz-border-radius-bottomleft:4px; -webkit-border-bottom-left-radius:4px; -moz-border-radius-topleft:4px; -webkit-border-top-left-radius:4px; border-bottom-left-radius:4px; border-top-left-radius:4px;}';
	echo '.corners-left-3{-moz-border-radius-bottomleft:6px; -webkit-border-bottom-left-radius:6px; -moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; border-bottom-left-radius:6px; border-top-left-radius:6px;}';
	// Corner - Right
	echo '.corners-right-1{-moz-border-radius-bottomright:2px; -webkit-border-bottom-right-radius:2px; -moz-border-radius-topright:2px; -webkit-border-top-right-radius:2px;}';
	echo '.corners-right-2{-moz-border-radius-bottomright:4px; -webkit-border-bottom-right-radius:4px; -moz-border-radius-topright:2px; -webkit-border-top-right-radius:2px;}';
	echo '.corners-right-3{-moz-border-radius-bottomright:6px; -webkit-border-bottom-right-radius:6px; -moz-border-radius-topright:2px; -webkit-border-top-right-radius:2px;}';
	// Corner - Top
	echo '.corners-top-1{-moz-border-radius-topleft:2px; -webkit-border-top-left-radius:2px; -moz-border-radius-topright:2px; -webkit-border-top-right-radius:2px; border-top-left-radius:2px; border-top-right-radius:2px;}';
	echo '.corners-top-2{-moz-border-radius-topleft:4px; -webkit-border-top-left-radius:4px; -moz-border-radius-topright:4px; -webkit-border-top-right-radius:4px; border-top-left-radius:4px; border-top-right-radius:4px;}';
	echo '.corners-top-3{-moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; -moz-border-radius-topright:6px; -webkit-border-top-right-radius:6px; border-top-left-radius:6px; border-top-right-radius:6px;}';
	// Corner - Top Left
	echo '.corners-top-left-1{-moz-border-radius-topleft:2px; -webkit-border-top-left-radius:2px; border-top-left-radius:2px;}';
	echo '.corners-top-left-2{-moz-border-radius-topleft:4px; -webkit-border-top-left-radius:4px; border-top-left-radius:4px;}';
	echo '.corners-top-left-3{-moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; border-top-left-radius:6px;}';
	// Corner - Top Right
	echo '.corners-top-right-1{-moz-border-radius-topright:2px; -webkit-border-top-right-radius:2px; border-top-right-radius:2px;}';
	echo '.corners-top-right-2{-moz-border-radius-topright:4px; -webkit-border-top-right-radius:4px; border-top-right-radius:4px;}';
	echo '.corners-top-right-3{-moz-border-radius-topright:6px; -webkit-border-top-right-radius:6px; border-top-right-radius:6px;}';

	// B o r d e r s
	// Border - A
	echo '.border-all-A-1{border:1px solid rgb('.$a_Theme['color']['A'].');}';
	echo '.border-all-A-2{border:2px solid rgb('.$a_Theme['color']['A'].');}';
	echo '.border-bottom-A-1{border-bottom:1px solid rgb('.$a_Theme['color']['A'].');}';
	echo '.border-left-A-1{border-left:1px solid rgb('.$a_Theme['color']['A'].');}';
	echo '.border-right-A-1{border-right:1px solid rgb('.$a_Theme['color']['A'].');}';
	echo '.border-sides-A-1{border-left:1px solid rgb('.$a_Theme['color']['A'].'); border-right:1px solid rgb('.$a_Theme['color']['A'].');}';
	echo '.border-top-A-1{border-top:1px solid rgb('.$a_Theme['color']['A'].');}';
	// Border - B
	echo '.border-all-B-1{border:1px solid rgb('.$a_Theme['color']['B'].');}';
	echo '.border-all-B-2{border:2px solid rgb('.$a_Theme['color']['B'].');}';
	echo '.border-bottom-B-1{border-bottom:1px solid rgb('.$a_Theme['color']['B'].');}';
	echo '.border-left-B-1{border-left:1px solid rgb('.$a_Theme['color']['B'].');}';
	echo '.border-right-B-1{border-right:1px solid rgb('.$a_Theme['color']['B'].');}';
	echo '.border-sides-B-1{border-left:1px solid rgb('.$a_Theme['color']['B'].'); border-right:1px solid rgb('.$a_Theme['color']['B'].');}';
	echo '.border-top-B-1{border-top:1px solid rgb('.$a_Theme['color']['B'].');}';
	// Border - C
	echo '.border-all-C-1{border:1px solid rgb('.$a_Theme['color']['C'].');}';
	echo '.border-all-C-2{border:2px solid rgb('.$a_Theme['color']['C'].');}';
	echo '.border-bottom-C-1{border-bottom:1px solid rgb('.$a_Theme['color']['C'].');}';
	echo '.border-left-C-1{border-left:1px solid rgb('.$a_Theme['color']['C'].');}';
	echo '.border-right-C-1{border-right:1px solid rgb('.$a_Theme['color']['C'].');}';
	echo '.border-sides-C-1{border-left:1px solid rgb('.$a_Theme['color']['C'].'); border-right:1px solid rgb('.$a_Theme['color']['C'].');}';
	echo '.border-top-C-1{border-top:1px solid rgb('.$a_Theme['color']['C'].');}';
	// Border - D
	echo '.border-all-D-1{border:1px solid rgb('.$a_Theme['color']['D'].');}';
	echo '.border-all-D-2{border:2px solid rgb('.$a_Theme['color']['D'].');}';
	echo '.border-bottom-D-1{border-bottom:1px solid rgb('.$a_Theme['color']['D'].');}';
	echo '.border-left-D-1{border-left:1px solid rgb('.$a_Theme['color']['D'].');}';
	echo '.border-right-D-1{border-right:1px solid rgb('.$a_Theme['color']['D'].');}';
	echo '.border-sides-D-1{border-left:1px solid rgb('.$a_Theme['color']['D'].'); border-right:1px solid rgb('.$a_Theme['color']['D'].');}';
	echo '.border-top-D-1{border-top:1px solid rgb('.$a_Theme['color']['D'].');}';
	// Border - E
	echo '.border-all-E-1{border:1px solid rgb('.$a_Theme['color']['E'].');}';
	echo '.border-all-E-2{border:2px solid rgb('.$a_Theme['color']['E'].');}';
	echo '.border-bottom-E-1{border-bottom:1px solid rgb('.$a_Theme['color']['E'].');}';
	echo '.border-left-E-1{border-left:1px solid rgb('.$a_Theme['color']['E'].');}';
	echo '.border-right-E-1{border-right:1px solid rgb('.$a_Theme['color']['E'].');}';
	echo '.border-sides-E-1{border-left:1px solid rgb('.$a_Theme['color']['E'].'); border-right:1px solid rgb('.$a_Theme['color']['E'].');}';
	echo '.border-top-E-1{border-top:1px solid rgb('.$a_Theme['color']['E'].');}';
	// Border - F
	echo '.border-all-F-1{border:1px solid rgb('.$a_Theme['color']['F'].');}';
	echo '.border-all-F-2{border:2px solid rgb('.$a_Theme['color']['F'].');}';
	echo '.border-bottom-F-1{border-bottom:1px solid rgb('.$a_Theme['color']['F'].');}';
	echo '.border-left-F-1{border-left:1px solid rgb('.$a_Theme['color']['F'].');}';
	echo '.border-right-F-1{border-right:1px solid rgb('.$a_Theme['color']['F'].');}';
	echo '.border-sides-F-1{border-left:1px solid rgb('.$a_Theme['color']['F'].'); border-right:1px solid rgb('.$a_Theme['color']['F'].');}';
	echo '.border-top-F-1{border-top:1px solid rgb('.$a_Theme['color']['F'].');}';
	// Border - G
	echo '.border-all-G-1{border:1px solid rgb('.$a_Theme['color']['G'].');}';
	echo '.border-all-G-2{border:2px solid rgb('.$a_Theme['color']['G'].');}';
	echo '.border-bottom-G-1{border-bottom:1px solid rgb('.$a_Theme['color']['G'].');}';
	echo '.border-left-G-1{border-left:1px solid rgb('.$a_Theme['color']['G'].');}';
	echo '.border-right-G-1{border-right:1px solid rgb('.$a_Theme['color']['G'].');}';
	echo '.border-sides-G-1{border-left:1px solid rgb('.$a_Theme['color']['G'].'); border-right:1px solid rgb('.$a_Theme['color']['G'].');}';
	echo '.border-top-G-1{border-top:1px solid rgb('.$a_Theme['color']['G'].');}';
	// Border - H
	echo '.border-all-H-1{border:1px solid rgb('.$a_Theme['color']['H'].');}';
	echo '.border-all-H-2{border:2px solid rgb('.$a_Theme['color']['H'].');}';
	echo '.border-bottom-H-1{border-bottom:1px solid rgb('.$a_Theme['color']['H'].');}';
	echo '.border-left-H-1{border-left:1px solid rgb('.$a_Theme['color']['H'].');}';
	echo '.border-right-H-1{border-right:1px solid rgb('.$a_Theme['color']['H'].');}';
	echo '.border-sides-H-1{border-left:1px solid rgb('.$a_Theme['color']['H'].'); border-right:1px solid rgb('.$a_Theme['color']['H'].');}';
	echo '.border-top-H-1{border-top:1px solid rgb('.$a_Theme['color']['H'].');}';
	// Border - I
	echo '.border-all-I-1{border:1px solid rgb('.$a_Theme['color']['I'].');}';
	echo '.border-all-I-2{border:2px solid rgb('.$a_Theme['color']['I'].');}';
	echo '.border-bottom-I-1{border-bottom:1px solid rgb('.$a_Theme['color']['I'].');}';
	echo '.border-left-I-1{border-left:1px solid rgb('.$a_Theme['color']['I'].');}';
	echo '.border-right-I-1{border-right:1px solid rgb('.$a_Theme['color']['I'].');}';
	echo '.border-sides-I-1{border-left:1px solid rgb('.$a_Theme['color']['I'].'); border-right:1px solid rgb('.$a_Theme['color']['I'].');}';
	echo '.border-top-I-1{border-top:1px solid rgb('.$a_Theme['color']['I'].');}';
	// Border - J
	echo '.border-all-J-1{border:1px solid rgb('.$a_Theme['color']['J'].');}';
	echo '.border-all-J-2{border:2px solid rgb('.$a_Theme['color']['J'].');}';
	echo '.border-bottom-J-1{border-bottom:1px solid rgb('.$a_Theme['color']['J'].');}';
	echo '.border-left-J-1{border-left:1px solid rgb('.$a_Theme['color']['J'].');}';
	echo '.border-right-J-1{border-right:1px solid rgb('.$a_Theme['color']['J'].');}';
	echo '.border-sides-J-1{border-left:1px solid rgb('.$a_Theme['color']['J'].'); border-right:1px solid rgb('.$a_Theme['color']['J'].');}';
	echo '.border-top-J-1{border-top:1px solid rgb('.$a_Theme['color']['J'].');}';
	// Border - K
	echo '.border-all-K-1{border:1px solid rgb('.$a_Theme['color']['K'].');}';
	echo '.border-all-K-2{border:2px solid rgb('.$a_Theme['color']['K'].');}';
	echo '.border-bottom-K-1{border-bottom:1px solid rgb('.$a_Theme['color']['K'].');}';
	echo '.border-left-K-1{border-left:1px solid rgb('.$a_Theme['color']['K'].');}';
	echo '.border-right-K-1{border-right:1px solid rgb('.$a_Theme['color']['K'].');}';
	echo '.border-sides-K-1{border-left:1px solid rgb('.$a_Theme['color']['K'].'); border-right:1px solid rgb('.$a_Theme['color']['K'].');}';
	echo '.border-top-K-1{border-top:1px solid rgb('.$a_Theme['color']['K'].');}';

	echo '.border-all-I-1-35{border:1px solid rgba('.$a_Theme['color']['I'].',0.35);}';
	echo '.border-all-I-1-65{border:1px solid rgba('.$a_Theme['color']['I'].',0.65);}';
	echo '.border-bottom-I-1-35{border-bottom:1px solid rgba('.$a_Theme['color']['I'].',0.35);}';
	echo '.border-bottom-I-1-65{border-bottom:1px solid rgba('.$a_Theme['color']['I'].',0.65);}';
	echo '.border-left-I-1-35{border-left:1px solid rgba('.$a_Theme['color']['I'].',0.35);}';
	echo '.border-left-I-1-65{border-left:1px solid rgba('.$a_Theme['color']['I'].',0.65);}';
	echo '.border-right-I-1-35{border-right:1px solid rgba('.$a_Theme['color']['I'].',0.35);}';
	echo '.border-right-I-1-65{border-right:1px solid rgba('.$a_Theme['color']['I'].',0.65);}';
	echo '.border-top-I-1-35{border-top:1px solid rgba('.$a_Theme['color']['I'].',0.35);}';
	echo '.border-top-I-1-65{border-top:1px solid rgba('.$a_Theme['color']['I'].',0.65);}';


	// C o l o r s
	// Color - A
	echo '.color-A-1{background-color:rgb('.$a_Theme['color']['A'].');}';
	echo '.color-A-2{background-color:rgb('.$a_Theme['color']['A'].'); background-color:rgba('.$a_Theme['color']['A'].',0.8);}';
	echo '.color-A-3{background-color:rgb('.$a_Theme['color']['A'].'); background-color:rgba('.$a_Theme['color']['A'].',0.6);}';
	echo '.color-A-4{background-color:rgb('.$a_Theme['color']['A'].'); background-color:rgba('.$a_Theme['color']['A'].',0.3);}';
	// Color - B
	echo '.color-B-1{background-color:rgb('.$a_Theme['color']['B'].');}';
	echo '.color-B-2{background-color:rgb('.$a_Theme['color']['B'].'); background-color:rgba('.$a_Theme['color']['B'].',0.8);}';
	echo '.color-B-3{background-color:rgb('.$a_Theme['color']['B'].'); background-color:rgba('.$a_Theme['color']['B'].',0.6);}';
	echo '.color-B-4{background-color:rgb('.$a_Theme['color']['B'].'); background-color:rgba('.$a_Theme['color']['B'].',0.3);}';
	// Color - C
	echo '.color-C-1{background-color:rgb('.$a_Theme['color']['C'].');}';
	echo '.color-C-2{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',0.8);}';
	echo '.color-C-3{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',0.6);}';
	echo '.color-C-4{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',0.3);}';
	// Color - D
	echo '.color-D-1{background-color:rgb('.$a_Theme['color']['D'].');}';
	echo '.color-D-2{background-color:rgb('.$a_Theme['color']['D'].'); background-color:rgba('.$a_Theme['color']['D'].',0.8);}';
	echo '.color-D-3{background-color:rgb('.$a_Theme['color']['D'].'); background-color:rgba('.$a_Theme['color']['D'].',0.6);}';
	echo '.color-D-4{background-color:rgb('.$a_Theme['color']['D'].'); background-color:rgba('.$a_Theme['color']['D'].',0.3);}';
	// Color - E
	echo '.color-E-1{background-color:rgb('.$a_Theme['color']['E'].');}';
	echo '.color-E-2{background-color:rgb('.$a_Theme['color']['E'].'); background-color:rgba('.$a_Theme['color']['E'].',0.8);}';
	echo '.color-E-3{background-color:rgb('.$a_Theme['color']['E'].'); background-color:rgba('.$a_Theme['color']['E'].',0.6);}';
	echo '.color-E-4{background-color:rgb('.$a_Theme['color']['E'].'); background-color:rgba('.$a_Theme['color']['E'].',0.3);}';
	// Color - F
	echo '.color-F-1{background-color:rgb('.$a_Theme['color']['F'].');}';
	echo '.color-F-2{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',0.8);}';
	echo '.color-F-3{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',0.6);}';
	echo '.color-F-4{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',0.3);}';
	// Color - G
	echo '.color-G-1{background-color:rgb('.$a_Theme['color']['G'].');}';
	echo '.color-G-2{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.8);}';
	echo '.color-G-3{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.6);}';
	echo '.color-G-4{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.3);}';
	// Color - H
	echo '.color-H-1{background-color:rgb('.$a_Theme['color']['H'].');}';
	echo '.color-H-2{background-color:rgb('.$a_Theme['color']['H'].'); background-color:rgba('.$a_Theme['color']['H'].',0.8);}';
	echo '.color-H-3{background-color:rgb('.$a_Theme['color']['H'].'); background-color:rgba('.$a_Theme['color']['H'].',0.6);}';
	echo '.color-H-4{background-color:rgb('.$a_Theme['color']['H'].'); background-color:rgba('.$a_Theme['color']['H'].',0.3);}';
	// Color - I
	echo '.color-I-1{background-color:rgb('.$a_Theme['color']['I'].');}';
	echo '.color-I-2{background-color:rgb('.$a_Theme['color']['I'].'); background-color:rgba('.$a_Theme['color']['I'].',0.8);}';
	echo '.color-I-3{background-color:rgb('.$a_Theme['color']['I'].'); background-color:rgba('.$a_Theme['color']['I'].',0.6);}';
	echo '.color-I-4{background-color:rgb('.$a_Theme['color']['I'].'); background-color:rgba('.$a_Theme['color']['I'].',0.3);}';
	// Color - J
	echo '.color-J-1{background-color:rgb('.$a_Theme['color']['J'].');}';
	echo '.color-J-2{background-color:rgb('.$a_Theme['color']['J'].'); background-color:rgba('.$a_Theme['color']['J'].',0.8);}';
	echo '.color-J-3{background-color:rgb('.$a_Theme['color']['J'].'); background-color:rgba('.$a_Theme['color']['J'].',0.6);}';
	echo '.color-J-4{background-color:rgb('.$a_Theme['color']['J'].'); background-color:rgba('.$a_Theme['color']['J'].',0.3);}';
	// Color - K
	echo '.color-K-1{background-color:rgb('.$a_Theme['color']['K'].');}';
	echo '.color-K-2{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.8);}';
	echo '.color-K-3{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.6);}';
	echo '.color-K-4{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.3);}';

	switch($v_Theme){
		case '9':
		case '22':case '32':case '42':case '52':case '62':case '72':case '92':

		case '21':
			// Light
			echo '.LAPCAT-image{background-image:url(/lapcat/images/100-18-1.png); background-repeat:no-repeat;}';
			break;
		default:
			// Dark
			echo '.LAPCAT-image{background-image:url(/lapcat/images/100-18-0.png); background-repeat:no-repeat;}';
			break;
	}
	switch($v_Theme){
		case '9':
		case '22':case '32':case '42':case '52':case '62':case '72':case '92':

		case '21':
			// L i g h t
			// Default Font Color
			echo 'a, font{color:rgb('.$a_Theme['color']['K'].');}';
			// Effect
			echo '.effect-hover-X-1:hover{background-color:rgb('.$a_Theme['color']['K'].');}';
			echo '.effect-hover-X-2:hover{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.8);}';
			echo '.effect-hover-X-3:hover{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.6);}';
			echo '.effect-hover-X-4:hover{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.3);}';
			echo '.effect-hover-Z-1:hover{background-color:rgb('.$a_Theme['accent-color']['A'].');}';
			echo '.effect-hover-Z-1-35:hover{background-color:rgba('.$a_Theme['accent-color']['A'].',0.35);}';
			echo '.effect-hover-Z-1-65:hover{background-color:rgba('.$a_Theme['accent-color']['A'].',0.65);}';
			echo '.effect-hover-Z-2:hover{background-color:rgb('.$a_Theme['accent-color']['A'].'); background-color:rgba('.$a_Theme['accent-color']['A'].',0.8);}';
			echo '.effect-hover-Z-3:hover{background-color:rgb('.$a_Theme['accent-color']['A'].'); background-color:rgba('.$a_Theme['accent-color']['A'].',0.6);}';
			echo '.effect-hover-Z-4:hover{background-color:rgb('.$a_Theme['accent-color']['A'].'); background-color:rgba('.$a_Theme['accent-color']['A'].',0.3);}';
			// Color - G
			echo '.color-X-1{background-color:rgb('.$a_Theme['color']['G'].');}';
			echo '.color-X-2{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.8);}';
			echo '.color-X-3{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.6);}';
			echo '.color-X-4{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.3);}';
			echo '.color-Y-1{background-color:rgb('.$a_Theme['color']['K'].');}';
			echo '.color-Y-2{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.8);}';
			echo '.color-Y-3{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.6);}';
			echo '.color-Y-4{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.3);}';
			echo '.color-Z-1{background-color:rgb('.$a_Theme['accent-color']['A'].');}';
			echo '.color-Z-2{background-color:rgb('.$a_Theme['accent-color']['A'].'); background-color:rgba('.$a_Theme['accent-color']['A'].',0.8);}';
			echo '.color-Z-3{background-color:rgb('.$a_Theme['accent-color']['A'].'); background-color:rgba('.$a_Theme['accent-color']['A'].',0.6);}';
			echo '.color-Z-4{background-color:rgb('.$a_Theme['accent-color']['A'].'); background-color:rgba('.$a_Theme['accent-color']['A'].',0.3);}';
			// Borders
			echo '.border-all-X-1{border:1px solid rgb('.$a_Theme['color']['G'].');}';
			echo '.border-all-X-2{border:2px solid rgb('.$a_Theme['color']['G'].');}';
			echo '.border-bottom-X-1{border-bottom:1px solid rgb('.$a_Theme['color']['G'].');}';
			echo '.border-left-X-1{border-left:1px solid rgb('.$a_Theme['color']['G'].');}';
			echo '.border-right-X-1{border-right:1px solid rgb('.$a_Theme['color']['G'].');}';
			echo '.border-sides-X-1{border-left:1px solid rgb('.$a_Theme['color']['G'].'); border-right:1px solid rgb('.$a_Theme['color']['G'].');}';
			echo '.border-top-X-1{border-top:1px solid rgb('.$a_Theme['color']['G'].');}';
			echo '.border-all-Z-1{border:1px solid rgb('.$a_Theme['accent-color']['B'].');}';
			// Fonts
			echo '.font-X{color:rgb('.$a_Theme['color']['K'].');}';
			echo '.font-Y{color:rgb('.$a_Theme['color']['G'].');}';
			echo '.font-Z{color:rgb('.$a_Theme['accent-color']['B'].');}';
			echo '.menu-highlight{background-color:rgb('.$a_Theme['accent-color']['A'].');}';
			echo '.menu-normal{background-color:rgba('.$a_Theme['color']['K'].',0.8);}';

			// Shadow or Light X - Down / Up (for Light)
			echo '.shadow-or-light-X-down{background-image:url(/lapcat/layout/icons/16-16-26.png); background-repeat:repeat-x;}';
			echo '.shadow-or-light-X-up{background-image:url(/lapcat/layout/icons/16-16-27.png); background-repeat:repeat-x;}';
			// Shadow or Light Y - Down / Up (for Light)
			echo '.shadow-or-light-Y-down{background-image:url(/lapcat/layout/icons/16-16-31.png); background-repeat:repeat-x;}';
			echo '.shadow-or-light-Y-up{background-image:url(/lapcat/layout/icons/16-16-29.png); background-repeat:repeat-x;}';
	// Open Line
	echo '.open-line{background-color:rgb('.$a_Theme['color']['D'].'); background-color:rgba('.$a_Theme['color']['K'].',0.10); border:1px solid rgba(76,76,76,0.35); cursor:pointer; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.open-line:hover{background-color:rgba('.$a_Theme['color']['K'].',0.15);}';

	// Button - X 1
	echo '.button-X{background-color:rgb(0,0,0); border:1px solid rgb(76,76,76); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-X:hover{background-color:rgb(26,26,26); border:1px solid rgb(126,126,126);}';

	// Button - X Fake
	echo '.button-X-fake{background-color:rgb(26,26,52); border:1px solid rgb(126,126,152); vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	// Button - Y Fake
	echo '.button-Y-fake{background-color:rgb(225,225,251); border:1px solid rgb(179,179,205); vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';

	// Button - X 35 (Alpha)
	echo '.button-X-35{background-color:rgba(0,0,0,0.35); border:1px solid rgba(76,76,76,0.35); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-X-35:hover{background-color:rgba(26,26,26,0.35); border:1px solid rgba(126,126,126,0.35);}';

	// Menu - X 35 (Alpha)
	echo '.menu-X-35{background-color:rgba(0,0,0,0.35); border:1px solid rgba(76,76,76,0.35); cursor:pointer; vertical-align:middle; -moz-border-bottom-radius:4px; -webkit-border-bottom-radius:4px; border-radius:4px;}';
	echo '.menu-X-35:hover{background-color:rgba(76,76,76,0.65);}';
	// Menu - X 65 (Alpha)
	echo '.menu-X-65{background-color:rgba(0,0,0,0.65); border:1px solid rgba(76,76,76,0.65); cursor:pointer; vertical-align:middle; -moz-border-bottom-radius:4px; -webkit-border-bottom-radius:4px; border-radius:4px;}';
	echo '.menu-X-65:hover{background-color:rgb(76,76,76);}';

	// Menu - Y 35 (Alpha)
	echo '.menu-Y-35{background-color:rgba(255,255,255,0.35); border:1px solid rgba(179,179,179,0.35); cursor:pointer; vertical-align:middle; -moz-border-bottom-radius:4px; -webkit-border-bottom-radius:4px; border-radius:4px;}';
	echo '.menu-Y-35:hover{background-color:rgba(255,255,255,0.65);}';
	// Menu - Y 65 (Alpha)
	echo '.menu-Y-65{background-color:rgba(255,255,255,0.65); border:1px solid rgba(179,179,179,0.65); cursor:pointer; vertical-align:middle; -moz-border-bottom-radius:4px; -webkit-border-bottom-radius:4px; border-radius:4px;}';
	echo '.menu-Y-65:hover{background-color:rgb(255,255,255);}';

	// Menu - Z 35 (Alpha)
	echo '.menu-Z-35{background-color:rgba(78,91,130,0.35); border:1px solid rgba(0,13,119,0.35); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.menu-Z-35:hover{background-color:rgba(104,117,156,0.35);}';

	// Menu - Z 65 (Alpha)
	echo '.menu-Z-65{background-color:rgba(78,91,130,0.65); border:1px solid rgba(0,13,119,0.65); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.menu-Z-65:hover{background-color:rgb(104,117,156);}';

	// Button - X 2
	echo '.button-X-2{background-color:rgb(76,76,76); border:1px solid rgb(126,126,126); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-X-2:hover{background-color:rgb(126,126,126); border:1px solid rgb(146,146,146);}';

	// Button - Y 1
	echo '.button-Y{background-color:rgb(255,255,255); border:1px solid rgb(179,179,179); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-Y:hover{background-color:rgb(229,229,229); border:1px solid rgb(129,129,129);}';

	// Button - Y 35 (Alpha)
	echo '.button-Y-35{background-color:rgba(255,255,255,0.35); border:1px solid rgba(179,179,179,0.35); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-Y-35:hover{background-color:rgba(229,229,229,0.35); border:1px solid rgba(129,129,129,0.35);}';

	// Button - Y 2
	echo '.button-Y-2{background-color:rgb(179,179,179); border:1px solid rgb(129,129,129); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-Y-2:hover{background-color:rgb(129,129,129); border:1px solid rgb(109,109,109);}';
			break;
		case '29':case '39':case '49':case '59':case '69':case '79':case '99':
		default:
			// Link - Open Line
			echo '.open-line{background-color:rgb('.$a_Theme['color']['B'].'); background-color:rgba('.$a_Theme['color']['B'].',0.35);}';
			// Shadow or Light - Down / Up (for Dark)
			echo '.shadow-or-light-X-down{background-image:url(/lapcat/layout/icons/16-16-31.png); background-repeat:repeat-x;}';
			echo '.shadow-or-light-X-up{background-image:url(/lapcat/layout/icons/16-16-29.png); background-repeat:repeat-x;}';
			// Shadow or Light - Down / Up (for Dark)
			echo '.shadow-or-light-Y-down{background-image:url(/lapcat/layout/icons/16-16-26.png); background-repeat:repeat-x;}';
			echo '.shadow-or-light-Y-up{background-image:url(/lapcat/layout/icons/16-16-27.png); background-repeat:repeat-x;}';

			// D a r k
			// Default Font Color
			echo 'a, font{color:rgb('.$a_Theme['color']['G'].');}';
			// Effect
			echo '.effect-hover-X-1:hover{background-color:rgb('.$a_Theme['color']['G'].');}';
			echo '.effect-hover-X-2:hover{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.8);}';
			echo '.effect-hover-X-3:hover{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.6);}';
			echo '.effect-hover-X-4:hover{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.3);}';
			echo '.effect-hover-Z-1:hover{background-color:rgb('.$a_Theme['accent-color']['B'].');}';
			echo '.effect-hover-Z-1-35:hover{background-color:rgba('.$a_Theme['accent-color']['B'].',0.35);}';
			echo '.effect-hover-Z-1-65:hover{background-color:rgba('.$a_Theme['accent-color']['B'].',0.65);}';
			echo '.effect-hover-Z-2:hover{background-color:rgb('.$a_Theme['accent-color']['B'].'); background-color:rgba('.$a_Theme['accent-color']['B'].',0.8);}';
			echo '.effect-hover-Z-3:hover{background-color:rgb('.$a_Theme['accent-color']['B'].'); background-color:rgba('.$a_Theme['accent-color']['B'].',0.6);}';
			echo '.effect-hover-Z-4:hover{background-color:rgb('.$a_Theme['accent-color']['B'].'); background-color:rgba('.$a_Theme['accent-color']['B'].',0.3);}';
			// Color
			echo '.color-X-1{background-color:rgb('.$a_Theme['color']['K'].');}';
			echo '.color-X-2{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.8);}';
			echo '.color-X-3{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.6);}';
			echo '.color-X-4{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.3);}';
			echo '.color-Y-1{background-color:rgb('.$a_Theme['color']['G'].');}';
			echo '.color-Y-2{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.8);}';
			echo '.color-Y-3{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.6);}';
			echo '.color-Y-4{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.3);}';
			echo '.color-Z-1{background-color:rgb('.$a_Theme['accent-color']['B'].');}';
			echo '.color-Z-2{background-color:rgb('.$a_Theme['accent-color']['B'].'); background-color:rgba('.$a_Theme['accent-color']['B'].',0.8);}';
			echo '.color-Z-3{background-color:rgb('.$a_Theme['accent-color']['B'].'); background-color:rgba('.$a_Theme['accent-color']['B'].',0.6);}';
			echo '.color-Z-4{background-color:rgb('.$a_Theme['accent-color']['B'].'); background-color:rgba('.$a_Theme['accent-color']['B'].',0.3);}';
			// Border
			echo '.border-all-X-1{border:1px solid rgb('.$a_Theme['color']['K'].');}';
			echo '.border-all-X-2{border:2px solid rgb('.$a_Theme['color']['K'].');}';
			echo '.border-bottom-X-1{border-bottom:1px solid rgb('.$a_Theme['color']['K'].');}';
			echo '.border-left-X-1{border-left:1px solid rgb('.$a_Theme['color']['K'].');}';
			echo '.border-right-X-1{border-right:1px solid rgb('.$a_Theme['color']['K'].');}';
			echo '.border-sides-X-1{border-left:1px solid rgb('.$a_Theme['color']['K'].'); border-right:1px solid rgb('.$a_Theme['color']['K'].');}';
			echo '.border-top-X-1{border-top:1px solid rgb('.$a_Theme['color']['K'].');}';
			echo '.border-all-Z-1{border:1px solid rgb('.$a_Theme['accent-color']['A'].');}';
			// Font
			echo '.font-X{color:rgb('.$a_Theme['color']['G'].');}';
			echo '.font-Y{color:rgb('.$a_Theme['color']['K'].');}';
			echo '.font-Z{color:rgb('.$a_Theme['accent-color']['A'].');}';

			echo '.menu-highlight{background-color:rgb('.$a_Theme['accent-color']['B'].');}';
			echo '.menu-normal{background-color:rgb('.$a_Theme['color']['F'].');}';
			break;
	}
	// Light 
	echo '.light-down{background-image:url(/lapcat/layout/icons/16-16-31.png); background-position:bottom; background-repeat:repeat-x;}';
	echo '.light-up{background-image:url(/lapcat/layout/icons/16-16-29.png); background-position:top; background-repeat:repeat-x;}';
	// Shadow or Light Y - Down / Up (for Light)
	echo '.shadow-down{background-image:url(/lapcat/layout/icons/16-16-26.png); background-position:bottom; background-repeat:repeat-x;}';
	echo '.shadow-up{background-image:url(/lapcat/layout/icons/16-16-27.png); background-position:top; background-repeat:repeat-x;}';

	echo '.color-M-1{background-color:rgb('.$a_Theme['color']['M'].');}';
	
	echo '.catalog-link{color:rgb(125,125,255);}';

	// B a c k g r o u n d s
	// Background - Special I
	echo '.background-special-1{'.$a_CSS['C'].'}';
	echo '.background-open-line-1{'.$a_CSS['D'].'}';
	echo '.background-alpha-1{background-image:'.$a_Theme['transparency']['F'].'; background-repeat:repeat;}';
	echo '.background-alpha-2{background-image:'.$a_Theme['transparency']['E'].'; background-repeat:repeat;}';
	echo '.background-alpha-3{background-image:'.$a_Theme['transparency']['D'].'; background-repeat:repeat;}';
	echo '.background-alpha-4{background-image:'.$a_Theme['transparency']['C'].'; background-repeat:repeat;}';
	echo '.background-alpha-5{background-image:'.$a_Theme['transparency']['B'].'; background-repeat:repeat;}';
	echo '.background-alpha-6{background-image:'.$a_Theme['transparency']['A'].'; background-repeat:repeat;}';

	// F o n t s
	// Font - Default
	echo '.font-bold{font-weight:bold;}';
	echo '.font-italic{font-style:italic;}';
	echo '.font-fake{font-family:Arial, Helvetica, sans-serif;}';
	
	// Font - A - N
	echo '.font-A{color:rgb('.$a_Theme['color']['A'].');}';
	echo '.font-B{color:rgb('.$a_Theme['color']['B'].');}';
	echo '.font-C{color:rgb('.$a_Theme['color']['C'].');}';
	echo '.font-D{color:rgb('.$a_Theme['color']['D'].');}';
	echo '.font-E{color:rgb('.$a_Theme['color']['E'].');}';
	echo '.font-F{color:rgb('.$a_Theme['color']['F'].');}';
	echo '.font-G{color:rgb('.$a_Theme['color']['G'].');}';
	echo '.font-H{color:rgb('.$a_Theme['color']['H'].');}';
	echo '.font-I{color:rgb('.$a_Theme['color']['I'].');}';
	echo '.font-J{color:rgb('.$a_Theme['color']['J'].');}';
	echo '.font-K{color:rgb('.$a_Theme['color']['K'].');}';
	echo '.font-L{color:rgb('.$a_Theme['color']['L'].');}';
	echo '.font-M{color:rgb('.$a_Theme['color']['M'].');}';
	echo '.font-N{color:rgb('.$a_Theme['color']['N'].');}';
	
	// D r o p d o w n s
	// Dropdown - A
	echo '.dropdown-A-1{background-color:rgb('.$a_Theme['color']['K'].'); border:1px solid rgb('.$a_Theme['color']['A'].'); color:rgb('.$a_Theme['color']['G'].');}';
	echo '.dropdown-A-2{background-color:rgb('.$a_Theme['color']['G'].'); border:1px solid rgb('.$a_Theme['color']['A'].'); color:rgb('.$a_Theme['color']['K'].');}';

	echo '.dropdown{background-color:rgb('.$a_Theme['color']['F'].'); border:1px solid rgb('.$a_Theme['color']['A'].'); color:rgb(255,255,255);}';
	echo '.dropdown-black{background-color:rgb(0,0,0); border:1px solid rgb(26,26,26); color:rgb(255,255,255);}';
	
	// E f f e c t s
	// Effect - Hover
	echo '.effect-hover-A-1:hover{background-color:rgb('.$a_Theme['color']['A'].'); background-color:rgba('.$a_Theme['color']['A'].',1.00);}';
	echo '.effect-hover-B-1:hover{background-color:rgb('.$a_Theme['color']['B'].'); background-color:rgba('.$a_Theme['color']['B'].',1.00);}';
	echo '.effect-hover-C-1:hover{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',1.00);}';
	echo '.effect-hover-D-1:hover{background-color:rgb('.$a_Theme['color']['D'].'); background-color:rgba('.$a_Theme['color']['D'].',1.00);}';
	echo '.effect-hover-E-1:hover{background-color:rgb('.$a_Theme['color']['E'].'); background-color:rgba('.$a_Theme['color']['E'].',1.00);}';
	echo '.effect-hover-F-1:hover{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',1.00);}';
	echo '.effect-hover-G-1:hover{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',1.00);}';
	echo '.effect-hover-G-2:hover{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.65);}';
	echo '.effect-hover-G-3:hover{background-color:rgb('.$a_Theme['color']['G'].'); background-color:rgba('.$a_Theme['color']['G'].',0.35);}';
	echo '.effect-hover-H-1:hover{background-color:rgb('.$a_Theme['color']['H'].'); background-color:rgba('.$a_Theme['color']['H'].',1.00);}';
	echo '.effect-hover-I-1:hover{background-color:rgb('.$a_Theme['color']['I'].'); background-color:rgba('.$a_Theme['color']['I'].',1.00);}';
	echo '.effect-hover-J-1:hover{background-color:rgb('.$a_Theme['color']['J'].'); background-color:rgba('.$a_Theme['color']['J'].',1.00);}';
	echo '.effect-hover-K-1:hover{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',1.00);}';
	echo '.effect-hover-K-2:hover{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.65);}';
	echo '.effect-hover-K-3:hover{background-color:rgb('.$a_Theme['color']['K'].'); background-color:rgba('.$a_Theme['color']['K'].',0.35);}';


	echo '.fake-link{cursor:pointer;}';
	echo '.color-blue{background-color:rgb(0,13,52);}';
	echo '.border-blue{border:1px solid rgb(0,13,119);}';
	// B u t t o n s
	// Button - Black
	echo '.button-black{background-color:rgb(0,0,0); border:1px solid rgb(76,76,76); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-black:hover{background-color:rgb(26,26,26); border:1px solid rgb(126,126,126);}';
	// Button - Black 2
	echo '.button-black-2{background-color:rgb(76,76,76); border:1px solid rgb(126,126,126); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-black-2:hover{background-color:rgb(126,126,126); border:1px solid rgb(146,146,146);}';
	// Button - Blue
	echo '.button-blue{background-color:rgb(0,13,52); border:1px solid rgb(0,13,119); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-blue:hover{background-color:rgb(26,39,78);}';
	// Button - Blue 2
	echo '.button-blue-2{background-color:rgb(78,91,130); border:1px solid rgb(0,13,119); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-blue-2:hover{background-color:rgb(104,117,156);}';
	// Button - Purple
	echo '.button-purple{background-color:rgb(130,65,130); border:1px solid rgb(49,13,49); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-purple:hover{background-color:rgb(156,91,156);}';
	// Button - Green
	echo '.button-green{background-color:rgb(13,52,0); border:1px solid rgb(13,49,0); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-green:hover{background-color:rgb(39,78,26);}';
	// Button - Red
	echo '.button-red{background-color:rgb(52,13,0); border:1px solid rgb(119,13,0); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-red:hover{background-color:rgb(78,39,26); border:1px solid rgb(119,13,0);}';
	// Button - Theme
	echo '.button-theme{background-color:rgb('.$a_Theme['color']['F'].'); border:1px solid rgb('.$a_Theme['color']['C'].'); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-theme:hover{background-color:rgb('.$a_Theme['color']['D'].'); border:1px solid rgb('.$a_Theme['color']['A'].');}';
	// Button - Accent
	echo '.button-accent{background-color:rgb('.$a_Theme['color']['N'].'); border:1px solid rgb('.$a_Theme['color']['L'].'); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.button-accent:hover{background-color:rgb('.$a_Theme['color']['L'].'); border:1px solid rgb('.$a_Theme['color']['L'].');}';

	// Button - Current Page
	echo '.current-page-button{background-color:rgb('.$a_Theme['accent-color']['B'].'); border:1px solid rgb('.$a_Theme['accent-color']['A'].'); vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';

	echo '.calendar-cell{background-color:rgb('.$a_Theme['color']['C'].');}';


	// Option Black
	echo '.option-black{background-color:rgb(0,0,0); border:1px solid rgb(0,0,0); cursor:pointer; vertical-align:middle; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}';
	echo '.option-black:hover{background-color:rgb(26,26,26);}';



	// Tiled Images
	echo '.image-lines{background-image:url(/lapcat/layout/images/18-18-0.png); background-repeat:repeat;}';
	
	// Background
	echo '.image-background{background-image:'.$a_Theme['background'].'; background-repeat:repeat;}';
	
	// Color
	// A
	echo '.line{background-image:none; -moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; -moz-border-radius-bottomleft:6px; -webkit-border-bottom-left-radius:6px; border-bottom-left-radius:6px; border-top-left-radius:6px; border:1px solid rgba('.$a_Theme['color']['A'].',0);}';
	// B
	echo '.next-button{background-color:rgb('.$a_Theme['color']['B'].'); cursor:pointer;}';

	echo '.dropbutton{background-color:rgb('.$a_Theme['color']['B'].'); border:1px solid rgb('.$a_Theme['color']['B'].'); color:rgb(255,255,255); cursor:pointer; -moz-border-radius:6px; -webkit-border-radius:6px; border-radius:6px;}';
	// C
	echo '.option-theme{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',1.0);'.$a_CSS['A'].$a_CSS['B'].'}';
	echo '.line:hover{background-color:rgb('.$a_Theme['color']['C'].'); background-color:rgba('.$a_Theme['color']['C'].',0.6); cursor:pointer;}';
	// D
	// E
	echo '.OL-fred{border:1px solid rgb('.$a_Theme['color']['D'].');}';
	echo '.option-selected{-moz-border-radius-topleft:6px; -webkit-border-top-left-radius:6px; -moz-border-radius-topright:6px; -webkit-border-top-right-radius:6px; border-top-left-radius:6px; border-top-right-radius:6px; background-color:rgb('.$a_Theme['color']['D'].'); border:1px solid rgb('.$a_Theme['color']['F'].'); border-bottom:0; cursor:pointer;}';
	// F
	echo '.option-empty{background-color:rgb('.$a_Theme['color']['E'].');'.$a_CSS['A'].$a_CSS['B'].'}';
	echo '.option-theme:hover{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',1.0);}';
	// G
	echo '.calendar-cell:hover, .next-button:hover{background-color:rgb('.$a_Theme['color']['C'].');}';
	echo '.dropbutton:hover{background-color:rgb('.$a_Theme['color']['F'].'); border:1px solid rgb('.$a_Theme['color']['F'].'); color:rgb(255,255,255);}';
	echo '.hotkey{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',0.3);}';
	echo '.hotkey:hover{background-color:rgb('.$a_Theme['color']['F'].'); background-color:rgba('.$a_Theme['color']['F'].',0.6);}';
	echo '.notice .close{background-color:rgb('.$a_Theme['color']['F'].'); position:absolute; top:2px; right:2px; display:block; width:14px; height:13px;}';

	// Font
	echo '.option-selected font{color:rgb('.$a_Theme['color']['B'].');}';
	echo '.option-selected:hover font{color:rgb('.$a_Theme['color']['C'].');}';
	//echo '.opposite{color:rgb('.$a_Theme['color']['D'].');}';
	//echo '.person{color:rgb('.$a_Theme['color']['I'].');}';
	//echo '.grey{color:rgb('.$a_Theme['color']['F'].');}';
	//echo '.medGrey{color:rgb('.$a_Theme['color']['G'].');}';
	//echo '.darkGrey{color:rgb('.$a_Theme['color']['H'].');}';
}
?>