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
        const wizardFinancingRequestDetailsFormStep3 = wizardFinancingRequestDetailsForm.querySelector('#bankers-capital-structure');
        const wizardFinancingRequestDetailsFormStep4 = wizardFinancingRequestDetailsForm.querySelector('#company-details');
        const wizardFinancingRequestDetailsFormStep5 = wizardFinancingRequestDetailsForm.querySelector('#shareholders-key-management');
        const wizardFinancingRequestDetailsFormStep6 = wizardFinancingRequestDetailsForm.querySelector('#current-bank-indebtness');
        const wizardFinancingRequestDetailsFormStep7 = wizardFinancingRequestDetailsForm.querySelector('#current-operating-indebtness');
        const wizardFinancingRequestDetailsFormStep8 = wizardFinancingRequestDetailsForm.querySelector('#anchor-history');
        const wizardFinancingRequestDetailsFormStep9 = wizardFinancingRequestDetailsForm.querySelector('#credit-terms-confidentiality-statement');
        // const wizardFinancingRequestDetailsFormStep6 = wizardFinancingRequestDetailsForm.querySelector('#key-management');
        // const wizardFinancingRequestDetailsFormStep11 = wizardFinancingRequestDetailsForm.querySelector('#confidentiality-statement');

        // Wizard next prev button
        const wizardFinancingRequestDetailsNext = [].slice.call(wizardFinancingRequestDetailsForm.querySelectorAll('.btn-next'));
        const wizardFinancingRequestDetailsPrev = [].slice.call(wizardFinancingRequestDetailsForm.querySelectorAll('.btn-prev'));

        const validationStepper = new Stepper(wizardFinancingRequestDetails, {
            linear: true
        });

        // Financing Requirements
        const FormValidation1 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep1, {
            fields: {
                // // * Validate the fields here based on your requirements
                // name: {
                //   validators: {
                //     notEmpty: {
                //       message: 'Please enter the business name'
                //     }
                //   }
                // },
                // country: {
                //     validators: {
                //       notEmpty: {
                //         message: 'Please select a country'
                //       }
                //     }
                // },
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

        // Documents and Company Details
        const FormValidation2 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep2, {
            fields: {
                // primary_cover_image: {
                //     validators: {
                //       notEmpty: {
                //         message: 'Please upload a cover image'
                //       }
                //     }
                // },
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

        // Bankers and Capital Structure
        const FormValidation3 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep3, {
            fields: {
                // primary_cover_image: {
                //     validators: {
                //       notEmpty: {
                //         message: 'Please upload a cover image'
                //       }
                //     }
                // },
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

        // Shareholders and Key Management
        const FormValidation4 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep4, {
            fields: {
                // primary_cover_image: {
                //     validators: {
                //       notEmpty: {
                //         message: 'Please upload a cover image'
                //       }
                //     }
                // },
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

        // Current Bank Indebtness
        const FormValidation5 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep5, {
            fields: {
                // primary_cover_image: {
                //     validators: {
                //       notEmpty: {
                //         message: 'Please upload a cover image'
                //       }
                //     }
                // },
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
            // Scroll to next section
            $('.bs-stepper-header').animate({scrollLeft: '1020px'}, 300)

            // Jump to the next step when all fields in the current step are valid
            validationStepper.next();
        });

        // Current Operating Indebtness
        const FormValidation6 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep6, {
            fields: {
                // primary_cover_image: {
                //     validators: {
                //       notEmpty: {
                //         message: 'Please upload a cover image'
                //       }
                //     }
                // },
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

        // Anchor History
        const FormValidation7 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep7, {
            fields: {
                // primary_cover_image: {
                //     validators: {
                //       notEmpty: {
                //         message: 'Please upload a cover image'
                //       }
                //     }
                // },
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

        const FormValidation8 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep8, {
            fields: {
                // primary_cover_image: {
                //     validators: {
                //       notEmpty: {
                //         message: 'Please upload a cover image'
                //       }
                //     }
                // },
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

        const FormValidation9 = FormValidation.formValidation(wizardFinancingRequestDetailsFormStep9, {
            fields: {
                // primary_cover_image: {
                //     validators: {
                //       notEmpty: {
                //         message: 'Please upload a cover image'
                //       }
                //     }
                // },
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

                    case 2:
                        FormValidation3.validate();
                        break;

                    case 3:
                        FormValidation4.validate();
                        break;

                    case 4:
                        FormValidation5.validate();
                        break;

                    case 5:
                        FormValidation6.validate();
                        break;

                    case 6:
                        FormValidation7.validate();
                        break;

                    case 7:
                        FormValidation8.validate();
                        break;
                    case 7:
                        FormValidation9.validate();
                        break;

                    default:
                        break;
                }
            });
        });

        wizardFinancingRequestDetailsPrev.forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault()
                if (validationStepper._currentIndex == 5) {
                    $('.bs-stepper-header').animate({scrollLeft: '-1020px'}, 300)
                }
                switch (validationStepper._currentIndex) {
                    case 1:
                        validationStepper.previous();
                        break;

                    case 2:
                        validationStepper.previous();
                        break;

                    case 3:
                        validationStepper.previous();
                        break;

                    case 4:
                        validationStepper.previous();
                        break;

                    case 5:
                        validationStepper.previous();
                        break;

                    case 6:
                        validationStepper.previous();
                        break;

                    case 7:
                        validationStepper.previous();
                        break;

                    case 8:
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
