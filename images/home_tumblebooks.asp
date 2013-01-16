<html>
<head>
<title>TumbleBooks - eBooks for eKids!</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../../mystylesheets.css" type="text/css">

<script language="JavaScript">
<!--

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function changeimg(m,nme) {
	m.src=nme;
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function selectChange() {
    if (document.getElementById('Select2')) {
        if (document.getElementById('Select2').value == 'ReadingLevel') {
            document.getElementById('Select3').style.display = 'inline';
            document.getElementById('categoryText').style.display = 'none';
            document.getElementById('Select5').style.display = 'none';
            document.getElementById('Select6').style.display = 'none';
            document.getElementById('SelectSubject').style.display = 'none';
        }
        else if (document.getElementById('Select2').value == 'Publisher') {
            document.getElementById('Select3').style.display = 'none';
            document.getElementById('categoryText').style.display = 'none';
            document.getElementById('Select5').style.display = 'inline';
            document.getElementById('Select6').style.display = 'none';
            document.getElementById('SelectSubject').style.display = 'none';
        }
        else if (document.getElementById('Select2').value == 'book_lang_id') {
            document.getElementById('Select3').style.display = 'none';
            document.getElementById('categoryText').style.display = 'none';
            document.getElementById('Select5').style.display = 'none';
            document.getElementById('Select6').style.display = 'inline';
            document.getElementById('SelectSubject').style.display = 'none';
        }
        else if (document.getElementById('Select2').value == 'Status') {
            document.getElementById('Select3').style.display = 'none';
            document.getElementById('categoryText').style.display = 'inline';
            document.getElementById('Select5').style.display = 'none';
            document.getElementById('Select6').style.display = 'none';
            document.getElementById('SelectSubject').style.display = 'inline';
        }
        else {
            document.getElementById('Select3').style.display = 'none';
            document.getElementById('categoryText').style.display = 'inline';
            document.getElementById('Select5').style.display = 'none';
            document.getElementById('Select6').style.display = 'none';
            document.getElementById('SelectSubject').style.display = 'none';
        }
    }
	if (document.getElementById('Select3').style.display == 'inline') {
		
		document.getElementById('categoryText').style.display = 'none';
		document.getElementById('Select5').style.display = 'none';
		document.getElementById('Select6').style.display = 'none';
		document.getElementById('SelectSubject').style.display = 'none';
	}
}

function selectLevelID(e){
	var obj = document.getElementById('Select3');
	var type = obj.options[obj.selectedIndex].value;
	
	if(type == "1")
    {
		document.getElementById('categoryText').style.display = 'none';
        document.getElementById('SelectLevel1').style.display = 'inline';
		document.getElementById('SelectLevel2').style.display = 'none';
		document.getElementById('SelectLevel3').style.display = 'none';
		
    }
    else if (type == "2")
    {
		document.getElementById('categoryText').style.display = 'none';
		document.getElementById('SelectLevel1').style.display = 'none';
		document.getElementById('SelectLevel2').style.display = 'inline';
		document.getElementById('SelectLevel3').style.display = 'none';
    }
	else if (type == "3")
    {
		document.getElementById('categoryText').style.display = 'none';
		document.getElementById('SelectLevel1').style.display = 'none';
		document.getElementById('SelectLevel2').style.display = 'none';
		document.getElementById('SelectLevel3').style.display = 'inline';
    }
}

window.onload = selectChange;
//-->
</script>
</head>
<body bgcolor="#6699FF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" name="outer_table" bgcolor="#FFFFFF" height="100%" ID="Table1">
  <tr> 
    <td bgcolor="#000000" height="6"><img src="http://www.tumblebooks.com/images/spacer.gif" width="6" height="6"></td>
    <td bgcolor="#000000" height="6"> 
      <div align="center"><img src="http://www.tumblebooks.com/images/spacer.gif" width="6" height="6"></div>
    </td>
    <td bgcolor="#000000" height="6"><img src="http://www.tumblebooks.com/images/spacer.gif" width="6" height="6"></td>
  </tr>
  <tr> 
    <td bgcolor="#000000" height="141">&nbsp;</td>
    <td valign="top" height="141"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0" name="topbarimages_table" height="100" ID="Table2">
        <tr> 
          <td background="http://www.tumblebooks.com/images/indexbg2.gif"> 
            <div align="center">
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
				<!-- E-card removal
				<td align="left"><a href="ecardsend.asp" target=_blank><img src="http://www.tumblebooks.com/images/icon2.jpg" width=100 height=100 border="0"></a><br>&nbsp;&nbsp;<font size=1>SEND AN ECARD</font></td>
				-->
				<td align="center">
				
				<table cellpadding="0" cellspacing="0" border="0" width="100%" ID="Table4">
				<tr>
                
					<td align="left" valign="bottom">
                    <!-- SEARCH BAR TABLE-->
                        <table border="0" cellpadding="0" cellspacing="0" width="252" style="margin-left:20px;margin-bottom:5px;">
                            <tr>
                                <td><img src="http://www.tumblebooks.com/images/spacer.gif" width="15" height="1" border="0" alt=""/></td>
                                <td><img src="http://www.tumblebooks.com/images/spacer.gif" width="225" height="1" border="0" alt=""/></td>
                                <td><img src="http://www.tumblebooks.com/images/spacer.gif" width="12" height="1" border="0" alt=""/></td>
                            </tr>
                            <tr>
                                <td colspan="3"><img name="TBLSearch_top" src="http://www.tumblebooks.com/images/TBLSearch_top.gif" width="252" height="28" border="0" alt="TUMBLESEARCH"/></td>
                            </tr>
                            <tr>
                                <td background="http://www.tumblebooks.com/images/TBLSearch_lside.gif" bgcolor="#CEDCF8">&nbsp;</td>
                                <td align="left" bgcolor="#CEDCF8">
                                    <table cellpadding="0" cellspacing="0" style="font-size:8px; padding-left:20px">
                                    <form name="form1" method="get" action="catalogue_details.asp" class="main" id="Form2">
                                        <tr>
                                            <td width="160" valign="top">&nbsp; </td>
                                            <td width="38" valign="top">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <select name="select" id="Select2" onChange="selectChange()" style="font-size:10px; width: 160px;">
                                            <option value="All">All</option>
                                            <option value="Title">Title</option>
                                            <option value="book_lang_id">Languages</option>
                                            <option value="Author">Author</option>
                                            <option value="Publisher">Publisher</option>
                                            <option value="Illustrator">Illustrator</option>
                                            <option value="ReadingLevel">Reading Level</option>
                                            <option value="Status">Subjects</option>
											<option value="videos">Books with Videos</option>
                                            </select></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                
                                                <input  type="hidden" id="SelectedLevelID" name="SelectedLevelID" value="" />
												<select name="levelid" id="Select3" onChange="selectLevelID(this)" style="display: none; width: 160px; font-size:10px;">
                                                <option value="0">Select Type of Level</option>
												
                                                    <option value="1">
                                                    Grade
                                                    </option>
                                                
                                                    <option value="3">
                                                    Lexile
                                                    </option>
                                                
                                                    <option value="2">
                                                    Accelerated Reader
                                                    </option>
                                                
                                                </select>
                                                <select name="Publish" id="Select5" style="display: none; width: 160px; font-size:10px;">
                                                
                                                    <option value="Annick Press">
                                                    Annick Press
                                                    </option>
                                                
                                                    <option value="August House, Inc.">
                                                    August House, Inc.
                                                    </option>
                                                
                                                    <option value="Barron's Educational Press">
                                                    Barron's Educational Press
                                                    </option>
                                                
                                                    <option value="Blackstone Audio">
                                                    Blackstone Audio
                                                    </option>
                                                
                                                    <option value="Blackstone/TR Classics">
                                                    Blackstone/TR Classics
                                                    </option>
                                                
                                                    <option value="Bloomsbury">
                                                    Bloomsbury
                                                    </option>
                                                
                                                    <option value="Bridgewater Books">
                                                    Bridgewater Books
                                                    </option>
                                                
                                                    <option value="Candlewick Press">
                                                    Candlewick Press
                                                    </option>
                                                
                                                    <option value="Carolrhoda">
                                                    Carolrhoda
                                                    </option>
                                                
                                                    <option value="charlesbridge">
                                                    charlesbridge
                                                    </option>
                                                
                                                    <option value="Charlesbridge Books">
                                                    Charlesbridge Books
                                                    </option>
                                                
                                                    <option value="Chouette/Cinar">
                                                    Chouette/Cinar
                                                    </option>
                                                
                                                    <option value="Chronicle Books">
                                                    Chronicle Books
                                                    </option>
                                                
                                                    <option value="Cinco Puntos Press">
                                                    Cinco Puntos Press
                                                    </option>
                                                
                                                    <option value="Digital Education Services">
                                                    Digital Education Services
                                                    </option>
                                                
                                                    <option value="Dominique et Compagnie">
                                                    Dominique et Compagnie
                                                    </option>
                                                
                                                    <option value="Edizioni  El">
                                                    Edizioni  El
                                                    </option>
                                                
                                                    <option value="Feiwel & Friends">
                                                    Feiwel & Friends
                                                    </option>
                                                
                                                    <option value="Harcourt Brace">
                                                    Harcourt Brace
                                                    </option>
                                                
                                                    <option value="Harper Collins">
                                                    Harper Collins
                                                    </option>
                                                
                                                    <option value="HarperCollins Publishers">
                                                    HarperCollins Publishers
                                                    </option>
                                                
                                                    <option value="Hoopoe Books">
                                                    Hoopoe Books
                                                    </option>
                                                
                                                    <option value="Houghton Mifflin Harcourt">
                                                    Houghton Mifflin Harcourt
                                                    </option>
                                                
                                                    <option value="In Audio">
                                                    In Audio
                                                    </option>
                                                
                                                    <option value="inaudio">
                                                    inaudio
                                                    </option>
                                                
                                                    <option value="inaudio/TR Classic">
                                                    inaudio/TR Classic
                                                    </option>
                                                
                                                    <option value="Kane Press">
                                                    Kane Press
                                                    </option>
                                                
                                                    <option value="Kar-Ben">
                                                    Kar-Ben
                                                    </option>
                                                
                                                    <option value="Kids Can Press">
                                                    Kids Can Press
                                                    </option>
                                                
                                                    <option value="Lerner Books">
                                                    Lerner Books
                                                    </option>
                                                
                                                    <option value="Listen and Live Audio">
                                                    Listen and Live Audio
                                                    </option>
                                                
                                                    <option value="Little, Brown">
                                                    Little, Brown
                                                    </option>
                                                
                                                    <option value="Lobster Press">
                                                    Lobster Press
                                                    </option>
                                                
                                                    <option value="Millbrook Press">
                                                    Millbrook Press
                                                    </option>
                                                
                                                    <option value="National Geographic">
                                                    National Geographic
                                                    </option>
                                                
                                                    <option value="Naxos Audio Books">
                                                    Naxos Audio Books
                                                    </option>
                                                
                                                    <option value="Orca Book Publishers">
                                                    Orca Book Publishers
                                                    </option>
                                                
                                                    <option value="Owl Kids">
                                                    Owl Kids
                                                    </option>
                                                
                                                    <option value="Pippin Properties">
                                                    Pippin Properties
                                                    </option>
                                                
                                                    <option value="Raven Tree Press">
                                                    Raven Tree Press
                                                    </option>
                                                
                                                    <option value="Scholastic Books">
                                                    Scholastic Books
                                                    </option>
                                                
                                                    <option value="Silver Ink Publishing">
                                                    Silver Ink Publishing
                                                    </option>
                                                
                                                    <option value="Simon & Schuster">
                                                    Simon & Schuster
                                                    </option>
                                                
                                                    <option value="Somerville House Publishing">
                                                    Somerville House Publishing
                                                    </option>
                                                
                                                    <option value="Step By Step">
                                                    Step By Step
                                                    </option>
                                                
                                                    <option value="Storyteller Digital">
                                                    Storyteller Digital
                                                    </option>
                                                
                                                    <option value="Sylvan Dell">
                                                    Sylvan Dell
                                                    </option>
                                                
                                                    <option value="TR Classics">
                                                    TR Classics
                                                    </option>
                                                
                                                    <option value="Tumble Books Inc.">
                                                    Tumble Books Inc.
                                                    </option>
                                                
                                                    <option value="Tumbleweed Press">
                                                    Tumbleweed Press
                                                    </option>
                                                
                                                    <option value="Various">
                                                    Various
                                                    </option>
                                                
                                                    <option value="Walker Books">
                                                    Walker Books
                                                    </option>
                                                
                                                    <option value="Weigl Publishers, Inc.">
                                                    Weigl Publishers, Inc.
                                                    </option>
                                                
                                                    <option value="Yoyo USA">
                                                    Yoyo USA
                                                    </option>
                                                
                                                </select>
                                                <select name="book_lang_id" id="Select6" style="display: none; width: 160px; font-size:10px;">
                                                
                                                    <option value="1">
                                                    English
                                                    </option>
                                                
                                                    <option value="2">
                                                    French
                                                    </option>
                                                
                                                    <option value="3">
                                                    Spanish
                                                    </option>
                                                
                                                    <option value="4">
                                                    Italian
                                                    </option>
                                                
                                                    <option value="5">
                                                    Russian
                                                    </option>
                                                
                                                    <option value="6">
                                                    Chinese
                                                    </option>
                                                
                                                </select>
                                                <select name="subject_id" id="SelectSubject" style="display: none; width: 160px; font-size:10px;">
                                                
                                                    <option value="1">
                                                    Adventure
                                                    </option>
                                                
                                                    <option value="2">
                                                    Adversity
                                                    </option>
                                                
                                                    <option value="3">
                                                    Aging
                                                    </option>
                                                
                                                    <option value="4">
                                                    Allergies
                                                    </option>
                                                
                                                    <option value="5">
                                                    Alphabet
                                                    </option>
                                                
                                                    <option value="6">
                                                    Animals
                                                    </option>
                                                
                                                    <option value="7">
                                                    Art
                                                    </option>
                                                
                                                    <option value="9">
                                                    Biography
                                                    </option>
                                                
                                                    <option value="10">
                                                    Birthday
                                                    </option>
                                                
                                                    <option value="77">
                                                    Books
                                                    </option>
                                                
                                                    <option value="11">
                                                    Boy Club
                                                    </option>
                                                
                                                    <option value="12">
                                                    Bugs/Insects
                                                    </option>
                                                
                                                    <option value="13">
                                                    Bullying
                                                    </option>
                                                
                                                    <option value="14">
                                                    Celebrations
                                                    </option>
                                                
                                                    <option value="76">
                                                    Circus
                                                    </option>
                                                
                                                    <option value="15">
                                                    Classic
                                                    </option>
                                                
                                                    <option value="16">
                                                    Colors
                                                    </option>
                                                
                                                    <option value="17">
                                                    Community
                                                    </option>
                                                
                                                    <option value="18">
                                                    Cooperation/Helping
                                                    </option>
                                                
                                                    <option value="19">
                                                    Counting/Numeracy
                                                    </option>
                                                
                                                    <option value="8">
                                                    Creativity
                                                    </option>
                                                
                                                    <option value="20">
                                                    Culture/Diversity
                                                    </option>
                                                
                                                    <option value="21">
                                                    Dance
                                                    </option>
                                                
                                                    <option value="22">
                                                    Diary/Letters
                                                    </option>
                                                
                                                    <option value="23">
                                                    Differences
                                                    </option>
                                                
                                                    <option value="24">
                                                    Dinosaurs
                                                    </option>
                                                
                                                    <option value="25">
                                                    Fables
                                                    </option>
                                                
                                                    <option value="26">
                                                    Fairy Tale
                                                    </option>
                                                
                                                    <option value="27">
                                                    Family
                                                    </option>
                                                
                                                    <option value="28">
                                                    Fantasy
                                                    </option>
                                                
                                                    <option value="30">
                                                    Food
                                                    </option>
                                                
                                                    <option value="31">
                                                    French
                                                    </option>
                                                
                                                    <option value="32">
                                                    Friendship
                                                    </option>
                                                
                                                    <option value="34">
                                                    Geography
                                                    </option>
                                                
                                                    <option value="36">
                                                    Growing Up
                                                    </option>
                                                
                                                    <option value="37">
                                                    Health/Hygiene
                                                    </option>
                                                
                                                    <option value="73">
                                                    History
                                                    </option>
                                                
                                                    <option value="38">
                                                    Holidays
                                                    </option>
                                                
                                                    <option value="39">
                                                    Humor
                                                    </option>
                                                
                                                    <option value="40">
                                                    Imagination
                                                    </option>
                                                
                                                    <option value="42">
                                                    Interactive
                                                    </option>
                                                
                                                    <option value="41">
                                                    Internet/Computers
                                                    </option>
                                                
                                                    <option value="43">
                                                    Jobs/Occupations
                                                    </option>
                                                
                                                    <option value="47">
                                                    Monsters
                                                    </option>
                                                
                                                    <option value="78">
                                                    Munsch
                                                    </option>
                                                
                                                    <option value="49">
                                                    Nature
                                                    </option>
                                                
                                                    <option value="51">
                                                    Pets
                                                    </option>
                                                
                                                    <option value="52">
                                                    Pirates
                                                    </option>
                                                
                                                    <option value="54">
                                                    Problem Solving
                                                    </option>
                                                
                                                    <option value="55">
                                                    Relationships
                                                    </option>
                                                
                                                    <option value="58">
                                                    Safety
                                                    </option>
                                                
                                                    <option value="59">
                                                    School
                                                    </option>
                                                
                                                    <option value="65">
                                                    Spanish
                                                    </option>
                                                
                                                    <option value="66">
                                                    Sports
                                                    </option>
                                                
                                                    <option value="68">
                                                    Technology
                                                    </option>
                                                
                                                    <option value="70">
                                                    Tolerance
                                                    </option>
                                                
                                                </select>
                                            </td>
                                            <td align="right" rowspan="2" valign="top" style="height:40px">
                                                <input type="image" src="http://www.tumblebooks.com/images/TBLSearch_go.gif" border="0" width="25" height="24" id="Image2" name="Image1"/>
                                                <input type="hidden" name="isSelect" value="isSelect" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                            <input type="text" name="category" size="25" style="width: 160px; font-size:10px;" maxlength="20" id="categoryText"/>
											<select name="readinglevel1" id="SelectLevel1" style="display: none; width: 160px; font-size:10px;">
                                                
                                                    <option value="1,2,3,4">
                                                    1,2,3,4
                                                    </option>
                                                
                                                    <option value="1-3">
                                                    1-3
                                                    </option>
                                                
                                                    <option value="1-4">
                                                    1-4
                                                    </option>
                                                
                                                    <option value="1-5">
                                                    1-5
                                                    </option>
                                                
                                                    <option value="2-4">
                                                    2-4
                                                    </option>
                                                
                                                    <option value="2-5">
                                                    2-5
                                                    </option>
                                                
                                                    <option value="2-6">
                                                    2-6
                                                    </option>
                                                
                                                    <option value="3-5">
                                                    3-5
                                                    </option>
                                                
                                                    <option value="3-6">
                                                    3-6
                                                    </option>
                                                
                                                    <option value="3-7">
                                                    3-7
                                                    </option>
                                                
                                                    <option value="4-6">
                                                    4-6
                                                    </option>
                                                
                                                    <option value="4-7">
                                                    4-7
                                                    </option>
                                                
                                                    <option value="4-8">
                                                    4-8
                                                    </option>
                                                
                                                    <option value="5-7">
                                                    5-7
                                                    </option>
                                                
                                                    <option value="7-12">
                                                    7-12
                                                    </option>
                                                
                                                    <option value="Grade 3-6">
                                                    Grade 3-6
                                                    </option>
                                                
                                                    <option value="K-1">
                                                    K-1
                                                    </option>
                                                
                                                    <option value="K-2">
                                                    K-2
                                                    </option>
                                                
                                                    <option value="K-3">
                                                    K-3
                                                    </option>
                                                
                                                    <option value="K-4">
                                                    K-4
                                                    </option>
                                                
                                                    <option value="K-5">
                                                    K-5
                                                    </option>
                                                
                                                    <option value="PK-2">
                                                    PK-2
                                                    </option>
                                                
                                                    <option value="PK-3">
                                                    PK-3
                                                    </option>
                                                
                                                </select>
												<select name="readinglevel2" id="SelectLevel2" style="display: none; width: 160px; font-size:10px;">
                                                
                                                    <option value="1.0-1.9">
                                                    1.0-1.9
                                                    </option>
                                                
                                                    <option value="2.0-2.9">
                                                    2.0-2.9
                                                    </option>
                                                
                                                    <option value="3.0-3.9">
                                                    3.0-3.9
                                                    </option>
                                                
                                                    <option value="4.0-4.9">
                                                    4.0-4.9
                                                    </option>
                                                
                                                    <option value="5.0-5.9">
                                                    5.0-5.9
                                                    </option>
                                                
                                                    <option value="6.0-6.9">
                                                    6.0-6.9
                                                    </option>
                                                
                                                    <option value="7.0-7.9">
                                                    7.0-7.9
                                                    </option>
                                                
                                                    <option value="8.0-8.9">
                                                    8.0-8.9
                                                    </option>
                                                
                                                    <option value="9.0-9.9">
                                                    9.0-9.9
                                                    </option>
                                                
                                                    <option value="10.0-10.9">
                                                    10.0-10.9
                                                    </option>
                                                
                                                    <option value="11.0-11.9">
                                                    11.0-11.9
                                                    </option>
                                                
                                                    <option value="12.0+">
                                                    12.0+
                                                    </option>
                                                
                                                </select>
												<select name="readinglevel3" id="SelectLevel3" style="display: none; width: 160px; font-size:10px;">
                                                
                                                    <option value="100-199L">
                                                    100-199L
                                                    </option>
                                                
                                                    <option value="200-299L">
                                                    200-299L
                                                    </option>
                                                
                                                    <option value="300-399L">
                                                    300-399L
                                                    </option>
                                                
                                                    <option value="400-499L">
                                                    400-499L
                                                    </option>
                                                
                                                    <option value="500-599L">
                                                    500-599L
                                                    </option>
                                                
                                                    <option value="600-699L">
                                                    600-699L
                                                    </option>
                                                
                                                    <option value="700-799L">
                                                    700-799L
                                                    </option>
                                                
                                                    <option value="800-899L">
                                                    800-899L
                                                    </option>
                                                
                                                    <option value="900-999L">
                                                    900-999L
                                                    </option>
                                                
                                                    <option value="AD100-199">
                                                    AD100-199
                                                    </option>
                                                
                                                    <option value="AD200-299">
                                                    AD200-299
                                                    </option>
                                                
                                                    <option value="AD300-399">
                                                    AD300-399
                                                    </option>
                                                
                                                    <option value="AD400-499">
                                                    AD400-499
                                                    </option>
                                                
                                                    <option value="AD500-599">
                                                    AD500-599
                                                    </option>
                                                
                                                    <option value="AD600-699">
                                                    AD600-699
                                                    </option>
                                                
                                                    <option value="AD700-799">
                                                    AD700-799
                                                    </option>
                                                
                                                    <option value="AD800-899">
                                                    AD800-899
                                                    </option>
                                                
                                                    <option value="AD900-999">
                                                    AD900-999
                                                    </option>
                                                
                                                    <option value="NP">
                                                    NP
                                                    </option>
                                                
                                                    <option value="NC">
                                                    NC
                                                    </option>
                                                
											    </select>
												</td>
                                        </tr>
                                        <tr>
                                            <td align="center">&nbsp; </td>
                                            <td align="center">&nbsp;</td>
                                        </tr>
                                        
                                    </form>
                                    </table>
                                </td>
                               <td background="http://www.tumblebooks.com/images/TBLSearch_rside.gif" bgcolor="#CEDCF8">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3"><img name="TBLSearch_btm" src="http://www.tumblebooks.com/images/TBLSearch_btm.gif" width="252" height="12" border="0" alt=""/></td>
                            </tr>
                        </table>
                    <!-- END SEARCH BAR TABLE--></td>
                    
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							 


							<td><img src="http://www.tumblebooks.com/images/header_logo2.gif" width="368" height="100" border="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td>


								
									<img src="http://cdn.tumblebooks.com/images/logo_laportecounty.jpg" border="0">
									


							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><script language="JavaScript" 
   type="text/JavaScript">
function changePage(newLoc)
 {
   nextPage = newLoc.options[newLoc.selectedIndex].value
		
   if (nextPage != "")
   {
      document.location.href = nextPage
   }
 }
</script>
<form>
<table cellpadding="2" cellspacing="0" border="0">
<tr>
<td NOWRAP>
<b class="langSelect">CHOOSE:</b>
<select name="selectedPage" onChange="changePage(this.form.selectedPage)">
<option value="/library/asp/home_tumblebooks.asp" selected>English</option>
<option value="/library/asp/french/home_tumblebooks.asp">Français</option>
<option value="/library/asp/spanish/home_tumblebooks.asp">español</option>
<option value="/library/iPad/home_tumblebooks.asp">iPad</option>
</select>
</td>
<td align=right><input type="button" value="GO" onclick="changePage(this.form.selectedPage)"></td>
</tr>
</form>
</table></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
							
							</td>
						</tr>
						</table>
					</td>
				</tr>
				</table>
				</td>
			</tr>
			</table>		
            </div>
          </td>
        </tr>
      </table>
      <div align="center">
        <table border="0" cellspacing="0" cellpadding="0" width="100%" height="41" class="bgNav" >
          <tr> 
             <td align="center" width="100%" valign=top> 
                
                <a href="home_tumblebooks.asp"><img alt="home" border="0" id="imgHome1" onMouseOut="changeimg(imgHome1,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_01.gif');" onMouseOver="changeimg(imgHome1,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_on_01.gif');" src="http://cdn.tumblebooks.com/images/EN/banner_silver_l_01.gif"></a><img src="images/spacer.gif" width=10 height=1 border=0 alt=""><a href="book_index.asp"><img alt="Index" border="0" id="imgIndex" onMouseOut="changeimg(imgIndex,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_02.gif');" onMouseOver="changeimg(imgIndex,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_on_02.gif');" src="http://cdn.tumblebooks.com/images/EN/banner_silver_l_02.gif"></a><img src="images/spacer.gif" width=10 height=1 border=0 alt=""><a href="myfavorites.asp"><img alt="My Favorites" border="0" id="imgFavor" onMouseOut="changeimg(imgFavor,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_04.gif');" onMouseOver="changeimg(imgFavor,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_on_04.gif');" src="http://cdn.tumblebooks.com/images/EN/banner_silver_l_04.gif"></a><img src="images/spacer.gif" width=10 height=1 border=0 alt=""><a href="myplaylist.asp"><img alt="My Playlist" border="0" id="imgPlaylist" onMouseOut="changeimg(imgPlaylist,'http://cdn.tumblebooks.com/images/EN/btn_myPlayList.gif');" onMouseOver="changeimg(imgPlaylist,'http://cdn.tumblebooks.com/images/EN/btn_myPlayList_over.gif');" src="http://cdn.tumblebooks.com/images/EN/btn_myPlayList.gif"></a><img src="images/spacer.gif" width=10 height=1 border=0 alt=""><a href="myfavorites.asp?private=1"><img alt="My Cloud" border="0" id="imgCloud" onMouseOut="changeimg(imgCloud,'http://cdn.tumblebooks.com/images/EN/banner_silver_cloud.gif');" onMouseOver="changeimg(imgCloud,'http://cdn.tumblebooks.com/images/EN/banner_silver_cloud_on.gif');" src="http://cdn.tumblebooks.com/images/EN/banner_silver_cloud.gif"></a><img src="images/spacer.gif" width=10 height=1 border=0 alt=""><a href="help.asp"><img alt="Help" border="0" id="imgHelp" onMouseOut="changeimg(imgHelp,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_05.gif');" onMouseOver="changeimg(imgHelp,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_on_05.gif');" src="http://cdn.tumblebooks.com/images/EN/banner_silver_l_05.gif"></a><img src="images/spacer.gif" width=10 height=1 border=0 alt=""><a href="contact.asp"><img alt="Contact Us" border="0" id="imgContact1" onMouseOut="changeimg(imgContact1,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_06.gif');" onMouseOver="changeimg(imgContact1,'http://cdn.tumblebooks.com/images/EN/banner_silver_l_on_06.gif');" src="http://cdn.tumblebooks.com/images/EN/banner_silver_l_06.gif"></a>
                
            </td>
          </tr>
        </table>
      </div>
    </td>
    <td bgcolor="#000000" height="141">&nbsp;</td>
  </tr>


<script language="JavaScript">
<!--

PlayerVersion = function (arrVersion) {
	this.major = arrVersion[0] !== null ? parseInt(arrVersion[0]) : 0;
	this.minor = arrVersion[1] !== null ? parseInt(arrVersion[1]) : 0;
	this.rev = arrVersion[2] !== null ? parseInt(arrVersion[2]) : 0;
};

var MM_contentVersion = 6;
var plugin = (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]) ? navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0;
var browsername=navigator.appName;


