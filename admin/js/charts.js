
jQuery(document).ready(function( $ ) {
	
	var labels = incloud_jsondata.map(function(e) {
        return e.timestamp * 1000;
    });
    var datacache = incloud_jsondata.map(function(e) {
    return e.cache;
    });
    var datanocache = incloud_jsondata.map(function(e) {
        return e.nocache;
        });
    var databench = incloud_jsondata.map(function(e) {
        return e.benchtiming;
        });
    
    


    var ctx1 = canvas1.getContext('2d');
    var config1 = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Svartider på cachet indhold',
                data: datacache,
                backgroundColor: 'rgba(0, 119, 204, 0.3)'
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                }],
                yAxes: [{
                    ticks: {
                        suggestedMax: 5000,
                        beginAtZero: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Hastighed i ms - lavere er bedre.'
                    }
                }]
            },
            responsive: true,
            maintainAspectRatio: false
        }
    };

    var ctx2 = canvas2.getContext('2d');
    var config2 = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Svartider på ikke cachet indhold',
                data: datanocache,
                backgroundColor: 'rgba(217,4,41, 0.3)'
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                }],
                yAxes: [{
                    ticks: {
                        suggestedMax: 8000,
                        beginAtZero: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Hastighed i ms - lavere er bedre.'
                    }
                }]
            },
            responsive: true,
            maintainAspectRatio: false
        }
    };

    var ctx3 = canvas3.getContext('2d');
    var config3 = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Serverens hastighed ( en ren måling af serverens performance, med valgte php version )',
                data: databench,
                backgroundColor: 'rgba(83,141,34, 0.3)'
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                }],
                yAxes: [{
                    ticks: {
                        suggestedMax: 3,
                        beginAtZero: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Hastighed i sek - lavere er bedre.'
                    }
                }]
            },
            responsive: true,
            maintainAspectRatio: false
        }
    };
    

    var chart1 = new Chart(ctx1, config1);
    var chart2 = new Chart(ctx2, config2);
    var chart3 = new Chart(ctx3, config3);
	
});
