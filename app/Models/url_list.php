<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class url_list extends Model
{
    use HasFactory;

    protected $fillable =["Original_url",'short_url',"user_ip","visits","Total_visits"];
}
