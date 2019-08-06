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
            'direction' => '5,4,3,1,2,7,0,6'
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
    $a = $a % 9;
    if ($a != 0) {
        $result = $a;
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

function nv_check_day($day_from, $day_to, $birthday)
{
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $birthday, $m)) {
        $birthday = mktime(23, 59, 59, $m[2], $m[1], 2015);
    } else {
        $birthday = 0;
    }

    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $day_from, $m)) {
        $day_from = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
    } else {
        $day_from = 0;
    }

    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $day_to, $m)) {
        $day_to = mktime(23, 59, 59, $m[2], $m[1], $m[3]);
    } else {
        $day_to = 0;
    }

    if ($day_from <= $birthday && $day_to >= $birthday) {
        return true;
    }
    return false;
}

function nv_get_zodiac($birthday)
{
    $year = 2015;
    $array_day = array(
        array(
            'title' => 'Bạch Dương – Aries',
            'description' => 'Bạch Dương Aries – Con Cừu đực (21/3 – 20/4) là cung mệnh đầu tiên của vòng Hoàng Đạo, nó biểu trưng cho sự sống. Con Cừu chỉ nghĩ về mình. Nó là một đứa trẻ, và như mọi con trẻ khác, nó hoàn toàn chìm đắm trong cái tôi của bản thân. Những gì nó quan tâm phải được đặt lên trên hết',
            'day_from' => '21/3/' . $year,
            'day_to' => '20/4/' . $year
        ),
        array(
            'title' => 'Kim Ngưu – Taurus',
            'description' => 'Từ 21/4 đến 21/5, Mặt trời đi ngang qua chòm sao mà các nhà thiên văn cổ xưa liên tưởng thành hình thân trước của con bò, đặt tên là Taurus (bò đực) – Kim Ngưu. Người sinh trong khoảng thời gian này luôn có thể được nhận biết bởi dáng vẻ điềm tĩnh, sự khoan thai trong cử chỉ và lời nói… Đa số Kim Ngưu là những người giàu có. Tính cách ổn định, hơi bảo thủ, người thuộc cung này có thể nói là đáng tin cậy nhất trong cung hoàng đạo',
            'day_from' => '21/4/' . $year,
            'day_to' => '21/5/' . $year
        ),
        array(
            'title' => 'Song Tử – Gemini',
            'description' => 'Người sinh vào thời gian từ 22/5 - 21/6 sẽ thuộc cung Gemini. Hai anh em song sinh Castor và Pollux là con của Zeus, chúa tể của mười hai vị thần trên đỉnh Olympus, và nữ hoàng của thành Sparta.<br />Đó là hai đứa trẻ trung hậu, rất dũng cảm và cùng nhau nổi danh khi lập được nhiều chiến công hiển hách trong cuộc hành trình của nhóm thủy thủ tàu Argo vĩ đại, và trong biết bao cuộc phiêu lưu khác…',
            'day_from' => '22/5' . $year,
            'day_to' => '21/6/' . $year
        ),
        array(
            'title' => 'Cự Giải – Cancer',
            'description' => 'Là biểu tượng của nước, sao chiếu mệnh là Mặt Trăng nên muốn nhận ra Cự Giải, trước hết hãy để ý đến một tuần trăng. Sự thay đổi tâm trạng của những người sinh ra trong khoảng thời gian này dường như liên hệ với mặt trăng bởi một sợi dây thần bí, giống như cách mà vệ tinh này chi phối chu kỳ lên xuống của thuỷ triều.<br />Mặt trăng có lúc trong sáng, nó có thể lấp đầy một đường tròn hoàn hảo trên bầu trời, rồi lại thanh mảnh trở lại trong một hình cung khuyết kiêu kỳ với quầng sáng dịu dàng, mờ ảo, nhưng bản thân nó thì không hề thay đổi.',
            'day_from' => '22/6' . $year,
            'day_to' => '23/7/' . $year
        ),
        array(
            'title' => 'Sư Tử – Leo',
            'description' => 'Bạn có bao giờ gặp những người tiếp nhận sự giúp đỡ và nhiệt tình của kẻ khác với một vẻ độ lượng và phong thái oai nghiêm như thể việc đó là đương nhiên không? Nếu có thì đó chính là Leo đấy. <br />Sư Tử là chúa của muôn loài. Cho nên người cùng tên với nó cũng muốn chiếm vị trí như vậy đối với các cung Hoàng đạo khác…',
            'day_from' => '24/7' . $year,
            'day_to' => '23/8/' . $year
        ),
        array(
            'title' => 'Xử Nữ – Virgo',
            'description' => 'Từ ngày 24/8 - 23/9 Mặt trời đi qua chòm sao Virgo – tiếng Latin nghĩa là Xử Nữ, Trinh Nữ. Hợp với nghĩa đó, đa số người sống độc thân hoặc muộn màng chính là sinh ở cung này. Nhưng một khi đã lập gia đình, Xử Nữ làm tròn bổn phận của mình với lòng tận tuỵ hiếm có…',
            'day_from' => '24/8' . $year,
            'day_to' => '23/9/' . $year
        ),
        array(
            'title' => 'Thiên Bình – Libra',
            'description' => 'Sau khi rời chòm Xử Nữ, từ ngày 24/9 - 23/10 Mặt trời "đi" qua chòm Libra (Thiên Bình) – nghĩa là cái cân. Tuy nhiên, khó có thể nói Thiên Bình là những người thăng bằng. Trước khi đạt được trạng thái thăng bằng, cái cân phải dao động, đung đưa rất lâu bên này bên kia.',
            'day_from' => '24/9' . $year,
            'day_to' => '23/10/' . $year
        ),
        array(
            'title' => 'Bọ Cạp – Scorpio',
            'description' => 'Từ 24/10 - 22/11 Mặt trời đi qua chòm Scorpio – nghĩa là Bò Cạp. Trong các từ điển bách khoa, Bò Cạp được mô tả như sau: loài động vật chân đốt sống về đêm, có khả năng làm tê liệt con mồi bằng chất độc chứa ở chiếc đuôi dài và cong được sử dụng như một phương tiện tấn công cũng như phòng thủ.',
            'day_from' => '24/10' . $year,
            'day_to' => '22/11/' . $year
        ),
        array(
            'title' => 'Nhân Mã – Sagittarius',
            'description' => 'Đơn giản nhất là nhận biết người sinh cung Nhân Mã từ 23/11 - 21/12. Bạn tìm thấy người đó tại chính giữa nhóm ồn ào nhất ở mỗi cuộc vui. Nhân Mã đang kể các câu chuyện hài hước, còn mọi người xung quanh thì phá ra cười.',
            'day_from' => '23/11' . $year,
            'day_to' => '21/12/' . $year
        ),
        array(
            'title' => 'Ma kết – Capricornus',
            'description' => 'Trong truyện ngụ ngôn, con rùa bò chậm chạp nhưng không la cà, bền bỉ tiến tới, vượt qua chú thỏ nhanh nhảu, và đến đích trước. Hình tượng đó là khắc hoạ cơ bản tính cách của người sinh trong giai đoạn từ 22/12 đến 20/1, thuộc cung Ma Kết (Capricornus – Con Dê)…',
            'day_from' => '22/12' . $year,
            'day_to' => '20/1/' . ($year + 1)
        ),
        array(
            'title' => 'Bảo Bình – Aquarius',
            'description' => 'Nếu khắc hoạ tính cách người sinh cung Bảo Bình (21/1 - 19/2) bằng một từ, thì từ đó là "trí tò mò". Người này hứng thú quan tâm tất cả mọi thứ quanh mình, bắt đầu từ bản thân bạn và kết thúc bằng chú cún nhà hàng xóm…',
            'day_from' => '21/1/' + ($year + 1),
            'day_to' => '19/2/' + ($year + 1)
        ),
        array(
            'title' => 'Song Ngư – Pisces',
            'description' => 'Chiêm tinh học xếp Song Ngư (Pisces – Con Cá, 20/2 – 20/3) là cung cuối cùng, thứ 12 của chu kỳ Hoàng đạo. Nếu như Bạch Dương, cung mở đầu, biểu trưng cho sự sống, thì Song Ngư biểu trưng cho cái chết và sự đi vào cõi vĩnh hằng…',
            'day_from' => '20/2' + ($year + 1),
            'day_to' => '20/3/' + ($year + 1)
        )
    );

    foreach ($array_day as $day) {
        if (nv_check_day($day['day_from'], $day['day_to'], $birthday)) {
            return $day;
        }
    }
    return false;
}