if (browsername.indexOf("Netscape")!=-1) {browsername="NS"}
else
{if (browsername.indexOf("Microsoft")!=-1) {browsername="MSIE"}
else {browsername="N/A"}}


if ( plugin==0  && browsername=="MSIE") 
{
    var f=0;
    for (var j=30;j>=8;j--) 
    {
         try 
         {   
            var fl=eval("new ActiveXObject('ShockwaveFlash.ShockwaveFlash."+j+"');");
            if (fl) 
            {
                f=j;
                break;
            }
         }
         catch(e) {}
    }
    if(f<8)
    {
	    window.open('flashtext.asp','flashwindow','width=300,height=140,resizable=yes,scrollbars=no,toolbar=no,location=no,directories=no,status=no');
	}
}
else
{
		var x = navigator.plugins["Shockwave Flash"];
		if (x && x.description) {
			flashversion = new PlayerVersion(x.description.replace(/([a-zA-Z]|\s)+/, "").replace(/(\s+r|\s+b[0-9]+)/, ".").split("."));
		}
		flashversion=flashversion.major;


        if (flashversion <8) 
        {
            window.open('flashtext.asp','flashwindow','width=300,height=140,resizable=yes,scrollbars=no,toolbar=no,location=no,directories=no,status=no');
        }

}		


