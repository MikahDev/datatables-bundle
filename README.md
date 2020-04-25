# Symfony DataTables Bundle
[![Latest Stable Version](https://poser.pugx.org/mikahdev/datatables-bundle/version)](https://packagist.org/packages/mikahdev/datatables-bundle)
[![Total Downloads](https://poser.pugx.org/mikahdev/datatables-bundle/downloads)](https://packagist.org/packages/mikahdev/datatables-bundle)
[![Latest Unstable Version](https://poser.pugx.org/mikahdev/datatables-bundle/v/unstable)](//packagist.org/packages/mikahdev/datatables-bundle)
[![License](https://poser.pugx.org/mikahdev/datatables-bundle/license)](https://packagist.org/packages/mikahdev/datatables-bundle)
[![Build Status](https://travis-ci.org/mikahdev/datatables-bundle.svg?branch=master)](https://travis-ci.org/mikahdev/datatables-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mikahdev/datatables-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mikahdev/datatables-bundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mikahdev/datatables-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mikahdev/datatables-bundle/?branch=master)
[![SymfonyInsight](https://img.shields.io/symfony/i/grade/05d79ba2-cba4-4201-a17a-2868c51f9c6c)](https://insight.symfony.com/projects/05d79ba2-cba4-4201-a17a-2868c51f9c6c)

This bundle provides convenient integration of the popular [DataTables](https://datatables.net/) jQuery library
for realtime Ajax tables in your [Symfony](https://symfony.com/) 4.1+ or 5.0+ application.

Unlike other bundles providing similar functionality we decoupled the implementation of the DataTables logic
completely from the source of the data. Therefore it is possible to implement your own custom adapters for
every possible data source. [Doctrine ORM](https://github.com/doctrine/DoctrineBundle), [MongoDB](https://github.com/mongodb/mongo-php-library) and [Elastica](https://github.com/ruflin/Elastica) come bundled. Handling other popular
choices like FOSElasticaBundle and Doctrine DBAL is possible.

## Documentation

[Visit the documentation with extensive code samples](https://mikahdev.github.io/datatables-bundle/).

## Support

Unless you are highly confident your issue stems from a shortcoming of this bundle and needs the original developers
to look at it, please [ask all questions on Stack Overflow](https://stackoverflow.com/search?q=datatables+mikahdev). We
simply don't have a lot of time to spare, so your questions will be answered faster and better over there.

## Contributing

Please see [CONTRIBUTING.md](https://github.com/mikahdev/datatables-bundle/blob/master/CONTRIBUTING.md) for details.

## Legal

This software was developed for internal use at [MikahDev Full Service Internetbureau](https://www.mikahdev.nl/)
in Eindhoven, the Netherlands. It is shared with the general public under the permissive MIT license, without
any guarantee of fitness for any particular purpose. Refer to the included `LICENSE` file for more details.
