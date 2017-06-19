<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * House Entity
 *
 * @property int $id
 * @property int $price
 * @property int $area
 * @property int $construction_year
 * @property string $url_ad
 * @property string $location
 * @property \Cake\I18n\FrozenTime $created
 * @property int $energy_certification_year
 * @property int $outbuilding_area
 * @property int $energy_certification_id
 * @property int $conservation_id
 * @property int $garage_id
 * @property int $outbuilding_id
 * @property int $zone_id
 * @property int $seller_id
 * @property int $condition_id
 * @property int $house_type_id
 * @property int $rooms
 * @property float $lat
 * @property float $lon
 * @property $location_json
 * @property string $path_pic
 *
 * @property \App\Model\Entity\EnergyCertification $energy_certification
 * @property \App\Model\Entity\Conservation $conservation
 * @property \App\Model\Entity\Condition $condition
 * @property \App\Model\Entity\Garage $garage
 * @property \App\Model\Entity\Outbuilding $outbuilding
 * @property \App\Model\Entity\Zone $zone
 * @property \App\Model\Entity\Seller $seller
 * @property \App\Model\Entity\HouseType $house_type
 */
class House extends Entity
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
