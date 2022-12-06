<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class WebStream extends Model
{
    use HasFactory;
    use Sortable;

    public $table = "webstream";

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable=[
        "title",
        "description",
        "tokens_price",
        "type",
        "date_expiration"
    ];

    public $sortable = ['id', 'title', 'description','tokens_price','type','date_expiration'];
}
