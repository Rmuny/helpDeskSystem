<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reply $reply
 * @var \Cake\Collection\CollectionInterface|string[] $tickets
 * @var \Cake\Collection\CollectionInterface|string[] $staffs
 */
?>
<div class="card-body">
<div class="row">
    <aside class="column">
            <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'index'],
                ['escape' => false, 'class' => 'btn btn-success']) ?>
        </div>
    <div class="column-responsive column-80">
        <div class="reply form content">
            <?= $this->Form->create($reply) ?>
            <fieldset>
                <legend><?= __('Reply Message') ?></legend>
                <?php
                    echo $this->Form->control('message',[
                        'type' => 'textarea'
                    ]);
                    echo $this->Form->control('ticket_id', ['options' => $tickets]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

