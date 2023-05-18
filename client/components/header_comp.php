<header>
    <div class="logo">
        <a href="./">
            <img class="logo__img" src="./images/logo.png" alt="Hình của logo">
            <h2 class="logo__name">7V Views</h2>
        </a>
    </div>
    <div class="search">
        <input type="text" class="search__input" placeholder="Search..." />
        <div class="search__bulkhead"></div>
        <i class="fa-solid fa-magnifying-glass search__find-icon"></i>
    </div>
    <div class="action">
        <?php
        if ($account != null) {
            $user_avt = trim($user->avatar) != "" ? $user->avatar : 'http://localhost/DO_AN_WEB/server/images/no-image-user.png';

            echo '
                <a href="?page=blog&user=' . $user->_id . '" class="action__blogs">Bài viết của tôi</a>
                <i class="fa-solid fa-bell action__notify"></i>
                <div id="action__user" class="action__user">
                    <p>' . $user->last_name . '</p>
                    <img src="' . $user_avt . '" alt="Hình của user">
                </div>
                <div id="user_menu">
                    <a href="?detail&page=profile&user=' . $user->nick_name . '">Thông tin cá nhân</a>
                    <a href="?page=add_blog">Viết blog</a>
                    <a href="">Đổi mật khẩu</a>
                    <a href="./controling/signout.php" onclick="Handle_Signout(event)">Đăng xuất</a>
                </div>
                
                <script>
                    const Handle_Signout = (e) => {
                        if (confirm("Xác nhận đăng xuất") == false)
                            e.preventDefault();
                    }
                </script>
            ';
        } else {
            echo '<button id="bSignUp" style="--bcolor: #ffff00; --color: var(--dark-color); --hover: var(--second-color)" >Đăng ký</button>';
            echo '<button id="bSignIn" style="--bcolor: var(--primary-color); --color: var(--light-color); --hover: #e00552" >Đăng nhập</button>';
        }
        ?>
    </div>


    <script>
        var isShowMenu = false;

        document.getElementById('action__user').onclick = () => {
            isShowMenu = !isShowMenu;
            document.getElementById('user_menu').style.display = isShowMenu ? 'block' : 'none';

            document.getElementById('user_menu').onmouseleave = () => {

                setTimeout(() => {
                    document.getElementById('user_menu').style.display = 'none';
                    isShowMenu = !isShowMenu;
                }, 300)
            }
        }
    </script>

    <?php
    include "./call_api/accounts.php";
    if ($account == null) {
        $form_signup =
            '<form method="POST" action="./controling/signup.php">' .
            '<div class="row">' .
            '<p>Đăng ký</p>' .
            "</div>" .
            '<div class="row">' .
            '<div class="col-25">' .
            '<label for="name_of_user">Tên người dùng</label>' .
            "</div>" .
            '<div class="col-75">' .
            '<input required type="text" id="name_of_user" name="name_of_user" placeholder="Nhập tên của bạn..." />' .
            "</div>" .
            "</div>" .
            '<div class="row">' .
            '<div class="col-25">' .
            '<label for="username">Tên đăng nhập</label>' .
            "</div>" .
            '<div class="col-75">' .
            '<input required type="text" id="username" name="username" placeholder="Tên đăng nhập..." />' .
            "</div>" .
            "</div>" .
            '<div class="row">' .
            '<div class="col-25">' .
            '<label for="password">Mật khẩu</label>' .
            "</div>" .
            '<div class="col-75">' .
            '<input required type="password" id="password" name="password" placeholder="Mật khẩu..." />' .
            "</div>" .
            "</div>" .
            '<div class="row">' .
            '<div class="col-25">' .
            '<label for="re-password">Nhập lại mật khẩu</label>' .
            "</div>" .
            '<div class="col-75">' .
            '<input required type="password" id="re-password" name="re-password" placeholder="Nhập lại mật khẩu..." />' .
            "</div>" .
            "</div>" .
            "<br />" .
            '<div class="row">' .
            '<input type="submit" value="Đăng ký" style="--color: #ffff33; --hover: #ecec00" />' .
            '<input type="button" value="Trở lại" style="--color: #d70000; --hover: #ff0000" />' .
            "</div>" .
            "</form>";

        $form_signin =
            '<form method="POST" action="./controling/signin.php">' .
            '<div class="row">' .
            '<p>Đăng nhập</p>' .
            '</div>' .
            '<div class="row">' .
            '<div class="col-25">' .
            '<label for="username">Tên đăng nhập</label>' .
            '</div>' .
            '<div class="col-75">' .
            '<input type="text" id="username" name="username" required placeholder="Tên đăng nhập..." />' .
            '</div>' .
            '</div>' .
            '<div class="row">' .
            '<div class="col-25">' .
            '<label for="password">Mật khẩu</label>' .
            '</div>' .
            '<div class="col-75">' .
            '<input type="password" id="password" name="password" required placeholder="Mật khẩu..." />' .
            '</div>' .
            '</div>' .
            '<br />' .
            '<div class="row">' .
            '<input type="submit" value="Đăng nhập" style="--color: #096cdb; --hover: #1ca3fd" />' .
            '<input type="button" value="Trở lại" style="--color: #d70000; --hover: #ff0000" />' .
            '</div>' .
            '</form>';



        echo "
            <script>
                var overlay = document.createElement('div');
                overlay.className = 'overlay';

                var fsu = document.createElement('div');
                fsu.className = 'sign-in-up-form';
                fsu.innerHTML = '$form_signup';

                
                var fsi = document.createElement('div');
                fsi.className = 'sign-in-up-form';
                fsi.innerHTML = '$form_signin';
                
                var input_uname = null;
                var input_pass = null;
                var input_re_pass = null;
                
                document.getElementById('bSignUp').onclick = () => {
                    ShowForm('signup');
                    
                    // input_uname = document.getElementById('username');
                    input_pass = document.getElementById('password');
                    input_re_pass = document.getElementById('re-password');
                    
                    // input_uname.onkeyup = CheckExistsUname;
                    input_pass.onchange = ValidatePassword;
                    input_re_pass.onkeyup = ValidatePassword;
                };

                document.getElementById('bSignIn').onclick = () => {
                    ShowForm('signin');
                };

                const ShowForm = (type) => {
                    switch (type) {
                        case 'signup':
                            document.body.appendChild(overlay);
                            document.body.appendChild(fsu);
                            overlay.style.animation = \"fade-in-overlay ease 0.2s forwards\";
                            fsu.style.animation = \"fade-in ease 0.3s forwards\";

                            document.querySelector('input[type=\"button\"]').onclick = () => {
                                HideForm('signup');
                            }

                            document.querySelector(\".overlay\").onclick = () => {
                                HideForm('signup');
                            }
                            break;
                        case 'signin':
                            document.body.appendChild(overlay);
                            document.body.appendChild(fsi);
                            overlay.style.animation = \"fade-in-overlay ease 0.2s forwards\";
                            fsi.style.animation = \"fade-in ease 0.3s forwards\";

                            document.querySelector('input[type=\"button\"]').onclick = () => {
                                HideForm('signin');
                            }

                            document.querySelector(\".overlay\").onclick = () => {
                                HideForm('signin');
                            }
                            break;
                    }

                };

                const HideForm = (type) => {
                    switch (type) {
                        case 'signup':
                            overlay.style.animation = \"fade-out-overlay ease 0.2s forwards\";
                            fsu.style.animation = \"fade-out ease 0.3s forwards\";
                            document.body.removeChild(overlay);
                            setTimeout(() => {
                                document.body.removeChild(fsu);
                            }, 300);
                            break;
                        case 'signin':
                            overlay.style.animation = \"fade-out-overlay ease 0.2s forwards\";
                            fsi.style.animation = \"fade-out ease 0.3s forwards\";
                            document.body.removeChild(overlay);
                            setTimeout(() => {
                                document.body.removeChild(fsi);
                            }, 300);
                            break;
                    }

                };

                const ValidatePassword = () => {
                    if (input_pass.value.trim() != input_re_pass.value.trim()) {
                        input_re_pass.setCustomValidity('Mật khẩu không khớp');
                    } else {
                        input_re_pass.setCustomValidity('');
                    }
                }            

            </script>
        ";

        // echo "
        //     <script>
        //         const CheckExistsUname = () => {
        //             console.log(input_uname.value)
        //         }
        //     </script>
        // ";
    }
    ?>

