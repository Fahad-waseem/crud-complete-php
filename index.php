<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="app.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="alert alert-info text-center mb-5 p-3">
            Ajax crud operation
        </h1>
        <div class="row">
            <form action="" class="col-sm-5" id="myform" >
                <h3 class="alert alert-warning text-center p-2">Add Update Students</h3>
                <div>
                    <label for="nameid" class="form-label">Name</label>
                    <input type="text" name="name"  class="form-control" id="nameid">
                </div>
                <div>
                    <label for="emailid" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="emailid">
                </div>
                <div>
                    <label for="passwordid" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="passid">
                    <input type="checkbox" onclick="myFunction()">Show Password

                </div>
                <div class="mt-5">
                <button type="submit" class="btn btn-primary" name='saveBtn' id="btnadd">Save</button>
                </div>
                <div id="msg"></div>
            </form>  
            <div class="col-sm-7 text-center">
                <h3 class="alert alert-danger p-2">Show student information</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
                <!-- <div id="del"></div> -->
            </div> 
        </div>
    </div>
    <script src="./jqjsax.js"></script>

        }
        <!-- show data in user -->
        <script>
        
            function showdata(){

                // var xmlhttp = new XMLHttpRequest();
                // xmlhttp.onload = function() {
                //     document.getElementById("tbody").innerHTML = this.responseText;
                // };
                // xmlhttp.open("GET", "retrievedata.php", true);
                // xmlhttp.send();
                $.ajax({
                type: "GET",
                url: "retrievedata.php",
                success: function (data) {
                    $('table').html(data);

                }
            });
                
            }

            showdata(); 

        </script>
                        <!-- edit -->
                <script>
                $(document).on("click",".edit",function(e){ 
                    e.preventDefault();
            // $("#modal").show();
            var student=$(this).data("eid");
            // alert(student);
        $.ajax({
            type: "POST",
            url: "update.php",
            data: {id:student},
            success: function (data) {
                $('table').html(data);

            }
        });
        })
                   // delete

        $(document).on("click", ".delete", function(e) {
                e.preventDefault();
                var studentId = $(this).attr("data-id");
                // alert(studentId);
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: {
                        studentId: studentId
                    },
                    success: function(data) {
                        showdata();
                    }
                });
            })

                   // update
            $(document).on("click", "#edit-submit", function(e) {
            e.preventDefault();
            console.log("edit Button clicked");
             let id =$('#id').val();
            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            myresult = { id: id, name: name, email: email, password: password }
            console.log(myresult)
            $.ajax({
                url: "save.php",
                type: "POST",
                data: JSON.stringify(myresult),
                success: function (data) {
                    document.getElementById("tbody").innerHTML = this.responseText = showdata();
                    console.log(data);
                }
            });
        })
        
    </script>     
    <script>
    function myFunction() {
    var x = document.getElementById("passid");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
    </script>


</body>
</html>