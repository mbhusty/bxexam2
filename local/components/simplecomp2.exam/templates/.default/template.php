<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc; ?>

<b><?= Loc::getMessage("CATALOG_TITLE_EX2") ?></b>
<? $sCurPage = $APPLICATION->GetCurPage() . "?F=Y"; ?>
Тест фильтра: <a href="<?= $sCurPage ?>"><?= $sCurPage ?></a>
<ul>
    <? foreach ($arResult["CLASS"] as $arClass): ?>
        <li><b><?= $arClass["NAME"] ?></b></li>
        <ul>
            <? foreach ($arClass["ELEMENTS_ID"] as $iID): ?>
                <li>
                    <? $arEl = $arResult["ELEMENTS"][$iID]; ?>
                    <a href="<?= $arEl["DETAIL_PAGE_URL"] ?>">
                        <?= $arEl["NAME"] ?>
                        - <?= $arEl["PROPS"]["PRICE"]["VALUE"] ?>
                        - <?= $arEl["PROPS"]["MATERIAL"]["VALUE"] ?>
                    </a><?=$arEl["DETAIL_PAGE_URL"]?>
                </li>
            <? endforeach; ?>
        </ul>
    <? endforeach; ?>
</ul>
<? echo $arResult["NAV_STRING"] ?>