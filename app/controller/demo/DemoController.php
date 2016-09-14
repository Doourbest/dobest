<?php

use Dobest\Support\Config;

/**
* HomeController
*/
class DemoController {

  public function view_index()
  {
    // if ( !$validator->success ) {
    //   foreach ($validator->errors as $error) {
    //     echo $error.'<br>';
    //   }
    // }

    //Log::debug('First Debug Info.');

    // return View
    return View::make('demo/demo')
        ->with('User',['id'=>1,'name'=>'abc'])
        ->withTitle('Demo by dobest team')
        ;
  }
}
