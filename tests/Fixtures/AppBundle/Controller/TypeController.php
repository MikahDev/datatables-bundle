<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Fixtures\AppBundle\Controller;

use MikahDev\DataTablesBundle\DataTable;
use MikahDev\DataTablesBundle\DataTableFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Tests\Fixtures\AppBundle\DataTable\Type\RegularPersonTableType;

/**
 * TypeController.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class TypeController extends AbstractController
{
    public function tableAction(Request $request, DataTableFactory $dataTableFactory)
    {
        $datatable = $dataTableFactory->createFromType(RegularPersonTableType::class)
            ->setName('persons')
            ->setMethod(Request::METHOD_GET)
            ->addOrderBy(1, DataTable::SORT_ASCENDING)
        ;

        return $datatable->handleRequest($request)->getResponse();
    }
}
