<?php
namespace Desyncr\Wtngrm\Worker;

interface WorkerInterface {
    public static function execute($job);
} 