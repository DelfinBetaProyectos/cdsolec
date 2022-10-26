<?php

namespace App\Models;

use App\Queries\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
   * The database connection that should be used by the model.
   *
   * @var string
   */
  protected $connection = 'mysqlerp';

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'llx_categorie';

  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primaryKey = 'rowid';

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'entity', 'fk_parent', 'label', 'ref_ext', 'type', 'description', 'color', 'fk_soc', 'visible', 'date_creation', 
    'tms', 'fk_user_creat', 'fk_user_modif', 'import_key'
  ];

  /**
   * Search Filters.
   */
  public function scopeFilterBy($query, QueryFilter $filters, array $data)
  {
    return $filters->applyTo($query, $data);
  }

  /**
   * Get the parent that owns the category.
   */
  public function parent()
  {
    return $this->belongsTo(Category::class, 'fk_parent', 'rowid');
  }

  /**
   * Get the subcategories for the blog post.
   */
  public function subcategories()
  {
      return $this->hasMany(Category::class, 'fk_parent', 'rowid');
  }

  /**
   * Get the products for the category.
   */
  public function products()
  {
    return $this->hasMany(Products::class);
  }
}
