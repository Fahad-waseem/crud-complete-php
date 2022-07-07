$("#btnadd").click(function (e) {
    e.preventDefault();
    console.log("Save Button clicked");
    let nm = $('#nameid').val();
    let em = $('#emailid').val();
    let pw = $('#passid').val();
    // console.log(nm)
    // console.log(em)
    // console.log(pw)
    mydata = { name: nm, email: em, password: pw };
    console.log(mydata);
    $.ajax({
        url: "insert.php",
        method: "POST",
        data: JSON.stringify(mydata),

        // data:$('#myform').serialize(),
        success: function (data) {
            console.log(data);
            msg = "<p class='alert alert-dark mt-3'>" + data + "</p>";
            $("#msg").html(msg);

            $("#myform")[0].reset();


            // del = "<p class='alert alert-dark mt-3'>" + data + "</p>";
            // $("#del").html(del);
        },



    });

    $(".delete").on("click", function (e) {

        // e.preventDefault();
        $(document).on("click", ".delete", function () {
            var id = $(this).data("id");
            console.log(id)
            // alert(id);
            showdata();
        })
    });










});

