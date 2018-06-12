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
