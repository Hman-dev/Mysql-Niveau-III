<?php
include_once "databasemedoo.php";
include_once "email_scraper.php";

// /$url = "https://github.com/nyxgeek/username-lists/blob/master/usernames-top100/usernames_gmail.com.txt";
// $emails= scrape_email($url);

if(isset($_POST['submit'])){
    if(!empty($_POST['url'])){
        $url = htmlspecialchars( $_POST['url']);
        $emails= scrape_email($url);
        foreach($emails as $email){
            $database->insert("emails",["email"=>$email]);
            
           /* if ($email == true){
                echo "<td><th>$email</th></td><br/>";
            }*/
        }
        
        
    }
    $data= $database->select("emails","*");
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 m-auto">
              <div class="card mt-2">
              <h1 class="bg-success text-white text-center py-3">Scraper email</h1>
              <img src="img1.jpg" class="card-img-top" alt="...">
                  <div class="card-title">
                    
                  </div>
                 <div class="center mt-1 ">        
                    <form action="" method ="POST">
                        <div class="form-group text-center">
                            <label for="url">Entrez votre url</label>
                            <input type="url" name="url" id="url" placeholder="https://exemple.com">
                        </div>


                        <div class="form-group text-center">
    
                            <input type="submit" value="envoyer" name= "submit" class="btn btn-primary"/>
                        </div>
                     </form>
                </div>
              </div>


            </div>
        </div>
    </div>


    <?php if(isset($_POST["submit"])){ $countemail = $database->count("emails","*");echo"<p class='text-center font-weight-bold mt-2'>Le nombre d'adresse emails trouvées est: $countemail</p>"; } ?>
  
   <table class="table table-striped">
    <?php if(isset($_POST['submit'])): ?>
       <?php $i=0; // on initialise le compteur
       foreach($data as $email):$i++;// à chaque tour de tableau on incrémente un email  ?>
       <?php if($i==1):?>
            <tr>
       <?php endif;?>
            <td><?= $email['email']?></td> 

        <?php if($i==5) :$i=0; // ici lorsqu'on arrive à 6 emails on fait reset sur le i et on remet les compteur à 0?>
            </tr>
        <?php endif;?>
        <?php endforeach;?>
    <!--  je rajoute une condition si le nbr de email de la dernière ligne 
                        n'est pas un multiple de 6 je dois fermer la ligne avant de 
                        fermer le tableau  -->
        <?php if($i !=0);?>
        </tr>
        <?php endif;?>
   </table>
     
    
</body>
</html>