<?php
/**
 * Desyncr\Wtngrm\Job
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Wtngrm\Job
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Job;

/**
 * Interface JobInterface
 *
 * @package Desyncr\Wtngrm\Job
 */
interface JobInterface
{
    /**
     * serialize
     *
     * @return String
     */
    public function serialize();

    /**
     * getId
     *
     * @return String
     */
    public function getId();

    /**
     * setId
     *
     * @param String $id Job id
     *
     * @return null
     */
    public function setId($id);

    /**
     * Gets a property from the job or null if it's not defined
     *
     * @param String $k Property name
     *
     * @return mixed
     */
    public function get($k);

    /**
     * Sets a property for the job
     *
     * @param String $k Option key
     * @param mixed  $v Option value
     *
     * @return null
     */
    public function set($k, $v);
}
