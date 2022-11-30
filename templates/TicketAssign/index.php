<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TicketAssign> $ticketAssign
 */
?>
<div class="ticketAssign index content">
    <?= $this->Html->link(__('New Ticket Assign'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ticket Assign') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('deadline') ?></th>
                    <th><?= $this->Paginator->sort('priority') ?></th>
                    <th><?= $this->Paginator->sort('ticket_id') ?></th>
                    <th><?= $this->Paginator->sort('staff_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ticketAssign as $ticketAssign): ?>
                <tr>
                    <td><?= $this->Number->format($ticketAssign->id) ?></td>
                    <td><?= h($ticketAssign->deadline) ?></td>
                    <td><?= h($ticketAssign->priority) ?></td>
                    <td><?= $ticketAssign->has('ticket') ? $this->Html->link($ticketAssign->ticket->answer, ['controller' => 'Tickets', 'action' => 'view', $ticketAssign->ticket->id]) : '' ?></td>
                    <td><?= $ticketAssign->has('staff') ? $this->Html->link($ticketAssign->staff->staffName, ['controller' => 'Staffs', 'action' => 'view', $ticketAssign->staff->id]) : '' ?></td>
                    <td><?= h($ticketAssign->created) ?></td>
                    <td><?= h($ticketAssign->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ticketAssign->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticketAssign->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticketAssign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketAssign->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
