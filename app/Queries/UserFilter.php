<?php

namespace App\Queries;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserFilter extends QueryFilter
{
	public function rules(): array
	{
		return [
			'search' => 'filled',
      'from' => 'date_format:d/m/Y',
      'to' => 'date_format:d/m/Y'
		];
	}

  public function search($query, $search)
  {
		if(empty($search)) {
			return $query;
    }
    
    return $query->where(function ($query) use ($search) {
      $query->where('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('identification', 'like', "%{$search}%")
            ->orWhere('phone', 'like', "%{$search}%");
    });
	}

	public function from($query, $date)
  {
  	$date = Carbon::createFromFormat('d/m/Y', $date);

    return $query->whereDate('created_at', '>=', $date);
  }

  public function to($query, $date)
  {
  	if(empty($date)) {
			return $this;
		}

    $date = Carbon::createFromFormat('d/m/Y', $date);

    return $query->whereDate('created_at', '<=', $date);
  }
}