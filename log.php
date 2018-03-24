<div class="login-section">
    <div class="login">
    <p style="text-align:center;"><button  class="ui teal basic button" id='login_button'>LOGIN</button></p>
    <div id="log">
        <p style="text-align:center;"><button onclick="smsLogin()" class="ui teal button" id="" >LOGIN BY SMS</button></p>
        <p style="text-align:center;"><button onclick="emailLogin()" class="ui orange button">LOGIN BY EMAIL</button></p>
        <form id="theForm" method="post" action="index.php?p=login_success">
            <input id="csrf" type="hidden" name="csrf" />
            <input id="code" type="hidden" name="code" />
        </form>
    </div>
    </div>
</div>