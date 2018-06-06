#ifndef CONNECTIONDB_H
#define CONNECTIONDB_H

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>

#include <iostream>
using namespace std;


class connectiondb
{
public:
    connectiondb();
    bool connect(string namedb,string addressdb, string user, string password);
    void disconnect();
    void getData(string select);

        sql::ResultSet *res;
private:
    sql::Driver *driver;
    static sql::Connection *con;
    sql::Statement *stmt;

};

#endif // CONNECTIONDB_H
