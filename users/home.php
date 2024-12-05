<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Advanced PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-dark d-flex justify-content-center">
        <h1 class="text-light p-3">PHP ADVANCE</h1>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="form" class="modal-body">
                    <label for="name">Name:</label>
                    <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                            <i class="fa-solid fa-user p-2 bg-dark text-light"></i>
                        </div>
                        <input id="newname" type="text" class="form-control" placeholder="Username" required>
                    </div>

                    <label for="email">Email:</label>
                    <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                            <i class="fa-solid fa-envelope p-2 bg-dark text-light"></i>
                        </div>
                        <input id="newemail" type="text" class="form-control" placeholder="Email" required>
                    </div>

                    <label for="phone">Phone:</label>
                    <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                            <i class="fa-solid fa-phone p-2 bg-dark text-light"></i>
                        </div>
                        <input id="newphone" type="number" class="form-control" placeholder="Phone" required>
                    </div>

                    <form id="uploadForm" method="post" enctype="multipart/form-data">
                    <label for="fileUpload">Choose file to upload:</label>
                    <input type="file" id="fileUpload" name="fileUpload" required>
                    <br><br>
                    
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button id="newuser" type="button" class="btn btn-dark">Submit</button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="container mt-5">
        <!--
        <div class="w-75 d-flex justify-content-start ">
            <i class="fa-solid fa-magnifying-glass bg-dark text-light px-3 pt-2"></i>
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </div>
        -->
        <div >
            <button class="btn btn-dark " type="button" data-toggle="modal" data-target="#exampleModal">Add New User</button>
        </div>
    </div>


    
    <div class="container mt-5">
        <!----------------------------------------------------------- 
    this is the list of users from database (DONE)
    -->
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php include ("allusers.php"); ?>
                <?php while($result = mysqli_fetch_assoc($_SESSION['users'])): ?>
                <tr>

                    <td class="w-25"> <img class="w-25" src="<?php echo $result['photo'] ?>" /></td>
                    <td><?php echo $result['name'] ?></th>
                    <td><?php echo $result['email'] ?></th>
                    <td><?php echo $result['phone'] ?></th>
                   
                    <td>
                        
                        <button  type="button" value="<?php echo $result['id'];?> " class="show border-0 mt-1" data-toggle="modal" data-target="#show" ><i class="fa-solid fa-eye text-success p-2"></i></button>
                        <button  type="button" value="<?php echo $result['id'];?> " class="update border-0 mt-1" data-toggle="modal" data-target="#update" ><i class="fa-solid fa-pen-to-square text-primary p-2"></i></button>
                        <button type="button" value="<?php echo $result['id'];?> " class="delete border-0 mt-1"> <i class="fa-solid fa-trash text-danger p-2"></i> </button>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>



        
        <div>
            <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body d-flex justify-content-start">
                   
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>
        </div>


        <div class="modal fade" id="update" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        

                        
                    
                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>

    <script>
        let table = new DataTable('#myTable');

        $(document).ready(function() {


            $(document).on("click", "#save", function(e) {
                e.preventDefault();  // Prevent default form submission

                var id = $(this).attr("value");
                var name = $("#updatename").val();
                var email = $("#updateemail").val();
                var phone = $("#updatephone").val();
                let img = $("#fileupdate")[0].files;


                var form = new FormData();
                form.append("my_image" , img[0]);
                form.append("name" , name);
                form.append("email" , email);
                form.append("phone" , phone);
                form.append("id" , id);
                
                

                doajax("update.php", "POST", form);
                
            });
            
            $(".delete").click(function(e) {
                e.preventDefault();  // Prevent default form submission

                var id = $(this).attr("value");

                doajax("delete.php", "POST", { "id": id });
                
            });
            

            $(".show").click(function(e) {
                e.preventDefault();  // Prevent default form submission

                var id = $(this).attr("value");

                todoajax("show.php","GET",{"id":id});
                
            });


            $(".update").click(function(e) {
                e.preventDefault();  // Prevent default form submission

                var id = $(this).attr("value");

                updateajax("show.php","GET",{"id":id});
                
            });

            $("#newuser").click(function(e) {
                e.preventDefault();  // Prevent default form submission

                var name = $("#newname").val();
                var email = $("#newemail").val();
                var phone = $("#newphone").val();
                let img = $("#fileUpload")[0].files;

                let formData = new FormData();
                
                formData.append("name", name);
                formData.append("email", email);
                formData.append("phone", phone);
                formData.append("photo", img[0]);
               

                doajax("store.php", "POST", formData);
                
            });




            function updateajax(url, type, data) {
                

                $.ajax({
                    url: url,
                    type: type,
                    data: data,
                    success: function(response) {
                        
                        var data = JSON.parse(response);

                        // Populate the modal with data (change keys as per your data structure)
                        $("#update .modal-body ").html(`
                            <lable for="name">Name :</lable>
                            <div class="input-group mb-3 mt-2">
                          
                              <div class="input-group-prepend">
                                <i class="fa-solid fa-user p-2 bg-dark text-light"></i>
                              </div>
                              <input id="updatename" type="text" class="form-control" value="${data.name}">
                            </div>

                            <lable for="email">Email :</lable>
                            <div class="input-group mb-3 mt-2">
                          
                              <div class="input-group-prepend">
                                <i class="fa-solid fa-envelope p-2 bg-dark text-light"></i>
                              </div>
                              <input id="updateemail" type="text" class="form-control" value="${data.email}">
                            </div>


                            <lable for="phone">Phone :</lable>
                            <div class="input-group mb-3 mt-2">
                          
                              <div class="input-group-prepend">
                                <i class="fa-solid fa-phone p-2 bg-dark text-light"></i>
                              </div>
                              <input id="updatephone" type="text" class="form-control" value="${data.phone}">
                            </div>

                            <form id="uploadForm" method="post" enctype="multipart/form-data">
                            <label for="fileUpload">Choose file to upload:</label>
                            <input type="file" id="fileupdate" name="fileUpload" required>
                            <br><br>
                    
                            </form>
                            
                        `);

                        $("#update .modal-footer").html(`
                        
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button id="save" value="${data.id}" type="button" class="btn btn-dark">Save changes</button>
                        
                        `)

                        // Show the modal
                        $("#update").modal('modal');

                        
                    }
                });
            }

            function todoajax(url, type, data) {
                

                $.ajax({
                    url: url,
                    type: type,
                    data: data,
                    success: function(response) {
                        
                        var data = JSON.parse(response);

                        // Populate the modal with data (change keys as per your data structure)
                        $("#show .modal-body ").html(`
                            <div class="w-50">
                                <img class="w-50" src="${data.photo}" />
                            </div>

                            <div id="data">
                                <h5 class="text-primary">${data.name}</h5>
                                <p>${data.email}</p>
                                <p> <i class="fa-solid fa-phone"></i> ${data.phone}</p>
                            </div>
                            
                        `);

                        // Show the modal
                        $("#show").modal('show');
                        
                    }
                });
            }

            function doajax(url, type, data) {
                

                $.ajax({
                    url: url,
                    type: type,
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        
                        var response = JSON.parse(result);
                        
                        
                            if (response.status) {
                                location.reload();
                            }
                            
                    }
                });
            }
        });

    </script>
</body>
</html>
