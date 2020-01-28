<?php

namespace MaPrimeRenov\Database;

abstract class Env
{
    /**
     * @source https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400376
     */
    const DB = [
        [
            'label' => 'Isolation des murs par l\'extérieur',
            'code' => 'ENV-01',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 100,
                    'modeste' => 75,
                    'ceiling' => 150,
                    'unit' => 'm²'
                ],
                'partie_commune' => [
                    'tres_modeste' => 100,
                    'modeste' => 75,
                    'ceiling' => 150,
                    'unit' => 'm²'
                ]
            ]
        ], [
            'label' => 'Isolation des murs par l\'intérieur',
            'code' => 'ENV-02',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 25,
                    'modeste' => 20,
                    'ceiling' => 70,
                    'unit' => 'm²'
                ],
                'partie_commune' => [
                    'tres_modeste' => 25,
                    'modeste' => 20,
                    'ceiling' => 70,
                    'unit' => 'm²'
                ]
            ]
        ], [
            'label' => 'Isolation des rampants de toiture et plafonds de combles',
            'code' => 'ENV-03',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 25,
                    'modeste' => 20,
                    'ceiling' => 75,
                    'unit' => 'm²'
                ],
                'partie_commune' => [
                    'tres_modeste' => 25,
                    'modeste' => 20,
                    'ceiling' => 75,
                    'unit' => 'm²'
                ]
            ]
        ], [
            'label' => 'Isolation des toitures terrasses',
            'code' => 'ENV-04',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 100,
                    'modeste' => 75,
                    'ceiling' => 180,
                    'unit' => 'm²'
                ],
                'partie_commune' => [
                    'tres_modeste' => 100,
                    'modeste' => 75,
                    'ceiling' => 180,
                    'unit' => 'm²'
                ]
            ]
        ], [
            'label' => 'Isolation thermique des parois vitrées',
            'code' => 'ENV-05',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 100,
                    'modeste' => 80,
                    'ceiling' => 1000,
                    'unit' => 'equipement'
                ]
            ]
        ], [
            'label' => 'Equipements ou matériaux de protection des parois vitrées ou opaques contre les rayonnements solaires, pour les immeubles situés à La Réunion, en Guyane, en Martinique, en Guadeloupe ou à Mayotte',
            'code' => 'ENV-06',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 25,
                    'modeste' => 20,
                    'ceiling' => 200,
                    'unit' => 'm²'
                ],
                'partie_commune' => [
                    'tres_modeste' => 25,
                    'modeste' => 20,
                    'ceiling' => 200,
                    'unit' => 'm²'
                ]
            ]
        ]
    ];
}
