<?php

namespace Core;

/**
 * Track down and clean invalid datas
 */
class Validator
{
    /**
     * @var bool $error
     */
    private $error;

    /**
     * Detect and delete SQL injection and JS script
     *
     * @param string $entries
     * @return string
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
     * @return bool
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
