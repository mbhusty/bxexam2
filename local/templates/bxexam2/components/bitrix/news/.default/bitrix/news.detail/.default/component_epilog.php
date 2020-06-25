<?php

use Bitrix\Main\Loader;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//<ex2-104>
if ($_GET['TYPE'] == 'REPORT_RESULT') {
    // Формирование строки с результатом, вывод его в "ajax-report-text"
    echo '<script>' . PHP_EOL;
    echo 'var textElem = document.getElementById("ajax-report-text");' . PHP_EOL;
    if ($_GET['ID']) {
        echo 'textElem.innerText = "Ваше мнение учтено, №' . $_GET['ID'] . '";' . PHP_EOL;
    } else {
        echo 'textElem.innerText = "Ошибка";' . PHP_EOL;
    }
    echo '</script>';
} else {
    if (isset($_GET['ID']) && Loader::includeModule('iblock')) {
        $arAnswer = [];

        $sUser = '';
        if ($USER->IsAuthorized()) {
            // ID, Логин, ФИО пользователя
            $sUser = $USER->GetID() . " (" . $USER->GetLogin() . ") " . $USER->GetFullName();
        } else {
            $sUser = "Не авторизован";
        }

        $arFields = [
            // ИБ "Жалобы на новости"
            'IBLOCK_ID'       => 8,
            'NAME'            => 'Новость ' . $_GET['ID'],
            'ACTIVE_FROM'     => ConvertTimeStamp(time(), "FULL"),
            'PROPERTY_VALUES' => [
                'USER' => $sUser,
                'NEWS' => $_GET['ID'],
            ],
        ];

        $oCIBlockElement = new \CIBlockElement();
        if ($iElementId = $oCIBlockElement->Add($arFields)) {
            $arAnswer['ID'] = $iElementId;

            if ($_GET['TYPE'] == 'REPORT_AJAX') {
                $APPLICATION->RestartBuffer();
                echo json_encode($arAnswer);
                exit;
            } elseif ($_GET['TYPE'] == 'REPORT_GET') {
                LocalRedirect($APPLICATION->GetCurPage() . "?TYPE=REPORT_RESULT&ID=" . $arAnswer['ID']);
            }
        } else {
            LocalRedirect($APPLICATION->GetCurPage() . "?TYPE=REPORT_RESULT");
        }
    }
}
//</ex2-104>