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
