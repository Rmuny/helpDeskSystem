<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;


/**
 * Staff Entity
 *
 * @property int $id
 * @property string $staffName
 * @property string $gender
 * @property string $email
 * @property string $phoneNumber
 * @property string $profileImage
 * @property string $username
 * @property string $password
 * @property string $role_id
 * @property string $category_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\TicketAssign[] $ticket_assign
 * @property \App\Model\Entity\Ticket[] $tickets
 */
class Staff extends Entity
{
    /**
     * @var mixed
     */
    public $getErrors;
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'staffName' => true,
        'gender' => true,
        'email' => true,
        'phoneNumber' => true,
        'profileImage' => true,
        'username' => true,
        'password' => true,
        'role_id' => true,
        'role' => true,
        'category_id' => true,
        'category' => true,
        'ticket_assign' => true,
        'tickets' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword($value){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }


}
