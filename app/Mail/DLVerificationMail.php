<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use PDF;
class DLVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $result;
    public $token;
    public $service_type;
    public function __construct($result, $token, $service_type)
    {
        $this->result = $result;
        $this->token = $token;
        $this->service_type = $service_type;
    }
    
    public function build()
    {
        // Generate the PDF
        $pdf = Pdf::loadView('pdf.dl_report', [
            'result' => $this->result,
            'service_type' => $this->service_type,
            'token' => $this->token,
        ]);
        // Attach the PDF and build the email content
        return $this->subject('Driving License Verification Details')
                    ->view('emails.dl_email')
                    ->with([
                        'result' => $this->result,
                        'service_type' => $this->service_type,
                        'token' => $this->token,
                    ])
                    ->attachData($pdf->output(), 'dl_report.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
