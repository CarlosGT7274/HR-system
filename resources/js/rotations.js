import ApexCharts from "apexcharts";

const jsonRr = JSON.parse(document.getElementById("jsonR").value);


const data = jsonRr;

const categories = [];
const seriesData = {};

const motivosCats = [];
const motivosSeries = [];

const temp_array = []

data.data.detalles.forEach((unidad, i) => {
    
    motivosSeries.push({
        name: unidad.unidad, 
        data: structuredClone(temp_array)
    })

    unidad.motivos.forEach((motivo)=> {
        if(motivo.motivo == null){
            motivo.motivo = "Sin motivo"
        }

        const pos = motivosCats.indexOf(motivo.motivo)

        if (pos === -1) {
            motivosCats.push(motivo.motivo);
            temp_array.push(0)
            motivosSeries[i].data.push(motivo.total);
        }
        else {
            motivosSeries[i].data[pos] = motivo.total;
        }

    })
    unidad.puestos.forEach((puesto) => {
        if (!categories.includes(puesto.puesto)) {
            categories.push(puesto.puesto);
        }
        if (!seriesData[unidad.unidad]) {
            seriesData[unidad.unidad] = [];
        }
        seriesData[unidad.unidad].push(puesto.total);
    });
});

const options = {
    chart: {
        type: "bar",
        stacked: true,
    },
    xaxis: {
        categories: categories,
    },
    yaxis: {
        labels: {
            formatter: function (val) {
                return Math.round(val);
            },
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            stacked: true,
        },
    },
    legend: {
        position: "top",
    },
    series: Object.keys(seriesData).map((unidad) => ({
        name: unidad,
        data: seriesData[unidad],
    })),
    theme: {
        palette: "palette4",
    }
};

const chart = new ApexCharts(document.querySelector("#rotations"), options);
chart.render();



const despidosPorUnidad = data.data.detalles.map((detalle) => {
  const unidad = detalle.unidad;
  const puestos = detalle.puestos.length;

  return { unidad, puestos };
})

const option2 = {
    chart: {
        type: "bar",
        width: "100%",
        animations: {
            enabled: true,
        },
    },
    xaxis: {
      categories: despidosPorUnidad.map((item) => item.unidad),
    },
    yaxis: {
        labels: {
        formatter: function (val) {
            return Math.round(val);
        },
    },
    },
    series: [{
      data: despidosPorUnidad.map((item) => item.puestos),
    }]
};



const chart2 = new ApexCharts(
    document.querySelector("#rotationsUnit"),
    option2
);
chart2.render();

function crearGraficoDonut(id, labels, series) {
    var optionsf = {
      series: series,
      chart: {
        type: 'donut',
      },
      labels: labels,
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
    };
  
    var chartf = new ApexCharts(document.querySelector(`#${id}`), optionsf);
    chartf.render();
  }

  crearGraficoDonut('firmas', ['Si', 'No'], [data.data.firmas, 100 - data.data.firmas])
  crearGraficoDonut('finiquitos', ['Si', 'No'], [data.data.finiquitos, 100 - data.data.finiquitos])
  crearGraficoDonut('entrevistas', ['Si', 'No'], [data.data.entrevistas, 100 - data.data.entrevistas])
  crearGraficoDonut('recontratables', ['Si', 'No'], [data.data.recontratables, 100 - data.data.recontratables])
  
  const optionsM = {
      chart: {
        type: "bar",
        stacked: true,
    },
    xaxis: {
        categories: motivosCats,
    },
    yaxis: {
        labels: {
            formatter: function (val) {
                return Math.round(val);
            },
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            stacked: true,
        },
    },
    legend: {
        position: "top",
    },
    series: motivosSeries,
    theme: {
        palette: "palette4",
    }
};

const chartM = new ApexCharts(document.querySelector("#rotationsM"), optionsM);
chartM.render();