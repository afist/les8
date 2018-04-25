<?php
/**
 * CURRENCY CONVERTER
 * PHP version 7.1
 *
 * @category Check
 * @package  PackageName
 * @author   Sheyko Bogdan <afisttiik@gmail.com>
 * @license  https://mysite.ua PHP License
 * @link     https://mysite.ua
 */

define("FILE_QUESTION", "file\question.json");
define("FILE_QUESTION_COPY", "file\question_copy.json");
define("FILE_ANSWER", "file\answer.json");
define("ID_QUESTION", "file\id.json");
define("AMOUNT_QUESTION", "file\amount.json");

require_once 'lib\ChangeFileJson.php';
require_once 'lib\Timer.php';
require_once 'lib\Question.php';

 use lib\ChangeFileJson\ChangeFileJson;
 use lib\Timer\Timer;
 use lib\Question\Question;

$fileQuestionCopy = new ChangeFileJson(FILE_QUESTION_COPY);

if (!empty($_POST['start'])) {
    Timer::timerStart();
    $fileQuestion = new ChangeFileJson(FILE_QUESTION);
    $fileQuestionCopy->write($fileQuestion->read());
    file_put_contents(AMOUNT_QUESTION, 0);
}
if (!file_exists(AMOUNT_QUESTION)) {
    echo "Anu xvatit klacat";
    exit();
}
$fileAnswer = new ChangeFileJson(FILE_ANSWER);
$array = $fileAnswer->read();

$fileId = new ChangeFileJson(ID_QUESTION);
$fileIdQuestion = $fileId->read();

$fileAmount = file_get_contents(AMOUNT_QUESTION);


if (!empty($_POST['answer'])) {
    foreach ($array as $value) {
        foreach ($value as $k => $v) {
            if ($v == $fileIdQuestion[0]['id']) {
                if ($_POST['answer']== $value['answer']) {
                    $fileAmount++;
                }
            }
        }
    }
}

file_put_contents(AMOUNT_QUESTION, $fileAmount);
$fileQuestionCopyArray = $fileQuestionCopy->read();

if (empty($fileQuestionCopyArray)) {
    echo "Pravilnux otvetov : ".$fileAmount."; Vrema testa: ".Timer::getTime()." s";
    unlink(FILE_QUESTION_COPY);
    unlink(AMOUNT_QUESTION);
    exit();
}

$question = new Question($fileQuestionCopyArray);
$questionWrite = $question->getQuestion();
echo $questionWrite;
$fileQuestionCopyArray = $question->deleteQuestion();


$fileId->write($question->getIdQuestion());

$fileQuestionCopy->write($fileQuestionCopyArray);
