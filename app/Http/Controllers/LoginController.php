<?php
/**
 * Created by PhpStorm.
 * User: Kathi
 * Date: 01.07.2021
 * Time: 09:27
 */
namespace App\Http\Controllers;
class LoginController extends Controller
{
    public function vuelogin() {
        return view('login');
    }
}
