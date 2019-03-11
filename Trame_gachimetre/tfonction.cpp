#include "tfonction.h"
#include "QDebug"
#include <time.h>
#include <locale.h>
#include <iostream>

tfonction::tfonction()
{
    srand(time(NULL));
    setlocale(LC_ALL, "C");
}

void tfonction::etablir_liaison()
{
    liaison = new tRs232;
}

char* tfonction::MessageConfigurer()
{
    return liaison->AfficherMessageConfigurer();
}

float tfonction::calcul_total(int aleatoire)
{
    if (aleatoire == 1)
    {
        poids = ((rand() % 50) + 1);
        poids /= 1000;
    }
    else if (aleatoire == 2)
    {
        poids = (rand() % 16 + 35);
        poids /= 1000;
    }
    else
    {

    }
    total += poids;
    qDebug() << poids;
    return poids;

}

void tfonction::envoyer_trame()
{
    char Trame[100];
    sprintf(Trame, " %0.3f kg \r\n\r\n\r\n", total);
    liaison->Envoyer(Trame);
    qDebug() << Trame;

    /*
    char Trame[100];
    if (aleatoire == 1)
    {
        float poids = ((rand() % 50) + 1);
        poids /= 1000;
        sprintf(Trame, " %0.3f kg \r\n\r\n\r\n", poids);

    }
    else if (aleatoire == 2)
    {
        float poids = (rand() % 16 + 35);
        poids /= 1000;
        sprintf(Trame, " %0.3f kg \r\n\r\n\r\n", poids);
    }
    else
    {
        sprintf(Trame, " %0.3f kg \r\n\r\n\r\n", poids);
    }

    qDebug() << Trame;
    return poids;
    */
}
