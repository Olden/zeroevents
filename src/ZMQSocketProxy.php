<?php
namespace ZeroEvents;

use ZMQContext;

class ZMQSocketProxy
{
    /**
     * @var \ZMQSocket
     */
    protected $socket;

    public function __construct(ZMQContext $context, $type, $persistent_id = null, $on_new_socket = null)
    {
        $this->socket = new \ZMQSocket($context, $type, $persistent_id, $on_new_socket);
    }

    /**
     * @return \ZMQSocket
     */
    public function baseSocket()
    {
        return $this->socket;
    }

    public function __call($name, $parameters)
    {
        return call_user_func_array([$this->socket, $name], $parameters);
    }
}
