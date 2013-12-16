<?php
namespace Desyncr\Wtngrm\Job;

interface JobInterface {
    public function serialize();
    public function getId();
    public function setId($id);
    public function get($k);
    public function set($k, $v);
}
