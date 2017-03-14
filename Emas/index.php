<?php 
session_start();
session_destroy();
require_once('connection/Connection_king.php');
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
      <table width="1000" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="700"><img src="images/internetOfThings.png" width="700" height="390" /></td>
          <td align="center">
          <?php if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==1){ ?>
          <?php }elseif(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==2){ ?><p>Incorrect Username or Password.</p>

            <form action="admin/admincheck.php" method="post" enctype="multipart/form-data">
                <br />
                <input name="username" type="text" value="Username" size="22" maxlength="20" />
                <br />
                <input name="password" type="password" value="Password" size="22"	maxlength="20" />
                <br /><br />
                <input type="hidden" name="action" value="adminlogin" />
                <input type="submit" name="submit" value="Log In" style="height:25px; width:160px" />
            </form>    
    	  <?php }else{ ?>
            <form action="admin/admincheck.php" method="post" enctype="multipart/form-data">
                <br />
                <input name="username" type="text" value="Username" size="22" maxlength="20" />
                <br />
                <input name="password" type="password" value="Password" size="22"	maxlength="20" />
                <br /><br />
                <input type="hidden" name="action" value="adminlogin" />
                <input type="submit" name="submit" value="Log In" style="height:25px; width:160px" />
            </form>
    	<?php }?>
          </td>
        </tr>
      </table>
    </fieldset>
    </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr class="bgColor">
    <td width="300" height="100" align="center"><img src="images/nyp.png" width="200" height="40" longdesc="http://www.nyp.edu.sg" /></td>
    <td width="500" align="center" class="copyRightFont">Copyright © 2014. All Rights Reserved.</td>
    <td width="200" align="center"><img src="images/nxp.png" width="135" height="50" border="0" longdesc="http://www.nxp.com" /></td>
  </tr>
</table>
</body>
</html>