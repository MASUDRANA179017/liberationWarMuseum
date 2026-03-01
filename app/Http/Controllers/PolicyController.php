<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    protected $types = ['terms_and_condition', 'privacy_and_policy'];

    public function privacyPolicy()
    {
        $policy = Policy::firstOrCreate(['type' => 'privacy_and_policy']);
        return view('admin.policy.privacy-and-policy', compact('policy'));
    }
    public function termsAndConditions()
    {
        $policy = Policy::firstOrCreate(['type' => 'terms_and_condition']);
        return view('admin.policy.terms-and-conditions', compact('policy'));
    }

    public function update(Request $request)
    {
        $type = $request->type;

        Policy::updateOrCreate(
            ['type' => $type],
            ['description' => $request->validate(['description' => 'required|string'])['description']]
        );

        return back()->with('success', ucfirst(str_replace('_', ' ', $type)) . ' updated.');
    }
}
