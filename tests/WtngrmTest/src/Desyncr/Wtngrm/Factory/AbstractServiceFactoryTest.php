<?php
namespace Desyncr\Wtngrm\Factory;

class ConcreteServiceFactory extends AbstractServiceFactory {}
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-12-21 at 20:29:05.
 */
class AbstractServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractServiceFactory
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ConcreteServiceFactory;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Desyncr\Wtngrm\Factory\AbstractServiceFactory::createService
     * @todo   Implement testCreateService().
     */
    public function testCreateService()
    {
        $mock = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface', array('get', 'has'));

        $mock->expects($this->once())
                 ->method('get')
                 ->with($this->equalTo('Config'));

        $service = new ConcreteServiceFactory();
        $service->createService($mock);
    }

    /**
     * @covers Desyncr\Wtngrm\Factory\AbstractServiceFactory::createService
     * @todo   Implement testCreateService().
     */
    public function testCreateServiceReadConfig()
    {
        $config = array('wtngrm' => array('test' => 1));

        $mock = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface', array('get', 'has'));

        $mock->expects($this->once())
                 ->method('get')
                 ->with($this->equalTo('Config'))
                 ->will($this->returnValue($config));

        $service = new ConcreteServiceFactory();
        $return = $service->createService($mock);

        $this->assertEquals($config['wtngrm'], $return);
    }

    /**
     * @covers Desyncr\Wtngrm\Factory\AbstractServiceFactory::createService
     * @todo   Implement testCreateService().
     */
    public function testCreateServiceNoConfiguration()
    {
        $config = array();

        $mock = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface', array('get', 'has'));

        $mock->expects($this->once())
                 ->method('get')
                 ->with($this->equalTo('Config'))
                 ->will($this->returnValue($config));

        $service = new ConcreteServiceFactory();
        $return = $service->createService($mock);

        $this->assertEquals(array(), $return);
    }


}
