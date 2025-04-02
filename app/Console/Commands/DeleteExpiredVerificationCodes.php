<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VerificationCode;
use Carbon\Carbon;

class DeleteExpiredVerificationCodes extends Command
{
    protected $signature = 'verification:cleanup';
    protected $description = 'Delete expired email verification codes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $deletedRows = VerificationCode::where('expires_at', '<', now())->delete();
        $this->info("Deleted $deletedRows expired verification codes.");
    }
    
}
