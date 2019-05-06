<?php

class Utilesateur_metier {

    private $nom;
    private $prenom;
    private $date_naissance;
    private $email;
    private $pwd;
    private $civilite;
               
    function __construct($nom, $prenom, $date_naissance, $email, $pwd, $civilite) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_naissance = $date_naissance;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->civilite = $civilite;
    }

    
    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getDate_naissance() {
        return $this->date_naissance;
    }

    function getEmail() {
        return $this->email;
    }

    function getPwd() {
        return $this->pwd;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setDate_naissance($date_naissance) {
        $this->date_naissance = $date_naissance;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPwd($pwd) {
        $this->pwd = $pwd;
    }
    function getCivilite() {
        return $this->civilite;
    }

    function setCivilite($civilite) {
        $this->civilite = $civilite;
    }
}
