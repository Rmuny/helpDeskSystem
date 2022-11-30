<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reply $reply
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reply'), ['action' => 'edit', $reply->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reply'), ['action' => 'delete', $reply->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reply->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reply'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reply'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reply view content">
            <h3><?= h($reply->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Message') ?></th>
                    <td><?= h($reply->message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ticket') ?></th>
                    <td><?= $reply->has('ticket') ? $this->Html->link($reply->ticket->answer, ['controller' => 'Tickets', 'action' => 'view', $reply->ticket->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff') ?></th>
                    <td><?= $reply->has('staff') ? $this->Html->link($reply->staff->staffName, ['controller' => 'Staffs', 'action' => 'view', $reply->staff->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reply->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reply Id') ?></th>
                    <td><?= $this->Number->format($reply->Reply_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($reply->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
