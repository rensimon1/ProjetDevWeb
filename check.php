<?php
require ('sqlConn.php');

session_start();

$email=$_GET['email'];
$mdp=$_GET['password'];

$sql = "SELECT * FROM utilisateur";
$utilisateur = $conn->query($sql);
$reponse = 0;

if ($utilisateur->num_rows > 0) {
  while($row = $utilisateur->fetch_assoc()) {
    if ($row["email"] == $email && $row["password"] == $mdp){
      
      $_SESSION['id_user']=$row['id_user'];
      $_SESSION['email']=$email;
      $_SESSION['password']=$row['password'];
      $_SESSION['nom']=$row['nom'];
      $_SESSION['prenom']=$row['prenom'];
      $_SESSION['image']=$row['image'];
      $_SESSION['date_creation']=$row['date_creation'];
      $_SESSION['administrateur']=$row['administrateur'];
      $_SESSION['ban']=$row['ban'];
      $_SESSION['note_moy']=$row['note_moy'];
      $reponse = $row['id_user'];
      
    }
  }
}

$conn->close();
echo $reponse;

?>
