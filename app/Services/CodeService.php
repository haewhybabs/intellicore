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

    public function resetCode($userId)
    {
        return $this->codeRepository->resetCode($userId);
    }

    public function codeStatus($userId,$valid){

        return $this->codeRepository->codeStatus($userId,$valid);
    }

    public function findCodeByUserId($userId){
        
        return $this->codeRepository->findCodeByUserId($userId);
    }
}
