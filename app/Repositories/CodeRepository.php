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

    public function resetCode($code)
    {
        return Code::where('code', $code)->update([
            'user_id' => null,
            'is_valid' => false,
        ]);
    }

    public function findCodeByUserId($userId)
    {
        return Code::where('user_id',$userId)->first();
    }
}
