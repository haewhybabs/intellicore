<?php

namespace App\Services;

use App\Repositories\CodeRepositoryInterface;

class CodeService implements CodeServiceInterface
{
    protected $codeRepository;

    public function __construct(CodeRepositoryInterface $codeRepository)
    {
        $this->codeRepository = $codeRepository;
    }

    public function generateCode()
    {
        return $this->codeRepository->generateCode();
    }

    public function allocateCode($userId)
    {
        $code = $this->generateCode();
        $allocate = $this->codeRepository->allocateCode($userId, $code);
        return $allocate;
    }

    public function resetCode($code)
    {
        $this->codeRepository->resetCode($code);
    }

    public function findCodeByUserId($userId){
        
        $this->codeRepository->findCodeByUserId($userId);
    }
}
