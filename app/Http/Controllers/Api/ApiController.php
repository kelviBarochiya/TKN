<?php

namespace App\Http\Controllers\Api;

use App\Models\AboutUs;
use App\Models\HowWeDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function AboutUsListing()
    {
        $aboutUs = DB::table('about_us')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'points' => $item->points ? json_decode($item->points, true) : [],
                'images' => asset($item->images),
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });

        return apiResponse(200, true, 'About Us fetched successfully', $aboutUs);
    }

    public function HowWeDoListing()
    {
        $howWeDo = DB::table('how_we_do')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'our_vision' => $item->our_vision,
                'our_mission' => $item->our_mission,
                'what_sets_us_apart' => $item->what_sets_us_apart,
                'image' => asset($item->image),
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });

        return apiResponse(200, true, 'How We Do fetched successfully', $howWeDo);
    }

    public function TestimonialListing()
    {
        $testimonials = DB::table('testimonials')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name'        => $item->name,
                'designation' => $item->designation,
                'feedback_content' => $item->feedback_content,
                'rating'      => $item->rating,
                'image'       => asset($item->image),
                'created_at'  => $item->created_at,
                'updated_at'  => $item->updated_at,
            ];
        });

        return apiResponse(200, true, 'Testimonials fetched successfully', $testimonials);
    }
    public function OurTeamsListing()
    {
        $ourTeams = DB::table('our_teams')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name'        => $item->name,
                'designation' => $item->designation,
                'image'       => asset($item->image),
                'instagram_url'       => $item->instagram_url,
                'linkedin_url'       => $item->linkedin_url,
                'twitter_url'       => $item->twitter_url,
                'facebook_url'       => $item->facebook_url,
                'created_at'  => $item->created_at,
                'updated_at'  => $item->updated_at,
            ];
        });

        return apiResponse(200, true, 'Our Teams fetched successfully', $ourTeams);
    }
}
