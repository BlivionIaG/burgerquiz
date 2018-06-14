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
    setWindowTitle("Burger Manager");
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

void MainWindow::go_menu()
{
    connectiondb * db = new connectiondb;
    db->disconnect();
    statusBar()->showMessage("disconnected");
    ui->stackedWidget->setCurrentIndex(5);
    ui->pushButton_15->setVisible(false);

    ui->menuBar->hide();

}

void MainWindow::on_pushButton_clicked()
{

    QVector<Theme*>themes = Theme::getThemes();
    int i;

    if(!themes.isEmpty()){
        ui->listtheme->clear();

        for(i=0;i<themes.size();i++){

            QListWidgetItem * newitem = new QListWidgetItem();
            newitem->setText(QString::fromStdString(themes[i]->getName()));
            QVariant data;

            data.setValue(Theme(themes[i]->getName(),themes[i]->getId()));
            newitem->setData(1,data);
            ui->listtheme->addItem(newitem);
        }

        ui->listtheme->setCurrentRow(0);

    }
    ui->stackedWidget->setCurrentIndex(1);
    ui->pushButton_15->setVisible(true);//}

}

void MainWindow::on_pushButton_2_clicked()
{
    QVector<Theme*>themes = Theme::getThemes();
    int i;
     ui->comboBox->clear();
    if(!themes.isEmpty()){

        for(i=0;i<themes.size();i++){
            QVariant data;
            data.setValue(Theme(themes[i]->getName(),themes[i]->getId()));
            ui->comboBox->addItem(QString::fromStdString(themes[i]->getName()),data);
            //***********************************
        }



    }
    ui->comboBox->setCurrentIndex(0);
    ui->stackedWidget->setCurrentIndex(3);
    ui->pushButton_15->setVisible(true);
}

void MainWindow::on_pushButton_3_clicked()
{
    QVector<Partie*>parties = Partie::getParties();
    int i;

    for(i=0;i<parties.size();i++){
        QListWidgetItem * newitem = new QListWidgetItem();
        newitem->setText(QString::fromStdString(parties[i]->getName()));
        QVariant data;

        data.setValue(Partie(parties[i]->getName(),parties[i]->getId()));
        newitem->setData(1,data);
        ui->listWidget_3->addItem(newitem);
    }

    ui->listWidget_3->setCurrentRow(0);
    ui->stackedWidget->setCurrentIndex(2);
    ui->pushButton_15->setVisible(true);


}

void MainWindow::on_pushButton_4_clicked()
{
    QVector<User*> users = User::getusers();
    int i;
    ui->comboBox_2->clear();

    for(i=0;i<users.size();i++){
        QVariant data;
        data.setValue(User(users[i]->getNom(),users[i]->getPrenom(),users[i]->getid(),users[i]->getmail()));
        ui->comboBox_2->addItem(QString::fromStdString(users[i]->getmail()),data);
    }

    ui->comboBox_2->setCurrentIndex(0);
    ui->stackedWidget->setCurrentIndex(4);
    ui->pushButton_15->setVisible(true);

}

void MainWindow::on_pushButton_8_clicked()
{
    if(ui->listWidget_4->count() !=0){
        Question question = ui->listWidget_4->currentItem()->data(1).value<Question>();
        QVector<Reponse*> reponses = Reponse::getReponses(question.getIdQuestion());
        int i;

        ui->label_5->setText(QString::fromStdString(question.getC1() +","+ question.getC2() +" ou les deux ?"));
        ui->label_7->setText(QString::fromStdString("Theme: " +question.getTheme().getName()));
        ui->listWidget->clear();
        for(i=0;i<reponses.size();i++){

            QListWidgetItem * newitem = new QListWidgetItem();
            newitem->setText(QString::fromStdString(reponses[i]->getProposition()));
            QVariant data;
            data.setValue(*reponses[i]);
            newitem->setData(1,data);
            ui->listWidget->addItem(newitem);


        }
        ui->listWidget->setCurrentRow(0);
        ui->stackedWidget->setCurrentIndex(6);
        ui->pushButton_15->hide();}
}

void MainWindow::on_pushButton_14_clicked()
{
    if(ui->listWidget_5->currentRow() >= 0){
        Score score = ui->listWidget_5->currentItem()->data(1).value<Score>();
        QMessageBox msgBox;

        msgBox.setText("score joueur: "
                       +QString::number(score.getScore())
                       +"\ntemps joueur: "
                       +QString::number(score.getTemps()));

        msgBox.exec();}
}

