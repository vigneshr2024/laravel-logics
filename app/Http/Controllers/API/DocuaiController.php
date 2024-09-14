<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sensiple\Blog\App\Models\Form;
use Sensiple\Blog\App\Models\FormSubmission;

class DocuaiController extends Controller
{
    public function formSubmission(Request $request)
    {
        $form   = Form::where('form_url',$request->form_url)->first();
        $form_page_url =   url()->previous();
        $submittedValues = $request->except('_token');
        $formSubmission = new FormSubmission();
        $formSubmission->form_page_url = $form_page_url;
        $formSubmission->form_id = $form;
        $formSubmission->submitted_values = json_encode($submittedValues);
        $formSubmission->ip_address = $request->ip();
        $formSubmission->submited_date_time = now()->toDateTimeString();
        $formSubmission->save();

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Form Submitted successfully!',
            'data' => $formSubmission,
        ], 201);
    }
}
