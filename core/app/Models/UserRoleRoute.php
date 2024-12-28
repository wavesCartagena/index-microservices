<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Route;

class UserRoleRoute extends Model
{
    use HasFactory;

    protected $table = 'user_role_routes';
    // protected $fillable = ['code', 'user_role', 'route'];
    protected $primaryKey = 'code';

    public static function getRoutesForRole($role) {

        $routes = UserRoleRoute::where('user_role','=',$role)
            ->join('route','route.code','user_role_routes.route')
            // ->orderByDesc('order')
            ->orderBy('text')
            ->get();
        $response = array();

        for($i=0; $i<sizeof($routes); $i++) {
            $route = Route::find($routes[$i]->route);
            if($route != null) {
                array_push($response, $route);
            }
        }

        return sizeof($response)>0 ? $response : null;
    }
}
