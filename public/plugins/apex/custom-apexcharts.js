

var donutOptionSaudeMental = {
    chart: {
        height: 350,
        type: 'donut',
        toolbar: {
            show: false,
        }
    },
    // colors: ['#1b55e2', '#888ea8', '#acb0c3', '#d3d3d3'],
    series: [44, 55, 41, 17],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
}

var donutSaudeMental = new ApexCharts(
    document.querySelector("#donutSaudeMental"),
    donutOptionSaudeMental
);

donutSaudeMental.render();


function setDataDonutSaudeCronica(){
    var donutOptionSaudeCronica = {
        chart: {
            height: 350,
            type: 'donut',
            toolbar: {
                show: false,
            }
        },
        // colors: ['#1b55e2', '#888ea8', '#acb0c3', '#d3d3d3'],
        series: [44, 55, 41, 17],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    var donutSaudeCronica = new ApexCharts(
        document.querySelector("#donutSaudeCronica"),
        donutOptionSaudeCronica
    );
    donutSaudeCronica.render();
}
