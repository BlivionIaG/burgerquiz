#ifndef QUESTION_H
#define QUESTION_H

/*!
 * \file question.h
 * \brief gestion des questions
 * \author Antoine O.
 * \version 1.0
 */

#include "connectiondb.h"
#include <QVector>
#include"theme.h"


/*! \Class Question
 * \Brief class de gestion des questions
 */

class Question
{
public:
    Question();
    /*!
     * \brief constructeur Question
     * \param idQ : id de la question
     * \param C1 : libellé un
     * \param C2 : libellé deux
     * \param thema : mot de passe de l'user pour la BDD
     */
    Question(int idQ,std::string C1,std::string C2,Theme thema):id_question(idQ),choix_1(C1),choix_2(C2),theme(thema){}
    /*!
     * \brief recupération question d'un theme
     * \param id : id d'un theme
     * \return tableau de question ou un tableau vide si une erreur survient
     */
    static QVector<Question*> getQuestions(int id);
    /*!
     * \brief ajout question
     * \param id : id d'un theme
     * \param c1 : libellé 1
     * \param c2 : libellé 2
     * \return true si l'ajout est effecutée et false en cas d'erreur
     */
    bool addQuestion(int id,std::string c1,std::string c2);
    /*!
     * \brief modification question
     * \param id : id de la question
     * \param c1 : libellé 1
     * \param c2 : libellé 2
     * \return true si la modification est effecutée et false en cas d'erreur
     */
    bool updateQuestion(int id, std::string c1, std::string c2);
    /*!
     * \brief suppression question
     * \param id : id de la question
     * \return true si la suppresion est effecutée et false en cas d'erreur
     */
    bool deleteQuestion(int id);
    /*!
     * \brief recupération derniere question ajouter
     * \return la derniere question ajoutée et une question vide en cas d'erreur
     */
    Question getlastinput();
    /*!
     * \brief revoie l'id de la question
     * \return id_question
     */
    int getIdQuestion(){return id_question;}
    /*!
     * \brief revoie le theme de la question
     * \return theme question
     */
    Theme getTheme(){return theme;}
    /*!
     * \brief revoie le libellé 1 de la question
     * \return chaine de charactere
     */
    std::string getC1(){return choix_1;}
    /*!
     * \brief revoie le libellé 2 de la question
     * \return chaine de charactere
     */
    std::string getC2(){return choix_2;}
    //QVector<Question> questions;
private:
    int id_question;
    std::string choix_1;
    std::string choix_2;
    Theme theme;
};

#endif // QUESTION_H
