
import ApexCharts from "apexcharts";

const Gdata= document.getElementById("jsonG").value
const dataG = JSON.parse(Gdata)

console.log(Object.values(dataG['data']['4']))

var options = {
    series: [{
    name: 'Males',
    data: Object.values(dataG['data']['hombres']['edades'])
  },
  {
    name: 'Females',
    data: Object.values(dataG['data']['mujeres']['edades']).map(value => -value)
  }
  ],
    chart: {
    type: 'bar',
    height: 440,
    stacked: true
  },
  colors: ['#008FFB', '#FF4560'],
  plotOptions: {
    bar: {
      horizontal: true,
      barHeight: '80%',
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: 1,
    colors: ["#fff"]
  },
  
  grid: {
    xaxis: {
      lines: {
        show: false
      }
    }
  },
  yaxis: {
    min: -5,
    max: 5,
    title: {
      // text: 'Age',
    },
  },
  tooltip: {
    shared: false,
    x: {
      formatter: function (val) {
        return val
      }
    },
    y: {
      formatter: function (val) {
        return Math.abs(val) + "%"
      }
    }
  },
  title: {
        floating: false,
        text: 'Grafica General',
        align: 'left',
        style: {
          fontSize: '18px'
        }
      },
  xaxis: {
    categories: Object.keys(dataG['data']['hombres']['edades']),
    title: {
      text: 'Percent'
    },
    labels: {
      formatter: function (val) {
        return Math.abs(Math.round(val)) + "%"
      }
    }
  },
  subtitle: {
    text: 'total: ' + ' Capacitaciones: ' ,
    align: 'center',
    margin: 30,
    offsetY: 40,
    style: {
      color: '#222',
      fontSize: '24px',
    }
  }
  };

  var chart = new ApexCharts(document.querySelector("#general"), options);
  chart.render();

