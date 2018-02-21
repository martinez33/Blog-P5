<?php

namespace Core;

/**
 * Repère et nettoie les données invalides.
 */
class Validator
{
    /**
     * @var bool
     */
    private $error;

    /**
     * Detecte et supprime les injections SQL.
     *
     * et les scripts JS
     *
     * @param string $entries
     *
     * @return string $clean
     */
    public function checkSQL($entries)
    {
        $regex = '#<[\n\r\s]*script[^>]*['.
        ' \n\r\s]*(type\s?=\s?"text\/javascript")*>.*?<[\n\r\s]*\/script[^>]*>#i';
        $replace = '';

        $sql = [
            'INSERT' => '',
            'UPDATE' => '',
            'DELETE' => '',
            'OR' => '',
            'WHERE' => '',
        ];

        $search = preg_match($regex, $entries, $matches);

        if (null != $search) {
            $this->error = true;

            $entriesCleanJS = preg_replace($regex, $replace, $entries);

            $clean = strtr($entriesCleanJS, $sql);
        } else {
            $clean = strtr($entries, $sql);

            if ($clean !== $entries) {
                $this->error = true;
            }
        }

        return $clean;
    }

    /**
     * @return $this->error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param bool $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
}
