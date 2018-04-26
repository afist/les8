<?php
namespace lib\FormCheck;

class FormCheck
{
    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    private function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    private function checkArrayInput()
    {
        foreach ($this->array as $key => $value) {
            $this->array[$key] = $this->checkInput($this->array[$key]);
        }
    }

    public function checkNumeric($amountFrom)
    {
        if (!preg_match("|^[\d]+$|", $amount_from)) {
            $amountFrom = 0;
        }

        return $amountFrom;
    }

    public function getCheckInput()
    {
        $this->checkArrayInput();
        return $this->array;
    }
}
