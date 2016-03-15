<?php

/**
* hook_form_FORM_ID_alter
*/
function clocktower_form_search_block_form_alter(&$form, &$form_state, $form_id) {
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
} 