<?php
include('../others/_dbconnect.php');


$pnumber = 0;
$citizens = "SELECT * FROM `cityzens`";
$result = mysqli_query($conn, $citizens);
while ($row = mysqli_fetch_assoc($result)) {
    $pnumber++;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>

<body>
    <div id="main-wrapper">
        <?php include('../admin/navbar.php'); ?>
        <!--**********************************
            Content body start
        ***********************************-->

        <div class="content-body">
            <div>
                <p id="button-th">CITIZENS</p>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Citizens</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?php echo $pnumber; ?></h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa-solid fa-people-group"></i></span>
                    </div>
                    <div>
                        <button id="button-two" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-user-plus"></i> Add Citizens
                        </button>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-5">
                <div class="row">
                    <table class="table table-success table-striped">
                        <thead class="table">
                            <tr>
                                <th scope="col">Sl No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Adhaar</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pnumber = 1;
                            $citizens = "SELECT * FROM `cityzens`";
                            $result = mysqli_query($conn, $citizens);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['aadhar'];
                                    echo "
                                        <tr>
                                            <td>" . $pnumber . "</td>
                                            <td>" . $row['name'] . "</td>
                                            <td>" . $row['aadhar'] . "</td>
                                            <td>" . $row['phone'] . "</td>
                                            <td>" . $row['gender'] . "</td>
                                            <td>" . $row['age'] . "</td>
                                            <td>
                                        <button class='edit btn btn-warning' id=" . $row['aadhar'] . ">Edit</button>
                                        &nbsp;
                                        <button type='button' class='btn btn-danger'><a href='../others/delete.php?id=" . $row['aadhar'] . "' style='text-decoration:none;' class='text-dark'>Delete</a></button>
                                        </td>
                                </tr>  ";
                                    $pnumber++;
                                }
                            } else {
                                echo "records  not found";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--**********************************
            Content body end
        ***********************************-->
        </div>
    </div>

    <?php include('../admin/footer.php'); ?>



    <!-- Add CITIZENS -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Citizen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../others/citizensEdit.php" enctype="multipart/form-data">
                        <div class="field">
                            <label class="label">Citizen Name</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="name" class="input" type="text" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Aadhaar Number</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="aadhar" class="input" type="number" required>
                                <span class="icon is-small is-left">
                                    <i class="fa-solid fa-fingerprint"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Phone</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="phone" class="input" type="number" required>
                                <span class="icon is-small is-left">
                                    <i class="fa-solid fa-phone"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Birth Date</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="date" class="input" type="date" required>
                                <span class="icon is-small is-left">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <div class="field">
                                <label class="label">Age</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input name="age" class="input" type="number" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-person-cane"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Gender</label>
                                <div class="select is-fullwidth">
                                    <select name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Address</label>
                            <div class="control has-icons-left has-icons-right">
                                <textarea name="address" class="input" type="text" rows="4" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer d-block">
                            <button type="reset" class="btn btn-danger float-end">Clear</button>
                            <button type="submit" name="submit" class="btn btn-success float-end"> + Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- END -->


    <!-- Edit Cityzens -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Update Citizens Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../others/citizensEdit.php">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="editName" id="editName" class="input" type="text" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">phone</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="editPh" id="editPh" class="input" type="number" placeholder="Phone" required>
                            </div>
                        </div>
                        <div class="modal-footer d-block">
                            <button type="submit" name="update" class="btn btn-success float-end">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Edit -->

    <script>
        //edit user details
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                name = tr.getElementsByTagName("td")[1].innerText;
                phone = tr.getElementsByTagName("td")[3].innerText;
                console.log(name, phone);
                editName.value = name;
                editPh.value = phone;
                snoEdit.value = e.target.id;
                console.log(e.target.id);

                var myModal = new bootstrap.Modal(document.getElementById('editModal'), {
                    keyboard: false
                })
                myModal.toggle();
            })
        })

        $(document).on('click', '.notification > button.delete', function() {
            $(this).parent().addClass('is-hidden');
            return false;
        });
    </script>
</body>

</html>