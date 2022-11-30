<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ticket> $tickets
 */

$this->Html->script('bootstrapModal',['block'=>true]);

?>
<style>
    /*button{*/
    /*    height: 15%;*/
    /*    width: 60%;*/
    /*}*/
</style>
<div class="card-body">
    <div class="d-inline float-end">
        <?= $this->Html->link('<span class="fas fa-plus-circle text-white"></span><span class="ms-2 text-white">' . __('Add ticket') . '</span>', ['action' => 'add'],
            ['escape' => false, 'class' => 'btn btn-success']) ?>
    </div>
<div class="container-fluid">
    <!--        <div class="card-header">-->

        <h3 style="color: darkorange"><?= __('Tickets' ) ?></h3>
    </div>
</div>
<!--            //search-->
<div class="card">

    <div class="d-inline">
        <?= $this->Form->create(null,['type'=>'get'])?>
        <div class="d-inline-flex">
            <?= $this->Form->control('key',[
                'label'=>false,
                'placeholder' => '🔍Search...',
                'value'=>$this->request->getQuery('key')
            ])?>
        </div>
    </div>

    <div class="table-responsive" >
        <div >
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>

                    <th style="padding-left: 10px"><?= $this->Paginator->sort('No') ?></th>
                    <th width="9%"><?= $this->Paginator->sort('Id') ?></th>
                    <th width="33%"><?= $this->Paginator->sort('description') ?></th>
                    <th width="8%"><?= $this->Paginator->sort('category_id') ?></th>
                    <th width="6%"><?= $this->Paginator->sort('status_id') ?></th>
                    <th width="10.5%"><?= $this->Paginator->sort('assign To') ?></th>


                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tickets as  $index => $ticket): ?>
                    <tr>

                        <td style="padding-left: 1%">
                            <?php
                            echo $index+ $this->Paginator->counter('{{start}}');
                            ?>

                        </td>
                        <td>#TK<?= h($ticket->id) ?></td>

                        <td><?= h($ticket->answer) ?></td>
                        <td><?= $ticket->has('category') ? $this->Html->link($ticket->category->name, ['controller' => 'Categories', 'action' => 'view', $ticket->category->name]) : '' ?></td>
                        <td>
<!--                            change button color by status-->
                            <?php if ($ticket->status_id === 5) : ?>
                        <button type="button" class="btn btn-outline-secondary">
                        <?= $ticket->has('status') ? $this->Html->link($ticket->status->name, ['controller' => 'Status', 'action' => 'view', $ticket->status->id]) : '' ?>
                        </button>
                        </td>
                        <?php elseif ($ticket->status_id === 1) : ?>
                            <button type="button" class="btn btn-outline-success">
                                <?= $ticket->has('status') ? $this->Html->link($ticket->status->name, ['controller' => 'Status', 'action' => 'view', $ticket->status->id]) : '' ?>
                            </button>
                        <?php elseif ($ticket->status_id === 2) : ?>
                            <button type="button" class="btn btn-outline-warning">
                                <?= $ticket->has('status') ? $this->Html->link($ticket->status->name, ['controller' => 'Status', 'action' => 'view', $ticket->status->id]) : '' ?>
                            </button>
                        <?php elseif ($ticket->status_id === 3) : ?>
                            <button type="button" class="btn btn-outline-primary">
                                <?= $ticket->has('status') ? $this->Html->link($ticket->status->name, ['controller' => 'Status', 'action' => 'view', $ticket->status->id]) : '' ?>
                            </button>
                        <?php else: ?>
                            <button type="button" class="btn btn-outline-info">
                                <?= $ticket->has('status') ? $this->Html->link($ticket->status->name, ['controller' => 'Status', 'action' => 'view', $ticket->status->id]) : '' ?>
                            </button>

                        <?php endif; ?>



                        <td><?= $ticket->has('staff') ? $this->Html->link($ticket->staff->staffName, ['controller' => 'Staffs', 'action' => 'view', $ticket->staff->id]) : '' ?>
                        </td>

                        <td class="actions">

                            <?php if ($ticket->status_id === 5) : ?>
                                <?= $this->Html->link(
                                    '<span class="fa fa-eye"></span> View<span class="sr-only">' . __('View') . '</span>',
                                    ['action' => 'view', $ticket->id],
                                    ['escape' => false, 'title' => __('View'), 'class'=>'btn text-white disable', 'style' => 'background-color: green']
                                ) ?>

                                <?= $this->Html->link(
                                    '<span class="fa fa-edit"></span> Edit<span class="sr-only">' . __('Edit') . '</span>',
                                    ['action' => 'edit', $ticket->id],
                                    ['escape' => false, 'title' => __('Edit'), 'class'=>'btn text-white disabled', 'style' => 'background-color: blue']
                                ) ?>
                                <?php $this->Form->setTemplates([
                                    'confirmJs' => 'addToModal("{{formName}}"); return false;'
                                ]); ?>

                                <?= $this->Form->postlink(
                                    '🗑 Delete',
                                    ['action' => 'delete', $ticket->id],
                                    ['title' => __('delete'), 'class'=>'btn text-white disabled', 'style' => 'background-color: red',
                                        'confirm' => __('❗Are you sure want to delete ticket {0}?',$ticket->ticketNumber),
                                        'data-bs-toggle'=>"modal",
                                        'data-bs-target'=>"#bootstrapModal"
                                    ],
                                ) ?>
                            <?php else: ?>
                                <?= $this->Html->link(
                                    '<span class="fa fa-eye"></span> View<span class="sr-only">' . __('View') . '</span>',
                                    ['action' => 'view', $ticket->id],
                                    ['escape' => false, 'title' => __('View'), 'class'=>'btn text-white', 'style' => 'background-color: green']
                                ) ?>
                            <?= $this->Html->link(
                                '<span class="fa fa-edit"></span> Edit<span class="sr-only">' . __('Edit') . '</span>',
                                ['action' => 'edit', $ticket->id],
                                ['escape' => false, 'title' => __('Edit'), 'class'=>'btn text-white', 'style' => 'background-color: blue']
                            ) ?>
                                <?php $this->Form->setTemplates([
                                    'confirmJs' => 'addToModal("{{formName}}"); return false;'
                                ]); ?>

                                <?= $this->Form->postlink(
                                    '🗑 Delete',
                                    ['action' => 'delete', $ticket->id],
                                    ['title' => __('delete'), 'class'=>'btn text-white', 'style' => 'background-color: red',
                                        'confirm' => __('❗Are you sure want to delete ticket {0}?',$ticket->ticketNumber),
                                        'data-bs-toggle'=>"modal",
                                        'data-bs-target'=>"#bootstrapModal"
                                    ],
                                ) ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?=$this->Form->end()?>
    </div>
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
        <nav aria-label="Page navigation">
            <ul class="pagination ">
                <?= $this->Paginator->prev('previous') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('next') ?>
            </ul>
        </nav>
        <div class="float-end" >
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
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

