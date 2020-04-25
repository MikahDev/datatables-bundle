<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MikahDev\DataTablesBundle\Adapter\Doctrine;

/**
 * Available events.
 *
 * @author Maxime Pinot <contact@maximepinot.com>
 */
final class ORMAdapterEvents
{
    /**
     * The PRE_QUERY event is dispatched after the QueryBuilder
     * built the Query and before the iteration starts.
     *
     * It can be useful to configure the cache.
     *
     * @Event("MikahDev\DataTablesBundle\Adapter\Doctrine\Event\ORMAdapterQueryEvent")
     */
    const PRE_QUERY = 'mikahdev_datatables.ormadapter.pre_query';
}