void MainWindow::on_pushButton_15_clicked()
{
    ui->stackedWidget->setCurrentIndex(0);
    ui->pushButton_15->setVisible(false);
}

void MainWindow::on_pushButton_6_clicked()
{
    if(ui->listtheme->currentRow() >= 0){

        QDialog dialog(this);
        QFormLayout form(&dialog);

        QLabel* label=new QLabel("Option");
        label->setAlignment(Qt::AlignCenter);
        form.addRow(label);

        QLineEdit *lineEdit = new QLineEdit(&dialog);
        form.addRow("Nouveau nom", lineEdit);

        QDialogButtonBox buttonBox(QDialogButtonBox::Ok | QDialogButtonBox::Cancel,
                                   Qt::Horizontal, &dialog);
        form.addRow(&buttonBox);
        QObject::connect(&buttonBox, SIGNAL(accepted()), &dialog, SLOT(accept()));
        QObject::connect(&buttonBox, SIGNAL(rejected()), &dialog, SLOT(reject()));

        if (dialog.exec() == QDialog::Accepted) {

            Theme newtheme;
            if(!lineEdit->text().isEmpty()){

                if(newtheme.updateThemes(ui->listtheme->currentItem()->data(1).value<Theme>().getId(),lineEdit->text().toStdString())){

                    QMessageBox msgBox;

                    msgBox.setText("Nom modifier");
                    ui->lineEdit->clear();

                    msgBox.exec();

                    QVector<Theme*>themes = Theme::getThemes();
                    int i;

                    if(!themes.isEmpty()){
                        ui->listtheme->clear();

                        for(i=0;i<themes.size();i++){

                            QListWidgetItem * newitem = new QListWidgetItem();
                            newitem->setText(QString::fromStdString(themes[i]->getName()));
                            QVariant data;

                            data.setValue(Theme(themes[i]->getName(),themes[i]->getId()));
                            newitem->setData(1,data);
                            ui->listtheme->addItem(newitem);
                        }
                    }}

                else{


                    QMessageBox msgBox;

                    msgBox.setText("Une erreur est surevenu");

                    msgBox.exec();
                }
            }
        }
    }
}

void MainWindow::on_listWidget_3_currentRowChanged(int currentRow)
{
    if(currentRow >= 0){
        QVector<Score*> listscores = Score::getAllScoreByIdGame(ui->listWidget_3->currentItem()->data(1).value<Partie>().getId());
        int i;
        ui->listWidget_2->clear();

        for(i=0;i<listscores.size();i++){

            QListWidgetItem * newitem = new QListWidgetItem();
            newitem->setText(QString::number(i+1)+". "+QString::fromStdString(listscores[i]->getUser().getPrenom()) +" "+QString::fromStdString(listscores[i]->getUser().getNom()));

            ui->listWidget_2->addItem(newitem);
        }
    }

}

void MainWindow::on_comboBox_currentIndexChanged()
{
    QVector<Question*>questions = Question::getQuestions(ui->comboBox->currentData(Qt::UserRole).value<Theme>().getId());
    int i;

    ui->listWidget_4->clear();

    for(i=0;i<questions.size();i++){

        QListWidgetItem * newitem = new QListWidgetItem();
        newitem->setText(QString::fromStdString(questions[i]->getC1()) + ", " + QString::fromStdString(questions[i]->getC2()) + " ou les deux");
        QVariant data;

        data.setValue(*questions[i]);
        newitem->setData(1,data);

        ui->listWidget_4->addItem(newitem);

    }
    ui->listWidget_4->setCurrentRow(0);
}

void MainWindow::on_comboBox_2_currentIndexChanged()
{
    User users;
    users.getUser(ui->comboBox_2->currentData(Qt::UserRole).value<User>().getid());

    ui->lineEdit_17->setText(QString::fromStdString(users.getmail()));
    ui->lineEdit_16->setText(QString::fromStdString(users.getNom()));
    ui->lineEdit_15->setText(QString::fromStdString(users.getPrenom()));

    QVector<Score*> scores = Score::getAllScoreByIdUser(ui->comboBox_2->currentData(Qt::UserRole).value<User>().getid());
    int i;
    ui->listWidget_5->clear();

    for(i =0;i<scores.size();i++){

        QListWidgetItem * newitem = new QListWidgetItem();
        QVariant data;
        data.setValue(*scores[i]);
        newitem->setText(QString::fromStdString(scores[i]->getPartie().getName()));
        newitem->setData(1,data);
        ui->listWidget_5->addItem(newitem);

    }
}

