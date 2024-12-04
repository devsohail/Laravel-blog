<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes, HasFactory;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_name', 
        'company_logo', 
        'company_description', 
        'monthly_rate', 
        'zip_code', 
        'image_area_1', 
        'image_area_2', 
        'image_area_3', 
        'image_area_4', 
        'header_image',
        'is_internet',
        'is_cable_tv',
        'is_phone',
        'is_featured',
        'contract_length',
        'connection_type',
        'speed',
        'text_area_1',
        'text_area_2',
        'text_area_3',
        'text_area_4',
        'slug',
        'is_auto_searchable'
    ];

    

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
    public function zipCodes()
    {
        return $this->belongsTo(ZipCode::class,'id','company_id');
    }
}

