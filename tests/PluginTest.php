<?php

namespace afBackendName\Tests;

use afBackendName\afBackendName as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'afBackendName' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['afBackendName'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
