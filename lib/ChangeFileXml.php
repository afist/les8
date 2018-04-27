<?php

namespace lib\ChangeFileXml;

require_once 'DataProcessingInterface.php';

use lib\DataProcessingInterface\DataProcessing;

class ChangeFileXml implements DataProcessing
{
    private $fileWay;

    public function __construct($fileWay)
    {
        $this->fileWay = $fileWay;
    }

    public function read():array
    {
        return json_decode(json_encode(simplexml_load_file($this->fileWay)), true)["currency"];
    }
    public function write(array $arr):void
    {
        file_put_contents($this->fileWay, json_encode($arr, true));
    }
}

$a = new ChangeFileXml('1.xml');
$b = $a->read();

$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<movies>
 <movie>
  <title>PHP: Появление Парсера</title>
  <characters>
   <character>
    <name>Ms. Coder</name>
    <actor>Onlivia Actora</actor>
   </character>
   <character>
    <name>Mr. Coder</name>
    <actor>El Act&#211;r</actor>
   </character>
  </characters>
  <plot>
   Таким образом, это язык. Это все равно язык программирования. Или
   это скриптовый язык? Все раскрывается в этом документальном фильме,
   похожем на фильм ужасов.
  </plot>
  <great-lines>
   <line>PHP решает все мои проблемы в вебе</line>
  </great-lines>
  <rating type="thumbs">7</rating>
  <rating type="stars">5</rating>
 </movie>
</movies>
XML;

$movies = new SimpleXMLElement($xmlstr);

echo $movies->movie[0]->plot;
