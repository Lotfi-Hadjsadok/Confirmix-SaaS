<?php

define('CURRENCY', 'DZD');


function withCurrency($price)
{
    return $price . ' ' . CURRENCY;
}
