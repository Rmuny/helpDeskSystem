<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketAssign $ticketAssign
 * @var string[]|\Cake\Collection\CollectionInterface $tickets
 * @var string[]|\Cake\Collection\CollectionInterface $staffs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ticketAssign->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ticketAssign->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ticket Assign'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ticketAssign form content">
            <?= $this->Form->create($ticketAssign) ?>
            <fieldset>
                <legend><?= __('Edit Ticket Assign') ?></legend>
                <?php
                    echo $this->Form->control('deadline');
                    echo $this->Form->control('priority');
                    echo $this->Form->control('ticket_id', ['options' => $tickets]);
                    echo $this->Form->control('staff_id', ['options' => $staffs]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
