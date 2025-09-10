<?php 

namespace App\Services;

use App\Models\Package;
use App\Models\Payment;
use App\Models\User;

class AgentService 
{
    public function canCreatePropertyOrProject(User $agent, $type)
    {
        $package = Payment::where('user_id',$agent->id)->first();

        if(empty($package)){
            return ['status' => false, 'message' => 'Please buy a package.'];
        }
        $getPackageDetail = Package::where('title',$package->package_title)->first();

        if (!$getPackageDetail) {
            return ['status' => false, 'message' => 'Agent has not purchased a package.'];
        }

        if ($type === 'property') {
            $propertyCount = $agent->properties()->count();
            if ($propertyCount >= $getPackageDetail->number_of_properties) {
                return ['status' => false, 'message' => 'Agent has reached the maximum number of properties.'];
            }
        } elseif ($type === 'project') {
            $projectCount = $agent->projects()->count();
            if ($projectCount >= $getPackageDetail->number_of_projects) {
                return ['status' => false, 'message' => 'Agent has reached the maximum number of projects.'];
            }
        }

        return ['status' => true, 'message' => 'Agent can create the ' . $type . '.'];
    }
}