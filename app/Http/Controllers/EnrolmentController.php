<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrolment;
use App\Models\Course;
use Illuminate\Support\Facades\Http;

class EnrolmentController extends Controller
{
    /**
     * mark an enrolment as paid.
     */
    public function pay(Request $request): View
    {
        Auth::user()->courses()->detach($request->course_id);
        return view('dashboard.user-courses', [
            'courses' => $request->user()->courses()->get()->unique(),
        ]);
    }

    /**
     * create an invoice on the finance app microservice.
     */
    public function createInvoice(Enrolment $enrolment): Void
    {
        $response = Http::post('http://laravel-finance.test/invoice/create',[
            'enrolment_id' => $enrolment->id,
            'amount' => $enrolment->course->fee,
        ]);
    }

    /**
     * list all active enrolments for the user.
     */
    public function listUserEnrolments(Int $user): Response
    {
        return response()->json([
            'owned' => User::find($user)->enrolments(),
        ]);
    }

    /**
     * list all enrolments.
     */
    public function list(Request $request): Response
    {
        Course::create([
            'title' => "enrolments list request recieved",
            'description' => "an enrolments list request was recieved an enrolments list request was recieved an enrolments list request was recieved an enrolments list request was recieved an enrolments list request was recieved",
            'fee' => 0.00,
            'paid' => false,
        ]);
        return response()->json([
            'enrolments' => Enrolment::all(),
        ]);
    }

    /**
     * create an invoice on the finance app microservice SOAP version.
     */
    // public function createInvoiceSOAP(Enrolment $enrolment): Void
    // {

    // }
}
