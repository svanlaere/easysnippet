<?php
/* we keep our single user-configurable option in the database
 *
 * @author Yuli Che. <god.DLL@iCloud.com>
 * @license GPLv3
 *
 */

if (!defined('IN_CMS')) { exit(); }

if (false === Plugin::getSetting('ui', 'easysnippet')) {
  $options = array('ui' =>'select');
  Plugin::setAllSettings($options, 'easysnippet');
}

