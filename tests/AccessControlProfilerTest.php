<?php

namespace Hexis\AccessControlProfilerBundle\Tests;

use Hexis\AccessControlProfilerBundle\DependencyInjection\AccessControlProfilerExtension;
use Hexis\AccessControlProfilerBundle\AccessControlProfilerBundle;
use PHPUnit\Framework\TestCase;

class AccessControlProfilerTest extends TestCase
{
    public function testGetContainerExtension(): void
    {
        $bundle = new AccessControlProfilerBundle();
        $this->assertInstanceOf(AccessControlProfilerExtension::class, $bundle->getContainerExtension());
    }
}
