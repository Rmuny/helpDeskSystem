<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ticket> $status
 * @var iterable<\App\Model\Entity\Ticket> $category
 * @var iterable<\App\Model\Entity\Ticket> $solution
 * @var iterable<\App\Model\Entity\Ticket> $ticket
 */
echo $this->Html->css('dashboardStyle');
$ticket = $ticket->toArray()[0];
?>
<h3 style="color: darkorange" class="pricing-box-container">Dashboard</h3>
<section style="width: 15%;">

</section>

<div class="gridContainer">
    <div class="item">
        <header>Tickets by Status
        <div class="float-end"><?= $this->Html->link(__('View detail') , ['controller'=>'Tickets','action' => 'index']) ?></div></header>
        <div class="pricing-box-container">
            <div class="pricing-box text-center">
                <div class="item1" style="width: 350px">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="item">
        <header>FAQs by Category
            <div class="float-end"><?= $this->Html->link(__('View detail') , ['controller'=>'Solutions','action' => 'index']) ?></div></header>

        </header>
        <div class="pricing-box-container">
            <div class="pricing-box text-center align-items-center">
                <div class="item1" style="width: 350px">
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="item">
        <header>Tickets by Category
            <div class="float-end"><?= $this->Html->link(__('View detail') , ['controller'=>'Tickets','action' => 'index']) ?></div></header>
        </header>
        <div class="pricing-box-container">
            <div class="pricing-box text-center">
                <div class="item1" style="width: 350px;">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="item">
    <header>Submited Tickets by Date

    </header>
    <div class="pricing-box-container">
        <div class="pricing-box text-center align-items-center">
            <div class="item1" style="width: 780px">
                <canvas id="myChart3"></canvas>
            </div>

        </div>
        <div style="padding-left: 40%">submited: <?= json_encode($ticket['all']);?><br>
            Solved:
        </div>
    </div>

</div>


<!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>-->
<!--Js-->
<!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>-->
<!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script>

<script>

    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?= json_encode($status[0]['open']); ?>, <?= json_encode($status[0]['assign']);?>, <?= json_encode($status[0]['inProgress']);?>, <?= json_encode($status[0]['resolve']);?>, <?= json_encode($status[0]['close']);?>],
                    backgroundColor: [
                        'rgb(159,0,0)',
                        'rgb(0,91,154)',
                        'rgb(53,121,0)',
                        'rgb(255,91,0)',
                        'rgb(150,0,110)',
                    ],
                    label: 'Dataset 1',

                    // borderWidth: 1
                }],
                label: '# of Votes',

                labels: ['Open', 'Assigned', 'In Progress', 'Resolve', 'Close'],

            },
            options: {
                plugins: {

                    datalabels: {
                        color: '#fff',
                    },
                    legend:{
                        position:'left'
                    }

                },
            }
        }

    );
    const ctx1 = document.getElementById('myChart1');
    new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['IT', 'Bank', 'School'],
                datasets: [{
                    label: '# of FAQs',
                    data: [<?= json_encode($solution[0]['bank']); ?>, <?= json_encode($solution[0]['it']); ?>, <?= json_encode($solution[0]['school']); ?>],
                    backgroundColor: [
                        'rgb(159,0,0)',
                        'rgb(0,91,154)',
                        'rgb(53,121,0)',
                    ]
                    // borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    datalabels: {
            //             // formatter: (value, ctx) => {
            //             //     let datasets = ctx.chart.data.datasets;
            //             //     if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
            //             //         let sum = datasets[0].data.reduce((a, b) => a + b, 0);
            //             //         let percentage = Math.round((value / sum) * 100) + '%';
            //             //         return percentage;
            //             //     } else {
            //             //         return percentage;
            //             //     }
            //             // },
                        color: '#fff',
                    }
                }
            }
        }
    );
    const ctx2 = document.getElementById('myChart2');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Bank', 'IT', 'School'],
            datasets: [{
                labels: ['Bank', 'IT', 'School'],
                label: '# Ticket By Category',
                data: [<?= json_encode($category[0]['bank']); ?>, <?= json_encode($category[0]['it']); ?>, <?= json_encode($category[0]['school']); ?>],
                backgroundColor: [
                    'green',
                    'blue',
                    'brown',],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    color: '#fff',
                }
            }
        }
    });

    const ctx3 = document.getElementById('myChart3');
    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Submited',
                data: [<?= json_encode($ticket['jan']);?>,<?= json_encode($ticket['feb']); ?>,<?= json_encode($ticket['mar']); ?>,<?= json_encode($ticket['apr']); ?>,
                    <?= json_encode($ticket['may']); ?>,<?= json_encode($ticket['jun']); ?>,<?= json_encode($ticket['jul']); ?>,
                    <?= json_encode($ticket['aug']); ?>,<?= json_encode($ticket['sep']); ?>,<?= json_encode($ticket['oct']); ?>,
                    <?= json_encode($ticket['nov']); ?>,<?= json_encode($ticket['dec']); ?>
                ],
                backgroundColor: [
                    'brown']
            },
                {
                label: 'Solved',
                data: [1, 2, 4, 5, 15, 4, 9, 5, 2, 6, 2, 1],
                backgroundColor: [
                    'blue',
                ]
            }]
        },

    });
</script>

