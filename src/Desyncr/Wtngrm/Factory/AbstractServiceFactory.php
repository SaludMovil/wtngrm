<?php
/**
 * Desyncr\Wtngrm\Factory
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Wtngrm\Factory
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class AbstractServiceFactory
 *
 * @category General
 * @package  Desyncr\Wtngrm\Factory
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
abstract class AbstractServiceFactory implements FactoryInterface
{
    /**
     * @var \Zend\ServiceManager\ServiceLocatorInterface
     */
    protected $sm = null;
    /**
     * @var array
     */
    protected $config = null;

    /**
     * @var string
     */
    protected $serviceId = 'wtngrm';

    /**
     * createService
     *
     * @param ServiceLocatorInterface $serviceLocator Service Manager
     *
     * @return array
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $this->setServiceManager($serviceLocator);
        $this->setServiceConfiguration($this->getServiceConfiguration());

        return $this->getServiceConfiguration();
    }

    /**
     * setServiceConfiguration
     *
     * @param Array $configuration Configuration array
     *
     * @return null
     */
    public function setServiceConfiguration($configuration)
    {
        $this->config = $configuration;
    }

    /**
     * getServiceConfiguration
     *
     * @return Array
     */
    public function getServiceConfiguration()
    {
        if (isset($this->config)) {
            return $this->config;
        }

        $configuration = $this->getServiceManager()->get('Config');
        $service = $this->getServiceId();

        return $this->config
            = isset($configuration[$service]) ? $configuration[$service] : array();
    }

    /**
     * setServiceManager
     *
     * @param ServiceLocatorInterface $serviceManager Service Manager
     *
     * @return null
     */
    public function setServiceManager(ServiceLocatorInterface $serviceManager)
    {
        $this->sm = $serviceManager;
    }

    /**
     * getServiceManager
     *
     * @return \Zend\ServiceManager\ServiceLocatorInterface
     */
    public function getServiceManager()
    {
        return $this->sm;
    }

    /**
     * setServiceId
     *
     * @param String $id Service id
     *
     * @return null
     */
    public function setServiceId($id)
    {
        $this->serviceId = $id;
    }

    /**
     * getServiceId
     *
     * @return String
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }
}
