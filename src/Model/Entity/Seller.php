<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Seller Entity
 *
 * @property int $id
 * @property int $ami
 * @property string $nif
 * @property string $url
 * @property int $rank
 * @property int $address_id
 * @property int $seller_type_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\SellerType $seller_type
 * @property \App\Model\Entity\House[] $houses
 * @property \App\Model\Entity\User[] $users
 */
class Seller extends Entity
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
