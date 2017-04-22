<?php

require_once "vendor/autoload.php";

function foo($m)
{
    dump($m);
    return "<a href='{$m[1]}'>{$m[2]}</a>";
}

// 1 Search
// 2 Replace
// 3 Split

$str = 'hello visit my web site http://tut.by http://onliner.by https://ya.ru http://pl.com';
$re = '#((?:ht|f)tps?://([^.]+)\.\w{2,10})#ui';
$replacement = '<a href="$1">$2</a>';

if (preg_match_all($re, $str, $m, PREG_OFFSET_CAPTURE|PREG_SET_ORDER)) {
    dump($m);
}

dump(preg_replace_callback($re, 'foo', [
    'http://tut.by http://tut.by',
    'hello http://tut.by',
    'http://tut.by world',
    '.!.',
]));


dump(
    preg_split("/ /", $str)
);

/*echo preg_replace($re, $replacement, $str, 2, $cnt);
echo $cnt;*/