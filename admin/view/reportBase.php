<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2017/1/22
 * Time: 上午9:41
 */


$jsDate = '['.getJSFormatArray($data).']';
$jsData = '['.getJSFormatArray($data,'count','').']';

//print_format($action,'$action');
//print_format($data,'$data');
//print_format($jsDate,'$jsDate');
//print_format($jsData,'$jsData');
?>
<main>

    <div id="container"></div>
    <script>
        $(function () {
            $('#container').highcharts({
                title: {
                    text: <?php echo $title?>,
                    x: -20 //center
                },
                subtitle: {
                    text: <?php echo $subtitle?>,
                    x: -20
                },
                xAxis: {
                    categories: <?php echo $jsDate?>
                },
                yAxis: {
                    title: {
                        text: '成功采集数量'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: ''
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: '新闻采集条数',
                    data: <?php echo $jsData?>
                }]
            });
        });
    </script>
</main>

