  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

      //   submitHandler: function(validator, form, submitButton) {
      //   $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
      //           $('#contact_form').data('bootstrapValidator').resetForm();
                 
      //       var bv = form.data('bootstrapValidator');
      //       // Use Ajax to submit form data
      //       $.post(form.attr('action'), form.serialize(), function(result) {
      //           console.log(result);
      //       }, 'json');

           
      // },
        fields: {
            // first_name: {
            //     validators: {
            //             stringLength: {
            //             min: 2,
            //         },
            //             notEmpty: {
            //             message: 'Please supply your first name'
            //         }
            //     }
            // },
            //  last_name: {
            //     validators: {
            //          stringLength: {
            //             min: 2,
            //         },
            //         notEmpty: {
            //             message: 'Please supply your last name'
            //         }
            //     }
            // },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Παρακαλώ πληκτρογολίστε το email σας'
                    },
                    emailAddress: {
                        message: 'Το email δεν είναι έγκυρο'
                    }
                }
            },
            website: {
                validators: {
                    notEmpty: {
                        message: 'Παρακαλώ πληκτρογολίστε το url'
                    },
                    uri: {
                        message: 'The website address is not valid'
                    },
                   
                }
            },
            // address: {
            //     validators: {
            //          stringLength: {
            //             min: 8,
            //         },
            //         notEmpty: {
            //             message: 'Please supply your street address'
            //         }
            //     }
            // },
            // city: {
            //     validators: {
            //          stringLength: {
            //             min: 4,
            //         },
            //         notEmpty: {
            //             message: 'Please supply your city'
            //         }
            //     }
            // },
            state: {
                validators: {
                    notEmpty: {
                        message: 'Παρακαλώ επιλέξτε καταγγελια'
                    }
                }
            }
            // zip: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Please supply your zip code'
            //         },
            //         zipCode: {
            //             country: 'US',
            //             message: 'Please supply a vaild zip code'
            //         }
            //     }
            // },
            // comment: {
                // validators: {
                    //   stringLength: {
                    //     min: 0,
                    //     max: 700,
                    //     // message:'Please enter at least 10 characters and no more than 200'
                    // },
                    // notEmpty: {
                    //     message: 'Please supply a description of your project'
                    // }
                    // }
                // }
            }
        })



//         .on('success.form.bv', function(e) {
//             $('#success_message').slideDown({ opacity: "show" }, "slow") 
             



// //              $('#contact_form').on('submit',function(e){
// // e.preventDefault();
// // });
//             // Do something ...
//                 $('#contact_form').data('bootstrapValidator').resetForm();

//             // Prevent form submission
//             e.preventDefault();

//             // Get the form instance
//             var $form = $(e.target);

//             // Get the BootstrapValidator instance
//             var bv = $form.data('bootstrapValidator');

//             // Use Ajax to submit form data
//             $.post($form.attr('action'), $form.serialize(), function(result) {
//                 console.log(result);
//             }, 'json');
//         });


});