</header>

<style>
    * {
        box-sizing: border-box;
    }


    #bSignUp,
    #bSignIn {
        padding: 8px 16px;
        background-color: var(--bcolor);
        outline: none;
        border: none;
        margin-left: 20px;
        color: var(--color);
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
    }

    #bSignUp:hover,
    #bSignIn:hover {
        background-color: var(--hover);
        color: var(--color);
    }

    .overlay {
        width: 100%;
        height: 100%;
        background-color: #000000;
        z-index: 2;
        position: fixed;
    }

    .sign-in-up-form .row:first-child {
        margin-bottom: 40px;
        text-align: center;
        font-size: 40px;
    }

    .sign-in-up-form .row:last-child {
        margin-top: 20px;
    }

    .sign-in-up-form input[type="password"],
    .sign-in-up-form input[type="text"],
    .sign-in-up-form select,
    .sign-in-up-form textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    .sign-in-up-form label {
        padding: 8px 0;
        display: inline-block;
    }

    .sign-in-up-form input[type="button"] {
        float: left;
        width: 100px;
    }

    .sign-in-up-form input[type="submit"] {
        float: right;
        width: 140px;
    }

    .sign-in-up-form input[type="button"],
    .sign-in-up-form input[type="submit"] {
        background-color: var(--color);
        color: white;
        padding: 12px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    .sign-in-up-form input[type="button"]:hover,
    .sign-in-up-form input[type="submit"]:hover {
        background-color: var(--hover);
    }

    .sign-in-up-form {
        z-index: 3;
        position: fixed;
        transform: translateY(-50%);
        background-color: var(--bg-color);
        width: 300px;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0px 4px 8px var(--dark-color);
    }

    @keyframes fade-in {
        from {
            top: 0%;
            opacity: 0;
        }

        to {
            top: 50%;
            opacity: 1;
        }
    }

    @keyframes fade-out {
        from {
            top: 50%;
            opacity: 1;
        }

        to {
            top: 0%;
            opacity: 0;
        }
    }

    @keyframes fade-in-overlay {
        from {
            opacity: 0;
        }

        to {
            opacity: .5;
        }
    }

    @keyframes fade-out-overlay {
        from {
            opacity: .5;
        }

        to {
            opacity: 0;
        }
    }
</style>