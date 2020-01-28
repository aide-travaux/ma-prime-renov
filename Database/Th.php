<?php

namespace MaPrimeRenov\Database;

abstract class Th
{
    /**
     * @source https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400376
     */
    const DB = [
        [
            'label' => 'Chaudières à très haute performance énergétique, à l\'exception de celles utilisant le fioul comme source d\'énergie',
            'code' => 'TH-01',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 1200,
                    'modeste' => 800,
                    'ceiling' => 4000,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 400,
                    'modeste' => 300,
                    'ceiling' => 4000,
                    'unit' => 'logement'
                ]
            ]
        ], [
            'label' => 'Chaudières à alimentation automatique fonctionnant au bois ou autres biomasse',
            'code' => 'TH-02',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 10000,
                    'modeste' => 8000,
                    'ceiling' => 18000,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 3000,
                    'modeste' => 2000,
                    'ceiling' => 18000,
                    'unit' => 'logement'
                ]
            ]
        ], [
            'label' => 'Chaudières à alimentation manuelle fonctionnant au bois ou autres biomasse',
            'code' => 'TH-03',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 8000,
                    'modeste' => 6500,
                    'ceiling' => 16000,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 3000,
                    'modeste' => 2000,
                    'ceiling' => 18000,
                    'unit' => 'logement'
                ]
            ]
        ], [
            'label' => 'Poêles à granulés, cuisinières à granulés',
            'code' => 'TH-04',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 3000,
                    'modeste' => 2500,
                    'ceiling' => 5000,
                    'unit' => null
                ]
            ]
        ], [
            'label' => 'Poêles à bûches, cuisinières à bûches',
            'code' => 'TH-05',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 2500,
                    'modeste' => 2000,
                    'ceiling' => 4000,
                    'unit' => null
                ]
            ]
        ], [
            'label' => 'Foyers fermés, inserts',
            'code' => 'TH-06',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 2000,
                    'modeste' => 1200,
                    'ceiling' => 4000,
                    'unit' => null
                ]
            ]
        ], [
            'label' => 'Equipements de production de chauffage fonctionnant à l\'énergie solaire thermique',
            'code' => 'TH-07',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 8000,
                    'modeste' => 6500,
                    'ceiling' => 16000,
                    'unit' => null
                ]
            ]
        ], [
            'label' => 'Equipements de fourniture d\'eau chaude sanitaire fonctionnant à l\'énergie solaire thermique',
            'code' => 'TH-08',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 4000,
                    'modeste' => 3000,
                    'ceiling' => 7000,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 1000,
                    'modeste' => 750,
                    'ceiling' => 7000,
                    'unit' => 'logement'
                ]
            ]
        ], [
            'label' => 'Equipements de chauffage ou de fourniture d\'eau chaude sanitaire fonctionnant avec des capteurs solaires hybrides thermiques et électriques à circulation de liquide',
            'code' => 'TH-09',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 2500,
                    'modeste' => 2000,
                    'ceiling' => 4000,
                    'unit' => null
                ]
            ]
        ], [
            'label' => 'Pompes à chaleur géothermiques ou solarothermiques',
            'code' => 'TH-10',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 10000,
                    'modeste' => 8000,
                    'ceiling' => 18000,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 3000,
                    'modeste' => 2000,
                    'ceiling' => 18000,
                    'unit' => 'logement'
                ]
            ]
        ], [
            'label' => 'Pompe à chaleur air/ eau',
            'code' => 'TH-11',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 4000,
                    'modeste' => 3000,
                    'ceiling' => 12000,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 3000,
                    'modeste' => 2000,
                    'ceiling' => 18000,
                    'unit' => 'logement'
                ]
            ]
        ], [
            'label' => 'Pompes à chaleur dédiées à la production d\'eau chaude sanitaire',
            'code' => 'TH-12',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 1200,
                    'modeste' => 800,
                    'ceiling' => 3500,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 400,
                    'modeste' => 300,
                    'ceiling' => 3500,
                    'unit' => 'logement'
                ]
            ]
        ], [
            'label' => 'Equipements de raccordement, ou droits et frais de raccordement, à un réseau de chaleur ou de froid',
            'code' => 'TH-13',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 1200,
                    'modeste' => 800,
                    'ceiling' => 1800,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 400,
                    'modeste' => 300,
                    'ceiling' => 1800,
                    'unit' => 'logement'
                ]
            ]
        ], [
            'label' => 'Dépose d\'une cuve à fioul',
            'code' => 'TH-14',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 1200,
                    'modeste' => 800,
                    'ceiling' => 1250,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 400,
                    'modeste' => 300,
                    'ceiling' => 1250,
                    'unit' => 'logement'
                ]
            ]
        ], [
            'label' => 'Systèmes de ventilation mécanique contrôlée double flux autoréglables ou hygroréglables',
            'code' => 'TH-15',
            'bonus' => [
                'partie_privative' => [
                    'tres_modeste' => 4000,
                    'modeste' => 3000,
                    'ceiling' => 6000,
                    'unit' => null
                ],
                'partie_commune' => [
                    'tres_modeste' => 3000,
                    'modeste' => 2000,
                    'ceiling' => 6000,
                    'unit' => 'logement'
                ]
            ]
        ]
    ];
}
