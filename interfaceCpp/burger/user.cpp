#include "user.h"
#include "connectiondb.h"
#include <QDebug>
#include<QMessageBox>


User::User()
{

}

QVector<User*> User::getusers(){
    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;
        QVector<User*>users;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("SELECT * from Utilisateur");
            //qDebug() << "test5";
            //stmt->setInt(1, partie);

            res = stmt->executeQuery();
            //return stmt->getResultSet();//}else{return NULL;}
            while (res->next()) {
                users.push_back(new User(res->getString("nom"),res->getString("prenom"),res->getInt("id_utilisateur"),res->getString("mail")));
                   }
            return users;


        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         QVector<User *> empty;
         return empty;
        }catch(string e){
                    //qDebug() << QString::fromStdString(e) << endl;
        QMessageBox *error = new QMessageBox;
        error->setText(QString::fromStdString(e));
        error->exec();
        QVector<User *> empty;
        return empty;
               }
}


void User::getUser(int id){
try {

    sql::ResultSet *res;
    sql::PreparedStatement *stmt;
    QVector<User*>users;

    sql::Connection *con = connectiondb::GetConnection();
    //qDebug() << con->
    //if(con->isValid() && con != NULL){
     //qDebug() << "test4";
        stmt = con->prepareStatement("SELECT * from Utilisateur where id_utilisateur = ?");
        //qDebug() << "test5";
        stmt->setInt(1, id);

        res = stmt->executeQuery();
        //return stmt->getResultSet();//}else{return NULL;}
        res->first();


        //User user(res->getString("nom"),res->getString("prenom"),res->getInt("id_utilisateur"),res->getString("mail"));
        this->nom = res->getString("nom");
        this->prenom = res->getString("prenom");
        this->id_user = res->getInt("id_utilisateur");
        this->mail = res->getString("mail");
        //return user;

    } catch (sql::SQLException &e) {
     qDebug() << "# ERR: SQLException in " << __FILE__;
     qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
     qDebug() << "# ERR: " << e.what();
     qDebug() << " (MySQL error code: " << e.getErrorCode();
     qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
     QVector<User *> empty;
     //return false;
    }catch(string e){
                //qDebug() << QString::fromStdString(e) << endl;
    QMessageBox *error = new QMessageBox;
    error->setText(QString::fromStdString(e));
    error->exec();
    QVector<User *> empty;
    //return false;
           }
}
