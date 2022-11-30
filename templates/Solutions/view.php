<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Solution $solution
 */
?>
<div class="row">
    <aside class="column">

        <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'index'],
            ['escape' => false, 'class' => 'btn btn-success']) ?>

    </aside>
    <div class="column-responsive column-80">
        <div class="solutions view content">
            <h3><?= h($solution->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($solution->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content') ?></th>
                    <td><?= h($solution->content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $solution->has('category') ? $this->Html->link($solution->category->name, ['controller' => 'Categories', 'action' => 'view', $solution->category->name]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($solution->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
