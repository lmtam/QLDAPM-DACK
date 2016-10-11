<?php namespace App\MyCore\Outside\Helpers;

class TimeAgo {
    public static function timeAgo($dateFrom, $dateTo = false) {
        if($dateFrom == 0)
            return "Một thời gian trước";
        
        if (!$dateTo) {
            $dateTo = time();
        } else {
            $dateTo = strtotime($dateTo);
        }
        $dateFrom = strtotime($dateFrom);

        $difference = $dateTo - $dateFrom;

        if($difference == 0 || $difference < 0) {
            $difference = 1;
        }

        switch(true) {
            case(strtotime('-1 min', $dateTo) < $dateFrom):
                $datediff = $difference;
                $text = ($datediff == 1) ? $datediff.' giây trước' : $datediff.' giây trước';
                break;
            case(strtotime('-1 hour', $dateTo) < $dateFrom):
                $datediff = floor($difference / 60);
                $text = ($datediff == 1) ? $datediff.' phút trước' : $datediff.' phút trước';
                break;
            case(strtotime('-1 day', $dateTo) < $dateFrom):
                $datediff = floor($difference / 60 / 60);
                $text = ($datediff==1) ? $datediff.' giờ trước' : $datediff.' giờ trước';
                break;
            default:
                $text = self::sortDateVN($dateFrom);
                break;
        }
        return $text;
    }

    /**
     * convert to vn
     *
     * @param unknown $time
     * @param string $format
     * @author Giau Le
     */
    public static function sortDateVN($time, $format="D - d/m/Y") {
        $stringSearch = array (
            "Mon",
            "Tue",
            "Wed",
            "Thu",
            "Fri",
            "Sat",
            "Sun",
            "am",
            "pm",
        );
        $stringReplace = array (
            "Thứ hai",
            "Thứ ba",
            "Thứ tư",
            "Thứ năm",
            "Thứ sáu",
            "Thứ bảy",
            "Chủ nhật",
            "sáng",
            "chiều"
        );
        $timeNow = date($format, $time);
        $timeNow = str_replace( $stringSearch, $stringReplace, $timeNow);
        echo $timeNow;
    }
}