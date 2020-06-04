<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentParameters = array(
	"PARAMETERS" => array(
		"ID_IBLOCK_CATALOG" => array(
			"PARENT" => "BASE",
			"NAME" => Loc::getMessage("MESS_ID_IBLOCK_CATALOG"),
			"TYPE" => "STRING",
			"DEFAULT" => ''
		),
        "ID_IBLOCK_NEWS" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("MESS_ID_IBLOCK_NEWS"),
            "TYPE" => "STRING",
            "DEFAULT" => ''
        ),
        "UF_CATALOG_CODE" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("MESS_UF_CATALOG_CODE"),
            "TYPE" => "STRING",
            "DEFAULT" => ''
        ),
        "CACHE_TIME" => array(),
	),
);