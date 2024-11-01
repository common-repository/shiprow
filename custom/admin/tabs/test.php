<?php

global $wpdb;
$_POST['rad']=0;
$_POST['email']='dsfdsf';
$_POST['total_balance']=0;




$exist=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}common_settings",ARRAY_A);
print_r($exist);