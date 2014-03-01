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
     * @param Array $options Options array
     *
     * @return mixed
     */
    public function setOptions($options);

    /**
     * getOption
     *
     * @param String $option Option name
     *
     * @return mixed
     */
    public function getOption($option);

    /**
     * add
     *
     * @param String       $key    Job id
     * @param Object|array $job    Job object or array
     * @param null         $target Unused
     *
     * @return mixed
     * @throws \Exception
     */
    public function add($key, $job, $target = null);

    /**
     * dispatch
     *
     * @return mixed
     */
    public function dispatch();
}
