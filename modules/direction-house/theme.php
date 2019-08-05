<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2019 TDFOSS.,LTD. All rights reserved
 * @Createdate Mon, 05 Aug 2019 07:21:18 GMT
 */
if (!defined('NV_IS_MOD_DIRECTION_HOUSE')) die('Stop!!!');

/**
 * nv_theme_direction_house_main()
 *
 * @param mixed $array_data
 * @return
 */
function nv_theme_direction_house_main($array_data)
{
    global $module_file, $lang_module, $module_info, $op;
    
    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    
    for ($i = date('Y'); $i >= 1950; $i--) {
        $xtpl->assign('YEAR', array(
            'index' => $i,
            'selected' => $array_data['year'] == $i ? 'selected="selected"' : ''
        ));
        $xtpl->parse('main.year');
    }
    
    $array_gender = array(
        1 => $lang_module['female'],
        0 => $lang_module['male']
    );
    foreach ($array_gender as $index => $value) {
        $xtpl->assign('GENDER', array(
            'index' => $index,
            'value' => $value,
            'checked' => $array_data['gender'] == $index ? 'checked="checked"' : ''
        ));
        $xtpl->parse('main.gender');
    }
    
    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_direction_house_result()
 *
 * @param mixed $array_result
 * @return
 */
function nv_theme_direction_house_result($array_result)
{
    global $module_file, $lang_module, $module_info, $op;
    
    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    
    if (!empty($array_result)) {
        $i = 1;
        foreach ($array_result as $data) {
            $xtpl->assign('DATA', $data);
            if ($i == 1) {
                $xtpl->parse('result.data.good_direction');
            } elseif ($i == 5) {
                $xtpl->parse('result.data.bad_direction');
            }
            $xtpl->parse('result.data');
            $i++;
        }
    }
    
    $xtpl->parse('result');
    return $xtpl->text('result');
}