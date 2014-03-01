<?php
/**
 * Wtngrm configuration
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Wtngrm
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
return array(
    /**
     * Configure factories
     */
    'factories' => array(
        'Desyncr\Wtngrm\Service\AbstractService' => 'Desyncr\Wtngrm\Factory\AbstractServiceFactory'
    )
);
