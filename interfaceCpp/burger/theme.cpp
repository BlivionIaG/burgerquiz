#include "theme.h"
#include "connectiondb.h"
#include <QDebug>
#include<QMessageBox>

Theme::Theme(){

}

QVector<Theme *> Theme::getThemes(){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;
        QVector<Theme*>themes;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("SELECT * from Theme");
            //qDebug() << "test5";
            res = stmt->executeQuery();
            //return stmt->getResultSet();//}else{return NULL;}
            while (res->next()) {
                themes.push_back(new Theme(res->getString("nom_theme"),
                                              res->getInt("id_theme")));
                   }
            return themes;


        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         QVector<Theme *> empty;
         return empty;
        }catch(string e){
                    //qDebug() << QString::fromStdString(e) << endl;
        QMessageBox *error = new QMessageBox;
        error->setText(QString::fromStdString(e));
        error->exec();
        QVector<Theme *> empty;
        return empty;
               }

}

bool Theme::insertThemes(std::string name){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;
        QVector<Theme*>themes;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("INSERT into Theme (nom_theme) values (?)");
            stmt->setString(1,name);
            //qDebug() << "test5";
            stmt->executeQuery();
            //return stmt->getResultSet();//}else{return NULL;}

            return true;


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

bool Theme::updateThemes(int id,std::string name){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;
        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("UPDATE Theme SET nom_theme = ? WHERE Theme.id_theme = ?");
            stmt->setString(1,name);
            stmt->setInt(2,id);
            //qDebug() << "test5";
            stmt->executeQuery();
            //return stmt->getResultSet();//}else{return NULL;}

            return true;


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

/*UPDATE `Theme` SET `nom_theme` = 'je m\'ennuis5' WHERE `Theme`.`id_theme` = 35*/
