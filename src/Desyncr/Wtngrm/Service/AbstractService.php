<?php
/**
 * Desyncr\Wtngrm\Service
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Wtngrm\Service
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Service;

use Desyncr\Wtngrm\Job\BaseJob;
use Desyncr\Wtngrm\Job\JobInterface;

/**
 * Class AbstractService
 *
 * @category General
 * @package  Desyncr\Wtngrm\Service
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
abstract class AbstractService implements
    ServiceInterface
{
    /**
     * @var array
     */
    protected $jobs = array();

    /**
     * @var array
     */
    protected $targets = array();

    /**
     * setOptions
     *
     * @param Array $options Options array
     *
     * @return null
     */
    public function setOptions($options)
    {
        foreach ($options as $k => $v) {
            $this->$k = $v;
        }
    }

    /**
     * getOption
     *
     * @param String $option Option key
     *
     * @return null
     */
    public function getOption($option)
    {
        if (isset($this->$option)) {
            return $this->$option;
        }
    }

    /**
     * Adds a job to be processed
     *
     * @param String       $key    Job key
     * @param array|Object $job    Job object
     * @param null         $target Target (unused)
     *
     * @return mixed
     * @throws \Exception
     */
    public function addJob($key, $job, $target = null)
    {
        if (!is_object($job)) {
            $job = new BaseJob($job);
        }

        if (!$job instanceOf JobInterface) {
            throw new \Exception('Job must implement JobInterface');
        }

        $job->setId($key);
        $this->jobs[] = $job;
        return $job;
    }

    /**
     * Add a job to be processed.
     *
     * To be deprecated. Use addJob.
     */
    public function add($key, $job, $target = null)
    {
        return $this->addJob($key, $job, $target);
    }

    /**
     * getJobs
     *
     * @return Array
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}
