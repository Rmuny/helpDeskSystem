<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TicketAssign Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $deadline
 * @property string $priority
 * @property int $ticket_id
 * @property int $staff_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Ticket $ticket
 * @property \App\Model\Entity\Staff $staff
 */
class TicketAssign extends Entity
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
        'deadline' => true,
        'priority' => true,
        'ticket_id' => true,
        'staff_id' => true,
        'created' => true,
        'modified' => true,
        'ticket' => true,
        'staff' => true,
    ];

}
