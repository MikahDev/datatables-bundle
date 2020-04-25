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
 * NumberColumn.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class NumberColumn extends AbstractColumn
{
    /**
     * {@inheritdoc}
     */
    public function normalize($value): string
    {
        $value = (string) $value;
        if (is_numeric($value)) {
            return $value;
        }

        return $this->isRaw() ? $value : (string) floatval($value);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

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

    /**
     * @param string $value
     * @return bool
     */
    public function isValidForSearch($value)
    {
        return is_numeric($value);
    }
}
