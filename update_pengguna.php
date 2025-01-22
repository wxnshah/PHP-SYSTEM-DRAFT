# Check if user_ic or user_email already exists in the database
        $check_sql = "SELECT id_users FROM tb_users WHERE (user_ic = '$data_user_ic' OR user_email = '$data_user_email') AND id_users != '$id_users'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            # If user_ic or user_email exists, show error message
            echo "<script>
                setTimeout(function() {
                    Swal.fire({
                        position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'IC atau Email telah wujud !', icon: 'error', timerProgressBar: true, timer: 3000
                    })
                }, 600);
            </script>";
        } else {
            # If data is valid, proceed to update
            $arahan_sql_kemaskini = "UPDATE tb_users SET 
            user_name = '".$data_user_name."',
            user_ic = '".$data_user_ic."',
            user_email = '".$data_user_email."',
            user_level = '".$data_user_level."'";

            // Add password update if provided
            if (isset($_POST['reg_password']) && $_POST['reg_password'] != "") {
                $arahan_sql_kemaskini .= ", password = '".$password."'";
            }

            $arahan_sql_kemaskini .= " WHERE id_users = '".$id_users."'";

            // Execute the update query
            if (mysqli_query($conn, $arahan_sql_kemaskini)) {
                // If successful, redirect with success message
                redirect("senarai_pengguna.php?success=2");
            } else {
                // If the update fails, show error message
                echo "<script>
                    setTimeout(function() {
                        Swal.fire({
                            position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Gagal menyimpan data!', icon: 'error', timerProgressBar: true, timer: 3000
                        })
                    }, 600);
                </script>";
                redirect("kemaskini_pengguna.php");
            }
        }
