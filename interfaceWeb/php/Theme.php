<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Theme
 *
 * @author kev29lt
 */
class Theme {
    private $id_theme;
    private $nom_theme;
    private $active;
    
    public function create($_id_theme, $_nom_theme, $_active){
        $this->setId_theme($_id_theme);
        $this->setNom_theme($_nom_theme);
        $this->setActive($_active);
    }
    
    public function getId_theme(){
        return $this->id_theme;
    }
    
    public function getNom_theme(){
        return $this->nom_theme;
    }
    
    public function getActive(){
        return $this->active;
    }
    
    public function setId_theme($_id_theme){
        $this->id_theme = $_id_theme;
    }
    
    public function setNom_theme($_nom_theme){
        $this->nom_theme = $_nom_theme;
    }
    
    public function setActive($_active){
        $this->active = $_active;
    }
}
