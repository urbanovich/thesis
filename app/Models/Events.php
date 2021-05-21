<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Events
 * @package App\Models
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property json $data
 * @property string $created_at
 * @property string $updated_at
 */
class Events extends Model
{
    use HasFactory;
    use CrudTrait;

    /**
     * @var string
     */
    protected $table = 'events';

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'data'];
}
