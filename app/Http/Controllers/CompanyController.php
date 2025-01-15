<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    protected CompanyService $_companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->_companyService = $companyService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $companies = $this->_companyService->getAll();
        return view('admin.companies.companies', compact('companies'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.companies.form');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'nullable|email',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
                'website' => 'nullable|url',
            ],
            [
                'name.required' => 'Поле "Назва" обов`язкове для заповнення',
                'name.string' => 'Поле "Назва" повинно бути рядком',
                'name.max:255' => 'Поле "Назва" приймае максимум 255 літер',
                'email.email' => 'Будь ласка, перевірте формат поля "Email"',
                'logo.image' => 'Лого повинно бути image',
                'logo.mimes:jpeg,png,jpg,gif,svg' => 'Лого повинно бути jpeg,png,jpg,gif,svg',
                'logo.max:2048' => 'Лого повинно бути максимум 2048',
                'logo.dimensions:min_width=100,min_height=100' => 'Лого повинно бути мінімум 100х100',
                'website.url' => 'Поле "Веб сайт" повинно бути посиланням'
            ]
        );

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $data['logo'] = $logoPath;

        $company = $this->_companyService->storeCompany($data);

        return redirect()->route('companies.index')->with('success', "Компанія {$company->name} успішно добавлена");
    }

    /**
     * @param Company $company
     * @return View
     */
    public function show(Company $company): View
    {
        return view('admin.companies.show', compact('company'));
    }

    /**
     * @param Company $company
     * @return View
     */
    public function edit(Company $company): View
    {
        return view('admin.companies.form', compact('company'));
    }

    /**
     * @param Request $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(Request $request, Company $company): RedirectResponse
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'nullable|email',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
                'website' => 'nullable|url',
            ],
            [
                'name.required' => 'Поле "Назва" обов`язкове для заповнення',
                'name.string' => 'Поле "Назва" повинно бути рядком',
                'name.max:255' => 'Поле "Назва" приймае максимум 255 літер',
                'email.email' => 'Будь ласка, перевірте формат поля "Email"',
                'logo.image' => 'Лого повинно бути image',
                'logo.mimes:jpeg,png,jpg,gif,svg' => 'Лого повинно бути jpeg,png,jpg,gif,svg',
                'logo.max:2048' => 'Лого повинно бути максимум 2048',
                'logo.dimensions:min_width=100,min_height=100' => 'Лого повинно бути мінімум 100х100',
                'website.url' => 'Поле "Веб сайт" повинно бути посиланням'
            ]
        );

        $logoPath = $company->logo;
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $data['logo'] = $logoPath;

        $this->_companyService->updateCompany($company, $data);

        return redirect()->route('companies.index')->with('success', "Компанія {$request->name} успішно обновлена");
    }

    /**
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }

        $this->_companyService->deleteCompany($company);

        return redirect()->route('companies.index')->with('success', "Компанія {$company->name} успішно видалена");
    }
}
