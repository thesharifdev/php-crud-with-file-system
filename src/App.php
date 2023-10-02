<?php

namespace Sharif\PhpCrudStarterKit;

class App
{
    public static $instance;

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
        return $data.' created successfully!';
    }

    /**
     * Update record
     * 
     * @param $data
     * @return string
     */
    public function update($data){
        return $data.' updated successfully!';
    }

    /**
     * Delete record
     * 
     * @param $data
     * @return string
     */
    public function delete($data){
        return $data.' deleted successfully!';
    }

    /**
     * Show all records
     * 
     * @return string
     */
    public function show(){
        return 'Showing all records!';
    }

}