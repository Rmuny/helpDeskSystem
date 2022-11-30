<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reply> $replies
 * @var \App\Model\Entity\Ticket $ticket
 * @var App\Controller\AppController $login
 * @var \App\Model\Entity\Staff $submitBy
 * @property Cake\ORM\ResultSet::$ticket
 *
 *
 */
echo $this->Html->css('replyStyle');
echo $this->Html->Script('replyJs');
?>

<div class="card">
    <!--            -->
    <div class="card-body" >
        <h3 style="color:darkorange;" class="card-title">Reply</h3>
        <?php echo "Ticket : " . $ticket->answer ?><br>
        <?php echo "Submit by : ".$submitBy->staffName ?><br>
        <?php echo "Assign to : ".$ticket->staff->staffName ?><br>
        <?php echo "Submit on : ".$ticket->created ?><br>

    </div>
    <?php if (count($replies) == null):?>
    <?php else:?>
    <?php foreach ($replies as $reply):?>
        <div class="comment-widgets m-b-20 float-end">
            <div class="d-flex flex-row comment-row">
                <div style="padding-right: 15px"><span class="round">
                        <?= $this->Html->image($reply->staff->profileImage)?>
                    </span>
                </div>
                <div class="comment-text w-100">

                    <h6 style="color:#797979;"><?= $reply->staff->staffName ?><span style="color: rgba(105,105,105,0.66)" class="date">    <?= $reply->created ?></span></h6>
                    <div class="comment-footer">
                    </div>
                    <p class="m-b-5 m-t-10" style="font-size: 17px">

                        <?= $reply->message ?>
                    </p>
                </div>
            </div>

        </div>
    <?php endforeach;?>
    <?php endif;?>
    <div >
        <?= $this->Form->create($replies) ?>
        <div style="padding: 10px 10px">
            <?php
            echo $this->Form->control('message',[
                'type'=>'textarea',
                'placeholder'=>'Enter a message ...',
//                'value '=>false
            ]);
            ?>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    </div>
