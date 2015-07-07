<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 18/6/15
 * Time: 2:55 PM
 */

function html($text)
{
    return htmlspecialchars($text,ENT_QUOTES,'UTF-8');
}

function htmlout($text)
{
    echo html($text);
}