<?php
/**
 * Desyncr\Wtngrm\Service
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Wtgnrm\Service
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Service;

use Desyncr\Wtngrm\Job\JobInterface;
use Zend\Stdlib\AbstractOptions;

/**
 * Interface ServiceInterface
 *
 * @package Desyncr\Wtngrm\Service
 */
interface ServiceInterface
{
    /**
     * setOptions
     *
     * @param AbstractOptions $options Options array
     *
     * @return null
     */
    public function setOptions(AbstractOptions $options);

    /**
     * getOptions
     *
     * @return AbstractOptions
     */
    public function getOptions();

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
     * @param String       $key    Job id
     * @param Object|array $job    Job object or array
     * @param null         $target Unused
     *
     * @return mixed
     * @throws \Exception
     */
    public function add($key, $job, $target = null);

    /**
     * dispatch
     *
     * @return mixed
     */
    public function dispatch();
}
