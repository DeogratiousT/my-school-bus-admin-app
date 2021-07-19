<?php

namespace App\Console\Commands;

use App\User;

use Illuminate\Console\Command;

class RegisterSuperAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:super-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register super admin';

    /**
     * User model.
     *
     * @var object
     */
    private $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $details = $this->getDetails();

        $admin = $this->user->createSuperAdmin($details);

        $this->display($admin);
    }

    /**
     * Ask for admin details.
     *
     * @return array
     */
    private function getDetails() : array
    {
        $details['name'] = $this->ask('Name');
        $details['email'] = $this->ask('Email');

        while(! $this->isValidEmail($details['email'])){
            $this->error('Email is invalid');
            $details['email'] = $this->ask('Email');
        }

        $details['password'] = $this->secret('Password');

        while (! $this->isRequiredLength($details['password'])) {
            $this->error('Password must be more that eight characters');
            $details['password'] = $this->secret('Password');
        }

        $details['confirm_password'] = $this->secret('Confirm password');
            
        while (! $this->isMatch($details['password'], $details['confirm_password'])) {
            $this->error('Password and Confirm password do not match');

            $details['password'] = $this->secret('Enter new Password');

            while (! $this->isRequiredLength($details['password'])) {
                $this->error('Password must be more that six characters');
                $details['password'] = $this->secret('Enter new Password');
            }

            $details['confirm_password'] = $this->secret('Confirm password');
        }

        $details['password'] = bcrypt($details['password']);

        return $details;
    }

    /**
     * Display created admin.
     *
     * @param array $admin
     * @return void
     */
    private function display(User $admin) : void
    {
        $headers = ['Name', 'Email', 'Super admin'];

        $fields = [
            'Name' => $admin->name,
            'email' => $admin->email,
            'admin' => $admin->isSuperAdmin()
        ];

        $this->info('Super admin created');
        $this->table($headers, [$fields]);
    }

    /**
     * Check if email is valid
     *
     * @param string $email
     * @return boolean
     */
    private function isValidEmail(string $email) :bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Check if password is valid
     *
     * @param string $password
     * @param string $confirmPassword
     * @return boolean
     */
    // private function isValidPassword(string $password, string $confirmPassword) : bool
    // {
    //     return $this->isRequiredLength($password) &&
    //     $this->isMatch($password, $confirmPassword);
    // }

    /**
     * Check if password and confirm password matches.
     *
     * @param string $password
     * @param string $confirmPassword
     * @return bool
     */
    private function isMatch(string $password, string $confirmPassword) : bool
    {
        return $password === $confirmPassword;
    }

    /**
     * Checks if password is longer than eight characters.
     *
     * @param string $password
     * @return bool
     */
    private function isRequiredLength(string $password) : bool
    {
        return strlen($password) > 8;
    }
}
