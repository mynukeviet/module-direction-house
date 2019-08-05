<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2019 TDFOSS.,LTD. All rights reserved
 * @Createdate Mon, 05 Aug 2019 07:21:18 GMT
 */
if (!defined('NV_SYSTEM')) die('Stop!!!');

define('NV_IS_MOD_DIRECTION_HOUSE', true);

function nv_get_directtion($birthday, $gender)
{
    $array_data = array();
    
    $array_supply_destiny = array(
        0 => array(
            'title' => 'Khảm',
            'direction' => '2,0,6,7,5,1,4,3'
        ),
        1 => array(
            'title' => 'Ly',
            'direction' => '0,2,7,6,4,3,5,1'
        ),
        2 => array(
            'title' => 'Cấn',
            'direction' => '5,4,3,1,2,7,0'
        ),
        3 => array(
            'title' => 'Đoài',
            'direction' => '4,5,1,3,0,6,2,7'
        ),
        4 => array(
            'title' => 'Càn',
            'direction' => '3,1,5,4,6,0,7,2'
        ),
        5 => array(
            'title' => 'Khôn',
            'direction' => '1,3,4,5,7,2,6,0'
        ),
        6 => array(
            'title' => 'Tốn',
            'direction' => '7,6,0,2,1,5,3,5'
        ),
        7 => array(
            'title' => 'Chấn',
            'direction' => '6,7,2,0,3,4,1,5'
        ),
        8 => array(
            'title' => 'Khôn',
            'direction' => '1,3,4,5,7,2,6,0'
        )
    );
    
    $array_direction = array(
        0 => 'Đông',
        1 => 'Đông bắc',
        2 => 'Đông nam',
        3 => 'Tây',
        4 => 'Tây bắc',
        5 => 'Tây nam',
        6 => 'Nam',
        7 => 'Bắc'
    );
    
    $array_supply_destiny_by_gender = array(
        // cung mệnh nam
        1 => array(
            1 => 0,
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 4,
            6 => 5,
            7 => 6,
            8 => 7,
            9 => 8
        ),
        // cung mệnh nữ
        0 => array(
            1 => 2,
            2 => 4,
            3 => 3,
            4 => 2,
            5 => 1,
            6 => 0,
            7 => 5,
            8 => 7,
            9 => 6
        )
    );
    
    $array_direction = array(
        0 => 'Đông',
        1 => 'Đông bắc',
        2 => 'Đông nam',
        3 => 'Tây',
        4 => 'Tây bắc',
        5 => 'Tây nam',
        6 => 'Nam',
        7 => 'Bắc'
    );
    
    $array_direction_house = array(
        0 => array(
            'title' => 'Hướng Sinh khí',
            'description' => 'Mang ý nghĩa sinh sôi, phát triển. Hướng nhà tượng trưng cho sự hanh thông, thuận lợi, đạt được nhiều thành công trong cuộc sống'
        ),
        1 => array(
            'title' => 'Hướng Thiên y',
            'description' => 'Biểu trưng cho cát khí, nhận được nhiều tài lộc, may mắn, luôn có sự phù trợ của quý nhân'
        ),
        2 => array(
            'title' => 'Hướng Diên niên',
            'description' => 'Sự hòa thuận, êm đẹp  trong các mối quan hệ tình cảm, gia đình và công việc. Hoạt động dinh doanh cũng gặp nhiều tiến triển'
        ),
        3 => array(
            'title' => 'Hướng Phục vị',
            'description' => 'Hóa giải những điều không may mắn, giúp cuộc sống luôn được thuận lợi, từ đó gặp nhiều may mắn'
        ),
        4 => array(
            'title' => 'Hướng Tuyệt mệnh',
            'description' => 'Mang nhiều hung khí, có ý nghĩa về sự chia lìa, bệnh tật và trắc trở. Đây là hướng nhà xấu nhất nên tránh'
        ),
        5 => array(
            'title' => 'Hướng Ngũ quỷ',
            'description' => 'Dễ bị quấy rối bởi những điều không đâu, cuộc sống lận đận khó khăn. Cãi vả, thị phi là những điều khó tránh khỏi'
        ),
        6 => array(
            'title' => 'Hướng Lục sát',
            'description' => 'Hướng về sự thiệt hại, mất mát, dễ bị đứt đoạn trong các mối quan hệ, bị trì hoãn công việc làm ăn'
        ),
        7 => array(
            'title' => 'Hướng Họa hại',
            'description' => 'Mưu sự khó thành, dễ hao tài tán lộc, tình duyên trắc trở, dễ đối mặt với những điều không may mắn'
        )
    );
    
    $a = str_split($birthday);
    $a = array_map('intval', $a);
    $a = array_sum($a);
    if ($check = ($a % 9) != 0) {
        $result = $check;
    } else {
        $result = 9;
    }
    
    $b = $array_supply_destiny_by_gender[$gender][$result];
    $b = $array_supply_destiny[$b];
    $b['direction'] = array_map('intval', explode(',', $b['direction']));
    foreach ($b['direction'] as $index => $direction) {
        $array_data[$index] = array(
            'direction_house' => $array_direction_house[$index],
            'direction' => $array_direction[$direction]
        );
    }
    return $array_data;
}