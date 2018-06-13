<?php

/* 
 * Copyright (C) 2018 Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
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
