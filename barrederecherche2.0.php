<?php
    require('header.php');
//On se connecte à la base de donnée
    $servername ="localhost";
    $username ="root";
    $password = "";
    $bdd = new PDO("mysql:host=$servername;dbname=miam;", $username, $password);
    $recette=$bdd->query('SELECT * FROM form_recette WHERE traitement="Validé"');
    //Si l'utilisateur effectue une recherche on recupere dans la base de donnée les données correspondante
    if(isset($_GET['rechercher'])AND !empty($_GET['rechercher'])){
        $recherche=$_GET['rechercher'];
        $recette=$bdd->prepare('SELECT * FROM form_recette WHERE traitement="Validé" AND nom REGEXP :mot_entier' );
        $recette->execute(array(':mot_entier' => '\b'.$recherche.'\b'));
    };

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Barre de recherche</title>
        <meta charset="utf-8">
    </head>
    <body>
        <section class="afficher">
            <?php
                //si il y a des recette a afficher on les affiche
                if($recette->rowCount()>0){
                    while($r=$recette->fetch()){
                        ?>
                        <p><a href="visuelrecette.php?id=<?php echo $r['id']?>"><?php echo $r['nom'];?></a>
                        <?php 
                        //on met un nombre d'etoile en fonction de la note de la recette
                            if($r['note']==NULL){
                                echo "pas de note";
                            }elseif(0<=$r['note'] && $r['note']<1){
                                echo "";
                            }elseif(1<=$r['note'] && $r['note']<2){
                                echo "*";
                            }elseif(2<=$r['note'] && $r['note']<3){
                                echo "**";
                            }elseif(3<=$r['note'] && $r['note']<4){
                                echo "***";
                            }elseif(4<=$r['note'] && $r['note']<5){
                                echo "****";
                            }else{
                                echo "*****";
                            };?></p>
                        <?php
                    }
                }
                else{
                    ?>
                    <p>Aucune recette trouvée</p>
                    <?php
                }
            ?>

        </section>
    </body>
</html>
