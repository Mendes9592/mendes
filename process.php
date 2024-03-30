<?php
// Connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom = $_POST["Nom"];
	$Prenom = $_POST["Prenom"];
    $Email = $_POST["Email"];
    $Formation = $_POST["Formation"];
   $Niveau = $_POST["Niveau"];
   
  // echo $Nom ;
  // echo $Prenom ;
   //echo $Email ;
   //echo $Formation ;
   //echo $Niveau ;
   
   
   
 
$sql = "INSERT INTO inscrits (Nom,Premon, Email,Formation,Niveau) VALUES ('$Nom', '$Prenom', '$Email','$Formation','$Niveau')";


    if ($conn->query($sql) === TRUE) {
        echo "Inscription validée!";
		 header("Location: Liste.php");
		     exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
