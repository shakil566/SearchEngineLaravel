<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class Common {

    public static function stringToArrayToName(string $string, array $modelArr): string
    {
        $text = "";

        if (empty($string) || empty($modelArr)) {
            return $text;
        }
        if (!empty($string)) {
            foreach (explode(',', $string) as $key => $value) {
                $text .= !empty($modelArr[$value]) ? $modelArr[$value] . ' | ' : ' ';
            }
            $text = trim($text, ' | ');
        }
        return $text;
    }
}
