#include "connectiondb.h"
#include <QDebug>

sql::Connection* connectiondb::con = NULL;

connectiondb::connectiondb(){

}

bool connectiondb::connect(string namedb,string addressdb, string user, string password){



    try {
         /* Create a connection */
         driver = get_driver_instance();
         con = driver->connect("tcp://" + addressdb + ":3306", user, password);

         con->setSchema(namedb);

            return true;
        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         return false;
        }

}

void connectiondb::disconnect(){

    driver = NULL;
    con = NULL;
    stmt = NULL;
    res = NULL;
}

void connectiondb::getData(string select){

    try {
        if(con->isValid()){
            stmt = con->createStatement();
            res = stmt->executeQuery(select);
        }

        } catch (sql::SQLException &e) {
         qDebug() << "# ERR: SQLException in " << __FILE__;
         qDebug() << "(" << __FUNCTION__ << ") on line " << __LINE__ << endl;
         qDebug() << "# ERR: " << e.what();
         qDebug() << " (MySQL error code: " << e.getErrorCode();
         qDebug() << ", SQLState: " << QString::fromStdString(e.getSQLState()) << " )" << endl;
         //return false;
        }
}
