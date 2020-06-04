<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc; ?>
<div class="news-products-list">
    <h3><?= Loc::getMessage("MESS_ELEMENT_COUNT") ?> - <?=$arResult["PRODUCTS_COUNT"]?></h3>
    <hr>
    <b><?= Loc::getMessage("MESS_CATALOG_TITLE") ?></b>
    <ul>
        <? foreach ($arResult["NEWS"] as $newsItem): ?>
            <li>
                <?= "<b>{$newsItem["NAME"]}</b> - {$newsItem["ACTIVE_FROM"]}"?> (<?= implode(", ", $newsItem["SECTION_NAME"]) ?>)
                <ul>
                    <? foreach ($newsItem["PRODUCTS"] as $product): ?>
                        <li>
                            <?= "{$product["NAME"]} - {$product["PROPERTY_PRICE_VALUE"]} - {$product["PROPERTY_MATERIAL_VALUE"]} - {$product["PROPERTY_ARTNUMBER_VALUE"]}" ?>
                        </li>
                    <? endforeach; ?>
                </ul>
            </li>
        <? endforeach; ?>
    </ul>
</div>
