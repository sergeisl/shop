<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    private $stack = [];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Menu';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'title', 'link', 'position', 'disabled'];

    public function to_list(){
        $menu_free = $this->build_tree($this->form_tree(json_decode($this->all()
                 , false)), 0, 0 ,0);
        $menu_item = array(0 => '');
        foreach ($menu_free as $key => $item){
            $menu_item[$item->id] = $item->title;
        }
            return $menu_item;
        }

    public function to_tree(){
        $this->build_tree($this->form_tree(json_decode(Menu::all(), false)), 0, 0, 0);
        return $this->stack;
    }

    /**
     * @param $list_item
     * @return array|bool
     */
    private function form_tree($list_item){
        if (!is_array($list_item)) {
            return false;
        }
        $tree = [];
        foreach ($list_item as $value) {
            $tree[$value->parent_id][] = $value;
        }
        return $tree;
    }

    /**
     * Generation of a list in a tree view.
     *
     * @param $cats
     * @param $parent_id
     * @param $level
     * @return bool|string
     */
    private function build_tree($cats, $parent_id, $level, $count){
        $pref = '';
        if (is_array($cats) && isset($cats[$parent_id])) {
            if($level !=0){
                for ($x=0; $x<$level; $x++)$pref .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $pref.='└-->';
            }
            foreach ($cats[$parent_id]  as $cat){
                $cat->title = $pref.$cat->title;
                array_push($this->stack,$cat);
                $level++;
                $this->build_tree($cats, $cat->id, $level, $count);
                $level--;
            }

        } else {
            return false;
        }
        return $this->stack;
    }

}
