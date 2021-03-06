<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Region Entity
 *
 * @property int $id
 * @property string $name
 * @property string $geom
 * @property $geom_json
 * @property int $admin_level
 * @property int $parent_id
 * @property string $parent_dicofre
 * @property int $lft
 * @property int $rght
 * @property string $dicofre
 *
 * @property \App\Model\Entity\ParentRegion $parent_region
 * @property \App\Model\Entity\ChildRegion[] $child_regions
 * @property \App\Model\Entity\Zone[] $zones
 */
class Region extends Entity
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
