<?php

class Controller
{
   // MENGHUBUNGKAN FILE/CONTROLLER DENGAN URL AGAR URL DAPAT DIPERSINGKAT
   public function view($view, $data = [])
   {
      require_once '../app/views/' . $view . '.php';
   }

   public function model($model)
   {
      require_once '../app/models/' . $model . '.php';
      return new $model();
   }
}
