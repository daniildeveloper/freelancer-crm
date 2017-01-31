<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class LeadGenerator extends Controller
{
  public function createContact(Request $request)
  {
    $contact          = new Contact();
    $contact->name    = $request->name;
    $contact->email   = $request->email;
    $contact->phone   = $request->phone;
    $contact->skype   = $request->skype;
    $contact->from    = 'email';
    $contact->notices = $request->notices;
    $contact->save();
    return redirect()->back();
  }

  /**
   * get contact
   * @param  integer $id id of contact
   * @return obj     obj contains id
   */
  public function getContact($id)
  {
    return DB::table('contacts')->where('id', $id)->get()[0];
  }

  public function getContactJson($id)
  {
    $c = $this->getContact($id);
    return response()->json([
      'name'    => $c->name,
      'email'   => $c->email,
      'phone'   => $c->phone,
      'skype'   => $c->skype,
      'from'    => $c->from,
      'notices' => $c->notices,
    ]);
  }
}
