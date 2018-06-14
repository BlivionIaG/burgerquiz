#ifndef PARTIE_H
#define PARTIE_H

/*!
 * \file partie.h
 * \brief gestion des parties
 * \author Antoine O.
 * \version 1.0
 */

#include <string>
#include <QVector>
#include <iostream>

#include "connectiondb.h"

/*! \Class Partie
 * \Brief class de gestion des parties
 */

class Partie
{
public:
    Partie();
    /*!
     * \brief construteur de Partie
     * \param name : nom pour le theme
     * \param id_theme : id pour le theme
     */
    Partie(std::string name,int id_theme):nom_Partie(name),id(id_theme){}
    /*!
     * \brief recupération liste des parties
     *
     * \return tableau de Partie ou tableau vide en cas d'erreur
     */
    static QVector<Partie*> getParties();
    /*!
     * \brief recupération id partie
     *
     * \return id_partie
     */
    int getId(){return id;}
    /*!
     * \brief recupération nom partie
     *
     * \return nom_partie
     */
    std::string getName(){return nom_Partie;}

private:
    std::string nom_Partie;/*!< nom de la partie */
    int id;/*!< id de la partie */
};

#endif // PARTIE_H
