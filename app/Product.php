<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeremie
 * Date: 12/12/2017
 * Time: 16:16
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['titre', 'description', 'image', 'prix', 'user_id', 'is_plat'];


}