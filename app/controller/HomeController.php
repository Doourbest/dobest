<?php
/**
* HomeController
*/
class HomeController extends BaseController {

  public function home()
  {
    // var_dump(Article::count());
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
    $included_files = get_included_files();

    foreach ($included_files as $filename) {
        echo "$filename\n";
    }
    Log::debug('First Debug Info.');

    // return View
    return View::make('home')->with('User',User::first())
                             ->withTitle('dobest :-D')
                              ->withFooBar('foo_bar');

    // return String
    //return 'Hello dobest!';

    // or you can return Nothing.
  }
}