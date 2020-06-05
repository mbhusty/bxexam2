<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"simplecomp2.exam",
	"",
	Array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"ID_IBLOCK_CATALOG" => "2",
		"ID_IBLOCK_CLASS" => "7",
		"LINK_TEMPLATE" => "",
		"UF_CATALOG_CODE" => "FIRM"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>