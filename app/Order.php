<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSent;

class Order extends Model
{
	protected $guarded = [];
	
    public function items()
    {
    	return $this->hasMany('App\Item');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value;
        if( $value == 'sent')
        {
            Mail::to($this->shipping_email)->send(new OrderSent($this));
        }
    }
}
