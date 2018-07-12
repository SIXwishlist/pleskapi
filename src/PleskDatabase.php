<?php

namespace Fkomaralp\PleskAPI;

use App\Settings;
use App\Themes;
use Ifsnop\Mysqldump as IMysqldump;
use PDO;


class PleskDatabase extends BaseRequest
{
    public function get($data)
    {
        $data = [
            "database" => ["get-db" => $data]
        ];

        return parent::request($data)->database->{"get-db"}->result;
    }
    public function create($data)
    {
        $data = [
            "database" => ["add-db" => $data]
        ];

        return parent::request($data)->database->{"add-db"}->result;
    }
    public function delete($data)
    {
        $data = [
            "database" => ["del-db" => $data]
        ];

        return parent::request($data)->database->{"del-db"}->result;
    }
    public function cloneDatabase($options){

        $user = $this->user;

        $database_name_2 = $options["to"];
        $theme = $options["theme"];
        $host = $options["host"];
        $username = $options["username"];
        $password = $options["password"];
        $new_url = $options["options"];
        $wp_pass = $options["wp_password"];
        $settings = Settings::find(1);

        $content = file_get_contents("/var/www/html/theme_databases/" . $theme->name . ".sql");


        $db = new PDO("mysql:host=$host;dbname=$database_name_2", $username, $password);
        $db->exec($content);


            $db2 = new PDO("mysql:host=$host;dbname=$database_name_2", $username, $password);
            $db2->prepare("UPDATE ".$theme->database_prefix."options SET option_value='http://".$new_url."' WHERE option_name='siteurl' AND option_id=1")->execute();
            $db2->prepare("UPDATE ".$theme->database_prefix."options SET option_value='http://".$new_url."' WHERE option_name='home'  AND option_id=2")->execute();
//            $db2->prepare("UPDATE ".$theme->database_prefix."options SET option_value='http://".$new_url."' WHERE option_name='siteurl' AND option_id=1")->execute();
//            $db2->prepare("UPDATE ".$theme->database_prefix."options SET option_value='http://".$new_url."' WHERE option_name='home'  AND option_id=2")->execute();


            $wp_users = "INSERT INTO `".$theme->database_prefix . "users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`,
            `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
            (4, 'editor', '".$wp_pass."', 'editor', '".$user->email."', 'http://".$new_url."/',
                '2011-06-07 00:00:00', '', 0, '".$user->name ." ". $user->lastname. "');";
            $db2->prepare($wp_users)->execute();

            $wp_usermeta = "INSERT INTO `".$theme->database_prefix . "usermeta` (`user_id`, `meta_key`, `meta_value`) VALUES
            (4, '".$theme->database_prefix . "capabilities', 'a:1:{s:6:\"editor\";b:1;}'),
            (4, '".$theme->database_prefix . "user_level', '7'),
            (4, '".$theme->database_prefix . "dashboard_quick_press_last_post_id', ''),
            (4, 'session_tokens', ''),
            (4, 'nickname', 'editor'),
            (4, 'first_name', '".$user->name."'),
            (4, 'last_name', '".$user->lastname."'),
            (4, 'description', ''),
            (4, 'rich_editing', 'true'),
            (4, 'comment_shortcuts', 'false'),
            (4, 'admin_color', 'fresh'),
            (4, 'use_ssl', '0'),
            (4, 'show_admin_bar_front', 'true'),
            (4, 'locale', '');";
            $db2->prepare($wp_usermeta)->execute();

        return true;
    }
}
