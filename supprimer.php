<?php require_once('Connections/connection.php'); ?>
<?php


  $idArticle= $_GET["id"];
  
  $deleteSQL = sprintf("DELETE FROM inscrits WHERE ID_inscrit= $idArticle");

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());

  
  header("Location: Liste.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
</body>
</html>
