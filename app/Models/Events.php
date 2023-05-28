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
 * @property int $event_type_id
 * @property int $customer_id
 * @property Customers $customer
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

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function getCustomerFullName()
    {
        return $this->customer->first_name . ' ' . $this->customer->last_name;
    }
}
