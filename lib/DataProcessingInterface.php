<?php
namespace lib\DataProcessingInterface;

interface DataProcessing
{
    public function read():array;
    public function write(array $data):void;
}
