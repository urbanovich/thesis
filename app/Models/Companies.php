<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Companies
 * @package App\Models
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property bool $is_deleted
 * @property string $created_at
 * @property string $updated_at
 */
class Companies extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'companies';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function lists()
    {
        $user = Auth::guard('backpack')->user();
        /*file_put_contents(
            $_SERVER['DOCUMENT_ROOT'] . '/log.txt',
            print_r($user->id, true) .
            print_r(__FILE__, true)
        );*/
        return $this->belongsToMany(
            Lists::class,
            'company_list',
            'company_id',
            'list_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
