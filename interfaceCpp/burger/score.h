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
#include"partie.h"



class Score
{
public:
    Score();
    Score(int partie,int theme,int sc,int time,User user1):id_partie(partie),id_user(theme),score(sc),temps(time),user(user1){}
    Score(int partie,int theme,int sc,int time,Partie partie1):id_partie(partie),id_user(theme),score(sc),temps(time),partie(partie1){}
    static QVector<Score*> getAllScoreByIdGame(int partie);
    static QVector<Score*> getAllScoreByIdUser(int partie);
    int getIdPartie(){return id_partie;}
    Partie getPartie(){return partie;}
    int getIdUser(){return id_user;}
    int getScore(){return score;}
    int getTemps(){return temps;}
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
