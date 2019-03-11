#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include "trs232.h"
#include "tfonction.h"
#include <QTimer>

namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QWidget *parent = 0);
    ~MainWindow();

public slots:
    void envoyer();
    void ajouter();
private slots:
    void on_bt_envoyer_clicked();

    void on_bt_etablir_clicked();

    void on_bt_arreter_clicked();

    void on_bt_quitter_clicked();

    void on_bt_ajouter_clicked();

private:
    Ui::MainWindow *ui;
    tfonction* gestion;
    QTimer *timer = new QTimer(this);
    QTimer *timer2 = new QTimer(this);
};

#endif // MAINWINDOW_H
