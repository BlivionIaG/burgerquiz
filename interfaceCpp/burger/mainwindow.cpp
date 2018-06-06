#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "connectiondb.h"
#include <QMessageBox>
#include <QFormLayout>
#include <QDialogButtonBox>
#include <QInputDialog>
#include <QRadioButton>
#include <QDebug>
//#include <QString>

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    setWindowTitle("test");
    setWindowIcon(QIcon(":/burger3.png"));
    ui->pushButton_15->setVisible(false);
        ui->menuBar->hide();

    ui->comboBox->setMaxVisibleItems(10);

    connect(ui->return2,SIGNAL(triggered()),this,SLOT(go_menu()));


}

MainWindow::~MainWindow()
{
    delete ui;
}


void MainWindow::on_pushButton_clicked()
{
    //recupération + affichage theme dans la liste theme
    connectiondb *db = new connectiondb;
    db->getData("select nom_theme from Theme");


    //QList<QListWidgetItem *> fields;
    ui->listtheme->clear();

    //ui->list->insertItem(list->size(),newitem);

    while (db->res->next()) {
        QListWidgetItem * newitem = new QListWidgetItem();
        newitem->setText(QString::fromStdString(db->res->getString("nom_theme")));
        newitem->setData(1,"id");

        //fields << newitem;
        ui->listtheme->addItem(newitem);

            //bdd.elements.push_back(ElementBDD(res->getString("nom"),res->getString("quantite")));
            //res->getInt();
           }

    // Add the lineEdits with their respective labels
    /*QList<QLineEdit *> fields;
    for(int i = 0; i < 4; ++i) {
        QLineEdit *lineEdit = new QLineEdit(&dialog);
        QString label = QString("Value %1").arg(i + 1);
        form.addRow(label, lineEdit);

        fields << lineEdit;*/



    //changer de table
    ui->stackedWidget->setCurrentIndex(1);
    ui->pushButton_15->setVisible(true);

}

void MainWindow::go_menu()
{
    connectiondb * disconnect = new connectiondb;
    disconnect->disconnect();
    statusBar()->showMessage("disconnected");
    ui->stackedWidget->setCurrentIndex(5);
    ui->pushButton_15->setVisible(false);

    ui->menuBar->hide();

}


void MainWindow::on_pushButton_2_clicked()
{


    ui->stackedWidget->setCurrentIndex(3);
    ui->pushButton_15->setVisible(true);

}

void MainWindow::on_pushButton_3_clicked()
{
    connectiondb *db = new connectiondb;
    db->getData("select * from Partie");
    ui->listWidget_3->clear();
    while (db->res->next()) {
        QListWidgetItem * newitem = new QListWidgetItem();
        newitem->setText(QString::fromStdString(db->res->getString("nom_partie")));
        newitem->setData(1,QString::fromStdString(db->res->getString("id_partie")));
        ui->listWidget_3->addItem(newitem);
           }
    ui->listWidget_3->setCurrentRow(0);


    int i=1;
    db->getData("select * from Possede,Utilisateur where "
                "id_partie='1' and "
                "Possede.id_utilisateur = Utilisateur.id_utilisateur "
                "order by score desc limit 10");
    ui->listWidget_2->clear();
    while (db->res->next()) {
        QListWidgetItem * newitem = new QListWidgetItem();
        newitem->setText(QString::number( i) +". " +QString::fromStdString(db->res->getString("prenom")) + ":" + QString::fromStdString(db->res->getString("score")));
        //newitem->setData(1,QString::fromStdString(db->res->getString("id_partie")));
        ui->listWidget_2->addItem(newitem);
        i++;
           }

    ui->stackedWidget->setCurrentIndex(2);
    ui->pushButton_15->setVisible(true);


}

void MainWindow::on_pushButton_4_clicked()
{
    connectiondb *db = new connectiondb;
    db->getData("select * from Utilisateur");
    ui->comboBox_2->clear();
    while (db->res->next()) {
        QString * newitem = new QString(QString::fromStdString(db->res->getString("mail")));
        //QListWidgetItem * newitem = new QListWidgetItem();
        //newitem->setText(QString::fromStdString(db->res->getString("mail")));
        //newitem->setData(1,QString::fromStdString(db->res->getString("id_partie")));
        ui->comboBox_2->addItem(*newitem);
           }
    //ui->listWidget_3->setCurrentRow(0);

    db->getData("SELECT * FROM Possede,Utilisateur,"
                "(select ROUND(SUM(Possede.score)/COUNT(Possede.score)) as moyenne "
                "from Possede where Possede.id_utilisateur = 1) as test ,"
                "(select COUNT(Possede.score) as nbgame "
                "from Possede where Possede.id_utilisateur = 1) as test2 "
                "WHERE Utilisateur.id_utilisateur = '1' and "
                "Possede.id_utilisateur = Utilisateur.id_utilisateur "
                "order by Possede.score DESC");
db->res->first();
    ui->lineEdit_17->setText(QString::fromStdString(db->res->getString("mail")));
    ui->lineEdit_16->setText(QString::fromStdString(db->res->getString("nom")));
    ui->lineEdit_15->setText(QString::fromStdString(db->res->getString("prenom")));
    ui->label_14->setText(QString::fromStdString(db->res->getString("nbgame")));
    ui->label_15->setText(QString::fromStdString(db->res->getString("moyenne")+"/3000"));

    //qDebug() << "test" ;
    ui->listWidget_5->clear();

            while (db->res->next()) {
                //QString * newitem = new QString(QString::fromStdString(db->res->getString("score")));
                QListWidgetItem * newitem = new QListWidgetItem();
                newitem->setText(QString::fromStdString(db->res->getString("score")));
                //newitem->setData(1,QString::fromStdString(db->res->getString("id_partie")));
                ui->listWidget_5->addItem(newitem);
                   }


    //je suis la (ici)



    ui->stackedWidget->setCurrentIndex(4);

    ui->pushButton_15->setVisible(true);

}

