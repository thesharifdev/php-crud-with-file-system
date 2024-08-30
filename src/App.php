<?php

namespace Sharif\PhpCrudStarterKit;

class App
{
    public static $instance;
    private $jsonFile = "json_files/data.json"; 

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
    public function create($data){
        if(!empty($newData)){ 
            $id = time(); 
            $newData['id'] = $id; 
             
            $jsonData = file_get_contents($this->jsonFile); 
            $data = json_decode($jsonData, true); 
             
            $data = !empty($data)?array_filter($data):$data; 
            if(!empty($data)){ 
                array_push($data, $newData); 
            }else{ 
                $data[] = $newData; 
            } 
            $insert = file_put_contents($this->jsonFile, json_encode($data)); 
             
            return $insert?$id:false; 
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
    public function update($data){
        if(!empty($upData) && is_array($upData) && !empty($id)){ 
            $jsonData = file_get_contents($this->jsonFile); 
            $data = json_decode($jsonData, true); 
             
            foreach ($data as $key => $value) { 
                if ($value['id'] == $id) { 
                    if(isset($upData['name'])){ 
                        $data[$key]['name'] = $upData['name']; 
                    } 
                    if(isset($upData['email'])){ 
                        $data[$key]['email'] = $upData['email']; 
                    } 
                    if(isset($upData['phone'])){ 
                        $data[$key]['phone'] = $upData['phone']; 
                    } 
                    if(isset($upData['country'])){ 
                        $data[$key]['country'] = $upData['country']; 
                    } 
                } 
            } 
            $update = file_put_contents($this->jsonFile, json_encode($data)); 
             
            return $update?true:false; 
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
    public function delete($data){
        $jsonData = file_get_contents($this->jsonFile); 
        $data = json_decode($jsonData, true); 
             
        $newData = array_filter($data, function ($var) use ($id) { 
            return ($var['id'] != $id); 
        }); 
        $delete = file_put_contents($this->jsonFile, json_encode($newData)); 
        return $delete?true:false; 
    }

    /**
     * Show all records
     * 
     * @return string
     */
    public function show(){
        if(file_exists($this->jsonFile)){ 
            $jsonData = file_get_contents($this->jsonFile); 
            $data = json_decode($jsonData, true); 
             
            if(!empty($data)){ 
                usort($data, function($a, $b) { 
                    return $b['id'] - $a['id']; 
                }); 
            } 
             
            return !empty($data)?$data:false; 
        } 
        return false; 
    }

    public function show_single($id){
        $jsonData = file_get_contents($this->jsonFile); 
        $data = json_decode($jsonData, true); 
        $singleData = array_filter($data, function ($var) use ($id) { 
            return (!empty($var['id']) && $var['id'] == $id); 
        }); 
        $singleData = array_values($singleData)[0]; 
        return !empty($singleData)?$singleData:false; 
    }
}
