<?php
/**
 * Helper class that provides easy access to useful php user functions.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 */

namespace CNZ\Helpers;

/**
 * Helper class that provides easy access to useful php user functions.
 *
 * Class User
 * @package CNZ\Helpers
 */
class User
{
    const LOCALHOST = '127.0.0.1';

    /**
     * Validate a given email address.
     *
     * ### is_email
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_email( string $email ): boolean
     * ```
     *
     * @param string $email
     * @return boolean
     */
    public static function isEmail($email)
    {
        return (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) ? true : false;
    }

    /**
     * Get the current ip address of the user.
     *
     * ### user_ip
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * user_ip(  ): null|string
     * ```
     *
     * @param bool $cli
     * @return null|string
     */
    public static function ip($cli = false)
    {
        if (php_sapi_name() == 'cli' && $cli) {
            return self::LOCALHOST;
        }

        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
    }

    /**
     * Creates a secure hash from a given password. Use the CRYPT_BLOWFISH algorithm.
     * Note: 255 characters for database column recommended!
     *
     * ### crypt_password
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * crypt_password( string $password ): string
     * ```
     *
     * @param string $password
     * @return string
     */
    public static function cryptPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Verifies that a password matches a crypted password (CRYPT_BLOWFISH algorithm).
     *
     * ### crypt_password
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * crypt_password( string $password, string $cryptedPassword ): string
     * ```
     *
     * @param string $password
     * @param string $cryptedPassword
     * @return string
     */
    public static function isPassword($password, $cryptedPassword)
    {
        return password_verify($password, $cryptedPassword);
    }
}