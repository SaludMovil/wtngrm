<?php
/**
 * Desyncr\WtngrmTest\Job
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\WtngrmTest\Job
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\WtngrmTest\Job;

use Desyncr\Wtngrm\Job\JobBase;
use Desyncr\WtngrmTest\AbstractTest;

/**
 * Class AbstractJobTest
 *
 * @category General
 * @package  Desyncr\Wtngrm\Job
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
class AbstractJobTest extends AbstractTest
{
    /**
     * getObject
     *
     * @return mixed
     */
    public function getObject()
    {
        return $this->object ?:
            $this->object = $this->getMockForAbstractClass(
                'Desyncr\Wtngrm\Job\AbstractJob'
            );
    }

    /**
     * testSet
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::set
     *
     * @return null
     */
    public function testSet()
    {
        $val = 'test value';
        $object = new JobBase();
        $object->set('key', $val);
        $this->assertEquals($val, $object->get('key'));
    }

    /**
     * testSetArray
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::set
     *
     * @return null
     */
    public function testSetArray()
    {
        $this->setObject(new JobBase());
        $val = array('key' => 'value');
        $this->object->set('array', $val);
        $this->assertEquals($val, $this->object->array);
        $this->assertEquals($val['key'], $this->object->array['key']);
    }

    /**
     * testSetContructNonArray
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::set
     *
     * @return null
     */
    public function testSetContructNonArray()
    {
        $this->markTestIncomplete();
    }

    /**
     * testGet
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::get
     *
     * @return null
     */
    public function testGet()
    {
        $this->assertEquals(null, $this->object->get('id'));
    }

    /**
     * testGetNonExistingProperty
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::get
     *
     * @return null
     */
    public function testGetNonExistingProperty()
    {
        $this->assertEquals(null, $this->object->get('non-existing'));
    }

    /**
     * testGetArray
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::get
     *
     * @return null
     */
    public function testGetArray()
    {
        $array = array('id' => '123');
        $this->object->set('array', $array);
        $this->assertEquals($array, $this->object->get('array'));
    }

    /**
     * testGetBadName
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::get
     *
     * @return null
     */
    public function testGetBadName()
    {
        $val = 'it works... for some reason';
        $this->object->set('this-is-weird', $val);
        $this->assertEquals($val, $this->object->get('this-is-weird'));
    }

    /**
     * testGetIdUnsetted
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::getId
     *
     * @return null
     */
    public function testGetIdUnsetted()
    {
        $this->assertEquals(null, $this->object->getId());
    }

    /**
     * testSetId
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::setId
     *
     * @return null
     */
    public function testSetId()
    {
        $id = 'test.id';
        $this->object->setId($id);

        $this->assertEquals($id, $this->object->getId());
    }

    /**
     * testSetIdConstruct
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::setId
     *
     * @return null
     */
    public function testSetIdConstruct()
    {
        $job = array('id' => 'test.id');

        $object = $this->getObject();
        $this->callMockConstructor(
            'Desyncr\Wtngrm\Job\AbstractJob',
            $object,
            $job
        );

        $this->assertEquals($job['id'], $object->getId());
    }

    /**
     * testSetIdOverride
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::setId
     *
     * @return null
     */
    public function testSetIdOverride()
    {
        $job = array('id' => 'test.id');
        $object = $this->getObject();
        $this->callMockConstructor(
            'Desyncr\Wtngrm\Job\AbstractJob',
            $object,
            $job
        );

        $override = 'other.id';
        $object->setId($override);
        $this->assertEquals($override, $object->getId());
    }


    /**
     * testSerialize
     *
     * @covers Desyncr\Wtngrm\Job\AbstractJob::serialize
     *
     * @return null
     */
    public function testSerialize()
    {
        $id = 'test.id';
        $this->object->setId($id);
        $obj = \json_decode($this->object->serialize());

        $res = new \StdClass;
        $res->id = $id;
        $this->assertEquals($res, $obj);
    }
}
