#include "partie.h"
#include "connectiondb.h"
#include <QDebug>
#include<QMessageBox>

Partie::Partie(){

}

QVector<Partie *> Partie::getParties(){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;
        QVector<Partie*>parties;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("SELECT * from Partie");
            //qDebug() << "test5";
            res = stmt->executeQuery();
            //return stmt->getResultSet();//}else{return NULL;}
            while (res->next()) {
                parties.push_back(new Partie(res->getString("nom_partie"),
                                              res->getInt("id_partie")));
                   }
            return parties;


        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         QVector<Partie*> pempty;
         return pempty;
        }catch(string e){
                    //qDebug() << QString::fromStdString(e) << endl;
        QMessageBox *error = new QMessageBox;
        error->setText(QString::fromStdString(e));
        error->exec();
        QVector<Partie*> pempty;
        return pempty;
               }

}

//sql::ResultSet *res;
//sql::PreparedStatement *pstmt;
//sql::Statement *stmt;
//sql::Connection *con = connectiondb::GetConnection();

//pstmt = con->prepareStatement("SELECT id FROM test ORDER BY id ASC"); // ?
  //pstmt->setInt(1, i);
  //return pstmt->executeQuery();
  //pstmt->executeUpdate();

/* Select in ascending order */
//pstmt = con->prepareStatement("SELECT id FROM test ORDER BY id ASC");
//res = pstmt->executeQuery();
