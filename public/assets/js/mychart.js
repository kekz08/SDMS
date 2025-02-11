// Bar Chart Data
const barCtx = document.getElementById('barChart').getContext('2d');
const barChart = new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Applicants',
            data: [20, 30, 15, 25, 10, 35],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: 'black' // Y-axis label color
                }
            },
            x: {
                ticks: {
                    color: 'black' // X-axis label color
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: 'black' // Legend text color
                }
            },
            tooltip: {
                bodyColor: 'black', // Tooltip text color
            }
        }
    }
});


// Pie Chart Data
const pieCtx = document.getElementById('pieChart').getContext('2d');
const pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: ['Category 1', 'Category 2', 'Category 3', 'Category 4'],
        datasets: [{
            data: [32, 27, 23, 18],
            backgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0'
            ]
        }]
    },
    options: {
        plugins: {
            legend: {
                labels: {
                    color: 'black' // Legend text color
                }
            },
            tooltip: {
                bodyColor: 'black' // Tooltip text color
            }
        }
    }
});
