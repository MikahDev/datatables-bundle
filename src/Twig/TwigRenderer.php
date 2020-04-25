<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MikahDev\DataTablesBundle\Twig;

use MikahDev\DataTablesBundle\DataTable;
use MikahDev\DataTablesBundle\DataTableRendererInterface;
use MikahDev\DataTablesBundle\Exception\MissingDependencyException;
use Twig\Environment;

/**
 * TwigRenderer.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class TwigRenderer implements DataTableRendererInterface
{
    /** @var Twig_Environment */
    private $twig;

    /**
     * DataTableRenderer constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig = null)
    {
        if (null === ($this->twig = $twig)) {
            throw new MissingDependencyException('You must have symfony/twig-bundle installed to use the default Twig based DataTables rendering');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function renderDataTable(DataTable $dataTable, string $template, array $parameters): string
    {
        $parameters['datatable'] = $dataTable;

        return $this->twig->render($template, $parameters);
    }
}
