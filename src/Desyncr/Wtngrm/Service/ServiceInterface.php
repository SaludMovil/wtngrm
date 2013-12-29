<?php
namespace Desyncr\Wtngrm\Service;
interface ServiceInterface {
    public function setOptions($options);
    public function getOption($option);
    public function add($key, $job, $target = null);
    public function dispatch();
}
