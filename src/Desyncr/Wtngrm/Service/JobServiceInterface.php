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

use Desyncr\Wtngrm\Job\JobInterface;

/**
 * Interface JobServiceInterface
 *
 * @package Desyncr\Wtngrm\Service
 */
interface JobServiceInterface extends ServiceInterface
{
    /**
     * addJob
     *
     * @param JobInterface $job Job
     *
     * @return null
     */
    public function addJob(JobInterface $job);

    /**
     * Deprecated. Use AddJob.
     *
     * @param String       $key Job id
     * @param Object|array $job Job object or array
     *
     * @return mixed
     * @throws \Exception
     */
    public function add($key, $job);

    /**
     * dispatch
     *
     * @return mixed
     */
    public function dispatch();
}
 