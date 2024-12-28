<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiMessage extends Model
{
    protected $table = 'api_messages';
    protected $fillable = ['code', 'message', 'http_status'];
    protected $primaryKey = 'code';
}
