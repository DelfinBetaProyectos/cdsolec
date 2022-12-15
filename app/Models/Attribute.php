<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attribute extends Model
{
  /**
   * The database connection that should be used by the model.
   *
   * @var string
   */
  protected $connection = 'mysqlerp_extras';

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'tbatrib_categ';

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
    'numcategoria', 'numsubcategoria', 'categoria', 'subcategoria', 'rowid_erp', 'referencia_cds', 
    'referencia_fabricante', 'nombre_producto', 'descripcion', 'recomendaciones', 'alto', 'ancho', 'profundidad', 
    'peso', 'at1', 'at2', 'at3', 'at4', 'at5', 'at6', 'at7', 'at8', 'at9', 'at10', 'at11', 'at12', 'at13', 'at14', 
    'at15', 'at16', 'at17', 'at18', 'at19', 'at20', 'at21', 'at22', 'at23', 'at24', 'at25', 'at26', 'at27', 'at28', 
    'at29', 'at30', 'at31', 'at32', 'at33', 'at34', 'at35', 'at36', 'at37'
  ];

  /**
   * Get the category that owns the attribute.
   */
  public function category()
  {
    $this->connection = DB::connection('mysqlerp');
    
    return $this->belongsTo(Category::class, 'rowid_erp', 'rowid');
  }
}
