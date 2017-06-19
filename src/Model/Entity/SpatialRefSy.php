<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SpatialRefSy Entity
 *
 * @property int $srid
 * @property string $auth_name
 * @property int $auth_srid
 * @property string $srtext
 * @property string $proj4text
 */
class SpatialRefSy extends Entity
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
        'srid' => false
    ];
}
