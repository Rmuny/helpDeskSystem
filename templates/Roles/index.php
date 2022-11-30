<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Role> $roles
 */
$this->Html->script('bootstrapModal',['block'=>true]);
$this->Html->css('nav');
?>

<div class="card-body">
<div class="container-fluid">
    <!--        <div class="card-header">-->

        <div class="d-inline float-end">
            <?= $this->Html->link('<span class="fas fa-plus-circle text-white"></span><span class="ms-2 text-white">' . __('Add Role') . '</span>', ['action' => 'add'],
                ['escape' => false, 'class' => 'btn btn-success']) ?>
        </div>
        <h3 style="color: darkorange"><?= __('Roles' ) ?></h3>
    </div>
</div>

<div class="table-responsive" style="padding-left: 10px">
    <div >
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr >
                <th style="padding-left: 10px" width="10%"><?= $this->Paginator->sort('No') ?></th>
                <th style="width: 30%"><?= $this->Paginator->sort('Name') ?></th>
                <th style="width: 51.5%"><?= $this->Paginator->sort('Description') ?></th>

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($roles as $index =>$role): ?>
                <tr>
                    <td style="padding-left: 10px"><?php
                        echo $index+ $this->Paginator->counter('{{start}}');
                        ?>
                    </td>
                    <td ><?= h($role->name) ?></td>
                    <td><?= h($role->description)?></td>


                    <td class="actions">

                        <?= $this->Html->link(
                            '<span class="fa fa-edit"></span> Edit<span class="sr-only">' . __('Edit') . '</span>',
                            ['action' => 'edit', $role->id],
                            ['escape' => false, 'title' => __('Edit'), 'class'=>'btn text-white', 'style' => 'background-color: blue']
                        ) ?>
                        <?php $this->Form->setTemplates([
                            'confirmJs' => 'addToModal("{{formName}}"); return false;'
                        ]); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?=$this->Form->end()?>
</div>

<nav aria-label="Page navigation example">
    <?php
    $this->Paginator->setTemplates([
        'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    ]);
    ?>
    <div class="mx-auto">

        <div class="float-end" >
            <?= $this->Paginator->counter(__('Showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
    </div>
</nav>


<div class="modal" id="bootstrapModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="confirmMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="ok">OK</button>
            </div>
        </div>
    </div>
</div>
