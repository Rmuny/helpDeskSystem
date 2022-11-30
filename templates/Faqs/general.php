<?php
/**
 * @var \App\View\AppView $this
 * @var  \App\Model\Entity\Solution $solutions
 * @var  \App\Model\Entity\Solution $category

 *
 */
echo $this->Html->css('faqStyle');

?>
<div class="containerFluid">
    <img class="faq" style="width: 200px; height: 200px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThTO0dGKn3DyNDnQbb1uSFJXHZuPyU808wFThx8JAYWi8yv_W34GmgpzKXnUbpeNnFljg&usqp=CAU">

    <h2 style="text-align: center">Top Frequently Asked Questions(FAQs)</h2>
    <h6 STYLE="text-align: center">ACTIVECAMPAIGN COMMON FAQS</h6>

    <?= $this->Form->create(null,['type'=>'get'])?>
    <div class="flex-direction: row">
        <div style="width: 90%">
            <?= $this->Form->control('key1',[
                'type'=>'select',
                'label'=>'Select a category',
                'options' => $category,
                'value'=> $this->request->getQuery('key1')
            ])?>
        </div>
        <div style="padding-top: 26px">
            <?= $this->Form->button('<i class="fas fa-filter"></i>', [
                'type' => 'submit',
                'escapeTitle' => false,
            ]);?>
        </div>
    </div>



    <?php foreach ($solutions as $index =>$solution) : ?>

        <div class="accordion"style="border: 2px solid green; border-radius: 4rem">
            <div class="icon"></div>

            <h5><?= h($solution->title) ?></h5>
        </div>
        <div class="panel">
            <h6>
                <?= h($solution->content) ?>
            </h6>
        </div>
    <?php endforeach; $index++?>
</div>

<footer class="bg-light text-center text-lg-start ">
    <!-- Copyright -->
    <div class="text-center p-3 " style="background-color: rgba(0,0,0,0.07);">
        © 2022 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/">Help Desk | Created by Rathmuny</a>
    </div>
    <!-- Copyright -->
</footer>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    var len = acc.length;
    for (i = 0; i < len; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }


    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".dropdown-menu li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
