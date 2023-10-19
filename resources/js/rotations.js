import ApexCharts from "apexcharts";

const jsonRr = JSON.parse(document.getElementById("jsonR").value)

console.log(jsonRr)

const data = jsonRr;


const despidosPorPuesto = data.data.detalles.reduce((result, detalle) => {
  detalle.puestos.forEach((puesto) => {
    console.log(puesto)
    result[puesto.puesto] = (result[puesto.puesto] || 0) + puesto.total;
  });

  return result;
}, {});



console.log(Object.values(despidosPorPuesto));
  
  const despidosPorUnidad = data.data.detalles.map((detalle) => {
    const unidad = detalle.unidad;
    const puestos = detalle.puestos.length;

    return { unidad, puestos};
  });
  
  console.log(despidosPorUnidad);
  console.log(despidosPorUnidad.map((item) => item.unidad));

  const options = {
    chart: {
      type: "pie",
      width: "100%",
      animations: {
      enabled: true,
    },
  },
  labels: Object.keys(despidosPorPuesto),
    series: Object.values(despidosPorPuesto),
    title: {
      text: "Despidos por Puesto",
      align: "left",
    },
  };
  const chart = new ApexCharts(document.querySelector("#rotations"), options);
  chart.render();
  
  const option2 = {
    chart: {
      type: "pie",
      width: "100%",
      animations: {
        enabled: true,
      },
    },
    labels: despidosPorUnidad.map((item) => item.unidad),
    series: despidosPorUnidad.map((item) => item.puestos),
    title: {
      text: "Despidos por Unidad",
      align: "left"
    }
  }

  const chart2 = new ApexCharts(document.querySelector("#rotationsUnit"), option2);
  chart2.render();