<?php

namespace App;

class Utils {
    public const DATETIME = 'd/m/Y H:i';
    public const DATE = 'd/m/Y';

    public static function uuid(string $prefix = '', bool $longer = false) {
        return uniqid($prefix, $longer);
    }

    public static function buildUrl(string $path, array $params = []) {
        $query = http_build_query($params);
        if (empty($query)) {
            return $path;
        } else {
            return "${path}?${query}";
        }
    }

    public static function redirect(string $path, array $params = [], bool $exit_after = false) {
        $redirect_url = self::buildUrl($path, $params);
        header("Location: ${redirect_url}");
        if ($exit_after) {
            exit;
        }
    }

    public static function formatDate(\DateTime $date, string $format = self::DATETIME) {
        return $date->setTimezone(new \DateTimeZone(DISPLAY_TIMEZONE))->format($format);
    }

    public static function formatPrice(float $price) {
        return number_format($price, 2, ',', ' ') . ' €';
    }
}

?>
