<?
header("Content-type: application/vnd.ms-excel");
header("Content-type: application/x-download");
header("Content-Disposition: attachment; filename=\"export_".date('d')."-".date('m')."-".date('Y').".xls\"");
?>