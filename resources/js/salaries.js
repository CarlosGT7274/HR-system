import ApexCharts from "apexcharts";
 
const jsonS = JSON.parse(document.getElementById("jsonS").value)


// console.log(jsonS)
// console.log(jsonS["data"]["puestos"].map(puesto => puesto.puesto))
// console.log(jsonS["data"]["puestos"].map(puesto => puesto.salario))

      
// const options = {
//     series: [{
//         name: 'Salario',
//         data: jsonS["data"]["puestos"].map(puesto => puesto.salario),
//     }],
//     chart: {
//         type: 'bar'
//     },
//     xaxis: {
//         categories: jsonS["data"]["puestos"].map(puesto => puesto.puesto),
//     },
// };

// // Crear la gráfica
// const chart = new ApexCharts(document.querySelector("#salaries"), options);

// // Renderizar la gráfica
// chart.render();

  // Function to format the value
  function formatValue(value) {
    return value.toString();
  }

  // Create the chart
  const chartOptions = {
    options: {
        chart: {
          type: 'bar',
        },
        xaxis: {
          type: 'datetime',
          labels: {
            datetimeFormatter: {
              year: 'yyyy',
              month: 'MMM yy',
            },
          },
        },
        yaxis: {
          tickAmount: 5,
          labels: {
            formatter: function (value) {
              return formatValue(value);
            },
          },
          axisBorder: {
            show: false,
          },
          title: {
            text: 'Value',
          },
        },
      },
      series: [
        {
          name: 'Series 1',
          data: [
            [1609459200000, 12],
            [1612137600000, 15],
            [1614556800000, 8],
            // Add more data points here
          ],
        },
      ],
    theme: {
      mode: 'light', // Change to 'dark' for dark theme
    },
  };
  const chart = new ApexCharts(document.getElementById('#salaries2'), chartOptions);
  chart.render();

  // Update chart theme
  function updateChartTheme(theme) {
    chart.updateOptions({
      theme: {
        mode: theme,
      },
    });
  }

  // Function to update chart data
  function updateChartData() {
    const newData = [
      // Update data here
    ];
    chart.updateSeries([
      {
        data: newData,
      },
    ]);
  }

//   // Add event listeners for theme and data updates
//   const darkModeButton = document.getElementById('toggleDarkMode');
//   darkModeButton.addEventListener('click', () => {
//     const newTheme = chartOptions.theme.mode === 'light' ? 'dark' : 'light';
//     updateChartTheme(newTheme);
//   });

//   const updateDataButton = document.getElementById('updateData');
//   updateDataButton.addEventListener('click', () => {
//     updateChartData();
//   });