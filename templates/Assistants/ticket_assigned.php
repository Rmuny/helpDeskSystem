<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ticket> $tickets
 */

$this->Html->script('bootstrapModal',['block'=>true]);

?>
<div class="card-body">
    <!--        <div class="card-header">-->
        <h3 style="color: darkorange"><?= __('Tickets Assigned' ) ?></h3>


<!--            //search-->
<div class="card">


    <div class="table-responsive" >
        <div >
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th style="padding-left: 10px"><?= $this->Paginator->sort('No') ?></th>
                    <th width="8%"><?= $this->Paginator->sort('Id') ?></th>
                    <th width="40%"><?= $this->Paginator->sort('description') ?></th>
                    <th width="17%"><?= $this->Paginator->sort('status_id') ?></th>
                    <th width="15%"><?= $this->Paginator->sort('Assign To') ?></th>

                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tickets as  $index => $ticket): ?>
                    <tr>

                        <td style="padding-left: 1%">
                            <?php echo $index+1;?>
                        </td>
                        <td>#TK<?= h($ticket->id) ?></td>
                        <td><?= h($ticket->answer) ?></td>
                        <td>
                            <button>
                                <?= $ticket->has('status') ? $this->Html->link($ticket->status->name, ['controller' => 'Status', 'action' => 'view', $ticket->status->id]) : '' ?>
                            </button>
                        </td>
                        <td><?= $ticket->has('staff') ? $this->Html->link($ticket->staff->staffName, ['controller' => 'Staffs', 'action' => 'view', $ticket->staff->id]) : '' ?>
                        </td>

                        <td class="actions">
                            <?= $this->Html->link(
                                '<span class="fa fa-reply"></span>  Reply<span class="sr-only">' . __(' Reply') . '</span>',
                                ['action' => 'view', $ticket->id],
                                ['escape' => false, 'title' => __('Reply'), 'class'=>'btn text-white', 'style' => 'background-color: green']
                            ) ?>
                            <?= $this->Html->link(
                                '<span class="fa fa-edit"></span>  Edit<span class="sr-only">' . __(' Edit') . '</span>',
                                ['action' => 'edit', $ticket->id],
                                ['escape' => false, 'title' => __('Edit'), 'class'=>'btn text-white', 'style' => 'background-color: blue']
                            ) ?>




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


