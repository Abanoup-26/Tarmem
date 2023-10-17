
$(document).ready(function () {
    var illnessStatusSelect = $('#illness_status');
    var illnessTypeContainer = $('#illness_type_container');

    var FamIllnessStatusSelect = $('#family_illness_status');
    var FamContainer = $('#family_illness_type_container');

    illnessTypeContainer.hide();
    FamContainer.hide();

    // Attach a change event listener to the "illness_status" dropdown
    illnessStatusSelect.change(function () {
        var selectedValue = $(this).val();
        // Check if the selected value is not empty and not equal to "safe"
        if (selectedValue && selectedValue !== "safe") {
            // Show the "illness_type" field
            illnessTypeContainer.show();
        } else {
            // Hide the "illness_type" field if the value is empty or equals "!safe"
            illnessTypeContainer.hide();
        }
    });

    // Attach a change event listener to the "family_illness_type" dropdown
    FamIllnessStatusSelect.change(function () {
        var selectedValue = $(this).val();
        // Check if the selected value is not empty and not equal to "safe"
        if (selectedValue && selectedValue !== "safe") {
            FamContainer.show();
        } else {
            // Hide the "illness_type" field if the value is empty or equals "!safe"
            FamContainer.hide();
        }
    });

    var jobStatusSelect = $('#job_status');
    var jobTitleContainer = $('#job_title_container');
    var empContainer = $('#employer_container');
    var jobSallaryContainer = $('#job_sallary_container');

    var familyJobStatusSelect = $('#family_job_status');
    var familyJobTitle = $('#family_job_title_container');
    var famJobSallaryContainer = $('#family_job_sallary_container');
    var familyEmpContainer = $('#family_employer_container');

    var maritalStatusSelect = $('#marital_status');
    var maritalStatusDate = $('#marital_status_date_container');

    var familyMaritalStatusSelect = $('#family_marital_status');
    var familyMaritalStautsDate = $('#family_marital_status_date');

    jobTitleContainer.hide();
    empContainer.hide();
    jobSallaryContainer.hide();
    famJobSallaryContainer.hide();
    familyEmpContainer.hide();
    familyJobTitle.hide();
    maritalStatusDate.hide();
    familyMaritalStautsDate.hide();

    // Attach a change event listener to the "marital_stauts" dropdown
    maritalStatusSelect.change(function () {
        var selectedValue = $(this).val();
        // Check if the selected value is single to hide date
        if (selectedValue && selectedValue !== "single") {
            maritalStatusDate.show();
        } else {
            maritalStatusDate.hide();
        }
    });

    // Attach a change event listener to the "marital_stauts" dropdown
    familyMaritalStatusSelect.change(function () {
        var selectedValue = $(this).val();
        // Check if the selected value is single to hide date
        if (selectedValue && selectedValue !== "single") {
            familyMaritalStautsDate.show();
        } else {
            familyMaritalStautsDate.hide();
        }
    });

    // Attach a change event listener to the "job_status" dropdown
    jobStatusSelect.change(function () {
        var selectedValue = $(this).val();
        // Check if the selected value is not empty and not equal to "idle"
        if (selectedValue && selectedValue !== "idle") {
            jobTitleContainer.show();
            jobSallaryContainer.show();
            empContainer.show();
        } else {
            jobTitleContainer.hide();
            jobSallaryContainer.hide();
            empContainer.hide();
        }
    });

    // Attach a change event listener to the "family_job_status" dropdown
    familyJobStatusSelect.change(function () {
        var selectedValue = $(this).val();
        if (selectedValue && selectedValue !== "idle") {
            famJobSallaryContainer.show();
            familyEmpContainer.show();
            familyJobTitle.show();
        } else {
            famJobSallaryContainer.hide();
            familyEmpContainer.hide();
            familyJobTitle.hide();
        }
    });
});

