<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafica de Categorias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.0.1/css/highcharts.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Gráfica de Categorías</h2>
            <div id="graficaCategorias" style="height: 400px;"></div>
        </div>
    </div>
</div>

<script>
    var categorias = {!! $categorias !!};

    var chart = Highcharts.chart('graficaCategorias', {
        chart: {
            type: 'bar',
            style: {
                fontFamily: 'Arial, sans-serif'
            }
        },
        title: {
            text: 'Número de Productos por Categoría',
            style: {
                fontSize: '18px'
            }
        },
        xAxis: {
            categories: categorias.map(c => c.nombre),
            title: {
                text: null
            },
            labels: {
                style: {
                    fontSize: '14px'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Número de Productos',
                align: 'high',
                style: {
                    fontSize: '14px'
                }
            },
            labels: {
                overflow: 'justify',
                style: {
                    fontSize: '12px'
                }
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '12px'
                    }
                }
            }
        },
        series: [{
            name: 'Número de Productos',
            data: categorias.map(c => c.productos_count),
            color: '#4CAF50' // Green color
        }],
        credits: {
            enabled: false
        },
        exporting: {
            enabled: true,
            buttons: {
                contextButton: {
                    menuItems: ["downloadPNG", "downloadJPEG", "downloadPDF", "downloadSVG"]
                }
            }
        }
    });
</script>

</body>
</html>