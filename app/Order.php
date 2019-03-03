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

    public function getPickupAttribute($value)
    {
        if($value == 'pickup')
            return 'Store Pick Up';

        if($value == 'mainland')
            return 'Delivery within Penang Mainland';

        if($value == 'delivery')
            return 'Delivery within Penang Island';

        if($value == 'installation')
            return 'Delivery with installation';
    }
}
