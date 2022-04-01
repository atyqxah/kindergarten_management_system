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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO parent (`Parent ID`, `Father Name`, `Mother Name`, `Father IC Number`, `Mother IC Number`, `Father Occupation`, `Mother Occupation`, `Father Salary`, `Mother Salary`, `Father Birth Date`, `Mother Birth Date`, `Father Birth Place`, `Mother Birth Place`, `Father Phone Number`, `Mother Phone Number`, `Father Descendant`, `Mother Descendant`, `Father Citizenship`, `Mother Citizenship`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Parent_ID'], "text"),
                       GetSQLValueString($_POST['Father_Name'], "text"),
                       GetSQLValueString($_POST['Mother_Name'], "text"),
                       GetSQLValueString($_POST['Father_IC_Number'], "int"),
                       GetSQLValueString($_POST['Mother_IC_Number'], "int"),
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
                       GetSQLValueString($_POST['Mother_Citizenship'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Parent ID:</td>
      <td><input type="text" name="Parent_ID" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Name:</td>
      <td><input type="text" name="Father_Name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Name:</td>
      <td><input type="text" name="Mother_Name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father IC Number:</td>
      <td><input type="text" name="Father_IC_Number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother IC Number:</td>
      <td><input type="text" name="Mother_IC_Number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Occupation:</td>
      <td><input type="text" name="Father_Occupation" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Occupation:</td>
      <td><input type="text" name="Mother_Occupation" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Salary:</td>
      <td><input type="text" name="Father_Salary" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Salary:</td>
      <td><input type="text" name="Mother_Salary" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Birth Date:</td>
      <td><input type="text" name="Father_Birth_Date" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Birth Date:</td>
      <td><input type="text" name="Mother_Birth_Date" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Birth Place:</td>
      <td><input type="text" name="Father_Birth_Place" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Birth Place:</td>
      <td><input type="text" name="Mother_Birth_Place" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Phone Number:</td>
      <td><input type="text" name="Father_Phone_Number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Phone Number:</td>
      <td><input type="text" name="Mother_Phone_Number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Descendant:</td>
      <td><input type="text" name="Father_Descendant" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Descendant:</td>
      <td><input type="text" name="Mother_Descendant" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Father Citizenship:</td>
      <td><input type="text" name="Father_Citizenship" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mother Citizenship:</td>
      <td><input type="text" name="Mother_Citizenship" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2" />
</form>
<p>&nbsp;</p>
</body>
</html>