#ifndef SCORE_H
#define SCORE_H

/*!
 * \file score.h
 * \brief gestion des scores
 * \author Antoine O.
 * \version 1.0
 */

#include <string>
#include <QVector>
#include <iostream>

#include "connectiondb.h"

#include"user.h"
#include"partie.h"

/*! \Class Score
 * \Brief class de gestion des scores
 */

class Score
{
public:
    Score();
    /*!
     * \brief constructeur Score
     * \param partie : valeur de id_partie
     * \param theme : valeur de id_user
     * \param sc : valeur de score
     * \param time : valeur de temps
     * \param user1 : valeur de l'objet user associer
     * \return la proposition de la reponse
     */
    Score(int partie,int theme,int sc,int time,User user1):id_partie(partie),id_user(theme),score(sc),temps(time),user(user1){}
    /*!
     * \brief constructeur Score
     * \param partie : valeur de id_partie
     * \param theme : valeur de id_user
     * \param sc : valeur de score
     * \param time : valeur de temps
     * \param partie1 : valeur de l'objet partie associer
     * \return la proposition de la reponse
     */
    Score(int partie,int theme,int sc,int time,Partie partie1):id_partie(partie),id_user(theme),score(sc),temps(time),partie(partie1){}
    /*!
     * \brief recuperer les score associer a une partie
     * \param partie : id de la partie
     * \return tableau de score
     */
    static QVector<Score*> getAllScoreByIdGame(int partie);
    /*!
     * \brief recuperer les score associer a un joueur
     * \param partie : id de la partie
     * \return tableau de score
     */
    static QVector<Score*> getAllScoreByIdUser(int partie);
    /*!
     * \brief recuperer id partie associer
     * \return int id_partie
     */
    int getIdPartie(){return id_partie;}
    /*!
     * \brief recuperer partie partie associer
     * \return objet partie
     */
    Partie getPartie(){return partie;}
    /*!
     * \brief recuperer id user
     * \return int id_user
     */
    int getIdUser(){return id_user;}
    /*!
     * \brief recuperer score partie
     * \return int score
     */
    int getScore(){return score;}
    /*!
     * \brief recuperer temps partie
     * \return int temps
     */
    int getTemps(){return temps;}
    /*!
     * \brief recuperer user
     * \return User user
     */
    User getUser(){return user;}
private:
    int id_partie;
    int id_user;
    int score;
    int temps;
    User user;
    Partie partie;


};

#endif // SCORE_H
