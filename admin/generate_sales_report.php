<?php
require('../admin/classes/SalesReport.php');
require('../server/connection.php');

$report = new SalesReport($conn);
$report->generateReport();
?>
