<?php
require ('sqlConn.php');
$choix=$_GET['choix'];
$sens=$_GET['sens'];

switch($sens){
    case "Croissant":
        $s = "ASC";
        break;
    case "Décroissant";
        $s = "DESC";
        break;
        
}
switch($choix){
    case "Note moyenne":
        $user = "SELECT * FROM utilisateur ORDER BY note_moy $s";
        $u = $conn->query($user);
        break;
    case "Email":
        $user = "SELECT * FROM utilisateur ORDER BY email $s";
        $u = $conn->query($user);
        break;
    case "Nom":
        $user = "SELECT * FROM utilisateur ORDER BY nom  $s";
        $u = $conn->query($user);
        break;
    case "Prénom":
        $user = "SELECT * FROM utilisateur ORDER BY prenom $s";
        $u = $conn->query($user);
        break;
    default:

}


if (isset($u) && $u != false && $u->num_rows > 0) {
    $i = 1;
    echo "<ul id='myUL'>";
    while($row = $u->fetch_assoc()) {
        $email = $row['email'];
        $id_user = $row['id_user'];
        if ($email !='admin') {
            echo "<li><a href='visuelProfil.php?id_user=$id_user'>";
            echo $i . '.';
            echo "<span class='tab'></span>";
            echo "<img src='" . $row['image'] . "' alt='Introuvable' width='30' height='30'>";
            echo " ";
            echo "<label id='email'>" . $email . "</label>";
            echo "<span class='tab'></span>";
            echo "Nom : " . "<label id='nom'>" . $row['nom'] . "</label>";
            echo "<span class='tab'></span>";
            echo "Prénom : " . "<label id='prenom'>" . $row['prenom'] . "</label>";
            echo "<span class='tab'></span>";
            echo "Note moyenne : " . $row['note_moy'];
            echo "</a></li>";
            $i = $i + 1;
        }
    }
    echo "</ul>";
}
$conn->close();
?> 
