<?php

namespace Sprint\Migration;


class UFTYPES20200622190022 extends Version
{

    protected $description = "";

    public function up()
    {
        $helper = $this->getHelperManager();

            $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_2_SECTION',
  'FIELD_NAME' => 'UF_NEWS_LINK',
  'USER_TYPE_ID' => 'iblock_element',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'Y',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DISPLAY' => 'LIST',
    'LIST_HEIGHT' => 5,
    'IBLOCK_ID' => 1,
    'DEFAULT_VALUE' => '',
    'ACTIVE_FILTER' => 'N',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => '',
    'ru' => 'UF_NEWS_LINK',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => '',
    'ru' => 'UF_NEWS_LINK',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'USER',
  'FIELD_NAME' => 'UF_AUTHOR_TYPE',
  'USER_TYPE_ID' => 'enumeration',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DISPLAY' => 'LIST',
    'LIST_HEIGHT' => 5,
    'CAPTION_NO_VALUE' => '',
    'SHOW_NO_VALUE' => 'Y',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Тип автора',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Тип автора',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'ENUM_VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'группа авторов 1',
      'DEF' => 'Y',
      'SORT' => '500',
      'XML_ID' => 'GROUP_1',
    ),
    1 => 
    array (
      'VALUE' => 'группа авторов 2',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'GROUP_2',
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
