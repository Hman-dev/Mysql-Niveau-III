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
        }
    }
    
}








?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="formulaire">
        <form action="" method="POST">
            <label for="url">Entrez votre url</label>
            <input type="url" name="url" id="url" placeholder="https://exemple.com">
            <input type="submit" name="submit" value="envoyer">

        </form>
    </div>
    
</body>
</html>