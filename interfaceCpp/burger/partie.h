#ifndef PARTIE_H
#define PARTIE_H

#include <string>
#include <QVector>
#include <iostream>

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>


class Partie
{
public:
    Partie();
    Partie(std::string name,int id_theme):nom_Partie(name),id(id_theme){}
    static QVector<Partie*> getParties();
    int getId(){return id;}
    std::string getName(){return nom_Partie;}

private:
    std::string nom_Partie;
    int id;
};

#endif // PARTIE_H
