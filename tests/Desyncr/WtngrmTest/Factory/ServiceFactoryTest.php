<?php
/**
 * Desyncr\WtngrmTest\Factory
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\WtngrmTest\Factory
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\WtngrmTest\Factory;

use Desyncr\Wtngrm\Factory\ServiceFactory;
use Desyncr\Wtngrm\Options\OptionsBase;
use Desyncr\Wtngrm\Service\ServiceBase;

/**
 * Class ServiceFactoryTest
 *
 * @category General
 * @package  Desyncr\WtngrmTest\Factory
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
class ServiceFactoryTest extends ServiceFactoryTestBase
{
    /**
     * testInstanceService
     *
     * @return mixed
     */
    public function testInstanceService()
    {
        $service = new ServiceBase();
        $class = 'Desyncr\Wtngrm\Service\ServiceBase';
        $this->assertInstanceOf($class, $service);

        $service = $this->getMock($class);
        $this->assertInstanceOf($class, $service);

        $abstract = 'Desyncr\Wtngrm\Service\AbstractService';
        $interface = 'Desyncr\Wtngrm\Service\ServiceInterface';
        $service = $this->getMockForAbstractClass($abstract);
        $this->assertTrue(is_a($service, $interface));
    }

    /**
     * testInstanceFactory
     *
     * @return mixed
     */
    public function testInstanceFactory()
    {
        $factory = new ServiceFactory();
        $class = 'Desyncr\Wtngrm\Factory\ServiceFactory';
        $this->assertInstanceOf($class, $factory);

        $factory = $this->getMock($class);
        $this->assertInstanceOf($class, $factory);

        $factory = $this->getServiceManager()->get(
            'Desyncr\Wtngrm\Service\ServiceBase'
        );
        $this->assertNotNull($factory);
    }

    /**
     * testInstanceFactoryMock
     *
     * @return mixed
     */
    public function testInstanceFactoryMock()
    {
        $this->markTestIncomplete('Mocking facktories doesnt work');

        $serviceManagerMock = $this->getServiceManagerMock();
        $serviceManagerMock->setFactory(
          'Desyncr\Wtngrm\Service\ServiceBase',
            'Desyncr\Wtngrm\Factory\ServiceFactory'
        );
        $serviceManagerMock->expects($this->at(1))
            ->method('get')
            ->with(
                $this->equalTo('Desyncr\Wtngrm\Factory\ServiceFactory')
            )
            ->will($this->returnValue(new ServiceBase()));

        $serviceManagerMock->get(
            'Desyncr\Wtngrm\Service\ServiceBase'
        );
    }

    /**
     * testCreateService
     *
     * @covers Desyncr\Wtngrm\Factory\ServiceFactory::createService
     *
     * @return null
     */
    public function testCreateService()
    {
        $optionBase = new OptionsBase();
        /** @var \Zend\ServiceManager\ServiceLocatorInterface $serviceManagerMock */
        $serviceManagerMock = $this->getServiceManagerMock();

        $serviceManagerMock->expects($this->once())
            ->method('get')
            ->with(
                $this->equalTo('Desyncr\Wtngrm\Options\OptionsBase')
            )
            ->will(
                $this->returnValue(
                    $optionBase
                )
            );

        $this->markTestIncomplete('Mocking facktories doesnt work');
        $result = $this->getObject()->createService($serviceManagerMock);
        $this->assertInstanceOf('Desyncr\Wtngrm\Service\ServiceBase', $result);
    }

    /**
     * testBasicOptionsBaseConfigOverwrite
     *
     * @return mixed
     */
    public function testBasicOptionsBaseConfigOverwrite()
    {
        $configuration = $this->getBasicConfiguration();
        $optionBaseMock = $this->getMock(
            'Desyncr\Wtngrm\Options\OptionsBase',
            array('setTest', 'getTest')
        );

        $optionBaseMock->expects($this->once())
            ->method('setTest')
            ->with($this->equalTo($configuration['test']));

        // TODO use getConstructor
        $optionBaseMock->setFromArray($configuration);
    }

    /**
     * testCreateServiceWithConfiguration
     *
     * @covers Desyncr\Wtngrm\Factory\ServiceFactory::createService
     *
     * @return null
     */
    public function testCreateServiceWithConfiguration()
    {
        $configuration = $this->getBasicConfiguration();

        $optionBaseMock = $this->getMock(
            'Desyncr\Wtngrm\Options\OptionsBase',
            array('setTest')
        );

        $optionBaseMock->expects($this->once())
            ->method('setTest')
            ->with(
                $this->equalTo($configuration['test'])
            );

        $this->callMockConstructor(
            'Desyncr\Wtngrm\Options\OptionsBase',
            $optionBaseMock,
            $configuration
        );

        $serviceManager = $this->getServiceManager();

        $return = $this->getObject()->createService($serviceManager);

        $this->assertNotInstanceOf('Desyncr\Wtngrm\Options\OptionsBase', $return);
    }
}
