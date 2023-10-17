import ApexCharts from "apexcharts";

const jsonB = JSON.parse(document.getElementById("jsonB").value)

console.log(jsonB['data'])

var employeesData = jsonB['data']

var series = [];

        employeesData.forEach(function(employee) {
            var day = new Date(employee.cumpleaños).getDate() + 1; // dia cum
            var month = new Date(employee.cumpleaños).getMonth();
            
            // Crea una serie de datos para cada empleado
            var employeeSeries = {
                name: employee.nombre + ' ' + employee.apellidoP + ' ' + employee.apellidoM,
                data: [[new Date(new Date().getFullYear(), month, day).getTime(), 1]]
            };

            series.push(employeeSeries);
        });

        // Configuración del gráfico
        var options = {
            series: series,
            chart: {
                height: 350,
                type: 'scatter',
                zoom: {
                    type: 'xy'
                }
            },
            dataLabels: {
                enabled: false
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                },
            },
            xaxis: {
                type: 'datetime',
                labels: {
                    show: true,
                    format: 'dd MMM' // Formato para mostrar el día y mes
                }
            },
            yaxis: {
                max: 2 // Ajusta el rango máximo según tus necesidades
            }
        };

        // Crea el gráfico de ApexCharts
        var chart = new ApexCharts(document.querySelector("#birthdays"), options);
        chart.render();