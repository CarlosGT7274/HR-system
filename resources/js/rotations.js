import ApexCharts from "apexcharts";

const jsonRr = JSON.parse(document.getElementById("jsonR").value);

// console.log(jsonRr);

const data = jsonRr;

const categories = [];
const seriesData = [];

data.data.detalles.forEach((unidad) => {
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

// console.log(series);

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
    },
    title: {
        text: "Despidos por puesto",
    },
};

const chart = new ApexCharts(document.querySelector("#rotations"), options);
chart.render();

const despidosPorUnidad = data.data.detalles.map((detalle) => {
  const unidad = detalle.unidad;
  const puestos = detalle.puestos.length;

  return { unidad, puestos };
});

// console.log(despidosPorUnidad);
// console.log(despidosPorUnidad.map((item) => item.unidad));

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
    }],
    title: {
        text: "Despidos por Unidad",
        align: "left",
    },
};



const chart2 = new ApexCharts(
    document.querySelector("#rotationsUnit"),
    option2
);
chart2.render();
