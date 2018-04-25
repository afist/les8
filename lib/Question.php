<?php

namespace lib\Question;

class Question
{
    private $arr;
    private $question;
    private $random;
    private $id;

    public function __construct($arr)
    {
        $this->arr = $arr;
    }
    private function findQuestion()
    {
        $count = count($this->arr)-1;
        $random = random_int(0, $count);
        $this->question = $this->arr[$random]["qestion"];
        $this->random = $random;
    }
    public function deleteQuestion()
    {
        $this->id = array_splice($this->arr, $this->random, 1);
        return $this->arr;
    }
    public function getQuestion()
    {
        $this->findQuestion();
        return $this->question;
    }
    public function getIdQuestion():array
    {
        return $this->id;
    }
}
