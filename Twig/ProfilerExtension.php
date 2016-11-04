<?php

namespace SmartCore\Bundle\SimpleProfilerBundle\Twig;

class ProfilerExtension extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('simple_profiler', [$this, 'simpleProfiler'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @return string
     */
    public function simpleProfiler($isDetailed = false)
    {
        \Profiler::render($isDetailed);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'simple_profiler_extension';
    }
}
