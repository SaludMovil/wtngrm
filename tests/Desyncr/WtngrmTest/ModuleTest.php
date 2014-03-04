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

use Desyncr\Wtngrm\Module;

/**
 * @covers Desyncr\Wtngrm\Module
 */
class ModuleTest extends ModuleTestBase
{
    /**
     * testGetAutoloaderConfig
     *
     * @return mixed
     */
    public function testGetAutoloaderConfig()
    {
        $module = new Module();
        // just testing ZF specification requirements
        $this->assertInternalType('array', $module->getAutoloaderConfig());
    }

    /**
     * testGetConfig
     *
     * @return mixed
     */
    public function testGetConfig()
    {
        $module = new Module();
        // just testing ZF specification requirements
        $this->assertInternalType('array', $module->getConfig());
    }
}
