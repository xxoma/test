<?php

require __DIR__ . '/vendor/autoload.php';

if (empty($argv[1])) {
    exit('Please provide input string argument' . PHP_EOL);
}

$inputString = $argv[1];

exit(checkBracketsBalance($inputString) ? 'Brackets balance is correct' . PHP_EOL : 'Brackets balance is incorrect' . PHP_EOL);

function checkBracketsBalance($inputString = null): bool
{
    if (!$inputString) {

        return false;
    }

    $stack = new \Ds\Stack();

    foreach (str_split($inputString) as $symbol) {
        if ($symbol === '{' || $symbol === '(') {
            $stack->push($symbol);
        }

        if ($symbol === '}' || $symbol === ')') {
            if (count($stack) > 0) {
                $lastSymbol = $stack->peek();
                if (($symbol === '}' && $lastSymbol === '{') || ($symbol == ')' && $lastSymbol === '(')) {
                    $stack->pop();
                }
            } else {

                return false;
            }

        }
    }

    return count($stack) === 0;
}