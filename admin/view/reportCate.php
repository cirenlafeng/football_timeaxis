<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2017/1/23
 * Time: 下午5:09
 */

//print_format($action,'$action');
//print_format($data);
for ($i = 1; $i <= 100; $i++)
{
    if (!isset($cateInfo[$i])) $cateInfo[$i] = 'tag='.$i;
}

$datas = array();
foreach ($data as $value)
{
    $datas[$value['tag']][] = array('date'=>$value['date'],'count'=>$value['count']);
}
$dateList = getDatasDate($data);
$jsDate = '['.getJSFormatArray($dateList).']';
$jsData = '[';
foreach ($datas as $k => $value)
{
    $jsData = $jsData."{name:'{$cateInfo[$k]}',data:[".getJSFormatArray($value,'count','',$dateList).']},';
}
$jsData .= ']';

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
                series: <?php echo $jsData?>
            });
        });
    </script>
</main>