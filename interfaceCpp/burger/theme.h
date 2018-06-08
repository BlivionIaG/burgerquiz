#ifndef THEME_H
#define THEME_H
#include <string>
#include <vector>
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
    static sql::ResultSet* getThemes();
    int getId(){return id;}

private:
    std::string nom_theme;
    int id;

};



#endif // THEME_H
