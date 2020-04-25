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

/**
 * DataTableRendererInterface.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
interface DataTableRendererInterface
{
    /**
     * Provides the HTML layout of the configured datatable.
     */
    public function renderDataTable(DataTable $dataTable, string $template, array $parameters): string;
}
