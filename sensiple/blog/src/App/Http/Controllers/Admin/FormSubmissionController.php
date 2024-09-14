<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Sensiple\Blog\App\Exports\FormSubmissionsExport;
use Sensiple\Blog\App\Models\Form;
use Sensiple\Blog\App\Models\FormSubmission;
use Sensiple\Blog\App\Notifications\FormNotification;

class FormSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $form = Form::where('form_url', $request->form_url)->first();
        $form_page_url =   url()->previous();
        $submittedValues = $request->except(['_token','form_url']);

        $formFields     = explode(",",$form->form_fields);
        $inputFormFields = array_keys($submittedValues);

        if (empty(array_diff($formFields, $inputFormFields)) && empty(array_diff($inputFormFields, $formFields))) {
            // echo "The arrays match.";
        } else {
            echo "Somthing went wrong.";
        }

        $formSubmission = new FormSubmission();
        $formSubmission->form_page_url = $form_page_url;
        $formSubmission->form_id          = $form->id;
        $formSubmission->submitted_values = json_encode($submittedValues);
        $formSubmission->ip_address = $request->ip();
        $formSubmission->submited_date_time = now()->toDateTimeString();
        $formSubmission->save();
        //Get the user's email address form the submitted data.
        $userEmail = $submittedValues['email'];
        //Notification send
        Notification::route('mail', $userEmail)->notify(new FormNotification);
        session()->flash('message', 'Form Submitted successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function export(Request $request, $id)
    {
        // $formSubmission = FormSubmission::find($id);
        $submissions = FormSubmission::where('form_id', $id)->pluck('submitted_values')->toArray();
        $form       = Form::findOrFail($id);
        $headers    = explode(",",$form->form_fields);

        // Decode each JSON string in the array
        $decodedObjects = array_map('json_decode', $submissions);
        
        return Excel::download(new FormSubmissionsExport($headers,$decodedObjects), $form->form_name.'.xlsx');

        return session()->flash('message', 'Form Downloaded successfully!');;
    }
}
