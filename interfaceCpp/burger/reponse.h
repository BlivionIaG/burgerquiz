#ifndef REPONSE_H
#define REPONSE_H

#include <string>
#include <QVector>
#include <iostream>

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>

#include"user.h"
#include"partie.h"
#include"question.h"

class Reponse
{
public:
    Reponse();
    Reponse(int id,int value,std::string propos,Question question):id(id),valeur(value),proposition(propos),question(question){}
    static QVector<Reponse*> getReponses(int id);
    bool addReponse(int rep,std::string proposition,int idq);
    bool updateReponse(int id,std::string name,int choix);
    bool deleteReponse(int id);
    Reponse getlastinput();
    int getId(){return id;}
    int getValeur(){return valeur;}
    std::string getProposition(){return proposition;}
    Question getQuestion(){return question;}
private:
    int id;
    int valeur ;
    std::string proposition;
    Question question;
};

#endif // REPONSE_H
