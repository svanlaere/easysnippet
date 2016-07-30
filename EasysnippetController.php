<?php
/* we keep our single user-configurable option in the database
 *
 * @author Yuli Che. <god.DLL@iCloud.com>
 * @author Martijn van der Kleijn <martijn.niji@gmail.com>
 * @copyright Martijn van der Kleijn, 2010
 * @license GPLv3
 *
 */

if (!defined('IN_CMS')) { exit(); }


class EasysnippetController extends PluginController {

    function __construct() {
        $this->setLayout('backend');
        //$this->assignToLayout('sidebar', new View('../../plugins/multi_lang/views/sidebar'));
    }

    public function settings() {
        $this->display('easysnippet/views/settings', Plugin::getAllSettings('easysnippet'));
    }

    function save() {
	$options = $_POST['options'];

        $ret = Plugin::setAllSettings($options, 'easysnippet');

        if ($ret)
            Flash::set('success', __('The settings have been updated.'));
        else
            Flash::set('error', 'An error has occurred while trying to save the settings.');

        redirect(get_url('plugin/easysnippet/settings'));
	}
}

