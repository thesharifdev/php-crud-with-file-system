<?php

namespace Sharif\PhpCrudStarterKit;

class App
{

    public static $instance;
    private $data_location = "./data/json_files/data.json"; 

    /**
     * Singleton instance
     * 
     * @return App
     */
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new App();
        }
        return self::$instance;
    }

    /**
     *Create record
     *
     * @param $data
     * @return string
     */
    public function create($new_data){
        
        if(!empty($new_data)){ 
            
            $id = time(); 
            $new_data['id'] = $id; 
            $json_data = file_get_contents($this->data_location); 
            $data = json_decode($json_data, true); 
            $data = !empty($data) ? array_filter( $data ) :$ data; 

            if(!empty($data)){ 
                array_push($data, $new_data); 
            }else{ 
                $data[] = $new_data; 
            }

            $insert = file_put_contents($this->data_location, json_encode($data)); 
             
            return $insert ? $id : false; 
        }else{ 

            return false; 
        } 
    }

    /**
     * Update record
     * 
     * @param $data
     * @return string
     */
    public function update($id, $updated_data){

        if(!empty($updated_data) && is_array($updated_data) && !empty($id)){ 

            $json_data = file_get_contents($this->data_location); 
            $data = json_decode($json_data, true); 
             
            foreach ($data as $key => $value) { 

                if ($value['id'] == $id) { 
                    if(isset($updated_data['name'])){ 
                        $data[$key]['name'] = $updated_data['name']; 
                    } 
                    if(isset($updated_data['email'])){ 
                        $data[$key]['email'] = $updated_data['email']; 
                    } 
                    if(isset($updated_data['phone'])){ 
                        $data[$key]['phone'] = $updated_data['phone']; 
                    } 
                    if(isset($updated_data['country'])){ 
                        $data[$key]['country'] = $updated_data['country']; 
                    } 
                } 
            } 
            $update = file_put_contents($this->data_location, json_encode($data)); 
             
            return $update ? true : false; 
        }else{ 

            return false; 
        } 
    }

    /**
     * Delete record
     * 
     * @param $data
     * @return string
     */
    public function delete($id){

        $json_data = file_get_contents($this->data_location); 
        $data = json_decode($json_data, true); 
             
        $new_data = array_filter($data, function ($var) use ($id) { 

            return ($var['id'] != $id); 
        });

        $delete = file_put_contents($this->data_location, json_encode($new_data)); 

        return $delete ? true : false; 
    }

    /**
     * Show all records
     * 
     * @return string
     */
    public function show(){

        if(file_exists($this->data_location)){ 
            
            $json_data = file_get_contents($this->data_location); 
            $data = json_decode($json_data, true); 
             
            if(!empty($data)){

                usort($data, function($a, $b) { 
                    return $b['id'] - $a['id']; 
                }); 
            } 
             
            return !empty($data) ? $data : false; 
        } 

        return false; 
    }

    public function show_single($id){

        $json_data = file_get_contents($this->data_location); 
        $data = json_decode($json_data, true); 

        $single_data = array_filter($data, function ($var) use ($id) { 
            return (!empty($var['id']) && $var['id'] == $id); 
        }); 

        $single_data = array_values($singleData)[0]; 

        return !empty($singleData) ? $single_data : false; 
    }
}
