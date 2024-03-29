<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background: #4E5869;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing div. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px; /* adding the padding to the sides of the elements within the divs, instead of the divs themselves, gets rid of any box model math. A nested div with side padding can also be used as an alternate method. */
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}

/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color:#414958;
	text-decoration: underline; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	color: #4E5869;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* this group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	text-decoration: none;
}

/* ~~ this container surrounds all other divs giving them their percentage-based width ~~ */
.container {
	width: 80%;
	max-width: 1260px;/* a max-width may be desirable to keep this layout from getting too wide on a large monitor. This keeps line length more readable. IE6 does not respect this declaration. */
	min-width: 780px;/* a min-width may be desirable to keep this layout from getting too narrow. This keeps line length more readable in the side columns. IE6 does not respect this declaration. */
	background: #FFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout. It is not needed if you set the .container's width to 100%. */
}

/* ~~ This is the layout information. ~~ 

1) Padding is only placed on the top and/or bottom of the div. The elements within this div have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

*/
.content {
	padding: 10px 0;
}

/* ~~ This grouped selector gives the lists in the .content area space ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* this padding mirrors the right padding in the headings and paragraph rule above. Padding was placed on the bottom for space between other elements on the lists and on the left to create the indention. These may be adjusted as you wish. */
}

/* ~~ miscellaneous float/clear classes ~~ */
.fltrt {  /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page. The floated element must precede the element it should be next to on the page. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class can be placed on a <br /> or empty div as the final element following the last floated div (within the #container) if the overflow:hidden on the .container is removed */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style></head>

<body>

<div class="container">
  <div class="content" align="center">
    
<?php

	$fname = "input/sms.txt";
	$handle = fopen($fname, "r");
	$lines = count(file($fname));
	$lines = ($lines - 1)/2;
	
	//echo "lines: $lines index: $index";	

	//echo "<div style=\"border:4px dotted red;\">";
	//	echo "<div style=\"border:5px dotted green;\">";
	
	$sarah = array();
	$tahsin = array();
	$full;
	
	$s = "Sarah";
	$t = "Tahsin";
	
	$set = 0;
	while (!feof($handle))
	{
		if ($set == 0)
		{
			$line = fgets($handle);
			
			if (eregi($s,$line))
			{
				$line = fgets($handle);
				array_push($sarah,$line);
				//echo "SARAH: ".$sarah[0];
			}
			if (eregi($t,$line))
			{
				$line = fgets($handle);
				array_push($tahsin,$line);				
				//echo "TAHSIN: ".$line;
			}
		}
	}
	
	$ssize = sizeof($sarah);
	$tsize = sizeof($tahsin);
	$fonts = array("Helvetica", "Arial", "Comic Sans", "Tahoma");
	$colours = array("red", "orange", "black");
	shuffle($fonts);
	$rfont = array_shift($fonts);

	echo "<p>";
	for ($r=0;$r<$ssize;$r++)
	{
		$fontsize = rand(2,5);
		$ind = rand(0,2);
		$font = $fonts[$ind];
		$colour = $colours[$ind];
		$index = rand(0, $tsize);
		$ssms = $sarah[$index];
		$tsms = $tahsin[$index];
		
		$s = "<font size=\"$fontsize\" face=\"$font\" color=\"blue\">$ssms</font>";
		$t = "<font size=\"$fontsize\" face=\"$font\" color=\"red\">$tsms</font>";
		$full = $full.$s.$t;
	}
	
	echo $full;
	echo "<p/>";
?>    
    
    </div>
  <!-- end .container --></div>
</body>
</html>


