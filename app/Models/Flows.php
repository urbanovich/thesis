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

    protected $guarded = ['id'];

    protected $casts = [
        'extras' => 'array',
    ];

    public function events()
    {
        return $this->belongsToMany(\App\Models\Events::class, 'flow_event', 'flow_id', 'event_id');
    }

    public function templates()
    {
        return $this->belongsToMany(\App\Models\Templates::class, 'flow_template', 'flow_id', 'template_id');
    }
}
