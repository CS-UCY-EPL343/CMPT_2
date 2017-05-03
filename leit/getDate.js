 function getTheDay(str){
        if (str==1){
            return "Δευτέρα";
        }
        else if(str==2){
            return "Τρίτη"
        }
        else if(str==3){
            return "Τετάρτη"
        }
        else if(str==4){
            return "Πέμπτη"
        }
        else if(str==5){
            return "Παρασκυή"
        }
        else if(str==6){
            return "Σάββατο"
        }
        else if(str==0){
            return "Κυριακή"
        }
    }

function getTheMonth(str){
    if(str==0){
        return "Ιαννουαρίου";
    }
    else if(str==1){
        return "φεβρουαρίου";
    }
    else if(str==2){
        return "Μαρτίου";
    }
    else if(str==3){
        return "Απριλίου";
    }
    else if(str==4){
        return "Μαίου";
    }
    else if(str==5){
        return "Ιουνίου";
    }
    else if(str==6){
        return "Ιουλίου";
    }
    else if(str==7){
        return "Αυγούστου";
    }
    else if(str==8){
        return "Σεπτεμβρίου";
    }
    else if(str==9){
        return "Οκτομβρίου";
    }
    else if(str==10){
        return "Νοεμβρίου";
    }
    else if(str==11){
        return "Δεκεμβρίου";
    }
}