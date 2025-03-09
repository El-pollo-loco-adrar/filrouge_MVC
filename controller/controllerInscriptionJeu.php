<?php

class ControllerInscriptionJeu{
    private ?ViewInscriptionJeu $viewInscriptionJeu;
    private ?ModelUser $modelUser;
    

    public function __construct(ViewInscriptionJeu $viewInscriptionJeu, ModelUser $modelUser){
        $this->modelUser = $modelUser;
        $this->viewInscriptionJeu = $viewInscriptionJeu;
        }    
        

    public function getModelUser(): ?ModelUser {
        return $this->modelUser;
    }
    public function setModelUser(?ModelUser $modelUser): self {
        $this->modelUser = $modelUser;
        return $this;
    }


    public function getViewInscriptionJeu(): ?ViewInscriptionJeu {
        return $this->viewInscriptionJeu;
    }
    public function setViewInscriptionJeu(?ViewInscriptionJeu $viewInscriptionJeu): self {
        $this->viewInscriptionJeu = $viewInscriptionJeu;
        return $this;
    }

    //Fonction qui envoie info inscription joueur vers BDD

    public function inscrire():string{
        $message = "";
        if(isset($_POST["inscriptionButton"]) && !empty($_POST["inscriptionButton"])){

            if(isset($_POST["nameInscription"]) && !empty($_POST["nameInscription"]) &&
            isset($_POST["emailInscription"]) && !empty($_POST["emailInscription"])&&
            isset($_POST["passwordInscription"]) && !empty($_POST["passwordInscription"]) &&
            isset($_POST["confirmPasswordInscription"]) && !empty($_POST["confirmPasswordInscription"])){

                //Verif du format du mail
                if(filter_var($_POST["emailInscription"], FILTER_VALIDATE_EMAIL)){

                    //Verif des mdp
                    if($_POST["passwordInscription"] === $_POST["confirmPasswordInscription"]){

                        //Nettoie des données
                        $pseudo = sanitize($_POST["nameInscription"]);
                        $email = sanitize($_POST["emailInscription"]);
                        $password = sanitize($_POST["passwordInscription"]);

                        $password = password_hash($password, PASSWORD_BCRYPT);

                        $bdd = connect();

                        $message = $this->modelUser->addUser();

                    }else{
                        $message = "Les mots de passe ne correspondent pas";
                    }

                }else{
                    $message = "L'email n'est pas au bon format";
                }

            }else{
                $message = "Veuillez remplir tous les champs";
            }

        }return $message;
        
    
    }
    }

