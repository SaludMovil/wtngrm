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

use Desyncr\Wtngrm\Service\ServiceBase;
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
class ServiceFactory implements FactoryInterface
{
    /**
     * createService
     *
     * @param ServiceLocatorInterface $serviceLocator Service Manager
     *
     * @return array
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new ServiceBase();
        $service->setServiceLocator($serviceLocator);

        /** @var \Zend\Stdlib\AbstractOptions $options */
        $options = $serviceLocator->get('Desyncr\Wtngrm\Options\OptionsBase');
        $service->setOptions($options);

        return $service;
    }
}
