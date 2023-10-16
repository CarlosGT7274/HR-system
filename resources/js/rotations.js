import ApexCharts from "apexcharts";

const jsonRr = JSON.parse(document.getElementById("jsonR").value)

console.log(jsonRr)


// Datos proporcionados
const data = {
    "error": false,
    "mensaje": "",
    "data": {
      "hombres": 2,
      "mujeres": 1,
      "total": 3,
      "detalles": [
        {
          "unidad": 2,
          "puestos": [
            {
              "total": 1,
              "puesto": "Administrador general"
            }
          ],
          "motivos": [
            {
              "total": 1,
              "motivo": null
            }
          ]
        },
        {
          "unidad": 1,
          "puestos": [
            {
              "total": 1,
              "puesto": "Cocinero"
            },
            {
              "total": 1,
              "puesto": 3
            }
          ],
          "motivos": [
            {
              "total": 2,
              "motivo": null
            }
          ]
        }
      ]
    }
  };
  
  // Procesa los datos para obtener el nombre del puesto y el total de despidos
  const detalles = data.data.detalles;
  const despidosPorPuesto = [];
  
  detalles.forEach((detalle) => {
    detalle.puestos.forEach((puesto) => {
      const nombrePuesto = puesto.puesto;
      const totalDespidos = puesto.total;
      despidosPorPuesto.push({ nombrePuesto, totalDespidos });
    });
  });
  
  // Prepara los datos para el gráfico de pastel
  const nombresPuestos = despidosPorPuesto.map((item) => item.nombrePuesto);
  const totalesDespidos = despidosPorPuesto.map((item) => item.totalDespidos);
  
  // Crea el gráfico de pastel con ApexCharts
  const options = {
    chart: {
      type: "pie",
    height: 350,
    width: "100%",
    animations: {
      enabled: true,
    },
  },
  labels: nombresPuestos,
    series: totalesDespidos,
    title: {
      text: "Despidos por Puesto",
      align: "center",
    },
  };
  const chart = new ApexCharts(document.querySelector("#rotations"), options);
  chart.render();
  