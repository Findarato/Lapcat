<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?
	include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/db.php';
	$v_Article=$_GET['article'];
	$v_DC=db::getInstance();
	$v_DC->Query('SELECT * FROM viewable_news WHERE ID='.$v_Article.';');
	$a_Results=$v_DC->Format('assoc');
?>
<html>
	<head>
		<title><?=$a_Results['name'];?></title>
		<meta name="description" content="<?=strip_tags($a_Results['text']);?>"/>
	</head>
		<body>
			<img src="http://dev.lapcat.org/lapcat/images/101-58-1.png"/>
		</body>
</html>