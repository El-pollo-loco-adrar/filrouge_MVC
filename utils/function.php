<?php
//Fonction de nettoyage de données
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//Fonction de création de l'objet de connexion PDO
function connect(){
    return new PDO('mysql:host=localhost;dbname=zoo','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}

?>