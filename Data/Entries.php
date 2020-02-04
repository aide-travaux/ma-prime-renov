<?php

namespace AideTravaux\MaPrimeRenov\Data;

abstract class Entries
{
    /**
     * @property array
     */
    const CATEGORIES_ANAH = [
        'cateogrie_anah_1' => 'Modeste',
        'cateogrie_anah_2' => 'Très modeste'
    ];

    /**
     * @property array
     */
    const TYPE_PARTIES = [
        'type_partie_1' => 'Partie privative',
        'type_partie_2' => 'Partie commune'
    ];

    /**
     * @property array
     */
    const TYPES_LOGEMENT = [
        'type_logement_1' => 'Maison individuelle',
        'type_logement_2' => 'Appartement',
        'type_logement_3' => 'Bâtiment collectif'
    ];

    /**
     * @property array
     */
    const STATUTS_OCCUPANT_LOGEMENT = [
        'statut_occupant_logement_1' => 'Propriétaire occupant',
        'statut_occupant_logement_2' => 'Propriétaire bailleur',
        'statut_occupant_logement_3' => 'Locataire',
        'statut_occupant_logement_4' => 'Occupant à titre gratuit'
    ];

    /**
     * @property array
     */
    const TYPES_OCCUPATION_LOGEMENT = [
        'type_occupation_logement_1' => 'Résidence principale',
        'type_occupation_logement_2' => 'Résidence secondaire'
    ];
}
