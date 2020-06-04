<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
if ($this->StartResultCache())
{
    if(!Loader::includeModule("iblock"))
    {
        ShowError(GetMessage("SIMPLECOMP_EXAM2_IBLOCK_MODULE_NONE"));
        return;
    }
$arSectFilter = array('IBLOCK_ID' => $arParams['ID_IBLOCK_CATALOG'], 'GLOBAL_ACTIVE' => 'Y');
$arSectSelect = array("ID", "IBLOCK_ID", "NAME", "UF_*");
$db_list = CIBlockSection::GetList(array(), $arSectFilter, false, $arSectSelect);
$sectionIDs = [];
$news = [];
while ($ar_result = $db_list->GetNext()) {
    $sectionIDs[] = $ar_result["ID"];
    foreach ($ar_result[$arParams["UF_CATALOG_CODE"]] as $newsId) {
        if (!isset($news[$newsId])) {
            $news[$newsId]["SECTION_ID"] = [$ar_result["ID"]];
            $news[$newsId]["SECTION_NAME"] = [$ar_result["NAME"]];
        } else if (!in_array($ar_result["ID"],  $news[$newsId]["SECTION_ID"])) {
            $news[$newsId]["SECTION_ID"][] = $ar_result["ID"];
            $news[$newsId]["SECTION_NAME"][] = $ar_result["NAME"];
        }
    }
}
$arSectElemFilter = array(
    "IBLOCK_ID" => $arParams['ID_IBLOCK_CATALOG'],
    "ACTIVE" => "Y",
    "IBLOCK_SECTION_ID" => $sectionIDs
);
$arSectElemSelect =
    array("ID", "NAME", "IBLOCK_SECTION_ID", "PROPERTY_MATERIAL", "PROPERTY_PRICE", "PROPERTY_ARTNUMBER");
$rsProducts = CIBlockElement::GetList(array(), $arSectElemFilter, false, false, $arSectElemSelect);
$products = [];
$arResult["PRODUCTS_COUNT"] = 0;
while ($product = $rsProducts->GetNext()) {
    $arResult["PRODUCTS_COUNT"]++;
    $products[$product["IBLOCK_SECTION_ID"]][] = $product;
}

$arNewsFilter = array(
    "IBLOCK_ID" => $arParams["ID_IBLOCK_NEWS"],
    "ACTIVE" => "Y",
    "ID" => array_keys($news) // Only news that have related product sections
);
$arNewsSelect = array("ID", "NAME", "ACTIVE_FROM");
$newsResult = [];
$rsNews = CIBlockElement::GetList(array(), $arNewsFilter, false, false, $arNewsSelect);

while ($newsElement = $rsNews->GetNext()) {
    $newsElement = array_merge($newsElement, $news[$newsElement["ID"]]); // merge related sections
    $newsElement["PRODUCTS"] = [];
    foreach ($newsElement["SECTION_ID"] as $sectionID) {
        // merge products for each section
        if (isset($products[$sectionID])) {
            $newsElement["PRODUCTS"] = array_merge($newsElement["PRODUCTS"], $products[$sectionID]);
        }
    }
    $newsResult[] = $newsElement;
}
$arResult["NEWS"] = $newsResult;

}
$this->SetResultCacheKeys(array(
    "PRODUCTS_COUNT",
));
$APPLICATION->SetTitle(Loc::getMessage("MESS_CATALOG_ELEMENT_COUNT_TITLE").$arResult["PRODUCTS_COUNT"]);
$this->includeComponentTemplate();