<?php
$eventManager = \Bitrix\Main\EventManager::getInstance();

const PRODUCTS_IBLOCK_ID = 2;

// Before Product deactivated event
$eventManager->addEventHandler("iblock", "OnBeforeIBlockElementUpdate", function (&$arFields) {
	global $APPLICATION;

	// If element does not belong to products iblock or element was not deactivated do nothing
	if ($arFields["IBLOCK_ID"] !== PRODUCTS_IBLOCK_ID || $arFields["ACTIVE"] !== "N") {
		return true;
	}

	$select = array("ID", "NAME", "SHOW_COUNTER", "ACTIVE");
	$filter = array(
		"ID" => $arFields["ID"],
		"IBLOCK_ID" => $arFields["IBLOCK_ID"]
	);
	$iterator = CIBlockElement::GetList(array(), $filter, false, array(), $select);

	$original = $iterator->GetNext();

	// If Active field was not changed do nothing
	if (!$original || $original["ACTIVE"] === $arFields["ACTIVE"]) {
		return true;
	}

	if ($original["SHOW_COUNTER"] > 2) {
		$APPLICATION->throwException("Товар невозможно деактивировать, у него {$original["SHOW_COUNTER"]} просмотров");
		return false;
	}

	return true;
});