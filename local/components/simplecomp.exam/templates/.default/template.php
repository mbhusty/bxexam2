<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc; ?>
<div class="news-products-list">
    <h3><?= Loc::getMessage("MESS_ELEMENT_COUNT") ?> - <?=$arResult["PRODUCTS_COUNT"]?></h3>
    <hr>
    <b><?= Loc::getMessage("MESS_CATALOG_TITLE") ?></b>
    <ul>
        <? foreach ($arResult["NEWS"] as $newsItem): ?>


            <? // ex2-58
            $sElementId = $arResult["ID"] . $newsItem["ID"];

            $this->AddEditAction($sElementId, $newsItem["EDIT_LINK"],
                CIBlock::GetArrayByID($newsItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($sElementId, $newsItem["EDIT_LINK"],
                CIBlock::GetArrayByID($newsItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                array("CONFIRM" => GetMessage("EX2_58_ELEMENT_DELETE_CONFIRM")));
            ?>


        <div id="<?= $this->GetEditAreaId($sElementId)?>">
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
        </div>
        <? endforeach; ?>
    </ul>
</div>
