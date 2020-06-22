<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	"NAME" => "Задание ex2-97",
	"DESCRIPTION" => "",
    'PATH' => array(
        'ID' => 'exam2',
        'NAME' => "Задание ex2-97",
        'SORT' => 10,
    )
);