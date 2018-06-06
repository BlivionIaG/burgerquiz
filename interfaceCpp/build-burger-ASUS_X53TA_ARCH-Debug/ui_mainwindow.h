/********************************************************************************
** Form generated from reading UI file 'mainwindow.ui'
**
** Created by: Qt User Interface Compiler version 5.11.0
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_MAINWINDOW_H
#define UI_MAINWINDOW_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QComboBox>
#include <QtWidgets/QGroupBox>
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
    QGroupBox *groupBox_2;
    QLineEdit *lineEdit_2;
    QLineEdit *lineEdit_3;
    QLabel *label;
    QLabel *label_2;
    QGroupBox *groupBox_3;
    QListWidget *listWidget_2;
    QWidget *question;
    QListWidget *listWidget_4;
    QGroupBox *groupBox_4;
    QLineEdit *lineEdit_5;
    QLabel *label_3;
    QLabel *label_4;
    QLabel *label_5;
    QLineEdit *lineEdit_6;
    QLineEdit *lineEdit_7;
    QPushButton *pushButton_8;
    QPushButton *pushButton_9;
    QComboBox *comboBox;
    QPushButton *pushButton_16;
    QWidget *profile_2;
    QPushButton *pushButton_11;
    QGroupBox *groupBox_5;
    QLabel *label_9;
    QLabel *label_10;
    QLabel *label_11;
    QLabel *label_12;
    QLabel *label_13;
    QLineEdit *lineEdit_15;
    QLineEdit *lineEdit_16;
    QLineEdit *lineEdit_17;
    QLabel *label_14;
    QLabel *label_15;
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
    QPushButton *pushButton_15;
    QMenuBar *menuBar;
    QMenu *menu2;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *MainWindow)
    {
        if (MainWindow->objectName().isEmpty())
            MainWindow->setObjectName(QStringLiteral("MainWindow"));
        MainWindow->resize(570, 339);
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
        listWidget_3->setGeometry(QRect(10, 20, 341, 251));
        groupBox_2 = new QGroupBox(scoreboard);
        groupBox_2->setObjectName(QStringLiteral("groupBox_2"));
        groupBox_2->setGeometry(QRect(380, 10, 181, 101));
        groupBox_2->setStyleSheet(QLatin1String("QGroupBox {\n"
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
        lineEdit_2 = new QLineEdit(groupBox_2);
        lineEdit_2->setObjectName(QStringLiteral("lineEdit_2"));
        lineEdit_2->setGeometry(QRect(110, 20, 61, 27));
        lineEdit_2->setReadOnly(true);
        lineEdit_3 = new QLineEdit(groupBox_2);
        lineEdit_3->setObjectName(QStringLiteral("lineEdit_3"));
        lineEdit_3->setGeometry(QRect(110, 60, 61, 27));
        lineEdit_3->setReadOnly(true);
        label = new QLabel(groupBox_2);
        label->setObjectName(QStringLiteral("label"));
        label->setGeometry(QRect(20, 20, 67, 21));
        label_2 = new QLabel(groupBox_2);
        label_2->setObjectName(QStringLiteral("label_2"));
        label_2->setGeometry(QRect(20, 50, 91, 41));
        label_2->setAutoFillBackground(false);
        label_2->setWordWrap(true);
        groupBox_3 = new QGroupBox(scoreboard);
        groupBox_3->setObjectName(QStringLiteral("groupBox_3"));
        groupBox_3->setGeometry(QRect(380, 120, 181, 161));
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
        QListWidgetItem *__qlistwidgetitem = new QListWidgetItem(listWidget_2);
        __qlistwidgetitem->setTextAlignment(Qt::AlignLeading|Qt::AlignVCenter);
        new QListWidgetItem(listWidget_2);
        QListWidgetItem *__qlistwidgetitem1 = new QListWidgetItem(listWidget_2);
        __qlistwidgetitem1->setTextAlignment(Qt::AlignLeading|Qt::AlignVCenter);
        QListWidgetItem *__qlistwidgetitem2 = new QListWidgetItem(listWidget_2);
        __qlistwidgetitem2->setTextAlignment(Qt::AlignLeading|Qt::AlignVCenter);
        QListWidgetItem *__qlistwidgetitem3 = new QListWidgetItem(listWidget_2);
        __qlistwidgetitem3->setTextAlignment(Qt::AlignLeading|Qt::AlignVCenter);
        QListWidgetItem *__qlistwidgetitem4 = new QListWidgetItem(listWidget_2);
        __qlistwidgetitem4->setTextAlignment(Qt::AlignLeading|Qt::AlignVCenter);
        new QListWidgetItem(listWidget_2);
        new QListWidgetItem(listWidget_2);
        new QListWidgetItem(listWidget_2);
        new QListWidgetItem(listWidget_2);
        listWidget_2->setObjectName(QStringLiteral("listWidget_2"));
        listWidget_2->setEnabled(true);
        listWidget_2->setGeometry(QRect(10, 20, 161, 131));
        listWidget_2->setEditTriggers(QAbstractItemView::NoEditTriggers);
        listWidget_2->setProperty("showDropIndicator", QVariant(false));
        listWidget_2->setSortingEnabled(true);
        stackedWidget->addWidget(scoreboard);
        question = new QWidget();
        question->setObjectName(QStringLiteral("question"));
        listWidget_4 = new QListWidget(question);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        new QListWidgetItem(listWidget_4);
        listWidget_4->setObjectName(QStringLiteral("listWidget_4"));
        listWidget_4->setGeometry(QRect(10, 40, 551, 151));
        groupBox_4 = new QGroupBox(question);
        groupBox_4->setObjectName(QStringLiteral("groupBox_4"));
        groupBox_4->setGeometry(QRect(10, 200, 421, 81));
        groupBox_4->setStyleSheet(QLatin1String("QGroupBox {\n"
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
        lineEdit_5 = new QLineEdit(groupBox_4);
        lineEdit_5->setObjectName(QStringLiteral("lineEdit_5"));
        lineEdit_5->setGeometry(QRect(90, 20, 61, 27));
        lineEdit_5->setReadOnly(true);
        label_3 = new QLabel(groupBox_4);
        label_3->setObjectName(QStringLiteral("label_3"));
        label_3->setGeometry(QRect(20, 20, 67, 21));
        label_4 = new QLabel(groupBox_4);
        label_4->setObjectName(QStringLiteral("label_4"));
        label_4->setGeometry(QRect(20, 50, 67, 21));
        label_5 = new QLabel(groupBox_4);
        label_5->setObjectName(QStringLiteral("label_5"));
        label_5->setGeometry(QRect(220, 50, 67, 21));
        lineEdit_6 = new QLineEdit(groupBox_4);
        lineEdit_6->setObjectName(QStringLiteral("lineEdit_6"));
        lineEdit_6->setGeometry(QRect(90, 50, 121, 27));
        lineEdit_6->setReadOnly(true);
        lineEdit_7 = new QLineEdit(groupBox_4);
        lineEdit_7->setObjectName(QStringLiteral("lineEdit_7"));
        lineEdit_7->setGeometry(QRect(280, 50, 131, 27));
        lineEdit_7->setReadOnly(true);
        pushButton_8 = new QPushButton(question);
        pushButton_8->setObjectName(QStringLiteral("pushButton_8"));
        pushButton_8->setGeometry(QRect(450, 208, 101, 22));
        pushButton_9 = new QPushButton(question);
        pushButton_9->setObjectName(QStringLiteral("pushButton_9"));
        pushButton_9->setGeometry(QRect(450, 234, 101, 22));
        comboBox = new QComboBox(question);
        comboBox->addItem(QString());
        comboBox->addItem(QString());
        comboBox->addItem(QString());
        comboBox->addItem(QString());
        comboBox->addItem(QString());
        comboBox->setObjectName(QStringLiteral("comboBox"));
        comboBox->setGeometry(QRect(10, 10, 551, 27));
        pushButton_16 = new QPushButton(question);
        pushButton_16->setObjectName(QStringLiteral("pushButton_16"));
        pushButton_16->setGeometry(QRect(450, 260, 101, 22));
        stackedWidget->addWidget(question);
        profile_2 = new QWidget();
        profile_2->setObjectName(QStringLiteral("profile_2"));
        pushButton_11 = new QPushButton(profile_2);
        pushButton_11->setObjectName(QStringLiteral("pushButton_11"));
        pushButton_11->setGeometry(QRect(430, 10, 131, 27));
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
        label_9->setGeometry(QRect(20, 30, 67, 17));
        label_10 = new QLabel(groupBox_5);
        label_10->setObjectName(QStringLiteral("label_10"));
        label_10->setGeometry(QRect(20, 60, 67, 17));
        label_11 = new QLabel(groupBox_5);
        label_11->setObjectName(QStringLiteral("label_11"));
        label_11->setGeometry(QRect(20, 90, 67, 17));
        label_12 = new QLabel(groupBox_5);
        label_12->setObjectName(QStringLiteral("label_12"));
        label_12->setGeometry(QRect(20, 120, 151, 17));
        label_13 = new QLabel(groupBox_5);
        label_13->setObjectName(QStringLiteral("label_13"));
        label_13->setGeometry(QRect(20, 150, 101, 17));
        lineEdit_15 = new QLineEdit(groupBox_5);
        lineEdit_15->setObjectName(QStringLiteral("lineEdit_15"));
        lineEdit_15->setEnabled(false);
        lineEdit_15->setGeometry(QRect(100, 90, 211, 25));
        lineEdit_16 = new QLineEdit(groupBox_5);
        lineEdit_16->setObjectName(QStringLiteral("lineEdit_16"));
        lineEdit_16->setEnabled(false);
        lineEdit_16->setGeometry(QRect(100, 60, 211, 25));
        lineEdit_17 = new QLineEdit(groupBox_5);
        lineEdit_17->setObjectName(QStringLiteral("lineEdit_17"));
        lineEdit_17->setEnabled(false);
        lineEdit_17->setGeometry(QRect(100, 30, 211, 25));
        label_14 = new QLabel(groupBox_5);
        label_14->setObjectName(QStringLiteral("label_14"));
        label_14->setGeometry(QRect(150, 120, 161, 20));
        label_14->setLayoutDirection(Qt::LeftToRight);
        label_14->setAlignment(Qt::AlignRight|Qt::AlignTrailing|Qt::AlignVCenter);
        label_15 = new QLabel(groupBox_5);
        label_15->setObjectName(QStringLiteral("label_15"));
        label_15->setGeometry(QRect(150, 150, 161, 20));
        label_15->setLayoutDirection(Qt::LeftToRight);
        label_15->setAlignment(Qt::AlignRight|Qt::AlignTrailing|Qt::AlignVCenter);
        pushButton_13 = new QPushButton(profile_2);
        pushButton_13->setObjectName(QStringLiteral("pushButton_13"));
        pushButton_13->setGeometry(QRect(310, 230, 201, 51));
        comboBox_2 = new QComboBox(profile_2);
        comboBox_2->addItem(QString());
        comboBox_2->addItem(QString());
        comboBox_2->addItem(QString());
        comboBox_2->addItem(QString());
        comboBox_2->addItem(QString());
        comboBox_2->addItem(QString());
        comboBox_2->addItem(QString());
        comboBox_2->addItem(QString());
        comboBox_2->setObjectName(QStringLiteral("comboBox_2"));
        comboBox_2->setGeometry(QRect(20, 10, 401, 27));
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
        new QListWidgetItem(listWidget_5);
        new QListWidgetItem(listWidget_5);
        new QListWidgetItem(listWidget_5);
        new QListWidgetItem(listWidget_5);
        new QListWidgetItem(listWidget_5);
        new QListWidgetItem(listWidget_5);
        new QListWidgetItem(listWidget_5);
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
        MainWindow->setStatusBar(statusBar);

        menuBar->addAction(menu2->menuAction());
        menu2->addAction(return2);

        retranslateUi(MainWindow);

        stackedWidget->setCurrentIndex(4);
        listWidget_3->setCurrentRow(-1);
        listWidget_2->setCurrentRow(-1);
        listWidget_4->setCurrentRow(0);


        QMetaObject::connectSlotsByName(MainWindow);
    } // setupUi

    void retranslateUi(QMainWindow *MainWindow)
    {
        MainWindow->setWindowTitle(QApplication::translate("MainWindow", "MainWindow", nullptr));
        actionMenu->setText(QApplication::translate("MainWindow", "menu", nullptr));
        return2->setText(QApplication::translate("MainWindow", "deconnexion", nullptr));
        actionText->setText(QApplication::translate("MainWindow", "text", nullptr));
        pushButton_4->setText(QApplication::translate("MainWindow", "PROFILE", nullptr));
        pushButton_3->setText(QApplication::translate("MainWindow", "SCOREBOARD", nullptr));
        pushButton_2->setText(QApplication::translate("MainWindow", "QUESTION", nullptr));
        pushButton->setText(QApplication::translate("MainWindow", "THEME", nullptr));
#ifndef QT_NO_ACCESSIBILITY
        theme->setAccessibleName(QApplication::translate("MainWindow", "1", nullptr));
#endif // QT_NO_ACCESSIBILITY
        pushButton_5->setText(QApplication::translate("MainWindow", "ajouter th\303\251me", nullptr));
        pushButton_6->setText(QApplication::translate("MainWindow", "modifier th\303\251me selectionn\303\251", nullptr));
        pushButton_10->setText(QApplication::translate("MainWindow", "supprimer th\303\251me selectionn\303\251", nullptr));
        groupBox->setTitle(QApplication::translate("MainWindow", "Quiz", nullptr));
        groupBox_2->setTitle(QApplication::translate("MainWindow", "information ", nullptr));
        lineEdit_2->setText(QApplication::translate("MainWindow", "1", nullptr));
        lineEdit_3->setText(QApplication::translate("MainWindow", "5", nullptr));
        label->setText(QApplication::translate("MainWindow", "ID Quiz :", nullptr));
        label_2->setText(QApplication::translate("MainWindow", "nombre de joueur :", nullptr));
        groupBox_3->setTitle(QApplication::translate("MainWindow", "Top 10 score", nullptr));

        const bool __sortingEnabled = listWidget_2->isSortingEnabled();
        listWidget_2->setSortingEnabled(false);
        QListWidgetItem *___qlistwidgetitem = listWidget_2->item(0);
        ___qlistwidgetitem->setText(QApplication::translate("MainWindow", "1. keskydi : 44100", nullptr));
        QListWidgetItem *___qlistwidgetitem1 = listWidget_2->item(1);
        ___qlistwidgetitem1->setText(QApplication::translate("MainWindow", "10. ...", nullptr));
        QListWidgetItem *___qlistwidgetitem2 = listWidget_2->item(2);
        ___qlistwidgetitem2->setText(QApplication::translate("MainWindow", "2. tomy2e: 40999", nullptr));
        QListWidgetItem *___qlistwidgetitem3 = listWidget_2->item(3);
        ___qlistwidgetitem3->setText(QApplication::translate("MainWindow", "3. BlivionIaG : 29800", nullptr));
        QListWidgetItem *___qlistwidgetitem4 = listWidget_2->item(4);
        ___qlistwidgetitem4->setText(QApplication::translate("MainWindow", "4. HerrCrazi : 29160", nullptr));
        QListWidgetItem *___qlistwidgetitem5 = listWidget_2->item(5);
        ___qlistwidgetitem5->setText(QApplication::translate("MainWindow", "5. Yesso44 :  265", nullptr));
        QListWidgetItem *___qlistwidgetitem6 = listWidget_2->item(6);
        ___qlistwidgetitem6->setText(QApplication::translate("MainWindow", "6. ...", nullptr));
        QListWidgetItem *___qlistwidgetitem7 = listWidget_2->item(7);
        ___qlistwidgetitem7->setText(QApplication::translate("MainWindow", "7. ...", nullptr));
        QListWidgetItem *___qlistwidgetitem8 = listWidget_2->item(8);
        ___qlistwidgetitem8->setText(QApplication::translate("MainWindow", "8. ...", nullptr));
        QListWidgetItem *___qlistwidgetitem9 = listWidget_2->item(9);
        ___qlistwidgetitem9->setText(QApplication::translate("MainWindow", "9. ...", nullptr));
        listWidget_2->setSortingEnabled(__sortingEnabled);


        const bool __sortingEnabled1 = listWidget_4->isSortingEnabled();
        listWidget_4->setSortingEnabled(false);
        QListWidgetItem *___qlistwidgetitem10 = listWidget_4->item(0);
        ___qlistwidgetitem10->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem11 = listWidget_4->item(1);
        ___qlistwidgetitem11->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem12 = listWidget_4->item(2);
        ___qlistwidgetitem12->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem13 = listWidget_4->item(3);
        ___qlistwidgetitem13->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem14 = listWidget_4->item(4);
        ___qlistwidgetitem14->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem15 = listWidget_4->item(5);
        ___qlistwidgetitem15->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem16 = listWidget_4->item(6);
        ___qlistwidgetitem16->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem17 = listWidget_4->item(7);
        ___qlistwidgetitem17->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem18 = listWidget_4->item(8);
        ___qlistwidgetitem18->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem19 = listWidget_4->item(9);
        ___qlistwidgetitem19->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem20 = listWidget_4->item(10);
        ___qlistwidgetitem20->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem21 = listWidget_4->item(11);
        ___qlistwidgetitem21->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        listWidget_4->setSortingEnabled(__sortingEnabled1);

        groupBox_4->setTitle(QApplication::translate("MainWindow", "information ", nullptr));
        lineEdit_5->setText(QApplication::translate("MainWindow", "1", nullptr));
        label_3->setText(QApplication::translate("MainWindow", "ID Quiz :", nullptr));
        label_4->setText(QApplication::translate("MainWindow", "libell\303\251 :", nullptr));
        label_5->setText(QApplication::translate("MainWindow", "libell\303\251 :", nullptr));
        lineEdit_6->setText(QApplication::translate("MainWindow", "bernard tapis", nullptr));
        lineEdit_7->setText(QApplication::translate("MainWindow", "tapis", nullptr));
        pushButton_8->setText(QApplication::translate("MainWindow", "modifier", nullptr));
        pushButton_9->setText(QApplication::translate("MainWindow", "supprimer", nullptr));
        comboBox->setItemText(0, QApplication::translate("MainWindow", "default", nullptr));
        comboBox->setItemText(1, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox->setItemText(2, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox->setItemText(3, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox->setItemText(4, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));

        pushButton_16->setText(QApplication::translate("MainWindow", "nouveau", nullptr));
        pushButton_11->setText(QApplication::translate("MainWindow", "search", nullptr));
        groupBox_5->setTitle(QApplication::translate("MainWindow", "information", nullptr));
        label_9->setText(QApplication::translate("MainWindow", "Mail :", nullptr));
        label_10->setText(QApplication::translate("MainWindow", "Nom :", nullptr));
        label_11->setText(QApplication::translate("MainWindow", "Prenom :", nullptr));
        label_12->setText(QApplication::translate("MainWindow", "Nombre partie jouer :", nullptr));
        label_13->setText(QApplication::translate("MainWindow", "Score moyen :", nullptr));
        lineEdit_15->setText(QApplication::translate("MainWindow", "prenom", nullptr));
        lineEdit_16->setText(QApplication::translate("MainWindow", "nom", nullptr));
        lineEdit_17->setText(QApplication::translate("MainWindow", "email@mail.com", nullptr));
        label_14->setText(QApplication::translate("MainWindow", "243", nullptr));
        label_15->setText(QApplication::translate("MainWindow", "2568/3000", nullptr));
        pushButton_13->setText(QApplication::translate("MainWindow", "modifier", nullptr));
        comboBox_2->setItemText(0, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox_2->setItemText(1, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox_2->setItemText(2, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox_2->setItemText(3, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox_2->setItemText(4, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox_2->setItemText(5, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox_2->setItemText(6, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        comboBox_2->setItemText(7, QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));

        pushButton_12->setText(QApplication::translate("MainWindow", "supprimer", nullptr));
        groupBox_7->setTitle(QApplication::translate("MainWindow", "score", nullptr));
        pushButton_14->setText(QApplication::translate("MainWindow", "info quizz", nullptr));

        const bool __sortingEnabled2 = listWidget_5->isSortingEnabled();
        listWidget_5->setSortingEnabled(false);
        QListWidgetItem *___qlistwidgetitem22 = listWidget_5->item(0);
        ___qlistwidgetitem22->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem23 = listWidget_5->item(1);
        ___qlistwidgetitem23->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem24 = listWidget_5->item(2);
        ___qlistwidgetitem24->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem25 = listWidget_5->item(3);
        ___qlistwidgetitem25->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem26 = listWidget_5->item(4);
        ___qlistwidgetitem26->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem27 = listWidget_5->item(5);
        ___qlistwidgetitem27->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        QListWidgetItem *___qlistwidgetitem28 = listWidget_5->item(6);
        ___qlistwidgetitem28->setText(QApplication::translate("MainWindow", "Nouvel \303\251l\303\251ment", nullptr));
        listWidget_5->setSortingEnabled(__sortingEnabled2);

        label_6->setText(QApplication::translate("MainWindow", "<html><head/><body><p><img src=\":/screen.jpg\"/></p></body></html>", nullptr));
        pushButton_7->setText(QApplication::translate("MainWindow", "connexion", nullptr));
        password->setText(QApplication::translate("MainWindow", "bq2018", nullptr));
        password->setPlaceholderText(QApplication::translate("MainWindow", "password", nullptr));
        addressdb->setText(QApplication::translate("MainWindow", "localhost", nullptr));
        addressdb->setPlaceholderText(QApplication::translate("MainWindow", "address server", nullptr));
        servername->setText(QApplication::translate("MainWindow", "Burgerquiz", nullptr));
        servername->setPlaceholderText(QApplication::translate("MainWindow", "server name", nullptr));
        user->setText(QApplication::translate("MainWindow", "Burgerquiz", nullptr));
        user->setPlaceholderText(QApplication::translate("MainWindow", "user", nullptr));
        pushButton_15->setText(QApplication::translate("MainWindow", "<", nullptr));
        menu2->setTitle(QApplication::translate("MainWindow", "menu", nullptr));
    } // retranslateUi

};

namespace Ui {
    class MainWindow: public Ui_MainWindow {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_MAINWINDOW_H
