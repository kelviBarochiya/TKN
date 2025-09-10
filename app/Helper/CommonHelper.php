<?php


use App\Models\Module;
use Illuminate\Support\Facades\Log;


    // Function to add a new module if it doesn't already exist
    function addModule($moduleName)
    {
        // Check if module already exists
        if (Module::where('name', $moduleName)->exists()) {
            return false; // Module already exists
        }

        // Add the module to the modules table
        Module::create(['name' => $moduleName]);
        return true;
    }
    

    function getPermission($moduleName, $permissionName = null)
    {
        $role_id = auth()->user()->role_id;
    
        $module = \DB::table('modules')->where('name', $moduleName)->first();
        if (!$module) return false;
    
        $permissions = \DB::table('permissions')
            ->where('module_id', $module->id)
            ->where('role_id', $role_id)
            ->first();
    
        if (!$permissions) return false;
    
        if ($permissionName) {
            $permissionColumn = "{$permissionName}_permission";
            return $permissions->$permissionColumn == 1;
        }
    
        return $permissions->list_permission || $permissions->create_permission || 
               $permissions->edit_permission || $permissions->delete_permission;
    }
    

    use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

function generateMetaTags()
{
    $metaArr = [];
    
    // Get current full URL and current path
    $currentUrl = url()->current();           // e.g., https://domain.com/service/web-development
    $currentPath = request()->path();         // e.g., service/web-development OR just '/' for home
    
    // Handle homepage
    if ($currentPath === '/' || $currentPath === '') {
        $meta = DB::table('meta_tags')->where('type', 'home')->first();
        if ($meta) {
            $metaArr['title'] = $meta->meta_title;
            $metaArr['description'] = $meta->meta_description;
        }
        return $metaArr;
    }

    // Split path into segments
    $segments = explode('/', $currentPath);   // ['service', 'web-development']
    $mainPage = $segments[0] ?? null;
    $singlePage = $segments[1] ?? null;
    // dd($mainPage);
   if($mainPage == "ai-powered-business-solutions"){
    $metaTag = \DB::table('meta_tags')->where('type', 'aiBusinessSolutions')->first();

    if ($metaTag) {
        $metaArr['title'] = $metaTag->meta_title;       // ✅ fix here
        $metaArr['description'] = $metaTag->meta_description; // ✅ and here
    }

    return $metaArr;
}

 if($mainPage == "data-analytics-and-predictive-intelligence"){
    $metaTag = \DB::table('meta_tags')->where('type', 'dataAnalytics')->first();

    if ($metaTag) {
        $metaArr['title'] = $metaTag->meta_title;       // ✅ fix here
        $metaArr['description'] = $metaTag->meta_description; // ✅ and here
    }

    return $metaArr;
}

 if($mainPage == "sustainable-digital-solutions"){
    $metaTag = \DB::table('meta_tags')->where('type', 'sustainableSolutions')->first();

    if ($metaTag) {
        $metaArr['title'] = $metaTag->meta_title;       // ✅ fix here
        $metaArr['description'] = $metaTag->meta_description; // ✅ and here
    }

    return $metaArr;
}

 if($mainPage == "creative-ai-and-generative-design"){
    $metaTag = \DB::table('meta_tags')->where('type', 'creativeAI')->first();

    if ($metaTag) {
        $metaArr['title'] = $metaTag->meta_title;       // ✅ fix here
        $metaArr['description'] = $metaTag->meta_description; // ✅ and here
    }

    return $metaArr;
}

 if($mainPage == "it-and_digital-transformation-solutions"){
    $metaTag = \DB::table('meta_tags')->where('type', 'itSolutions')->first();

    if ($metaTag) {
        $metaArr['title'] = $metaTag->meta_title;       // ✅ fix here
        $metaArr['description'] = $metaTag->meta_description; // ✅ and here
    }

    return $metaArr;
}


    // If it's a single segment (e.g. /about or /privacy-policy)
    if (count($segments) === 1 || $singlePage === null) {
        
        $meta = DB::table('meta_tags')->where('type', $mainPage)->whereNull('module')->first();

        if ($meta) {
            $metaArr['title'] = $meta->meta_title;
            $metaArr['description'] = $meta->meta_description;
        } else {
            if ($mainPage === "privacy-policy") {
                $page = DB::table('pages')->where('title', 'Privacy & Policy')->first();
            } elseif ($mainPage === "terms-conditons") {
                $page = DB::table('pages')->where('title', 'Term & Condition')->first();
            }

            if (isset($page)) {
                $metaArr['title'] = $page->title;
                $metaArr['description'] = $page->content;
            }
        }
    } else {
        
        // Try meta_tags with module
        $meta = DB::table('meta_tags')
            ->where('type', $mainPage)
            ->where('module', str_replace("-", " ", $singlePage))
            ->first();

        if (!$meta) {
            // Fallback: check other tables
            if ($mainPage === "project") {
                
                $data = DB::table('case_studies')->where('type', str_replace("-", " ", $singlePage))->first();
                
            } elseif ($mainPage === "service") {
                $data = DB::table('services')->where('title', str_replace("-", " ", $singlePage))->first();
            } elseif ($mainPage === "blog") {
                $data = DB::table('blogs')->where('title', 'like', '%' . str_replace("-", " ", $singlePage) . '%')->first();
            }elseif ($mainPage === "about-us") {
                // ✅ Manual titles for about-us
                $allowedAboutUsTitles = ['Company Overview','Mission and Values','Corporate Governance','Values and Ethics','Environmental Sustainability','Client Services','Work and Culture'];
                $formatted = str_replace("-", " ", $singlePage);
    
                if (in_array($formatted, $allowedAboutUsTitles)) {
                    $data = DB::table('pages')->where('title', $formatted)->first();
                }
            }

            if (isset($data)) {
                $metaArr['title'] = $data->title ?? $data->type;
                $metaArr['description'] = $data->description ?? $data->content ?? '';
            } else {
                $metaArr['title'] = '';
                $metaArr['description'] = '';
            }
        } else {
            $metaArr['title'] = $meta->meta_title;
            $metaArr['description'] = $meta->meta_description;
        }
    }

    return $metaArr;
}


function getImageHeightWidthForResize($module)
{

    $height = "";
    $width = "";
    if(isset($module)){
        $getRecord = \App\Models\ImageSetting::where('module',$module)->first();
        if(isset($getRecord) && !empty($getRecord)){
            $height = $getRecord->height;
            $width = $getRecord->width;
        }
    }
    return [$height , $width];
}
    
    function getAdminName($user_id)
    {
        if (!empty($user_id)) {
            $users = \DB::table('users')->where('id', $user_id)->first();
            if (isset($users)) {
                return $users->name ?? "";
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    function getUserName($user_id)
    {
        if (!empty($user_id)) {
            $users = \DB::table('check_status')->where('id', $user_id)->first();
            if (isset($users)) {
                $mobileNumber = $users->mobile_number;
                if (isset($mobileNumber)) {
                    $getName = \DB::table('complaints')->where('mobile_number', $mobileNumber)->first();
                    if (!empty($getName)) {
                        return $getName->name ?? "";
                    } else {
                        return "";
                    }
                }
            }
        } else {
            return "";
        }
    }
