/**
 *  Form Wizard
 */

'use strict';

(function () {
    // Init custom option check
    // window.Helpers.initCustomOptionCheck();

    // Vertical Wizard
    // --------------------------------------------------------------------

    const insuranceReportDetails = document.querySelector('#insurance-report-wizard');
    if (typeof insuranceReportDetails !== undefined && insuranceReportDetails !== null) {
        // Wizard form
        const insuranceReportDetailsForm = insuranceReportDetails.querySelector('#insurance-report-wizard-form');

        // Wizard steps
        const insuranceReportDetailsFormStep1 = insuranceReportDetailsForm.querySelector('#business-details');
        const insuranceReportDetailsFormStep2 = insuranceReportDetailsForm.querySelector('#subsidiaries');
        const insuranceReportDetailsFormStep3 = insuranceReportDetailsForm.querySelector('#business-information');
        const insuranceReportDetailsFormStep4 = insuranceReportDetailsForm.querySelector('#business-sales-information');
        const insuranceReportDetailsFormStep5 = insuranceReportDetailsForm.querySelector('#securities-information');
        const insuranceReportDetailsFormStep6 = insuranceReportDetailsForm.querySelector('#credit-management-information');
        const insuranceReportDetailsFormStep7 = insuranceReportDetailsForm.querySelector('#additional-information');
        const insuranceReportDetailsFormStep8 = insuranceReportDetailsForm.querySelector('#consent-and-declaration');

        // Wizard next prev button
        const insuranceReportDetailsNext = [].slice.call(insuranceReportDetailsForm.querySelectorAll('.btn-next'));
        const insuranceReportDetailsPrev = [].slice.call(insuranceReportDetailsForm.querySelectorAll('.btn-prev'));

        const validationStepper = new Stepper(insuranceReportDetails, {
            linear: true
        });

        // Financing Requirements
        const FormValidation1 = FormValidation.formValidation(insuranceReportDetailsFormStep1, {
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
        const FormValidation2 = FormValidation.formValidation(insuranceReportDetailsFormStep2, {
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
        const FormValidation3 = FormValidation.formValidation(insuranceReportDetailsFormStep3, {
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
        const FormValidation4 = FormValidation.formValidation(insuranceReportDetailsFormStep4, {
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
        const FormValidation5 = FormValidation.formValidation(insuranceReportDetailsFormStep5, {
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
        const FormValidation6 = FormValidation.formValidation(insuranceReportDetailsFormStep6, {
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

        const FormValidation7 = FormValidation.formValidation(insuranceReportDetailsFormStep7, {
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

        const FormValidation8 = FormValidation.formValidation(insuranceReportDetailsFormStep8, {
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

        insuranceReportDetailsNext.forEach(item => {
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

                    default:
                        break;
                }
            });
        });

        insuranceReportDetailsPrev.forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault()
                if (validationStepper._currentIndex == 4) {
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

                    case 0:

                    default:
                        break;
                }
            });
        });
    }
})();
