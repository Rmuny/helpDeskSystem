<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 */
?>
<div class="card-body">
<div class="row">

    <!--    <div class="column-responsive column-90">-->
    <div class="roles view content" style="width: 1500px">
        <button>
            <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </button>

        <h3>Ticket</h3>
        <?= __('Description') ?>
        <?= $this->Number->format($ticket->answer) ?><br>
        <?= __('Assign to') ?>
        <?= $this->Number->format($ticket->staff_id) ?><br>
        <?= __('Status') ?>
        <?= $this->Number->format($ticket->status_id) ?>

    </div>
</div>
</div>
