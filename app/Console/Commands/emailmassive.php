<?php

namespace App\Console\Commands;

use App\Mail\massivemails;
use App\Models\Email;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class emailmassive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:massive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = Email::where('status', 'nosend')->get();

        foreach ($emails as $val) {
            try {
                Mail::to($val->to)->send(new massivemails($val->subject, $val->content));
                $val->status = 'send';
                $val->save();
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
