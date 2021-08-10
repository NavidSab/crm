<?php
namespace Modules\Menu\Entities;
use Illuminate\Database\Eloquent\Model;
class MenuItems extends Model
{
    protected $table="menu_items";
    protected $fillable = ['label', 'link', 'parent', 'sort', 'class', 'menu', 'depth', 'role_id'];
    public function __construct(array $attributes = [])
    {
        //parent::construct( $attributes );
        $this->table = config('menu.table_prefix') . config('menu.table_name_items');
    }
}
