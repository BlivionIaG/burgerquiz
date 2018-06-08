#include "question.h"
#include "connectiondb.h"
#include <QDebug>
#include<QMessageBox>


Question::Question()
{

}

sql::ResultSet* Question::getQuestions(int id){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("SELECT * from Question where id_theme = ?");
            stmt->setInt(1,id);
            //qDebug() << "test5";
            return stmt->executeQuery();
            //return stmt->getResultSet();//}else{return NULL;}


        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         return NULL;
        }catch(string e){
                    //qDebug() << QString::fromStdString(e) << endl;
        QMessageBox *error = new QMessageBox;
        error->setText(QString::fromStdString(e));
        error->exec();
                    return NULL;
               }

}
