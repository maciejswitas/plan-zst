<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of FileNames
 * Creates assoc aray key is school class name ane balue is file with plan name
 *
 * @author macie
 */
class FileNames {
    public static $names;
    public static $classes;
    
    public function __construct($path) {
        $files = array_diff(scandir($path), ['.', '..']);
        $classAndFilesAssoc = [];
        $classes = [];
        
        foreach($files as $file) {
            $className = ReadFile::getClassName($path . $file);
            $classes[] = $className;
            $classAndFilesAssoc[$className] = $path . $file;
        }
        self::$classes = $classes;
        self::$names = $classAndFilesAssoc;  
    }
}