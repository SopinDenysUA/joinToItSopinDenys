<?php

namespace App\Services;

use App\Mail\CompanyCreated;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class CompanyService
{
    /**
     * @param array $data
     * @return Company
     */
    public function storeCompany(array $data): Company
    {
        return Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'logo' => $data['logo'],
            'website' => $data['website'],
        ]);
    }

    /**
     * @param Company $company
     * @param array $data
     * @return bool
     */
    public function updateCompany(Company $company, array $data): bool
    {
        return $company->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'logo' => $data['logo'],
            'website' => $data['website'],
        ]);
    }

    /**
     * @param Company $company
     * @return void
     */
    public function deleteCompany(Company $company): void
    {
        $company->delete();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Company::all();
    }

    /**
     * @param $company
     * @return void
     */
    public function sendByMail($company): void
    {
        Mail::to(env('MAIL_FROM_ADMIN'))->send(new CompanyCreated($company));
    }
}
