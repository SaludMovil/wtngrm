<?php
/**
 * Desyncr\Wtngrm\Options
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Wtngrm\Options
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Class AbstractOptions
 *
 * @category General
 * @package  Desyncr\Wtngrm\Options
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
class OptionsBase extends AbstractOptions
{
    /**
     * get
     *
     * @param string $property Property name
     *
     * @return mixed
     */
    public function get($property)
    {
        return $this->$property;
    }

    /**
     * set
     *
     * @param string $property Property name
     * @param mixed  $value    Value
     *
     * @return mixed
     */
    public function set($property, $value)
    {
        $this->$property = $value;
    }
}
 