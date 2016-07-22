<?php
use Dobest\Support\Config;

/**
* HomeController
*/
class DemoController extends BaseController {

  public function view_index()
  {
    $data = ['title'=>'你是谁？?', 'email'=>'xiaojinhua@sailvan.com'];
    $validator = $this->validate($data, [
        'title' => 'required|numeric|integer|min:3|max:4',
        'email' => 'required|email',
    ]);

    // if ( !$validator->success ) {
    //   foreach ($validator->errors as $error) {
    //     echo $error.'<br>';
    //   }
    // }

    //Log::debug('First Debug Info.');

    // return View
    return View::make('bladedemo')
        ->with('User',User::first())
        ->with('errors', $validator->errors)
        ->withTitle('Demo by dobest team')
        ->withFooBar('foo_bar')
        ;

    // return String
    //return 'Hello dobest!';
    // or you can return Nothing.
  }
}
