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
        "ID_IBLOCK_CLASS" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("MESS_ID_IBLOCK_CLASS"),
            "TYPE" => "STRING",
            "DEFAULT" => ''
        ),
        "UF_CATALOG_CODE" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("MESS_UF_CATALOG_CODE"),
            "TYPE" => "STRING",
            "DEFAULT" => ''
        ),
        "ELEMENTS_PER_PAGE" => array(
            "PARENT" => "BASE",
            "NAME" => "Количество элементов на старнице",
            "TYPE" => "STRING",
            "DEFAULT" => ''
        ),
        "LINK_TEMPLATE" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("MESS_LINK_TEMPLATE"),
            "TYPE" => "STRING",
            "DEFAULT" => ''
        ),
        "CACHE_TIME" => array("DEFAULT" => 3600),
        "CACHE_GROUPS"  => array(
            "PARENT"  => "CACHE_SETTINGS",
            "NAME"    => GetMessage("CP_BPR_CACHE_GROUPS"),
            "TYPE"    => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
	),
);