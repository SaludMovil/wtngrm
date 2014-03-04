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

use Desyncr\Wtngrm\Job\JobBase;
use Desyncr\Wtngrm\Job\JobInterface;

/**
 * Class JobServiceBase
 *
 * @category General
 * @package  Desyncr\Wtngrm\Service
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
class JobServiceBase extends ServiceBase
    implements JobServiceInterface
{
    /**
     * Adds a job to be processed
     *
     * @param JobInterface $job Job object
     *
     * @return mixed
     * @throws \Exception
     */
    public function addJob(JobInterface $job)
    {
        array_push($this->jobs, $job);
        return $job;
    }

    /**
     * Add a job to be processed.
     *
     * To be deprecated. Use addJob.
     */
    public function add($key, $job)
    {
        if (!is_object($job)) {
            $job = new JobBase();
            $job->setId($key);
        }
        return $this->addJob($job);
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

    /**
     * dispatch
     *
     * @return mixed
     */
    public function dispatch()
    {
    }
}
 