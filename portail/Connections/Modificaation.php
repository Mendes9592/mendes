<?php require_once('Connections/connection.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE inscrits SET Nom=%s, Premon=%s, Email=%s, Formation=%s, Niveau=%s WHERE ID_inscrit=%s",
                       GetSQLValueString($_POST['Nom'], "text"),
                       GetSQLValueString($_POST['Premon'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Formation'], "text"),
                       GetSQLValueString($_POST['Niveau'], "text"),
                       GetSQLValueString($_POST['ID_inscrit'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

  $updateGoTo = "Liste.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_connection, $connection);
$query_mise_a_jour = "SELECT * FROM inscrits";
$mise_a_jour = mysql_query($query_mise_a_jour, $connection) or die(mysql_error());
$row_mise_a_jour = mysql_fetch_assoc($mise_a_jour);
$totalRows_mise_a_jour = mysql_num_rows($mise_a_jour);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">ID_inscrit:</td>
      <td><input type="text" name="ID_inscrit" value="<?php echo $row_mise_a_jour['ID_inscrit']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nom:</td>
      <td><input type="text" name="Nom" value="<?php echo $row_mise_a_jour['Nom']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Premon:</td>
      <td><input type="text" name="Premon" value="<?php echo $row_mise_a_jour['Premon']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Email:</td>
      <td><input type="text" name="Email" value="<?php echo $row_mise_a_jour['Email']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Formation:</td>
      <td><input type="text" name="Formation" value="<?php echo $row_mise_a_jour['Formation']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Niveau:</td>
      <td><input type="text" name="Niveau" value="<?php echo $row_mise_a_jour['Niveau']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Modification"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="ID_inscrit" value="<?php echo $row_mise_a_jour['ID_inscrit']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($mise_a_jour);
?>
