<?php
/**
 * Created by PhpStorm.
 * User: arjo
 * Date: 03/11/2015
 * Time: 14:41
 */

class StartController extends Controller {
    public function __construct() {
        parent::__construct();
        //Auth::checkAuthentication();
    }

    public function index() {
        Redirect::to('app');
    }



}