<?php
/* we keep our single user-configurable option in the database
 *
 * @author Yuli Che. <god.DLL@iCloud.com>
 * @license GPLv3
 *
 */

if (!defined('IN_CMS')) { exit(); }

$PDO = Record::getConnection();
$driver = strtolower($PDO->getAttribute( Record::ATTR_DRIVER_NAME));

$options = array('ui' =>'select');

Plugin::setAllSettings($options, 'easysnippet');

