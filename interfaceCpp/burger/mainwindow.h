#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include "question.h"
#include "theme.h"
#include "partie.h"
#include "score.h"
#include "user.h"
#include "reponse.h"

Q_DECLARE_METATYPE(Question)
Q_DECLARE_METATYPE(Theme)
Q_DECLARE_METATYPE(Partie)
Q_DECLARE_METATYPE(Score)
Q_DECLARE_METATYPE(User)
Q_DECLARE_METATYPE(Reponse)


namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QWidget *parent = 0);
    ~MainWindow();

private slots:

    /*!
     * \brief bouton vers page de deconnection + deconnection BDD
     */
    void go_menu();

    /*!
     * \brief bouton vers la partie theme
     */
    void on_pushButton_clicked();

    /*!
     * \brief bouton vers la partie question
     */
    void on_pushButton_2_clicked();

    /*!
     * \brief bouton vers la partie scoreboard
     */
    void on_pushButton_3_clicked();

    /*!
     * \brief bouton vers la partie profile
     */
    void on_pushButton_4_clicked();

    /*!
     * \brief bouton vers menu modification question / reponse
     */
    void on_pushButton_8_clicked();

    /*!
     * \brief bouton connection
     */
    void on_pushButton_7_clicked();

    /*!
     * \brief bouton info quizz dans partie scoreboard
     */
    void on_pushButton_14_clicked();

    /*!
     * \brief bouton retour
     */
    void on_pushButton_15_clicked();

    /*!
     * \brief bouton modification theme
     */
    void on_pushButton_6_clicked();

    /*!
     * \brief selection d'une partie dans la liste de partie
     */
    void on_listWidget_3_currentRowChanged(int currentRow);

    /*!
     * \brief choix theme dans la partie question pour voir les questions du theme
     */
    void on_comboBox_currentIndexChanged();

    /*!
     * \brief selection profil user via email
     */
    void on_comboBox_2_currentIndexChanged();

    /*!
     * \brief modification d'une reponse ( proposition et reponse )
     */
    void on_pushButton_19_clicked();

    /*!
     * \brief bouton modification question ( libellé 1 et 2 )
     */
    void on_pushButton_11_clicked();

    /*!
     * \brief bouton retour vers le menu question
     */
    void on_pushButton_20_clicked();

    /*!
     * \brief selection reponse dans la liste
     */
    void on_listWidget_currentRowChanged(int currentRow);

    /*!
     * \brief bouton ajotu theme
     */
    void on_pushButton_5_clicked();

    /*!
     * \brief bouton nouvelle question
     */
    void on_pushButton_16_clicked();

    /*!
     * \brief bouton nouvelle reponse
     */
    void on_pushButton_21_clicked();

    /*!
     * \brief bouton supprimer reponse selectionné
     */
    void on_pushButton_22_clicked();

    /*!
     * \brief bouton supprimer question selectionné
     */
    void on_pushButton_9_clicked();

    /*!
     * \brief bouton supprimer theme selectionné
     */
    void on_pushButton_10_clicked();

    /*!
     * \brief bouton changer theme question
     */void on_pushButton_18_clicked();


    void on_pushButton_13_clicked();

    void on_pushButton_12_clicked();

    void on_pushButton_17_clicked();

private:
    Ui::MainWindow *ui;
};

#endif // MAINWINDOW_H
