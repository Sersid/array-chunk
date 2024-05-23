<?php
declare(strict_types=1);

function lazy_chunk(array $array, int $length, bool $preserve_keys = false): iterable
{
    $count = count($array);
    for ($i = 0; $count > 0; $i++) {
        $result = array_slice($array, $length * $i, $length, $preserve_keys);
        yield $preserve_keys ? $result : array_values($result);
        $count -= $length;
    }
}