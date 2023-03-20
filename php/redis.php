<?php

$redis = new Redis();
//Connecting to Redis
$redis->connect('redis-13390.c8.us-east-1-2.ec2.cloud.redislabs.com', 13390);
$redis->auth('djEi2Rlq5UWFuXFvzJ7J4EAIUyJkjRfn');

if ($redis->ping()) {
 echo "PONG";
}

?>