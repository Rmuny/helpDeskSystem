<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ticket> $tickets
 * @var string[]|\Cake\Collection\CollectionInterface $status
 * @var string[]|\Cake\Collection\CollectionInterface $category
 */

?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<style>
    .container{
        display: flex;
    }
    button{
        border-radius: 10px;
        background-color: #3a3a3a;
        border-color: snow;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css"></script>
<div class="card-body">
    <div class="d-inline float-end">
<!--        <button id="save_table" style="background-color: darkorange">Save &#128190;</button>-->
        <?= $this->Html->link('<span class="fas fa-save text-white"></span><span class="ms-2 text-white">' . __('Export Data') . '</span>', ['action' => 'exportdata'],
            ['escape' => false, 'class' => 'btn btn-success']) ?>

    </div>
    <div class="container-fluid">
        <!--        <div class="card-header">-->
        <h3 style="color: darkorange"><?= __('Tickets Report' ) ?></h3>

<!--            //search-->
    <?= $this->Form->create(null,['type'=>'get'])?>

    </div>
    <div class="card">
    <div class="container">
        <div class="flex-direction: row">
            <div style="width: 90%">
                <?= $this->Form->control('catekey',[
                    'type'=>'select',
                    'label'=>'Filter by Category',
                    'options' => $category,
                    'empty' => 'All',
                    'value'=> $this->request->getQuery('catekey')
                ])?>
            </div>
        </div>
        <div class="flex-direction: row">
        <div style="width: 90%">
            <?= $this->Form->control('key',[
                'type'=>'select',
                'label'=>'Filter by Status',
                'options' => $status,
                'empty' => 'All',
                'value'=> $this->request->getQuery('key')
            ])?>
        </div>
    </div>
    <div class="flex-direction: row">
        <div style="width: 90%">
            <?= $this->Form->create(null,['type'=>'get']);?>
            <?= $this->Form->control('start_date',['class'=>'datepicker']);?>
        </div>
    </div>
        <div style="padding-top: 26px">
            <?= $this->Form->button('<i class="fas fa-filter"></i>', [
                'type' => 'submit',
                'escapeTitle' => false,
            ]);?>
        </div>
    </div>

    <div class="table-responsive" >
        <div>
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th style="padding-left: 2%" width="10%"><?= $this->Paginator->sort('Id') ?></th>
                    <th ><?= $this->Paginator->sort('description') ?></th>
                    <th ><?= $this->Paginator->sort('category_id') ?></th>
                    <th ><?= $this->Paginator->sort('status_id') ?></th>
                    <th ><?= $this->Paginator->sort('assign To') ?></th>
                    <th ><?= $this->Paginator->sort('Created Date') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $index = 0;?>
                <?php foreach ($tickets as  $index => $ticket): ?>
                    <tr>
                        <td style="padding-left: 1.5%">#TK<?= h($ticket->id) ?></td>
                        <td><?= h($ticket->answer) ?></td>
                        <td><?= $ticket->has('category') ? $this->Html->link($ticket->category->name, ['controller' => 'Categories', 'action' => 'view', $ticket->category->name]) : '' ?></td>
                        <td><?= $ticket->has('status') ? $this->Html->link($ticket->status->name, ['controller' => 'Status', 'action' => 'view', $ticket->status->id]) : '' ?>
                        <td><?= $ticket->has('staff') ? $this->Html->link($ticket->staff->staffName, ['controller' => 'Staffs', 'action' => 'view', $ticket->staff->id]) : '' ?>
                        </td>
                        <td><?= h($ticket->created) ?></td>
                    </tr>
                    <?php $index = $index+1;?>
                <?php endforeach;?>
               <h4>Total Ticket : <?= $index;?></h4>
            </table>
        </div>
        </div>
        <?=$this->Form->end()?>

    </div>

    <script>
        $(document).ready(function () {
            $(function () {
                $(".datepicker").datepicker({
                    'dateFormat' : 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "c-100:c+100",
                });
            });
        });
    </script>

