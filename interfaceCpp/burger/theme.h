#ifndef THEME_H
#define THEME_H
#include <string>
#include <QVector>
#include <iostream>

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>

class Theme
{
public:
    Theme();
    Theme(std::string name,int id_theme):nom_theme(name),id(id_theme){}
    static QVector<Theme*> getThemes();
    bool insertThemes(std::string name);
    bool updateThemes(int id, std::string name);
    int getId(){return id;}
    std::string getName(){return nom_theme;}

private:
    std::string nom_theme;
    int id;

};



#endif // THEME_H
