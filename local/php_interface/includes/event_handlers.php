<?php
$eventManager = \Bitrix\Main\EventManager::getInstance();

const PRODUCTS_IBLOCK_ID = 2;
const CONTENT_MANAGER_GROUP_ID = 5;
const META_IBLOCK_ID = 6;
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

$eventManager->addEventHandler("main", "OnEpilog", function () {
	if (defined("ERROR_404") && ERROR_404 == "Y" || CHTTP::GetLastStatus() == "404 Not Found") {
		global $APPLICATION;
		$currentPage = $APPLICATION->GetCurUri();
		CEventLog::Add(array(
			"SEVERITY" => "INFO",
			"AUDIT_TYPE_ID" => "ERROR_404",
			"MODULE_ID" => "main",
			"DESCRIPTION" => $currentPage,
		));
	}

});


// Modify author in Feedback form
$eventManager->addEventHandler("main", "OnBeforeEventAdd", function (&$event, &$lid, &$arFields) {
	global $USER;

	if ($event !== "FEEDBACK_FORM") {
		return true;
	}

	if (!$USER->IsAuthorized()) {
		$arFields["AUTHOR"] = "Пользователь не авторизован, данные из формы: {$arFields["AUTHOR"]}";
	} else {
		$arFields["AUTHOR"] = "Пользователь авторизован: {$USER->GetID()} ({$USER->GetLogin()}) {$USER->GetFullName()}, данные из формы: {$arFields["AUTHOR"]}";
	}
	CEventLog::Add([
		"SEVERITY" => "INFO",
		"AUDIT_TYPE_ID" => "MAIL_DATA_REPLACED",
		"MODULE_ID" => "main",
		"ITEM_ID" => $USER->GetID(),
		"DESCRIPTION" => "Замена данных в отсылаемом письме – {$arFields["AUTHOR"]}"
	]);
});





$eventManager->addEventHandler("main", "OnPageStart", function () {
	global $APPLICATION;
	$currentPage = $APPLICATION->GetCurPage();
	if ($currentPage == '/bitrix/admin/') {
		return;
	}
	if (!Bitrix\Main\Loader::includeModule('iblock')) {
		return;
	}

	$filter = array(
		"IBLOCK_ID" => META_IBLOCK_ID,
		"NAME" => $currentPage,
	);
	$select = array("ID", "PROPERTY_TITLE", "PROPERTY_DESCRIPTION");
	$result = CIBlockElement::GetList(array(), $filter, false, false, $select);
	if ($match = $result->Fetch()) {
		$APPLICATION->SetPageProperty('title',$match['PROPERTY_TITLE_VALUE']);
		$APPLICATION->SetPageProperty('description',$match['PROPERTY_DESCRIPTION_VALUE']);
	}
});