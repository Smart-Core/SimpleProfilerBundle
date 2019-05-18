<?php

namespace SmartCore\Bundle\SimpleProfilerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

require_once 'Profiler.php';

class SmartSimpleProfilerBundle extends Bundle
{
    public function boot()
    {
        \Profiler::setKernel($this->container->get('kernel'));
        \Profiler::enable();
        \Profiler::init();

        if ($this->container->get('kernel')->getEnvironment() == 'prod' and $this->container->has('smart_simple_profiler.db.logger')) {
            $this
                ->container
                ->get('database_connection')
                ->getConfiguration()
                ->setSQLLogger($this->container->get('smart_simple_profiler.db.logger'))
            ;
        }
    }
}
