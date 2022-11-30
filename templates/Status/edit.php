<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>

    <aside class="column">
        <div style="padding:21px 21px" >
            <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'index'],
                ['escape' => false, 'class' => 'btn btn-success']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="status form content">
            <?= $this->Form->create($status) ?>
            <fieldset>
                <legend><?= __('Edit Status') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
                <?php
                echo $this->Form->control('description',['type'=>'textarea']
                );
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

