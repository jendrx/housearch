<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sample Entity
 *
 * @property int $id
 * @property string $name
 * @property string $url_pic
 * @property string $path_pic
 * @property string $point
 * @property $point_json
 * @property float $lat
 * @property float $lon
 * @property int $zone_id
 * @property int $zone_category_id
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
