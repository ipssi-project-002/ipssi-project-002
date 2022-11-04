<?php

namespace App;

class Utils {
    public static function uuid(string $prefix = '', bool $longer = false) {
        return uniqid($prefix, $longer);
    }

    public static function buildUrl(string $url, array $params = []) {
        $query = http_build_query($params);
        if (empty($query)) {
            return $url;
        } else {
            return "${url}?${query}";
        }
    }

    public static function redirect(string $url, array $params = [], bool $exit_after = false) {
        $redirect_url = self::buildUrl($url, $params);
        header("Location: ${redirect_url}");
        if ($exit_after) {
            exit;
        }
    }
}

?>
