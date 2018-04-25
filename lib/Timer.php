<?php
namespace lib\Timer;

class Timer
{
    const FILE_WAY = "start.txt";

    public static function timerStart()
    {
        file_put_contents(self::FILE_WAY, microtime(true));
    }
    public static function getTime()
    {
        $a = file_get_contents(self::FILE_WAY);
        $b = microtime(true);
        return (int)($b-$a);
    }
}
