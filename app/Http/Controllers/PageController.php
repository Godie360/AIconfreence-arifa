<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\Speakers; // Import the Speakers model
use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Services\EmailService;
use App\Models\Registration;
use App\Models\students_details;
use App\Models\LocalsDetail;
use App\Models\ForeignerDetail;
use App\Models\EacDetail;
use App\Models\ExhibitionMap;
use App\Models\Exhibitor;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Label;
use App\Models\SponsorshipPackage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class PageController extends Controller
{

    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function generateUniqueInvoiceNumber()
    {
        do {
            $invoiceNumber = mt_rand(100000, 999999); // Generate a 6-digit random number
        } while (Invoice::where('invoice_number', $invoiceNumber)->exists()); // Check if it exists

        return $invoiceNumber;
    }



    public function home()
    {
        $speakers = new Speakers;
        // Retrieve the guest of honor
        $guestOfHonor = Speakers::where('has_honor', 1)->where('title', 'Guest of Honor')->first();

        if ($guestOfHonor) {
            // Retrieve all other speakers with `has_honor = 1`, excluding the guest of honor
            $speakers = Speakers::where('has_honor', 1)
                ->where('id', '!=', $guestOfHonor->id) // Exclude the guest of honor
                ->get();
        } else {
            $speakers = Speakers::where('has_honor', 1)->get();
        }

        // Retrieve sponsors with status = 1
        $sponsors = Sponsor::where('status', 1)->get(); // Fetch only paid sponsors

        // Return the home view with guest of honor, speakers, and sponsors
        return view('icafw_conference.index', compact('guestOfHonor', 'speakers', 'sponsors'));
    }





    public function about()
    {
        return view('icafw_conference.about');
    }

    public function contact()
    {
        return view('icafw_conference.contact');
    }

    public function register(Request $request)
    {
        $packageTypes = ['foreigner', 'locals', 'EAC', 'students'];
        $package_type = old('package_type', $packageTypes[0]); // Default to first option if not submitted


        $verifyPayments = [];
        $invoice_number = null;
        // Check if there's an invoice number provided in the request
        if ($request->has('verifypayments')) {
            $invoice_number = $request->get('verifypayments');
            $invoice = Invoice::where('invoice_number', $invoice_number)->first();
            // dd($invoice);
            // If the invoice is not found, set an error message
            if ($invoice) {
                // Calculate amount left
                $amount_left = $invoice->amount - $invoice->amount_paid;

                // Populate verifyPayments with the invoice details
                $verifyPayments = [
                    'amount' => $invoice->amount,
                    'amount_left' => $amount_left,
                    'user_email' => $invoice->user_email,
                    'invoice_type' => $invoice->invoice_type,
                ];
            } else {
                $verifyPayments = ['error' => 'Invoice not found'];
            }
        }



        return view('icafw_conference.register', compact('package_type', 'verifyPayments', 'invoice_number'));
    }


    public function getInvoiceData($filter_value)
    {
        $invoice = Invoice::where('user_email', $filter_value)
            ->orWhere('invoice_number', $filter_value)
            ->first();

        if ($invoice) {
            $amountLeft = $invoice->amount - $invoice->amount_paid;

            return response()->json([
                'found' => true,
                'data' => [
                    'due_amount' => number_format($invoice->amount, 2),
                    'amount_paid' => number_format($invoice->amount_paid, 2),
                    'amount_left' => number_format($amountLeft, 2),
                    'user_email' => $invoice->user_email,
                    'invoice_type' => $invoice->invoice_type,
                    'invoice_number' => $invoice->invoice_number,
                ],
            ]);
        } else {
            return response()->json(['found' => false]);
        }
    }



    public function speaker()
    {
        // Retrieve all speakers from the database
        $speakers = Speakers::all();

        // Pass the speakers data to the view
        return view('icafw_conference.speaker', compact('speakers'));
    }


    public function sponsors(Request $request)
    {
        // Retrieve all speakers from the database
        $sponsors = Sponsor::all();
        $SponsorshipPackages = SponsorshipPackage::all();

        // Initialize the verifyPayments variable as an empty array
        $verifyPayments = [];
        $invoice_number = null;
        // Check if there's an invoice number provided in the request
        if ($request->has('verifypayments')) {
            $invoice_number = $request->get('verifypayments');
            $invoice = Invoice::where('invoice_number', $invoice_number)->first();
            // dd($invoice);
            // If the invoice is not found, set an error message
            if ($invoice) {
                // Calculate amount left
                $amount_left = $invoice->amount - $invoice->amount_paid;

                // Populate verifyPayments with the invoice details
                $verifyPayments = [
                    'amount' => $invoice->amount,
                    'amount_left' => $amount_left,
                    'user_email' => $invoice->user_email,
                    'invoice_type' => $invoice->invoice_type,
                ];
            } else {
                $verifyPayments = ['error' => 'Invoice not found'];
            }
        }
        Log::error("spom spom spom");
        Log::error('Verify Payments Data: ' . json_encode($verifyPayments));

        // Pass the sponsors, sponsorship packages, and verifyPayments to the view
        return view('icafw_conference.sponsors', compact('sponsors', 'SponsorshipPackages', 'verifyPayments', 'invoice_number'));
    }



    public function speaker_register()
    {
        return view('icafw_conference.speaker_register');
    }




    public function store_speaker_register(Request $request)
    {
        try {
            // Validate incoming request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'company' => 'nullable|string|max:255',
                'title' => 'nullable|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'location' => 'required|string|max:255',
                'topic' => 'required|string|max:255',
                'abstract' => 'required|string|max:65535',
                'bio' => 'required|string|max:65535',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
            ]);

            // Handle the image upload if present
            $imageName = null;
            if ($request->hasFile('image')) {
                // Define the destination path (public/assets/images/speaker)
                $destinationPath = public_path('assets/images/speaker');
                $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                $request->file('image')->move($destinationPath, $imageName);
            }

            // Create the new speaker record
            $speaker = Speakers::create([
                'name' => $validated['name'],
                'company' => $validated['company'],
                'title' => $validated['title'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'location' => $validated['location'],
                'topic' => $validated['topic'],
                'abstract' => $validated['abstract'],
                'bio' => $validated['bio'],
                'image' => $imageName,
                'has_honor' => 0,
            ]);

            // Prepare the email body for the speaker
            $emailBody = "
                <h2>Dear {$validated['name']}, <br>Thank You for Registering!</h2>
                <p>We are excited to inform you that your registration for the conference has been successfully completed.</p>
                <p><strong>Topic:</strong> {$speaker->topic}</p>
                <p>Your submission is currently under review. You will receive feedback or approval shortly.</p>
                <p>Thank you for your valuable contribution to our event. We look forward to your participation!</p>
                <p>If you have any questions or need further assistance, feel free to reach out to us.</p>
                <p>Best regards,<br>The Conference Team</p>
            ";

            // Send email to the speaker
            $this->emailService->sendEmail(
                $speaker->email,
                'Speaker Registration Successful',
                $speaker->name,
                $emailBody
            );



            // Flash a success message
            session()->flash('status', 'success');
            session()->flash('message', 'Successfully registered as a speaker! Please wait for review; you will receive an email shortly.');
        } catch (\Exception $e) {
            // Check for duplicate email error (unique constraint violation)
            if ($e->getCode() === '23000') { // 23000 is the SQL state code for integrity constraint violation
                session()->flash('status', 'error');
                session()->flash('message', 'The email provided is already registered. Please use a different email or check your inbox for confirmation.');
            } else {
                session()->flash('status', 'error');
                session()->flash('message', 'Registration failed. Please try again.');
            }
        }

        return back()->with('success', 'Speaker registered successfully! Email has been sent.');
    }







    // update speaker's status
    public function updateSpeakerStatus($id, $status)
    {
        // Ensure the status is valid
        if (!in_array($status, ['pending', 'approved', 'rejected', 'revision_requested'])) {
            return redirect()->back()->with('error', 'Invalid status provided.');
        }

        // Find the speaker by id and update the status
        $speaker = Speakers::find($id);

        if ($speaker) {
            // Store the previous status for email notification
            $previousStatus = $speaker->status;

            // Update the status
            $speaker->status = $status;
            $speaker->save();

            // Prepare the email body for status change notification
            $statusMessages = [
                'approved' => "We are pleased to inform you that your presentation has been approved. We look forward to your participation.",
                'rejected' => "We regret to inform you that your presentation has not been accepted for this year's conference. Thank you for your submission.",
                'revision_requested' => "We appreciate your submission. However, we would like to request some revisions to your abstract. Please check your email for details.",
            ];



            // <p>Your registration status has been updated from <strong>{$previousStatus}</strong> to <strong>{$status}</strong>.</p>


            $emailBody = "
                <h2>Status Update</h2>
                <p>Dear {$speaker->name},</p>
                <p>{$statusMessages[$status]}</p>
                <p>If you have any questions, feel free to reach out to us.</p>
                <p>Best regards,<br>The Conference Team</p>
            ";

            // Send email to the speaker notifying them of the status change
            $this->emailService->sendEmail(
                $speaker->email,
                'Speaker Status Update',
                $speaker->name,
                $emailBody
            );

            return redirect()->back()->with('success', 'Speaker status updated successfully.');
        }

        return redirect()->back()->with('error', 'Speaker not found.');
    }






    public function registerSponsors(Request $request)
    {
        // dd($request);
        try {
            // Validate the input data
            $validatedData = $request->validate([
                'company_name' => 'required|string|max:255',
                'contact_person' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'sponsorship_level' => 'required|exists:sponsorship_packages,name',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
            ]);

            // Handle the image upload if present
            $imageName = null;
            if ($request->hasFile('image')) {
                // Define the destination path (public/assets/images/speaker)
                $destinationPath = public_path('assets/images/sponsors');
                $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                $request->file('image')->move($destinationPath, $imageName);
            }

            // Generate a unique invoice number
            $invoiceNumber = mt_rand(100000, 999999);

            $package = SponsorshipPackage::where('name', $validatedData['sponsorship_level'])->first();

            // Store sponsor information in the database
            $sponsor = new Sponsor();
            $sponsor->company_name = $validatedData['company_name'];
            $sponsor->phone = $validatedData['phone'];
            $sponsor->package_type = $validatedData['sponsorship_level'];
            $sponsor->email = $validatedData['email'];
            $sponsor->invoice_number = $invoiceNumber;
            $sponsor->status = 0; // 0 means pending, waiting for admin approval

            // Optional: Set logo path or link if provided
            // $sponsor->logo_path = $request->logo_path ?? null;
            // $sponsor->link = $request->link ?? null;

            // dd($sponsor);
            $sponsor->save();

            // Send a confirmation email to the sponsor
            $emailBody = "
            <h2>Dear {$sponsor->company_name}, from {$sponsor->company_name}<br>Thank You for Registering!</h2>
                <p>We are thrilled to confirm your registration for the upcoming conference.</p>
                <p><strong>Conference Title:</strong> ICAFW 2024</p>
                <p><strong>Date:</strong> 7<sup>th</sup> December 2024</p>
                <p><strong>Location:</strong> Four Points By Sheraton, Dar es Salaam, Tanzania</p>
                <p><strong>Invoice Number:</strong> {$validatedData['invoice_number']}</p>
                <p><strong>Amount Due:</strong> \${$package->price}</p>
                <p>Your participation is highly valued, and we are excited to have you with us at this significant event.</p>
                <p>Please complete the payment at your earliest convenience to secure your spot. Once the payment is made, click the button below to verify your payment:</p>

                <a href='https://aiconference.arifa.org/sponsors?verifypayments={$validatedData['invoice_number']}' style='
                    display: inline-block;
                    padding: 10px 15px;
                    color: #fff;
                    background-color: #007bff;
                    text-decoration: none;
                    border-radius: 5px;
                    font-size: 16px;
                    font-weight: bold;
                '>Verify Payment</a>

                <p>If you have any questions or need further assistance, feel free to reach out to us.</p>
            ";

            $this->emailService->sendEmail(
                $validatedData['email'],
                'Sponsorship Registration Confirmation',
                $validatedData['contact_person'],
                $emailBody
            );

            // Flash a success message
            session()->flash('status', 'success');
            session()->flash('message', 'Successfully registered as a speaker! Please wait for review; you will receive an email shortly.');
        } catch (\Exception $e) {
            // Check for duplicate email error (unique constraint violation)
            if ($e->getCode() === '23000') { // 23000 is the SQL state code for integrity constraint violation
                session()->flash('status', 'error');
                session()->flash('message', 'The email provided is already registered. Please use a different email or check your inbox for confirmation.');
            } else {
                session()->flash('status', 'error');
                session()->flash('message', 'Registration failed. Please try again.');
            }
        }

        return back()->with('success', 'Speaker registered successfully! Email has been sent.');
    }



    public function store_participant_register(Request $request)
    {
        $invoice_amount = 0;
        try {

            // 1 Add the invoice number to the validated data
            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'organization' => 'required|string|max:255',
                'job_title' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'email' => 'required|email|max:255',
                'package_type' => 'required|string|in:foreigner,locals,eac,students',
            ]);
            // Generate a unique invoice number
            $validatedData['invoice_number'] = $this->generateUniqueInvoiceNumber();


            // Step 2: Create the registration with the validated data
            $registration = Registration::create($validatedData);


            $package_type = strtolower(trim($request->package_type));

            // Step 3: Validate additional fields based on the package type
            switch ($package_type) {
                case 'foreigner':
                    try {
                        $invoice_amount = 550000;
                        // Step 1: Validate Foreigner-specific fields
                        $foreignerData = $request->validate([
                            'country' => 'required|string|max:255',
                            'passport' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Validate image format and size
                        ]);

                        // Step 2: Get the uploaded passport file
                        $passportFile = $request->file('passport');

                        // Step 3: Define the destination path
                        $destinationPath = public_path('assets/images/participants'); // Path where the file will be stored

                        // Step 4: Generate a custom filename using the registration ID
                        $passportFileName = 'passport_foreigner_' . $registration->id . '.' . $passportFile->getClientOriginalExtension();

                        // Step 5: Move the file to the destination directory
                        try {
                            $passportFile->move($destinationPath, $passportFileName);
                        } catch (\Exception $e) {
                            // Handle file storage errors (optional logging or showing error)
                            return back()->withErrors(['file_error' => 'File could not be uploaded. Please try again.']);
                        }

                        // Step 6: Add the custom file path to the data to be stored in the database
                        $foreignerData['passport_image'] = "assets/images/participants/foreigners/" . $passportFileName;
                        $foreignerData['registration_id'] = $registration->id;

                        // Step 7: Store Foreigner-specific details in the database
                        ForeignerDetail::create($foreignerData);

                        // down im going to create invoice for foreigner

                    } catch (\Illuminate\Validation\ValidationException $e) {
                        // Handle validation errors by returning the error messages
                        return back()->withErrors($e->errors());
                    }
                    break;



                case 'locals':
                    try {
                        $invoice_amount = 200000;
                        // Step 1: Validate Locals-specific fields
                        $localsData = $request->validate([
                            'nida' => 'required|string|max:50',
                            'nida_image' => 'required|file|mimes:jpeg,png,pdf|max:2048', // File validation rules
                        ]);
                        // dd($localsData);

                        // Step 2: Get the uploaded file
                        $nidaFile = $request->file('nida_image');

                        // Define the destination path (within the public disk storage)
                        $destinationPath = public_path('assets/images/participants'); // relative path from 'public/'

                        // Step 3: Generate the custom filename using the desired format
                        $nidaFileName = 'nida_locals_' . $registration->id . '.' . $nidaFile->getClientOriginalExtension();

                        // Step 4: Store the file using storeAs to ensure it's saved in the correct location
                        try {
                            // $nidaFilePath = $nidaFile->storeAs($destinationPath, $nidaFileName, 'public');
                            $request->file('nida_image')->move($destinationPath, $nidaFileName);
                        } catch (\Exception $e) {
                            // dd($e->getMessage());
                        }

                        // Step 5: Add the custom file path to the data to be stored in the database
                        $localsData['nida_image'] = "assets/images/participants/" . $nidaFileName;
                        $localsData['registration_id'] = $registration->id;

                        // Step 6: Store Locals-specific details in the database
                        LocalsDetail::create($localsData);
                    } catch (\Illuminate\Validation\ValidationException $e) {
                        // Handle validation errors by showing the details
                        // dd($e->errors());
                    }
                    break;






                case 'eac':
                    // dd($request);
                    try {
                        $invoice_amount = 330000;
                        // Step 1: Validate EAC-specific fields
                        $eacData = $request->validate([
                            'eac_country' => 'required|string|max:255',
                            'nic_nida' => 'required|string|max:50',
                            'nicImage' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Validate image format and size
                        ]);

                        // Step 2: Get the uploaded file
                        $nicFile = $request->file('nicImage');

                        // Step 3: Define the destination path
                        $destinationPath = public_path('assets/images/participants'); // Path where the file will be stored

                        // Step 4: Generate the custom filename using the desired format
                        $eac_image_filename = 'nida_eacData_' . $registration->id . '.' . $nicFile->getClientOriginalExtension();

                        // Step 5: Move the file to the destination directory
                        try {
                            $nicFile->move($destinationPath, $eac_image_filename);
                        } catch (\Exception $e) {
                            // Handle file storage errors (optional logging or showing error)
                            return back()->withErrors(['file_error' => 'File could not be uploaded. Please try again.']);
                        }

                        // Step 6: Add the custom file path to the data to be stored in the database
                        $eacData['nic_image'] = "assets/images/participants/" . $eac_image_filename;
                        $eacData['registration_id'] = $registration->id;

                        // Step 7: Store EAC-specific details in the database
                        EacDetail::create($eacData);
                    } catch (\Illuminate\Validation\ValidationException $e) {
                        // Handle validation errors by returning the error messages
                        return back()->withErrors($e->errors());
                    }
                    break;






                case 'students':
                    try {
                        // Step 1: Validate Student-specific fields
                        $studentData = $request->validate([
                            'school_name' => 'required|string|max:255',
                            'registration_number' => 'required|string|max:100',
                            'studentId' => 'required|file|mimes:jpeg,png,pdf|max:4048', // Validate file type and size
                        ]);

                        $invoice_amount = 160000;


                        // Step 2: Get the uploaded student ID file
                        $studentIdFile = $request->file('studentId');

                        // Step 3: Define the destination path
                        $destinationPath = public_path('assets/images/participants'); // Path to store the file

                        // Step 4: Generate a custom filename using the registration ID
                        $studentIdFileName = 'student_id_' . $registration->id . '.' . $studentIdFile->getClientOriginalExtension();

                        // Step 5: Move the file to the destination directory
                        try {
                            $studentIdFile->move($destinationPath, $studentIdFileName);
                        } catch (\Exception $e) {
                            // Handle file storage errors
                            // dd("hola");
                            return back()->withErrors(['file_error' => 'File could not be uploaded. Please try again.']);
                        }

                        // Step 6: Add the custom file path to the data to be stored in the database
                        $studentData['student_id_image'] = "assets/images/participants/students/" . $studentIdFileName;
                        $studentData['registration_id'] = $registration->id;

                        // Step 7: Store Student-specific details in the database
                        students_details::create($studentData);
                    } catch (\Illuminate\Validation\ValidationException $e) {
                        // dd($e);
                        // Handle validation errors by returning the error messages
                        return back()->withErrors($e->errors());
                    }
                    break;
            }

            // dd('spom' . $validatedData['email'] . 'and invoive number is' . $validatedData['invoice_number'] . 'amount is: ' . $invoice_amount);
            // down i=naenda kutengenneza invoice based on invoice columns
            $invoice = Invoice::create([
                'user_email' => $validatedData['email'],
                'invoice_number' => $validatedData['invoice_number'],
                'invoice_type' => 'participant',
                'amount' => $invoice_amount,
                'amount_paid' => 0,
                'status' => 'pending',
            ]);


            // dd($invoice);


            // email
            // Prepare the email body for the participant
            $emailBody = "
                <h2>Dear {$validatedData['full_name']}, <br>Thank You for Registering!</h2>
                <p>We are thrilled to confirm your registration for the upcoming conference.</p>
                <p><strong>Conference Title:</strong> ICAFW 2024</p>
                <p><strong>Date:</strong> 7<sup>th</sup> December 2024</p>
                <p><strong>Location:</strong> Four Points By Sheraton, Dar es Salaam, Tanzania</p>
                <p><strong>Invoice Number:</strong> {$validatedData['invoice_number']}</p>
                <p><strong>Amount Due:</strong> \${$invoice_amount}</p>
                <p>Your participation is highly valued, and we are excited to have you with us at this significant event.</p>
                <p>Please complete the payment at your earliest convenience to secure your spot. Once the payment is made, click the button below to verify your payment:</p>

                <a href='https://aiconference.arifa.org/ticket?verifypayments={$validatedData['invoice_number']}' style='
                    display: inline-block;
                    padding: 10px 15px;
                    color: #fff;
                    background-color: #007bff;
                    text-decoration: none;
                    border-radius: 5px;
                    font-size: 16px;
                    font-weight: bold;
                '>Verify Payment</a>

                <p>If you have any questions or need further assistance, feel free to reach out to us.</p>
            ";



            // Send email to the participant
            $this->emailService->sendEmail(
                $validatedData['email'],
                'Conference Registration Confirmation',
                $validatedData['full_name'],
                $emailBody
            );

            // Flash a success message
            session()->flash('status', 'success');
            session()->flash('message', 'Participant registered successfully!\n Please Make sure you pay Registration Fee');
        } catch (\Exception $e) {
            // Check for duplicate email error (unique constraint violation)
            if ($e->getCode() === '23000') { // 23000 is the SQL state code for integrity constraint violation
                session()->flash('status', 'error');
                session()->flash('message', 'The email provided is already registered. Please use a different email or check your inbox for confirmation.');
            } else {
                session()->flash('status', 'error');
                session()->flash('message', 'Registration failed. Please try again.');
            }
        }

        // Step 4: Return success or redirect
        return back()->with('success', 'Participant registered successfully!');
    }




    public function attend()
    {
        $sponsors = Sponsor::where('status', 1)->get(); // Get active sponsors
        return view('icafw_conference.attend_banner', compact('sponsors'));
    }

    public function exhibitors_landing(Request $request)
    {

        $map = ExhibitionMap::where('id', 1)->first(); // Use first() to get a single record
        $map_image = null;
        if ($map) {
            $map_image = $map->map_image; // Access the map_image property
        }


        $booths = Booth::where('map_id', 1)->get();
        $labels = Label::where('map_id', 1)->get();


        $verifyPayments = [];
        $invoice_number = null;

        // Check if there's an invoice number provided in the request
        if ($request->has('verifypayments')) {
            $invoice_number = $request->get('verifypayments');
            $invoice = Invoice::where('invoice_number', $invoice_number)->first();
            // dd($invoice);
            // If the invoice is not found, set an error message
            if ($invoice) {
                // Calculate amount left
                $amount_left = $invoice->amount - $invoice->amount_paid;

                // Populate verifyPayments with the invoice details
                $verifyPayments = [
                    'amount' => $invoice->amount,
                    'amount_left' => $amount_left,
                    'user_email' => $invoice->user_email,
                    'invoice_type' => $invoice->invoice_type,
                ];
            } else {
                $verifyPayments = ['error' => 'Invoice not found'];
            }
        }


        // dd($map);
        return view('icafw_conference.exhibitors', compact('booths', 'labels', 'map_image', 'verifyPayments', 'invoice_number'));
    }


    public function store_manage_exhibitor(Request $request) {}









    public function view_manage_exhibition_map()
    {
        $labels = Label::all();
        $booths = Booth::all();
        $maps = ExhibitionMap::all();

        $map = ExhibitionMap::where('id', 1)->first(); // Use first() to get a single record
        $map_image = null;
        if ($map) {
            $map_image = $map->map_image; // Access the map_image property
        }

        return view('icafw_conference.admin.manage_exhibitors', compact('labels', 'booths', 'maps', 'map_image'));
    }

    public function store_booth(Request $request)
    {
        $booth = new Booth();
        $booth->booth_name = $request->booth_name;
        $booth->price = $request->price;
        $booth->map_position = $request->map_position;
        $booth->description = $request->description;
        $booth->status = 'available';
        $booth->booth_icon = $request->booth_icon;
        $booth->save();

        return redirect()->back()->with('success', 'Booth added successfully.');
    }



    public function exhibitors_store(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'company_name' => 'required|string|max:255',
                'contact_person' => 'required|string|max:255',
                'job_title' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'email' => 'required|email|max:255', // Check for email format first
                'booth_name' => 'required|string|max:255',
                'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Limit file size to 2MB
                'location' => 'required|string|max:255', // Added validation for location
                'map_id' => 'required|integer',
            ]);

            // Check if the email already exists in the database
            if (Exhibitor::where('email', $validatedData['email'])->exists()) {
                // Set error flash message for email already in use
                session()->flash('status', 'error');
                session()->flash('message', 'The email you provided is already in use. Please try another email.');

                return redirect()->back()->withInput();
            }

            // Find the booth associated with the selected booth name
            $booth = Booth::where('booth_name', $validatedData['booth_name'])->first();

            // Check if the booth is available
            if (!$booth || $booth->status !== 'available') { // Assuming you have an 'is_available' field
                // Set error flash message for booth unavailability
                session()->flash('status', 'error');
                session()->flash('message', 'The selected booth is not available. Please choose another booth.');

                return redirect()->back()->withInput();
            }

            // Handle the image upload if present
            $logoPath = null;
            if ($request->hasFile('company_logo')) {
                // Define the destination path (public/assets/images/exhibitors)
                $destinationPath = public_path('assets/images/exhibitors');
                $logoPath = time() . '-' . $request->file('company_logo')->getClientOriginalName();
                $request->file('company_logo')->move($destinationPath, $logoPath);
            }

            // Create the Exhibitor entry
            $exhibitor = Exhibitor::create([
                'contact_person' => $validatedData['contact_person'],
                'company_name' => $validatedData['company_name'],
                'job_title' => $validatedData['job_title'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'booth_name' => $booth->booth_name, // Store booth ID
                'company_logo' => $logoPath,
                'location' => $validatedData['location'], // Added location
                'booth_id' => $booth->id, // Added booth_id
                'map_id' => $validatedData['map_id'],
            ]);

            // Mark the booth as unavailable
            $booth->update(['is_available' => false]);

            // Create an invoice for the exhibitor
            $invoice = Invoice::create([
                'user_email' => $validatedData['email'],
                'invoice_number' => $this->generateUniqueInvoiceNumber(),
                'invoice_type' => 'Booth',
                'amount' => $booth->price,
                'amount_paid' => 0,
                'status' => 'pending',
            ]);

            // Prepare the email content
            $emailBody = "
                <h2>Welcome to Our Exhibition</h2>
                <p>Dear {$validatedData['contact_person']},</p>
                <p>Thank you for registering with us for the upcoming conference as an Exhibitor.</p>
                <p><strong>Conference Title:</strong> ICAFW 2024</p>
                <p><strong>Date:</strong> 7<sup>th</sup> December 2024</p>
                <p><strong>Location:</strong> Four Points By Sheraton, Dar es Salaam, Tanzania</p>
                <ul>
                    <li><strong>Company:</strong> {$validatedData['company_name']}</li>
                    <li><strong>Booth:</strong> {$validatedData['booth_name']}</li>
                    <li><strong>Job Title:</strong> {$validatedData['job_title']}</li>
                </ul>
                <p>We have generated an invoice for your participation. Here are the details:</p>
                <ul>
                    <li><strong>Invoice Number:</strong> {$invoice->invoice_number}</li>
                    <li><strong>Amount Due:</strong> {$invoice->amount}</li>
                    <li><strong>Status:</strong> Pending</li>
                </ul>
                <p>Please complete the payment at your earliest convenience to secure your spot. Once the payment is made, click the button below to verify your payment:</p>

                <a href='https://aiconference.arifa.org/ticket?verifypayments={$invoice->invoice_number}' style='
                    display: inline-block;
                    padding: 10px 15px;
                    color: #fff;
                    background-color: #007bff;
                    text-decoration: none;
                    border-radius: 5px;
                    font-size: 16px;
                    font-weight: bold;
                '>Verify Payment</a>

                <p>If you have any questions or need further assistance, feel free to reach out to us.</p>
            ";

            // Send the email to the exhibitor
            $this->emailService->sendEmail(
                $invoice->user_email,
                'Payment Verification',
                'Conference Support Team',
                $emailBody
            );

            // Set success flash message
            session()->flash('status', 'success');
            session()->flash('message', 'Exhibitor registered successfully, and invoice has been sent to their email.');

            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation exceptions separately
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error registering exhibitor: ' . $e->getMessage());

            // Set error flash message
            session()->flash('status', 'error');
            session()->flash('message', 'An error occurred during registration. Please try again or contact support.');

            return redirect()->back()->withInput();
        }
    }




    public function verifyPayment(Request $request)
    {
        // Log::error("mpya");
        try {
            // Step 1: Validate the request input
            $validatedData = $request->validate([
                'invoice_number' => 'required|string|exists:invoices,invoice_number',
                'transaction_id' => 'required|string|max:255',
                'amount_paid' => 'required|numeric|min:0.01',
                'account_number' => 'required|string|max:255',
                'account_name' => 'required|string|max:255',
            ]);

            // Step 2: Find the invoice by its number
            $invoice = Invoice::where('invoice_number', $validatedData['invoice_number'])->firstOrFail();
            $amount_left = $invoice->amount - $invoice->amount_paid;



            // Step 3: Check if the transaction ID already exists in the invoice_details table
            $transactionExists = InvoiceDetail::where('transaction_id', $validatedData['transaction_id'])->exists();

            if (!$transactionExists) {
                // Step 3: Store the payment details in the invoice_details table
                $invoiceDetail = new InvoiceDetail([
                    'invoice_id' => $invoice->id, // Link to the invoice
                    'amount_paid' => $validatedData['amount_paid'], // The amount being paid
                    'transaction_id' => $validatedData['transaction_id'], // The transaction ID
                    'account_number' => $validatedData['account_number'], // Account number if applicable
                    'invoice_number' => $validatedData['invoice_number'], // invoice number
                    'account_name' => $validatedData['account_name'], // Account name if applicable
                    'status' => 'pending' // Set the initial status for this payment
                ]);

                // Save the invoice detail
                $invoiceDetail->save();

                // Prepare the email content
                $emailBody = "
                <h2>Payment Verification Received</h2>
                <p>Dear user,</p>
                <p>We have received your payment with Transaction ID: <strong>{$validatedData['transaction_id']}</strong> for invoice number <strong>{$validatedData['invoice_number']}</strong>.</p>
                <p>Your payment is under review, and we will notify you once it's verified. If you have any questions, feel free to contact us.</p>
                ";
                // Step 6: Send a session flash message for feedback
                session()->flash('status', 'success');
                session()->flash('message', 'Payment verification received. \nWe will review and confirm shortly.');
            } else {
                // Step 4: If the transaction ID already exists, return an error message
                session()->flash('status', 'error');
                session()->flash('message', 'Payment verification failed. \nTransaction ID already exists.');

                $emailBody = "
                <h2>Payment Verification Unsuccessful</h2>
                <p>Dear user,</p>
                <p>We received your payment attempt with Transaction ID: <strong>{$validatedData['transaction_id']}</strong> for invoice number <strong>{$validatedData['invoice_number']}</strong>.</p>
                <p>Unfortunately, this transaction ID has already been recorded in our system.</p>
                <p style= 'color:red'><strong>Important:</strong> After three unsuccessful attempts using an already-used transaction ID, your reservation may be forfeited to allow others the opportunity. Please Double Check your payment details carefully before submitting again.</p>
                <p>If you need any assistance, feel free to reach out to our support team.</p>
                <p>Thank you for your understanding and cooperation.</p>
                ";
            }

            // Step 5: Send the email to the user
            $this->emailService->sendEmail(
                $invoice->user_email,
                'Payment Verification',
                'Conference Support Team',
                $emailBody
            );
        } catch (\Exception $e) {
            // Step 6: Log the error and send a session flash message for feedback
            Log::error(($e->getMessage()));
            // Handle errors during verification
            session()->flash('status', 'error');
            session()->flash('message', 'Payment verification failed. \nPlease check your details and try again.');
            // dd($e);
        }

        // Redirect back with status messages
        return back();
    }
}
