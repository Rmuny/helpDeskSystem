<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 * @var string[]|\Cake\Collection\CollectionInterface $staffs
 * @var string[]|\Cake\Collection\CollectionInterface $status
 */
?>
<div class="row">
    <aside class="column" style="padding-left: 30px">
        <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'ticketAssigned'],
            ['escape' => false, 'class' => 'btn btn-success']) ?>
</div>

<div class="column-responsive columna-80">
    <div class="tickets form content">
        <?= $this->Form->create($ticket) ?>
        <fieldset>
            <legend><?= __('Edit Ticket') ?></legend>
            <?php
            echo $this->Form->control('status_id', ['options' => $status]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

