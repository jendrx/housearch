<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Zone Entity
 *
 * @property int $id
 * @property string $geom
 * @property string $description
 * @property int $region_id
 * @property $geom_json
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\House[] $houses
 * @property \App\Model\Entity\Sample[] $samples
 */
class Zone extends Entity
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
        '*' => true,
        'id' => false
    ];
}
