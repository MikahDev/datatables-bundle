<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MikahDev\DataTablesBundle\Adapter\Doctrine\ORM;

use Doctrine\ORM\QueryBuilder;
use MikahDev\DataTablesBundle\DataTableState;

/**
 * QueryBuilderProviderInterface.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
interface QueryBuilderProcessorInterface
{
    public function process(QueryBuilder $queryBuilder, DataTableState $state);
}
