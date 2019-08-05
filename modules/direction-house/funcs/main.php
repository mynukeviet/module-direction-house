<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2019 TDFOSS.,LTD. All rights reserved
 * @Createdate Mon, 05 Aug 2019 07:21:18 GMT
 */
if (!defined('NV_IS_MOD_DIRECTION_HOUSE')) die('Stop!!!');

if ($nv_Request->isset_request('view', 'post')) {
    $year = $nv_Request->get_int('year', 'post', 1980);
    $gender = $nv_Request->get_int('gender', 'post', 1);
    
    $array_result = nv_get_directtion($year, $gender);
    $contents = nv_theme_direction_house_result($array_result);
    nv_htmlOutput($contents);
}

$array_data = array(
    'gender' => 1,
    'year' => 1980
);
$array_result = array();

$contents = nv_theme_direction_house_main($array_data);
$page_title = $module_info['custom_title'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
