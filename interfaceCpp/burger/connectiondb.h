#ifndef CONNECTIONDB_H
#define CONNECTIONDB_H

/*!
 * \file connectiondb.h
 * \brief gestion connection BDD
 * \author Antoine O.
 * \version 1.0
 */

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>

#include <iostream>
using namespace std;

/*! \Class connectiondb
 * \Brief class de connection à la BDD
 *
 * La classe permet la connection et la reconnection à la BDD
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
    /*!
     * \brief déconnection BDD
     * supprime la connection a la BDD actuel
     */
    void disconnect();
    /*!
     * \brief Recupération pointeur vers la BDD
     * vérifie si la connection est valide sinon renvoie une erreur
     */
    static sql::Connection *GetConnection();

private:

    sql::Driver *driver; /*!< Driver pour la BDD */
    static sql::Connection *con; /*!< Pointeur vers la BDD */
    //sql::Statement *stmt;

};

#endif // CONNECTIONDB_H
