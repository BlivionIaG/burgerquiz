#include "reponse.h"
#include "connectiondb.h"
#include <QDebug>
#include<QMessageBox>
#include<QVector>

Reponse::Reponse()
{

}

QVector<Reponse*> Reponse::getReponses(int id){
    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;
        QVector<Reponse*>reponse;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("SELECT * FROM Reponse,Question,Theme where Reponse.id_question = ? and Reponse.id_question = Question.id_question and Question.id_theme = Theme.id_theme");
            //qDebug() << "test5";
            stmt->setInt(1, id);

            res = stmt->executeQuery();
            //return stmt->getResultSet();//}else{return NULL;}
            while (res->next()) {
                reponse.push_back(new Reponse(res->getInt("id_reponse"),
                                            res->getInt("valeur_reponse"),
                                            res->getString("proposition"),
                                            Question(res->getInt("id_question"),
                                                     res->getString("choix_un"),
                                                     res->getString("choix_deux"),
                                                     Theme(res->getString("nom_theme"),
                                                           res->getInt("id_theme")))));
                   }
            return reponse;


        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         QVector<Reponse *> empty;
         return empty;
        }catch(string e){
                    //qDebug() << QString::fromStdString(e) << endl;
        QMessageBox *error = new QMessageBox;
        error->setText(QString::fromStdString(e));
        error->exec();
        QVector<Reponse *> empty;
        return empty;
               }
}



bool Reponse::addReponse(int rep,std::string proposition,int idq){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("INSERT INTO `Reponse` (`id_reponse`, `valeur_reponse`, `proposition`, `id_question`) VALUES (NULL, ?, ?, ?)");
            stmt->setInt(1,rep);
            stmt->setString(2,proposition);
            stmt->setInt(3,idq);
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

Reponse Reponse::getlastinput(){

    try {

        sql::ResultSet *res;
        sql::PreparedStatement *stmt;
        Reponse reponse;

        sql::Connection *con = connectiondb::GetConnection();
        //qDebug() << con->
        //if(con->isValid() && con != NULL){
         //qDebug() << "test4";
            stmt = con->prepareStatement("SELECT * FROM Reponse,Question,Theme where Reponse.id_question = Question.id_question and Question.id_theme = Theme.id_theme order by Reponse.id_reponse desc limit 1");

            //qDebug() << "test5";
            res = stmt->executeQuery();
            res->first();


                reponse = Reponse(res->getInt("id_reponse"),
                                     res->getInt("valeur_reponse"),
                                     res->getString("proposition"),
                                     Question(res->getInt("id_question"),
                                              res->getString("choix_un"),
                                              res->getString("choix_deux"),
                                              Theme(res->getString("nom_theme"),
                                                    res->getInt("id_theme"))));

            return reponse;
            //return stmt->getResultSet();//}else{return NULL;}


        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         Reponse empty;
         return empty;
        }catch(string e){
                    //qDebug() << QString::fromStdString(e) << endl;
        QMessageBox *error = new QMessageBox;
        error->setText(QString::fromStdString(e));
        error->exec();
        Reponse empty;
        return empty;
               }

}
