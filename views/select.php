<div id="easysnippet" class="page" style="display: block;">
<div title="<?php echo __('Easysnippet'); ?>" id="div-image">
<?php if ($snippets) : ?>    
<select>
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
<button style='display:none'><?php echo __('Add again'); ?></button>
<?php else: ?>
<p><?php echo __('There are no snippets found'); ?></p>
<?php endif; ?>
</div>
</div>
<script type="text/javascript" charset="utf-8">
$(Easysnippet('select'));
</script>


