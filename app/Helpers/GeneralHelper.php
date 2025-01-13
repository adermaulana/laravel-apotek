<?php

if (!function_exists('getStatusColor')) {
    function getStatusColor($status)
    {
        return match ($status) {
            'Pending' => 'warning',
            'Confirmed' => 'success',
            'Rejected' => 'danger',
            default => 'secondary',
        };
    }
}
