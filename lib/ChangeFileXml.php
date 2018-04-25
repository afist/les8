<?php

namespace lib\ChangeFileXml;

interface DataProcessing
{
    public function read():array;
    public function write(array $data):void;
}

class ChangeFileJson implements DataProcessing
{
    private $_file_way;

    public function __construct($file_way)
    {
        $this->_file_way = $file_way;
    }

    public function read():array
    {
        return json_decode(file_get_contents($this->_file_way), true);
    }
    public function write(array $arr):void
    {
        file_put_contents($this->_file_way, json_encode($arr, true));
    }
}
