<?php
namespace App\Repositories;

use AcmeSecureCode\Contracts\SecureCodeInterface;
use App\Models\Code;

class CodeRepository implements CodeRepositoryInterface
{
    protected $secureCodeGenerator;

    public function __construct(SecureCodeInterface $secureCodeGenerator)
    {
        $this->secureCodeGenerator = $secureCodeGenerator;
    }

    public function generateCode()
    {
        return $this->secureCodeGenerator->generateCode();
    }

    public function allocateCode($userId, $code)
    {
        return Code::create([
            'user_id' => $userId,
            'code' => $code,
            'is_valid' => true,
        ]);
    }

    public function resetCode($userId)
    {
        $newCode = $this->secureCodeGenerator->generateCode();
        Code::where('user_id', $userId)->update([
            'code'=>$newCode
        ]);
        return $newCode;
    }


    public function codeStatus($userId,$valid){
        return Code::where('user_id', $userId)->update([
            'is_valid'=>$valid
        ]);
    }

    public function findCodeByUserId($userId)
    {
        return Code::where('user_id',$userId)->first();
    }
}
