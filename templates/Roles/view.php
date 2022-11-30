<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">

<!--    <div class="column-responsive column-90">-->
        <div class="roles view content" style="width: 1500px">
            <button>
                <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </button>

            <h3>Staff Information</h3>

            <table>
                <tr style="height: 80px">

                    <td><?= __('Id') ?></td>
                    <th><?= $this->Number->format($role->id) ?></th>


                    <td><?= __('Role :') ?></td>
                    <th><?= h($role->name) ?></th>

                </tr>

        </div>
    </div>

