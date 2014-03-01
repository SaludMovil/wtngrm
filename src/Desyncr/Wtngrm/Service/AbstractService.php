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
abstract class AbstractService implements ServiceInterface
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
     * @return mixed|null
     */
    public function getOption($option)
    {
        if (isset($this->$option)) {
            return $this->$option;
        }
        return null;
    }

    /**
     * add
     *
     * @param String       $key    Job id
     * @param Object|array $job    Job object or array
     * @param null         $target Unused
     *
     * @return mixed
     * @throws \Exception
     */
    public function add($key, $job, $target = null)
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
}
