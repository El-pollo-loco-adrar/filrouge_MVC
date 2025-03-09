<?php

include "./../utils/function.php";
include "./../model/modelUser.php";
include "./jeu/header_jeu.php";
include "./jeu/view_inscriptionJeu.php";
include "./../controller/controllerInscriptionJeu.php";



$viewInscription = new ViewInscriptionJeu();
$modelUser = new ModelUser();
$controllerInscription = new ControllerInscriptionJeu($viewInscription,$modelUser);

$controllerInscription->inscrire() ;

echo $viewInscription->displayViewInscription();

include "./jeu/footer_jeu.php";
