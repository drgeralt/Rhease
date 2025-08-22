<?php

class CommonController {
    public function show_thank_you() {
        require_once BASE_PATH . '/app/Views/common/thank_you.php';
    }

    public function show_error() {
        require_once BASE_PATH . '/app/Views/common/error.php';
    }
}
