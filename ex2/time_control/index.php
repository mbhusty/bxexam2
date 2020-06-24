<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("ex2-88");
?>
	<p>
		Страница:
		<a href="http://bxexam2.loc/bitrix/admin/perfmon_hit_list.php?lang=ru&set_filter=Y&find_script_name=%2Fproducts%2Findex.php">
			/products/index.php
		</a>
		<br>
		Доля нагрузки: 38.16%
	</p>

	<p>
		Кэш компонента simplecomp2.exam<br>
		- Кеш «по умолчанию»: 42 КБ<br>
		- Кеш при помещении в него только данных, необходимых в некешируемой части: 3 КБ<br>
		- Разница: 39 КБ
	</p>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>