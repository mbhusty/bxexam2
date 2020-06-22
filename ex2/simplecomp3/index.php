<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент3");
?><?$APPLICATION->IncludeComponent(
	"simplecomp3.exam",
	"",
	Array(
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"FIELD_AUTHOR_CODE" => "UF_AUTHOR_TYPE",
		"NEWS_IBLOCK_ID" => "1",
		"PROPERTY_AUTHOR_CODE" => "AUTHOR"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>