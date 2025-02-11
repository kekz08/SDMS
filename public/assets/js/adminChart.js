// Applicants per Department (Bar Chart)
const departmentCtx = document.getElementById('departmentChart').getContext('2d');
const departmentChart = new Chart(departmentCtx, {
    type: 'bar',
    data: {
        labels: ['CET', 'COT', 'CAS', 'CTE'],
        datasets: [{
            label: 'Applicants',
            data: [56, 35, 23, 50],
            backgroundColor: ['#7FFFD4', '#9370DB', '#7FFF00', '#FF69B4'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: 'black' // Y-axis labels in black
                }
            },
            x: {
                ticks: {
                    color: 'black' // X-axis labels in black
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: 'black' // Legend text in black
                }
            },
            tooltip: {
                titleColor: 'black', // Tooltip title in black
                bodyColor: 'black' // Tooltip body text in black
            }
        }
    }
});

// Applicants per Municipality (Bar Chart)
const municipalityCtx = document.getElementById('municipalityChart').getContext('2d');
const municipalityChart = new Chart(municipalityCtx, {
    type: 'bar',
    data: {
        labels: ['Bacuag', 'Placer', 'Sison', 'San Francisco', 'Malimono', 'Surigao City'],
        datasets: [{
            label: 'Applicants',
            data: [40, 61, 54, 14, 11, 93],
            backgroundColor: ['#4682B4', '#00CED1', '#20B2AA', '#FF8C00', '#CD5C5C', '#8A2BE2'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: 'black' // Y-axis labels in black
                }
            },
            x: {
                ticks: {
                    color: 'black' // X-axis labels in black
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: 'black' // Legend text in black
                }
            },
            tooltip: {
                titleColor: 'black', // Tooltip title in black
                bodyColor: 'black' // Tooltip body text in black
            }
        }
    }
});

// Application Status Breakdown (Pie Chart)
const statusPieCtx = document.getElementById('statusPieChart').getContext('2d');
const statusPieChart = new Chart(statusPieCtx, {
    type: 'pie',
    data: {
        labels: ['Pending', 'Approved', 'Rejected'],
        datasets: [{
            data: [50, 30, 20],
            backgroundColor: ['#FFCE56', '#36A2EB', '#FF6384'],
            hoverOffset: 4
        }]
    },
    options: {
        plugins: {
            legend: {
                labels: {
                    color: 'black' // Legend text in black
                }
            },
            tooltip: {
                titleColor: 'black', // Tooltip title in black
                bodyColor: 'black' // Tooltip body text in black
            }
        }
    }
});
