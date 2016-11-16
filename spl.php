<?php
/**
 * SPL提供的四种常用的数据结构 实例
 */


//队列 先进先出
$queue = new SplQueue();
$queue->enqueue('data_1'.PHP_EOL);
$queue->enqueue('data_2'.PHP_EOL);
$queue->enqueue('data_3'.PHP_EOL);
echo $queue->dequeue();
echo $queue->dequeue();
echo $queue->dequeue();

echo '<hr>';

//栈 先进后出
$stack = new SplStack();
$stack->push('ysz_1'.PHP_EOL);
$stack->push('ysz_2'.PHP_EOL);
$stack->push('ysz_3'.PHP_EOL);
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();

echo '<hr>';

//堆,最小堆
$heap = new SplMinHeap();
$heap->insert('heap 1'.PHP_EOL);
$heap->insert('heap 2'.PHP_EOL);
$heap->insert('heap 3'.PHP_EOL);
echo $heap->extract();
echo $heap->extract();
echo $heap->extract();

echo '<hr>';

//固定尺寸的数据
$fixedArr =  new SplFixedArray(10);
$fixedArr[0] = 50;
$fixedArr[5] = 30;
var_dump($fixedArr);
