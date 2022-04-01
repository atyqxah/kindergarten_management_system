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

$maxRows_parentrecordset = 10;
$pageNum_parentrecordset = 0;
if (isset($_GET['pageNum_parentrecordset'])) {
  $pageNum_parentrecordset = $_GET['pageNum_parentrecordset'];
}
$startRow_parentrecordset = $pageNum_parentrecordset * $maxRows_parentrecordset;

mysql_select_db($database_dbcon, $dbcon);
$query_parentrecordset = "SELECT * FROM parent";
$query_limit_parentrecordset = sprintf("%s LIMIT %d, %d", $query_parentrecordset, $startRow_parentrecordset, $maxRows_parentrecordset);
$parentrecordset = mysql_query($query_limit_parentrecordset, $dbcon) or die(mysql_error());
$row_parentrecordset = mysql_fetch_assoc($parentrecordset);

if (isset($_GET['totalRows_parentrecordset'])) {
  $totalRows_parentrecordset = $_GET['totalRows_parentrecordset'];
} else {
  $all_parentrecordset = mysql_query($query_parentrecordset);
  $totalRows_parentrecordset = mysql_num_rows($all_parentrecordset);
}
$totalPages_parentrecordset = ceil($totalRows_parentrecordset/$maxRows_parentrecordset)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
  <tr>
    <td>Parent ID</td>
    <td>Father Name</td>
    <td>Mother Name</td>
    <td>Father IC Number</td>
    <td>Mother IC Number</td>
    <td>Father Occupation</td>
    <td>Mother Occupation</td>
    <td>Father Salary</td>
    <td>Mother Salary</td>
    <td>Father Birth Date</td>
    <td>Mother Birth Date</td>
    <td>Father Birth Place</td>
    <td>Mother Birth Place</td>
    <td>Father Phone Number</td>
    <td>Mother Phone Number</td>
    <td>Father Descendant</td>
    <td>Mother Descendant</td>
    <td>Father Citizenship</td>
    <td>Mother Citizenship</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_parentrecordset['Parent ID']; ?></td>
      <td><?php echo $row_parentrecordset['Father Name']; ?></td>
      <td><?php echo $row_parentrecordset['Mother Name']; ?></td>
      <td><?php echo $row_parentrecordset['Father IC Number']; ?></td>
      <td><?php echo $row_parentrecordset['Mother IC Number']; ?></td>
      <td><?php echo $row_parentrecordset['Father Occupation']; ?></td>
      <td><?php echo $row_parentrecordset['Mother Occupation']; ?></td>
      <td><?php echo $row_parentrecordset['Father Salary']; ?></td>
      <td><?php echo $row_parentrecordset['Mother Salary']; ?></td>
      <td><?php echo $row_parentrecordset['Father Birth Date']; ?></td>
      <td><?php echo $row_parentrecordset['Mother Birth Date']; ?></td>
      <td><?php echo $row_parentrecordset['Father Birth Place']; ?></td>
      <td><?php echo $row_parentrecordset['Mother Birth Place']; ?></td>
      <td><?php echo $row_parentrecordset['Father Phone Number']; ?></td>
      <td><?php echo $row_parentrecordset['Mother Phone Number']; ?></td>
      <td><?php echo $row_parentrecordset['Father Descendant']; ?></td>
      <td><?php echo $row_parentrecordset['Mother Descendant']; ?></td>
      <td><?php echo $row_parentrecordset['Father Citizenship']; ?></td>
      <td><?php echo $row_parentrecordset['Mother Citizenship']; ?></td>
      <td><a href="update.php?userid=<?php echo $row_parentrecordset['Parent ID']; ?>">update</a></td>
      <td>delete</td>
    </tr>
    <?php } while ($row_parentrecordset = mysql_fetch_assoc($parentrecordset)); ?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($parentrecordset);
?>
