<?php

class ModelUser{
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?string $password;
    private ?string $role;
    private ?PDO $bdd;

    public function __construct() {
        $this->bdd = connect();
    }


    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }


    public function getPseudo(): ?string {
        return $this->pseudo;
    }
    public function setPseudo(?string $pseudo): self {
        $this->pseudo = $pseudo;
        return $this;
    }


    public function getEmail(): ?string {
        return $this->email;
    }
    public function setEmail(?string $email): self {
        $this->email = $email;
        return $this;
    }


    public function getPassword(): ?string {
        return $this->password;
    }
    public function setPassword(?string $password): self {
        $this->password = $password;
        return $this;
    }


    public function getRole(): ?string {
        return $this->role;
    }
    public function setRole(?string $role): self {
        $this->role = $role;
        return $this;
    }


    public function getBdd(): ?PDO {
        return $this->bdd;
    }
    public function setBdd(?PDO $bdd): self {
        $this->bdd = $bdd;
        return $this;
    }


    public function addUser(): string{

        try{
            $req= $this->getBdd()->prepare("INSERT INTO users(pseudo_user, mail_user, password_user) VALUES (?,?,?)");

            $pseudo = $this->getPseudo();
            $email = $this->getEmail();
            $password = $this->getPassword();

            $req->bindParam(1, $pseudo, PDO::PARAM_STR);
            $req->bindParam(2, $email, PDO::PARAM_STR);
            $req->bindParam(3, $password, PDO::PARAM_STR);

            $req->execute();
            return "$pseudo peut débuter son aventure";
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function addMailNewsletter($email) {
        try{
            $req= $this->getBdd()->prepare("SELECT email FROM newsletter WHERE email = ? LIMIT 1");
            $email = $this->getEmail();

            $req= $this->getBdd()->prepare("INSERT INTO newsletter(email) VALUES (?)");

            // $email = $this->getEmail();

            $req->bindParam(1, $email, PDO::PARAM_STR);

            return $req->execute();
        }catch(PDOException $e){
            return false;
        }
    }


}