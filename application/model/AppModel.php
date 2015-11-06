<?php
/**
 * Created by PhpStorm.
 * User: arjo
 * Date: 03/11/2015
 * Time: 15:02
 */

Class AppModel {

    Public static function createApp () {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "INSERT INTO apps (`app_ID`, `name`, `UUID_slug`, `description`, `created`, `owner_id`, `acces_lvl`, `icon`, `colour`, `active`)
                VALUES (
                    NULL, :app_name, :app_slug, :app_description, :time, :owner_id, :acces_lvl, :icon, :colour, :active
                );";
        $query = $database->prepare($sql);
        $query->execute(
            array(
                ':app_name'         => Request::post('app_name'),
                ':app_slug'         => Request::post('app_slug'),
                ':app_description'  => Request::post('app_description'),
                ':time'             => time(),
                ':owner_id'         => Session::get('user_id'),
                ':acces_lvl'        => Request::post('acces_lvl'),
                ':icon'             => Request::post('icon'),
                ':colour'           => Request::post('colour'),
                ':base_url'         => Request::post('base_url'),
                ':active'           => Request::postCheckbox('active')
            )
        );
        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_APP_CREATION_FAILED'));
        return false;

    }

    public static function enable($app_ID)
    {
        if (!$app_ID) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE apps SET active = :state WHERE app_ID = :app_ID LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':app_ID' => $app_ID, ':state' => true));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_APP_ENABLE_FAILED'));
        return false;
    }

    public static function listApps($state = null){

        $database = DatabaseFactory::getFactory()->getConnection();
        if (isset($state)) {
            $sql = "SELECT * FROM apps WHERE active = :state;";

            $query = $database->prepare($sql);
            $query->execute(array(':state' => $state));

        } else {
            $sql = "SELECT * FROM apps;";

            $query = $database->prepare($sql);
            $query->execute();

        }
        if ($query->rowCount() >= 1) {
            $data = json_decode(json_encode($query->fetchAll()), true);
            return $data;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_APP_LISTING_FAILED'));
        return false;
    }

    public static function disable($app_ID)
    {
        if (!$app_ID) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE apps SET active = :state WHERE app_ID = :app_ID LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':app_ID' => $app_ID, ':state' => false));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_APP_DISABLE_FAILED'));
        return false;
    }



    public static function deleteApp($app_ID) {

        if (!$app_ID) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM apps WHERE app_ID = :app_ID LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':app_ID' => $app_ID));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}