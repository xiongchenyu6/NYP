<?php 
	session_start();
	if(isset($_GET['sensorId'])) {
		$id = htmlentities(strip_tags($_GET['sensorId']));
	}
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
<script src="javalib/amcharts/amcharts.js" type="text/javascript"></script>
<script src="javalib/amcharts/serial.js" type="text/javascript"></script>
<script type="text/javascript">
	
	var chart;
    var axis;
	 
	AmCharts.loadJSON = function ( url ) {
		// create the request
		if (window.XMLHttpRequest) {
			// IE7+, Firefox, Chrome, Opera, Safari
			var request = new XMLHttpRequest();
		}
		else {
			// code for IE6, IE5
			var request = new ActiveXObject( 'Microsoft.XMLHTTP' );
		}
		// load it the last "false" parameter ensures that our code will wait before the data is loaded
		request.open( 'GET', url, false );
		request.send();        
		// parse and return the output
		return eval( request.responseText );
	};
	
	AmCharts.ready(function() {
		autoUpdate();
	});
	
	AmCharts.ready(function() {
		setInterval(autoUpdate, 10000);
	});
		
	function autoUpdate() 
	{
		<?php if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==1){ ?>
		<?php
		if ($id == '21cda8') { ?>
			var chartData = AmCharts.loadJSON( 'data/21cda8_temperature.php' );
			var chartData1 = AmCharts.loadJSON( 'data/21cda8_light.php' );
			var chartData2 = AmCharts.loadJSON( 'data/21cda8_humidity.php' );
		<?php } ?>
		
		<?php
		if ($id == '21cea9') { ?>
			var chartData = AmCharts.loadJSON( 'data/21cea9_temperature.php' );
			var chartData1 = AmCharts.loadJSON( 'data/21cea9_light.php' );
			var chartData2 = AmCharts.loadJSON( 'data/21cea9_humidity.php' );
		<?php } ?>
		
		<?php
		if ($id == '21ce50') { ?>
			var chartData = AmCharts.loadJSON( 'data/21ce50_temperature.php' );
			var chartData1 = AmCharts.loadJSON( 'data/21ce50_light.php' );
			var chartData2 = AmCharts.loadJSON( 'data/21ce50_humidity.php' );
		<?php } ?>
		
		<?php
		if ($id == '21cda2') { ?>
			var chartData = AmCharts.loadJSON( 'data/21cda2_temperature.php' );
			var chartData1 = AmCharts.loadJSON( 'data/21cda2_light.php' );
			var chartData2 = AmCharts.loadJSON( 'data/21cda2_humidity.php' );
		<?php } ?>
		
		<?php
		if ($id == '21cda3') { ?>
			var chartData = AmCharts.loadJSON( 'data/21cda3_temperature.php' );
			var chartData1 = AmCharts.loadJSON( 'data/21cda3_light.php' );
			var chartData2 = AmCharts.loadJSON( 'data/21cda3_humidity.php' );
		<?php } ?>
		
		<?php
		if ($id == '21cdad') { ?>
			var chartData = AmCharts.loadJSON( 'data/21cdad_temperature.php' );
			var chartData1 = AmCharts.loadJSON( 'data/21cdad_light.php' );
			var chartData2 = AmCharts.loadJSON( 'data/21cdad_humidity.php' );
		<?php } ?>
		
		<?php
		if ($id == '21cd71') { ?>
			var chartData = AmCharts.loadJSON( 'data/21cd71_temperature.php' );
			var chartData1 = AmCharts.loadJSON( 'data/21cd71_light.php' );
			var chartData2 = AmCharts.loadJSON( 'data/21cd71_humidity.php' );
		<?php } ?>
		
		<?php
		if ($id == '21cdb1') { ?>
			var chartData = AmCharts.loadJSON( 'data/21cdb1_temperature.php' );
			var chartData1 = AmCharts.loadJSON( 'data/21cdb1_light.php' );
			var chartData2 = AmCharts.loadJSON( 'data/21cdb1_humidity.php' );
		<?php } ?>
		<?php
			    if ($id == '21cd96') { ?>
					var chartData = AmCharts.loadJSON( 'data/21cd96_temperature.php' );
					var chartData1 = AmCharts.loadJSON( 'data/21cd96_light.php' );
					var chartData2 = AmCharts.loadJSON( 'data/21cd96_humidity.php' );
				<?php } ?>
				
				<?php
				if ($id == '21ce56') { ?>
					var chartData = AmCharts.loadJSON( 'data/21ce56_temperature.php' );
					var chartData1 = AmCharts.loadJSON( 'data/21ce56_light.php' );
					var chartData2 = AmCharts.loadJSON( 'data/21ce56_humidity.php' );
				<?php } ?>
				
				<?php
				if ($id == '21cda7') { ?>
					var chartData = AmCharts.loadJSON( 'data/21cda7_temperature.php' );
					var chartData1 = AmCharts.loadJSON( 'data/21cda7_light.php' );
					var chartData2 = AmCharts.loadJSON( 'data/21cda7_humidity.php' );
				<?php } ?>
				
				<?php
				if ($id == '21ce4f') { ?>
					var chartData = AmCharts.loadJSON( 'data/21ce4f_temperature.php' );
					var chartData1 = AmCharts.loadJSON( 'data/21ce4f_light.php' );
					var chartData2 = AmCharts.loadJSON( 'data/21ce4f_humidity.php' );
				<?php } ?>
				
				<?php
				if ($id == '21cdb9') { ?>
					var chartData = AmCharts.loadJSON( 'data/21cdb9_temperature.php' );
					var chartData1 = AmCharts.loadJSON( 'data/21cdb9_light.php' );
					var chartData2 = AmCharts.loadJSON( 'data/21cdb9_humidity.php' );
				<?php } ?>
				
				<?php
				if ($id == '21cdb6') { ?>
					var chartData = AmCharts.loadJSON( 'data/21cdb6_temperature.php' );
					var chartData1 = AmCharts.loadJSON( 'data/21cdb6_light.php' );
					var chartData2 = AmCharts.loadJSON( 'data/21cdb6_humidity.php' );
				<?php } ?>
				
				<?php
				if ($id == '21cdbd') { ?>
					var chartData = AmCharts.loadJSON( 'data/21cdbd_temperature.php' );
					var chartData1 = AmCharts.loadJSON( 'data/21cdbd_light.php' );
					var chartData2 = AmCharts.loadJSON( 'data/21cdbd_humidity.php' );
				<?php } ?>
				
				<?php
				if ($id == '21cdae') { ?>
					var chartData = AmCharts.loadJSON( 'data/21cdae_temperature.php' );
					var chartData1 = AmCharts.loadJSON( 'data/21cdae_light.php' );
					var chartData2 = AmCharts.loadJSON( 'data/21cdae_humidity.php' );
				<?php } ?>
				<?php
						if ($id == '21cd94') { ?>
							var chartData = AmCharts.loadJSON( 'data/21cd94_temperature.php' );
							var chartData1 = AmCharts.loadJSON( 'data/21cd94_light.php' );
							var chartData2 = AmCharts.loadJSON( 'data/21cd94_humidity.php' );
						<?php } ?>
						
						<?php
						if ($id == '21ce40') { ?>
							var chartData = AmCharts.loadJSON( 'data/21ce40_temperature.php' );
							var chartData1 = AmCharts.loadJSON( 'data/21ce40_light.php' );
							var chartData2 = AmCharts.loadJSON( 'data/21ce40_humidity.php' );
						<?php } ?>		
			
		<?php }
		else
		{
			header('Location: /emas/');
			exit;
		}
		?>
		
		// SERIAL CHART
		chart = new AmCharts.AmSerialChart();
		chart.pathToImages = "javalib/amcharts/images/";
		chart.categoryField = "dt";
		chart.dataProvider = chartData;
		chart.categoryAxis.labelRotation = 20;
		
		// listen for "dataUpdated" event (fired when chart is rendered) and call zoomChart method when it happens
		chart.addListener("dataUpdated", zoomChart);
		
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.axisAlpha = 0.2;
		valueAxis.dashLength = 1;
		chart.addValueAxis(valueAxis);
		
		// GRAPHS
		graph = new AmCharts.AmGraph();
		graph.type = "smoothedLine"; // this line makes the graph smoothed line.
		graph.lineColor = "#739812";
		graph.bullet = "round";
		graph.bulletSize = 8;
		graph.bulletBorderColor = "#FFFFFF";
		graph.bulletBorderAlpha = 1;
		graph.bulletBorderThickness = 2;
		graph.lineThickness = 2;
		graph.valueField = "value";
		graph.balloonText = "[[dt]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
		
		chart.addGraph(graph);
		 
		// CURSOR
     	var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.cursorPosition = "mouse";
		chart.addChartCursor(chartCursor);
		 
		// SCROLLBAR
		var chartScrollbar = new AmCharts.ChartScrollbar();
		chart.addChartScrollbar(chartScrollbar);
		chart.creditsPosition = "bottom-right";
		 
		// WRITE
		chart.write("chartdiv");
				
		// SERIAL CHART
		chart1 = new AmCharts.AmSerialChart();
		chart1.pathToImages = "javalib/amcharts/images/";
		chart1.categoryField = "dt";
		chart1.dataProvider = chartData1;
		chart1.categoryAxis.labelRotation = 20;
		
		// listen for "dataUpdated" event (fired when chart is rendered) and call zoomChart method when it happens
		chart1.addListener("dataUpdated", zoomChart1);
		
		// value
		var valueAxis1 = new AmCharts.ValueAxis();
		valueAxis1.axisAlpha = 0.2;
		valueAxis1.dashLength = 1;
		chart1.addValueAxis(valueAxis1);
		
		// GRAPHS
		graph1 = new AmCharts.AmGraph();
		graph1.type = "smoothedLine"; // this line makes the graph smoothed line.
		graph1.lineColor = "#fe987c";
		graph1.bullet = "round";
		graph1.bulletSize = 8;
		graph1.bulletBorderColor = "#FFFFFF";
		graph1.bulletBorderAlpha = 1;
		graph1.bulletBorderThickness = 2;
		graph1.lineThickness = 2;
		graph1.valueField = "value";
		graph1.balloonText = "[[dt]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
		
		chart1.addGraph(graph1);
		 
		// CURSOR
     	var chartCursor1 = new AmCharts.ChartCursor();
		chartCursor1.cursorAlpha = 0;
		chartCursor1.cursorPosition = "mouse";
		chart.addChartCursor(chartCursor1);
		 
		// SCROLLBAR
		var chartScrollbar1 = new AmCharts.ChartScrollbar();
		chart1.addChartScrollbar(chartScrollbar1);
		chart1.creditsPosition = "bottom-right";
		 
		// WRITE
		chart1.write("chartdiv1");
		
		// SERIAL CHART
		chart2 = new AmCharts.AmSerialChart();
		chart2.pathToImages = "javalib/amcharts/images/";
		chart2.categoryField = "dt";
		chart2.dataProvider = chartData2;
		chart2.categoryAxis.labelRotation = 20;
		
		// listen for "dataUpdated" event (fired when chart is rendered) and call zoomChart method when it happens
		chart2.addListener("dataUpdated", zoomChart2);
		
		// value
		var valueAxis2 = new AmCharts.ValueAxis();
		valueAxis2.axisAlpha = 0.2;
		valueAxis2.dashLength = 1;
		chart1.addValueAxis(valueAxis2);
		
		// GRAPHS
		graph2 = new AmCharts.AmGraph();
		graph2.type = "smoothedLine"; // this line makes the graph smoothed line.
		graph2.lineColor = "#1298cd";
		graph2.bullet = "round";
		graph2.bulletSize = 8;
		graph2.bulletBorderColor = "#FFFFFF";
		graph2.bulletBorderAlpha = 1;
		graph2.bulletBorderThickness = 2;
		graph2.lineThickness = 2;
		graph2.valueField = "value";
		graph2.balloonText = "[[dt]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
		
		chart2.addGraph(graph2);
		 
		// CURSOR
     	var chartCursor2 = new AmCharts.ChartCursor();
		chartCursor2.cursorAlpha = 0;
		chartCursor2.cursorPosition = "mouse";
		chart.addChartCursor(chartCursor2);
		 
		// SCROLLBAR
		var chartScrollbar2 = new AmCharts.ChartScrollbar();
		chart2.addChartScrollbar(chartScrollbar2);
		chart2.creditsPosition = "bottom-right";
		 
		// WRITE
		chart2.write("chartdiv2");
	}
	
	// this method is called when chart is first inited as we listen for "dataUpdated" event
	function zoomChart() {}
	function zoomChart1() {}
	function zoomChart2() {}
</script>
</head>
<body>
<?php if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==1){ ?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="bgColor">
    <td width="200" height="100" align="center"><img src="images/emaslogo.png" width="125" height="70" border="0" longdesc="http://smartliving.nyp.edu.sg/emas/" /></td>
    <td colspan="2" class="ProjectTitle">Environmental Monitoring &amp; Alert System</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
    <fieldset>
      <table width="950" border="0" cellspacing="0" cellpadding="0">
      	<tr>
          <td><p>Temperature 1 day Chart updating every 10 mins</p></td>
        </tr>
        <tr>
          <td align="center"><div id="chartdiv" style="width: 900px; height: 300px;"></div></td>
        </tr>
        <tr>
          <td><p>Light Luminosity 1 day Chart updating every 10 mins</p></td>
        </tr>
        <tr>
          <td align="center"><div id="chartdiv1" style="width: 900px; height: 300px;"></div></td>
        </tr>
        <tr>
          <td><p>Humidity 1 day Chart updating every 10 mins</p></td>
        </tr>
        <tr>
          <td align="center"><div id="chartdiv2" style="width: 900px; height: 300px;"></div></td>
        </tr>
    </table>
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
</body>
</html>