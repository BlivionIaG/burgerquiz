<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateur
 *
 * @author kev29lt
 */
class Utilisateur {
    private $id_utilisateur;
    private $mail;
    private $prenom;
    private $nom;
    private $mdp;
    
    public function create($_id_utilisateur, $_mail, $_prenom, $_nom, $_mdp){
        $this->setId_utilisateur($_id_utilisateur);
        $this->setMail($_mail);
        $this->setPrenom($_prenom);
        $this->setNom($_nom);
        $this->setMdp($_mdp);
    }
    
    public function getId_utilisateur(){
        return $this->id_utilisateur;
    }
    
    public function getMail(){
        return $this->mail;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function getMdp(){
        return $this->mdp;
    }
    
    public function setId_utilisateur($_id_utilisateur){
        $this->id_utilisateur = $_id_utilisateur;
    }
    
    public function setMail($_mail){
        $this->mail = $_mail;
    }
    
    public function setPrenom($_prenom){
        $this->prenom = $_prenom;
    }
    
    public function setNom($_nom){
        $this->nom = $_nom;
    }
    
    public function setMdp($_mdp){
        $this->mdp = $_mdp;
    }
}
