<?php

$mabase = null;
        $access = null;
        $errorMessage="";
        try{
            $user = "theo";
            $pass = "theo";
            $mabase = new PDO('mysql:host='.$ipserver.';dbname='.$nombase.'',$loginPrivilege , $passPrivilege );
        }catch(Exception $e){
            $errorMessage .= $e->getMessage();
        }
        $Joueur1 = new User($mabase); 

        if(!is_null($mabase)){
            if (isset($_SESSION["Connected"]) && $_SESSION["Connected"]===true){
                $access = true;
                if(isset($_SESSION["idUser"])){
                    $Joueur1->setUserById($_SESSION["idUser"]);
                }
            }else{
                $access = false;
                $access = $Joueur1->ConnectToi();
            }
        }else{
            $errorMessage.= "Le site n'a pas accès à la BDD.";
        }


try {
    $ipserver = "https://phpmyadmin.alwaysdata.com/phpmyadmin/index.php?route=/";";
    $nomBase = "Notejoueur";
    $loginPrivilege = "SiteJoueur";
    $passPrivilege = "SiteJoueur";

    $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);
} catch (Exception  $error) {
    $error->getMessage();
}

if (isset($_POST['connexion'])) {
    $TheUser->seConnecter($_POST['login'], $_POST['pass']);
}

if (isset($_POST['deconnexion'])) {
    //echo "vous êtes déconnecter";
    $TheUser->seDeConnecter();
}

if (isset($_SESSION['Connexion']) && $_SESSION['Connexion'] == true) {
    $TheUser->setUserById($_SESSION['id']);
    
    $htmlformdeco = '<form action="" method="post" class="form-inline my-2 my-lg-0">
    <input class="btn btn-outline-dark bg-light" type="submit" name="deconnexion" value="Se déconnecter">
    </form>';
    $htmllinkCompte = '<li class="nav-item"><a class="nav-link active" aria-current="page" href="compte.php">Compte</a></li>';
}
?>