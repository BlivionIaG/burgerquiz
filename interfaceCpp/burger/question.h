#ifndef QUESTION_H
#define QUESTION_H

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>
#include <QVector>
#include"theme.h"


class Question
{
public:
    Question();
    Question(int idQ,std::string C1,std::string C2,Theme thema):id_question(idQ),choix_1(C1),choix_2(C2),theme(thema){};
    static QVector<Question*> getQuestions(int id);
    int getIdQuestion(){return id_question;}
    Theme getTheme(){return theme;}
    std::string getC1(){return choix_1;}
    std::string getC2(){return choix_2;}
    //QVector<Question> questions;
private:
    int id_question;
    std::string choix_1;
    std::string choix_2;
    Theme theme;
};

#endif // QUESTION_H
