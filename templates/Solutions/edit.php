<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Solution $solution
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="row">
    <aside class="column">
            <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'index'],
                ['escape' => false, 'class' => 'btn btn-success']) ?>

    <div class="column-responsive column-80">
        <div class="solutions form content">
            <?= $this->Form->create($solution) ?>
            <fieldset>
                <legend><?= __('Edit Solution') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('content',[
                        'type'=>'textarea',
                    ]);
                    echo $this->Form->control('category_id', ['options' => $categories]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
