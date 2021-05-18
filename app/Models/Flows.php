<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Flows
 * @package App\Models
 */
class Flows extends Model
{
    use HasFactory;
    use CrudTrait;

    /**
     * @var string
     */
    protected $table = 'flows';

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'settings'];
}
