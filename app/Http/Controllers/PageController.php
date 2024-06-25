<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return "This is the home page";
    }

    public function about()
    {
        return "This is the about page";
    }

    public function contact()
    {
        return "This is the contact page";
    }

    public function services()
    {
        return "This is the services page";
    }
    
 public function blog()
    {
        return "This is the blog page";
    }
    
 public function products()
    {
        return "This is the products page";
    }
    
 public function galary()
    {
        return "This is the galary page";
    }
    public function student($adm)
    {
        $student = [
            '123' => 'Dennis',
            '342' => 'Stacy',
            '546' => 'Juliana',
        ];
        if(array_key_exists($adm ,$student))
          return $student($adm);
        else
          return 'Student'. $adm. 'not found';
    }  
    public function marks($grade){
        $marks =[
            '46 - 50' => 'A+',
            '41 - 45' => 'A',
            '36 - 40' => 'B+',
            '31 - 35' => 'B',
            '26 - 30' => 'C+',
            '21 - 25' => 'C',
            '16 - 20' => 'D+',
            '11 - 15' => 'D',
            '6 - 10' => 'E',
        ];
        if(array_key_exists($grade, $marks))
          return $marks($grade);
        else
           return 'marks'. $grade. 'Invalid';
    }

    
}
