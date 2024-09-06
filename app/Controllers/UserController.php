<?php

namespace App\Controllers;

use View;
use Database; 

class UserController
{
    public function show($id)
    {
        $user = $id ? ['id' => $id] : ['id' => 'Girilmemiş'];
        return View::render('user', ['user' => $user]);
    }

    public function getUser($countryId){

    Database::connect();
     
     $results = Database::query('SELECT * FROM users WHERE country_id = ?', [$countryId]);

     $users = [];
     foreach ($results as $row) {
         $users[] = $row['name']; 
     }

      return $users;
    }

}
