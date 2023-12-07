/**
 *  Form Wizard
 */

'use strict';

(function () {
    // Init custom option check
    // window.Helpers.initCustomOptionCheck();

    // Vertical Wizard
    // --------------------------------------------------------------------

    const wizardFinancingRequestDetails = document.querySelector('#financing-request-wizard');
    if (typeof wizardFinancingRequestDetails !== undefined && wizardFinancingRequestDetails !== null) {
        // Wizard form
        const wizardFinancingRequestDetailsForm = wizardFinancingRequestDetails.querySelector('#financing-request-wizard-form');
        // Wizard steps
        const wizardFinancingRequestDetailsFormStep1 = wizardFinancingRequestDetailsForm.querySelector('#financing-requirements');
        const wizardFinancingRequestDetailsFormStep2 = wizardFinancingRequestDetailsForm.querySelector('#documentation');
        const wizardFinancingRequestDetailsFormStep3 = wizardFinancingRequestDetailsForm.querySelector('#company-details');
        const wizardFinancingRequestDetailsFormStep4 = wizardFinancingRequestDetailsForm.querySelector('#bankers-capital-structure');
        const wizardFinancingRequestDetailsFormStep5 = wizardFinancingRequestDetailsForm.querySelector('#shareholders');
        const wizardFinancingRequestDetailsFormStep6 = wizardFinancingRequestDetailsForm.querySelector('#key-management');
        const wizardFinancingRequestDetailsFormStep7 = wizardFinancingRequestDetailsForm.querySelector('#current-bank-indebtness');
        const wizardFinancingRequestDetailsFormStep8 = wizardFinancingRequestDetailsForm.querySelector('#current-operating-indebtness');
        const wizardFinancingRequestDetailsFormStep9 = wizardFinancingRequestDetailsForm.querySelector('#anchor-history');
        const wizardFinancingRequestDetailsFormStep10 = wizardFinancingRequestDetailsForm.querySelector('#credit-terms');
        const wizardFinancingRequestDetailsFormStep11 = wizardFinancingRequestDetailsForm.querySelector('#confidentiality-statement');

        // Wizard next prev button
        const wizardFinancingRequestDetailsNext = [].slice.call(wizardFinancingRequestDetailsForm.querySelectorAll('.btn-next'));
        const wizardFinancingRequestDetailsPrev = [].slice.call(wizardFinancingRequestDetailsForm.querySelectorAll('.btn-prev'));

        const validationStepper = new Stepper(wizardFinancingRequestDetails, {
            linear: true
        });

        // Business Details
        const FormValidation1 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep1, {
        fields: {
            // * Validate the fields here based on your requirements
            name: {
              validators: {
                notEmpty: {
                  message: 'Please enter the business name'
                }
              }
            },
            country: {
                validators: {
                  notEmpty: {
                    message: 'Please select a country'
                  }
                }
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            autoFocus: new FormValidation.plugins.AutoFocus(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                // Use this for enabling/changing valid/invalid class
                // eleInvalidClass: '',
                eleValidClass: '',
                rowSelector: '.form-group'
            }),
            submitButton: new FormValidation.plugins.SubmitButton()
        },
        }).on('core.form.valid', function () {
            // Jump to the next step when all fields in the current step are valid
            validationStepper.next();
        });

        // Property Details
        const FormValidation2 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep2, {
        fields: {
            primary_cover_image: {
                validators: {
                  notEmpty: {
                    message: 'Please upload a cover image'
                  }
                }
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                // Use this for enabling/changing valid/invalid class
                // eleInvalidClass: '',
                eleValidClass: '',
                rowSelector: '.form-group'
            }),
            autoFocus: new FormValidation.plugins.AutoFocus(),
            submitButton: new FormValidation.plugins.SubmitButton()
        }
        }).on('core.form.valid', function () {
        // Jump to the next step when all fields in the current step are valid
        validationStepper.next();
        });

        wizardFinancingRequestDetailsNext.forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();
                // When click the Next button, we will validate the current step
                switch (validationStepper._currentIndex) {
                    case 0:
                        FormValidation1.validate();
                        break;

                    case 1:
                        FormValidation2.validate();
                        break;

                default:
                    break;
                }
            });
        });

        wizardFinancingRequestDetailsPrev.forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault()
                switch (validationStepper._currentIndex) {
                    case 1:
                        validationStepper.previous();
                        break;

                    case 0:

                    default:
                        break;
                }
            });
        });
    }
})();
