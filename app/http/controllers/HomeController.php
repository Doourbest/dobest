<?php
use Dobest\Support\Config;

/**
* HomeController
*/
class HomeController extends BaseController {

  public function home()
  {
    $data = ['title'=>'你是谁？?', 'email'=>'xiaojinhua@sailvan.com'];
    $validator = $this->validate($data, [
        'title' => 'required|numeric|integer|min:3|max:4',
        'email' => 'required|email',
    ]);
    if ( !$validator->success ) {
      foreach ($validator->errors as $error) {
        echo $error.'<br>';
      }
    }
    //Log::debug('First Debug Info.');

    // return View
    return View::make('home.php')->with('User',User::first())
                             ->withTitle('dobest :-D')
                              ->withFooBar('foo_bar')
                              ->with('timeZone', Config::get('time_zone'));

    // return String
    //return 'Hello dobest!';

    // or you can return Nothing.
  }
}
