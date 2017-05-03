// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
angular.module('app', ['ionic', 'app.controllers', 'app.routes', 'app.directives','app.services','pascalprecht.translate'])

.config(function($ionicConfigProvider, $sceDelegateProvider, $translateProvider){
  

  $sceDelegateProvider.resourceUrlWhitelist([ 'self','*://www.youtube.com/**', '*://player.vimeo.com/video/**']);

  $translateProvider.translations('en', {
    HomeReportMessage: "Report Illegal Online Content Anonymously",
    ChooseReportHotline: "First you must choose whether your report concerns a website or an online communications platform. If your report concerns a website please type in the full url of the website. If your report concerns a communications platform please give us the name of the platform and specify all the necessary details in the Details section. When giving a url or online communications platform name you can remain completely anonymous with no possible legal impact on you. However in some cases we recommend you give us some information, which you can specify in the Details section, shall you deem it necessary for the report. The sex and age optional fields are only for statistical purposes.",
    ReportFor: "Report For",
    Listofillegalactivities: "List of illegal activities",
    ChildPornography: "Child Pornography",
    RacicmXenophobia: "Racicm / Xenophobia",
    Hacking: "Hacking",
    ChildPornographyHotline: "Child pornography refers to any content of child pornography you might come across on the internet. The url you provide will be validated. If the website resides in Cyprus then the url will be sent directly to the police. Otherwise the url will be sent to the police or hotline service of the respective country.",
    RacicmXenophobiaHotline: "This may be any form of Racism or Xenophobia that you may come across on the internet towards you, other people or group of people. If the Racicm you encountered cannot be openly viewed or evaluated we kindly advice you to give us some extra details that you may deem necessary for the evaluation of your encounter in the Details section. If you have witnessed a Racist attack targeted specifically towards you that may also have legal impact on the other person we recommend you give us some personal details as well.",
    HackingHotline: "Hacking may refer to any form of violation of personal rights, stealing of personal information and unauthorized access to a computer or phone. Please give us the details of the hacking attack in the Details section. If the hacking attack is towards you we kindly ask you give us your personal information.",
    IllegalActivities: "Illegal Activities",
    SaferInternet: "Internet Safety Cyprus is a project co-funded by the European Union through the Safer Internet Programme and is part of the joint Insafe-INHOPE networks. It is coordinated by the Cyprus Pedadogical Institute, the Cyprus Ministry of Education and Culture (MOEC) and other partners.",
    ListOfPartners: "List of Partners",
    HotlineService: "Hotline Service:",
    HelplineService: "Helpline Service:",
    HotlineAboutUs: "The Hotline report service gives the ability to the person using it to submit an anonymous, shall he wishes, report about illegal activity he comes across on the internet. After our operators validate the report, it is forwarded to the police and is automatically deleted. Our operators are professionals who received excessive training from the Insafe-INHOPE networks and are working in compliance with the national law and Cyprus police. Any personal information you choose to share with us in a hotline report is and will remain completely confidential.",
    HelplineAboutUs: "The Helpline service gives you the ability to talk with our operators about topics concerning online security. It's main purpose is to help the people stay informed about online safety and help them with any questions they may have. Feel free to call us or send us a helpline report about any question.",
    ListofHelplineTopics: "List of Helpline Topics",
    HelplineTopics: "Helpline Topics",
    ChooseReportHelpline: "First you must choose whether your report concerns a website or an online communications platform. If your report concerns a website please type in the full url of the website. If your website concerns a communications platform please give us the name of the platform and specify all the necessary details in the Details section. When giving a url or online communications platform name you can remain completely anonymous with no possible legal impact on you. However in some cases we recommend you give us some information, which you can specify in the Details section, shall you deem it necessary for the report. In the personal infromation section you must give us your email since it will be used by our operators to contact you and talk about your questions. If you wish, you can specify another method of contact in the Details section, however you must still provide an email. If you do not wish so, you can chat online by visiting the Live Chat section, or call 1480. The sex and age optional fields are only for statistical purposes.",
    ChildPornographyHelpline: "Child pornography refers to any content of child pornography you might come across on the internet. This is pornography that involves people under the age of 18.",
    RacicmHelpline: "This may be any form of Racism, Xenophobia or Bullying that you may come across on the internet towards you, other people or group of people.",
    HackingHelpline: "Hacking may refer to any form of violation of personal rights, stealing of personal information and unauthorized access to a computer or phone.",
    SexualHarassment: "Sexual Harassment",
    SexualHarassmentHelpline: "This may refer to any form of bullying or coercion of a sexual nature, or the unwelcome or inappropriate promise of rewards in exchange for sexual favors that you come across online.",
    ChildGrooming: "Child Grooming",
    ChildGroomingHelpline: "This refers to the act of befriending and establishing an emotional connection with a child, and sometimes the family, to lower the child's inhibitions for child sexual abuse.It also regularly lures minors into child-trafficking situations, illicit businesses such as child prostitution, or the production of child pornography.",
    CommersialThreats: "Commersial Threats (e.g. Phishing)",
    CommersialThreatsHelpline: "This refers to the attempt to obtain sensitive information such as usernames, passwords, and credit card details (and, indirectly, money), often for malicious reasons, by disguising as a trustworthy entity in an electronic communication.",
    InternetAddiction: "Internet Addiction",
    InternetAddictionHelpline: "Internet addiction refers to excessive Internet use that interferes with a person's daily life.",
    Spam: "Spam",
    SpamHelpline: "Electronic spamming is the use of electronic messaging systems to send(often repeatedly) an unsolicited message (spam), especially for advertising purposes or phishing purposes",
    HotlineReport : "Hotline Report",
    MoreInfoHotline: "For more information about what is a hotline report please visit the About Us section.",
    ReportInformation: "Report Information (obligatory)",
    website: "Website",
    VOIP: "Online Communications Platform",
    WebORPlat: "Website or Platform Name",
    Activity: "Activity",
    Details: "Details",
    PersonalInformation: "Personal Information (optional)",
    Name: "Name",
    Surname: "Surname",
    DOB: "Date of Birth",
    sex: "Sex",
    Male: "Male",
    Female: "Female",
    Submit: "Submit",
    Clear: "Clear",
    HelplineReport: "Helpline Report",
    MoreInfoHelpline: "For more information about what is a helpline report please visit the About Us section",
    Topic: "Topic",
    Menu: "Menu",
    Home: "Home",
    AboutUs: "About Us",
    ContactUs: "Contact Us",
    Settings: "Settings",
    Language: "Language",
    Partners: "Partners",
    LiveChatPar: "Our live chat gives you the opportunity to chat online with our operators about anything that might concern you.",
    CallUsAt: "Call us at: ",
    Emailusat: "Email us at:",
    Visit: "Visit our website and chat online:",
    Follow: "Follow us on social media:",
    CallNow: "Call Now",
    IdentityTheft: "Identity Theft",
    IdentityTheftExp: "Identity theft is the deliberate use of someone else's identity, usually as a method to gain a financial advantage or obtain credit and other benefits in the other person's name and perhaps to the other person's disadvantage or loss."
  });
  $translateProvider.translations('gr', {
      HomeReportMessage: "Ανώνυμη Καταγγελία Διαδικτυακού Περιοχομένου",
      ChooseReportHotline: "Πρώτα πρέπει να διαλέξετε εάν η καταγγελία σας αφορά κάποια ιστοσελίδα ή κάποια πλατφόρμα διαδικτυακής επικοινωνίας. Εάν η καταγγελία σας αφορά κάποια ιστοσελίδα παρακαλούμε πληκτρολογήστε το πλήρες url της ιστοσελίδας. Εάν η καταγγελία σας αφορά πλατφόρμα διαδικτυακής επικοινωνίας τότε δώστε το όνομα της πλατφόρμας και όλες τις απαραίτητες λεπτομέρειες στο πεδίο Λεπτομέρειες. Όταν κάνεται μία καταγγελία μπορείτε να παραμείνετε εντελώς ανώνυμοι χωρίς οποιαδήποτε πιθανή συνέπεια για σας. Παρόλα αυτά σε μερικές περιπτώσεις σας προτρέπουμε όπως μας δώσετε κάποιες προσωπικές πληροφορίες, όταν εσείς το κρίνετε σκόπιμο για τη διεκπαιρέωση της καταγγελίας σας. Τα προεραιτικά πεδία του φύλου και της ηλικίας είναι μόνο για στατιστικούς σκοπούς.",
      ReportFor: "Καταγγελία Για",
      Listofillegalactivities: "Λίστα Παράνομων Δραστηριοτήτων",
      ChildPornography: "Παιδική Πορνογραφία",
      RacicmXenophobia: "Ρατσισμός / Ξενοφοβία",
      Hacking: "Hacking",
      ChildPornographyHotline: "Παιδική πορνογραφία είναι οποιοδήποτε περιεχόμενο μπορεί να συναντήσετε στο διαδίκτυο το οποίο εμπλέκει άτομα μικρότερα από 18 χρονών σε ερωτικές πράξεις. Η διεύθυνση της ιστοσελίδας που θα δώσεται θα εξεταστεί. Εάν η ιστοσελίδα βρίσκεται στην Κύπρο το url θα σταλεί αμέσως στην αστυνομία. Σε διαφορετική περίπτωση θα σταλεί στην αστυνομία ή την υπηρεσία Hotline της αντίστοιχης χώρας.",
      RacicmXenophobiaHotline: "Αυτό μπορεί να αναφέρεται σε οποιαδήποτε μορφή Ρατσισμού ή Ξενοφοβίας που μπορεί να συναντήσετε στο διαδίκτυο, εναντίον εσάς ή άλλης ομάδας ανθρώπων. Εάν το περιεχόμενο που συναντήσατε δεν μπορεί να ειδωθεί η εξεταστεί ελεύθερα τότε σας προτρέπουμε όπως μας δώσετε περισσότερες πληροφορίες που μπορεί να κρίνετε σκόπιμες για την εξέταση της καταγγελίας στο πεδίο Λεπτομέρειες. Εάν πιστεύετε πως η ρατσιστική επίθεση που δεχθήκατε μπορεί να έχει νομικές επιπτώσεις εναντίον του άλλου ατόμου τότε σας προτρέπουμε όπως μας δώσετε τα προσωπικά σας στοιχεία.",  
      HackingHotline: "Το Hacking αναφέρεται σε οποιοδήποτε είδος παραβίασης των προσωπικών δικαιωμάτων σας, παραβίασης και κλοπής προσωπικών δεδομένων και παράνομης πρόσβασης σε υπολογιστή ή κινητή συσκευή. Σας προτρέπουμε όπως μας δώσετε και προσωπικά στοιχεία για την καλύτερη αντιμετώπιση της καταγγελίας.",
      IllegalActivities: "Παράνομες Δραστηριότητες",
      SaferInternet: "To Internet Safety Cyprus είναι ένα έργο συνχρηματοδοτούμενο από την Ευρωπαϊκή Ένωση, μέσω του προγράμματος Safer Internet, και μέλος του παγκόσμιου δικτύου καταγγελιών στο διαδίκτυο Insafe-INHOPE. Τυγχάνει διαχείρισης από το Παιδαγωγικό Ινστιτούτο Κύπρου, το Υπουργείο Παιδείας και Πολιτισμού και άλλους φορείς και συνεργάτες.",
      ListOfPartners: "Οι Συνεργάτες",
      HotlineService: "Υπηρεσία Hotline:",
      HelplineService: "Υπηρεσία Helpline:",
      HotlineAboutUs: "Η υπηρεσία Hotline δίνει τη δυνατότητα στους χρήστες να καταθέσουν μια ανώνυμη, εάν επιθυμούν, καταγγελία σχετικά με παράνομες δραστηριότητες που μπορεί να συναντήσει στο διαδίκτυο. Αφού η καταγγελία εξεταστεί από τους λειτουργούς μας, θα προωθηθεί ανώνυμα στην αστυνομία και θα διαγραφεί αμέσως. Οι λειτουργοί μας είναι επαγγελματίες οι οποίοι έλαβαν εκπαίδεση από τα δίκτυα Insafe-INHOPE και δουλεύουν πάντοτε σύμφωνα με το νόμο και την αστυνομία. Οποιεσδήποτε προσωπικές πληροφορίες επιλέξετε να μας δώσετε είναι και θα παραμείνουν εμπιστευτικές.",
      HelplineAboutUs: "Η υπηρεσία Helpline σας δίνει τη δυνατότητα να μιλήσετε με κάποιον από τους λειτουργούς μας σχετικά με θέματα γύρω από την ασφάλεια στο διαδίκτυο. Ο κύριος στόχος της υπηρεσίας είναι να βοηθήσει τον κόσμο να είναι ενημερωμένος και να λύσει οποιεσδήποτε απορίες σχετικά με την ασφάλεια στο διαδίκτυο",
      ListofHelplineTopics: "Θέματα Helpline",
      HelplineTopics: "Θέματα Helpline",
      ChooseReportHelpline: "Πρώτα πρέπει να διαλέξετε εάν η καταγγελία σας αφορά κάποια ιστοσελίδα ή κάποια πλατφόρμα διαδικτυακής επικοινωνίας. Εάν η καταγγελία σας αφορά κάποια ιστοσελίδα παρακαλούμε πληκτρολογήστε το πλήρες url της ιστοσελίδας. Εάν η καταγγελία σας αφορά πλατφόρμα διαδικτυακής επικοινωνίας τότε δώστε το όνομα της πλατφόρμας και όλες τις απαραίτητες λεπτομέρειες στο πεδίο Λεπτομέρειες. Όταν κάνεται μία καταγγελία μπορείτε να παραμείνετε εντελώς ανώνυμοι χωρίς οποιαδήποτε πιθανή συνέπεια για σας. Παρόλα αυτά σε μερικές περιπτώσεις σας προτρέπουμε όπως μας δώσετε κάποιες προσωπικές πληροφορίες, όταν εσείς το κρίνετε σκόπιμο για τη διεκπαιρέωση της καταγγελίας σας. Στο χώρο των προσωπικών πληροφοριών πρέπει να μας δώσετε το email σας αφού αυτό θα χρησιμοποιηθεί για επικοινωνία μαζί σας από τους λειτουργούς μας. Εάν επιθυμείτε μπορείτε να δηλώσετε μια άλλη μέθοδο επικοινωνίας στις Λεπτομέρειες, παρόλα αυτά πρέπει και πάλι να μας παρέχετε το email σας. Εάν επιθυμείτε μπορείτε να μας καλέσετε στο 1480 ή να επικοινωνήσετε μαζί μας με Live chat στην ενότητα Live Chat του μενού.",
      ChildPornographyHelpline: "Παιδική πορνογραφία είναι οποιοδήποτε περιεχόμενο μπορεί να συναντήσετε στο διαδίκτυο το οποίο εμπλέκει άτομα μικρότερα από 18 χρονών σε ερωτικές πράξεις.",
      RacicmHelpline: "Αυτό μπορεί να αναφέρεται σε οποιαδήποτε μορφή Ρατσισμού ή Ξενοφοβίας που μπορεί να συναντήσετε στο διαδίκτυο, εναντίον εσάς ή άλλης ομάδας ανθρώπων.",
      HackingHelpline: "Το Hacking αναφέρεται σε οποιοδήποτε είδος παραβίασης των προσωπικών δικαιωμάτων σας, παραβίασης και κλοπής προσωπικών δεδομένων και παράνομης πρόσβασης σε υπολογιστή ή κινητή συσκευή.",
      SexualHarassment: "Σεξουαλική Παρενόχληση",
      SexualHarassmentHelpline: "Αυτό μπορεί να αναφέρεται σε οποιαδήποτε μορφή εκφοβισμού ή εξαναγκασμού σεξουαλικού χαρακτήρα ή στην ανεπιθύμητη ή ακατάλληλη υπόσχεση ανταμοιβής σε αντάλλαγμα για σεξουαλικές εύνοιες που συναντάτε διαδικτυακά",
      ChildGrooming: "Παιδικό Grooming",
      ChildGroomingHelpline: "Αυτό αναφέρεται στην πράξη της φιλίας και της δημιουργίας συναισθηματικής σχέσης με ένα παιδί, και μερικές φορές την οικογένεια, για να μειώσει τις αναστολές του παιδιού για σεξουαλική κακοποίηση του. Επίσης, δελεάζει τακτικά τους ανηλίκους σε περιπτώσεις εμπορίας παιδιών και παράνομες επιχειρήσεις, όπως παιδική πορνεία.",
      CommersialThreats: "Εμπορικές Απειλές (π.χ. Phishing)",
      CommersialThreatsHelpline: "Aυτό αναφέρεται στην προσπάθεια απόκτησης ευαίσθητων πληροφοριών, όπως τα ονόματα χρήστη, τους κωδικούς πρόσβασης και τα στοιχεία της πιστωτικής κάρτας (και έμμεσα τα χρήματα), συχνά για κακόβουλους λόγους, συγκαλύπτοντας ως αξιόπιστη οντότητα σε μια ηλεκτρονική επικοινωνία.",
      InternetAddiction: "Εθισμός στο διαδίκτυο",
      InternetAddictionHelpline: "Ο εθισμός στο Διαδίκτυο αναφέρεται σε υπερβολική χρήση του Διαδικτύου που παρεμβαίνει στην καθημερινή ζωή ενός ατόμου.",
      Spam: "Ανεπιθύμητη Αλληλογραφία",
      SpamHelpline: "Αυτό αναφέρεται στην ενέργεια της επανειλημμένης αποστολής ανεπιθύμητης ηλεκτρονικής αλληλογραφίας, συχνά για διαφημιστικούς σκοπούς.",
      HotlineReport: "Καταγγελία Hotline",
      MoreInfoHotline: "Για περισσότερες πληροφορίες σχετικά με την καταγγελία Hotline επισκεφθείτε την ενότητα Σχετικά Με Εμάς από το μενού",
      ReportInformation: "Πληροφορίες Καταγγελίας (υποχρεωτικό)",
      website: "Ιστοσελίδα",
      VOIP: "Πλατφόρμα Διαδικτυακής Επικοινωνίας",
      WebORPlat: "Ιστοσελίδα ή Όνομα Πλατφόρμας",
      Activity: "Δραστηριότητα",
      Details: "Λεπτομέρειες",
      PersonalInformation: "Προσωπικές Πληροφορίες (προεραιτικό)",
      Name: "Όνομα",
      Surname: "Επίθετο",
      DOB: "Ημερομηνία Γέννησης",
      sex: "Φύλο",
      Male: "Άντρας",
      Female: "Γυναίκα",
      Submit: "Υποβολή",
      Clear: "Καθαρισμός",
      HelplineReport: "Καταγγελία Helpline",
      MoreInfoHelpline: "Για περισσότερες πληροφορίες σχετικά με την καταγγελία Helpline επισκεφθείτε την ενότητα Σχετικά Με Εμάς από το μενού",
      Topic: "Θέμα",
      Menu: "Μενού",
      Home: "Αρχική",
      AboutUs: "Σχετικά Με Εμάς",
      ContactUs: "Επικοινωνία",
      Settings: "Ρυθμίσεις",
      Language: "Γλώσσα",
      Partners: "Συνεργάτες",
      LiveChatPar: "Το Live Chat σας δίνει τη δυνατότητα να επικοινωνήσετε με κάποιο λειτουργό μας σχετικά με οτιδήποτε σας απασχολεί",
      CallUsAt: "Τηλεφωνήστε μας στο: ",
      Emailusat: "Στείλτε μας email:",
      Visit: "Επισκεφθείτε την ιστοσελίδα μας:",
      Follow: "Mέσα κοινωνικής δικτύωσης:",
      CallNow: "Τηλεφωνήστε",
      IdentityTheft: "Κλοπή Διαδικτυακής Ταυτότητας",
      IdentityTheftExp: "Η κλοπή διαδικτυακής ταυτότητας μπορεί να αναφέρεται στην σκόπιμη χρήση της ταυτότητας κάποιου άλλου, συνήθως ως μέθοδο για να κερδίσει ένα οικονομικό πλεονέκτημα ή να λάβει πίστωση και άλλα οφέλη στο όνομα του άλλου προσώπου"
  });   
  $translateProvider.preferredLanguage("gr");
  $translateProvider.fallbackLanguage("en");

})

