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
 * Description of Partie
 *
 * @author kev29lt
 */
class Partie {

    private $id_partie;
    private $nom_partie;

    public function create($_id_partie, $_nom_partie) {
        $this->setId_partie($_id_partie);
        $this->setNom_partie($_nom_partie);
    }

    public function toArray() {
        return array(
            'id_partie' => $this->getId_partie(),
            'nom_partie' => $this->getNom_partie()
        );
    }

    public function getId_partie() {
        return $this->id_partie;
    }

    public function getNom_partie() {
        return $this->nom_partie;
    }

    public function setId_partie($_id_partie) {
        $this->id_partie = $_id_partie;
    }

    public function setNom_partie($_nom_partie) {
        $this->nom_partie = $_nom_partie;
    }

}
