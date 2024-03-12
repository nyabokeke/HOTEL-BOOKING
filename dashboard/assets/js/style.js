$(document).ready(function () {
    var ctx = $('#myChart')[0].getContext('2d');
    
    // Initial chart data
    var initialData = {
        labels: ['Label 1', 'Label 2', 'Label 3'],
        datasets: [{
            label: 'Dataset Label',
            data: [10, 20, 30],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    };

    var myChart = new Chart(ctx, {
        type: 'line',
        data: initialData,
        options: {
            // Additional chart options
        }
    });

    // Function to update chart data
    function updateChartData() {
        // Replace this with your own logic to fetch updated data
        var newData = {
            labels: ['Label 1', 'Label 2', 'Label 3'],
            datasets: [{
                label: 'Dataset Label',
                data: [Math.random() * 100, Math.random() * 100, Math.random() * 100],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        };

        // Update chart data and redraw
        myChart.data = newData;
        myChart.update();
    }

    // Update chart every second
    setInterval(updateChartData, 1000);
});