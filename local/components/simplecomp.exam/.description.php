<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	"NAME" => Loc::getMessage("MESS_NAME_COMPONENT"),
	"DESCRIPTION" => Loc::getMessage("MESS_DESCRIPTION_COMPONENT"),
    'PATH' => array(
        'ID' => 'exam2',
        'NAME' => Loc::getMessage("MESS_GROUP_COMPONENT"),
        'SORT' => 10,
    )
);