<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property int|null $status_id
 * @property string $answer
 * @property int $staff_id
 * @property int $category_id

 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\Reply[] $reply
 * @property \App\Model\Entity\TicketAssign[] $ticket_assign
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Category $category
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Ticket extends Entity
{
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
        'status_id' => true,
        'answer' => true,
        'staff_id' => true,
        'submit_by'=> true,
        'category_id' => true,
        'staff' => true,
        'reply' => true,
        'ticket_assign' => true,
        'status' => true,
        'category' => true,
        'created' => true,
        'modified' => true,
    ];
}
