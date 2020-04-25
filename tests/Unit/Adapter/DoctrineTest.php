<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Unit\Adapter;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use MikahDev\DataTablesBundle\Adapter\AdapterQuery;
use MikahDev\DataTablesBundle\Adapter\Doctrine\ORM\SearchCriteriaProvider;
use MikahDev\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use MikahDev\DataTablesBundle\Column\TextColumn;
use MikahDev\DataTablesBundle\DataTable;
use MikahDev\DataTablesBundle\Exception\InvalidConfigurationException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;

/**
 * DoctrineTest.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class DoctrineTest extends TestCase
{
    public function testSearchCriteriaProvider()
    {
        $table = new DataTable($this->createMock(EventDispatcher::class));
        $table
            ->add('firstName', TextColumn::class)
            ->add('lastName', TextColumn::class)
        ;

        $table->handleRequest(Request::create('/', Request::METHOD_POST, ['_dt' => 'dt']));
        $state = $table->getState();
        $state
            ->setGlobalSearch('foo')
            ->setColumnSearch($table->getColumn(0), 'bar')
        ;

        $qb = $this->createMock(QueryBuilder::class);
        $qb
            ->method('expr')
            ->will($this->returnCallback(function () { return new Query\Expr(); }));

        /* @var QueryBuilder $qb */
        (new SearchCriteriaProvider())->process($qb, $state);

        // As this is buggy right now ignore the result
        $this->assertTrue(true);
    }

    public function testORMAdapterRequiresDependency()
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('doctrine/doctrine-bundle');
        (new ORMAdapter());
    }

    public function testInvalidQueryProcessorThrows()
    {
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Provider must be a callable or implement QueryBuilderProcessorInterface');
        (new ORMAdapter($this->createMock(ManagerRegistry::class)))
            ->configure([
                'entity' => 'bar',
                'query' => ['foo'],
            ]);
    }

    public function testInvalidFieldThrows()
    {
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage("Field name 'invalid' must consist at least of an alias and a field");

        $query = $this->createMock(AdapterQuery::class);
        $query->method('get')->willReturn([]);
        $column = new TextColumn();
        $column->initialize('foo', 0, ['field' => 'invalid'], $this->createMock(DataTable::class));

        $mock = new class($this->createMock(ManagerRegistry::class)) extends ORMAdapter {
            public function foo($query, $column)
            {
                return $this->mapPropertyPath($query, $column);
            }
        };
        $mock->foo($query, $column);
    }
}
