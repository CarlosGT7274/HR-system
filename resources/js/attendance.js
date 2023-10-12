
import ApexCharts from "apexcharts";

// Define la configuración del gráfico
const chartOptions =     {
        "annotations": {},
        "chart": {
            "animations": {
                "enabled": false
            },
            "background": "#fff",
            "foreColor": "#373D3F",
            "fontFamily": "Roboto",
            "height": 250,
            "id": "NdbDw",
            "stacked": true,
            "stackType": "100%",
            "toolbar": {
                "show": false,
                "tools": {
                    "selection": true,
                    "zoom": true,
                    "zoomin": true,
                    "zoomout": true,
                    "pan": true,
                    "reset": true
                }
            },
            "type": "area",
            "width": 480
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
                "right": 36,
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
        "series": [
            {
                "name": "Area 1",
                "data": [
                    {
                        "x": "Category 1",
                        "y": 31
                    },
                    {
                        "x": "Category 2",
                        "y": 40
                    },
                    {
                        "x": "Category 3",
                        "y": 28
                    },
                    {
                        "x": "Category 4",
                        "y": 51
                    },
                    {
                        "x": "Category 5",
                        "y": 42
                    }
                ]
            },
            {
                "name": "Area 2",
                "data": [
                    {
                        "x": "Category 1",
                        "y": 20
                    },
                    {
                        "x": "Category 2",
                        "y": 32
                    },
                    {
                        "x": "Category 3",
                        "y": 38
                    },
                    {
                        "x": "Category 4",
                        "y": 22
                    },
                    {
                        "x": "Category 5",
                        "y": 56
                    }
                ]
            }
        ],
        "stroke": {
            "width": 4,
            "fill": {
                "type": "solid",
                "opacity": 0.85,
                "gradient": {
                    "shade": "light",
                    "type": "vertical",
                    "shadeIntensity": 0.5,
                    "inverseColors": false,
                    "opacityFrom": 0.65,
                    "opacityTo": 0.5,
                    "stops": [
                        0,
                        100,
                        100
                    ],
                    "colorStops": []
                }
            }
        },
        "xaxis": {
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
            "tickAmount": 2,
            "title": {
                "style": {
                    "fontWeight": 700
                }
            }
        },
        "yaxis": {
            "max": 100,
            "min": 0,
            "labels": {
                "style": {
                    "colors": [
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null
                    ]
                }
            }
        },
        "theme": {
            "palette": "palette4"
        }
    };

const chart = new ApexCharts(document.querySelector("#attendance"), chartOptions);

chart.render();


