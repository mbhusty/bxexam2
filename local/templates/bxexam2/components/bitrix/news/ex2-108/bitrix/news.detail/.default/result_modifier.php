<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (is_set($arParams["CANONICAL_IBLOCK_ID"]) && intval($arParams["CANONICAL_IBLOCK_ID"]) > 0) {

	$select = array("ID", "NAME");
	$filter = array(
		"IBLOCK_ID" => $arParams["CANONICAL_IBLOCK_ID"],
		"PROPERTY_REL_NEWS" => $arParams["ELEMENT_ID"]
	);

	$iterator = CIBlockElement::GetList(array(), $filter, false, array(), $select);
	if ($result = $iterator->GetNext()) {
		$arResult["CANONICAL_LINK"] = $result["NAME"];
		$this->getComponent()->setResultCacheKeys(["CANONICAL_LINK"]);
	}
}