//-->

</script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>

<script language="JavaScript" type="text/JavaScript">
function iCheck()
{
    // For use within normal web clients 
    var isiPad = navigator.userAgent.match(/iPad/i) != null;
    var isiPhone = navigator.userAgent.match(/iPhone/i) != null;
    var isiPod = navigator.userAgent.match(/iPod/i) != null;
var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1;

    // For use within iPad developer UIWebView
    //var ua = navigator.userAgent;
    //var isiPad = /iPad/i.test(ua) || /iPhone OS 3_1_2/i.test(ua) || /iPhone OS 3_2_2/i.test(ua) || /iPod/i.test(ua);
    
    if(isiPad || isiPhone || isiPod || isAndroid)
    {
        changePageIpad("/library/iPad/home_tumblebooks.asp")
//alert("ipad!");
    }
}

function changePageIpad(newLoc)
 {
   nextPage = newLoc
		
   if (nextPage != "")
   {
      document.location.href = nextPage
   }
 }
</script>

<style type="text/css">
table.backgrounder {
	background-image: url(images/menu_bg.png);
	background-repeat: no-repeat;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<body onload="iCheck();" onLoad="MM_preloadImages('images/butt_sb_ro.png','images/butt_ra_ro.png','images/butt_ttv_ro.png','images/butt_pg_ro.png','images/butt_ll_ro.png','images/butt_nf_ro.png','images/newGuy_ttv.png')">
<tr height="100%">
    <td bgcolor="#000000" width="1%">
        <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="1"></td>
    <td valign="top" width="98%">
        <table align="center" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"
            width="770">
            <!-- INVISIBLE ROW TO HOLD ROW WIDTH -->
            <tr>
                <td width="1" height="1">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="1" alt="" border="0"></td>
                <td width="150" height="1">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="1" alt="" border="0"></td>
                <td width="10" height="1">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="1" alt="" border="0"></td>
                <td width="285" height="1">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="1" alt="" border="0"></td>
                <td width="20" height="1" rowspan="9">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="20" height="1" alt="" border="0"></td>
                <td width="10" height="1">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="1" alt="" border="0"></td>
                <td width="295" height="1">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="1" alt="" border="0"></td>
            </tr>
            
            <tr>
              <td>
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="45" alt="" border="0"></td>
                <td width="445" colspan="3" rowspan="2" align="center" valign="top">
                    <table class="backgrounder" width="445" border="0" cellpadding="0">
  <tr>
    <td><img src="images/butt_sb.png" name="Image1" width="137" height="74" border="0" usemap="#Image3Map" id="Image1"/></td>
    <td rowspan="3"><img src="images/newGuy_main.png" name="Image3" width="185" height="158" id="Image3" /></td>
    <td><img src="images/butt_pg.png" name="Image4" width="138" height="74" border="0" usemap="#Image4Map" id="Image4" /></td>
  </tr>
  <tr>
    <td><img src="images/butt_ra.png" name="Image2" width="135" height="74" border="0" usemap="#Map" id="Image2" /></td>
    <td><img src="images/butt_ll.png" name="Image5" width="140" height="74" border="0" usemap="#Image5Map" id="Image5" /></td>
  </tr>
  <tr>
    <td><img src="images/butt_ttv.png" name="Image7" width="135" height="74" border="0" usemap="#Image7Map" id="Image7" /></td>
    <td><img src="images/butt_nf.png" name="Image6" width="138" height="74" border="0" usemap="#Image6Map" id="Image6" /></td>
  </tr>
</table>
                    <br>
                    <br>
                </td>
                <td colspan="2" rowspan="5" valign="top">
                    <img src="http://www.tumblebooks.com/images/tumblenews.gif" width="305" height="45" alt="" border="0">
                  2
                    <a href="http://www.tumblebooks.com/library/asp/full_book.asp?ProductID=4336" target=_blank>
                        <img src="http://cdn.tumblebooks.com/images/bigBlue.jpg" width="150" height="150"
                            hspace="5" vspace="5" border="0" align="left"></a>
                    Kye knows everything there is to know about whales, and dreams of swimming with a blue whale. When she travels to Mexico with her mother, Kye is closer to her goal than ever. Will her wish of swimming with Big Blue come true?
                    <br>
                    <a href="home_tumblebooks.asp">more news...</a>
                    <br>
                    <div style="background-color: #FFFFFF; padding: 10px;">
                        <!-- REPLACE CONTENT TO MATCH THEME -->
                        
                  </div>
                    <br>
                    <br>
                    <br>
                    <br>
              </td>
          </tr>
            <tr>
                <td>
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="100" alt="" border="0"></td>
            </tr>
            <tr>
                <td>
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="1" alt="" border="0"></td>
                <td colspan="3">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="10" alt="" border="0"></td>
            </tr>
            
            <tr>
                <td>
                </td>
                <td valign="top">
                    
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td valign="top">
                    <!--<a href="Testimonials/Testimonials_home.htm">
                        <img src="http://www.tumblebooks.com/images/icon_testim.gif" width="292" height="97" border="0"></a><br /><br />-->
                    
                </td>
            </tr>
            
        </table>
    </td>
    <td bgcolor="#000000" width="1%">
        <img src="http://www.tumblebooks.com/images/spacer.gif" width="1" height="1"></td>
</tr>
<map name="Image3Map" id="Image3Map">
  <area shape="rect" coords="7,3,127,68" alt="Story Books" href="book_details.asp?Category=PictureBooks&amp;isflash=1" target="_self" onmouseover="MM_swapImage('Image3','','images/newGuy_sb.png','Image1','','images/butt_sb_ro.png',1)" onmouseout="MM_swapImgRestore()"/>
</map>

<map name="Map" id="Map">
  <area shape="rect" coords="5,5,128,66" href="book_details.asp?Category=Read-Alongs&amp;isflash=1" target="_self" onmouseover="MM_swapImage('Image3','','images/newGuy_ra.png','Image2','','images/butt_ra_ro.png',1)" onmouseout="MM_swapImgRestore()"/>
</map>

<map name="Image7Map" id="Image7Map">
  <area shape="rect" coords="6,3,127,66" href="book_details.asp?Category=Videos&amp;isflash=1" target="_self" onmouseover="MM_swapImage('Image3','','images/newGuy_ttv.png','Image7','','images/butt_ttv_ro.png',1)" onmouseout="MM_swapImgRestore()" />
</map>

<map name="Image4Map" id="Image4Map">
  <area shape="rect" coords="3,5,129,66" href="games_details.asp" target="_self" onmouseover="MM_swapImage('Image3','','images/newGuy_pg.png','Image4','','images/butt_pg_ro.png',1)" onmouseout="MM_swapImgRestore()"/>
</map>

<map name="Image5Map" id="Image5Map">
  <area shape="rect" coords="5,3,132,67" href="book_details.asp?Category=Language&amp;isflash=1" target="_self" onmouseover="MM_swapImage('Image3','','images/newGuy_ll.png','Image5','','images/butt_ll_ro.png',1)" onmouseout="MM_swapImgRestore()"/>
</map>

<map name="Image6Map" id="Image6Map">
  <area shape="rect" coords="6,6,132,69" href="book_details.asp?Category=Non-Fiction&amp;isflash=1" target="_self" alt="non fiction books" onmouseover="MM_swapImage('Image3','','images/newGuy_nf.png','Image6','','images/butt_nf_ro.png',1)" onmouseout="MM_swapImgRestore()" />
</map>
</body>
<script type="text/javascript">
<!--
function ajaxCounter( options ) {
    options = {
        type: options.type || "POST",
        url: options.url || "",
        data: options.data || "",
        timeout: options.timeout || 5000,
        onComplete: options.onComplete || function(){},
        onError: options.onError || function(){},
        onSuccess: options.onSuccess || function(){}
    };

	if ( typeof XMLHttpRequest == "undefined" )
			XMLHttpRequest = function(){
					return new ActiveXObject(
							navigator.userAgent.indexOf("MSIE 5") >= 0 ?
							"Microsoft.XMLHTTP" : "Msxml2.XMLHTTP"
					);
			};

	var xml = new XMLHttpRequest();

    xml.open(options.type, options.url, true);

    var timeoutLength = options.timeout;

    var requestDone = false;

    setTimeout(function(){
         requestDone = true;
    }, timeoutLength);

    xml.onreadystatechange = function(){
        if ( xml.readyState == 4 && !requestDone ) {

            if ( httpSuccess( xml ) ) {

                options.onSuccess( httpData( xml, options.data ) );

            } else {
                options.onError();
            }

            options.onComplete();

            xml = null;
        }
    };

    xml.send(null);

    function httpSuccess(r) {
        try {
            return !r.status && location.protocol == "file:" ||

                ( r.status >= 200 && r.status < 300 ) ||

                r.status == 304 ||

                navigator.userAgent.indexOf("Safari") >= 0 && typeof r.status == "undefined";
        } catch(e){}

        return false;
    }

    function httpData(r,data) {
        var ct = r.getResponseHeader("content-type");

        var isXML = !data && ct && ct.indexOf("xml") >= 0;

        var responseValue = data == "xml" || isXML ? r.responseXML : r.responseText;

        if ( data == "script" )
            eval.call( window, responseValue );

        return responseValue;
    }

}
//-->
</script>
			<tr>
                <td bgcolor="#000000" height="50">&nbsp;
                    </td>
                <td bgcolor="#000000" background="http://www.tumblebooks.com/images/indexbg2.gif" valign="center" height="50">
				   <div align="center" valign="center">
				   
				   <!--<a href="http://www.tumblebooks.com/library/asp/downloadtp_TBL.htm"><img src="http://www.tumblebooks.com/images/Icon_TP2_TBL.gif"  border="0"></a>
				   <img src="http://www.tumblebooks.com/images/spacer.gif" width="20" height="50">--><a href="Testimonials/Testimonials_home.htm"><img src="http://www.tumblebooks.com/images/Icon_testimonials3.gif" alt=""  border="0" /></a> <img src="http://www.tumblebooks.com/images/spacer.gif" alt="" width="20" height="50" /><a href="http://www.tumblebooks.com/LibraryTour.html"><img src="http://www.tumblebooks.com/images/Icon_Tour3.gif"  border="0"></a>
				    
					   <img src="http://www.tumblebooks.com/images/spacer.gif" width="10" height="50"><a href="TeacherInfo.aspx?vendorid=281597" target="_blank"><img src="http://www.tumblebooks.com/images/Icon_Admin3.gif" border="0"></a><img src="http://www.tumblebooks.com/images/spacer.gif" width="10" height="50">
              
			   <!--<img src="http://www.tumblebooks.com/images/spacer.gif" width="10" height="50"><a href="http://www.tumblebooks.com/library/asp/sponsorabook.asp"><img src="http://www.tumblebooks.com/images/sponsor-a-book.png" border="0"></a>-->
			   <img src="http://www.tumblebooks.com/images/spacer.gif" width="10" height="50"><!--<a href="http://www.facebook.com/pages/TumbleBooks/133784809970326#!/pages/TumbleBooks/133784809970326?v=wall" target="_blank">--><a   href="https://www.facebook.com/pages/TumbleBooks/133784809970326" target="_blank"><img src="http://www.tumblebooks.com/images/FB_icon36.gif" border="0"></a><img src="http://www.tumblebooks.com/images/spacer.gif" width="10" height="50"><img src="http://www.tumblebooks.com/images/spacer.gif" width="10" height="50"><a href="http://twitter.com/tumblebooks" target="_blank"><img src="http://www.tumblebooks.com/images/twitter_logo36.gif" border="0"></a>
                     <br />
							<font face="Arial, Helvetica, sans-serif" size="-2"><a href="home_tumblebooks.asp">Home</a>
                                &#149;<a href="contact.asp">Contact Us</a>
                                &#149;<a href="about.asp">About TumbleBookLibrary</a> &#149; <a href="help.asp">Help</a>&#149;<a
                                    href="privacy.asp">Privacy Statement</a>&#149; <a href="termsofuse.asp">Terms of Use</a></font></div>
                </td>
                <td bgcolor="#000000" height="50">&nbsp;
                    </td>
            </tr>
            <tr>
                <td bgcolor="#000000" height="6">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="6" height="6"></td>
                <td bgcolor="#000000" height="6">
                    <div align="center">
                        <img src="http://www.tumblebooks.com/images/spacer.gif" width="6" height="6"></div>
                </td>
                <td bgcolor="#000000" height="6">
                    <img src="http://www.tumblebooks.com/images/spacer.gif" width="6" height="6"></td>
            </tr>
        </table> 
    </body> 
</html> 