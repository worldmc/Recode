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

    public function index()
    {
        $this->View->renderWithoutHeaderAndFooter('app/index', array(
            'apps' => AppModel::getAps(),
            'acces_to' => Appmodel::getPerms(),
        ));
    }

    public function create() {
        Auth::checkAdminLVL1();
        Appmodel::createApp();
        Redirect::home('admin');
    }

    public function delete() {
        Auth::checkAdminLVL1();
        Appmodel::DeleteApp();
        Redirect::home('admin');
    }
}