.run(function($ionicPlatform, $translate) {
  $ionicPlatform.ready(function() {

     if(typeof navigator.globalization !== "undefined") {
                navigator.globalization.getPreferredLanguage(function(language) {
                    $translate.use((language.value).split("-")[0]).then(function(data) {
                        console.log("SUCCESS -> " + data);
                    }, function(error) {
                        console.log("ERROR -> " + error);
                    });
                }, null);
            }
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });
})

/*
  This directive is used to disable the "drag to open" functionality of the Side-Menu
  when you are dragging a Slider component.
*/
.directive('disableSideMenuDrag', ['$ionicSideMenuDelegate', '$rootScope', function($ionicSideMenuDelegate, $rootScope) {
    return {
        restrict: "A",  
        controller: ['$scope', '$element', '$attrs', function ($scope, $element, $attrs) {

            function stopDrag(){
              $ionicSideMenuDelegate.canDragContent(false);
            }

            function allowDrag(){
              $ionicSideMenuDelegate.canDragContent(true);
            }

            $rootScope.$on('$ionicSlides.slideChangeEnd', allowDrag);
            $element.on('touchstart', stopDrag);
            $element.on('touchend', allowDrag);
            $element.on('mousedown', stopDrag);
            $element.on('mouseup', allowDrag);

        }]
    };
}])

/*
  This directive is used to open regular and dynamic href links inside of inappbrowser.
*/
.directive('hrefInappbrowser', function() {
  return {
    restrict: 'A',
    replace: false,
    transclude: false,
    link: function(scope, element, attrs) {
      var href = attrs['hrefInappbrowser'];

      attrs.$observe('hrefInappbrowser', function(val){
        href = val;
      });
      
      element.bind('click', function (event) {

        window.open(href, '_system', 'location=yes');

        event.preventDefault();
        event.stopPropagation();

      });
    }
  };
});