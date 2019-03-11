#ifndef TFONCTION_H
#define TFONCTION_H

#include "trs232.h"

class tfonction
{

public:
    tfonction();
    void etablir_liaison();
    char* MessageConfigurer();
    void envoyer_trame();
    float calcul_total(int aleatoire);
private:
    tRs232* liaison;
    float poids;
    float total;

};

#endif // TFONCTION_H
