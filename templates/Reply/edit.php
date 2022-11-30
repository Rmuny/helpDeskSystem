<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reply $reply
 * @var string[]|\Cake\Collection\CollectionInterface $tickets
 * @var string[]|\Cake\Collection\CollectionInterface $staffs
 */
?>
<div class="row">
    <aside class="column">
            <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'index'],
                ['escape' => false, 'class' => 'btn btn-success']) ?>
        </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reply form content">
            <?= $this->Form->create($reply) ?>
            <fieldset>
                <legend><?= __('Edit Reply') ?></legend>
                <?php
                    echo $this->Form->control('message',[
                        'type'=>'textarea'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