void MainWindow::on_pushButton_19_clicked()
{
    if(ui->listWidget->currentRow() >= 0){

        Reponse reponse = ui->listWidget->currentItem()->data(1).value<Reponse>();

        QDialog dialog(this);
        this->setMinimumWidth(400);
        QFormLayout form(&dialog);

        form.addRow(new QLabel("changement"));

        QLineEdit *lineEdit = new QLineEdit(&dialog);
        QString label = QString("Proposition");
        lineEdit->setMaxLength(128);
        lineEdit->setText(QString::fromStdString(reponse.getProposition()));
        form.addRow(label, lineEdit);
        QComboBox *box = new QComboBox(&dialog);
        box->addItem(QString::fromStdString("Les deux"),0);
        box->addItem(QString::fromStdString(reponse.getQuestion().getC1()),1);
        box->addItem(QString::fromStdString(reponse.getQuestion().getC2()),2);

        QString label2 = QString("Reponse");
        //lineEdit2->setMaxLength(128);
        form.addRow(label2, box);
        box->setCurrentIndex(reponse.getValeur());
        qDebug() << box->currentIndex();
        qDebug() << reponse.getValeur();

        QDialogButtonBox buttonBox(QDialogButtonBox::Ok | QDialogButtonBox::Cancel,
                                   Qt::Horizontal, &dialog);
        form.addRow(&buttonBox);
        QObject::connect(&buttonBox, SIGNAL(accepted()), &dialog, SLOT(accept()));
        QObject::connect(&buttonBox, SIGNAL(rejected()), &dialog, SLOT(reject()));

        if (dialog.exec() == QDialog::Accepted) {

            if(!lineEdit->text().isEmpty() && reponse.updateReponse(reponse.getId(),
                                                                    lineEdit->text().toStdString(),
                                                                    box->currentData().value<int>())){
                qDebug() << QString::fromStdString(reponse.getProposition());
                QVariant data;

                data.setValue(Reponse(reponse.getId(),box->currentData().value<int>(),lineEdit->text().toStdString(),reponse.getQuestion()));
                ui->listWidget->currentItem()->setData(1,data);
                ui->listWidget->currentItem()->setText(lineEdit->text());
                ui->label_8->setText(box->currentText());

            }
        }
    }
}

void MainWindow::on_pushButton_11_clicked()
{
    Question question = ui->listWidget_4->currentItem()->data(1).value<Question>();

    QDialog dialog(this);
    // Use a layout allowing to have a label next to each field
    QFormLayout form(&dialog);

    // Add some text above the fields
    form.addRow(new QLabel("The question ?"));

    // Add the lineEdits with their respective labels
    QList<QLineEdit *> fields;
    for(int i = 0; i < 2; ++i) {
        QLineEdit *lineEdit = new QLineEdit(&dialog);
        QString label = QString("Choix %1").arg(i + 1);
        form.addRow(label, lineEdit);

        fields << lineEdit;
    }
    fields[0]->setText(QString::fromStdString(question.getC1()));
    fields[1]->setText(QString::fromStdString(question.getC2()));
    // Add some standard buttons (Cancel/Ok) at the bottom of the dialog
    QDialogButtonBox buttonBox(QDialogButtonBox::Ok | QDialogButtonBox::Cancel,
                               Qt::Horizontal, &dialog);
    form.addRow(&buttonBox);
    QObject::connect(&buttonBox, SIGNAL(accepted()), &dialog, SLOT(accept()));
    QObject::connect(&buttonBox, SIGNAL(rejected()), &dialog, SLOT(reject()));

    // Show the dialog as modal
    if (dialog.exec() == QDialog::Accepted) {
        // If the user didn't dismiss the dialog, do something with the fields
        if(!fields[0]->text().isEmpty() && !fields[1]->text().isEmpty()
                && question.updateQuestion(question.getIdQuestion(),
                                           fields[0]->text().toStdString(),
                                           fields[1]->text().toStdString())){
            QVariant data;
            data.setValue(Question(question.getIdQuestion(),
                                   fields[0]->text().toStdString(),
                          fields[1]->text().toStdString(),
                    question.getTheme()));

            Question newquestion = ui->listWidget_4->currentItem()->data(1).value<Question>();

            ui->listWidget_4->currentItem()->setData(1,data);
            ui->listWidget_4->currentItem()->setText(fields[0]->text() + ", " + fields[1]->text() + " ou les deux");

            QVector<Reponse*> reponses = Reponse::getReponses(newquestion.getIdQuestion());
            //Reponse::getReponses(5);
            int i;
            //if tab non null
            ui->label_5->setText(fields[0]->text() + ", " + fields[1]->text() + " ou les deux");
            ui->label_7->setText(QString::fromStdString("Theme: " +newquestion.getTheme().getName()));
            ui->listWidget->clear();
            for(i=0;i<reponses.size();i++){

                QListWidgetItem * newitem = new QListWidgetItem();
                newitem->setText(QString::fromStdString(reponses[i]->getProposition()));
                QVariant data;
                //qDebug() << "test" << reponses[i]->getValeur();
                data.setValue(*reponses[i]);
                newitem->setData(1,data);
                ui->listWidget->addItem(newitem);

            }
            ui->listWidget->setCurrentRow(0);
        }
    }
}

