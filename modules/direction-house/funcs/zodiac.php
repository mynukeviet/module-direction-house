<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2019 TDFOSS.,LTD. All rights reserved
 * @Createdate Mon, 05 Aug 2019 07:21:18 GMT
 */
if (!defined('NV_IS_MOD_DIRECTION_HOUSE')) die('Stop!!!');

if ($nv_Request->isset_request('view', 'post')) {
    $day = $nv_Request->get_int('day', 'post');
    $month = $nv_Request->get_int('month', 'post');
    $year = $nv_Request->get_int('year', 'post');
    $birthday = $day . '/' . $month . '/' . $year;
    $array_result = nv_get_zodiac($birthday);
    $contents = nv_theme_zodiac_result($array_result);
    nv_htmlOutput($contents);
}

$array_data = array(
    'gender' => 1,
    'year' => 1980
);
$array_result = array();

$contents = nv_theme_zodiac_main($array_data);
$page_title = $lang_module['zodiac'];
$array_mod_title[] = array(
    'title' => $page_title
);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
