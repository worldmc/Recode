<?php
/**
 * Created by PhpStorm.
 * User: arjo
 * Date: 03/11/2015
 * Time: 14:41
 */

class AppController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //Auth::checkAuthentication();
    }

    public function listaps(){
        $this->View->renderJSON(AppModel::getAps());
    }

    public function index()
    {
        $this->View->renderWithoutHeaderAndFooter('app/index');
    }

    public function enable($app_ID) {
        Auth::checkAdminLVL1();
        AppModel::enable($app_ID);
        Redirect::to('admin');
    }

    public function disable($app_ID) {
        Auth::checkAdminLVL1();
        AppModel::disable($app_ID);
        Redirect::to('admin');
    }

    public function create() {
        Auth::checkAdminLVL2();
        Appmodel::createApp();
        Redirect::to('admin');
    }

    public function delete($app_ID) {
        Auth::checkAdminLVL2();
        Appmodel::deleteApp($app_ID);
        Redirect::to('admin');
    }
}
