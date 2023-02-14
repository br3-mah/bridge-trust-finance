<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\EmailTrait;
use Livewire\Component;

class ContactPage extends Component
{
    use EmailTrait;
    public $title = 'Get In Touch';
    public $name, $email, $phone, $subject, $message;
    public $btnText = 'Send Message';
    public $isDisabled = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required|min:10',
        'message' => 'required',
        'subject' => 'required'
    ];

    public function render()
    {
        return view('livewire.contact-page');
    }

    public function send(){
        $this->validate();
        $this->isDisabled = true;
        $this->btnText = 'Sending...';
        $data = [
            'name' => $this->name,
            'to' => User::first()->email,
            'from' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ];

        if($this->send_contact_email($data)){
            return redirect()->to('/email-sent-successfully');
        }else{
            return redirect()->to('/contact-us');
        }
    }
}
