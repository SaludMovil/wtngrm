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
     * Wtngrm Module configuration
     */
    'wtngrm' => array(),

    /**
     * Configure factories
     */
    'factories' => array(
        'Desyncr\Wtngrm\Options\OptionsBase' => 'Desyncr\Wtngrm\Factory\OptionsBaseFactory',
        'Desyncr\Wtngrm\Service\ServiceBase' => 'Desyncr\Wtngrm\Factory\ServiceFactory'
    ),
);
