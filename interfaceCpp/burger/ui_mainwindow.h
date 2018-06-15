/********************************************************************************
** Form generated from reading UI file 'mainwindow.ui'
**
** Created by: Qt User Interface Compiler version 5.5.1
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_MAINWINDOW_H
#define UI_MAINWINDOW_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QComboBox>
#include <QtWidgets/QFrame>
#include <QtWidgets/QGroupBox>
#include <QtWidgets/QHeaderView>
#include <QtWidgets/QLabel>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QListWidget>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenu>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QStackedWidget>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_MainWindow
{
public:
    QAction *actionMenu;
    QAction *return2;
    QAction *actionText;
    QWidget *centralWidget;
    QStackedWidget *stackedWidget;
    QWidget *menu;
    QPushButton *pushButton_4;
    QPushButton *pushButton_3;
    QPushButton *pushButton_2;
    QPushButton *pushButton;
    QWidget *theme;
    QPushButton *pushButton_5;
    QLineEdit *lineEdit;
    QListWidget *listtheme;
    QPushButton *pushButton_6;
    QPushButton *pushButton_10;
    QWidget *scoreboard;
    QGroupBox *groupBox;
    QListWidget *listWidget_3;
    QGroupBox *groupBox_3;
    QListWidget *listWidget_2;
    QPushButton *pushButton_17;
    QWidget *question;
    QListWidget *listWidget_4;
    QPushButton *pushButton_8;
    QComboBox *comboBox;
    QPushButton *pushButton_16;
    QPushButton *pushButton_9;
    QWidget *profile_2;
    QGroupBox *groupBox_5;
    QLabel *label_9;
    QLabel *label_10;
    QLabel *label_11;
    QLineEdit *lineEdit_15;
    QLineEdit *lineEdit_16;
    QLineEdit *lineEdit_17;
    QPushButton *pushButton_13;
    QComboBox *comboBox_2;
    QPushButton *pushButton_12;
    QGroupBox *groupBox_7;
    QPushButton *pushButton_14;
    QListWidget *listWidget_5;
    QWidget *login;
    QLabel *label_6;
    QPushButton *pushButton_7;
    QLineEdit *password;
    QLineEdit *addressdb;
    QLineEdit *servername;
    QLineEdit *user;
    QWidget *page;
    QListWidget *listWidget;
    QLabel *label_5;
    QPushButton *pushButton_11;
    QFrame *line;
    QLabel *label_7;
    QPushButton *pushButton_18;
    QPushButton *pushButton_19;
    QLabel *label_8;
    QLabel *label_3;
    QPushButton *pushButton_20;
    QPushButton *pushButton_21;
    QPushButton *pushButton_22;
    QPushButton *pushButton_15;
    QMenuBar *menuBar;
    QMenu *menu2;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *MainWindow)
    {
        if (MainWindow->objectName().isEmpty())
            MainWindow->setObjectName(QStringLiteral("MainWindow"));
        MainWindow->resize(570, 330);
        MainWindow->setMinimumSize(QSize(570, 330));
        MainWindow->setMaximumSize(QSize(570, 339));
        actionMenu = new QAction(MainWindow);
        actionMenu->setObjectName(QStringLiteral("actionMenu"));
        return2 = new QAction(MainWindow);
        return2->setObjectName(QStringLiteral("return2"));
        actionText = new QAction(MainWindow);
        actionText->setObjectName(QStringLiteral("actionText"));
        centralWidget = new QWidget(MainWindow);
        centralWidget->setObjectName(QStringLiteral("centralWidget"));
        centralWidget->setEnabled(true);
        centralWidget->setMinimumSize(QSize(570, 292));
        centralWidget->setMaximumSize(QSize(570, 292));
        stackedWidget = new QStackedWidget(centralWidget);
        stackedWidget->setObjectName(QStringLiteral("stackedWidget"));
        stackedWidget->setGeometry(QRect(0, 10, 571, 291));
        stackedWidget->setStyleSheet(QStringLiteral(""));
        menu = new QWidget();
        menu->setObjectName(QStringLiteral("menu"));
        pushButton_4 = new QPushButton(menu);
        pushButton_4->setObjectName(QStringLiteral("pushButton_4"));
        pushButton_4->setGeometry(QRect(290, 140, 271, 131));
        pushButton_3 = new QPushButton(menu);
        pushButton_3->setObjectName(QStringLiteral("pushButton_3"));
        pushButton_3->setGeometry(QRect(10, 140, 271, 131));
        pushButton_2 = new QPushButton(menu);
        pushButton_2->setObjectName(QStringLiteral("pushButton_2"));
        pushButton_2->setGeometry(QRect(290, 0, 271, 131));
        pushButton = new QPushButton(menu);
        pushButton->setObjectName(QStringLiteral("pushButton"));
        pushButton->setGeometry(QRect(10, 0, 271, 131));
        stackedWidget->addWidget(menu);
        theme = new QWidget();
        theme->setObjectName(QStringLiteral("theme"));
        pushButton_5 = new QPushButton(theme);
        pushButton_5->setObjectName(QStringLiteral("pushButton_5"));
        pushButton_5->setGeometry(QRect(430, 10, 131, 27));
        lineEdit = new QLineEdit(theme);
        lineEdit->setObjectName(QStringLiteral("lineEdit"));
        lineEdit->setGeometry(QRect(10, 10, 411, 27));
        listtheme = new QListWidget(theme);
        listtheme->setObjectName(QStringLiteral("listtheme"));
        listtheme->setGeometry(QRect(10, 40, 551, 201));
        pushButton_6 = new QPushButton(theme);
        pushButton_6->setObjectName(QStringLiteral("pushButton_6"));
        pushButton_6->setGeometry(QRect(290, 250, 221, 27));
        pushButton_10 = new QPushButton(theme);
        pushButton_10->setObjectName(QStringLiteral("pushButton_10"));
        pushButton_10->setGeometry(QRect(60, 250, 221, 27));
        stackedWidget->addWidget(theme);
        scoreboard = new QWidget();
        scoreboard->setObjectName(QStringLiteral("scoreboard"));
        groupBox = new QGroupBox(scoreboard);
        groupBox->setObjectName(QStringLiteral("groupBox"));
        groupBox->setGeometry(QRect(9, 9, 361, 271));
        groupBox->setStyleSheet(QLatin1String("QGroupBox {\n"
"    border: 1px solid gray;\n"
"    border-radius: 9px;\n"
"    margin-top: 0.5em;\n"
"}\n"
"\n"
"QGroupBox::title {\n"
"    subcontrol-origin: margin;\n"
"    left: 10px;\n"
"    padding: 0 3px 0 3px;\n"
"}"));
        listWidget_3 = new QListWidget(groupBox);
        listWidget_3->setObjectName(QStringLiteral("listWidget_3"));
        listWidget_3->setGeometry(QRect(10, 20, 341, 241));
        groupBox_3 = new QGroupBox(scoreboard);
        groupBox_3->setObjectName(QStringLiteral("groupBox_3"));
        groupBox_3->setGeometry(QRect(380, 80, 181, 201));
        groupBox_3->setStyleSheet(QLatin1String("QGroupBox {\n"
"    border: 1px solid gray;\n"
"    border-radius: 9px;\n"
"    margin-top: 0.5em;\n"
"}\n"
"\n"
"QGroupBox::title {\n"
"    subcontrol-origin: margin;\n"
"    left: 10px;\n"
"    padding: 0 3px 0 3px;\n"
"}"));
        listWidget_2 = new QListWidget(groupBox_3);
        listWidget_2->setObjectName(QStringLiteral("listWidget_2"));
        listWidget_2->setEnabled(true);
        listWidget_2->setGeometry(QRect(10, 20, 161, 171));
        listWidget_2->setEditTriggers(QAbstractItemView::NoEditTriggers);
        listWidget_2->setProperty("showDropIndicator", QVariant(false));
        listWidget_2->setSortingEnabled(true);
        pushButton_17 = new QPushButton(scoreboard);
        pushButton_17->setObjectName(QStringLiteral("pushButton_17"));
        pushButton_17->setGeometry(QRect(380, 20, 181, 51));
        stackedWidget->addWidget(scoreboard);
        question = new QWidget();
        question->setObjectName(QStringLiteral("question"));
        listWidget_4 = new QListWidget(question);
        listWidget_4->setObjectName(QStringLiteral("listWidget_4"));
        listWidget_4->setGeometry(QRect(10, 50, 551, 181));
        pushButton_8 = new QPushButton(question);
        pushButton_8->setObjectName(QStringLiteral("pushButton_8"));
        pushButton_8->setGeometry(QRect(210, 240, 161, 41));
        comboBox = new QComboBox(question);
        comboBox->setObjectName(QStringLiteral("comboBox"));
        comboBox->setGeometry(QRect(10, 10, 551, 27));
        pushButton_16 = new QPushButton(question);
        pushButton_16->setObjectName(QStringLiteral("pushButton_16"));
        pushButton_16->setGeometry(QRect(400, 240, 161, 41));
        pushButton_9 = new QPushButton(question);
        pushButton_9->setObjectName(QStringLiteral("pushButton_9"));
        pushButton_9->setGeometry(QRect(10, 240, 161, 41));
        stackedWidget->addWidget(question);
        profile_2 = new QWidget();
        profile_2->setObjectName(QStringLiteral("profile_2"));
        groupBox_5 = new QGroupBox(profile_2);
        groupBox_5->setObjectName(QStringLiteral("groupBox_5"));
        groupBox_5->setGeometry(QRect(20, 40, 351, 181));
        groupBox_5->setStyleSheet(QLatin1String("QGroupBox {\n"
"    border: 1px solid gray;\n"
"    border-radius: 9px;\n"
"    margin-top: 0.5em;\n"
"}\n"
"\n"
"QGroupBox::title {\n"
"    subcontrol-origin: margin;\n"
"    left: 10px;\n"
"    padding: 0 3px 0 3px;\n"
"}"));
        label_9 = new QLabel(groupBox_5);
        label_9->setObjectName(QStringLiteral("label_9"));
        label_9->setGeometry(QRect(20, 40, 67, 17));
        label_10 = new QLabel(groupBox_5);
        label_10->setObjectName(QStringLiteral("label_10"));
        label_10->setGeometry(QRect(20, 90, 67, 17));
        label_11 = new QLabel(groupBox_5);
        label_11->setObjectName(QStringLiteral("label_11"));
        label_11->setGeometry(QRect(20, 140, 67, 17));
        lineEdit_15 = new QLineEdit(groupBox_5);
        lineEdit_15->setObjectName(QStringLiteral("lineEdit_15"));
        lineEdit_15->setEnabled(false);
        lineEdit_15->setGeometry(QRect(100, 130, 211, 41));
        lineEdit_16 = new QLineEdit(groupBox_5);
        lineEdit_16->setObjectName(QStringLiteral("lineEdit_16"));
        lineEdit_16->setEnabled(false);
        lineEdit_16->setGeometry(QRect(100, 80, 211, 41));
        lineEdit_17 = new QLineEdit(groupBox_5);
        lineEdit_17->setObjectName(QStringLiteral("lineEdit_17"));
        lineEdit_17->setEnabled(false);
        lineEdit_17->setGeometry(QRect(100, 30, 211, 41));
        pushButton_13 = new QPushButton(profile_2);
        pushButton_13->setObjectName(QStringLiteral("pushButton_13"));
        pushButton_13->setGeometry(QRect(310, 230, 201, 51));
        comboBox_2 = new QComboBox(profile_2);
        comboBox_2->setObjectName(QStringLiteral("comboBox_2"));
        comboBox_2->setGeometry(QRect(20, 10, 541, 27));
        comboBox_2->setEditable(false);
        pushButton_12 = new QPushButton(profile_2);
        pushButton_12->setObjectName(QStringLiteral("pushButton_12"));
        pushButton_12->setGeometry(QRect(60, 230, 201, 51));
        groupBox_7 = new QGroupBox(profile_2);
        groupBox_7->setObjectName(QStringLiteral("groupBox_7"));
        groupBox_7->setGeometry(QRect(380, 40, 181, 181));
        groupBox_7->setStyleSheet(QLatin1String("QGroupBox {\n"
"    border: 1px solid gray;\n"
"    border-radius: 9px;\n"
"    margin-top: 0.5em;\n"
"}\n"
"\n"
"QGroupBox::title {\n"
"    subcontrol-origin: margin;\n"
"    left: 10px;\n"
"    padding: 0 3px 0 3px;\n"
"}"));
        pushButton_14 = new QPushButton(groupBox_7);
        pushButton_14->setObjectName(QStringLiteral("pushButton_14"));
        pushButton_14->setGeometry(QRect(10, 140, 161, 31));
        listWidget_5 = new QListWidget(groupBox_7);
        listWidget_5->setObjectName(QStringLiteral("listWidget_5"));
        listWidget_5->setGeometry(QRect(10, 20, 161, 111));
        stackedWidget->addWidget(profile_2);
        login = new QWidget();
        login->setObjectName(QStringLiteral("login"));
        label_6 = new QLabel(login);
        label_6->setObjectName(QStringLiteral("label_6"));
        label_6->setGeometry(QRect(30, 10, 261, 261));
        pushButton_7 = new QPushButton(login);
        pushButton_7->setObjectName(QStringLiteral("pushButton_7"));
        pushButton_7->setGeometry(QRect(330, 200, 151, 41));
        password = new QLineEdit(login);
        password->setObjectName(QStringLiteral("password"));
        password->setGeometry(QRect(270, 80, 271, 27));
        password->setEchoMode(QLineEdit::Password);
        addressdb = new QLineEdit(login);
        addressdb->setObjectName(QStringLiteral("addressdb"));
        addressdb->setGeometry(QRect(270, 120, 271, 27));
        servername = new QLineEdit(login);
        servername->setObjectName(QStringLiteral("servername"));
        servername->setGeometry(QRect(270, 160, 271, 27));
        user = new QLineEdit(login);
        user->setObjectName(QStringLiteral("user"));
        user->setGeometry(QRect(270, 40, 271, 27));
        stackedWidget->addWidget(login);
        page = new QWidget();
        page->setObjectName(QStringLiteral("page"));
        listWidget = new QListWidget(page);
        listWidget->setObjectName(QStringLiteral("listWidget"));
        listWidget->setGeometry(QRect(10, 90, 411, 191));
        label_5 = new QLabel(page);
        label_5->setObjectName(QStringLiteral("label_5"));
        label_5->setGeometry(QRect(10, 10, 411, 25));
        label_5->setStyleSheet(QLatin1String("border: 1px solid black;\n"
"border-radius: 5px;\n"
"font-size: 50%;\n"
"background-color: white;"));
        pushButton_11 = new QPushButton(page);
        pushButton_11->setObjectName(QStringLiteral("pushButton_11"));
        pushButton_11->setGeometry(QRect(430, 10, 131, 25));
        line = new QFrame(page);
        line->setObjectName(QStringLiteral("line"));
        line->setGeometry(QRect(30, 70, 551, 20));
        line->setFrameShape(QFrame::HLine);
        line->setFrameShadow(QFrame::Sunken);
        label_7 = new QLabel(page);
        label_7->setObjectName(QStringLiteral("label_7"));
        label_7->setGeometry(QRect(10, 45, 411, 25));
        label_7->setStyleSheet(QLatin1String("border: 1px solid black;\n"
"border-radius: 5px;\n"
"font-size: 50%;\n"
"background-color: white;"));
        pushButton_18 = new QPushButton(page);
        pushButton_18->setObjectName(QStringLiteral("pushButton_18"));
        pushButton_18->setGeometry(QRect(430, 45, 131, 25));
        pushButton_19 = new QPushButton(page);
        pushButton_19->setObjectName(QStringLiteral("pushButton_19"));
        pushButton_19->setGeometry(QRect(430, 140, 131, 30));
        pushButton_19->setMaximumSize(QSize(100000, 100000));
        label_8 = new QLabel(page);
        label_8->setObjectName(QStringLiteral("label_8"));
        label_8->setGeometry(QRect(430, 110, 131, 25));
        label_8->setStyleSheet(QLatin1String("border: 1px solid black;\n"
"border-radius: 5px;\n"
"font-size: 50%;\n"
"background-color: white;"));
        label_3 = new QLabel(page);
        label_3->setObjectName(QStringLiteral("label_3"));
        label_3->setGeometry(QRect(430, 85, 131, 20));
        label_3->setAlignment(Qt::AlignCenter);
        pushButton_20 = new QPushButton(page);
        pushButton_20->setObjectName(QStringLiteral("pushButton_20"));
        pushButton_20->setGeometry(QRect(430, 230, 131, 41));
        pushButton_20->setMaximumSize(QSize(100000, 100000));
        pushButton_21 = new QPushButton(page);
        pushButton_21->setObjectName(QStringLiteral("pushButton_21"));
        pushButton_21->setGeometry(QRect(430, 170, 131, 30));
        pushButton_21->setMaximumSize(QSize(100000, 100000));
        pushButton_22 = new QPushButton(page);
        pushButton_22->setObjectName(QStringLiteral("pushButton_22"));
        pushButton_22->setGeometry(QRect(430, 200, 131, 30));
        pushButton_22->setMaximumSize(QSize(100000, 100000));
        stackedWidget->addWidget(page);
        pushButton_15 = new QPushButton(centralWidget);
        pushButton_15->setObjectName(QStringLiteral("pushButton_15"));
        pushButton_15->setGeometry(QRect(10, 3, 51, 16));
        QSizePolicy sizePolicy(QSizePolicy::Preferred, QSizePolicy::Fixed);
        sizePolicy.setHorizontalStretch(33);
        sizePolicy.setVerticalStretch(0);
        sizePolicy.setHeightForWidth(pushButton_15->sizePolicy().hasHeightForWidth());
        pushButton_15->setSizePolicy(sizePolicy);
        MainWindow->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(MainWindow);
        menuBar->setObjectName(QStringLiteral("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 570, 25));
        menu2 = new QMenu(menuBar);
        menu2->setObjectName(QStringLiteral("menu2"));
        MainWindow->setMenuBar(menuBar);
        statusBar = new QStatusBar(MainWindow);
        statusBar->setObjectName(QStringLiteral("statusBar"));
        statusBar->setSizeGripEnabled(false);
        MainWindow->setStatusBar(statusBar);

        menuBar->addAction(menu2->menuAction());
        menu2->addAction(return2);

        retranslateUi(MainWindow);

        stackedWidget->setCurrentIndex(5);
        listWidget_3->setCurrentRow(-1);
        listWidget_2->setCurrentRow(-1);
        listWidget_4->setCurrentRow(-1);


        QMetaObject::connectSlotsByName(MainWindow);
    } // setupUi

    void retranslateUi(QMainWindow *MainWindow)
    {
        MainWindow->setWindowTitle(QApplication::translate("MainWindow", "MainWindow", 0));
        actionMenu->setText(QApplication::translate("MainWindow", "menu", 0));
        return2->setText(QApplication::translate("MainWindow", "deconnexion", 0));
        actionText->setText(QApplication::translate("MainWindow", "text", 0));
        pushButton_4->setText(QApplication::translate("MainWindow", "PROFILE", 0));
        pushButton_3->setText(QApplication::translate("MainWindow", "SCOREBOARD", 0));
        pushButton_2->setText(QApplication::translate("MainWindow", "QUESTION", 0));
        pushButton->setText(QApplication::translate("MainWindow", "THEME", 0));
#ifndef QT_NO_ACCESSIBILITY
        theme->setAccessibleName(QApplication::translate("MainWindow", "1", 0));
#endif // QT_NO_ACCESSIBILITY
        pushButton_5->setText(QApplication::translate("MainWindow", "ajouter th\303\251me", 0));
        pushButton_6->setText(QApplication::translate("MainWindow", "modifier th\303\251me selectionn\303\251", 0));
        pushButton_10->setText(QApplication::translate("MainWindow", "supprimer th\303\251me selectionn\303\251", 0));
        groupBox->setTitle(QApplication::translate("MainWindow", "Quiz", 0));
        groupBox_3->setTitle(QApplication::translate("MainWindow", "Top 10 score", 0));
        pushButton_17->setText(QApplication::translate("MainWindow", "supprimer partie", 0));
        pushButton_8->setText(QApplication::translate("MainWindow", "modifier", 0));
        pushButton_16->setText(QApplication::translate("MainWindow", "nouveau", 0));
        pushButton_9->setText(QApplication::translate("MainWindow", "supprimer", 0));
        groupBox_5->setTitle(QApplication::translate("MainWindow", "information", 0));
        label_9->setText(QApplication::translate("MainWindow", "Mail :", 0));
        label_10->setText(QApplication::translate("MainWindow", "Nom :", 0));
        label_11->setText(QApplication::translate("MainWindow", "Prenom :", 0));
        lineEdit_15->setText(QApplication::translate("MainWindow", "prenom", 0));
        lineEdit_16->setText(QApplication::translate("MainWindow", "nom", 0));
        lineEdit_17->setText(QApplication::translate("MainWindow", "email@mail.com", 0));
        pushButton_13->setText(QApplication::translate("MainWindow", "modifier", 0));
        pushButton_12->setText(QApplication::translate("MainWindow", "supprimer", 0));
        groupBox_7->setTitle(QApplication::translate("MainWindow", "score", 0));
        pushButton_14->setText(QApplication::translate("MainWindow", "info quizz", 0));
        label_6->setText(QApplication::translate("MainWindow", "<html><head/><body><p><img src=\":/screen.jpg\"/></p></body></html>", 0));
        pushButton_7->setText(QApplication::translate("MainWindow", "connexion", 0));
        password->setText(QApplication::translate("MainWindow", "bq2018", 0));
        password->setPlaceholderText(QApplication::translate("MainWindow", "password", 0));
        addressdb->setText(QApplication::translate("MainWindow", "localhost", 0));
        addressdb->setPlaceholderText(QApplication::translate("MainWindow", "address server", 0));
        servername->setText(QApplication::translate("MainWindow", "Burgerquiz", 0));
        servername->setPlaceholderText(QApplication::translate("MainWindow", "server name", 0));
        user->setText(QApplication::translate("MainWindow", "Burgerquiz", 0));
        user->setPlaceholderText(QApplication::translate("MainWindow", "user", 0));
        label_5->setText(QString());
        pushButton_11->setText(QApplication::translate("MainWindow", "Modifier question", 0));
        label_7->setText(QString());
        pushButton_18->setText(QApplication::translate("MainWindow", "Modifier theme", 0));
        pushButton_19->setText(QApplication::translate("MainWindow", "Modifier \303\251l\303\251ment", 0));
        label_8->setText(QString());
        label_3->setText(QApplication::translate("MainWindow", "reponse", 0));
        pushButton_20->setText(QApplication::translate("MainWindow", "Retour", 0));
        pushButton_21->setText(QApplication::translate("MainWindow", "Ajouter \303\251l\303\251ment", 0));
        pushButton_22->setText(QApplication::translate("MainWindow", "Supp \303\251l\303\251ment", 0));
        pushButton_15->setText(QApplication::translate("MainWindow", "<", 0));
        menu2->setTitle(QApplication::translate("MainWindow", "menu", 0));
    } // retranslateUi

};

namespace Ui {
    class MainWindow: public Ui_MainWindow {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_MAINWINDOW_H
