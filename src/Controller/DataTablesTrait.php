<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MikahDev\DataTablesBundle\Controller;

use MikahDev\DataTablesBundle\DataTable;
use MikahDev\DataTablesBundle\DataTableFactory;
use Psr\Container\ContainerInterface;

@trigger_error('MikahDev\DataTablesBundle\Controller\DataTablesTrait is deprecated. Use dependency injection to inject the MikahDev\DataTablesBundle\DataTableFactory service instead.', E_USER_DEPRECATED);

/**
 * DataTablesTrait.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 *
 * @property ContainerInterface $container
 *
 * @deprecated inject the DataTableFactory in your controllers or actions instead
 */
trait DataTablesTrait
{
    /**
     * Creates and returns a basic DataTable instance.
     *
     * @param array $options Options to be passed
     * @return DataTable
     */
    protected function createDataTable(array $options = [])
    {
        return $this->container->get(DataTableFactory::class)->create($options);
    }

    /**
     * Creates and returns a DataTable based upon a registered DataTableType or an FQCN.
     *
     * @param string $type FQCN or service name
     * @param array $typeOptions Type-specific options to be considered
     * @param array $options Options to be passed
     * @return DataTable
     */
    protected function createDataTableFromType($type, array $typeOptions = [], array $options = [])
    {
        return $this->container->get(DataTableFactory::class)->createFromType($type, $typeOptions, $options);
    }
}
