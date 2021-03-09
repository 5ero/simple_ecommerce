<?php

namespace App\Helpers;



class Breadcrumbs {


    public static $home = 'home';
    
    public static function make()
    {
        // Retrieve the path
        $pathInfo = \Request::getRequestUri();

        // Put path elements into array $links
        $links = explode('/',$pathInfo);

        // Count the elements in the array sw we know how many breadcrumbs to create
        // Count will show 3 items we will need to make that 2 as they will be stored
        // in the arrayas 0,1,2 etc
        $num = (count($links) -1);

        $url = '';
        $path = '';

        // Loop though the array and extract the links to make the breadcrumbs
        for ($x=1; $x<=$num; $x++){
            // Title text
            $title = \Str::title(str_replace('-',' ',$links[$x]));
            // Link for anchor tag
            $path .= '/'.$links[$x];
            // Build the url for each link in the breadcrumbs
            if($x == $num){
                // If its the last link dont add anchor tag
                $url .=  $title;
            } else {
                $url .=  '<a href="'.$path.'" class="text-blue-500 underline">'.$title.'</a> > ';
            }
            
        }

        // Build the breadcrumbs
        if($pathInfo == '/'){
            $breadcrumbs = \Str::title(Self::$home);
        } else {
            $breadcrumbs = '<a href="/" class="text-blue-500 underline">'.\Str::title(Self::$home). '</a> > ' .$url;
        }
        
        // Return the full breadcrumbs back to the user
        return $breadcrumbs;
    }

}