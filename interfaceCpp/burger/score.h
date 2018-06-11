#ifndef SCORE_H
#define SCORE_H

#include <string>
#include <QVector>
#include <iostream>

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>

#include"user.h"



class Score
{
public:
    Score();
    Score(int partie,int theme,int sc,int time,User user):id_partie(partie),id_theme(theme),score(sc),temps(time),user(user){}
    static QVector<Score*> getAllScoreByIdGame(int partie);
    int getPartie(){return id_partie;}
    int getTheme(){return id_theme;}
    int getScore(){return score;}
    int getTemps(){return temps;}
    User getUser(){return user;}
private:
    int id_partie;
    int id_theme;
    int score;
    int temps;
    User user;


};

#endif // SCORE_H
