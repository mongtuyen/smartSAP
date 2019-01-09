

@if (count($errors) >0)
         <ul>
             @foreach($errors->all() as $error)
                 <li class="text-danger"> {{ $error }}</li>
             @endforeach
         </ul>
     @endif

     @if (session('status'))
         <ul>
             <li class="text-danger"> {{ session('status') }}</li>
         </ul>
     @endif
     <form action="{{ route('getLogin') }}" method="post">
         {{ csrf_field() }}
         <div class="form-group has-feedback">
             <input type="email" class="form-control" name="txtEmail" placeholder="Email">
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         </div>
         <div class="form-group has-feedback">
             <input type="password" class="form-control" placeholder="Password" name="txtPassword">
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div>
         <div class="row">
             <div class="col-xs-8">
                 <div class="checkbox icheck">
                     <label>
                         <input type="checkbox"> Remember Me
                     </label>
                 </div>
             </div>
             <div class="col-xs-4">
                 <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
             </div>
         </div>
     </form>
