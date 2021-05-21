<?php

namespace App\Models;

use App\Queries\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Brand extends Model implements Auditable
{
	use HasFactory;
	use SoftDeletes;
	use \OwenIt\Auditing\Auditable;
  
	/**
	 * The attributes that are mass assignable.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'name', 'image'
	];

	/**
	 * Atributo Url Image.
	 */
	public function getUrlImageAttribute()
	{
		if($this->image) {
			$image = 'storage/brands/'.$this->image;
		} else {
			$image = 'img/42.jpg';
		}

		return $image;
	}

	/**
	 * Search Filters.
	 */
	public function scopeFilterBy($query, QueryFilter $filters, array $data)
	{
		return $filters->applyTo($query, $data);
	}

  /**
   * Get the products for the brand.
   */
  public function products()
  {
    return $this->hasMany(Products::class);
  }
}
