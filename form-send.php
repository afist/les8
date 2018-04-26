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
define("FILE_ANSWER_USER", "file\answer_user.json");
define("ID_QUESTION", "file\id.json");
define("AMOUNT_QUESTION", "file\amount.json");

require_once 'lib\ChangeFileJson.php';
require_once 'lib\Timer.php';
require_once 'lib\Question.php';
require_once 'lib\FormCheck.php';


 use lib\ChangeFileJson\ChangeFileJson;
 use lib\Timer\Timer;
 use lib\Question\Question;
 use lib\FormCheck\FormCheck;

 $formCheck = new FormCheck($_POST);
 $formData = $formCheck->getCheckInput();


$fileQuestionCopy = new ChangeFileJson(FILE_QUESTION_COPY);

if (!empty($formData['start'])) {
    Timer::timerStart();
    $fileQuestion = new ChangeFileJson(FILE_QUESTION);
    $fileQuestionCopy->write($fileQuestion->read());
    file_put_contents(AMOUNT_QUESTION, 0);
}

if (!empty($formData['file'])) {
    $fileUser = new ChangeFileJson(FILE_ANSWER_USER);
    foreach ($fileUser->read() as $value) {
            echo $value["answer"].$value["count"]." раза<br>";
    }
    exit();
}

    $fileId = new ChangeFileJson(ID_QUESTION);
    $fileIdQuestion = $fileId->read();


if (!empty($formData['answer'])) {
    $fileAmount = file_get_contents(AMOUNT_QUESTION);
    $fileAnswer = new ChangeFileJson(FILE_ANSWER);
    
    $arrayAnswer = $fileAnswer->read();
    
    if (Question::rightQuestionOrNo($arrayAnswer, $fileIdQuestion, $formData['answer'])) {
        file_put_contents(AMOUNT_QUESTION, ++$fileAmount);
    }
}


file_put_contents(AMOUNT_QUESTION, $fileAmount);
$fileQuestionCopyArray = $fileQuestionCopy->read();

if (empty($fileQuestionCopyArray)) {
    echo "Pravilnux otvetov : ".$fileAmount."; Vrema testa: ".Timer::getTime()." s";
    
    $fileAnswerUser = new ChangeFileJson(FILE_ANSWER_USER);
    $fileAnswerUserArray = $fileAnswerUser->read();
    $arrayHelp;
    foreach ($fileAnswerUserArray as $value) {
        foreach ($value as $k => $v) {
            if ($k == "id" and $v == $fileAmount) {
                $value["count"]++;
            }
        }
        $arrayHelp[] = $value;
    }
    $fileAnswerUser->write($arrayHelp);

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
