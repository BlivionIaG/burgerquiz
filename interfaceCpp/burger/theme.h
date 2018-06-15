#ifndef THEME_H
#define THEME_H

/*!
 * \file theme.h
 * \brief gestion des themes
 * \author Antoine O.
 * \version 1.0
 */

#include <string>
#include <QVector>
#include <iostream>

#include "connectiondb.h"

/*! \Class Theme
 * \Brief class de gestion des themes
 */
class Theme
{
public:
    Theme();
    /*!
     * \brief constructeur de Theme
     * \param name : nom_theme
     * \param id_theme : id_theme
     * \return int id_user
     */
    Theme(std::string name,int id_theme):nom_theme(name),id(id_theme){}
    /*!
     * \brief recupere liste theme
     * \return tableau de theme
     */
    static QVector<Theme*> getThemes();
    /*!
     * \brief ajouter theme
     * \param name : nom nouveau theme
     * \return true si reussi , false si erreur
     */
    bool insertThemes(std::string name);
    /*!
     * \brief modifier un theme
     * \param id : id du theme
     * \param name : nouveau nom du theme
     * \return true si reussi, false si erreur
     */
    bool updateThemes(int id, std::string name);
    /*!
     * \brief supprimer un theme
     * \param id : id du theme
     * \return int id_user
     */
    bool deleteTheme(int id);
    /*!
     * \brief recuperer id theme
     * \return int id_theme
     */
    int getId(){return id;}
    /*!
     * \brief recuperer nom theme
     * \return string nom theme
     */
    std::string getName(){return nom_theme;}

private:
    std::string nom_theme;/*!< nom theme */
    int id; /*!< id theme */

};



#endif // THEME_H