void MainWindow::on_pushButton_8_clicked()
{
    QMessageBox msgBox;
    msgBox.setText(tr("Confirm?"));
    msgBox.setText(tr("Confirm?"));
    QAbstractButton* pButtonYes = msgBox.addButton(tr("Yeah!"), QMessageBox::YesRole);
    msgBox.addButton(tr("Nope"), QMessageBox::NoRole);

    msgBox.exec();

    if (msgBox.clickedButton()==pButtonYes) {
        //Execute command
    }
}

void MainWindow::on_pushButton_7_clicked()
{
    connectiondb * connect = new connectiondb();

    //connectiondb(string namedb,string addressdb, string user, string password);
    if(connect->connect(ui->servername->text().toStdString(),
                        ui->addressdb->text().toStdString(),
                        ui->user->text().toStdString(),
                        ui->password->text().toStdString())){

        statusBar()->showMessage("connect to " + ui->servername->text());
        ui->stackedWidget->setCurrentIndex(0);

        ui->menuBar->show();
    }
}

void MainWindow::on_pushButton_14_clicked()
{
    QMessageBox msgBox;
    msgBox.setText(tr("info quizz:\t\t\t\t\n autre info quizz :\t\t\t\n autre info quizz :\t\t\t"));

    msgBox.exec();
}

void MainWindow::on_pushButton_15_clicked()
{
    ui->stackedWidget->setCurrentIndex(0);

    ui->pushButton_15->setVisible(false);

}

void MainWindow::on_pushButton_6_clicked()
{
    QDialog dialog(this);
        // Use a layout allowing to have a label next to each field
        QFormLayout form(&dialog);

        // Add some text above the fields
        QLabel* label=new QLabel("Option");
           label->setAlignment(Qt::AlignCenter);
        form.addRow(label);

        // Add the lineEdits with their respective labels
       // QList<QLineEdit *> fields;
            QLineEdit *lineEdit = new QLineEdit(&dialog);
            form.addRow("Nouveau nom", lineEdit);

         //   fields << lineEdit;

        QRadioButton *radio = new QRadioButton(&dialog);
        form.addRow("activation",radio);
        // Add some standard buttons (Cancel/Ok) at the bottom of the dialog
        QDialogButtonBox buttonBox(QDialogButtonBox::Ok | QDialogButtonBox::Cancel,
                                   Qt::Horizontal, &dialog);
        form.addRow(&buttonBox);
        QObject::connect(&buttonBox, SIGNAL(accepted()), &dialog, SLOT(accept()));
        QObject::connect(&buttonBox, SIGNAL(rejected()), &dialog, SLOT(reject()));

        // Show the dialog as modal
        if (dialog.exec() == QDialog::Accepted) {
            // If the user didn't dismiss the dialog, do something with the fields
            //foreach(QLineEdit * lineEdit, fields) {
                //qDebug() << lineEdit->text();
            //}
        }
}
/*QDialog dialog(this);
    // Use a layout allowing to have a label next to each field
    QFormLayout form(&dialog);

    // Add some text above the fields
    form.addRow(new QLabel("The question ?"));

    // Add the lineEdits with their respective labels
    QList<QLineEdit *> fields;
    for(int i = 0; i < 4; ++i) {
        QLineEdit *lineEdit = new QLineEdit(&dialog);
        QString label = QString("Value %1").arg(i + 1);
        form.addRow(label, lineEdit);

        fields << lineEdit;
    }

    // Add some standard buttons (Cancel/Ok) at the bottom of the dialog
    QDialogButtonBox buttonBox(QDialogButtonBox::Ok | QDialogButtonBox::Cancel,
                               Qt::Horizontal, &dialog);
    form.addRow(&buttonBox);
    QObject::connect(&buttonBox, SIGNAL(accepted()), &dialog, SLOT(accept()));
    QObject::connect(&buttonBox, SIGNAL(rejected()), &dialog, SLOT(reject()));

    // Show the dialog as modal
    if (dialog.exec() == QDialog::Accepted) {
        // If the user didn't dismiss the dialog, do something with the fields
        foreach(QLineEdit * lineEdit, fields) {
            //qDebug() << lineEdit->text();
        }
    }*/






/*
 * bool ok;
        // Ask for birth date as a string.
        QString text = QInputDialog::getText(0, "Burger Quiz",
                                             "Nouveau nom du thème:", QLineEdit::Normal,
                                             "", &ok);
        if (ok && !text.isEmpty()) {
            QMessageBox msgBox;
             msgBox.setText("le nom du thème a étais modifié");
             msgBox.exec();


        }
*/
