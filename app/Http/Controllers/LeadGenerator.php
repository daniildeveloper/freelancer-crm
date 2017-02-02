<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Deal;
use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * create new lead/
     * @param  [type] $contact_id [description]
     * @return [type]             [description]
     */
    private function createLead($contact_id)
    {
        $lead     = new Lead();
        $lead->id = $contact_id;
        $lead->save();
    }

    /**
     * create deal to work. Amazing! Just take data.
     * @param  integer  $lead_id    client id.
     * @param  date  $deadline   when order must be done. Also deadline
     * @param  string  $hedaer     short description for deal
     * @param  string  $slug       unique string id for every deal. used for trello-like kanboard setting. can be generated automaticly
     * @param  text  $notes      all about deal. Also brief
     * @param  integer  $prepayment prepyment
     * @param  string  $attachment path to file on server where contains the attachments like images or doc, pdf.
     * @param  integer $status     order state
     * @param  integer $money      budget. can be nullable
     * @param  string  $redirect   where to redirect
     * @return redirect              where to go after creation
     */
    public function createDeal($lead_id, $deadline, $hedaer, $slug, $notes, $prepayment, $attachment = null, $status = 0, $money = 0, $redirect = 'back')
    {
        $deal             = new Deal();
        $deal->header     = $header;
        $deal->slug       = $slug;
        $deal->notes      = $notes;
        $deal->attachment = $attachment;
        $deal->lead_id    = $lead_id;
        $deal->deadline   = $deadline;
        $deal->money      = $money;
        $deal->prepayment = $prepayment;
        $deal->status     = $status;
        $deal->save();

        if ($redirect === 'back') {
            return redirect()->back();
        }

        return redirect()->route($redirect);

    }

    /**
     * change deal status
     * @param  integer $deal_id deal id
     * @param  integer $status  each status has own integer identidier. Here it is.
     * @param  integer $money   default null. But when not null I am happy.
     * @return redirect          redirect back and show message about complete.
     */
    public function updateDealStatus($deal_id, $status, $money = null)
    {
        $message = "Изменения успешно проведенны";
        DB::table('deals')->where('id', $deal_id)->update(['status' => $status]);

        if ($money !== null) {
            DB::table('deals')->where('id', $deal_id)->update(['money' => $money]);
        }

        if ($status === 3) {
          $message = 'Ура, проект закончен!';
        }

        return redirect()->back([
            'message' => $message,
            'message-type' => 'success'
          ]);
    }

}
