// Replace source
// $('img').on("error", function() {
//     $(this).attr('src', '/images/missing.png');
// });

// Or, hide them
$("img").on("error", function() {
    $(this).hide();
});
closeChatBox();

getMsg(0);
console.log("CHAT BOX CLOSED");

function ValidateEmail(email)
{
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
    {
        return (true)
    }
    alert("You have entered an invalid email address!")
    return (false)
}


function phonenumber(inputtxt)
{
    var phoneno = /^\d{10}$/;
    if(inputtxt.value.match(phoneno))
    {
        return true;
    }
    else
    {
        alert("Mobile number entered is not correct!");
        return false;
    }
}

