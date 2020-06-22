<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentParameters = [
    "PARAMETERS" => [
        "NEWS_IBLOCK_ID"       => [
            "NAME" => Loc::getMessage("ID_IBLOCK_NEWS_PARAMS_MESS"),
            "TYPE" => "STRING",
        ],
        "PROPERTY_AUTHOR_CODE" => [
            "NAME" => "Код свойства информационного блока",
            "TYPE" => "STRING",
        ],
        "FIELD_AUTHOR_CODE"    => [
            "NAME" => "Код пользовательского свойства пользователей",
            "TYPE" => "STRING",
        ],
        "CACHE_TIME"           => ["DEFAULT" => 36000000],
        "CACHE_FILTER"         => [
            "PARENT"  => "CACHE_SETTINGS",
            "NAME"    => GetMessage("IBLOCK_CACHE_FILTER"),
            "TYPE"    => "CHECKBOX",
            "DEFAULT" => "N",
        ],
        "CACHE_GROUPS"         => [
            "PARENT"  => "CACHE_SETTINGS",
            "NAME"    => GetMessage("CP_BNL_CACHE_GROUPS"),
            "TYPE"    => "CHECKBOX",
            "DEFAULT" => "Y",
        ],
    ],
];