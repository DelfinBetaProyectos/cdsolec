<?php

namespace App\Queries;

class ProductFilter extends QueryFilter
{
  public function rules(): array
  {
    return [
			'search' => 'filled',
		];
	}

  public function search($query, $search)
  {
		if(empty($search)) {
			return $query;
    }

    return $query->where(function ($query) use ($search) {
      $query->where('label', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%");
    });
	}
}