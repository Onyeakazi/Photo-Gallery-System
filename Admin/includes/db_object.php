<?php

class Db_object {

    public $errors = array();
    public $upload_errors_array = array(

        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Misisng a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload.",

    );

    
    public function set_file($file) {

        if(empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;

        } elseif ($file['error'] !=0) {

            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;

        } else {

            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];

        }

    }// End of set file method.

    protected static $db_table = "users";


    public static function find_all() {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");

    } //End of find all method.


    public static function find_by_id($id) {
        global $database;
        $the_result_set = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");

        return !empty($the_result_set) ? array_shift($the_result_set) : false;

    } //End of find by id method.

    
    public static function find_by_query($sqli) {
        global $database;
        $result_set = $database->query($sqli);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) {

            $the_object_array[] = static::instantiation($row); 
        }

        return $the_object_array;

    } //End of find this query method.

    
    public static function instantiation($found_user) {

        $calling_class = get_called_class();

        $the_object = new $calling_class;

        foreach ($found_user as $the_attribute => $value) {
            
            if($the_object->has_the_attribute($the_attribute)) {

                $the_object->$the_attribute = $value;

            }
        }

        return $the_object;
    }// End of instantiation.

    private function has_the_attribute($the_attribute) {

        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);

    } // End of has attribute.


    protected function properties() {

        $properties = array();

        foreach (static::$db_table_fields as $db_fields) {

            if (property_exists($this, $db_fields)) {
                $properties[$db_fields] = $this->$db_fields;
            }
        }

        return $properties;
    } //End of property method.

    public function create() {
        global $database;

        $properties = $this->clean_properties();

        $sqli = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sqli .= "VALUES ('" . implode("','", array_values($properties)) . "')";


        if ($database->query($sqli)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }

    } //End of Create method.



    public function clean_properties()
    {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {

            $clean_properties[$key] = $database->escape_string($value);

        }

        return $clean_properties;

    } // End of clean properties.


    public function save() {

        return isset($this->id) ? $this->update() : $this->create();
    }// End of save Method.


    public function update() {
        global $database;

        $properties = $this->clean_properties();

        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }


        $sqli = "UPDATE " .static::$db_table . " SET ";
        $sqli .= implode(", ", $properties_pairs);
        $sqli .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sqli);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    } //End of Update Method.


    public function delete() {
        global $database;

        $sqli = "DELETE FROM " .static::$db_table . " ";
        $sqli .= " WHERE id=" . $database->escape_string($this->id);
        $sqli .= " LIMIT 1";

        $database->query($sqli);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    } //End of delete method.

    public static function number() {
        global $database;

        $sqli = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sqli);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }

    
    public function delete_photo() {

        if($this->delete()) {

            $target_path = SITE_ROOT.DS. 'Admin' . DS . $this->upload_directory() . DS . $this->user_image;

            return unlink($target_path) ? true : false;

        } else {
            return false;
        }
    }

}




?>