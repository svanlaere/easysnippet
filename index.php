<?php
if (!defined('IN_CMS')) {
    exit();
}

/**
 * Easysnippet
 * 
 * Display snippets in a pagetab
 * 
 * @author      svanlaere
 * @version     0.1.0
 */

Plugin::setInfos(array(
    'id' => 'easysnippet',
    'title' => __('Easysnippet'),
    'description' => __('Add a snippet the easy way'),
    'author' => 'svanlaere',
    'version' => '0.1.0',
    'website' => 'http://svanlaere.nl/',
    'require_wolf_version' => '0.7.3',
    'type' => 'backend'
));

Observer::observe('view_page_edit_tab_links', 'page_snippetslist_tab_link');
Observer::observe('view_page_edit_tabs', 'page_snippetslist_tab');

function page_snippetslist_tab_link($page)
{
    echo '<li class="tab"><a href="#easysnippet">' . __('Easysnippet') . '</a></li>';
}

function page_snippetslist_tab($page)
{
    echo new View(PLUGINS_ROOT . DS . 'easysnippet' . DS . 'views' . DS . 'easysnippet', array(
        'snippets' => grouped_snippets()
    ));
}

function grouped_snippets()
{
    $snippets = Snippet::findAll();
    if ($snippets) {
        foreach ($snippets as $key => $snippet) {
            $new_array                   = $snippet->name[0];
            $new_sel_array[$new_array][] = array(
                'id' => $snippet->id,
                'name' => $snippet->name
            );
        }
        return json_decode(json_encode($new_sel_array));
    } else {
        return false;
    }
}
