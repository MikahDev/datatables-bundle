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
 * DateTimeColumn.
 *
 * @author Niels Keurentjes <niels.keurentjes@mikahdev.com>
 */
class DateTimeColumn extends AbstractColumn
{
    /**
     * {@inheritdoc}
     */
    public function normalize($value)
    {
        if (null === $value) {
            return $this->options['nullValue'];
        }

        if (!$value instanceof \DateTimeInterface) {
            if (!empty($this->options['createFromFormat'])) {
                $value = \DateTime::createFromFormat($this->options['createFromFormat'], (string) $value);
                if (false === $value) {
                    $errors = \DateTime::getLastErrors();
                    throw new \Exception(implode(', ', $errors['errors'] ?: $errors['warnings']));
                }
            } else {
                $value = new \DateTime((string) $value);
            }
        }

        return $value->format($this->options['format']);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefaults([
                'createFromFormat' => '',
                'format' => 'c',
                'nullValue' => '',
            ])
            ->setAllowedTypes('createFromFormat', 'string')
            ->setAllowedTypes('format', 'string')
            ->setAllowedTypes('nullValue', 'string')
        ;

        return $this;
    }
}
