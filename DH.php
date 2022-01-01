<?php
/*

DH - The PHP Discord Webhook Helper
Modify $url and $name to suit your needs.
https://github.com/AyrscottLLC/DH

Copyright 2022 Ayrscott, LLC | https://ayrscott.com/

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.

*/
class DH
{
    private static $url = 'https://discord.com/api/webhooks/REPLACE/ME';
    private static $name = 'YourName';

    public static function setName(string $name)
    {
        self::$name = $name;
    }

    public static function setUrl(string $url)
    {
        self::$url = $url;
    }

    public static function log($message)
    {
        // prepare the webhook data
        $headers = ['Content-Type: application/json; charset=utf-8'];
        $POST = ['username' => self::$name, 'content' => $message];

        // Send webhook
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
        $response   = curl_exec($ch);

        // return the response
        return $response;
    }

    public static function logPost()
    {
        return self::log(print_r($_POST, true));
    }

    public static function logGet()
    {
        return self::log(print_r($_GET, true));
    }

    public static function logSession()
    {
        return self::log(print_r($_SESSION, true));
    }

    public static function logCookie()
    {
        return self::log(print_r($_COOKIE, true));
    }

    public static function logServer()
    {
        return self::log(print_r($_SERVER, true));
    }

    public static function logFiles()
    {
        return self::log(print_r($_FILES, true));
    }

    public static function logEnv()
    {
        return self::log(print_r($_ENV, true));
    }
}
