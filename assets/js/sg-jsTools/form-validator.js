//Function to validate fields
/*when calling the function
should have two parameters 'the Object' that is the name of the input element to be validated
EG: input[name="inpName"]
second parameter is the id of the Object writn as an array
but with out the index
For instance if id = inpId_1 then 
Just writ inpId_

General syntax 
validateFormFieldArray('input[name="text"],'inpId_)

*/

function validateFormFieldArray(obj,id){
    var fieldObj = $(obj);
    var arrFieldLen = fieldObj.length;//get length of the array field to validated
    for( var x = 0; x < arrFieldLen; x++){//loop within the field array
        var fieldElem = _(id+(x+1));//obtain the different id attributes of the field array
        if(fieldElem.value ==''){// if field is empty
            //alert a message and focus on the field
            alert('Please fill out all fields');
            fieldElem.focus();
            return false;
            break;
        }
    }
    return true;
}

//Function to validate form fields checking for empty fields
//this function is called with a string containing comma seperated
//values of the form field id
//Eg validateForm('field1,field2,field3')
function validateForm(arrObj){
    var errStr="";
    var elems=arrObj.split(',');
    var arrFieldLen = elems.length;//get length of the array field to validated
    for( var x = 0; x < arrFieldLen; x++){//loop within the field array
        var fieldElem = _(elems[x]);//obtain the different id attributes of the field array
        //alert('hi');
        if(fieldElem.value ==''){// if field is empty
            
            
            if(fieldElem.hasAttribute('alt')){
                errStr=fieldElem.getAttribute('alt');
                alert(errStr);
                return false;
            }else{
                alert('Please fill out all required fields');
            }
            //alert a message and focus on the field
            fieldElem.focus();
            return false;
            break;
        }//End if Field value is empty
    }
    return true;
}

