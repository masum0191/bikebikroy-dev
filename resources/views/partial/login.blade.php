    <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="Close" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="LoginModal">User Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
             <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="login-box">
                       <h3 class="log-tittle mb-0">
                           LOGIN TO BIKEBD
                       </h3>
                        <form>
                            <div class="mb-3">
                             
                                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                               <span class="text-danger" id="emailnotification"></span>
                            </div>
                            <div class="mb-3">
                               
                                <input type="password" class="form-control" id="password" placeholder="Password">
                                 <span class="text-danger" id="passwordnotification"></span>
                            </div>
                            <button type="button" id="LoginButton" class="btn btn-success">Log in</button>
                        </form>
                        
                        
                        <div class="or-row d-flex my-4">
                            <div class="line align-self-center"></div>
                            <div class="or align-self-center">
                                <p class="mb-0">
                                    OR
                                </p>
                            </div>
                            <div class="line align-self-center"></div>
                        </div>
                        <h3 class="log-tittle mb-0 pb-0">
                           <a href="{{url('register')}}">SIGN UP TO BIKEBD</a>
                       </h3>
                    </div>

                </div>
            </div>
        </div>
        </div>
        
      </div>
    </div>
  </div>