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
    private $token;

    public function create($_id_utilisateur, $_mail, $_prenom, $_nom, $_mdp, $_token = null) {
        $this->setId_utilisateur($_id_utilisateur);
        $this->setMail($_mail);
        $this->setPrenom($_prenom);
        $this->setNom($_nom);
        $this->setMdp($_mdp);
        $this->setToken($_token);
    }

    public function fromArray($array) {
        if (isset($array['id_utilisateur'])) {
            $this->setId_utilisateur($array['id_utilisateur']);
        }
        if (isset($array['mail'])) {
            $this->setMail($array['mail']);
        }
        if (isset($array['prenom'])) {
            $this->setPrenom($array['prenom']);
        }
        if (isset($array['nom'])) {
            $this->setNom($array['nom']);
        }
        if (isset($array['mdp'])) {
            $this->setMdp($array['mdp']);
        }
        if (isset($array['token'])) {
            $this->setToken($array['token']);
        }
    }

    public function toArray() {
        return array(
            'id_utilisateur' => $this->getId_utilisateur(),
            'mail' => $this->getMail(),
            'prenom' => $this->getPrenom(),
            'nom' => $this->getNom(),
            'mdp' => $this->getMdp(),
            'token' => $this->getToken()
        );
    }

    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getToken() {
        return $this->token;
    }

    public function setId_utilisateur($_id_utilisateur) {
        $this->id_utilisateur = $_id_utilisateur;
    }

    public function setMail($_mail) {
        $this->mail = $_mail;
    }

    public function setPrenom($_prenom) {
        $this->prenom = $_prenom;
    }

    public function setNom($_nom) {
        $this->nom = $_nom;
    }

    public function setMdp($_mdp) {
        $this->mdp = $_mdp;
    }

    public function setToken($_token) {
        $this->token = $_token;
    }

}
