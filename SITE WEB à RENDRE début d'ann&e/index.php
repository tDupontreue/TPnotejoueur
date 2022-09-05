<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Site Internet</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php
try{
    $ipserver = "https://phpmyadmin.alwaysdata.com/phpmyadmin/index.php?route=/";
    $nombase = "notejoueur"; 
    $loginPrivilege = "siteJoueur";
    $passPrivilege = "siteJoueur";


    $pdo = new PDO('mysql:host='.$ipserver.';dbname='.$nombase.'',$loginPrivilege , $passPrivilege );
} catch (Exception $error) {
    $error->getmessage();
}


     if(isset($_POST['connexion'])){
        echo "vous avez entré :".$_POST['login']."et ".$_POST['pass']."en password";

        $requetSql = "SELECT * FROM `user` WHERE 'login' = '"$_POST['login'] "' AND 'pass' = '".$_POST['pass']."';

        $resultat = $pdo ->query($requetSql); 
        if( $resultat-> rowcount>0){
            echo"on a le bon login";
        }

     }else{
        echo "veuillez vous identifiez";
    }
 ?>

<form action="" method="post">
    Login : <input type="text" name="login" />
    <br />
    pass :  <input type="password" name="pass" />
    <br />
    <input type="submit" name="connexion" />
</form>

</body>

</html>
