<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<?
// Неавторизованному пользователю данные не выводятся
global $USER;
if ($USER->IsAuthorized()): ?>


	<ul>
        <? foreach ($arResult['AUTHORS'] as $iID => $arAuthor): ?>
			<li>
				[<?= $iID ?>] - <?= $arAuthor['LOGIN'] ?>
				<ul>
                    <? foreach ($arAuthor['NEWS'] as $arNews): ?>
						<li>
							- <?= $arNews['NAME'] ?>
						</li>
                    <? endforeach; ?>
				</ul>
			</li>
        <? endforeach; ?>
	</ul>

<? endif; ?>