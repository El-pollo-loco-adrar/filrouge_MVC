<?php
session_start();

class ControllerAccueil{

    private ?ModelUser $modelUser;

    public function __construct(ModelUser $modelUser){
        $this->modelUser = $modelUser;
    }


    public function getModelUser(): ?ModelUser {
        return $this->modelUser;
    }
    public function setModelUser(?ModelUser $modelUser): self {
        $this->modelUser = $modelUser;
        return $this;
    }

    public function inscrireNewsletter() {
        
    }

}

?>