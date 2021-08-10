<?php
namespace Modules\Menu\Entities;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['id','name'];
    public function __construct(array $attributes = [])
    {
        //parent::construct( $attributes );
        $this->table = config('menu.table_prefix') . config('menu.table_name_menus');
    }
}
