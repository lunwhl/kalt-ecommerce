<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    public function getAnyCountAttribute()
    {
    	$count = 0;

    	$count += $this->installation_type == 'Any';
    	$count += $this->horsepower == 'Any';
    	$count += $this->aircond_type == 'Any';
    	$count += $this->refrigerant_gas == 'Any';
    	$count += $this->feature == 'Any';
    	return $count;
    }	
}
