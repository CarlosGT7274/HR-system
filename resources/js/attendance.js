import ApexCharts from "apexcharts";

export function attendance(jsonData, element) {
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
        "annotations": {},
        "chart": {
            "animations": {
                "enabled": false
            },
            "background": "",
            "foreColor": "#333",
            "fontFamily": "Roboto",
            "id": "Br0NO",
            
            "type": "area",
        
        },
        "plotOptions": {
            "bar": {
                "borderRadius": 10,
                "borderRadiusApplication": "end",
                "borderRadiusWhenStacked": "last",
                "hideZeroBarsWhenGrouped": false,
                "isDumbbell": false,
                "isFunnel": false,
                "isFunnel3d": true,
                "dataLabels": {
                    "total": {
                        "enabled": false,
                        "offsetX": 0,
                        "offsetY": 0,
                        "style": {
                            "color": "#373d3f",
                            "fontSize": "12px",
                            "fontWeight": 600
                        }
                    }
                }
            },
            "bubble": {
                "zScaling": true
            },
            "treemap": {
                "dataLabels": {
                    "format": "scale"
                }
            },
            "radialBar": {
                "hollow": {
                    "background": "#fff"
                },
                "dataLabels": {
                    "name": {},
                    "value": {},
                    "total": {}
                }
            },
            "pie": {
                "donut": {
                    "labels": {
                        "name": {},
                        "value": {},
                        "total": {}
                    }
                }
            }
        },
        "dataLabels": {
            "enabled": false,
            "style": {
                "fontWeight": 700
            }
        },
        "fill": {},
        "grid": {
            "padding": {
                "right": 25,
                "left": 15
            }
        },
        "legend": {
            "fontSize": 14,
            "offsetY": 0,
            "itemMargin": {
                "vertical": 0
            }
        },
        "markers": {
            "hover": {
                "sizeOffset": 6
            }
        },
        "series": chartData,
        
        "xaxis": {
            categories: dates,
            "labels": {
                "trim": true,
                "style": {}
            },
            "group": {
                "groups": [],
                "style": {
                    "colors": [],
                    "fontSize": "12px",
                    "fontWeight": 400,
                    "cssClass": ""
                }
            },
            "tickAmount": "dataPoints",
            "title": {
                "style": {
                    "fontWeight": 700
                }
            }
        },
        "yaxis": {
            "tickAmount": 5,
            "labels": {
                "style": {}
            },
            "title": {
                "style": {
                    "fontWeight": 700
                }
            }
        },
        "theme": {
            "palette": "palette4"
        }
    };

  
    // Crear el gráfico
    const chart = new ApexCharts(element, chartOptions);
  
    // Renderizar el gráfico
    chart.render();
  }
  
  // Llamada a la función con tus datos y el ID del elemento HTML
  




// var att = @json($attendance);

const att = document.getElementById("jsonatt")

const jsond = JSON.parse(att.value)


    
const chartElementId = "attendance";

const element = document.getElementById("attendance")


attendance(jsond, element);



 
  