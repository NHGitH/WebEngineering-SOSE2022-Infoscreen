<x-layout>
    <div class="login-main-container">
        <div class="picture-container">
            <div class="login-container-neu">
                <div class="login-container-caption">
                    <h1>Hochschule Flensburg</h1>
                    <h1>Admin Login</h1>
                </div>

                <form method="GET" action="">
                    <div>
                        <input type="text" class="user-text-input" placeholder="Benutzer" />
                    </div>

                    <div>
                        <input type="password" class="user-password-input" placeholder="Passwort" />
                    </div>

                    <div>
                        <button href="/administration/1" class="button-login"><a href="/administration/1">Bestätigen</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <front-page></front-page>
</x-layout>

<style>
    .login-main-container {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
    }

    .picture-container {
        position: absolute;
        padding: 0;
        height: 100%;
        width: 100%;
        background-repeat: no-repeat;
        background-size: auto 100vh;
        background-image: url("/images/layered-waves-haikei.svg");
    }

    input[type=text] {
        padding: 5px;
        margin: 5px 0;
        box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
        border-radius: 5px;

    }

    input[type=password] {
        padding: 5px;
        margin: 5px 0;
        box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
        border-radius: 5px;
    }

    input {
        width: 70%;
        font-family: inherit;
        font-size: inherit;
    }

    .login-container-neu {
        width: 15%;
        min-width: 400px;
        height: 20%;
        min-height: 300px;
        box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.165);
        background-color: rgba(204, 204, 204, 0.2);
        margin: 20% auto;
        border-radius: 10px;
        text-align: center;
    }

    .user-text-input,
    .user-password-input {
        border: 0;
        border-bottom: 1px solid #eee;
    }

    /*---------*/
    /*---------*/
    /* BUTTON */
    /*---------*/
    /*---------*/

    .button-login {
        /* Behavior deaktivieren */
        appearance: none;
        -webkit-appearance: none;

        /* Styles */
        padding: 7px;
        margin: 20px 0;
        border: none;
        background-color: #3f51b576;
        color: #fff;
        font-weight: 600;
        border-radius: 5px;
        width: 50%;
    }

    ::placeholder {
        text-align: center;
    }

    /*---------*/
    /*---------*/
    /* H1 */
    /*---------*/
    /*---------*/

    .login-container-caption {
        color: white;
        text-align: center;
        font-weight: 200;
        padding: 5% 0 15% 0;
    }
</style>