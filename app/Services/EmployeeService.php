<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService
{
    /**
     * @param array $data
     * @return mixed
     */
    public function storeEmployee(array $data): Employee
    {
        return Employee::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'company_id' => $data['company_id'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
    }

    /**
     * @param Employee $employee
     * @param array $data
     * @return bool
     */
    public function updateEmployee(Employee $employee, array $data): bool
    {
        return $employee->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'company_id' => $data['company_id'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
    }

    /**
     * @param Employee $employee
     * @return void
     */
    public function deleteEmployee(Employee $employee): void
    {
        $employee->delete();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Employee::all();
    }
}
