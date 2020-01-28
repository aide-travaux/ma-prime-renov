<?php

namespace MaPrimeRenov\Database;

abstract class Se
{
    /**
     * @source https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400376
     */
    const DB = [
        [
            'label' => 'Audit énergétique',
            'code' => 'SE-01',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 500,
                    'modeste' => 400,
                    'ceiling' => 800,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 250,
                    'modeste' => 200,
                    'ceiling' => 800,
                    'unit' => 'logement'
                ]
            ]
        ]
    ];
}
