<?php
namespace Desyncr\Wtngrm\Worker;

interface WorkerInterface {
    public function setUp($sm, $job);
    public function execute($job);
    public function tearDown();
} 
