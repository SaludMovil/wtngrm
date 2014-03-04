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

use Desyncr\Wtngrm\Options\OptionsBase;

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
     * testCreateService
     *
     * @covers Desyncr\Wtngrm\Factory\ServiceFactory::createService
     *
     * @return null
     */
    public function testCreateService()
    {
        $optionBase = new OptionsBase();
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
