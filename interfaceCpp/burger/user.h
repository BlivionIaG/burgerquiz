#ifndef USER_H
#define USER_H

/*!
 * \file user.h
 * \brief gestion des utilisateurs
 * \author Antoine O.
 * \version 1.0
 */

#include <string>
#include <QVector>
#include <iostream>

#include "connectiondb.h"

/*! \Class User
 * \Brief class de gestion des utilisateur
 */

class User
{
public:
    User();
    /*!
     * \brief constructeur de User
     * \param nomUser : nom utilisateur
     * \param prenomUser : prenom de l'utilisateur
     */
    User(std::string nomUser,std::string prenomUser):nom(nomUser),prenom(prenomUser){}
    /*!
     * \brief constructeur de User
     * \param nomUser : nom utilisateur
     * \param prenomUser : prenom de l'utilisateur
     * \param mailUser : mail utilisateur
     */
    User(std::string nomUser,std::string prenomUser,int id,std::string mailUser):id_user(id),mail(mailUser),nom(nomUser),prenom(prenomUser){}
    /*!
     * \brief recupération tableau user
     * \return tableau de user
     */
    static QVector<User*> getusers();
    /*!
     * \brief get User
     * \param id : id user
     * \requet d'un user via id et le stoke dans l'element
     */
    void getUser(int id);
    /*!
     * \brief recupereration de l'User
     * \return nom de l'user
     */
    std::string getNom(){return nom;}
    /*!
     * \brief set nom User
     * \param name : set new mon
     */
    void setNom(std::string name){this->nom = name;}
    /*!
     * \brief recuperation du prenom de l'User
     * \return prenom de l'user
     */
    std::string getPrenom(){return prenom;}
    /*!
     * \brief set new prenom de l'User
     * \param name : set prenom
     */
    void setPrenom(std::string name){this->prenom = name;}
    /*!
     * \brief get mail
     * \return mail
     */
    std::string getmail(){return mail;}
    /*!
     * \brief set user mail
     * \param name : set mail
     */
    void setMail(std::string name){this->mail = name;}
    /*!
     * \brief get user id
     * \return id_user
     */
    int getid(){return id_user;}
    bool updateUser(int id,std::string mail,std::string nom,std::string prenom);
    bool deleteUser(int id);


private:
    int id_user;/*!< id user */
    std::string mail;/*!< mail user */
    std::string nom;/*!< nom user */
    std::string prenom;/*!< prenom user */
};

#endif // USER_H
