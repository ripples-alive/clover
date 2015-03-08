<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午12:17
 */

namespace Clover\Http\Controllers;

class CommentController extends Controller {

    public function __construct()
    {
        $this->middleware('userFilter');
    }

    public function getList()
    {
        // TODO
    }

    public function postAdd()
    {
        // TODO
    }

} 