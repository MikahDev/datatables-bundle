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

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * TextColumn.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class TextColumn extends AbstractColumn
{
    /**
     * {@inheritdoc}
     */
    public function normalize($value): string
    {
        $value = (string) $value;

        return $this->isRaw() ? $value : htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefault('operator', 'LIKE')
            ->setDefault(
                'rightExpr',
                function ($value) {
                    return '%' . $value . '%';
                }
        );

        $resolver
            ->setDefault('raw', false)
            ->setAllowedTypes('raw', 'bool')
        ;

        return $this;
    }

    public function isRaw(): bool
    {
        return $this->options['raw'];
    }
}
