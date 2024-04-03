<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        echo 'Nuryaman';
    }

    public function getCity($city)
    {
        echo "Kota saya " . $city;
    }

    public function getStudent($name, $code)
    {
        echo "Nama saya " . $name, " NRP " . $code;
    }
}
