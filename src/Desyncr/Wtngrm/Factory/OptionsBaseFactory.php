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
use Desyncr\Wtngrm\Options\OptionsBase;

/**
 * Class OptionsBaseFactory
 *
 * @category General
 * @package  Desyncr\Wtngrm\Factory
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
class OptionsBaseFactory implements FactoryInterface
{
    /**
     * createService
     *
     * @param ServiceLocatorInterface $serviceLocator Service Manager
     *
     * @return OptionsBase
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        return new OptionsBase($config['wtngrm']);
    }
}
