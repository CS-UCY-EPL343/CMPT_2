  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: {
            first_name: {
                validators: {
                    
                        stringLength: {
                        max: 25,
                        message: 'Το Όνομα Πρέπει Να Έχει Λιγότερους Από 25 Χαρκτήρες'
                    }
                }
            },
            last_name: {
                validators: {
                        stringLength: {
                        max: 25,
                        message: 'Το Επίθετο Πρέπει Να Έχει Λιγότερους Από 25 Χαρκτήρες'
                    }
                }
            },
             date: {
                validators: {
                     stringLength: {
                        max: 0,
                        // message: 'The Name Must Be Less Than 50 Characters'
                    }
                }
            },
             email2: {
                validators: {
                    stringLength: {
                        max: 50,
                        message: 'Το Email Πρέπει Να Έχει Λιγότερους Από 50 Χαρκτήρες'
                    },
                    emailAddress: {
                        message: 'Το email δεν είναι έγκυρο'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Παρακαλώ πληκτρογολίστε το email σας'
                    },
                    stringLength: {
                        max: 50,
                        message: 'Το Email Πρέπει Να Έχει Λιγότερους Από 50 Χαρκτήρες'
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
                    stringLength: {
                        max: 240,
                        message: 'Το URL Πρέπει Να Έχει Λιγότερους Από 240 Χαρκτήρες'
                    },
                    uri: {
                        message: 'Η Διευθυνση Της Ιστοσελίδας Δεν Έναι Έγκυρη'
                    },
                   
                }
            },
            ReportType: {
                validators: {
                    notEmpty: {
                        message: 'Παρακαλώ επιλέξτε  Το είδος της καταγγελια'
                    }
                    
                }
            },
            platname: {
                validators: {
                     stringLength: {
                        min: 2,
                        message: 'Το όνομα δεν είναι έγκυρο(πολύ μικρό)'
                    },
                    stringLength: {
                        max: 50,
                        message: 'Το Όνομα Της Πλατφόρμας Πρέπει Να Έχει Λιγότερους Από 50 Χαρκτήρες'
                    },
                    notEmpty: {
                        message: 'Παρακαλώ δώστε το όνομα της εφαρμογής'
                    }
                }
            },
            ReportFor: {
                validators: {
                    notEmpty: {
                        message: 'Παρακαλώ επιλέξτε καταγγελια'
                    }
                }
            },
            hosting: {
                validators: {
                    stringLength: {
                        min:1
                    }
                }
            },
            comment: {
                validators: {
                      stringLength: {                       
                        max: 1000,
                        message:'Οι Λεπτομέρειες Σας Ξεπερνούν Το Επιτρεπτόμενο Όριο Χαρακτήρων'
                    }
                   
                    }
                }
            }
        })




 .on('success.field.fv', function(e, data) {
            // If the field is empty
            if (data.element.val() === '') {
                var $parent = data.element.parents('.form-group');

                // Remove the has-success class
                $parent.removeClass('has-success');

                // Hide the success icon
                data.element.data('fv.icon').hide();
            }
        });



});