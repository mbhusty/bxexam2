<?php

namespace Sprint\Migration;


class Services20200622185736 extends Version
{

    protected $description = "";

    public function up() {
        $helper = $this->getHelperManager();

            $helper->Iblock()->saveIblockType(array (
  'ID' => 'products',
  'SECTIONS' => 'Y',
  'EDIT_FILE_BEFORE' => NULL,
  'EDIT_FILE_AFTER' => NULL,
  'IN_RSS' => 'N',
  'SORT' => '100',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Товары и услуги',
      'SECTION_NAME' => 'Разделы',
      'ELEMENT_NAME' => 'Товары и услуги',
    ),
    'en' => 
    array (
      'NAME' => 'Products and services',
      'SECTION_NAME' => 'Sections',
      'ELEMENT_NAME' => 'Products and services',
    ),
  ),
));
    
            $iblockId = $helper->Iblock()->saveIblock(array (
  'IBLOCK_TYPE_ID' => 'products',
  'LID' => 
  array (
    0 => 's1',
  ),
  'CODE' => 'furniture_services_s1',
  'API_CODE' => NULL,
  'NAME' => '[s1] Услуги',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'LIST_PAGE_URL' => '#SITE_DIR#/services/',
  'DETAIL_PAGE_URL' => '#SITE_DIR#/services/#ID#/',
  'SECTION_PAGE_URL' => NULL,
  'CANONICAL_PAGE_URL' => NULL,
  'PICTURE' => NULL,
  'DESCRIPTION' => NULL,
  'DESCRIPTION_TYPE' => 'text',
  'RSS_TTL' => '24',
  'RSS_ACTIVE' => 'Y',
  'RSS_FILE_ACTIVE' => 'N',
  'RSS_FILE_LIMIT' => NULL,
  'RSS_FILE_DAYS' => NULL,
  'RSS_YANDEX_ACTIVE' => 'N',
  'XML_ID' => 'furniture_services_s1',
  'INDEX_ELEMENT' => 'Y',
  'INDEX_SECTION' => 'Y',
  'WORKFLOW' => 'N',
  'BIZPROC' => 'N',
  'SECTION_CHOOSER' => 'L',
  'LIST_MODE' => NULL,
  'RIGHTS_MODE' => 'S',
  'SECTION_PROPERTY' => NULL,
  'PROPERTY_INDEX' => NULL,
  'VERSION' => '1',
  'LAST_CONV_ELEMENT' => '0',
  'SOCNET_GROUP_ID' => NULL,
  'EDIT_FILE_BEFORE' => NULL,
  'EDIT_FILE_AFTER' => NULL,
  'SECTIONS_NAME' => 'Разделы',
  'SECTION_NAME' => 'Раздел',
  'ELEMENTS_NAME' => 'Услуги',
  'ELEMENT_NAME' => 'Услуга',
  'EXTERNAL_ID' => 'furniture_services_s1',
  'LANG_DIR' => '/',
  'SERVER_NAME' => '',
));
    
            $helper->Iblock()->saveIblockFields($iblockId, array (
  'IBLOCK_SECTION' => 
  array (
    'NAME' => 'Привязка к разделам',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
    ),
  ),
  'ACTIVE' => 
  array (
    'NAME' => 'Активность',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'Y',
  ),
  'ACTIVE_FROM' => 
  array (
    'NAME' => 'Начало активности',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
  ),
  'ACTIVE_TO' => 
  array (
    'NAME' => 'Окончание активности',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
  ),
  'SORT' => 
  array (
    'NAME' => 'Сортировка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '0',
  ),
  'NAME' => 
  array (
    'NAME' => 'Название',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => '',
  ),
  'PREVIEW_PICTURE' => 
  array (
    'NAME' => 'Картинка для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'FROM_DETAIL' => 'N',
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => '',
      'COMPRESSION' => '',
      'DELETE_WITH_DETAIL' => 'N',
      'UPDATE_WITH_DETAIL' => 'N',
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => NULL,
      'WATERMARK_TEXT_FONT' => NULL,
      'WATERMARK_TEXT_COLOR' => NULL,
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => NULL,
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => NULL,
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => NULL,
      'WATERMARK_FILE_ORDER' => NULL,
    ),
  ),
  'PREVIEW_TEXT_TYPE' => 
  array (
    'NAME' => 'Тип описания для анонса',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'text',
  ),
  'PREVIEW_TEXT' => 
  array (
    'NAME' => 'Описание для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
  ),
  'DETAIL_PICTURE' => 
  array (
    'NAME' => 'Детальная картинка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => '',
      'COMPRESSION' => '',
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => NULL,
      'WATERMARK_TEXT_FONT' => NULL,
      'WATERMARK_TEXT_COLOR' => NULL,
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => NULL,
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => NULL,
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => NULL,
      'WATERMARK_FILE_ORDER' => NULL,
    ),
  ),
  'DETAIL_TEXT_TYPE' => 
  array (
    'NAME' => 'Тип детального описания',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'text',
  ),
  'DETAIL_TEXT' => 
  array (
    'NAME' => 'Детальное описание',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
  ),
  'XML_ID' => 
  array (
    'NAME' => 'Внешний код',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => '',
  ),
  'CODE' => 
  array (
    'NAME' => 'Символьный код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
    ),
  ),
  'TAGS' => 
  array (
    'NAME' => 'Теги',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
  ),
  'SECTION_NAME' => 
  array (
    'NAME' => 'Название',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
  ),
  'SECTION_PICTURE' => 
  array (
    'NAME' => 'Картинка для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'FROM_DETAIL' => 'N',
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'DELETE_WITH_DETAIL' => 'N',
      'UPDATE_WITH_DETAIL' => 'N',
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => NULL,
      'WATERMARK_TEXT_FONT' => NULL,
      'WATERMARK_TEXT_COLOR' => NULL,
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => NULL,
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => NULL,
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => NULL,
      'WATERMARK_FILE_ORDER' => NULL,
    ),
  ),
  'SECTION_DESCRIPTION_TYPE' => 
  array (
    'NAME' => 'Тип описания',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
  ),
  'SECTION_DESCRIPTION' => 
  array (
    'NAME' => 'Описание',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
  ),
  'SECTION_DETAIL_PICTURE' => 
  array (
    'NAME' => 'Детальная картинка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => NULL,
      'WATERMARK_TEXT_FONT' => NULL,
      'WATERMARK_TEXT_COLOR' => NULL,
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => NULL,
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => NULL,
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => NULL,
      'WATERMARK_FILE_ORDER' => NULL,
    ),
  ),
  'SECTION_XML_ID' => 
  array (
    'NAME' => 'Внешний код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
  ),
  'SECTION_CODE' => 
  array (
    'NAME' => 'Символьный код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'UNIQUE' => 'N',
      'TRANSLITERATION' => 'N',
      'TRANS_LEN' => 100,
      'TRANS_CASE' => 'L',
      'TRANS_SPACE' => '-',
      'TRANS_OTHER' => '-',
      'TRANS_EAT' => 'Y',
      'USE_GOOGLE' => 'N',
    ),
  ),
));
    
    
    
    
    
        }

    public function down()
    {
        $helper = $this->getHelperManager();

        //your code ...
    }

}
