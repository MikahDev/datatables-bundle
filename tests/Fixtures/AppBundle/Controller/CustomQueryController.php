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

use MikahDev\DataTablesBundle\DataTableFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\Fixtures\AppBundle\DataTable\Type\CustomQueryTableType;

/**
 * CustomQueryController.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class CustomQueryController extends AbstractController
{
    public function tableAction(Request $request, DataTableFactory $dataTableFactory)
    {
        $datatable = $dataTableFactory->createFromType(CustomQueryTableType::class)
            ->setMethod(Request::METHOD_GET);
        if ($datatable->handleRequest($request)->isCallback()) {
            return $datatable->getResponse();
        }

        throw new NotFoundHttpException('This exception must never be triggered');
    }
}
