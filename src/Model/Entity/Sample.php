<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sample Entity
 *
 * @property int $id
 * @property string $point
 * @property string $url_picture
 * @property string $path_picture
 * @property int $zone_id
 * @property float $lat
 * @property float $lon
 * @property $point_json
 *
 * @property \App\Model\Entity\Zone $zone
 */
class Sample extends Entity
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
