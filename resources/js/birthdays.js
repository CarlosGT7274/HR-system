import ApexCharts from "apexcharts";

const jsonB = JSON.parse(document.getElementById("jsonB").value)

console.log(jsonB)

const employeeData = [
    {
        "nombre": "Mr.",
        "apellidoP": "Empleado",
        "apellidoM": "1",
        "unidad": "Food Truck",
        "puesto": "Administrador general",
        "cumpleaños": "1998-08-05",
        "telefono": "1234567890",
        "email": "algo@nada.com"
    },
    {
        "nombre": "Mr. ",
        "apellidoP": "Empleado",
        "apellidoM": "3",
        "unidad": "Restaurante",
        "puesto": "Mesero",
        "cumpleaños": "1994-08-23",
        "telefono": "6789012345",
        "email": "nada@otro.com"
    }
];

const month = 8; // Agosto
const birthdaysByDay = Array(31).fill(0); // Suponemos un mes de 31 días.

employeeData.forEach((employee) => {
    const birthday = new Date(employee.cumpleaños);
    if (birthday.getMonth() + 1 === month) {
        const day = birthday.getDate();
        birthdaysByDay[day - 1]++;
    }
});

const options = {
    series: [ {
        name: "Cumpleaños",
        data: birthdaysByDay,
    }],
    chart: {
        type: "bar"
    },
    xaxis: {
        categories: Array.from({ length: 31 }, (_, i) => (i + 1).toString()),
    },
};



const chart = new ApexCharts(document.querySelector("#birthdays"), options);
chart.render();