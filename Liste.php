<?php require_once('Connections/connection.php'); ?>
<?php
mysql_select_db($database_connection, $connection);
$query_liste_inscrits = "SELECT * FROM inscrits";
$liste_inscrits = mysql_query($query_liste_inscrits, $connection) or die(mysql_error());
$row_liste_inscrits = mysql_fetch_assoc($liste_inscrits);
$totalRows_liste_inscrits = mysql_num_rows($liste_inscrits);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<table width="968" border="10">
  <!--DWLayoutTable-->
  <tr>
    <td>ID_inscrit</td>
    <td>Nom</td>
    <td>Premon</td>
    <td>Email</td>
    <td>Formation</td>
    <td>Niveau</td>
	 <td>Suppression</td>
    <td width="83"></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_liste_inscrits['ID_inscrit']; ?></td>
      <td><?php echo $row_liste_inscrits['Nom']; ?></td>
      <td><?php echo $row_liste_inscrits['Premon']; ?></td>
      <td><?php echo $row_liste_inscrits['Email']; ?></td>
      <td><?php echo $row_liste_inscrits['Formation']; ?></td>
      <td><?php echo $row_liste_inscrits['Niveau']; ?>
      </td>
      <td> <a href="supprimer.php?id=<?php echo $row_liste_inscrits['ID_inscrit']; ?>"><input type="submit" name="Submit" value="Supprimer" /> </a></td>
    </tr>
    <tr>
      <td height="75"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <?php } while ($row_liste_inscrits = mysql_fetch_assoc($liste_inscrits)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($liste_inscrits);
?>
