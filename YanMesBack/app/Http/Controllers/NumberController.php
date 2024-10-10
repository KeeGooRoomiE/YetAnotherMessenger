<?php

namespace App\Http\Controllers;

class NumberController extends Controller
{
    private static $curNum = 0;

    public function getCurrentNumber()
    {
        return response()->json(['curNum' => self::$curNum]);
    }

    public function incrementNumber()
    {
        self::$curNum += 1;
        return response()->json(['curNum' => self::$curNum]);
    }
}
