<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscription;
use App\Models\Contact_us;
use App\Services\EmailService;

class Contacts_and_NewsletterController extends Controller
{


    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }


    public function subscribe_news_latter_store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:newsletter_subscriptions,email'
        ]);

        // Store the subscription data
        NewsletterSubscription::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }



    public function contact_us_store(Request $request)
    {
        try {
            // Validate the input data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'message' => 'required|string',
            ]);

            // Store the contact message in the database
            Contact_us::create($validatedData);

            // Prepare the email body for the user
            $emailBody = "
            <h2>Thank You, {$validatedData['name']}!</h2>
            <p>We have received your message and will get back to you shortly.</p>
            <p><strong>Message:</strong> {$validatedData['message']}</p>
            <p>If you need immediate assistance, please feel free to reach out to us.</p>
            <p>Best regards,<br>ARIFA Support Team</p>
        ";

            // Send confirmation email to the user
            $this->emailService->sendEmail(
                $validatedData['email'],
                'Contact Us Confirmation',
                $validatedData['name'],
                $emailBody
            );

            // Flash success message
            session()->flash('status', 'success');
            session()->flash('message', 'Your message has been sent successfully! \nWe have also emailed you a confirmation.');
        } catch (\Exception $e) {
            // Handle unexpected errors (e.g., database or server issues)
            session()->flash('status', 'error');
            session()->flash('message', 'There was an issue submitting your message. Please try again later.');
        }

        return back();
    }
}
