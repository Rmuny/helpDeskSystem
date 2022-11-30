<?php
/**
 * @var \App\View\AppView $this
 * @var  \App\Model\Entity\Solution $solutions
 * @var  \App\Model\Entity\Solution $categories

 *
 */
echo $this->Html->css('faqStyle');

?>
<div class="containerFluid">
    <img class="faq" style="width: 200px; height: 200px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThTO0dGKn3DyNDnQbb1uSFJXHZuPyU808wFThx8JAYWi8yv_W34GmgpzKXnUbpeNnFljg&usqp=CAU">

    <h2 style="text-align: center">Frequently Asked Questions(FAQs)</h2>
    <h6 STYLE="text-align: center">ACTIVECAMPAIGN COMMON FAQS</h6>

    <div class="dropdown">
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <li><a href="#">HTML</a></li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">JavaScript</a></li>
            <li><a href="#">jQuery</a></li>
            <li><a href="#">Bootstrap</a></li>
            <li><a href="#">Angular</a></li>
        </ul>
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
