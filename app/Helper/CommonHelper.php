<?php

use App\Models\Module;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


if (!function_exists('apiResponse')) {
    function apiResponse($code, $status, $message, $data, $is_array = false, $server_code = 200)
    {
        if ($is_array == true) {
            $responseData[] = $data;
        } else {
            $responseData = $data;
        }
        return response()->json([
            'code' => $code,
            'success' => $status,
            'message' => $message,
            'data' => $responseData
        ], $server_code);
    }
}

if (!function_exists('addModule')) {
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
}

if (!function_exists('getPermission')) {
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
}

if (!function_exists('generateMetaTags')) {
    function generateMetaTags()
    {
        $metaArr = [];
        $currentUrl = url()->current();   // current full URL
        $currentPath = request()->path(); // current path

        // Homepage
        if ($currentPath === '/' || $currentPath === '') {
            $meta = DB::table('meta_tags')->where('type', 'home')->first();
            if ($meta) {
                $metaArr['title'] = $meta->meta_title;
                $metaArr['description'] = $meta->meta_description;
            }
            return $metaArr;
        }

        $segments = explode('/', $currentPath);
        $mainPage = $segments[0] ?? null;
        $singlePage = $segments[1] ?? null;

        // Static cases
        if ($mainPage == "ai-powered-business-solutions") {
            $metaTag = DB::table('meta_tags')->where('type', 'aiBusinessSolutions')->first();
        } elseif ($mainPage == "data-analytics-and-predictive-intelligence") {
            $metaTag = DB::table('meta_tags')->where('type', 'dataAnalytics')->first();
        } elseif ($mainPage == "sustainable-digital-solutions") {
            $metaTag = DB::table('meta_tags')->where('type', 'sustainableSolutions')->first();
        } elseif ($mainPage == "creative-ai-and-generative-design") {
            $metaTag = DB::table('meta_tags')->where('type', 'creativeAI')->first();
        } elseif ($mainPage == "it-and_digital-transformation-solutions") {
            $metaTag = DB::table('meta_tags')->where('type', 'itSolutions')->first();
        }

        if (isset($metaTag)) {
            $metaArr['title'] = $metaTag->meta_title;
            $metaArr['description'] = $metaTag->meta_description;
            return $metaArr;
        }

        // Single segment
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
            // Module wise
            $meta = DB::table('meta_tags')
                ->where('type', $mainPage)
                ->where('module', str_replace("-", " ", $singlePage))
                ->first();

            if (!$meta) {
                if ($mainPage === "project") {
                    $data = DB::table('case_studies')->where('type', str_replace("-", " ", $singlePage))->first();
                } elseif ($mainPage === "service") {
                    $data = DB::table('services')->where('title', str_replace("-", " ", $singlePage))->first();
                } elseif ($mainPage === "blog") {
                    $data = DB::table('blogs')->where('title', 'like', '%' . str_replace("-", " ", $singlePage) . '%')->first();
                } elseif ($mainPage === "about-us") {
                    $allowedAboutUsTitles = [
                        'Company Overview', 'Mission and Values', 'Corporate Governance',
                        'Values and Ethics', 'Environmental Sustainability', 'Client Services', 'Work and Culture'
                    ];
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
}

if (!function_exists('getImageHeightWidthForResize')) {
    function getImageHeightWidthForResize($module)
    {
        $height = "";
        $width = "";
        if (isset($module)) {
            $getRecord = \App\Models\ImageSetting::where('module', $module)->first();
            if ($getRecord) {
                $height = $getRecord->height;
                $width = $getRecord->width;
            }
        }
        return [$height, $width];
    }
}

if (!function_exists('getAdminName')) {
    function getAdminName($user_id)
    {
        if (!empty($user_id)) {
            $users = \DB::table('users')->where('id', $user_id)->first();
            return $users->name ?? "";
        }
        return "";
    }
}

if (!function_exists('getUserName')) {
    function getUserName($user_id)
    {
        if (!empty($user_id)) {
            $users = \DB::table('check_status')->where('id', $user_id)->first();
            if ($users && isset($users->mobile_number)) {
                $getName = \DB::table('complaints')->where('mobile_number', $users->mobile_number)->first();
                return $getName->name ?? "";
            }
        }
        return "";
    }
}
