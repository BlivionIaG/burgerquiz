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
 * \file Utilisateur.php
 * \brief Classe conteneur d'utilisateur
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 07 juin 2018
 */

/**
 * \class Utilisateur
 * 
 * \brief Classe conteneur d'utilisateur
 */
class Utilisateur {

    private $id_utilisateur; /**< identifiant de l'utilisateur */
    private $mail; /**< mail de l'utilisateur */
    private $prenom; /**< prenom de l'utilisateur */
    private $nom; /**< nom de l'utilisateur */
    private $mdp; /**< mot de passe de l'utilisateur */
    private $token; /**< token utile pour l'ajax mais pas utilisé pour l'instant */

    /**
     * \brief Assigne les valeurs à l'objet
     * 
     * \param int $_id_utilisateur identifiant de l'utilisateur
     * \param string $_mail mail de l'utilisateur
     * \param string $_prenom prenom de l'utilisateur
     * \param string $_nom nom de l'utilisateur
     * \param string $_mdp mot de passe de l'utilisateur
     * \param string $_token token de l'utilisateur
     */
    public function create($_id_utilisateur, $_mail, $_prenom, $_nom, $_mdp, $_token = null) {
        $this->setId_utilisateur($_id_utilisateur);
        $this->setMail($_mail);
        $this->setPrenom($_prenom);
        $this->setNom($_nom);
        $this->setMdp($_mdp);
        $this->setToken($_token);
    }

    /**
     * \brief Rempli l'objet depuis un tableau associatif clé=>valeur
     * 
     * \param array $array tableau associatif à l'image de l'objet
     */
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

    /**
     * \brief Renvoie l'objet sous forme de tableau clé => valeur
     * 
     * \return array tableau associatif à l'image de l'objet
     */
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

     /**
     * \brief Getter identifiant utilisateur
     * 
     * \return int identifiant utilisateur
     */
    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }

    /**
     * \brief Getter email de l'utilisateur
     * 
     * \return string email
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * \brief Getter du prenom de l'utilisateur
     * 
     * \return string prenom de l'utilisateur
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * \brief Getter nom de l'utilisateur
     * 
     * \return string nom de l'utilisateur
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * \brief Getter mot de passe
     * 
     * \return string mot de passe
     */
    public function getMdp() {
        return $this->mdp;
    }

    /**
     * \brief Getter du token
     * 
     * \return string token
     */
    public function getToken() {
        return $this->token;
    }

    /**
     * \brief Setter identifiant utilisateur
     * 
     * \param int $_id_utilisateur identifiant utilisateur
     */
    public function setId_utilisateur($_id_utilisateur) {
        $this->id_utilisateur = $_id_utilisateur;
    }

    /**
     * \brief Setter email utilisateur
     * 
     * \param string $_mail email
     */
    public function setMail($_mail) {
        $this->mail = $_mail;
    }

    /**
     * \brief Setter prenom utilisateur
     * 
     * \param string $_prenom prenom
     */
    public function setPrenom($_prenom) {
        $this->prenom = $_prenom;
    }

    /**
     * \brief Setter nom utilisateur
     * 
     * \param string $_nom nom
     */
    public function setNom($_nom) {
        $this->nom = $_nom;
    }

    /**
     * \brief Setter mot de passe utilisateur
     * 
     * \param string $_mdp mot de passe
     */
    public function setMdp($_mdp) {
        $this->mdp = $_mdp;
    }

    /**
     * \brief Setter token utilisateur
     * 
     * \param string $_token token
     */
    public function setToken($_token) {
        $this->token = $_token;
    }

}
