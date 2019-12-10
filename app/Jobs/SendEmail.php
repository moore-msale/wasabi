<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\massMail;
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  
    protected $details;
    protected $content;
    protected $title;
  
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details,$content,$title)
    {
        $this->details = $details;
        $this->content = $content;
        $this->title = $title;
    }
   
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $email = new massMail($this->content,$this->title);
        // \Mail::to($this->details)->send($email);
        \Mail::to($this->details)->send(new \App\Mail\massMail($this->content,$this->title));
    }
}