void MainWindow::on_pushButton_20_clicked()
{
    ui->stackedWidget->setCurrentIndex(3);
    ui->label_8->clear();
    ui->pushButton_15->show();
}

void MainWindow::on_listWidget_currentRowChanged(int currentRow)
{
    if(currentRow>=0){
        Reponse value = ui->listWidget->currentItem()->data(1).value<Reponse>();
        //qDebug() << value.getValeur();

        switch(value.getValeur()){
        case 0:
            ui->label_8->setText(QString::fromStdString("Les deux"));
            break;
        case 1:
            ui->label_8->setText(QString::fromStdString(value.getQuestion().getC1()));
            break;
        case 2:
            ui->label_8->setText(QString::fromStdString(value.getQuestion().getC2()));
            break;
        default:
            ui->label_8->setText(QString::fromStdString(" "));
            break;
        }
    }
}

void MainWindow::on_pushButton_5_clicked()
{
    Theme newtheme;
    if(!ui->lineEdit->text().isEmpty()){

        if(newtheme.insertThemes(ui->lineEdit->text().toStdString())){

            QMessageBox msgBox;

            msgBox.setText("Theme ajouté");
            ui->lineEdit->clear();

            msgBox.exec();

            QVector<Theme*>themes = Theme::getThemes();
            int i;

            if(!themes.isEmpty()){
                ui->listtheme->clear();

                //ui->list->insertItem(list->size(),newitem);
                for(i=0;i<themes.size();i++){

                    QListWidgetItem * newitem = new QListWidgetItem();
                    newitem->setText(QString::fromStdString(themes[i]->getName()));
                    QVariant data;

                    data.setValue(Theme(themes[i]->getName(),themes[i]->getId()));
                    newitem->setData(1,data);
                    ui->listtheme->addItem(newitem);
                }
            }}

        else{
            QMessageBox msgBox;

            msgBox.setText("Une erreur est surevenu");

            msgBox.exec();
        }
    }
}

