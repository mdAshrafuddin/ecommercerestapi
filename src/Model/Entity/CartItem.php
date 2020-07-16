<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CartItem Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $product_details_id
 * @property string|null $saved_for_later
 * @property string|null $quantity
 * @property \Cake\I18n\FrozenTime|null $time_added
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ProductDetail $product_detail
 */
class CartItem extends Entity
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
        'user_id' => true,
        'product_details_id' => true,
        'saved_for_later' => true,
        'quantity' => true,
        'time_added' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'product_detail' => true,
    ];
}
