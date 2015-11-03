<?php
/**
 * Created by PhpStorm.
 * User: arjo
 * Date: 03/11/2015
 * Time: 14:41
 */

class StartControllers extends Controller {
    public function __construct() {
        parent::__construct();
        Auth::checkAuthentication();
    }

    public function index() {
        $this->View->renderWithoutHeaderAndFooter('start/start');
    }



}