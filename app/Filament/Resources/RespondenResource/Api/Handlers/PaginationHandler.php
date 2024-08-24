<?php
namespace App\Filament\Resources\RespondenResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\RespondenResource;

class PaginationHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = RespondenResource::class;


    public function handler()
    {
        $query = static::getEloquentQuery();
        $model = static::getModel();

        $query = QueryBuilder::for($query)
        ->allowedFields($model::getAllowedFields() ?? [])
        ->allowedSorts($model::getAllowedSorts() ?? [])
        ->allowedFilters($model::getAllowedFilters() ?? [])
        ->allowedIncludes($model::getAllowedIncludes() ?? [])
        ->paginate(request()->query('per_page'))
        ->appends(request()->query());

        return static::getApiTransformer()::collection($query);
    }
}
