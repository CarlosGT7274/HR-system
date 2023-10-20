import ApexCharts from "apexcharts";


const jsonData = JSON.parse(document.getElementById("jsonatt").value);
// console.log(jsonData)
const chartElementId = "attendance";
const element = document.getElementById(chartElementId);

// Extraer las fechas y datos de asistencias y faltas
const dates = Object.keys(jsonData.data.dates);
const asistenciasData = dates.map(date => jsonData.data.dates[date].asistencias);
const faltasData = dates.map(date => jsonData.data.dates[date].faltas);

// Crear un nuevo conjunto de datos para ApexCharts
const chartData = [
  {
    name: "Asistencias",
    data: asistenciasData,
  },
  {
    name: "Faltas",
    data: faltasData,
  },
];

// Configuración del gráfico
const chartOptions = {
  chart: {
    type: "area",
  foreColor: "#333",
  fontFamily: "Roboto",
  id: "Br0NO",
  animations: {
    enabled: false,
  },
  background: "",
},
plotOptions: {
    bar: {
      borderRadius: 10,
      borderRadiusApplication: "end",
      borderRadiusWhenStacked: "last",
      hideZeroBarsWhenGrouped: false,
      isDumbbell: false,
      isFunnel: false,
      isFunnel3d: true,
      dataLabels: {
        total: {
          enabled: false,
          offsetX: 0,
          offsetY: 0,
          style: {
            color: "#373d3f",
            fontSize: "12px",
            fontWeight: 600,
          },
        },
      },
    },
    // Resto de opciones de plotOptions aquí
  },
  dataLabels: {
    enabled: false,
    style: {
      fontWeight: 700,
    },
  },
  fill: {},
  grid: {
    padding: {
      right: 25,
      left: 15,
    },
  },
  legend: {
    fontSize: 14,
    offsetY: 0,
    itemMargin: {
      vertical: 0,
    },
  },
  markers: {
    hover: {
      sizeOffset: 6,
    },
  },
  series: chartData,
  xaxis: {
    categories: dates,
  },
  yaxis: {
    tickAmount: 5,
    labels: {
      formatter: function (val) {
          return Math.round(val);
      },
  },
  },
  theme: {
    palette: "palette4",
  },
};

// Crear el gráfico
const chart = new ApexCharts(element, chartOptions);

// Renderizar el gráfico
chart.render();