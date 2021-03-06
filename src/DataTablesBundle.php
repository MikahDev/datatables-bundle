<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MikahDev\DataTablesBundle;

use MikahDev\DataTablesBundle\DependencyInjection\Compiler\LocatorRegistrationPass;
use MikahDev\DataTablesBundle\DependencyInjection\DataTablesExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * DataTablesBundle.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class DataTablesBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new LocatorRegistrationPass());
    }

    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new DataTablesExtension();
    }
}
