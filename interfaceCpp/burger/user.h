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
    User(std::string nomUser,std::string prenomUser):nom(nomUser),prenom(prenomUser){}
    User(std::string nomUser,std::string prenomUser,int id,std::string mailUser):id_user(id),mail(mailUser),nom(nomUser),prenom(prenomUser){}
    static QVector<User*> getusers();
    void getUser(int id);
    std::string getNom(){return nom;}
    void setNom(std::string name){this->nom = name;}
    std::string getPrenom(){return prenom;}
    void setPrenom(std::string name){this->prenom = name;}
    std::string getmail(){return mail;}
    void setMail(std::string name){this->mail = name;}
    int getid(){return id_user;}


private:
    int id_user;
    std::string mail;
    std::string nom;
    std::string prenom;
};

#endif // USER_H
