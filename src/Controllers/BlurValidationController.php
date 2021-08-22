<?php

namespace Vincentkos\BlurValidation\Controllers;

use Illuminate\Http\Request;

class BlurValidationController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            '_rules' => ['required', 'string'],
            '_field' => ['required', 'string'],
        ]);

        $request->validate([
            $request->_field => $request->_rules,
        ]);

        abort(200);
    }
}
