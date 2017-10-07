<?php

define('FILENAME', 'index.php');

/**
 * ��������� �������� ����� index.php � ���� �������
 * � �������� ��� �������� �� �������� �����
 *
 * @param $arr
 *
 * @return mixed
 */
function changeValuesInStr(&$arr)
{
    foreach ($arr as &$item) {
        $tempArr = explode(' ', $item);
        foreach ($tempArr as $key => $value) {
             $tempArr[$key] = formNewValue();
        }
        $item = implode(' ', $tempArr);
    }
    return $arr;
}

/**
 * @return int
 */
function formNewValue()
{
    do {
        $newItem = random_int(1, 100);
    } while($newItem % 2 === 0);
    return $newItem;
}

/**
 * @param $filename
 * @param $arr
 */
function setNewStr($filename, $arr)
{
    $fp = fopen($filename, 'wb+');
    foreach ($arr as $key => $value) {
        $key === 0 ? fwrite($fp, $value) : fwrite($fp, PHP_EOL . $value);
    }
    fclose($fp);
}

$arrayOfString = file(FILENAME);
$arr = changeValuesInStr($arrayOfString);
setNewStr(FILENAME, $arr);