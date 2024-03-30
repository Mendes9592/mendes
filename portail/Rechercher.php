<?php require_once('Connections/connection.php'); ?>
<?php
$colname_rechercher = "-1";
if (isset($_POST['Premon'])) {
  $colname_rechercher = (get_magic_quotes_gpc()) ? $_POST['Premon'] : addslashes($_POST['Premon']);
}
mysql_select_db($database_connection, $connection);
$query_rechercher = sprintf("SELECT * FROM inscrits WHERE Premon = '%s'", $colname_rechercher);
$rechercher = mysql_query($query_rechercher, $connection) or die(mysql_error());
$row_rechercher = mysql_fetch_assoc($rechercher);
$totalRows_rechercher = mysql_num_rows($rechercher);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rechercher</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
Premon
<label>
  <input type="text" name="Premon" />
  </label>
  <label>
  <input type="submit" name="Submit" value="Rechercher" />
  </label>
</form>

<table border="10">
  <!--DWLayoutTable-->
  <tr>
    <td>ID_inscrit</td>
    <td>Nom</td>
    <td>Premon</td>
    <td>Email</td>
    <td>Formation</td>
    <td>Niveau</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rechercher['ID_inscrit']; ?></td>
      <td><?php echo $row_rechercher['Nom']; ?></td>
      <td><?php echo $row_rechercher['Premon']; ?></td>
      <td><?php echo $row_rechercher['Email']; ?></td>
      <td><?php echo $row_rechercher['Formation']; ?></td>
      <td><?php echo $row_rechercher['Niveau']; ?></td>
    </tr>
    <tr>
      <td height="177"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <?php } while ($row_rechercher = mysql_fetch_assoc($rechercher)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($rechercher);
?>
