const topNav = document.getElementById('top-nav');
const leftNav = document.getElementById('nav-left');

const toggleBtn = document.getElementById('toggle-btn');

// Menu Toggle
toggleBtn.addEventListener("click", ()=>{
    leftNav.classList.toggle("show-nav");
});

// Category Active
// Form Validation - checkout
const checkoutForm = document.getElementById("checkout");
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const address = document.getElementById("address");
const phone = document.getElementById("phone");
const email = document.getElementById("email");
const creditCard = document.getElementById("creditcard");
const nameOnCard = document.getElementById("nameOnCard");
const expiry = document.getElementById("expiry");
const csv = document.getElementById("csv");

checkoutForm.addEventListener("submit", (e)=>{
    e.preventDefault();
    let result = checkInputs();
    if(result){
        checkoutForm.submit();
    }
});


function checkInputs(){
    const firstNameValue = firstName.value.trim();
    const lastNameValue = lastName.value.trim();
    const addressValue = address.value.trim();
    const phoneValue = phone.value.trim();
    const emailValue = email.value.trim();

    const creditCardValue = creditCard.value.trim();
    const nameOnCardValue = nameOnCard.value.trim();
    const expiryValue = expiry.value.trim();
    const csvValue = csv.value.trim();
    if(firstNameValue !== "" &&  addressValue !== "" && phoneValue !== "" && emailValue !== "" && isEmail(emailValue) && creditCardValue !== "" && nameOnCardValue !== "" && expiryValue !== "" && csvValue !== ""){
        return true;
    }else{
        if(firstNameValue === ""){
        // show error, add error class
        setErrorFor(firstName, "cannot be blank.");
        }else{
            setSuccessFor(firstName);
        }


        if(emailValue === ""){
            setErrorFor(email, 'cannot be blank');
        }else if(!isEmail(emailValue)){
            setErrorFor(email, 'not valid');
        }else{
            setSuccessFor(email);
        }

        if(addressValue === ""){
            // show error, add error class
            setErrorFor(address, "cannot be blank.");
        }else{
            setSuccessFor(address);
        }

        if(phoneValue === ""){
            // show error, add error class
            setErrorFor(phone, "cannot be blank.");
        }else if(!isPhone(phoneValue)){
            setErrorFor(phone, 'not valid');
        }else{
            setSuccessFor(phone);
        }

        if(creditCardValue === ""){
            // show error, add error class
            setErrorFor(creditCard, "cannot be blank.");
        }else if(!isCreditCard(creditCardValue)){
            setErrorFor(creditCard, 'not valid');
        }else{
            setSuccessFor(creditCard);
        }

        if(nameOnCardValue === ""){
            // show error, add error class
            setErrorFor(nameOnCard, "cannot be blank.");
        }else{
            setSuccessFor(nameOnCard);
        }

        if(expiryValue === ""){
            // show error, add error class
            setErrorFor(expiry, "cannot be blank.");
        }else if(!isDate(expiryValue)){
            setErrorFor(expiry, 'not valid');
        }else{
            setSuccessFor(expiry);
        }

        if(csvValue === ""){
            // show error, add error class
            setErrorFor(csv, "cannot be blank.");
        }else{
            setSuccessFor(csv);
        }
        return false;
    }
    
}
// setErrorFor(firstName, "test");
function setErrorFor(input, message){
    const formControl = input.parentElement;
    const formGroup = formControl.parentElement;
    const smallEl = formGroup.querySelector('small');

    // error message
    smallEl.innerText = message;

    //add error class
    formControl.className = "form-control error";
}
function setSuccessFor(input){
    const formControl = input.parentElement;
    const formGroup = formControl.parentElement;
    const smallEl = formGroup.querySelector('small');

    // error message
    smallEl.innerText = "";
    formControl.className = "form-control success";
}
// console.log(isEmail('ma3@hmd.com'));
function isEmail(email){
    return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
function isPhone(phone){
    return /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/.test(phone);
}
function isCreditCard(card){
    return /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/.test(card);
}
function isDate(expiry){
    return /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/.test(expiry);
}

 