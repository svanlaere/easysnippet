<div id="easysnippet" class="page" style="display: block;">
<div title="<?php echo __('Easysnippet'); ?>" id="div-image">
<?php if ($snippets) : ?>    
<?php foreach($snippets as $key => $snippet) : ?>
<button disabled=""><b><?php echo strtoupper( $key); ?></b></button>
<?php $for_limit = count($snippet); ?>
<?php for($sel_inc = 0; $sel_inc < $for_limit; $sel_inc ++) : ?>
<button value="<?php echo $snippet[$sel_inc]->id; ?>"><?php echo sprintf('%s', $snippet[$sel_inc]->name); ?></button>
<?php endfor; ?>
<?php endforeach; ?>
<?php else: ?>
<p><?php echo __('There are no snippets found'); ?></p>
<?php endif; ?>
</div>
</div>
<script type="text/javascript" charset="utf-8">
$(Easysnippet('buttons', <?=Plugin::isEnabled('shortcut')
                           ? '["[!", "!]"]'
                           : 'null' ?>));
</script>


