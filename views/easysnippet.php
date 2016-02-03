<div id="easysnippet" class="page" style="display: block;">
<div title="<?php echo __('Easysnippet'); ?>" id="div-image">
<?php if ($snippets) : ?>    
<p><?php echo __('Easysnippet info'); ?></p>
<label for="snippets"><?php echo __('Snippets alphabetically'); ?></label><br />
<select name="snippets" id="snippets">
<option value="0"><?php echo __('Select a snippet'); ?></option>
<?php foreach($snippets as $key => $snippet) : ?>
<optgroup label="<?php echo $key; ?>">
<?php $for_limit = count($snippet); ?>
<?php for($sel_inc = 0; $sel_inc < $for_limit; $sel_inc ++) : ?>
<option value="<?php echo $snippet[$sel_inc]->id; ?>"><?php echo sprintf('%s', $snippet[$sel_inc]->name); ?></option>
<?php endfor; ?>
</optgroup>
<?php endforeach; ?>
</select>
<?php else: ?>
<p><?php echo __('There are no snippets found'); ?></p>
<?php endif; ?>
</div>
</div>
<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function($) {
        var target = this.hash;
        $("select[name='snippets'] option:lt(1)").attr("disabled", "disabled");
        $("#snippets").change(function() {
            var start_tag = "[!";
                end_tag = "!]";
                snippet = $("#snippets option:selected").text();
                php_left = "<";
				php_start = "?php";
                include_start = "$this->includeSnippet('";
                include_end = "');";
                php_end = "?>";
                space = " ";
                pagepart = $('.here')[1].hash;

            $(pagepart).find('textarea').val(function(_, val) {
                <?php if (Plugin::isEnabled('shortcut')) : ?>
                return val + start_tag + snippet + end_tag + '\n';
                <?php else: ?>
                return val +  php_left + php_start + space + include_start + snippet + include_end + space + php_end + '\n';
                <?php endif; ?>
            });
        });
    });
</script>
