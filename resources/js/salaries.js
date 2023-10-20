import ApexCharts from "apexcharts";
 
const jsonS = JSON.parse(document.getElementById("jsonS").value)


// console.log(jsonS)
// console.log(jsonS["data"]["puestos"].map(puesto => puesto.puesto))
// console.log(jsonS["data"]["puestos"].map(puesto => puesto.salario))

      
const options = {
    series: [{
        name: 'Salario',
        data: jsonS["data"]["puestos"].map(puesto => puesto.salario),
    }],
    chart: {
        type: 'bar'
    },
    xaxis: {
        categories: jsonS["data"]["puestos"].map(puesto => puesto.puesto),
    },
};

// Crear la gráfica
const chart = new ApexCharts(document.querySelector("#salaries"), options);

// Renderizar la gráfica
chart.render();
