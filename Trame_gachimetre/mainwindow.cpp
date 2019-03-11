#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <iostream>
#include "QDebug"
#include <QMessageBox>

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    ui->bt_arreter->hide();
    connect(timer, SIGNAL(timeout()), this, SLOT(envoyer()));
    connect(timer2, SIGNAL(timeout()), this, SLOT(ajouter()));
    ui->tab->show();
    ui->tab_2->hide();
    ui->tabWidget->setTabEnabled(1,0);
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::on_bt_envoyer_clicked()
{
    envoyer();
    //int frequence = (ui->text_frequence->value() * 1000);
    timer->start(100);
}

void MainWindow::on_bt_etablir_clicked()
{
    gestion = new tfonction;
    gestion->etablir_liaison();
    if ((strcmp(gestion->MessageConfigurer(),"Ouverture du port reussie.")) == 0)
    {
        ui->tab->hide();
        ui->tab_2->show();
        ui->tabWidget->setTabEnabled(0,0);
        ui->tabWidget->setTabEnabled(1,1);
    }
    else
    {
        QMessageBox::critical(this, "Erreur lors de l'ouverture du port", "Veuillez vérifier les branchements");
    }
}

void MainWindow::envoyer()
{
    gestion->envoyer_trame();
    ui->bt_envoyer->hide();
    ui->bt_arreter->show();
}

void MainWindow::on_bt_arreter_clicked()
{
    timer->stop();
    qDebug() << "Arrêt de l'envoi";
    ui->bt_arreter->hide();
    ui->bt_envoyer->show();
    ui->text_frequence->show();
    ui->label_freq->show();
}

void MainWindow::on_bt_ajouter_clicked()
{
    if (timer2->isActive())
        ajouter();
    else
    {
        ajouter();
        int frequence = (ui->text_frequence->value() * 1000);
        timer2->start(frequence);
        ui->text_frequence->hide();
        ui->label_freq->hide();
    }
}

void MainWindow::ajouter()
{
    int aleatoire = ui->bt_aleatoire->isChecked();

    if (ui->bt_35g->isChecked())
        aleatoire = 2;

    float poids = gestion->calcul_total(aleatoire);
    QString poids_g = QString::number(poids*1000);
    ui->text_poids_2->setText(poids_g);

}

void MainWindow::on_bt_quitter_clicked()
{
    close();
}
