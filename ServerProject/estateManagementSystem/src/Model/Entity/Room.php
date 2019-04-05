<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Room Entity
 *
 * @property int $roomId
 * @property int $roomName
 * @property int $building
 * @property float $roomSize
 * @property string $roomType
 * @property float $rent
 * @property int $resident
 */
class Room extends Entity
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
        'roomName' => true,
        'building' => true,
        'roomSize' => true,
        'roomType' => true,
        'rent' => true,
        'resident' => true
    ];
}
