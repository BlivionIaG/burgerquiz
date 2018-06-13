#include "question.h"
#include "connectiondb.h"
#include <QDebug>
#include<QMessageBox>
#include<QVector>


Question::Question()
{

}

QVector<Question*> Question::getQuestions(int id){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;
        QVector<Question*> questions;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("SELECT * from Question,Theme where Question.id_theme = ? and Question.id_theme = Theme.id_theme");
            stmt->setInt(1,id);
            //qDebug() << "test5";
            res = stmt->executeQuery();

            while (res->next()) {
                questions.push_back(new Question(res->getInt("id_question"),
                                              res->getString("choix_un"),
                                              res->getString("choix_deux"),
                                                 Theme(res->getString("nom_theme"),res->getInt("id_theme"))));
                   }
            return questions;
            //return stmt->getResultSet();//}else{return NULL;}


        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         QVector<Question*> empty;
         return empty;
        }catch(string e){
                    //qDebug() << QString::fromStdString(e) << endl;
        QMessageBox *error = new QMessageBox;
        error->setText(QString::fromStdString(e));
        error->exec();
        QVector<Question*> empty;
        return empty;
               }

}


bool Question::addQuestion(int id,std::string c1,std::string c2){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("INSERT INTO Question (id_question, choix_un, choix_deux, id_theme) VALUES (NULL, ?, ?, ?)");
            stmt->setString(1,c1);
            stmt->setString(2,c2);
            stmt->setInt(3,id);
            //qDebug() << "test5";
            stmt->executeQuery();

            return true;
            //return stmt->getResultSet();//}else{return NULL;}


        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         return false;
        }catch(string e){
                    //qDebug() << QString::fromStdString(e) << endl;
        QMessageBox *error = new QMessageBox;
        error->setText(QString::fromStdString(e));
        error->exec();
        return false;
               }

}

Question Question::getlastinput(){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;
        Question questions;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("SELECT * FROM Question,Theme where Question.id_theme= Theme.id_theme order by Question.id_question desc limit 1");

            //qDebug() << "test5";
            res = stmt->executeQuery();
            res->first();


                questions =  Question(res->getInt("id_question"),
                                              res->getString("choix_un"),
                                              res->getString("choix_deux"),
                                                 Theme(res->getString("nom_theme"),res->getInt("id_theme")));

            return questions;
            //return stmt->getResultSet();//}else{return NULL;}


        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         Question empty;
         return empty;
        }catch(string e){
                    //qDebug() << QString::fromStdString(e) << endl;
        QMessageBox *error = new QMessageBox;
        error->setText(QString::fromStdString(e));
        error->exec();
        Question empty;
        return empty;
               }

}

