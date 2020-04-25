<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Unit;

use MikahDev\DataTablesBundle\DataTablesBundle;
use MikahDev\DataTablesBundle\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\ArrayNode;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * DependencyInjectionTest.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class DependencyInjectionTest extends TestCase
{
    public function testConfiguration()
    {
        $config = new Configuration();
        $tree = $config->getConfigTreeBuilder()->buildTree();

        $this->assertInstanceOf(ArrayNode::class, $tree);
    }

    public function testExtension()
    {
        $bundle = new DataTablesBundle();
        $extension = $bundle->getContainerExtension();
        $this->assertSame('datatables', $extension->getAlias());

        $container = new ContainerBuilder();
        $extension->load([], $container);

        // Verify default config, options should be empty
        $config = $container->getParameter('datatables.config');
        $this->assertTrue($config['language_from_cdn']);
        $this->assertEmpty($config['options']);
    }
}
