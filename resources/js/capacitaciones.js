import ApexCharts from "apexcharts"; 
const Gdata = document.getElementById("jsonCa").value
const dataG = JSON.parse(Gdata)
console.log(dataG["data"]["capacitaciones"])

const porcentajeTomadas = dataG.data.capacitaciones;
const porcentajeNoTomadas = 100 - porcentajeTomadas;

        var options = {
            series: [porcentajeTomadas, porcentajeNoTomadas],
            chart: {
            type: 'donut',
          },
          labels: ['Si ', 'No Tomadas'],
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
          }],
          title: {
            text: "Capacitaciones",
            align: "left",
          },
          };
  
          var chart = new ApexCharts(document.querySelector("#capacitaciones"), options);
          chart.render();
        