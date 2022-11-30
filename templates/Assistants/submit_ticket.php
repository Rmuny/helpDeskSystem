<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 * @var \App\Model\Entity\Staff $staff
 * @var App\Controller\AppController $login
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 *
 */
echo $this->Html->css('ticket_form');
echo $this->Html->script('ticket_form');
?>
<div class="main">
    <div class="bio"><img class="profile-img" src="https://uploads-ssl.webflow.com/5cf3e7809af39994979ded15/5f52ebfcc84b87ad65d6ffd2_Square%20Illustration%20Chart%20Gantt-min-min.png"/>
        <h3 class="header">HelpDesk System</h3>
        <p>HelpDesk help you to solve all of your problem everywhere and everytime...</p><a class="bio-link" href="http://localhost:8765/faqs/submitedTicket">Submitted ticket<i class="fa fa-twitter"></i></a>
    </div>
    <?= $this->Form->create($ticket) ?>

    <div class="contact">
        <form id="form">

            <legend class="header">Submit your problem here</legend>

            <?= $this->Form->control('category_id', ['options' => $categories,'class' => 'form-control-lg','label'=>'Company: ']);?>


            <?= $this->Form->control('answer', [
                'label'=>'Description: ',
                'class' => 'form-control',
                'type'=>'textarea',
                'placeholder'=>'Drop your problem here..'])
            ;?>

                <?= $this->Form->button(__('Submit')); ?>
                <?= $this->Form->end() ?>

        </form>
    </div>
</div>

