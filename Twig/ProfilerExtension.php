<?php

namespace SmartCore\Bundle\SimpleProfilerBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ProfilerExtension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('simple_profiler', [$this, 'simpleProfiler'], ['is_safe' => ['html']]),
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
