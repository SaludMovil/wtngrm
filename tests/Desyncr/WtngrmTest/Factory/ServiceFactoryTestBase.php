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

use Desyncr\WtngrmTest\AbstractTest;

/**
 * Class AbstractServiceFactoryTestBase
 *
 * @category General
 * @package  Desyncr\WtngrmTest\Factory
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
class ServiceFactoryTestBase extends AbstractTest
{
    /**
     * getObject
     *
     * @return Object
     */
    public function getObject()
    {
        return $this->object ?:
            $this->object = $this->getMockForAbstractClass(
                'Desyncr\Wtngrm\Factory\ServiceFactory'
            );
    }

    /**
     * getBasicConfiguration
     *
     * @return mixed
     */
    public function getBasicConfiguration()
    {
        return array(
            'test' => 1
        );
    }
}