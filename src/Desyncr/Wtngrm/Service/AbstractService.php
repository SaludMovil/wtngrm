<?php
namespace Desyncr\Wtngrm\Service;
use \Desyncr\Wtngrm\Job\BaseJob;

abstract class AbstractService implements ServiceInterface {
    protected $jobs = array();
    protected $targets = array();

    public function setOptions($options) {
        foreach ($options as $k => $v) {
            $this->$k = $v;
        }
    }

    public function getOption($option) {
        if (isset($this->$option)) {
            return $this->$option;
        }
    }

    public function add($key, $job, $target = null) {

        if (!is_object($job)) {
            $job = new BaseJob($job);
        }

        if (!$job instanceOf \Desyncr\Wtngrm\Job\JobInterface) {
            throw new \Exception('Job must implement JobInterface');
        }

        $job->setId($key);

        $this->jobs[] = $job;

        return $job;
    }
}
