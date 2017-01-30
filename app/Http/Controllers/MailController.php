<?php

namespace App\Http\Controllers;

class MailController extends Controller
{
  /**
   * This function return view with index of mail client
   * @return view
   */
  public function showIndex()
  {
    return view('mail.index');
  }
}
