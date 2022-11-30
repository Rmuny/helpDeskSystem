<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Solution> $solutions
 */
$this->Html->script('bootstrapModal',['block'=>true]);
$this->Html->css('nav');

?>

<div class="card-body">
<div class="container-fluid">
    <!--        <div class="card-header">-->
        <div class="d-inline float-end">
            <?= $this->Html->link('<span class="fas fa-plus-circle text-white"></span><span class="ms-2 text-white">' . __('Add FAQ') . '</span>', ['action' => 'add'],
                ['escape' => false, 'class' => 'btn btn-success']) ?>
        </div>
        <h3 style="color: darkorange"><?= __('Q&A' ) ?></h3>
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
                    <th width="30%"><?= $this->Paginator->sort('title') ?></th>
                    <th width="33.5%"><?= $this->Paginator->sort('content') ?></th>
                    <th width="10%"><?= $this->Paginator->sort('category_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($solutions as $index => $solution): ?>
                    <tr>
                        <td style="padding-left: 10px"><?php
                            echo $index+ $this->Paginator->counter('{{start}}');
                            ?>
                        </td>

                        <td><?= h($solution->title) ?></td>
                        <td><?= h($solution->content) ?></td>
                        <td><?= $solution->has('category') ? $this->Html->link($solution->category->name, ['controller' => 'Categories', 'action' => 'view', $solution->category->name]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                '<span class="fa fa-eye"></span> View<span class="sr-only">' . __('View') . '</span>',
                                ['action' => 'view', $solution->id],
                                ['escape' => false, 'title' => __('View'), 'class'=>'btn text-white', 'style' => 'background-color: green']
                            ) ?>
                            <?= $this->Html->link(
                                '<span class="fa fa-edit"></span> Edit<span class="sr-only">' . __('Edit') . '</span>',
                                ['action' => 'edit', $solution->id],
                                ['escape' => false, 'title' => __('Edit'), 'class'=>'btn text-white', 'style' => 'background-color: blue']
                            ) ?>

                            <?php $this->Form->setTemplates([
                                'confirmJs' => 'addToModal("{{formName}}"); return false;'
                            ]); ?>

                            <?= $this->Form->postlink(
                                '🗑 Delete',
                                ['action' => 'delete', $solution->id],
                                ['title' => __('delete'), 'class'=>'btn text-white', 'style' => 'background-color: red',
                                    'confirm' => __('❗Are you sure want to delete staff # {0}?',$solution->staffName),
                                    'data-bs-toggle'=>"modal",
                                    'data-bs-target'=>"#bootstrapModal"
                                ],
                            ) ?>
                        </td>

                <?php endforeach; $index++?>
                </tr>
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

