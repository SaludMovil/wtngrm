<?php
/**
 * Desyncr\Wtngrm\Worker
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Wtngrm\Worker
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Worker;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Interface WorkerInterface
 *
 * @package Desyncr\Wtngrm\Worker
 */
interface WorkerInterface
{
    /**
     * setUp
     *
     * @param ServiceLocatorInterface $sm  Service Manager
     * @param Object                  $job Job object
     *
     * @return mixed
     */
    public function setUp(ServiceLocatorInterface $sm, $job);

    /**
     * execute
     *
     * @param Object $job Job object
     *
     * @return mixed
     */
    public function execute($job);

    /**
     * tearDown
     *
     * @return mixed
     */
    public function tearDown();
} 
