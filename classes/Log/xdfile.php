<?php

require_once 'Log/file.php';

class Log_xdfile extends Log_file
{

    function log($message, $priority = null)
    {
        if (is_array($message))
        {
            $parts = array();

            if (isset($message['message'])) {
                $parts[] = $message['message'];
                unset($message['message']);
            }

            if (count($message) > 0) {
                $nonMessageParts = array();

                while (list($key, $value) = each($message)) {
                    $nonMessageParts[] = "$key: $value";
                }

                $parts[] = '(' . implode(', ', $nonMessageParts) . ')';
            }

            return parent::log(implode(' ', $parts), $priority);
        }
        else
        {
            return parent::log($message, $priority);
        }
    }
}

