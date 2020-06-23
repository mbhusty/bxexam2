<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
if (!Loader::includeModule("iblock")) {
    ShowError(GetMessage("SIMPLECOMP_EXAM2_IBLOCK_MODULE_NONE"));
    return;
}

$bFilter = false;
if ($request->get('F')) {
    $bFilter = true;
}
$arParams['ELEMENTS_PER_PAGE'] = (int)$arParams['ELEMENTS_PER_PAGE'];
$arParams["PAGER_TITLE"] = "Старинички";
$arParams["PAGER_SHOW_ALL"] = "Y";
$arNavParams = [
    "nPageSize" => $arParams['ELEMENTS_PER_PAGE'],
    "bShowAll"  => $arParams["PAGER_SHOW_ALL"],
];

$arNavigation = CDBResult::GetNavParams($arNavParams);

if ($this->StartResultCache(false, [$USER->GetGroups(), $bFilter, $arNavigation])) {
    $arResult["CLASS"] = [];
    $arSelect = Array("ID", "IBLOCK_ID", "NAME");
    $arFilter = Array(
        "IBLOCK_ID" => $arParams["ID_IBLOCK_CLASS"],
        "CHECK_PERMISSIONS" => $arParams["CACHE_GROUPS"],
        "ACTIVE" => "Y"
    );
    $res = CIBlockElement::GetList(array(), $arFilter, false, $arNavParams, $arSelect);

    $arResult["NAV_STRING"] = $res->GetPageNavStringEx(
        $navComponentObject,
        $arParams["PAGER_TITLE"],
        $arParams["PAGER_TEMPLATE"],
        $arParams["PAGER_SHOW_ALWAYS"]
    );

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
    $arSortElems = [
        'NAME' => 'ASC',
        'SORT' => 'ASC'
    ];

    // ex2-49
    if ($bFilter) {
        $arFilterElems[] = [
            // Логика фильтра «или», должны отбираться элементы, удовлетворяющие или условию 1 или условию 2
            "LOGIC" => "OR",
            [
                // 1: с ценой меньше или равной 1700 и материалом равным «Дерево, ткань»
                "<=PROPERTY_PRICE" => "1700",
                "PROPERTY_MATERIAL" => "Дерево, ткань"
            ],
            [
                // 2: с ценой меньше 1500 и материалом равным «Металл, пластик»
                "<PROPERTY_PRICE" => "1500",
                "PROPERTY_MATERIAL" => "Металл, пластик"
            ],
        ];

        // Компонент не должен кешировать результат работы, если используется дополнительный фильтр.
        $this->abortResultCache();
    }


    $arResult["ELEMENTS"] = [];

    $resElements = \CIBlockElement::GetList(
        $arSortElems,
        $arFilterElems,
        false, false,
        $arSelectElems
    );

    if ($arParams["LINK_TEMPLATE"]) {
        $resElements->SetUrlTemplates($arParams["LINK_TEMPLATE"]);
    }

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
