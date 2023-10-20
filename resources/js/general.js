
import ApexCharts from "apexcharts";

const Gdata = document.getElementById("jsonG").value
const dataG = JSON.parse(Gdata)

// console.log(Object.values(dataG['data']))
// console.log(dataG)
var options = {
  series: [{
    name: 'Hombres',
    data: Object.values(dataG['data']['hombres']['edades'])
  },
  {
    name: 'Mujeres',
    data: Object.values(dataG['data']['mujeres']['edades'])
  }
  ],
  chart: {
  type: 'bar',
  stacked: true
},
plotOptions: {
  bar: {
      horizontal: false,
      stacked: true,
  },
},
yaxis: {
  labels: {
    formatter: function (val) {
        return Math.round(val);
    },
},
},
xaxis: {
  // type: 'datetime',
  categories: Object.keys(dataG['data']['hombres']['edades']),
  labels: {
    rotate: -90
  }
},
title: {
  text: "Edades"
}
};

  

  var chart = new ApexCharts(document.querySelector("#general"), options);
  chart.render();


  console.log('hijos', dataG['data']['hombres']['con_hijos'])

  console.log('sin hijos', dataG['data']['hombres']['total'] - dataG['data']['hombres']['con_hijos'])

  var options = {
    series: [{
    name: 'mujeres',
    data: [dataG['data']['mujeres']['con_hijos'], dataG['data']['mujeres']['total'] - dataG['data']['mujeres']['con_hijos']]
  }, {
    name: 'hombres',
    data: [dataG['data']['hombres']['con_hijos'], dataG['data']['hombres']['total'] - dataG['data']['hombres']['con_hijos']]
  }],
    chart: {
    type: 'bar',
    stacked: true,
  },
  plotOptions: {
    bar: {
      horizontal: true,
      dataLabels: {
        total: {
          enabled: true,
          offsetX: 0,
          style: {
            fontSize: '13px',
            fontWeight: 900
          }
        }
      }
    },
  },
  stroke: {
    width: 1,
    colors: ['#fff']
  },
  title: {
    text: 'Trabajadores con hijos'
  },
  xaxis: {
    categories: ['si', 'no'],
    
  },
  yaxis: {
    title: {
      text: undefined
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return val + "K"
      }
    }
  },
  fill: {
    opacity: 1
  },
  legend: {
    position: 'top',
    horizontalAlign: 'left',
    offsetX: 40
  }
  };

  var chart = new ApexCharts(document.querySelector("#childs"), options);
  chart.render();