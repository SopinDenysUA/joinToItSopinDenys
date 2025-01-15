<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\EmployeeService;
use App\Services\CompanyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    protected EmployeeService $_employeesService;
    protected CompanyService $_companyService;

    public function __construct(EmployeeService $employeeService, CompanyService $companyService)
    {
        $this->_employeesService = $employeeService;
        $this->_companyService = $companyService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $employees = $this->_employeesService->getAll();
        return view('admin.employees.employees', compact('employees'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $companies = $this->_companyService->getAll();

        return view('admin.employees.form', compact('companies'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'company_id' => 'required|exists:companies,id',
                'email' => 'nullable|email',
                'phone' => 'nullable|string|max:20',
            ],
            [
                'first_name.required' => 'Поле "І`мя" обов`язкове для заповнення',
                'first_name.string' => 'Поле "І`мя" повинно бути рядком',
                'first_name.max:255' => 'Поле "І`мя" приймае максимум 255 літер',
                'last_name.required' => 'Поле "Прізвище" обов`язкове для заповнення',
                'last_name.string' => 'Поле "Прізвище" повинно бути рядком',
                'last_name.max:255' => 'Поле "Прізвище" приймае максимум 255 літер',
                'company_id.required' => 'Виберіть компанію',
                'email.email' => 'Будь ласка, перевірте формат поля "Email"',
                'phone.string' => 'Поле "І`мя" повинно бути рядком',
                'phone.max:20' => 'Поле "І`мя" приймае максимум 20 цифр',
            ]
        );

        $this->_employeesService->storeEmployee($data);

        return redirect()->route('employees.index')->with('success', "Співробітника {$request->first_name} {$request->last_name} успішно додано");
    }

    /**
     * @param Employee $employee
     * @return View
     */
    public function show(Employee $employee): View
    {
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * @param Employee $employee
     * @return View
     */
    public function edit(Employee $employee): View
    {
        $companies = $this->_companyService->getAll();

        return view('admin.employees.form', compact('employee', 'companies'));
    }

    /**
     * @param Request $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $data = $request->validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'company_id' => 'required|exists:companies,id',
                'email' => 'nullable|email',
                'phone' => 'nullable|string|max:20',
            ],
            [
                'first_name.required' => 'Поле "І`мя" обов`язкове для заповнення',
                'first_name.string' => 'Поле "І`мя" повинно бути рядком',
                'first_name.max:255' => 'Поле "І`мя" приймае максимум 255 літер',
                'last_name.required' => 'Поле "Прізвище" обов`язкове для заповнення',
                'last_name.string' => 'Поле "Прізвище" повинно бути рядком',
                'last_name.max:255' => 'Поле "Прізвище" приймае максимум 255 літер',
                'company_id.required' => 'Виберіть компанію',
                'email.email' => 'Будь ласка, перевірте формат поля "Email"',
                'phone.string' => 'Поле "І`мя" повинно бути рядком',
                'phone.max:20' => 'Поле "І`мя" приймае максимум 20 цифр',
            ]
        );

        $this->_employeesService->updateEmployee($employee, $data);

        return redirect()->route('employees.index')->with('success', "Співробітника {$request->first_name} {$request->last_name} успішно оновлено");
    }

    /**
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $this->_employeesService->deleteEmployee($employee);

        return redirect()->route('employees.index')->with('success', "Співробітника {$employee->first_name} {$employee->last_name} успішно видалено");
    }
}
