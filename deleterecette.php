<?php
    require('header.php');   
    $servername ="localhost";
    $username ="root";
    $password = "";
    $bdd = new PDO("mysql:host=$servername;dbname=miam;", $username, $password);
//on se connecte a la bdd puis on supprime la recette les etapes de la recette les ingredients et les commentaires
    if(isset($_GET['delete']) AND !empty($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $delete=$bdd->prepare('DELETE FROM form_recette WHERE id=?');
        $deleteingredient=$bdd->prepare('DELETE FROM form_ingredient WHERE recette_id=?');
        $deleteetape=$bdd->prepare('DELETE FROM form_etape WHERE recette_id=?');
        $deletecommentaire=$bdd->prepare('DELETE FROM commentaire WHERE recette_id=?');
        $delete->execute(array($delete_id));
        $deleteingredient->execute(array($delete_id));
        $deleteetape->execute(array($delete_id));
        $deletecommentaire->execute(array($delete_id));
        echo "Recette supprimée";
        ?>
        <a href=listerecette.php>Recette à traiter</a>
        <a href="listerecetteVALIDE.php">Recette validée</a>
        <?php
       // header('Location:listerecette.php');
    }
?>
