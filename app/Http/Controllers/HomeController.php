<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.home', compact('assets'));
    }

    public function reports(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('reports.reports', compact('assets'));
    }

    /*
     * Menu Style Routs
     */
    public function horizontal(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.horizontal',compact('assets'));
    }
    public function dualhorizontal(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.dual-horizontal',compact('assets'));
    }
    public function dualcompact(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.dual-compact',compact('assets'));
    }
    public function boxed(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.boxed',compact('assets'));
    }
    public function boxedfancy(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.boxed-fancy',compact('assets'));
    }

    /*
     * Pages Routs
     */
    public function billing(Request $request)
    {
        return view('special-pages.billing');
    }

    public function calender(Request $request)
    {
        $assets = ['calender'];
        return view('special-pages.calender',compact('assets'));
    }

    public function kanban(Request $request)
    {
        return view('special-pages.kanban');
    }

    public function pricing(Request $request)
    {
        return view('special-pages.pricing');
    }

    public function rtlsupport(Request $request)
    {
        return view('special-pages.rtl-support');
    }

    public function timeline(Request $request)
    {
        return view('special-pages.timeline');
    }


    /*
     * Widget Routs
     */
    public function widgetbasic(Request $request)
    {
        return view('widget.widget-basic');
    }
    public function widgetchart(Request $request)
    {
        $assets = ['chart'];
        return view('widget.widget-chart', compact('assets'));
    }
    public function widgetcard(Request $request)
    {
        return view('widget.widget-card');
    }

    /*
     * Maps Routs
     */
    public function google(Request $request)
    {
        return view('maps.google');
    }
    public function vector(Request $request)
    {
        return view('maps.vector');
    }

    /*
     * Auth Routs
     */
    public function signin(Request $request)
    {
        return view('auth.login');
    }
    public function signup(Request $request)
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {

        // Validate the incoming request
        $validatedData = $request->validate([
            'email' => 'required|string|email|unique:users,email',
            'phone_number' => 'nullable|string',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,others',
            'nationality' => 'nullable|string',
            'attachments' => 'nullable|json',
            'password' => 'required|string|min:8',
            'status' => 'nullable|string',
            'company_name' => 'nullable|string',
            'street_addr_1' => 'nullable|string',
            'street_addr_2' => 'nullable|string',
            'alt_phone_number' => 'nullable|string',
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'pin_code' => 'nullable|integer',
            'facebook_url' => 'nullable|string|url',
            'instagram_url' => 'nullable|string|url',
            'twitter_url' => 'nullable|string|url',
            'linkdin_url' => 'nullable|string|url',
            'child_name' => 'nullable|string',
            'age' => 'nullable|integer',
            'school_name' => 'nullable|string',
            'std_year' => 'nullable|integer',
            'allergies' => 'nullable|string',
            'parent_name' => 'nullable|string',
            'parent_contact' => 'nullable|string',
            'parent_email' => 'nullable|string|email',
            'emergency_contact_name' => 'nullable|string',
            'relationship' => 'nullable|string',
            'emergency_contact_phone' => 'nullable|string',
            'inspiration' => 'nullable|string',
            'business_experience' => 'nullable|string',
            'hobbies' => 'nullable|string',
            'business_ideas' => 'nullable|string',
            'subjects' => 'nullable|string',
            'favourite_subject' => 'nullable|string',
            'future_aspirations' => 'nullable|string',
            'consent' => 'nullable|string',
            'consent_date' => 'nullable|date',
        ]);

        // Split the child's name into first and last parts
        $childNameParts = explode(' ', $request->input('child_name'));
        $firstName = $childNameParts[0]; // First part of child's name
        $lastName = end($childNameParts); // Last part of child's name

        // Create a new user record
        $user = User::create([
            'id' => Str::uuid(),  // Generate a UUID for the user ID
            'username' => $firstName,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $validatedData['email'],
            'national_no' => $validatedData['national_no'] ?? 0000,
            'phone_number' => $validatedData['phone_number'] ?? null,
            'dob' => $validatedData['dob'] ?? null,
            'gender' => $validatedData['gender'] ?? null,
            'nationality' => $validatedData['nationality'] ?? null,
            'user_type' => 'child',
            'attachments' => $validatedData['attachments'] ?? null,
            'password' => Hash::make($validatedData['password']),  // Hash the password
            'status' => $validatedData['status'] ?? 'pending',
            'company_name' => $validatedData['company_name'] ?? null,
            'street_addr_1' => $validatedData['street_addr_1'] ?? null,
            'street_addr_2' => $validatedData['street_addr_2'] ?? null,
            'alt_phone_number' => $validatedData['alt_phone_number'] ?? null,
            'country' => $validatedData['country'] ?? null,
            'state' => $validatedData['state'] ?? null,
            'city' => $validatedData['city'] ?? null,
            'pin_code' => $validatedData['pin_code'] ?? null,
            'facebook_url' => $validatedData['facebook_url'] ?? null,
            'instagram_url' => $validatedData['instagram_url'] ?? null,
            'twitter_url' => $validatedData['twitter_url'] ?? null,
            'linkdin_url' => $validatedData['linkdin_url'] ?? null,
            'child_name' => $validatedData['child_name'] ?? null,
            'age' => $validatedData['age'] ?? null,
            'school_name' => $validatedData['school_name'] ?? null,
            'std_year' => $validatedData['std_year'] ?? null,
            'allergies' => $validatedData['allergies'] ?? null,
            'parent_name' => $validatedData['parent_name'] ?? null,
            'parent_contact' => $validatedData['parent_contact'] ?? null,
            'parent_email' => $validatedData['parent_email'] ?? null,
            'emergency_contact_name' => $validatedData['emergency_contact_name'] ?? null,
            'relationship' => $validatedData['relationship'] ?? null,
            'emergency_contact_phone' => $validatedData['emergency_contact_phone'] ?? null,
            'inspiration' => $validatedData['inspiration'] ?? null,
            'business_experience' => $validatedData['business_experience'] ?? null,
            'hobbies' => $validatedData['hobbies'] ?? null,
            'business_ideas' => $validatedData['business_ideas'] ?? null,
            'subjects' => $validatedData['subjects'] ?? null,
            'favourite_subject' => $validatedData['favourite_subject'] ?? null,
            'future_aspirations' => $validatedData['future_aspirations'] ?? null,
            'consent' => $validatedData['consent'] ?? null,
            'consent_date' => $validatedData['consent_date'] ?? null,
        ]);

        $user->assignRole('admin');
        
        return view('auth.register')->with('success', 'User registration successful, proceed to login.');
    }
    public function confirmmail(Request $request)
    {
        return view('auth.confirm-mail');
    }
    public function lockscreen(Request $request)
    {
        return view('auth.lockscreen');
    }
    public function recoverpw(Request $request)
    {
        return view('auth.recoverpw');
    }
    public function userprivacysetting(Request $request)
    {
        return view('auth.user-privacy-setting');
    }

    /*
     * Error Page Routs
     */

    public function error404(Request $request)
    {
        return view('errors.error404');
    }

    public function error500(Request $request)
    {
        return view('errors.error500');
    }
    public function maintenance(Request $request)
    {
        return view('errors.maintenance');
    }

    /*
     * uisheet Page Routs
     */
    public function uisheet(Request $request)
    {
        // redirect to login page
        // return redirect()->route('auth.signin');
        // return redirect()->route('landing-pages.index');
        return view('uisheet');
    }

    /*
     * Form Page Routs
     */
    public function element(Request $request)
    {
        return view('forms.element');
    }

    public function wizard(Request $request)
    {
        return view('forms.wizard');
    }

    public function validation(Request $request)
    {
        return view('forms.validation');
    }

     /*
     * Table Page Routs
     */
    public function bootstraptable(Request $request)
    {
        return view('table.bootstraptable');
    }

    public function datatable(Request $request)
    {
        return view('table.datatable');
    }

    /*
     * Icons Page Routs
     */

    public function solid(Request $request)
    {
        return view('icons.solid');
    }

    public function outline(Request $request)
    {
        return view('icons.outline');
    }

    public function dualtone(Request $request)
    {
        return view('icons.dualtone');
    }

    public function colored(Request $request)
    {
        return view('icons.colored');
    }

    /*
     * Extra Page Routs
     */
    public function privacypolicy(Request $request)
    {
        return view('privacy-policy');
    }
    public function termsofuse(Request $request)
    {
        return view('terms-of-use');
    }


    /*
    * Landing Page Routs
    */
    public function landing_index(Request $request)
    {
        return view('landing-pages.pages.index');
    }
    public function landing_blog(Request $request)
    {
        return view('landing-pages.pages.blog');
    }
    public function landing_about(Request $request)
    {
        return view('landing-pages.pages.about');
    }
    public function landing_blog_detail(Request $request)
    {
        return view('landing-pages.pages.blog-detail');
    }
    public function landing_contact(Request $request)
    {
        return view('landing-pages.pages.contact-us');
    }
    public function landing_ecommerce(Request $request)
    {
        return view('landing-pages.pages.ecommerce-landing-page');
    }
    public function landing_faq(Request $request)
    {
        return view('landing-pages.pages.faq');
    }
    public function landing_feature(Request $request)
    {
        return view('landing-pages.pages.feature');
    }
    public function landing_pricing(Request $request)
    {
        return view('landing-pages.pages.pricing');
    }
    public function landing_saas(Request $request)
    {
        return view('landing-pages.pages.saas-marketing-landing-page');
    }
    public function landing_shop(Request $request)
    {
        return view('landing-pages.pages.shop');
    }
    public function landing_shop_detail(Request $request)
    {
        return view('landing-pages.pages.shop_detail');
    }
    public function landing_software(Request $request)
    {
        return view('landing-pages.pages.software-landing-page');
    }
    public function landing_startup(Request $request)
    {
        return view('landing-pages.pages.startup-landing-page');
    }
}
