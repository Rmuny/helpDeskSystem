    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
    type: 'doughnut',
    data: {
    labels: ['Open', 'Assigned', 'In Progress', 'Resolve','Close'],
    datasets: [{
    label: '# of Votes',
    data: [20, 19, 9, 10, 8],
    backgroundColor: [
    'rgb(159,0,0)',
    'rgb(0,91,154)',
    'rgb(53,121,0)',
    'rgb(255,91,0)',
    'rgb(150,0,110)',
    ]
    // borderWidth: 1
}],
},
    options: {
    responsive: true,
    labels:{
    position: 'bottom'
},
    plugins: {
    color: '#fff',
    anchor: 'end',
    align: 'start',
    offset: -10,
    borderColor: '#fff',
    borderRadius: 25,
    backgroundColor: (context)=> {
    return context.dataset.backgroundColor;
}

}
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
    data: [5, 10, 20],
    backgroundColor: [
    'rgb(159,0,0)',
    'rgb(0,91,154)',
    'rgb(53,121,0)',

    ]
    // borderWidth: 1
}],
},
    options: {
    responsive: true,
    labels:{
    position: 'bottom'
},
    plugins: {
    color: '#fff',
    anchor: 'end',
    align: 'start',
    offset: -10,
    borderColor: '#812a2a',
    borderRadius: 25,
    backgroundColor: (context)=> {
    return context.dataset.backgroundColor;
}
}
}
}
    );

    const ctx2 = document.getElementById('myChart2');
    new Chart(ctx2, {
    type: 'bar',
    data: {
    labels: ['IT','Bank','School'],
    datasets: [{
    label: '# Ticket By Category',
    data: [12, 19, 3],

    borderWidth: 1
}]
},
    options: {
    scales: {
    y: {
    beginAtZero: true
}
}
}
});

    const ctx3 = document.getElementById('myChart3');
    new Chart(ctx3, {
    type: 'bar',
    data: {
    labels: ['Jan', 'Feb', 'March', 'Apr', 'May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    datasets: [{
    label: '# of Submit Ticket',
    data: [92, 50, 39, 55, 25,130, 80, 38, 32, 26,12, 100],
    borderWidth: 1
}]
},
    options: {
    scales: {
    y: {
    beginAtZero: true
}
}
}
});

