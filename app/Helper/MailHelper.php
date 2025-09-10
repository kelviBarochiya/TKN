<?php

namespace App\Helper;

use App\Mail\GeneralMail;

class MailHelper
{
    /**
     * Prepare the registration success email.
     *
     * @param string $user
     * @param string $name
     * @return GeneralMail
     */
    public static function prepareRegistrationSuccessMail($user, $name)
    {
        $data = ['user' => $user, 'name' => $name];
        $subject = 'Registration Success';
        $view = 'emails.registration_success';

        return new GeneralMail($subject, $view, $data);
    }

    /**
     * Prepare the package purchased email.
     *
     * @param string $packageName
     * @return GeneralMail
     */
    public static function preparePackagePurchasedMail($packageName)
    {
        $data = ['packageName' => $packageName];
        $subject = 'Package Purchased';
        $view = 'emails.package_purchased';

        return new GeneralMail($subject, $view, $data);
    }


    // public static function prepareEnquiryMail($details, $fromEmail)
    // {
    //     $subject = 'Enquiry Mail';
    //     $view = 'emails.enquiry_mail';
        

    //     return new GeneralMail($subject, $view, $details, $fromEmail);
    // }

    // public static function prepareAddProjectMail($email)
    // {
    //     $data = ['email' => $email];
    //     $subject = 'Add Project Successfully';
    //     $view = 'emails.add_project_mail';

    //     return new GeneralMail($subject, $view,$data);
    // }

}
