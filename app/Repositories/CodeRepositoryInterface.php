<?php
namespace App\Repositories;

interface CodeRepositoryInterface
{
    public function generateCode();
    public function allocateCode($userId, $code);
    public function resetCode($code);
    public function findCodeByUserId($userId);
    public function codeStatus($userId,$valid);
}
