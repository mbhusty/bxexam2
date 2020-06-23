<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент2");
?><?$APPLICATION->IncludeComponent(
	"simplecomp2.exam", 
	".default", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"ID_IBLOCK_CATALOG" => "2",
		"ID_IBLOCK_CLASS" => "7",
		"LINK_TEMPLATE" => "/catalog_exam/#SECTION_ID#/#ELEMENT_CODE#",
		"UF_CATALOG_CODE" => "FIRM",
		"ELEMENTS_PER_PAGE" => "2",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>