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
$().ready(function() {
    var target = this.hash;
    var view = $("#easysnippet");
    var insert = function(e) {
        var start_tag = "[!",
        end_tag = "!]",
        snippet = e.target.textContent,
        php_left = "<",
        php_start = "?php",
        include_start = "$this->includeSnippet('",
        include_end = "');",
        php_end = "?>",
        space = " ",
        pagepart = $('.here')[1].hash;

        $(pagepart).find('textarea').insertAtCaret(
            <?php if (Plugin::isEnabled('shortcut')) : ?>
            start_tag + snippet + end_tag + '\n'
            <?php else: ?>
            php_left + php_start + space + include_start + snippet + include_end + space + php_end + '\n'
            <?php endif; ?>
        ).change();
	return false
    };

    view.find("button").click(insert);
});
</script>


