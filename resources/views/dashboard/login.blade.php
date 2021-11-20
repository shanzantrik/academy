<title>Admin Login</title>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>
<center>

               @if ( count( $errors ) > 0 )
               @foreach ($errors->all() as $error)
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  <span>
                  {{ $error }}</span>
               </div>
               @endforeach
               @endif
               @if(Session::has('success')) 
               <div class="alert alert-success ">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  <span>
                  <strong>Success</strong> {{ Session::get('success') }}</span>
               </div>
               @endif
               @if(Session::has('delete')) 
               <div class="alert alert-danger ">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  <span>
                  <strong>Failure</strong> {{ Session::get('delete') }}</span>
               </div>
               @endif

               @if(Session::has('error')) 
               <div class="alert alert-danger ">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  <span>
                  <strong>Failure</strong> {{ Session::get('error') }}</span>
               </div>
               @endif
           </button>
  <form class="login-container" method="post" action="/admin/login">
    {{ csrf_field() }}
    <p><input type="text" name="username" placeholder="Enter Username"></p>
    <p><input type="password" name="password" placeholder="Enter Password"></p>
    <p><input type="submit" value="Log in"></p>
  </form>
</div>

<style>

@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

body {
  background: #456;
  font-family: 'Open Sans', sans-serif;
}

.login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
  margin-top: 100px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input[type="submit"] {
  background: #28d;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #17c;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}
</style>