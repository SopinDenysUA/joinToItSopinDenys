<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    public function createEmployee(array $data)
    {
        $employee = Employee::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'company_id' => $data['company_id'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        return $employee;
    }

    public function updateEmployee(Employee $employee, array $data)
    {
        $employee->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'company_id' => $data['company_id'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        return $employee;
    }

    public function deleteEmployee(Employee $employee)
    {
        $employee->delete();
    }
}
