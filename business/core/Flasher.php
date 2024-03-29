<?php
class Flasher {
    public static function setFlash($message, $type) {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type,
        ];
    }

    public static function flash() {
        if(isset($_SESSION['flash']['message'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . '
                px-4 py-3 rounded" role="alert">' .
                $_SESSION['flash']['message'] .
            '</div>';

            unset($_SESSION['flash']);
        }
    }
}
