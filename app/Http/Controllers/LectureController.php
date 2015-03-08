<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午12:13
 */

namespace Clover\Http\Controllers;

class LectureController extends Controller {

    public function __construct()
    {
        $this->middleware('userFilter');
    }

    public function getList()
    {
        // TODO
    }

    public function getInfo()
    {
        // TODO
    }

    public function postAdd()
    {
        // TODO
    }

} 