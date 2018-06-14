#ifndef REPONSE_H
#define REPONSE_H

/*!
 * \file reponse.h
 * \brief gestion des réponses
 * \author Antoine O.
 * \version 1.0
 */

#include <string>
#include <QVector>
#include <iostream>

#include "connectiondb.h"

#include"user.h"
#include"partie.h"
#include"question.h"

/*! \Class Reponse
 * \Brief classe de gestion des reponses
 */

class Reponse
{
public:
    Reponse();
    /*!
     * \brief construteur de Reponse
     * \param id : id pour la question
     * \param value : valeur de la reponse(0,1 ou 2)
     * \param propos : proposition reponse
     * \param question : question a laquelle la proposition est associé
     */
    Reponse(int id,int value,std::string propos,Question question):id(id),valeur(value),proposition(propos),question(question){}
    /*!
     * \brief recupération reponse lié a une question
     * \param id : id de la question associer
     * \return tableau de reponse ou tableau vide en cas d'erreur
     */
    static QVector<Reponse*> getReponses(int id);
    /*!
     * \brief ajout reponse pour une question
     * \param rep : valeur de la reponse
     * \param proposition : proposition
     * \param idq : id de la question
     * \return true en cas de succee et false en cas d'erreur de la requet
     */
    bool addReponse(int rep,std::string proposition,int idq);
    /*!
     * \brief ajout reponse pour une question
     * \param id : id de la reponse
     * \param name : nouvelle proposition
     * \param choix : reponse de la question
     * \return true en cas de succee et false en cas d'erreur de la requet
     */
    bool updateReponse(int id,std::string name,int choix);
    /*!
     * \brief suppression reponse
     * \param id : id de la reponse
     * \return true en cas de succee et false en cas d'erreur de la requet
     */
    bool deleteReponse(int id);
    /*!
     * \brief revoie la dernier reponse ajouter
     * \return last reponse ou une reponse vide en cas d'erreur
     */
    Reponse getlastinput();
    /*!
     * \brief revoie l'id de la reponse
     * \return id
     */
    int getId(){return id;}
    /*!
     * \brief revoie la valeur de la reponse
     * \return valeur
     */
    int getValeur(){return valeur;}
    /*!
     * \brief revoie la valeur de la proposition
     * \return la proposition de la reponse
     */
    std::string getProposition(){return proposition;}
    /*!
     * \brief retourne la question associer a la reponse
     * \return la reponse
     */
    Question getQuestion(){return question;}
private:
    int id;
    int valeur ;
    std::string proposition;
    Question question;
};

#endif // REPONSE_H