void MainWindow::on_pushButton_16_clicked()
{

    QDialog dialog(this);
    // Use a layout allowing to have a label next to each field
    QFormLayout form(&dialog);

    // Add some text above the fields
    form.addRow(new QLabel("The question ?"));

    QLineEdit *lineEdit = new QLineEdit(&dialog);
    QString label = QString("Choix 1");
    lineEdit->setMaxLength(128);
    form.addRow(label, lineEdit);
    QLineEdit *lineEdit2 = new QLineEdit(&dialog);
    QString label2 = QString("Choix 2");
    lineEdit2->setMaxLength(128);
    form.addRow(label2, lineEdit2);

    // Add some standard buttons (Cancel/Ok) at the bottom of the dialog
    QDialogButtonBox buttonBox(QDialogButtonBox::Ok | QDialogButtonBox::Cancel,
                               Qt::Horizontal, &dialog);
    form.addRow(&buttonBox);
    QObject::connect(&buttonBox, SIGNAL(accepted()), &dialog, SLOT(accept()));
    QObject::connect(&buttonBox, SIGNAL(rejected()), &dialog, SLOT(reject()));

    // Show the dialog as modal
    if (dialog.exec() == QDialog::Accepted) {

        Question newquestion;
        if(newquestion.addQuestion(ui->comboBox->currentData(Qt::UserRole).value<Theme>().getId(),
                                   lineEdit->text().toStdString(),
                                   lineEdit2->text().toStdString()) && !lineEdit->text().isEmpty() && !lineEdit2->text().isEmpty()){
            newquestion = newquestion.getlastinput();
            QListWidgetItem * newitem = new QListWidgetItem();
            newitem->setText(QString::fromStdString(newquestion.getC1()) + ", " + QString::fromStdString(newquestion.getC2()) + " ou les deux");
            QVariant data;

            data.setValue(newquestion);
            newitem->setData(1,data);
            ui->listWidget_4->addItem(newitem);
        }
    }

}

void MainWindow::on_pushButton_21_clicked()
{
    QDialog dialog(this);
    Question question = ui->listWidget_4->currentItem()->data(1).value<Question>();
    // Use a layout allowing to have a label next to each field
    this->setMinimumWidth(400);
    QFormLayout form(&dialog);

    // Add some text above the fields
    form.addRow(new QLabel("The question ?"));

    QLineEdit *lineEdit = new QLineEdit(&dialog);
    QString label = QString("Proposition");
    lineEdit->setMaxLength(128);
    form.addRow(label, lineEdit);
    //QLineEdit *lineEdit2 = new QLineEdit(&dialog);
    QComboBox *box = new QComboBox(&dialog);
    box->addItem(QString::fromStdString(question.getC1()),1);
    box->addItem(QString::fromStdString(question.getC2()),2);
    box->addItem(QString::fromStdString("Les deux"),0);
    QString label2 = QString("Reponse");
    //lineEdit2->setMaxLength(128);
    form.addRow(label2, box);

    //fields << lineEdit;
    //}

    // Add some standard buttons (Cancel/Ok) at the bottom of the dialog
    QDialogButtonBox buttonBox(QDialogButtonBox::Ok | QDialogButtonBox::Cancel,
                               Qt::Horizontal, &dialog);
    form.addRow(&buttonBox);
    QObject::connect(&buttonBox, SIGNAL(accepted()), &dialog, SLOT(accept()));
    QObject::connect(&buttonBox, SIGNAL(rejected()), &dialog, SLOT(reject()));

    // Show the dialog as modal
    if (dialog.exec() == QDialog::Accepted) {
        Reponse reponse;
        if(!lineEdit->text().isEmpty() && reponse.addReponse(box->currentData().value<int>(),
                                                             lineEdit->text().toStdString(),
                                                             question.getIdQuestion())){

            reponse = reponse.getlastinput();
            QListWidgetItem * newitem = new QListWidgetItem();
            newitem->setText(QString::fromStdString(reponse.getProposition()));
            QVariant data;

            data.setValue(reponse);
            newitem->setData(1,data);
            ui->listWidget->addItem(newitem);

        }
    }
}

void MainWindow::on_pushButton_22_clicked()
{
    //listwidget
    if(ui->listWidget->currentRow() >= 0){
        Reponse reponse = ui->listWidget->currentItem()->data(1).value<Reponse>();

        if(reponse.deleteReponse(reponse.getId())){

            delete ui->listWidget->takeItem(ui->listWidget->currentRow());
        }
    }
}

void MainWindow::on_pushButton_9_clicked()
{
    if(ui->listWidget_4->currentRow() >= 0){
        Question question = ui->listWidget_4->currentItem()->data(1).value<Question>();

        if(question.deleteQuestion(question.getIdQuestion())){
            delete ui->listWidget_4->takeItem(ui->listWidget_4->currentRow());
        }
    }
}

void MainWindow::on_pushButton_10_clicked()
{
    if(ui->listtheme->currentRow() >= 0){
        Theme theme = ui->listtheme->currentItem()->data(1).value<Theme>();

        if(theme.deleteTheme(theme.getId())){
            delete ui->listtheme->takeItem(ui->listtheme->currentRow());
        }
    }
}
