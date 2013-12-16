<?php
namespace Desyncr\Wtngrm\Service;
interface ServiceInterface {
    public function setOptions($options);
    public function add($key, $job);
    public function dispatch();
}
