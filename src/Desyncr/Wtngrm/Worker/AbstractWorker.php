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
abstract class AbstractWorker implements WorkerInterface
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
        $this->setServiceManager($sm);
        $this->setJob($job);
    }

    /**
     * execute
     *
     * @param Object                  $job Job object
     * @param ServiceLocatorInterface $sm  Service Manager
     *
     * @return mixed
     */
    abstract function execute($job, ServiceLocatorInterface $sm);

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
    public function setServiceManager(ServiceLocatorInterface $sm)
    {
        $this->sm = $sm;
    }

    /**
     * getServiceManager
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceManager()
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
