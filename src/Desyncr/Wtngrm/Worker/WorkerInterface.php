<?php
namespace Desyncr\Wtngrm\Worker;

interface WorkerInterface {
    public function execute($job, $sm);
} 