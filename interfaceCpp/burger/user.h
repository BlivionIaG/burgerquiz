#ifndef USER_H
#define USER_H

#include <string>
#include <QVector>
#include <iostream>

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>


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
