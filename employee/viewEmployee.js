function viewEmployee(empid) {
    fetch(`fetch_employee.php?id=${empid}`)
        .then(response => response.json())
        .then(data => {
            // Display employee details in the modal
            document.getElementById('modalEmpId').innerText = data.empid;
            document.getElementById('modalName').innerText = data.name;
            document.getElementById('modalDepartment').innerText = data.department;
            document.getElementById('modalDesignation').innerText = data.designation;
            document.getElementById('modalLevel').innerText = data.level;
            document.getElementById('modalBasicSalary').innerText = data.basic_salary;
            document.getElementById('modalHRA').innerText = data.HRA;
            document.getElementById('modalDA').innerText = data.DA;
            document.getElementById('modalTA').innerText = data.TA;
            document.getElementById('modalTotalSalary').innerText = data.totalSalary;
            document.getElementById('modalGender').innerText = data.gender;
            document.getElementById('modalPhoneNumber').innerText = data.phone_number;
            document.getElementById('modalHRAperc').innerText = data.HRA_prec;  // Updated
            document.getElementById('modalDAperc').innerText = data.DA_perc;    // Updated

            // Store empid for later use in editing
            window.currentEmpId = empid;

            // Show the details modal
            document.getElementById('employeeModal').style.display = 'block';
        })
        .catch(error => console.error('Error fetching employee:', error));
}

function editEmployee() {
    const empid = window.currentEmpId; // Get the empid stored previously
    fetch(`fetch_employee.php?id=${empid}`)
        .then(response => response.json())
        .then(data => {
            // Fill the edit form with current employee details
            document.getElementById('editName').value = data.name;
            document.getElementById('editDepartment').value = data.department;
            document.getElementById('editDesignation').value = data.designation;
            document.getElementById('editLevel').value = data.level;
            document.getElementById('editBasicSalary').value = data.basic_salary;
            document.getElementById('editHRA').value = data.HRA;
            document.getElementById('editDA').value = data.DA;
            document.getElementById('editTA').value = data.TA;
            document.getElementById('editGender').value = data.gender;
            document.getElementById('editPhoneNumber').value = data.phone_number;
            document.getElementById('editDAperc').value = data.DA_perc;       // Updated
            document.getElementById('editHRAperc').value = data.HRA_prec;     // Updated

            // Show the edit modal
            document.getElementById('editEmployeeModal').style.display = 'block';
        })
        .catch(error => console.error('Error fetching employee for editing:', error));
}

function updateEmployee() {
    const empid = window.currentEmpId; // Get the empid stored previously
    const updatedData = {
        name: document.getElementById('editName').value,
        department: document.getElementById('editDepartment').value,
        designation: document.getElementById('editDesignation').value,
        level: document.getElementById('editLevel').value,
        basic_salary: document.getElementById('editBasicSalary').value,
        HRA: document.getElementById('editHRA').value,
        DA: document.getElementById('editDA').value,
        TA: document.getElementById('editTA').value,
        gender: document.getElementById('editGender').value,
        phone_number: document.getElementById('editPhoneNumber').value,
        DA_perc: document.getElementById('editDAperc').value,    // Updated
        HRA_prec: document.getElementById('editHRAperc').value,  // Updated
    };

    fetch(`update_employee.php?id=${empid}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(updatedData),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Employee updated successfully!');
            closeEditModal();
            closeModal();
            location.reload(); // Reload the page to see the updated information
        } else {
            alert('Failed to update employee.');
        }
    })
    .catch(error => console.error('Error updating employee:', error));
}
