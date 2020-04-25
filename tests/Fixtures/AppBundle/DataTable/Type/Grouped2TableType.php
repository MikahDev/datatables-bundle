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
use MikahDev\DataTablesBundle\Column\TextColumn;
use MikahDev\DataTablesBundle\DataTable;
use MikahDev\DataTablesBundle\DataTableTypeInterface;
use Tests\Fixtures\AppBundle\DataTable\Adapter\CustomORMAdapter;
use Tests\Fixtures\AppBundle\Entity\Company;

/**
 * GroupedTableType.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class Grouped2TableType implements DataTableTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function configure(DataTable $dataTable, array $options)
    {
        $dataTable
            ->add('company', TextColumn::class, ['propertyPath' => '[0][name]'])
            ->add('employeeCount', TextColumn::class, ['propertyPath' => '[employeeCount]'])
            ->createAdapter(CustomORMAdapter::class, [
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
