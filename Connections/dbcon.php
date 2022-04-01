<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dbcon = "localhost";
$database_dbcon = "kindergarten enrollment system";
$username_dbcon = "root";
$password_dbcon = "";
$dbcon = mysql_pconnect($hostname_dbcon, $username_dbcon, $password_dbcon) or trigger_error(mysql_error(),E_USER_ERROR); 
?>