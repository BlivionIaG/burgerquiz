#ifndef QUESTION_H
#define QUESTION_H

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>
#include <QVector>


class Question
{
public:
    Question();
    Question(int idQ,int idT,std::string C1,std::string C2):id_question(idQ),id_theme(idT),choix_1(C1),choix_2(C2){};
    static QVector<Question*> getQuestions(int id);
    int getIdQuestion(){return id_question;}
    int getIdTheme(){return id_theme;}
    std::string getC1(){return choix_1;}
    std::string getC2(){return choix_2;}
    //QVector<Question> questions;
private:
    int id_question;
    int id_theme;
    std::string choix_1;
    std::string choix_2;
};

#endif // QUESTION_H
