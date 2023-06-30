<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class ReservationFilter extends ApiFilter {
    protected  $allowedParams = [
        'start' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'end' => ['eq', 'gt', 'lt', 'gte', 'lte'],    
        'gameType' => ['eq'],
        'phoneNumber' => ['eq'],
        'courtId' => ['eq']
    ];

    protected  $columnMap = [
        'gameType' => 'game_type',
        'phoneNumber' => 'users.phone',
        'courtId' => 'court_id',
    ];
}