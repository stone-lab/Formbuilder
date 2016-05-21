<?php

namespace Modules\Formbuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Log;
use Mail;
use Shortcode;

class FormMail extends Model
{
    protected $table = 'formbuilder__form_mail';
    protected $fillable = ['form_id',
                            'locale',
                            'to',
                            'from',
                            'subject',
                            'body',
                            'additional_headers',
                            'attachments',
                            'exclude_blank',
                            'use_html',
                            ];

    public function sendMail($formSubmitId, $locale)
    {
        $formSubmit = FormsSubmits::findOrFail($formSubmitId);
        $formSubmitData = $formSubmit->formSubmitData;
        $formId = $formSubmit->form_id;
        $form = Forms::findOrFail($formId);
        $formMail = $form->getFormMail($locale);

        $to = $formMail->to;
        $from = $formMail->from;
        $subject = $formMail->subject;
        $additional_headers = $formMail->additional_headers;
        $body = $formMail->body;
        $attachments = $formMail->attachments;

        $to = Shortcode::compile($to);
        $from = Shortcode::compile($from);
        $subject = Shortcode::compile($subject);
        $additional_headers = Shortcode::compile($additional_headers);
        $body = Shortcode::compile($body);
        $attachments = Shortcode::compile($attachments);

        Log::info($to);
        Log::info($from);
        Log::info($subject);
        Log::info($body);
        Log::info($additional_headers);
        Log::info($attachments);

        Mail::raw($body, function ($message) use ($to, $from, $subject, $body, $additional_headers, $attachments) {
            $message->from($from, $from);
            /* $message->sender($address, $name = null); */
            $message->to($to, $to);
            /* $message->cc($address, $name = null);
            $message->bcc($address, $name = null); */
            /* $message->replyTo($address, $name = null); */
            $message->subject($subject);
            /* $message->priority($level);
            $message->attach($pathToFile, array $options = []); */

            // Attach a file from a raw $data string...
            /* $message->attachData($data, $name, array $options = []); */

            // Get the underlying SwiftMailer message instance...
            /* $message->getSwiftMessage(); */
        });
    }
}
