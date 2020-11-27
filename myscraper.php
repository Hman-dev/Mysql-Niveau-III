<?php
require_once ("databasemedoo.php");
include 'email_scraper.php' ;
$url = "https://github.com/nyxgeek/username-lists/blob/master/usernames-top100/usernames_gmail.com.txt";

$emails= scrape_email($url);

foreach($emails as $email){
    // $database->insert("emails",["email"=>$email]);
}

 if(!empty($_POST['envoyer'])){
     if(!empty($_POST['url_recu'])){

         $urlrecu = htmlspecialchars($_POST['url_recu']);
         $emails1 = scrape_email($urlrecu);
         foreach($emails1 as $email1){
            // $database->insert("emails",["email"=>$email1]);
            
        }
        $countemail = $database->count("emails","*");
        echo "<p>Le nombre d'adresse emails trouvées est : $countemail</p>";
     }
    /* $data1 = $database->select("emails","*");
     $countemail = $database->count("emails",["email"=>$emails1]);
     foreach($data1 as $utilisateur){
        $emailtab= $utilisateur['email'];
           
        echo "'<tr><th> </tr>";
   
    }*/
    // echo "'<p>le nombre d'adresse emails trouvées est: $countemail</p>'"; 
 }
     
 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Scraper</title>
</head>
<!-- question 4 -->
<body class="bg-info">
<div class="container mt-5">
<div class="row">  
    <div class="col-lg-6 m-auto">
        <div class="card mt-5">
            <div class="card-title ">
            <h2 class="text-center">Scraper email</h2>
            </div>
            <div class="text-center m-5">
            <form action="myscraper.php" method ="post">
            <div class="form-group">
                <label> Votre Url :</label>
                <input type="url" name="url_recu" placeholder ="Entrez votre url ici" required/>
            </div>
            
            <div class="form-group">
                
                <input type="submit" value="valider" name= "envoyer" class="btn btn-primary"/>
            </div>
            </form>
            </div>

         </div>
    </div>      
    
</div>
</div>

    
</body>
</html>