<?php
/**
 * Helper class that provides easy access to useful php string functions.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 */

namespace CNZ\Helpers;

/**
 * Helper class that provides easy access to useful php string functions.
 *
 * Class StringHelpers
 * @package CNZ\Helpers
 */
class StringHelpers
{
    /**
     * Return the remainder of a string after a given value.
     *
     * ### str_after
     * Related global function.
     * ```php
     * str_after( string $search, string $string ): string
     * ```
     *
     * @param string $search
     * @param string $string
     * @return string
     */
    public static function after($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string, 2))[0]);
    }

    /**
     * Get the portion of a string before a given value.
     *
     * ### str_before
     * Related global function.
     * ```php
     * str_before( string $search, string $string ): string
     * ```
     *
     * @param string $search
     * @param string $string
     * @return string
     */
    public static function before($search, $string)
    {
        return $search === '' ? $string : rtrim(explode($search, $string)[0]);
    }

    /**
     * Limit the number of words in a string. Put value of $end to the string end.
     *
     * ### str_limit_words
     * Related global function.
     * ```php
     * str_limit_words( string $string, int $limit = 10, string $end = '...' ): string
     * ```
     *
     * @param  string $string
     * @param  int $limit
     * @param  string $end
     * @return string
     */
    public static function limitWords($string, $limit = 10, $end = '...')
    {
        $arrayWords = explode(' ', $string);

        if (sizeof($arrayWords) <= $limit) {
            return $string;
        }

        return implode(' ', array_slice($arrayWords, 0, $limit)) . $end;
    }

    /**
     * Limit the number of characters in a string. Put value of $end to the string end.
     *
     * ### str_limit
     * Related global function.
     * ```php
     * str_limit( string $string, int $limit = 100, string $end = '...' ): string
     * ```
     *
     * @param  string $string
     * @param  int $limit
     * @param  string $end
     * @return string
     */
    public static function limit($string, $limit = 100, $end = '...')
    {
        if (mb_strwidth($string, 'UTF-8') <= $limit) {
            return $string;
        }

        return rtrim(mb_strimwidth($string, 0, $limit, '', 'UTF-8')) . $end;
    }

    /**
     * Tests if a string contains a given element
     *
     * ### str_contains
     * Related global function.
     * ```php
     * str_contains( string|array $needle, string $haystack ): boolean
     * ```
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function contains($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if (strpos($haystack, $ndl) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Tests if a string contains a given element. Ignore case sensitivity.
     *
     * ### str_icontains
     * Related global function.
     * ```php
     * str_icontains( string|array $needle, string $haystack ): boolean
     * ```
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function containsIgnoreCase($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if (stripos($haystack, $ndl) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string starts with a given substring.
     *
     * ### str_starts_with
     * Related global function.
     * ```php
     * str_starts_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function startsWith($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if ($ndl !== '' && substr($haystack, 0, strlen($ndl)) === (string)$ndl) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string starts with a given substring. Ignore case sensitivity.
     *
     * ### str_istarts_with
     * Related global function.
     * ```php
     * str_istarts_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function startsWithIgnoreCase($needle, $haystack)
    {
        $hs = strtolower($haystack);

        foreach ((array)$needle as $ndl) {
            $n = strtolower($ndl);
            if ($n !== '' && substr($hs, 0, strlen($n)) === (string)$n) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * ### str_ends_with
     * Related global function.
     * ```php
     * str_ends_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function endsWith($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            $length = strlen($ndl);
            if ($length === 0 || (substr($haystack, -$length) === (string)$ndl)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * ### str_iends_with
     * Related global function.
     * ```php
     * str_iends_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function endsWithIgnoreCase($needle, $haystack)
    {
        $hs = strtolower($haystack);

        foreach ((array)$needle as $ndl) {
            $n = strtolower($ndl);
            $length = strlen($ndl);
            if ($length === 0 || (substr($hs, -$length) === (string)$n)) {
                return true;
            }
        }

        return false;
    }
}