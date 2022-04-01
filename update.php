<?php virtual('/kindergarten/Connections/dbcon.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE parent SET `Father Name`=%s, `Mother Name`=%s, `Father IC Number`=%s, `Mother IC Number`=%s, `Father Occupation`=%s, `Mother Occupation`=%s, `Father Salary`=%s, `Mother Salary`=%s, `Father Birth Date`=%s, `Mother Birth Date`=%s, `Father Birth Place`=%s, `Mother Birth Place`=%s, `Father Phone Number`=%s, `Mother Phone Number`=%s, `Father Descendant`=%s, `Mother Descendant`=%s, `Father Citizenship`=%s, `Mother Citizenship`=%s, `Package Code`=%s WHERE `Parent ID`=%s",
                       GetSQLValueString($_POST['Father_Name'], "text"),
                       GetSQLValueString($_POST['Mother_Name'], "text"),
                       GetSQLValueString($_POST['Father_IC_Number'], "text"),
                       GetSQLValueString($_POST['Mother_IC_Number'], "text"),
                       GetSQLValueString($_POST['Father_Occupation'], "text"),
                       GetSQLValueString($_POST['Mother_Occupation'], "text"),
                       GetSQLValueString($_POST['Father_Salary'], "double"),
                       GetSQLValueString($_POST['Mother_Salary'], "double"),
                       GetSQLValueString($_POST['Father_Birth_Date'], "date"),
                       GetSQLValueString($_POST['Mother_Birth_Date'], "date"),
                       GetSQLValueString($_POST['Father_Birth_Place'], "text"),
                       GetSQLValueString($_POST['Mother_Birth_Place'], "text"),
                       GetSQLValueString($_POST['Father_Phone_Number'], "text"),
                       GetSQLValueString($_POST['Mother_Phone_Number'], "text"),
                       GetSQLValueString($_POST['Father_Descendant'], "text"),
                       GetSQLValueString($_POST['Mother_Descendant'], "text"),
                       GetSQLValueString($_POST['Father_Citizenship'], "text"),
                       GetSQLValueString($_POST['Mother_Citizenship'], "text"),
                       GetSQLValueString($_POST['Package_Code'], "text"),
                       GetSQLValueString($_POST['Parent_ID'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $updateGoTo = "list.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_userupdate = "-1";
if (isset($_GET['Parent ID'])) {
  $colname_userupdate = $_GET['Parent ID'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_userupdate = sprintf("SELECT * FROM parent WHERE `Parent ID` = %s", GetSQLValueString($colname_userupdate, "text"));
$userupdate = mysql_query($query_userupdate, $dbcon) or die(mysql_error());
$row_userupdate = mysql_fetch_assoc($userupdate);
$totalRows_userupdate = mysql_num_rows($userupdate);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Parent ID:</td>
      <td><?php echo $row_userupdate['Parent ID']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Name:</td>
      <td><input type="text" name="Father_Name" value="<?php echo htmlentities($row_userupdate['Father Name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Name:</td>
      <td><input type="text" name="Mother_Name" value="<?php echo htmlentities($row_userupdate['Mother Name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father IC Number:</td>
      <td><input type="text" name="Father_IC_Number" value="<?php echo htmlentities($row_userupdate['Father IC Number'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother IC Number:</td>
      <td><input type="text" name="Mother_IC_Number" value="<?php echo htmlentities($row_userupdate['Mother IC Number'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Occupation:</td>
      <td><input type="text" name="Father_Occupation" value="<?php echo htmlentities($row_userupdate['Father Occupation'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Occupation:</td>
      <td><input type="text" name="Mother_Occupation" value="<?php echo htmlentities($row_userupdate['Mother Occupation'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Salary:</td>
      <td><input type="text" name="Father_Salary" value="<?php echo htmlentities($row_userupdate['Father Salary'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Salary:</td>
      <td><input type="text" name="Mother_Salary" value="<?php echo htmlentities($row_userupdate['Mother Salary'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Birth Date:</td>
      <td><input type="text" name="Father_Birth_Date" value="<?php echo htmlentities($row_userupdate['Father Birth Date'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Birth Date:</td>
      <td><input type="text" name="Mother_Birth_Date" value="<?php echo htmlentities($row_userupdate['Mother Birth Date'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Birth Place:</td>
      <td><input type="text" name="Father_Birth_Place" value="<?php echo htmlentities($row_userupdate['Father Birth Place'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Birth Place:</td>
      <td><input type="text" name="Mother_Birth_Place" value="<?php echo htmlentities($row_userupdate['Mother Birth Place'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Phone Number:</td>
      <td><input type="text" name="Father_Phone_Number" value="<?php echo htmlentities($row_userupdate['Father Phone Number'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Phone Number:</td>
      <td><input type="text" name="Mother_Phone_Number" value="<?php echo htmlentities($row_userupdate['Mother Phone Number'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Descendant:</td>
      <td><input type="text" name="Father_Descendant" value="<?php echo htmlentities($row_userupdate['Father Descendant'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Descendant:</td>
      <td><input type="text" name="Mother_Descendant" value="<?php echo htmlentities($row_userupdate['Mother Descendant'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Citizenship:</td>
      <td><input type="text" name="Father_Citizenship" value="<?php echo htmlentities($row_userupdate['Father Citizenship'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Citizenship:</td>
      <td><input type="text" name="Mother_Citizenship" value="<?php echo htmlentities($row_userupdate['Mother Citizenship'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Package Code:</td>
      <td><input type="text" name="Package_Code" value="<?php echo htmlentities($row_userupdate['Package Code'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="Parent ID" value="<?php echo $row_userupdate['Parent ID']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($userupdate);
?>
