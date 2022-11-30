<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketAssign $ticketAssign
 * @var \Cake\Collection\CollectionInterface|string[] $tickets
 * @var \Cake\Collection\CollectionInterface|string[] $staffs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ticket Assign'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ticketAssign form content">
            <?= $this->Form->create($ticketAssign) ?>
            <fieldset>
                <legend><?= __('Add Ticket Assign') ?></legend>
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
