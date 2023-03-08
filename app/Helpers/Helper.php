<?php

namespace App\Helpers;

use App\Models\UserSearchHistory;

class Helper
{
    public static function upperCase(string $string)
    {
        return strtoupper($string);
    }
    public function stringToArrayToName(string $string, array $modelArr): string
    {
        $text = "";

        if (empty($string) || empty($modelArr)) {
            return $text;
        }
        if (!empty($string)) {
            foreach (explode(',', $string) as $key => $value) {
                $text .= !empty($modelArr[$value]) ? $modelArr[$value] . ' , ' : ' ';
            }
            $text = trim($text, ' , ');
        }
        return $text;
    }
    public function counter($data = null)
    {

        if (!empty($data)) {
            $keywordCount = UserSearchHistory::where('search_keyword', $data)->count();
            return $keywordCount;
        }
    }
    public function dateFormatConvert($date = '0000-00-00')
    {
        return date('Y-m-d', strtotime($date));
    }
}
