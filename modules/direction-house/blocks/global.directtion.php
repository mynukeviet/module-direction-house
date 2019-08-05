<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/25/2010 18:6
 */
if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!nv_function_exists('nv_block_drection')) {
    
    function nv_block_drection($block_config)
    {
        global $global_config, $site_mods, $module_name, $module_file, $lang_module, $my_head;
        
        $module = $block_config['module'];
        $mod_file = $site_mods[$module]['module_file'];
        
        if ($module_file == 'direction-house') return '';
        
        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $mod_file . '/block.diretion.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $mod_file . '/block.diretion.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }
        
        if ($module != $module_name) {
            $my_head .= '<link rel="StyleSheet" href="/themes/' . $block_theme . '/css/' . $mod_file . '.css">';
            $lang_temp = $lang_module;
            if (file_exists(NV_ROOTDIR . '/modules/' . $mod_file . '/language/' . $global_config['site_lang'] . '.php')) {
                require NV_ROOTDIR . '/modules/' . $mod_file . '/language/' . $global_config['site_lang'] . '.php';
            }
            $lang_module = $lang_module + $lang_temp;
            unset($lang_temp);
        }
        
        $xtpl = new XTemplate('block.diretion.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $mod_file);
        $xtpl->assign('LANG', $lang_module);
        $xtpl->assign('URL', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module);
        
        for ($i = date('Y'); $i >= 1950; $i--) {
            $xtpl->assign('YEAR', array(
                'index' => $i,
                'selected' => 1980 == $i ? 'selected="selected"' : ''
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
                'checked' => $index == 1 ? 'checked="checked"' : ''
            ));
            $xtpl->parse('main.gender');
        }
        
        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    global $site_mods, $module_name, $global_array_cat, $module_array_cat;
    $module = $block_config['module'];
    if (isset($site_mods[$module])) {
        $content = nv_block_drection($block_config);
    }
}