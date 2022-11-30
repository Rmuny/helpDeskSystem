<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketAssign $ticketAssign
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ticket Assign'), ['action' => 'edit', $ticketAssign->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ticket Assign'), ['action' => 'delete', $ticketAssign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketAssign->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ticket Assign'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ticket Assign'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ticketAssign view content">
            <h3><?= h($ticketAssign->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Priority') ?></th>
                    <td><?= h($ticketAssign->priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ticket') ?></th>
                    <td><?= $ticketAssign->has('ticket') ? $this->Html->link($ticketAssign->ticket->answer, ['controller' => 'Tickets', 'action' => 'view', $ticketAssign->ticket->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff') ?></th>
                    <td><?= $ticketAssign->has('staff') ? $this->Html->link($ticketAssign->staff->staffName, ['controller' => 'Staffs', 'action' => 'view', $ticketAssign->staff->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ticketAssign->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deadline') ?></th>
                    <td><?= h($ticketAssign->deadline) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($ticketAssign->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($ticketAssign->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
