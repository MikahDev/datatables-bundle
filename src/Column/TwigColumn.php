<?php

/*
 * Symfony DataTables Bundle
 * (c) MikahDev Internetbureau B.V. - https://mikahdev.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MikahDev\DataTablesBundle\Column;

use MikahDev\DataTablesBundle\Exception\MissingDependencyException;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Twig\Environment;

/**
 * TwigColumn.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class TwigColumn extends AbstractColumn
{
    /** @var Environment */
    private $twig;

    /**
     * TwigColumn constructor.
     */
    public function __construct(Environment $twig = null)
    {
        if (null === ($this->twig = $twig)) {
            throw new MissingDependencyException('You must have TwigBundle installed to use ' . self::class);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function render($value, $context)
    {
        return $this->twig->render($this->getTemplate(), [
            'row' => $context,
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function normalize($value)
    {
        return $value;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setRequired('template')
            ->setAllowedTypes('template', 'string')
        ;

        return $this;
    }

    public function getTemplate(): string
    {
        return $this->options['template'];
    }
}
