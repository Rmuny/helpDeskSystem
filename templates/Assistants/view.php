<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 */
?>
<div class="row">
    <aside class="column">

            <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'submited_ticket'],
                ['escape' => false, 'class' => 'btn btn-success']) ?>


    <div class="column-responsive column-80">
        <div class="tickets view content">
            <table>
                <tr>
                    <th width="5%"><?= $this->Paginator->sort('id') ?></th>
                    <td><?= $this->Number->format($ticket->id) ?></td>
                </tr>
                <tr>
                    <th width="45%"><?= $this->Paginator->sort('description') ?></th>
                    <td><?= h($ticket->answer) ?></td>
                </tr>
                <tr>
                    <th width="13%"><?= $this->Paginator->sort('status_id') ?></th>
                    <td><?= $ticket->has('status') ? $this->Html->link($ticket->status->name, ['controller' => 'Status', 'action' => 'view', $ticket->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th width="15%"><?= $this->Paginator->sort('staff_id') ?></th>
                    <td><?= $ticket->has('staff') ? $this->Html->link($ticket->staff->staffName, ['controller' => 'Staffs', 'action' => 'view', $ticket->staff->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
