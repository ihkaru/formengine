<?php
namespace App\Filament\Resources\RespondenResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\RespondenResource;
use Illuminate\Routing\Router;


class RespondenApiService extends ApiService
{
    protected static string | null $resource = RespondenResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
