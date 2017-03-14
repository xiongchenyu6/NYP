<?php 
	session_start();
	require_once('connection/Connection_king.php');
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cda8' and name = 'TEMPERATURE' or mac = '00158d000021cda8' and name = 'LIGHT' or mac = '00158d000021cda8' and name = 'HUMIDITY' or mac = '00158d000021cda8' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
		
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cea9' and name = 'TEMPERATURE' or mac = '00158d000021cea9' and name = 'LIGHT' or mac = '00158d000021cea9' and name = 'HUMIDITY' or mac = '00158d000021cea9' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output1[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
		
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021ce50' and name = 'TEMPERATURE' or mac = '00158d000021ce50' and name = 'LIGHT' or mac = '00158d000021ce50' and name = 'HUMIDITY' or mac = '00158d000021ce50' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output2[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cda2' and name = 'TEMPERATURE' or mac = '00158d000021cda2' and name = 'LIGHT' or mac = '00158d000021cda2' and name = 'HUMIDITY' or mac = '00158d000021cda2' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output3[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cda3' and name = 'TEMPERATURE' or mac = '00158d000021cda3' and name = 'LIGHT' or mac = '00158d000021cda3' and name = 'HUMIDITY' or mac = '00158d000021cda3' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output4[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cdad' and name = 'TEMPERATURE' or mac = '00158d000021cdad' and name = 'LIGHT' or mac = '00158d000021cdad' and name = 'HUMIDITY' or mac = '00158d000021cdad' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output5[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cd71' and name = 'TEMPERATURE' or mac = '00158d000021cd71' and name = 'LIGHT' or mac = '00158d000021cd71' and name = 'HUMIDITY' or mac = '00158d000021cd71' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output6[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
		
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cdb1' and name = 'TEMPERATURE' or mac = '00158d000021cdb1' and name = 'LIGHT' or mac = '00158d000021cdb1' and name = 'HUMIDITY' or mac = '00158d000021cdb1' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output7[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cd96' and name = 'TEMPERATURE' or mac = '00158d000021cd96' and name = 'LIGHT' or mac = '00158d000021cd96' and name = 'HUMIDITY' or mac = '00158d000021cd96' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output8[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021ce56' and name = 'TEMPERATURE' or mac = '00158d000021ce56' and name = 'LIGHT' or mac = '00158d000021ce56' and name = 'HUMIDITY' or mac = '00158d000021ce56' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output9[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cda7' and name = 'TEMPERATURE' or mac = '00158d000021cda7' and name = 'LIGHT' or mac = '00158d000021cda7' and name = 'HUMIDITY' or mac = '00158d000021cda7' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output10[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021ce4f' and name = 'TEMPERATURE' or mac = '00158d000021ce4f' and name = 'LIGHT' or mac = '00158d000021ce4f' and name = 'HUMIDITY' or mac = '00158d000021ce4f' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output11[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cdb9' and name = 'TEMPERATURE' or mac = '00158d000021cdb9' and name = 'LIGHT' or mac = '00158d000021cdb9' and name = 'HUMIDITY' or mac = '00158d000021cdb9' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output12[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cdb6' and name = 'TEMPERATURE' or mac = '00158d000021cdb6' and name = 'LIGHT' or mac = '00158d000021cdb6' and name = 'HUMIDITY' or mac = '00158d000021cdb6' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$outpu13[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cdbd' and name = 'TEMPERATURE' or mac = '00158d000021cdbd' and name = 'LIGHT' or mac = '00158d000021cdbd' and name = 'HUMIDITY' or mac = '00158d000021cdbd' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output14[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cdae' and name = 'TEMPERATURE' or mac = '00158d000021cdae' and name = 'LIGHT' or mac = '00158d000021cdae' and name = 'HUMIDITY' or mac = '00158d000021cdae' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output15[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);		
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021cd94' and name = 'TEMPERATURE' or mac = '00158d000021ce6A' and name = 'LIGHT' or mac = '00158d000021cd94' and name = 'HUMIDITY' or mac = '00158d000021cd94' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$output16[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
	
	$result = mysql_query("SELECT * FROM latest where mac = '00158d000021ce40' and name = 'TEMPERATURE' or mac = '00158d000021ce40' and name = 'LIGHT' or mac = '00158d000021ce40' and name = 'HUMIDITY' or mac = '00158d000021ce40' and name = 'BAT LEVEL'");
	while($row=mysql_fetch_assoc($result))
		$outpu17[]=array('mac' => $row['mac'], 'name' => $row['name'], 'value' => $row['value']);
		
	mysql_close();
	$x1=0.058;
	$y1=0.886;
	$x2=0.128;
	$y2=0.657;
	$x3=0.070;
	$y3=0.429;
	$x4=0.081;
	$y4=0.271;
	$x5=0.360;
	$y5=0.857;
	$x6=0.233;
	$y6=0.557;
	$x7=0.163;
	$y7=0.329;
	$x8=0.314;
	$y8=0.729;
	$x9=0.453;
	$y9=0.757;
	$x11=0.4;
	$y11=0.357;
	$x12=0.4;
	$y12=0.2;
	$x13=0.791;
	$y13=0.671;
	$x14=0.756;
	$y14=0.557;
	$x15=0.679;
	$y15=0.214;
	$x16=0.640;
	$y16=0.371;
	$x17=0.884;
	$y17=0.357;
	$xAM=0.523;
	$yAM=0.557;
	$xND=0.558;
	$yND=0.157;
	$xpixel=900;
	$ypixel=733;

//foreach($output as $entry) {
//	echo $entry['name'].' = '.$entry['value'].'</br>';
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Environmental Monitoring and Alert System - Map</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link href="css/default.css" rel="stylesheet" type="text/css" />
<!-- <meta http-equiv="refresh" content="5" > -->
</head>
<body>
<?php if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==1){ ?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="bgColor">
    <td width="200" height="100" align="center"><img src="images/emaslogo.png" width="125" height="70" border="0" longdesc="http://smartliving.nyp.edu.sg/emas/" /></td>
    <td colspan="2" class="ProjectTitle">Environmental Monitoring &amp; Alert System</td>
  </tr>
  <tr>
    <td colspan="3"><p>Block S Level 4 Map</p></td>
  </tr>
  <tr>
    <td colspan="3">
    <fieldset>
    <div id="map" align="center"></div>
    </fieldset>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="right">
    <?php if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==1){ ?>
        	<p>You are logged in! <a href="/emas/admin/admincheck.php?action=adminlogout">LOG OUT</a>.</p>
    <?php }?>
    </td>
  </tr>
  <tr class="bgColor">
    <td width="300" height="100" align="center"><img src="images/nyp.png" width="200" height="40" border="0" longdesc="http://www.nyp.edu.sg" /></td>
    <td width="500" align="center" class="copyRightFont">Copyright © 2014. All Rights Reserved.</td>
    <td width="200" align="center"><img src="images/nxp.png" width="135" height="50" border="0" longdesc="http://www.nxp.com" /></td>
  </tr>
</table>
<?php }
else
{
	header('Location: /emas/');
	exit;
}
?>
<script src="javalib/kinetic-v5.0.1.min.js"></script>
<script defer="defer">

	function updateTooltip(tooltip, text) {
		var mousePos = stage.getPointerPosition();
        var x = mousePos.x;
        var y = mousePos.y - 5;
		tooltip.getText().text(text);
        tooltip.position({x:x, y:y});
        tooltip.show();
	}
	
	function loadImages(sources, callback) {

        var images = {};
        var loadedImages = 0;
        var numImages = 0;
        for(var src in sources) {
			numImages++;
        }
        for(var src in sources) {
			images[src] = new Image();
			images[src].onload = function() {
				if(++loadedImages >= numImages) {
					callback(images);
				}
			};
			images[src].src = sources[src];
		}
	}
	
	function buildStage(images) {

		var greenButton1 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x1 * $xpixel-20  ?>',
			y: '<?php echo $y1 * $ypixel-20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		
		var greenButton2 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x2 * $xpixel -20 ?>',
			y: '<?php echo $y2 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		
		var greenButton3 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x3 * $xpixel -20 ?>',
			y: '<?php echo $y3 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		
		var greenButton4 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x4 * $xpixel -20 ?>',
			y: '<?php echo $y4 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		
		var greenButton5 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x5 * $xpixel -20 ?>',
			y: '<?php echo $y5 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		
		var greenButton6 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x6 * $xpixel -20 ?>',
			y: '<?php echo $y6 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		
		var greenButton7 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x7 * $xpixel -20 ?>',
			y: '<?php echo $y7 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		
		var greenButton8 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x8 * $xpixel-20  ?>',
			y: '<?php echo $y8 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		var greenButton9 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x9 * $xpixel -20 ?>',
			y: '<?php echo $y9 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		var greenButton10 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x11 * $xpixel -20 ?>',
			y: '<?php echo $y11 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		var greenButton11 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x12 * $xpixel-20  ?>',
			y: '<?php echo $y12 * $ypixel-20  ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		var greenButton12 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x13 * $xpixel -20 ?>',
			y: '<?php echo $y13 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		var greenButton13 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x14 * $xpixel -20 ?>',
			y: '<?php echo $y14 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		var greenButton14 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x15 * $xpixel -20  ?>',
			y: '<?php echo $y15 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		var greenButton15 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x16 * $xpixel -20 ?>',
			y: '<?php echo $y16 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		var greenButton16 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $x17 * $xpixel-20  ?>',
			y: '<?php echo $y17 * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
		var greenButton17 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $xAM * $xpixel-20  ?>',
			y: '<?php echo $yAM * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});

		var greenButton18 = new Kinetic.Image({
			image: images.greenButton,
			x: '<?php echo $xND * $xpixel-20  ?>',
			y: '<?php echo $yND * $ypixel -20 ?>',
			width: 40,
			height: 40,
			draggable: false
		});
        var myMap = new Kinetic.Image({
			image: images.myMap,
			x: 0,
			y: 0,
			width: 900,
			height: 733
        });
      

		
		greenButton1.on('click', function() {
			window.open('chart.php?sensorId=21cda8',"_self");
        });
		
		greenButton1.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output))
				{
					echo 'GAI AXY01';
				}else{
					foreach($output as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton1.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		
		greenButton2.on('click', function() {
			window.open('chart.php?sensorId=21cea9',"_self");
			window.open
        });
		
		greenButton2.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output1))
				{
					echo 'GSM02';
				}else{
					foreach($output1 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton2.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		
		
		greenButton3.on('click', function() {
			window.open('chart.php?sensorId=21ce50',"_self");
        });
		
		greenButton3.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output2))
				{
					echo 'CRD03';
				}else{
					foreach($output2 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton3.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		
		greenButton4.on('click', function() {
			window.open('chart.php?sensorId=21ceda2',"_self");
        });
		
		greenButton4.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output3))
				{
					echo 'PANTRY04';
				}else{
					foreach($output3 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton4.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		
		greenButton5.on('click', function() {
			window.open('chart.php?sensorId=21cda3',"_self");
        });
		
		greenButton5.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output4))
				{
					echo 'HOIDINC08';
				}else{
					foreach($output4 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton5.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		
		greenButton6.on('click', function() {
			window.open('chart.php?sensorId=21cdad',"_self");
        });
		
		greenButton6.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output5))
				{
					echo 'DEM008';
				}else{
					foreach($output5 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton6.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		
		greenButton7.on('click', function() {
			window.open('chart.php?sensorId=21cd71',"_self");
        });
		
		greenButton7.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output6))
				{
					echo 'CORRIDOA07';
				}else{
					foreach($output6 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton7.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		
		greenButton8.on('click', function() {
			window.open('chart.php?sensorId=21cdb1',"_self");
        });
		
		greenButton8.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'LIBRA08';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton8.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});


		greenButton9.on('click', function() {
			window.open('chart.php?sensorId=21cd96',"_self");
        });
		
		greenButton9.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'INN009';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton9.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		greenButton10.on('click', function() {
			window.open('chart.php?sensorId=21cd96',"_self");
        });
		
		greenButton10.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'GSM11';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton10.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});			
		greenButton11.on('click', function() {
			window.open('chart.php?sensorId=21cda7',"_self");
        });
		
		greenButton11.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'GSM12';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton11.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		greenButton12.on('click', function() {
			window.open('chart.php?sensorId=21ce4f',"_self");
        });
		
		greenButton12.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'ENTRY13';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton12.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		greenButton13.on('click', function() {
			window.open('chart.php?sensorId=21cdb9',"_self");
        });
		
		greenButton13.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'LISONG14';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton13.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		greenButton14.on('click', function() {
			window.open('chart.php?sensorId=21cdb6',"_self");
        });
		
		greenButton14.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'MICHAE15';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton14.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});



		greenButton15.on('click', function() {
			window.open('chart.php?sensorId=21cdbd',"_self");
        });
		
		greenButton15.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'ESWIN16';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton15.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		greenButton16.on('click', function() {
			window.open('chart.php?sensorId=21cdae',"_self");
        });
		
		greenButton16.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'KAMAL';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton16.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		greenButton17.on('click', function() {
			window.open('chart.php?sensorId=21cd94',"_self");
        });
		
		greenButton17.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'ADAM';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton17.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});
		greenButton18.on('click', function() {
			window.open('chart.php?sensorId=21ce40',"_self");
        });
		
		greenButton18.on('mouseover', function() {		
			document.body.style.cursor = 'pointer';
            updateTooltip(tooltip, '<?php
				if (empty($output7))
				{
					echo 'NOMANSLAND';
				}else{
					foreach($output7 as $entry) { echo $entry['name'].' = '.$entry['value'].'\n';} 
					echo 'SENSOR ID = '.$entry['mac'];
				}
				?>');
			layer.draw();
        });
		
        greenButton18.on('mouseout', function() {
			document.body.style.cursor = 'default';
			tooltip.hide();
			layer.draw();
		});

		layer.add(myMap);
		layer.add(greenButton1);
		layer.add(greenButton2);
		layer.add(greenButton3);
		layer.add(greenButton4);
		layer.add(greenButton5);
		layer.add(greenButton6);
		layer.add(greenButton7);
		layer.add(greenButton8);
		layer.add(greenButton9);
		layer.add(greenButton10);
		layer.add(greenButton11);
		layer.add(greenButton12);
		layer.add(greenButton13);
		layer.add(greenButton14);
		layer.add(greenButton15);
		layer.add(greenButton16);
		layer.add(greenButton17);
		layer.add(greenButton18);
		layer.add(tooltip);
        stage.add(layer);	
      }
	  
      var stage = new Kinetic.Stage({
		  container: 'map',
		  width: 900,
		  height: 733
      });

      var layer = new Kinetic.Layer();
	  
	  var tooltip = new Kinetic.Label({
        opacity: 0.7,
        visible: false,
        listening: false
      });
	  
	  tooltip.add(new Kinetic.Tag({
        fill: 'black',
        pointerDirection: 'down',
        pointerWidth: 10,
        pointerHeight: 10,
        lineJoin: 'round',
        shadowColor: 'black',
        shadowBlur: 10,
        shadowOffset: {x:10,y:10},
        shadowOpacity: 0.5
      }));
      
      tooltip.add(new Kinetic.Text({
        text: '',
        fontFamily: 'Calibri',
        fontSize: 18,
        padding: 5,
        fill: 'white'
      }));
	  
      var sources = {
		  myMap: 'images/Solaris-L11.png',
		  yellowButton: 'images/yellowButton.png',
		  blueButton: 'images/blueButton.png',
		  greenButton: 'images/greenButton.png'
      };
      loadImages(sources, buildStage);
</script>
</body>
</html>
