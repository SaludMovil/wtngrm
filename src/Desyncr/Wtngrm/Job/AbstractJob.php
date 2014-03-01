<?php
/**
 * Desync\Wtngrm\Job
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desync\Wtngrm\Job
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Job;

/**
 * Class AbstractJob
 *
 * @category General
 * @package  Desyncr\Wtngrm\Job
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
abstract class AbstractJob implements JobInterface
{
    /**
     * @var null
     */
    protected $id = null;

    /**
     * Construct
     *
     * @param array $arr Options array
     */
    public function __construct(Array $arr = null)
    {
        if (is_null($arr)) {
            return;
        }

        foreach ($arr as $k => $v) {
            $this->set($k, $v);
        }
    }

    /**
     * getId
     *
     * @return String
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * setId
     *
     * @param String $id Job id
     *
     * @return null
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * serialize
     *
     * @return String
     */
    public function serialize()
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * Sets a property for the job
     *
     * @param String $k Option key
     * @param mixed  $v Option value
     *
     * @return null
     */
    public function set($k, $v)
    {
        $this->$k = $v;
    }

    /**
     * Gets a property from the job or null if it's not defined
     *
     * @param String $k Property name
     *
     * @return mixed
     */
    public function get($k)
    {
        return isset($this->$k) ? $this->$k : null;
    }
}
