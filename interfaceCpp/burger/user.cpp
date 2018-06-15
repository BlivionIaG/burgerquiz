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

/*
 *
 * update/new/delete partie
 *
 * INSERT INTO `Partie` (`id_partie`, `nom_partie`) VALUES (NULL, 'dsffs')
 * INSERT INTO `comprend` (`id_question`, `id_partie`) VALUES ('3', '2')
 * select last partie id
 * detele partie -> delete score first
 * new -> choix 3 question->3combobox
 *
 * UPDATE `Partie` SET `nom_partie` = 'Partie Miamsdqsd' WHERE `Partie`.`id_partie` = ?
 * changer nom -> changer comprend
 *
 * changer les question -> supprimer les liaison existante et en crée de nouvelle ;)
 *
 * DELETE FROM `Possede` WHERE `Possede`.`id_partie` = ?
 * DELETE FROM `Partie` WHERE `Partie`.`id_partie` = ?
 *
 * update/delete user
 * delete user->delete score first
 * UPDATE `Utilisateur` SET `nom` = 'sArgent' WHERE `Utilisateur`.`id_utilisateur` = 2
 *
 * DELETE FROM `Possede` WHERE `Possede`.`id_utilisateur` = ?
 *DELETE FROM `Utilisateur` WHERE `Utilisateur`.`id_utilisateur` = ?
 *
 */
