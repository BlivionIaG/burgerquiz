#ifndef CONNECTIONDB_H
#define CONNECTIONDB_H

/*!
 * \file connectiondb.h
 * \brief gestion connection BDD
 * \author Antoine O. Kévin L.
 * \version 1.0
 */

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>

#include <iostream>
using namespace std;

/*! \Class connectiondb
 * \Brief class de connection à la BDD
 *
 * La classe permet la connectin et la reconnection à la BDD
 */

class connectiondb
{
public:
    connectiondb();
    /*!
     * \brief connection BDD
     * \param namedb : le nom de la BDD
     * \param addressdb : adresse de la BDD
     * \param user : utilisateur pour BDD
     * \param password : mot de passe de l'user pour la BDD
     *
     * \return true si la connection est réussi, sinon false
     */
    bool connect(string namedb,string addressdb, string user, string password);
    void disconnect();
    void getData(string select);
    static sql::Connection *GetConnection();

    //sql::ResultSet *res;
    //sql::PreparedStatement *pstmt;

private:

    sql::Driver *driver;
    static sql::Connection *con; /*!< Pointeur vers la BDD */
    //sql::Statement *stmt;


};

#endif // CONNECTIONDB_H
