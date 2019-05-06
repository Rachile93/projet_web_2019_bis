<?php

class Article_metier {
    
   private  $nom;
   private  $prix;
   private  $quantite;
   private  $couleur;
   private  $description;
   private  $date;
   private  $type;
   private  $genre;
   private  $taille;
   
   function __construct($nom, $prix, $quantite, $couleur, $description, $date, $type, $genre, $taille) {
       $this->nom = $nom;
       $this->prix = $prix;
       $this->quantite = $quantite;
       $this->couleur = $couleur;
       $this->description = $description;
       $this->date = $date;
       $this->type = $type;
       $this->genre = $genre;
       $this->taille = $taille;
   }
   
   function getNom() {
       return $this->nom;
   }

   function getPrix() {
       return $this->prix;
   }

   function getQuantite() {
       return $this->quantite;
   }

   function getCouleur() {
       return $this->couleur;
   }

   function getDescription() {
       return $this->description;
   }

   function getDate() {
       return $this->date;
   }

   function getType() {
       return $this->type;
   }

   function getGenre() {
       return $this->genre;
   }

   function getTaille() {
       return $this->taille;
   }

   function setNom($nom) {
       $this->nom = $nom;
   }

   function setPrix($prix) {
       $this->prix = $prix;
   }

   function setQuantite($quantite) {
       $this->quantite = $quantite;
   }

   function setCouleur($couleur) {
       $this->couleur = $couleur;
   }

   function setDescription($description) {
       $this->description = $description;
   }

   function setDate($date) {
       $this->date = $date;
   }

   function setType($type) {
       $this->type = $type;
   }

   function setGenre($genre) {
       $this->genre = $genre;
   }

   function setTaille($taille) {
       $this->taille = $taille;
   }


 
   
           
}
