<?php

namespace lib\ChangeFileXml;

interface DataProcessing
{
    public function read():array;
    public function write(array $data):void;
}

class ChangeFileXml implements DataProcessing
{
    private $fileWay;

    public function __construct($fileWay)
    {
        $this->fileWay = $fileWay;
    }

    public function read():array
    {
        return simplexml_load_file(file_get_contents($this->fileway));
    }
    public function write(array $arr):void
    {
        file_put_contents($this->fileWay, json_encode($arr, true));
    }
}

$a = new ChangeFileXml('1.xml');
echo $a->read();
