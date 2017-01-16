<?php

class Mun_Todo_List {
    
    static $table_name = 'tasks';

    public static function plugin_activation() {
        global $mun_db_version;
        global $wpdb;
        $table_name = $wpdb->prefix . self::$table_name;
        if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
            $sql = "CREATE TABLE " . $table_name . " (
                    id bigint(11) NOT NULL AUTO_INCREMENT,
                    name VARCHAR(55) NOT NULL,
                    description VARCHAR(255) NOT NULL,
                    user_id bigint(11) NOT NULL,
                    created_at bigint(11) DEFAULT '0' NOT NULL,
                    UNIQUE KEY id (id)
                    ); ";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
            add_option("mun_db_version", $mun_db_version);
        }
    }
    
    public static function get_user_tasks($user_id) {
        global $wpdb;
        $sql = "SELECT * FROM ". $wpdb->prefix . self::$table_name . " WHERE user_id= ".$user_id.";";
        return $wpdb->get_results($sql, OBJECT_K);
    }
    
    public static function add_task($input) {
        if(isset($input['name']) && !empty($input['name']) && isset($input['description']) && !empty($input['description'])) {
            $name = $input['name'];
            $description = $input['description'];
            global $wpdb;
            return $wpdb->insert( $wpdb->prefix . self::$table_name, array( 'created_at' => current_time('timestamp'), 'name' => $name, 'description' => $description, 'user_id' => get_current_user_id() ) );
        }
    }
}