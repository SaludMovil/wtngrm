<?php
/**
 * Desyncr\Wtngrm\Worker
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Wtngrm\Worker
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Worker;

use Desyncr\Wtngrm\Job\JobInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class AbstractWorker
 *
 * @category General
 * @package  Desyncr\Wtngrm\Worker
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
abstract class AbstractWorker implements
    WorkerInterface,
    ServiceLocatorAwareInterface
{
    /**
     * @var \Zend\ServiceManager\ServiceLocatorInterface
     */
    protected $sm = null;

    /**
     * @var Object
     */
    protected $job = null;

    /**
     * setUp
     *
     * @param ServiceLocatorInterface $sm  Service Manager
     * @param Object                  $job Job object
     *
     * @return null
     */
    public function setUp(ServiceLocatorInterface $sm, $job)
    {
        $this->setServiceLocator($sm);
        $this->setJob($job);
    }

    /**
     * execute
     *
     * @param JobInterface $job Job object
     *
     * @return mixed
     */
    abstract function execute(JobInterface $job);

    /**
     * tearDown
     *
     * @return mixed
     */
    public function tearDown()
    {
    }

    /**
     * setServiceManager
     *
     * @param ServiceLocatorInterface $sm Service Manager
     *
     * @return null
     */
    public function setServiceLocator(ServiceLocatorInterface $sm)
    {
        $this->sm = $sm;
    }

    /**
     * getServiceManager
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->sm;
    }

    /**
     * setJob
     *
     * @param Object $job Job object
     *
     * @return null
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * getJob
     *
     * @return Object
     */
    public function getJob()
    {
        return $this->job;
    }
}
