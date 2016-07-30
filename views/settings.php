<?php
/*
 * @author Yuli Che. <god.DLL@iCloud.com>
 * @author Martijn van der Kleijn <martijn.niji@gmail.com>
 * @copyright Martijn van der Kleijn, 2010
 * @license GPLv3
 *
 */

if (!defined('IN_CMS')) { exit(); }
?>


<h1><?php echo __('Easysnippet Appearance'); ?></h1>
<form action="<?php echo get_url('plugin/easysnippet/save'); ?>" method="post">
    <table class="fieldset" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td class="label"><label for="options[ui]"><?php echo __('Use'); ?>: </label></td>
            <td class="field">
		<select name="options[ui]">
		<option value="select" <?php if($ui == "select") echo 'selected ="";' ?>><?php echo __('Long menu'); ?></option>
		<option value="buttons" <?php if($ui == "buttons") echo 'selected ="";' ?>><?php echo __('Snippet buttons'); ?></option>
		</select>
            </td>
            <td class="help"><?php echo __('Menu or buttons?'); ?></td>
            </tr>
        </table>
    </fieldset>
    <br/>
    <p class="buttons">
        <input class="button" name="commit" type="submit" accesskey="s" value="<?php echo __('Save'); ?>" />
    </p>
</form>

<script type="text/javascript">
// <![CDATA[
    function setConfirmUnload(on, msg) {
        window.onbeforeunload = (on) ? unloadMessage : null;
        return true;
    }

    function unloadMessage() {
        return '<?php echo __('You have modified this page.  If you navigate away from this page without first saving your data, the changes will be lost.'); ?>';
    }

    $(document).ready(function() {
        // Prevent accidentally navigating away
        $(':input').bind('change', function() { setConfirmUnload(true); });
        $('form').submit(function() { setConfirmUnload(false); return true; });
    });
// ]]>
</script>

