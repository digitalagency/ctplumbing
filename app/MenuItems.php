<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    protected $table = 'menu_items';
    protected $fillable = ['label','link','parent','sort','class', 'menu', 'depth'];
    //admin section menu
    // Recursive function that builds the menu from an array or object of items
    // In a perfect world some parts of this function would be in a custom Macro or a View
    public static function buildMenu($menu, $parentid = 0)
    {
        $result = null;
      
        foreach ($menu as $item) {
            if ($item->parent_id == $parentid) {
                $result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
    <div class='dd-handle nested-list-handle'>
      <span class='glyphicon glyphicon-move'></span>
    </div>
    <div class='nested-list-content'>{$item->label}
      <div class='pull-right'>
        <a href='".url("admin/menu/edit/{$item->id}")."'>Edit</a> |
        <a href='#' class='delete_toggle' rel='{$item->id}'>Delete</a>
      </div>
    </div>".Self::buildMenu($menu, $item->id) . "</li>";
            }
        }

        return $result ?  "\n<ul class=\"nav navbar-nav\">\n$result</ul>\n" : null;
    }
    // Getter for the HTML menu builder
    public static function getHTML($items)
    {
        return Self::buildMenu($items);
    }

    //dynamic nested menu to display in frontend
    //access it from AppServiceProvider
    public static function getNestedMenu($menu, $parentid = 0)
    {
        $result = null;

        foreach ($menu as $item) {
            if ($item->parent == $parentid) {
                
                if ($children = Self::haveChildren($menu, $item->id)) {
                    $result .= '<li class="dropdown">';

                    $result .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$item->label .'</a>
                          <ul class="dropdown-menu">
                          
                              <li><a href="#">'.Self::getDropDown($menu, $item->id) .'</a></li>
                          </ul>
                    </li>';
                } else {
                    $result .='<li class="active"><a href="'.url($item->link).'">'.$item->label .'</a></li>';
                }
            }
        }
        $url = url('/');
        //return $result ?  '<ul class="nav navbar-nav"><li class="hvr-ripple-in"><a href="'.$url.'"><i class="fa fa-home" style="font-size: 30px;margin: -10px 0 0 0;"></i></a></li>'.$result.'</ul>' : null;
        return $result ?  '<ul class="nav navbar-nav">'.$result.'</ul>' : null;
    }

    //get dropdown menu
    //if childern exist
    public static function getDropDown($menu, $parentid = 0)
    {
        $result = null;
        foreach ($menu as $item) {
           
            if ($item->parent == $parentid) {
                $children = Self::haveChildren($menu, $item->id);

                if ($children) {
                    $result .= '<li class="dropdown dropdown-submenu">';

                    $result .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$item->label .'</a>
                      <ul class="dropdown-menu">
                          <li><a href="#" tabindex="-1">'.Self::getDropDown($menu, $item->id) .'</a></li>
                      </ul>
                  </li>';
                } else {
                    $result .='<li><a href="'.url($item->link).'">'.$item->label .'</a></li>';
                }
            }
        }
        return $result;
    }


    public static function getMenu($items)
    {
        return Self::getNestedMenu($items);
    }

    //check haveChildren(){}
    //menu is all list
    // itemId is particular row id
    //search and compare menu_id to parent_id
    //if find parent_id return true
    public static function haveChildren($menu, $itemId)
    {
        $return = false;
        foreach ($menu as $item) {
           
            if ($item->parent == $itemId) {
                $return = true;
                
                break;
            }
        }

        return $return;
    }
}
