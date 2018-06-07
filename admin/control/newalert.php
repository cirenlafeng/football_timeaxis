<?php
/**
 * Created by Sublime Text.
 * User: Sean.cai
 * Date: 20170308
 */


$time = strtotime(date('Y-m-d'));
$rowList = $dbo->loadAssocList("SELECT * FROM alert_log WHERE add_time >= {$time}");
