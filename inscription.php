<?php include('header.php') ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="inscription.css" rel="stylesheet" type="text/css">
        <title>Inscription</title>
    </head>
    <body>
        <div id="d1">
        <form>
            <h1 class="titre">Inscription</h1>
            <div class="utilisateur">
                <input type="email" id="email" name="email" placeholder="Email" /> <div id="err"></div> <br><br>
                <input type="password" id="password" name="password" placeholder="Mot de passe"><br><br>
                <div class="bouton">
                    <button type="button" onclick="f()">S'inscrire</button>
                   </div>
            </div>
        </form>
        </br>
        </div>

        <script>
            function f() {
                var xhttp = new XMLHttpRequest();
              
            xhttp.onreadystatechange=function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.response){
                        document.getElementById("err").innerHTML = "Email incorrect";
                    }
                    else{
                        window.location = "connexion.php";
                    }
                    
                }
              };
              var email=document.getElementById('email').value;
              var password=document.getElementById('password').value;
              xhttp.open("POST", "nvcompte.php?email=" + email +"&password=" + password, true);
              xhttp.send();
            }
            </script>


    </body>

</html>