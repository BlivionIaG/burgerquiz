#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include "question.h"
#include "theme.h"
#include "partie.h"
#include "score.h"

Q_DECLARE_METATYPE(Question)
Q_DECLARE_METATYPE(Theme)
Q_DECLARE_METATYPE(Partie)
Q_DECLARE_METATYPE(Score)


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
    void on_pushButton_clicked();

    void go_menu();


    void on_pushButton_2_clicked();

    void on_pushButton_3_clicked();

    void on_pushButton_4_clicked();

    void on_pushButton_8_clicked();

    void on_pushButton_7_clicked();

    void on_pushButton_14_clicked();

    void on_pushButton_15_clicked();

    void on_pushButton_6_clicked();

    void on_listWidget_3_currentRowChanged(int currentRow);

    void on_comboBox_currentIndexChanged(int index);

    void on_comboBox_2_currentIndexChanged(int index);

    void on_listWidget_4_currentRowChanged(int currentRow);

private:
    Ui::MainWindow *ui;
};

#endif // MAINWINDOW_H
