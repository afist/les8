<?php

namespace lib\ChangeFileXml;

interface DataProcessing
{
    public function read():array;
    public function write(array $data):void;
}

class ChangeFileJson implements DataProcessing
{
    private $fileWay;

    public function __construct($fileWay)
    {
        $this->fileWay = $fileWay;
    }

    public function read():array
    {
        return json_decode(file_get_contents($this->fileway), true);
    }
    public function write(array $arr):void
    {
        file_put_contents($this->fileWay, json_encode($arr, true));
    }
}
