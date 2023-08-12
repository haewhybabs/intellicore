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
        Code::create([
            'user_id' => $userId,
            'code' => $code,
            'is_allocated' => true,
        ]);
    }

    public function resetCode($code)
    {
        Code::where('code', $code)->update([
            'user_id' => null,
            'is_allocated' => false,
        ]);
    }
}
