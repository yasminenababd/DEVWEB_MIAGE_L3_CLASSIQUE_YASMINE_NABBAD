<!DOCTYPE html>
<html>
<head>

  <title>Ajouter Client</title>
  <link rel="stylesheet" href="stylebis.css"> <!--On fait appel, ici, au fichier css qui va permettre de modifier le design de la page web. Avoir un fichier CSS pour une page de traitement de données peut parraître non nécessaire. Cependant, nous avons trouvé ça plus intéressant d'avoir un design plaisant, en cas d'erreur-->

</head>

<body>

  <p class="retour">
    <a href='Clients.php'>Retour</a> <!--Ce lien permet de retourner à la page Clients en cas d'erreur-->
  </p>

</body>

</html>

  <?php 

    try{  //Cette fois-ci, on utilise une autre méthode pour connecter la base de données. Cette dernière vérifie directement la connexion à la base de donnée

      $bdd = new PDO('mysql:host=localhost;dbname=pharmacie ynrb;charset=utf8', 'root', ''); // Cette écriture est une autre manière d'informer de l'hote, de la base de donnée, du nom d'utilisateur et du mot de passe

    }

    catch(Exception $e){

      die('Erreur : '.$e->getMessage()); //Si l'on ne peut se connecter à la base de données, un message d'erreur s'affiche

    }

      //Ici nous récupérons les informations saisies dans le formulaire
    $identifiant=$_POST['identifiant'];
    $nom=$_POST['nom'];
    $quantité = $_POST['quantité'];
    $mpayé = $_POST['payé'];


    $réponse=$bdd->query('SELECT * FROM médicaments WHERE Nom="'.$nom.'"'); //Cette requête permet de récupérer les données de la table médicaments
    $réponse2=$bdd->query('SELECT * FROM clients WHERE Identifiant="'.$identifiant.'"'); //Cette requête permet de récupérer les données de la table médicaments

    if(!isset($identifiant) OR empty($identifiant) OR !isset($nom) OR empty($nom) OR !isset($quantité) OR empty($quantité) OR !isset($mpayé) OR empty($mpayé)) { //Si tous les champs ne ssont pas saisies, un message d'erreur s'affiche
      
      ?>

        <p class="errortext">
          <?php echo "Remplissez tous les champs.";?>
        </p>
    
        <?php 

    }

    else{ //Si tous les champs sont remplis

      $donnees = $réponse->fetch();
      $donnees2 = $réponse2->fetch();

      if($donnees['Nom']==$nom && $donnees2['Identifiant']==$identifiant){ //Si les requête ont pu être exécutées c'est que le médicament et le client sont présents dans la base de données
        
        $réponse = $bdd->query('SELECT * FROM médicaments WHERE  Nom = "'.$nom.'"'); // Cette requête permet d'accèder à la table des médicaments
        $donnees = $réponse->fetch(); //Cette requête permet d'utiliser les données de la table

        if($donnees['Stock']>=$quantité){ //On vérifie si la quantité demandé est inférieur à la quantité disponible

          $réponse = $bdd->query("UPDATE médicaments SET Stock=Stock-'".$quantité."' WHERE Nom = '".$nom."'"); //Cette requête permet de update le stock de médicament grâce au calcul de stock : là où le nom du médicament correspond au nom saisi
            
            if($réponse){ //Si la requête a été executée alors on affiche un message de réussite
            
              ?>

                <p class="errortext">
                 <?php echo "Le stock a été modifié.";?>
                </p>
    
              <?php 


                $réponse = $bdd->query('SELECT * FROM médicaments WHERE  Nom = "'.$nom.'"'); // Cette requête permet d'accèder à la table des médicaments
                $donnees = $réponse->fetch(); //Cette requête permet d'utiliser les données de la table
                $montant=$donnees['Prix']*$quantité; //Ici on effectue le calcul du montant à payé en fonction du prix et de la quantité demandée

                $réponse2=$bdd->query('SELECT * FROM clients'); //Cette requête permet d'accéder à la table des clients
                $réponse2 = $bdd->query("UPDATE clients SET Crédits = Crédits - ".$mpayé." + ".$montant." WHERE Identifiant = ".$identifiant.""); //Cette requête permet d'update le crédit du client au niveau de la ligne correspondant à l'identifiant du client

                if($réponse2){ //Si cette requête fonctionne, un message de réussite est affiché
                  
                  ?>

                    <p class="errortext">
                      <?php echo "Le crédit a été modifié.";?>
                    </p>
    
                  <?php 

                } //fermé

                else{ //Si cette requête ne fonctionne pas un message d'erreur s'affiche
                  
                  ?>

                    <p class="errortext">
                      <?php echo "Le crédit n'a pas été modifié.";?>
                    </p>
    
                  <?php 

                } //fermé
            } //fermé

            else{ //Si la requête réponse n'a pas été executée, on affiche un message d'erreur

              ?>

                    <p class="errortext">
                      <?php echo "Le stock n'a pas été modifié.";?>
                    </p>
    
                  <?php 

            } //fermé
        } //fermé

        else{ // Si la condition n'est pas vérifié c'est que le stock n'est pas suffisant
  
          ?>

            <p class="errortext">
              <?php echo "Le stock n'est pas suffisant.";?>
            </p>
    
          <?php 

        } //fermé

      } //fermé

      else{ // Si la requête n'est pas exécutée c'est que le médicament n'est pas présent dans la bdd

        ?>

          <p class="errortext">
            <?php echo "Les informations saisies sur le client ou/et le médicament sont incorrectes.";?>
          </p>
    
        <?php 

      } // fermé
    }

?>