<?php
define("ROOT_DIR", $_SERVER["DOCUMENT_ROOT"]);

/**
 * Обработчики
 */
if (file_exists(ROOT_DIR . '/local/php_interface/includes/event_handlers.php')) {
    require_once(ROOT_DIR . '/local/php_interface/includes/event_handlers.php');
}
/**
 * Агенты
 */
if (file_exists(ROOT_DIR . '/local/php_interface/includes/agents.php')) {
    require_once(ROOT_DIR . '/local/php_interface/includes/agents.php');
}