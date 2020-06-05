<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

if (!Loader::includeModule("iblock")) {
    ShowError(GetMessage("SIMPLECOMP_EXAM2_IBLOCK_MODULE_NONE"));
    return;
}
if ($this->StartResultCache(false, $USER->GetGroups())) {
    $arResult["CLASS"] = [];
    $arSelect = Array("ID", "IBLOCK_ID", "NAME");
    $arFilter = Array(
        "IBLOCK_ID" => $arParams["ID_IBLOCK_CLASS"],
        "CHECK_PERMISSIONS" => $arParams["CACHE_GROUPS"],
        "ACTIVE" => "Y"
    );
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult["CLASS"][$ob["ID"]] = $ob;
    }
    $arClassIDs = array_column($arResult["CLASS"], "ID");
    $arResult["CLASS_COUNT"] = count($arResult["CLASS"]);

    $arSelectElems = [
        "ID",
        "IBLOCK_ID",
        "NAME",
        "DETAIL_PAGE_URL",
    ];

    $arFilterElems = [
        "IBLOCK_ID"                              => $arParams["ID_IBLOCK_CATALOG"],
        "CHECK_PERMISSIONS"                      => $arParams["CACHE_GROUPS"],
        "PROPERTY_" . $arParams["UF_CATALOG_CODE"] => $arClassIDs,
        "ACTIVE"                                 => "Y",
    ];

    $arResult["ELEMENTS"] = [];

    $resElements = \CIBlockElement::GetList(
        array(),
        $arFilterElems,
        false, false,
        $arSelectElems
    );

    while ($ob = $resElements->GetNextElement()) {
        $arEl = $ob->GetFields();
        $arEl["PROPS"] = $ob->GetProperties();
        $arResult["ELEMENTS"][$arEl["ID"]] = $arEl;
    }

    foreach ($arResult["CLASS"] as $iClass => $arClass) {
        foreach ($arResult["ELEMENTS"] as $iEl => $arEl) {
            foreach ($arEl["PROPS"]["FIRM"]["VALUE"] as $iVal) {
                if ($iVal == $iClass) {
                    $arResult["CLASS"][$iVal]["ELEMENTS_ID"][] = $arEl["ID"];
                    break;
                }
            }
        }
    }

    $this->SetResultCacheKeys(["CLASS_COUNT"]);

    $this->includeComponentTemplate();
}
$APPLICATION->SetTitle(Loc::getMessage("TITLE_CLASS_COUNT").$arResult["CLASS_COUNT"]);
