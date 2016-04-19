<?php

/*
 * (c) Jean-François Lépine <https://twitter.com/Halleck45>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hal\Metrics;
use Hal\Component\Reflected\Klass;
use Hal\Component\Tree\Node;

/**
 * @author Jean-François Lépine <https://twitter.com/Halleck45>
 */
interface NodeMetric {

    /**
     * @param Node $node
     * @return MetricResult
     */
    public function calculate(Node $node);
}