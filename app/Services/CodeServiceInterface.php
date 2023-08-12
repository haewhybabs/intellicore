<?php

namespace App\Services;

interface CodeServiceInterface
{
    public function generateCode();
    public function allocateCode($userId);
    public function resetCode($code);
    public function findCodeByUserId($userId);
}
