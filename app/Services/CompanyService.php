<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    public function createCompany(array $data)
    {
        $company = Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'logo' => $this->uploadLogo($data['logo']),
            'website' => $data['website'],
        ]);

        return $company;
    }

    public function updateCompany(Company $company, array $data)
    {
        $company->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'logo' => $this->uploadLogo($data['logo']),
            'website' => $data['website'],
        ]);

        return $company;
    }

    private function uploadLogo($logo)
    {
        if ($logo) {
            $path = $logo->store('logos');
            return $path;
        }
        return null;
    }
}
