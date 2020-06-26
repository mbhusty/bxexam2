<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
//ссылка на страницу станицу exampage 
//$url = ...
// На странице компонента sections_top.php вывести ссылку, на основании шаблона пути на страницу exampage.php.
// Для проверки решения подставить в нее тестовые значениями переменных: PARAM1 = 123, PARAM2 = 456.
// Значения можно подставить с помощью str_replace.
$sTemplate = $arResult['URL_TEMPLATES']['exampage'];
$sUrl = $arResult['FOLDER'] . str_replace(['#PARAM1#', '#PARAM2#'], ['123', '456'], $sTemplate);
?>
<?= GetMessage("EXAM_TEXT_LINK_CP_PHOTO")?> <a href="<?=$sUrl?>"><?=$sUrl?></a>

<?$APPLICATION->IncludeComponent(
	"bitrix:photo.sections.top",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_COUNT" => $arParams["SECTION_COUNT"],
		"ELEMENT_COUNT" => $arParams["TOP_ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["TOP_LINE_ELEMENT_COUNT"],
		"SECTION_SORT_FIELD" => $arParams["SECTION_SORT_FIELD"],
		"SECTION_SORT_ORDER" => $arParams["SECTION_SORT_ORDER"],
		"ELEMENT_SORT_FIELD" => $arParams["TOP_ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["TOP_ELEMENT_SORT_ORDER"],
		"FIELD_CODE" => $arParams["TOP_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["TOP_PROPERTY_CODE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
	),
	$component
);
?>
