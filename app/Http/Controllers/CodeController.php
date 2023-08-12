<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CodeResource;
use App\Models\User;
use App\Services\CodeServiceInterface;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    protected $codeService;

    public function __construct(CodeServiceInterface $codeService)
    {
        $this->codeService = $codeService;
    }

    public function allocateCode(Request $request)
    {
        $validate= $request->validate(['user_id'=>'required|numeric']);
        $userId = $request->input('user_id');
        $checkAllocation = $this->codeService->findCodeByUserId($userId);

        if($checkAllocation){
            return response()->json(['error' => 'User code has already been allocated'], 400);
        }
        
        $code = $this->codeService->allocateCode($userId);
        return new CodeResource($code);
    }


    public function allocateRandomCodes(Request $request)
    {
        $numberOfUsers = 10;
        $randomUsers = User::inRandomOrder()->limit($numberOfUsers)->get();

        $allocatedCodes = [];

        foreach ($randomUsers as $user) {
            $checkAllocation = $this->codeService->findCodeByUserId($user->id);

            if ($checkAllocation) {
                continue; // Skip already allocated users
            }

            $code = $this->codeService->allocateCode($user->id);
            $allocatedCodes[] = new CodeResource($code);
        }

        return response()->json(['data' => $allocatedCodes], 200);
    }

    public function resetCode(Request $request)
    {
        $code = $request->input('code');
        $this->codeService->resetCode($code);
    }
}

