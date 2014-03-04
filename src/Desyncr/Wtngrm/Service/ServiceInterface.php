<?php
/**
 * Desyncr\Wtngrm\Service
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Wtgnrm\Service
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Service;

use Zend\Stdlib\AbstractOptions;

/**
 * Interface ServiceInterface
 *
 * @package Desyncr\Wtngrm\Service
 */
interface ServiceInterface
{
    /**
     * setOptions
     *
     * @param AbstractOptions $options Options array
     *
     * @return null
     */
    public function setOptions(AbstractOptions $options);

    /**
     * getOptions
     *
     * @return AbstractOptions
     */
    public function getOptions();
}
