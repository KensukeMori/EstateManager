<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Building Entity
 *
 * @property int $buildingId
 * @property string $buildingName
 * @property int $nearbyStation
 * @property int $distance
 * @property \Cake\I18n\FrozenDate $builtDay
 */
class Building extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'buildingName' => true,
        'nearbyStation' => true,
        'distance' => true,
        'builtDay' => true
    ];
}
