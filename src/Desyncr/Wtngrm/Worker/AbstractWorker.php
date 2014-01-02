<?php
namespace Desyncr\Wtngrm\Worker;

abstract class AbstractWorker implements WorkerInterface {
    protected $sm = null;
    protected $job = null;

    public function setUp($sm, $job) {
        $this->sm = $sm;
        $this->job = $job;
    }

    public function tearDown() {}

}
