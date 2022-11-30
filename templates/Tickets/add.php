<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 * @var \Cake\Collection\CollectionInterface|string[] $staffs
 *  @var \Cake\Collection\CollectionInterface|string[] $status
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */
?>
<div class="row">
    <aside class="column">
            <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'index'],
                ['escape' => false, 'class' => 'btn btn-success']) ?>
        </div>

    <div class="column-responsive column-80">
        <div class="tickets form content">
            <?= $this->Form->create($ticket) ?>
            <fieldset>
                <legend><?= __('Add Ticket') ?></legend>
                <?php
                    echo $this->Form->control('answer',
                    ['label'=>'Description']);

                echo $this->Form->control('category_id',
                    ['options' => $categories, 'empty' => false,'label'=>false]);
                 ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end()?>
        </div>
    </div>
</div>
