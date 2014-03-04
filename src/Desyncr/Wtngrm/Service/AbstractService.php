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
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\AbstractOptions;

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
    ServiceInterface,
    ServiceLocatorAwareInterface
{
    /**
     * @var ServiceLocatorInterface Service Manager
     */
    protected $sm;

    /**
     * @var array
     */
    protected $jobs = array();

    /**
     * @var AbstractOptions Options
     */
    protected $options;

    /**
     * setServiceManager
     *
     * @param ServiceLocatorInterface $serviceManager Service Manager
     *
     * @return mixed
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceManager)
    {
        $this->sm = $serviceManager;
    }

    /**
     * getServiceManager
     *
     * @return ServiceManager
     */
    public function getServiceLocator()
    {
        return $this->sm;
    }

    /**
     * setOptions
     *
     * @param AbstractOptions $options Options
     *
     * @return mixed
     */
    public function setOptions(AbstractOptions $options)
    {
        $this->options = $options;
    }

    /**
     * getOptions
     *
     * @return AbstractOptions
     */
    public function getOptions()
    {
        return $this->options;
    }
}
