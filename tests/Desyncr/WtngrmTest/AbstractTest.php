<?php
/**
 * Desyncr\WtngrmTest
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\WtngrmTest
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\WtngrmTest;

use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;

/**
 * Class TestBase
 *
 * @category General
 * @package  Desyncr\Wtngrm
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Object
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return null
     */
    protected function setUp()
    {
        $this->setObject($this->getObject());
    }

    /**
     * setObject
     *
     * @param Object $object Object
     *
     * @return null
     */
    protected function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * getObject
     *
     * @return Object
     */
    abstract protected function getObject();

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @return null
     */
    protected function tearDown()
    {
    }

    /**
     * getServiceManagerMock
     *
     * @param array $methods Methods to mock
     *
     * @return Object
     */
    protected function getServiceManagerMock(array $methods = null)
    {
        $methodsMock = $methods ?: array('get', 'has');
        return $this->getMock(
            'Zend\ServiceManager\ServiceLocatorInterface',
            $methodsMock
        );
    }

    /**
     * callMockConstructor
     *
     * @param String                                   $className FQNS class name
     * @param \PHPUnit_Framework_MockObject_MockObject $mock      Mock object
     * @param Array                                    $arguments Arguments
     *
     * @return null
     */
    protected function callMockConstructor(
        $className,
        \PHPUnit_Framework_MockObject_MockObject $mock,
        array $arguments
    ) {
        $reflectedClass = new \ReflectionClass($className);
        $constructor = $reflectedClass->getConstructor();
        $constructor->invoke($mock, $arguments);
    }

    /**
     * getServiceManager
     *
     * @param array $config Configuration
     *
     * @return mixed
     */
    public static function getServiceManager(array $config = null)
    {
        if (!$config
            && !$config = @include __DIR__ . '/../../TestConfiguration.php'
        ) {
            $config = require __DIR__ . '/../../TestConfiguration.php.dist';
        }

        $serviceManager = new ServiceManager(
            new ServiceManagerConfig(
                isset($config['service_manager']) ?
                $config['service_manager'] : array()
            )
        );

        $serviceManager->setService('ApplicationConfig', $config);
        $serviceManager->setFactory(
            'ServiceListener',
            'Zend\Mvc\Service\ServiceListenerFactory'
        );

        /** @var $moduleManager \Zend\ModuleManager\ModuleManager */
        $moduleManager = $serviceManager->get('ModuleManager');
        $moduleManager->loadModules();
        //$serviceManager->setAllowOverride(true);
        return $serviceManager;
    }
}
 