<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MikahDev\DataTablesBundle\Adapter;

use MikahDev\DataTablesBundle\DataTableState;

/**
 * AdapterInterface.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
interface AdapterInterface
{
    /**
     * Provides initial configuration to the adapter.
     */
    public function configure(array $options);

    /**
     * Processes a datatable's state into a result set fit for further processing.
     */
    public function getData(DataTableState $state): ResultSetInterface;
}
