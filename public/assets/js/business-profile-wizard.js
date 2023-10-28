/**
 *  Form Wizard
 */

'use strict';

(function () {
    // Init custom option check
    // window.Helpers.initCustomOptionCheck();

    // Vertical Wizard
    // --------------------------------------------------------------------

    const wizardBusinessDetails = document.querySelector('#business-details-wizard');
    if (typeof wizardBusinessDetails !== undefined && wizardBusinessDetails !== null) {
        // Wizard form
        const wizardBusinessDetailsForm = wizardBusinessDetails.querySelector('#business-details-wizard-form');
        // Wizard steps
        const wizardBusinessDetailsFormStep1 = wizardBusinessDetailsForm.querySelector('#business-details');
        const wizardBusinessDetailsFormStep2 = wizardBusinessDetailsForm.querySelector('#business-documents');

        // Wizard next prev button
        const wizardBusinessDetailsNext = [].slice.call(wizardBusinessDetailsForm.querySelectorAll('.btn-next'));
        const wizardBusinessDetailsPrev = [].slice.call(wizardBusinessDetailsForm.querySelectorAll('.btn-prev'));

        const validationStepper = new Stepper(wizardBusinessDetails, {
            linear: true
        });

        // Business Details
        const FormValidation1 = FormValidation.formValidation(wizardBusinessDetailsFormStep1, {
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

        const plPropertyType = $('#plPropertyType');

        if (plPropertyType.length) {
            plPropertyType.wrap('<div class="position-relative"></div>');
            plPropertyType
                .select2({
                    placeholder: 'Select property type',
                    dropdownParent: plPropertyType.parent()
                })
                .on('change.select2', function () {
                    // Revalidate the color field when an option is chosen
                    FormValidation2.revalidateField('plPropertyType');
                });
        }

        // Property Details
        const FormValidation2 = FormValidation.formValidation(wizardBusinessDetailsFormStep2, {
        fields: {},
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: function (field, ele) {
                // field is the field name & ele is the field element
                switch (field) {
                    case 'plAddress':
                        return '.col-lg-12';
                    default:
                        return '.col-sm-6';
                    }
                }
            }),
            autoFocus: new FormValidation.plugins.AutoFocus(),
            submitButton: new FormValidation.plugins.SubmitButton()
        }
        }).on('core.form.valid', function () {
        // Jump to the next step when all fields in the current step are valid
        validationStepper.next();
        });

        wizardBusinessDetailsNext.forEach(item => {
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

        wizardBusinessDetailsPrev.forEach(item => {
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
