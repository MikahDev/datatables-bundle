<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Fixtures\AppBundle\DataTable\Type;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use MikahDev\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use MikahDev\DataTablesBundle\Column\TextColumn;
use MikahDev\DataTablesBundle\DataTable;
use MikahDev\DataTablesBundle\DataTableTypeInterface;
use Tests\Fixtures\AppBundle\Entity\Company;

/**
 * GroupedTableType.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class GroupedTableType implements DataTableTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function configure(DataTable $dataTable, array $options)
    {
        $dataTable
            ->add('name', TextColumn::class, ['field' => 'c.name'])
            ->add('employeeCount', TextColumn::class)
            ->createAdapter(ORMAdapter::class, [
                'entity' => Company::class,
                'hydrate' => Query::HYDRATE_ARRAY,
                'query' => function (QueryBuilder $builder) {
                    $builder
                        ->select('c')
                        ->addSelect('count(e) AS employeeCount')
                        ->from(Company::class, 'c')
                        ->leftJoin('c.employees', 'e')
                        ->groupBy('c.id')
                    ;
                },
            ])
        ;
    }
}
